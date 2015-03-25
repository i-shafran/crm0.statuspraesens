<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *
 ********************************************************************************/
include_once 'modules/Consignment/SPConsignmentPDFController.php';
global $currentModule;

$controller = new SalesPlatform_ConsignmentPDFController($currentModule, $_REQUEST['pdf_template']);
$controller->loadRecord(vtlib_purify($_REQUEST['record']));
$consignment_no = getModuleSequenceNumber($currentModule,vtlib_purify($_REQUEST['record']));
if(isset($_REQUEST['savemode']) && $_REQUEST['savemode'] == 'file') {
	$id = vtlib_purify($_REQUEST['record']);
	$filepath='test/product/'.$id.'_consignment_'.$consignment_no.'.pdf';
	$controller->Output($filepath,'F'); //added file name to make it work in IE, also forces the download giving the user the option to save
} else {
	$controller->Output('Consignment_'.$consignment_no.'.pdf', 'D');//added file name to make it work in IE, also forces the download giving the user the option to save
	exit();
}

?>
