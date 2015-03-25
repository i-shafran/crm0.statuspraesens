<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/
require_once('Smarty_setup.php');
require_once("data/Tracker.php");
require_once('include/logging.php');
require_once('include/ListView/ListView.php');
require_once('include/utils/utils.php');
require_once( "SPSocialConnectorAdditional.php" );
include_once dirname(__FILE__) . '/SPSocialConnector.php';

global $app_strings, $default_charset;
global $currentModule, $current_user;
global $theme, $adb;

$smarty = new vtigerCRM_Smarty();

$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
$smarty->assign("MOD", $mod_strings);
$smarty->assign("APP", $app_strings);
$smarty->assign("THEME", $theme);
$smarty->assign("THEME_PATH",$theme_path);
$smarty->assign("MODULE",$currentModule);

$popuptype = vtlib_purify($_REQUEST["popuptype"]);

if( $popuptype == 'send_msg') {
    
    $url = vtlib_purify($_REQUEST["URL"]);
    $text = vtlib_purify($_REQUEST["text"]);
    $fl_empty_field = true;
    if(!empty($url)) {
        $url = trim($url, ',');
        $urllist = explode(',', $url);
     
        for ($i = 0; $i < count($urllist); $i++) {
            $response[$i] = SPSocialConnectorAdditional::parseURL($urllist[$i]);
            $res[$i] = SPSocialConnectorAdditional::hybridauthSend($response[$i]->id,$text,$response[$i]->domen);
        } 
        
        for($i = 0; $i < count($urllist); $i++){
            SPSocialConnectorAdditional::saveStatusMSG( $response[$i]->domen, $res[$i] );
        }
        
        $smarty->assign("RES",$res);
        $fl_empty_field = false;
    } 
    
    $smarty->assign("FL_EMPTY_FIELD",$fl_empty_field);
    
    $smarty->display(vtlib_getModuleTemplate($currentModule, 'SPSocialConnectorSendMsg.tpl'));
   
}

if( $popuptype == 'load_profile') {
    
    $url = vtlib_purify($_REQUEST["URL"]);
    $module = vtlib_purify($_REQUEST["sourcemodule"]);
    $recordid = vtlib_purify($_REQUEST["recordid"]);
    
    $response = array();
    $user_profile = array();

    $response = SPSocialConnectorAdditional::parseURL($url);

    $user_profile = SPSocialConnectorAdditional::hybridauthUserProfile($response->id, $response->domen);
    
    $smarty->assign("SOURCEMODULE",$module);
    $smarty->assign("RECORDID",$recordid);
    
    $smarty->assign("PHOTOURL",$user_profile->photoURL);
    $smarty->assign("FIRSTNAME",$user_profile->firstName);
    $smarty->assign("LASTNAME",$user_profile->lastName);
    $smarty->assign("PROVIDER",$user_profile->provider);
    $smarty->assign("IDENTIFIER",$user_profile->identifier);
    $smarty->assign("WEBSITEURL",$user_profile->webSiteURL);
    $smarty->assign("BIRTHDAY",$user_profile->birthDay);
    $smarty->assign("BIRTHMONTH",$user_profile->birthMonth);
    $smarty->assign("BIRTHYEAR",$user_profile->birthYear);
    $smarty->assign("GENDER",$user_profile->gender);
    $smarty->assign("EMAIL",$user_profile->email);
    $smarty->assign("MOBILEPHONE",$user_profile->mobilePhone);
    $smarty->assign("HOMEPHONE",$user_profile->homePhone);
    $smarty->assign("REGION",$user_profile->region);
    
    $smarty->display(vtlib_getModuleTemplate($currentModule, 'SPSocialConnectorLoadProfile.tpl'));
    
}
?>
