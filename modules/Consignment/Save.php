<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the 
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 ********************************************************************************/

require_once('modules/Consignment/Consignment.php');
require_once('include/logging.php');
require_once('include/database/PearDatabase.php');
include_once("modules/Emails/mail.php");

$local_log =& LoggerManager::getLogger('index');

$focus = new Consignment();
//added to fix 4600
$search=vtlib_purify($_REQUEST['search_url']);

global $current_user;
setObjectValuesFromRequest($focus);

$focus->column_fields['currency_id'] = $_REQUEST['inventory_currency'];
$cur_sym_rate = getCurrencySymbolandCRate($_REQUEST['inventory_currency']);
$focus->column_fields['conversion_rate'] = $cur_sym_rate['rate'];

if($_REQUEST['assigntype'] == 'U')  {
	$focus->column_fields['assigned_user_id'] = $_REQUEST['assigned_user_id'];
} elseif($_REQUEST['assigntype'] == 'T') {
	$focus->column_fields['assigned_user_id'] = $_REQUEST['assigned_group_id'];
}

// Auto-generation for goods consignment no
if($focus->column_fields['has_goods_consignment'] == 'on' &&
        (empty($focus->column_fields['goods_consignment_no']) ||
                $focus->column_fields['goods_consignment_no'] == 0)) {
    global $adb;
    $res = $adb->query('select max(goods_consignment_no) as max_no from vtiger_sp_consignment
        join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_sp_consignment.consignmentid
        where vtiger_crmentity.deleted=0');
    if($adb->num_rows($res) > 0) {
        $focus->column_fields['goods_consignment_no'] =
                $adb->query_result($res, 0, 'max_no') + 1;
    } else {
        $focus->column_fields['goods_consignment_no'] = 1;
    }

}

$focus->save("Consignment");

// SalesPlatform.ru begin: Added convert Invoice to Consignment
if($_REQUEST['convert_from'] == 'invoicetoconsignment' &&
        isset($_REQUEST['return_id']) && $_REQUEST['return_id'] != '') {
    $invoiceid = vtlib_purify($_REQUEST['return_id']);

    global $adb;
    $adb->pquery('update vtiger_invoice set sp_consignment_id=? where invoiceid=?',
            array($focus->id, $invoiceid));
}
// SalesPlatform.ru end

$return_id = $focus->id;

$parenttab = getParentTab();
if(isset($_REQUEST['return_module']) && $_REQUEST['return_module'] != "") $return_module = vtlib_purify($_REQUEST['return_module']);
else $return_module = "Consignment";
if(isset($_REQUEST['return_action']) && $_REQUEST['return_action'] != "") $return_action = vtlib_purify($_REQUEST['return_action']);
else $return_action = "DetailView";
if(isset($_REQUEST['return_id']) && $_REQUEST['return_id'] != "") $return_id = vtlib_purify($_REQUEST['return_id']);

$local_log->debug("Saved record with id of ".$return_id);

//code added for returning back to the current view after edit from list view
if($_REQUEST['return_viewname'] == '') $return_viewname='0';
if($_REQUEST['return_viewname'] != '')$return_viewname=vtlib_purify($_REQUEST['return_viewname']);

header("Location: index.php?action=$return_action&module=$return_module&parenttab=$parenttab&record=$return_id&viewname=$return_viewname&start=".vtlib_purify($_REQUEST['pagenumber']).$search);
?>