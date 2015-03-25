/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

// SalesPlatform.ru begin added SPPayments
function set_return_sppayments(id, name, module, total, payer_id, payer_name, forfield) {
        var domnode_id = window.opener.document.EditView[forfield];
        var domnode_display = window.opener.document.EditView[forfield+'_display'];
        if(domnode_id) domnode_id.value = id;
        if(domnode_display) domnode_display.value = name;
        
        var payer_field = 'payer';
        var domnode_payer_id = window.opener.document.EditView[payer_field];
        var domnode_payer_name = window.opener.document.EditView[payer_field+'_display'];
        if(domnode_payer_id) domnode_payer_id.value = payer_id;
        if(domnode_payer_name) domnode_payer_name.value = payer_name;
        
        var type_field = 'payer_type';
        var domnode_type_name = window.opener.document.EditView[type_field];
        if (module == 'PurchaseOrder') {
            if(domnode_type_name) domnode_type_name.value = 'Vendors';
        } else {
            if(domnode_type_name) domnode_type_name.value = 'Accounts';
        }
        
        if(document.getElementById('from_link').value != '') {
            window.opener.document.QcEditView.amount.value = total;
        } else {
            window.opener.document.EditView.amount.value = total;
        }
}
// SalesPlatform.ru end