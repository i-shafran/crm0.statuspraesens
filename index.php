<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

//Overrides GetRelatedList : used to get related query
//TODO : Eliminate below hacking solution
include_once 'include/Webservices/Relation.php';
include_once 'vtlib/Vtiger/Module.php';
include_once 'includes/main/WebUI.php';

// Custom
include_once 'classes/AutoLoader.php';

$webUI = new Vtiger_WebUI();
$webUI->process(new Vtiger_Request($_REQUEST, $_REQUEST));

// Для авторизации в REST api
global $current_user;
setcookie("user_key", $current_user->column_fields["accesskey"], 0, "/", $_SERVER["SERVER_NAME"]);
