<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  SalesPlatform vtiger CRM Open Source
 * The Initial Developer of the Original Code is SalesPlatform.
 * Portions created by SalesPlatform are Copyright (C) SalesPlatform.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'include/SalesPlatform/PDF/ProductListPDFController.php';
require_once 'modules/Potentials/Potentials.php';

class SalesPlatform_QuotePDFController extends SalesPlatform_PDF_ProductListDocumentPDFController{

	function buildDocumentModel() {
	
		$model = parent::buildDocumentModel();
	
		$this->generateEntityModel($this->focus, 'Quotes', 'quote_', $model);

                $entity = new Potentials();
		if($this->focusColumnValue('potential_id'))
            	    $entity->retrieve_entity_info($this->focusColumnValue('potential_id'), 'Potentials');
                $this->generateEntityModel($entity, 'Potentials', 'potential_', $model);

                $entity = new Accounts();
		if($this->focusColumnValue('account_id'))
            	    $entity->retrieve_entity_info($this->focusColumnValue('account_id'), 'Accounts');
                $this->generateEntityModel($entity, 'Accounts', 'account_', $model);

                $entity = new Contacts();
		if($this->focusColumnValue('contact_id'))
            	    $entity->retrieve_entity_info($this->focusColumnValue('contact_id'), 'Contacts');
                $this->generateEntityModel($entity, 'Contacts', 'contact_', $model);

		$model->set('quote_no', $this->focusColumnValue('quote_no'));
		return $model;
	}

	function getWatermarkContent() {
		return '';
	}

}
?>
