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

global $theme, $currentModule, $mod_strings, $app_strings, $current_user, $adb;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

$smarty = new vtigerCRM_Smarty();
$smarty->assign("IMAGE_PATH",$image_path);
$smarty->assign("APP", $app_strings);
$smarty->assign("MOD", $mod_strings);
$smarty->assign("MODULE", $currentModule);
$smarty->assign("IS_ADMIN", is_admin($current_user));

$excludedRecords=vtlib_purify($_REQUEST['excludedRecords']);
$idstring = vtlib_purify($_REQUEST['idstring']);
$idstring = trim($idstring, ';');
$idlist = getSelectedRecords($_REQUEST,$_REQUEST['sourcemodule'],$idstring,$excludedRecords);//explode(';', $idstring);

$sourcemodule = vtlib_purify($_REQUEST['sourcemodule']);

$capturedFieldInfo = array();
$capturedFieldNames = array();

// Analyze the url fields for the selected module.
$urlTypeFieldsResult = $adb->pquery("SELECT fieldid,fieldname,fieldlabel FROM vtiger_field WHERE uitype=17 AND tabid=? AND presence in (0,2)", array(getTabid($sourcemodule)));
if($urlTypeFieldsResult && $adb->num_rows($urlTypeFieldsResult)) {
    while($resultrow = $adb->fetch_array($urlTypeFieldsResult)) {
        $checkFieldPermission = getFieldVisibilityPermission( $sourcemodule, $current_user->id, $resultrow['fieldname'] );
        if($checkFieldPermission == '0') {
            $fieldlabel = getTranslatedString( $resultrow['fieldlabel'], $sourcemodule );
            $capturedFieldNames[] = $resultrow['fieldname'];
            $capturedFieldInfo[$resultrow['fieldid']] = array($fieldlabel => $resultrow['fieldname']);
        }
    }
}

$capturedFieldValues = array();

// If single record is selected, good to show the numbers also in the wizard.
if(count($idlist) === 1) {
    $focusInstance = CRMEntity::getInstance($sourcemodule);
    $focusInstance->retrieve_entity_info($idlist[0], $sourcemodule);
    foreach($capturedFieldNames as $fieldname) {
        if(isset($focusInstance->column_fields[$fieldname])) {
                $capturedFieldValues[$fieldname] = $focusInstance->column_fields[$fieldname];
        }
    }		
}

$smarty->assign('URLFIELDS', $capturedFieldInfo);
$smarty->assign('FIELDVALUES', $capturedFieldValues);
$smarty->assign('IDSTRING', $idstring);

// SalesPlatform.ru begin : Send message to all Records from current filter
$smarty->assign("IDSTRING_SIZE", count($idlist));
// SalesPlatform.ru end

$smarty->assign('SOURCEMODULE', $sourcemodule);
$smarty->assign('excludedRecords',$excludedRecords);
$smarty->assign('VIEWID',$_REQUEST['viewname']);
$smarty->assign('SEARCHURL',$_REQUEST['searchurl']);

$smarty->display(vtlib_getModuleTemplate($currentModule, 'SPSocialConnectorSelectWizard.tpl'));

?>
