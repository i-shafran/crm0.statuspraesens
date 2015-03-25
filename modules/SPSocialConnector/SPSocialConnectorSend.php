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
              
global $currentModule, $mod_strings, $app_strings, $current_user, $adb;

$excludedRecords=vtlib_purify($_REQUEST['excludedRecords']);
$idstring = vtlib_purify($_REQUEST['idstring']);

// SalesPlatform.ru begin : Send message to all Records from current filter
$sourcemodule = vtlib_purify($_REQUEST['sourcemodule']);
if (strcmp(trim($idstring), "-1;-1") == 0) {
    $idstring = implode(';', get_filtered_ids($sourcemodule));
}
// SalesPlatform.ru end

$idstring = trim($idstring, ';');
$idlist = getSelectedRecords($_REQUEST,$_REQUEST['sourcemodule'],$idstring,$excludedRecords);//explode(';', $idstring);

$sourcemodule = vtlib_purify($_REQUEST['sourcemodule']);
$message = vtlib_purify($_REQUEST['message']);

$urlfields = vtlib_purify($_REQUEST['urlfields']);
$urlfields = trim($urlfields, ';');
$urlfieldlist = explode(';', $urlfields);

$to_urls = array();
$recordids = array();

foreach($idlist as $recordid) {
    $focusInstance = CRMEntity::getInstance($sourcemodule);
    $focusInstance->retrieve_entity_info($recordid, $sourcemodule);
    $numberSelected = false;
    foreach($urlfieldlist as $fieldname) {
        if(!empty($focusInstance->column_fields[$fieldname])) {
            $to_urls[] = $focusInstance->column_fields[$fieldname];
            $recordids[] = $recordid;
            $numberSelected = true;
        }
    }
}


if(!empty($to_urls)) {
    SPSocialConnector::saveMsg($message, $to_urls, $current_user->id, $recordids, $sourcemodule);	
}

// Check: if more than 1 social net was selescted 
if(count($to_urls)==1) {
    $toURL = $to_urls[0];
    $URLfields = $urlfieldlist[0];
} else {
    $toURL = $to_urls[0];
    $URLfields = $urlfieldlist[0];
    for ($i = 1; $i < count($to_urls); $i++) {
        $toURL = $toURL.",".$to_urls[$i];
        $URLfields = $URLfields.",".$urlfieldlist[$i];
    } 
}

// Make response to js 
echo 'text='.$message.'&URL='.$toURL;

?>
