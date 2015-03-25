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

include_once dirname(__FILE__) . '/SPSocialConnector.php';

global $theme, $currentModule, $mod_strings, $app_strings, $current_user;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

$smarty = new vtigerCRM_Smarty();
$smarty->assign("IMAGE_PATH",$image_path);
$smarty->assign("APP", $app_strings);
$smarty->assign("MOD", $mod_strings);

$excludedRecords=vtlib_purify($_REQUEST['excludedRecords']);
$idstring = vtlib_purify($_REQUEST['idstring']);
$idstring = trim($idstring, ';');
$idlist = getSelectedRecords($_REQUEST,$_REQUEST['sourcemodule'],$idstring,$excludedRecords);//explode(';', $idstring);

$sourcemodule = vtlib_purify($_REQUEST['sourcemodule']);

$urlfields = vtlib_purify($_REQUEST['urlfields']);
$urlfields = trim($urlfields, ';');

$smarty->assign('URLFIELDS', $urlfields);
$smarty->assign('IDSTRING', $idstring);
$smarty->assign('SOURCEMODULE', $sourcemodule);
$smarty->assign('excludedRecords',$excludedRecords);
$smarty->assign('VIEWID',$_REQUEST['viewname']);
$smarty->assign('SEARCHURL',$_REQUEST['searchurl']);

$smarty->display(vtlib_getModuleTemplate($currentModule, 'SPSocialConnectorComposeWizard.tpl'));

?>