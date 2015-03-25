<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/
require_once('include/database/PearDatabase.php');
@include_once('user_privileges/default_module_view.php');

global $adb, $singlepane_view, $currentModule;
$idlist            = vtlib_purify($_REQUEST['idlist']);
$destinationModule = vtlib_purify($_REQUEST['destination_module']);
$parenttab         = getParentTab();

$forCRMRecord = vtlib_purify($_REQUEST['parentid']);
$mode = $_REQUEST['mode'];

if($singlepane_view == 'true')
    $action = "DetailView";
else
    $action = "CallRelatedList";

$focus = CRMEntity::getInstance($currentModule);

if($mode == 'delete') {
    // Split the string of ids
    $ids = explode (";",$idlist);
    if(!empty($ids)) {
            $focus->delete_related_module($currentModule, $forCRMRecord, $destinationModule, $ids);
    }
} else {
    if(!empty($_REQUEST['idlist'])) {
            // Split the string of ids
            $ids = explode (";",trim($idlist,";"));
    } else if(!empty($_REQUEST['entityid'])){
            $ids = $_REQUEST['entityid'];
    }
    if(!empty($ids)) {
            relateEntities($focus, $currentModule, $forCRMRecord, $destinationModule, $ids);
    }
}
header("Location: index.php?module=$currentModule&record=$forCRMRecord&action=$action&parenttab=$parenttab");
?>