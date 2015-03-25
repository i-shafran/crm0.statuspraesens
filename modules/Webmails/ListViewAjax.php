<?php
/*********************************************************************************
 ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
  * ("License"); You may not use this file except in compliance with the License
  * The Initial Developer of the Original Code is FOSS Labs.
  * Portions created by FOSS Labs are Copyright (C) FOSS Labs.
  * Portions created by vtiger are Copyright (C) vtiger.
  * All Rights Reserved.
  * 
  ********************************************************************************/
//Modified By Krem on  30/05/2008  - Details  at http://creadev.net/Webmails-vTiger504

// figure out which page we are on and what mailbox we want to view

if($_REQUEST["mailbox"] && $_REQUEST["mailbox"] != "")
{
	$mailbox=$_REQUEST["mailbox"];
}
else
{
	$mailbox="INBOX";
}

if($_REQUEST["start"] && $_REQUEST["start"] != "")
{
	$start=$_REQUEST["start"];
}
else
{
	$start="1";
}
if ($start <= 0)$start=1;
$show_hidden=$_REQUEST["show_hidden"];

global $current_user;

require_once('Smarty_setup.php');
require_once("data/Tracker.php");
require_once('include/logging.php');
require_once('include/utils/utils.php');
require_once('include/utils/UserInfoUtil.php');
require_once("modules/Webmails/MailBox.php");
require_once("modules/Webmails/Webmails.php");
require_once("modules/Webmails/MailParse.php");

if(trim($_REQUEST["search_input"]) != ''){
	$searchstring = $_REQUEST["search_type"].' "'.$_REQUEST["search_input"].'"';
	$MailBox = new MailBox($mailbox,$start - 1,$searchstring);
	}
else $MailBox = new MailBox($mailbox,$start - 1);

// Check for a valid mailbox and also make sure the needed php_imap module is installed
$mods = parsePHPModules();

if(!$MailBox->mbox || !isset($mods["imap"]) || $mods["imap"] == "") {
	echo "<center><font color='red'><h3>".$mod_strings['LBL_CONFIGURE_MAIL_SETTINGS']."</h3></font></center>";
	exit();
}

// Set the system into degraded service mode where needed
$degraded_service='false';
if($MailBox->mail_protocol == "imap" || $MailBox->mail_protocol == "pop3")
	$degraded_service='true';

$save_path=$root_directory.'modules/Webmails/tmp';
$user_dir=$save_path."/".$_SESSION["authenticated_user_id"];

// Get the list of mails for this mailbox
$elist = $MailBox->mailList;
$numEmails = $elist["count"];

$mails_per_page = $MailBox->mails_per_page;

// Calculate paging information ahead before retrieving overviews
if($start == 1 || $start == "") {
	$start_message=$numEmails;
} else {
	$start_message=($numEmails-(($start-1)*$mails_per_page));
}

$c=$numEmails;

$numPages = ceil($numEmails/$MailBox->mails_per_page);
if($numPages > 1) {
	if($start != 1){
		$navigationOutput = "<a href='javascript:;' onClick=\"cal_navigation('".$mailbox."',1);\" ><img src='modules/Webmails/images/start.gif' border='0'></a>&nbsp;&nbsp;";
		$navigationOutput .= "<a href='javascript:;' onClick=\"cal_navigation('".$mailbox."',".($start-1).");\" ><img src='modules/Webmails/images/previous.gif' border='0'></a> &nbsp;";
	}
	if($start <= ($numPages-1)){
		$navigationOutput .= "<a href='javascript:;' onClick=\"cal_navigation('".$mailbox."',".($start+1).");\" ><img src='modules/Webmails/images/next.gif' border='0'></a>&nbsp;&nbsp;";
				$navigationOutput .= "<a href='javascript:;' onClick=\"cal_navigation('".$mailbox."',".$numPages.");\"><img src='modules/Webmails/images/end.gif' border='0'></a> &nbsp;";
	}
}

$js_array = "";
$overview=$elist["overview"];
$mails = array();
if (is_array($overview))
{
        foreach ($overview as $val)
        { 
                $mails[$val->msgno] = $val;
                $hdr = @imap_headerinfo($MailBox->mbox, $val->msgno);
                $val->from = utf8_decode(utf8_encode(imap_utf8(addslashes($val->from))));
                $val->to = utf8_decode(utf8_encode(imap_utf8(addslashes($val->to))));
// SalesPlatform.ru begin
                $val->subject = strip_tags(iconv_mime_decode($val->subject, 0, "UTF-8"));
                //$val->subject = utf8_decode(utf8_encode(imap_utf8($val->subject)));
// SalesPlatform.ru end
		$to = str_replace("<",":",$val->to);
		$to_list = str_replace(">","",$to);
		$from = str_replace("<",":",$val->from);
		$from_list = str_replace(">","",$from);
		$cc = str_replace("<",":",$hdr->ccaddress);
		$cc_list = str_replace(">","",$cc);
		/*$js_array .= "webmail2[".$val->msgno."] = new Array();";
		$js_array .= "webmail2[".$val->msgno."]['from'] = '".addslashes($from_list)."';";
		$js_array .= "webmail2[".$val->msgno."]['to'] = '".addslashes($to_list)."';";
		$js_array .= "webmail2[".$val->msgno."]['subject'] = '".addslashes($val->subject)."';";
		$js_array .= "webmail2[".$val->msgno."]['date'] = '".addslashes($val->date)."';";
		$js_array .= "webmail2[".$val->msgno."]['cc'] = '".$cc_list."';";*/
	}
}
$search_fields = Array("SUBJECT","BODY","TO","CC","BCC","FROM");
$listview_header = array("<th class='tableHeadBg' width='10%'>".$mod_strings['LBL_INFO']."</th>","<th class='tableHeadBg' width='45%'>".$mod_strings['LBL_LIST_SUBJECT']."</th>","<th class='tableHeadBg' width='25%'>".$mod_strings['LABEL_DATE']."</th>","<th class='tableHeadBg' width='10%'>".$mod_strings['LABEL_FROM']."</th>","<th class='tableHeadBg' >".$mod_strings['LBL_DEL']."</th>");
$listview_entries = array();

$displayed_msgs=0;

if(($numEmails) <= 0)
	$listview_entries[0][] = '<td colspan="6" width="100%" align="center"><b>'.$mod_strings['LBL_NO_EMAILS'].'</b></td>';
else {

	if($_REQUEST["search_input"] != '') {
		for($l=$MailBox->mails_per_page-1;$l>=0;$l--){ 
			if($overview[$l]->msgno!="")
				$listview_entries[] = show_msg($mails,$overview[$l]->msgno);
		}
	}else{
		$i=1;
		while ($i<=$MailBox->mails_per_page) {
			if($start_message > 0){
				$listview_entries[] = show_msg($mails,$start_message);
				$start_message--;
			}
			$i++;
		}
	}

	flush();
	// MAIN LOOP
	// Main loop to create listview entries

}

$search_html = '<select name="optionSel" class="importBox" id="search_type">';
foreach($search_fields as $searchfield)
{
	if($_REQUEST['search_type'] == $searchfield)
		$search_html .= '<option selected value="'.$searchfield.'">'.$mod_strings["IN"].' '.$mod_strings[$searchfield].'</option>';
	else
		$search_html .= '<option value="'.$searchfield.'">'.$mod_strings["IN"].' '.$mod_strings[$searchfield].'</option>';
			
}
$search_html .= '</select>';

// Build folder list and move_to dropdown box
$list = imap_getmailboxes($MailBox->mbox, "{".$MailBox->imapServerAddress."}", "*");
sort($list);
$i=0;
if (is_array($list)) {
      	$boxes = '<select name="mailbox" id="mailbox_select" onChange="move_messages();">';
        $boxes .= '<option value="move_to" SELECTED>'.$mod_strings['LBL_MOVE_TO'].'</option>';
	foreach ($list as $key => $val) {
		$tmpval = preg_replace(array("/\{.*?\}/i"),array(""),$val->name);
                // SalesPlatform.ru begin
                //$tmpval_utf8 = iconv('UTF-7', 'UTF-8', str_replace('&', '+', str_replace(',', '/', $tmpval)));
                $tmpval_utf8 = mb_convert_encoding($tmpval, "UTF-8", "UTF7-IMAP");
                // SalesPlatform.ru end
		if(preg_match("/trash/i",$tmpval))
			$img = "webmail_trash.gif";
		elseif($_REQUEST["mailbox"] == $tmpval)
			$img = "opened_folder.gif";
		else
			$img = "folder.gif";

                // SalesPlatform.ru begin
                $img_src = 'themes/'.$theme.'/images/'.$img;
                if (!file_exists($img_src)) {
                    // Default path for images
                    $img_src = 'themes/images/'.$img;
                }
                // SalesPlatform.ru end
                
		$i++;

		if($_REQUEST["mailbox"] == '')
			$_REQUEST["mailbox"] = 'INBOX';

			$box = imap_status($MailBox->mbox, "{".$MailBox->imapServerAddress."}".$tmpval, SA_ALL);
			$_SESSION["mailboxes"][$tmpval] = $box->unseen;
			if($tmpval[0] != ".")
			{
				if($box->messages==0) {$num=$box->messages;} else {$num=($box->messages-1);}
				// SalesPlatform.ru begin
				//$boxes .= '<option value="'.$tmpval.'">'.$tmpval;
				$boxes .= '<option value="'.$tmpval.'">'.$tmpval_utf8;
				// SalesPlatform.ru end
                                // SalesPlatform.ru begin
				$folders .= '<li ><img src="'.$img_src.'" align="absmiddle" />&nbsp;&nbsp;<a href="javascript:changeMbox(\''.$tmpval.'\',\''.$tmpval_utf8.'\');" class="small">'.$tmpval_utf8.'</a>&nbsp;<span id="'.$tmpval.'_count" style="font-weight:bold">';
				//$folders .= '<li ><img src="themes/'.$theme.'/images/'.$img.'" align="absmiddle" />&nbsp;&nbsp;<a href="javascript:changeMbox(\''.$tmpval.'\');" class="small">'.$tmpval.'</a>&nbsp;<span id="'.$tmpval.'_count" style="font-weight:bold">';
                                // SalesPlatform.ru end
				if($box->unseen > 0)
					$folders .= '(<span id="'.$tmpval.'_unread">'.$box->unseen.'</span>)</span></li>';
				else
					$folders .='</span></li>';
			}
	}
        $boxes .= '</select>';
}
imap_close($MailBox->mbox);
$smarty = new vtigerCRM_Smarty;
$smarty->assign("MOD", $mod_strings);
$smarty->assign("UNREAD_COUNT",$unread_msgs);
$smarty->assign("LISTENTITY", $listview_entries);
$smarty->assign("LISTHEADER", $listview_header);
$smarty->assign("NAVIGATION", $navigationOutput);
$smarty->assign("FOLDER_SELECT", $boxes);
$smarty->assign("NUM_EMAILS", $numEmails);
$smarty->assign("MAILBOX", $MailBox->mailbox);
// SalesPlatform.ru begin
$smarty->assign("MAILBOX_DISPLAY", mb_convert_encoding($MailBox->mailbox, "UTF-8", "UTF7-IMAP"));
// SalesPlatform.ru end
$smarty->assign("ACCOUNT", $MailBox->display_name);
$smarty->assign("BOXLIST",$folders);
$smarty->assign("MAIL_INFO",$js_array);
$smarty->display("ListViewAjax.tpl");
?>
