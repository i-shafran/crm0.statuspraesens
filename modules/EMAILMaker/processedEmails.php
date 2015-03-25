<?php
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
require_once("include/Zend/Json.php");
require_once("include/utils/GetGroupUsers.php");
require_once("include/utils/UserInfoUtil.php");
require_once("modules/EMAILMaker/ConvertEMAIL.php");
require_once("modules/EMAILMaker/SavePDFIntoEmail.php");   
require_once("modules/EMAILMaker/EMAILMakerUtils.php");  

global $current_user,$theme,$mod_strings;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

if(isset($_REQUEST["debug"]) && $_REQUEST["debug"] == "true")
{
    ini_set("display_errors", 1);
    error_reporting(63);
 
    $adb->setDebug(true);

}

$sent_emails = 0;

//Added on 09-11-2005 to avoid loading the webmail vtiger_files in Email process
if($_REQUEST['smodule'] != '')
{
	define('SM_PATH','modules/squirrelmail-1.4.4/');
	/* SquirrelMail required vtiger_files. */
	require_once(SM_PATH . 'functions/strings.php');
	require_once(SM_PATH . 'functions/imap_general.php');
	require_once(SM_PATH . 'functions/imap_messages.php');
	require_once(SM_PATH . 'functions/i18n.php');
	require_once(SM_PATH . 'functions/mime.php');
	require_once(SM_PATH .'include/load_prefs.php');
	//require_once(SM_PATH . 'class/mime/Message.class.php');
	require_once(SM_PATH . 'class/mime.class.php');
	sqgetGlobalVar('key',       $key,           SQ_COOKIE);
	sqgetGlobalVar('username',  $username,      SQ_SESSION);
	sqgetGlobalVar('onetimepad',$onetimepad,    SQ_SESSION);
	$mailbox = 'INBOX';
}

require_once('modules/Emails/Emails.php');
require_once('include/logging.php');
require_once('include/database/PearDatabase.php');
require_once("modules/EMAILMaker/mail.php");

$local_log =& LoggerManager::getLogger('index');

$language = $_SESSION['authenticated_user_language'];
$e_mod_strings = return_specified_module_language($language, "EMAILMaker");

$esentid = $_REQUEST["esentid"];

$sql = "SELECT * FROM vtiger_emakertemplates_sent WHERE esentid = '".$esentid."'";
$result = $adb->query($sql);

$from_name = $adb->query_result($result,0,"from_name");
$from_address = $adb->query_result($result,0,"from_email");

$type = $adb->query_result($result,0,"type");
$load_subject = $adb->query_result($result,0,"subject");
$load_body = $adb->query_result($result,0,"body");
$total_emails = $adb->query_result($result,0,"total_emails");

$pdf_template_ids = $adb->query_result($result,0,"pdf_template_ids");
$pdf_language = $adb->query_result($result,0,"pdf_language");

$ids_for_pdf = $adb->query_result($result,0,"ids_for_pdf");

$attachments = $adb->query_result($result,0,"attachments");
$att_documents = $adb->query_result($result,0,"att_documents");
 
$pmodule = $adb->query_result($result,0,"pmodule"); 
        
$cc = "";
$bcc = "";

$cc_ids = "";
$bcc_ids = "";

$all_emails_count = 0;
$sent_emails_count = 0;
$sql2 = "SELECT * FROM vtiger_emakertemplates_emails WHERE esentid = '".$esentid."' AND status = '0' AND deleted = '0'";
$result2 = $adb->query($sql2);
$not_emails_sent_num = $adb->num_rows($result2); 

if ($not_emails_sent_num > 0)
{
    $Inserted_Emails = array();
            
    while($row2 = $adb->fetchByAssoc($result2))
    {
        $semailid = $row2["emailid"];
        $pid = $row2["pid"];
        $myid = $row2["email"];
        $cc = $row2["cc"];
        $bcc = $row2["bcc"];
        
        $cc_ids = $row2["cc_ids"];
        $bcc_ids = $row2["bcc_ids"];
        
        $parent_id = $row2["parent_id"];
        
        list($mycrmid,$temp) = explode("@",$myid,2);
        
        if ($mycrmid == "email")
        {
            $emailadd = $temp;
            $mycrmid = "";
            $rmodule = "";
            $track_URL = "";
        }          
        else
        {
            $emailadd = "";
            
            if ($temp == "-1")
                $rmodule = "Users";
            else
                $rmodule=getSalesEntityType($mycrmid);
        }
        
        $saved_toid = "";
        if($temp == "-1")
        {
            $emailadd = $adb->query_result($adb->pquery("select email1 from vtiger_users where id=?", array($mycrmid)),0,'email1');
            $user_full_name = getUserFullName($mycrmid);
            
            $saved_toid = $user_full_name."<".$emailadd.">"; 
        }
        else
        {
            if ($mycrmid != "")
            {
                $emailadd = getEmailToAdressat($mycrmid,$temp,$rmodule);
                
                $entityNames = getEntityName($rmodule, $mycrmid);
        	    $pname = $entityNames[$mycrmid];
                
                $saved_toid = $pname."<".$emailadd.">"; 
            }
            else
            {
                $saved_toid = $emailadd;
            }
        } 
            
        $Email_Content = new EMAILContent();
        $Email_Content->setContent($load_subject."|@{[&]}@|".$load_body, $mycrmid, $rmodule, $pid); 
        $convert_content = $Email_Content->getContent();    
        $Email_Images = $Email_Content->getEmailImages();
    
        list($subject,$body) = explode("|@{[&]}@|",$convert_content);
        
        $focus = new Emails();
        
        if ($parent_id != "")
        {
            $focus->retrieve_entity_info($parent_id,"Emails");
            $focus->id = $parent_id;
            $focus->mode = "edit";
        }
        
        $focus->column_fields["subject"] = $subject;
        $focus->column_fields["description"] = $body;
            
        if ($parent_id == "")
        {    
            $focus->filename = "";
            $focus->parent_id = "";
            $focus->parent_type = "";
            $focus->column_fields["assigned_user_id"]=$current_user->id;
            $focus->column_fields["activitytype"]="Emails";
            $focus->column_fields["date_start"]= date(getNewDisplayDate());//This will be converted to db date format in save
            $focus->column_fields["parent_id"] = $mycrmid;
            $focus->column_fields["saved_toid"] = $saved_toid;
            $focus->column_fields["ccmail"] = $cc;
            $focus->column_fields["bccmail"] = $bcc;
    
            $focus->save("Emails");
            
            if ($mycrmid != "")
            {
                $Inserted_Emails[] = $mycrmid; 
                $rel_sql = 'insert into vtiger_seactivityrel values(?,?)';
        		$rel_params = array($mycrmid,$focus->id);
        		$adb->pquery($rel_sql,$rel_params);
            }

            if ($cc_ids != "")
            {
                $CC_IDs = explode(";",$cc_ids);
                
                foreach ($CC_IDs AS $email_crm_id)
                {
                    if (!in_array($email_crm_id,$Inserted_Emails))
                    {
                        $Inserted_Emails[] = $email_crm_id; 
                        $rel_sql_2 = 'insert into vtiger_seactivityrel values(?,?)';
                		$rel_params_2 = array($email_crm_id,$focus->id);
                		$adb->pquery($rel_sql_2,$rel_params_2);
                    }
                }
            }
            
            if ($bcc_ids != "")
            {
                $BCC_IDs = explode(";",$bcc_ids);
                
                foreach ($BCC_IDs AS $email_crm_id)
                {
                    if (!in_array($email_crm_id,$Inserted_Emails))
                    {
                        $Inserted_Emails[] = $email_crm_id;
                        $rel_sql_3 = 'insert into vtiger_seactivityrel values(?,?)';
            		    $rel_params_3 = array($email_crm_id,$focus->id);
            		    $adb->pquery($rel_sql_3,$rel_params_3);
                    }    
                }
            }
            
            $parent_id = $focus->id;
        }
        else
        {
            $focus->column_fields["parent_id"] = $mycrmid;
            $focus->column_fields["saved_toid"] = $saved_toid;
            
            $focus->column_fields["ccmail"] = $cc;
            $focus->column_fields["bccmail"] = $bcc;
            
            $focus->save("Emails");
        }
       
        if ($attachments == "1")
        {
            $sql_attch = "SELECT * FROM vtiger_emakertemplates_attch WHERE esentid = '".$esentid."'";
            
            $result_attch = $adb->query($sql_attch);
            while($row_attch = $adb->fetchByAssoc($result_attch))
            {
                SaveAttachmentIntoEmail($parent_id,$row_attch["filename"],$row_attch["type"],$row_attch["file_desc"]);
            }
        }
        
        if ($att_documents != "")
        {
            saveDocumentsIntoEmail($parent_id,$att_documents);
        }
        
        if ($pdf_template_ids != "")
        {
            if ($ids_for_pdf != "") 
            {
                $IDs_for_pdf = explode(";",$ids_for_pdf);
            }
            else
            {
                $IDs_for_pdf = $pid;
            }
            
            savePDFIntoEmail($focus,$IDs_for_pdf ,$pdf_template_ids,$pdf_language,$pmodule);
        }
        
        $pos = strpos($description, '$logo$');
        if ($pos !== false)
        {
        
        	$description =str_replace('$logo$','<img src="cid:logo" />',$description);
        	$logo=1;
        } 
        
        if($temp == "-1")
        {
            $rmodule = 'Users';
            
            $mail_status = send_em_mail('Emails',$emailadd,$from_name,$from_address,$subject,$body,$cc,$bcc,'all',$parent_id,$logo,$Email_Images);
            
            
            echo $emailadd.": ";
            
            if ($mail_status == "1")
                echo $mod_strings["LBL_EMAIL_HAS_BEEN_SENT"];
            else
                echo $mail_status; 
            
            echo "<br />";
            
        }
        else
        {
        	global $site_URL, $application_unique_key;
            $emailid = $parent_id;
            
            if ($mycrmid == "")
            {
                  $mail_status = send_em_mail('Emails',$emailadd,$from_name,$from_address,$subject,$body,$cc,$bcc,'all',$parent_id,$logo,$Email_Images);
                  
            	  echo $emailadd.": ";
                  if ($mail_status == "1") 
                      echo $mod_strings["LBL_EMAIL_HAS_BEEN_SENT"];
                  else
                      echo $mail_status; 
                    
                  echo "<br />";

            }
            else
            {
                $track_URL = $site_URL."/modules/Emails/TrackAccess.php?record=$mycrmid&mailid=$emailid&app_key=$application_unique_key";
                $body = $body."<img src='".$track_URL."' alt='' width='1' height='1'>";
           
            	if($emailadd != '')
            	{
            		if(isPermitted($rmodule,'DetailView',$mycrmid) == 'yes')
            		{
            			$mail_status = send_em_mail('Emails',$emailadd,$from_name,$from_address,$subject,$body,$cc,$bcc,'all',$parent_id,$logo,$Email_Images);
            		}	
            
            		echo $emailadd.": ";
                    
                    if ($mail_status == "1") 
                        echo $mod_strings["LBL_EMAIL_HAS_BEEN_SENT"];
                    else
                        echo $mail_status; 
                    
                    echo "<br />";
            	}
            }    
        }

        $sql_u = "UPDATE vtiger_emakertemplates_emails SET email_send_date = now(), status = '1', parent_id = '".$parent_id."'";
        if ($mail_status != 1) 
        {
            $sql_u .= ", error = '".$mail_status."'";        
        }
        
        $sql_u .= " WHERE emailid = '".$semailid."'";
        $adb->query($sql_u); 
        
        if ($mail_status == 1) 
        {
            $sql_u2 = "UPDATE vtiger_emaildetails SET email_flag = 'SENT' WHERE emailid = '".$parent_id."'";
            $adb->query($sql_u2); 
            
            $sql_u2 = "UPDATE vtiger_emakertemplates_sent SET total_sent_emails = total_sent_emails + 1 WHERE esentid = '".$esentid."'";
            $adb->query($sql_u2);
            
            $sent_emails++;
        }

        unset($Email_Content);
        unset($focus);
    }
}    

echo "<br />".$sent_emails." ".$mod_strings["LBL_HAS_BEEN_SENT"]."."; 
 

?>