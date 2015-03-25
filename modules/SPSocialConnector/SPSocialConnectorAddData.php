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

$addField = array();
$addData = array();
$changedFields = array();
$changedData = array();

$module = $_POST['sourcemodule'];
$recordid = $_POST['recordid'];

if(!(empty($_POST['birthDay'])) && !(empty($_POST['birthMonth'])) && !(empty($_POST['birthYear']))){
    $date = $_POST['birthDay'].'-'.$_POST['birthMonth'].'-'.$_POST['birthYear'];
    $date = date('Y-m-d', strtotime($date));
} else {
    $date = NULL;
}

$region = trim($_POST['region'], ',');
$regionlist = explode(',', $region);

$profileFromSocialNet->firstName = $_POST['firstName'];
$profileFromSocialNet->lastName = $_POST['lastName'];
$profileFromSocialNet->webSite = $_POST['webSiteURL'];
$profileFromSocialNet->birthDay = $date;
$profileFromSocialNet->email = $_POST['email'];
$profileFromSocialNet->mobilePhone = $_POST['mobilePhone'];
$profileFromSocialNet->homePhone = $_POST['homePhone'];
$profileFromSocialNet->city = $regionlist[0];
$profileFromSocialNet->country = $regionlist[1];

$response = SPSocialConnectorAdditional::addDataByModule( $module, $recordid, $profileFromSocialNet);

for ($i = 0; $i < count($response->response); $i++) {
    $changedFields[$i] = $response->response[$i]->index;
    $changedData[$i] = $response->response[$i]->value;
} 

if(empty($changedFields)){
    $flag = true;
} else {
    $flag = false;
}

$smarty->assign("FLAG", $flag);
$smarty->assign("FIELDS", $changedFields);
$smarty->assign("DATA", $changedData);

$smarty->display(vtlib_getModuleTemplate($currentModule, 'SPSocialConnectorAddData.tpl'));

?>