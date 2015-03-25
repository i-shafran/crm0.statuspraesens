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
require_once("include/utils/utils.php");
require_once("modules/com_vtiger_workflow/VTWorkflowUtils.php");

// Operation to be restricted for non-admin users.
global $current_user;
    $smarty->display(vtlib_getModuleTemplate('Vtiger','OperationNotPermitted.tpl'));	
?>