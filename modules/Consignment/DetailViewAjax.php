<?php
/*+********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *********************************************************************************/

require_once('include/logging.php');
require_once('include/database/PearDatabase.php');
global $adb;

$local_log =& LoggerManager::getLogger('ConsignmentAjax');
global $currentModule;
$modObj = CRMEntity::getInstance($currentModule);

$ajaxaction = $_REQUEST["ajxaction"];
if($ajaxaction == "DETAILVIEW")
{
	$crmid = $_REQUEST["recordid"];
	$tablename = $_REQUEST["tableName"];
	$fieldname = $_REQUEST["fldName"];
	$fieldvalue = utf8RawUrlDecode($_REQUEST["fieldValue"]); 

	if($crmid != "")
	{
		$modObj->retrieve_entity_info($crmid,"Consignment");
		$modObj->column_fields[$fieldname] = $fieldvalue;
		$modObj->id = $crmid;
		$modObj->mode = "edit";

                // Auto-generation for goods consignment no
                if(($modObj->column_fields['has_goods_consignment'] == 'on' ||
                        $modObj->column_fields['has_goods_consignment'] == 1) &&
                        (empty($modObj->column_fields['goods_consignment_no']) ||
                                $modObj->column_fields['goods_consignment_no'] == 0)) {
                    global $adb;
                    $res = $adb->query('select max(goods_consignment_no) as max_no from vtiger_sp_consignment
                        join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_sp_consignment.consignmentid
                        where vtiger_crmentity.deleted=0');
                    if($adb->num_rows($res) > 0) {
                        $modObj->column_fields['goods_consignment_no'] =
                                $adb->query_result($res, 0, 'max_no') + 1;
                    } else {
                        $modObj->column_fields['goods_consignment_no'] = 1;
                    }

                }

                $modObj->save("Consignment");
		if($modObj->id != "")
		{
			echo ":#:SUCCESS";
		}else
		{
			echo ":#:FAILURE";
		}   
	}else
	{
		echo ":#:FAILURE";
	}
} elseif($ajaxaction == "LOADRELATEDLIST" || $ajaxaction == "DISABLEMODULE"){
	require_once 'include/ListView/RelatedListViewContents.php';
}
?>