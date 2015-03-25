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

global $currentModule, $app_strings;

$smarty = new vtigerCRM_Smarty();

$sourcemodule = vtlib_purify($_REQUEST['sourcemodule']);
$recordid = vtlib_purify($_REQUEST['recordid']);

$smarty->assign("APP", $app_strings);
$smarty->assign('SOURCEMODULE', $sourcemodule);
$smarty->assign('RECORDID',$recordid);

$smarty->display(vtlib_getModuleTemplate($currentModule, 'SPSocialConnectorEnterUrlWizard.tpl'));

?>