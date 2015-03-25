<?php /* Smarty version 2.6.18, created on 2014-08-16 01:05:06
         compiled from modules/PDFMaker/PDFMakerActions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sizeof', 'modules/PDFMaker/PDFMakerActions.tpl', 33, false),array('modifier', 'vtiger_imageurl', 'modules/PDFMaker/PDFMakerActions.tpl', 54, false),array('function', 'html_options', 'modules/PDFMaker/PDFMakerActions.tpl', 37, false),)), $this); ?>
<?php if ($this->_tpl_vars['ENABLE_EMAILMAKER'] != 'true'): ?>
    <?php $this->assign('EMAIL_FUNCTION', 'sendPDFmail'); ?>
<?php else: ?>
    <?php $this->assign('EMAIL_FUNCTION', 'sendEMAILMakerPDFmail'); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['ENABLE_PDFMAKER'] == 'true'): ?>
    <table border=0 cellspacing=0 cellpadding=0 style="width:100%;">
        <?php if ($this->_tpl_vars['CRM_TEMPLATES_EXIST'] == '0'): ?>
            <tr>
                <td class="rightMailMergeContent"  style="width:100%;">
                    <select name="use_common_template" id="use_common_template" class="detailedViewTextBox" multiple style="width:90%;" size="5">
                        <?php $_from = ($this->_tpl_vars['CRM_TEMPLATES']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tplForeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tplForeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['templateid'] => $this->_tpl_vars['itemArr']):
        $this->_foreach['tplForeach']['iteration']++;
?>
                            <?php if ($this->_tpl_vars['itemArr']['is_default'] == '1' || $this->_tpl_vars['itemArr']['is_default'] == '3'): ?>
                                <option value="<?php echo $this->_tpl_vars['templateid']; ?>
" selected="selected"><?php echo $this->_tpl_vars['itemArr']['templatename']; ?>
</option>
                            <?php else: ?>
                                <option value="<?php echo $this->_tpl_vars['templateid']; ?>
"><?php echo $this->_tpl_vars['itemArr']['templatename']; ?>
</option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>        
                </td>
            </tr>

            <?php if (sizeof($this->_tpl_vars['TEMPLATE_LANGUAGES']) > 1): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">    	
                        <select name="template_language" id="template_language" class="detailedViewTextBox" style="width:90%;" size="1">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['TEMPLATE_LANGUAGES'],'selected' => $this->_tpl_vars['CURRENT_LANGUAGE']), $this);?>

                        </select>
                    </td>
                </tr>
            <?php else: ?>
                <?php $_from = ($this->_tpl_vars['TEMPLATE_LANGUAGES']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_key'] => $this->_tpl_vars['lang']):
?>
                    <input type="hidden" name="template_language" id="template_language" value="<?php echo $this->_tpl_vars['lang_key']; ?>
"/>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
                        <tr>
                <td class="rightMailMergeContent"  style="width:100%;">   		    
                    <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else if ((navigator.userAgent.match(/iPad/i) != null) || (navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null))
                                window.open('index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value);
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;" class="webMnu"><img src="<?php echo vtiger_imageurl('actionGeneratePDF.gif', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
                    <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else if ((navigator.userAgent.match(/iPad/i) != null) || (navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null))
                                window.open('index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value);
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;"><?php echo $this->_tpl_vars['APP']['LBL_EXPORT_TO_PDF']; ?>
</a>
                </td>
            </tr>
                        <?php if ($this->_tpl_vars['SEND_EMAIL_PDF_ACTION'] == '1'): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">  			
                        <a href="javascript:;" onclick="fnvshobj(this, 'sendpdfmail_cont');<?php echo $this->_tpl_vars['EMAIL_FUNCTION']; ?>
('<?php echo $this->_tpl_vars['MODULE']; ?>
', '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="<?php echo vtiger_imageurl('PDFMail.gif', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="fnvshobj(this, 'sendpdfmail_cont');<?php echo $this->_tpl_vars['EMAIL_FUNCTION']; ?>
('<?php echo $this->_tpl_vars['MODULE']; ?>
', '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['APP']['LBL_SEND_EMAIL_PDF']; ?>
</a>
                        <div id="sendpdfmail_cont" style="z-index:100001;position:absolute;"></div>
                    </td>
                </tr>
            <?php endif; ?>
                        
            <?php if ($this->_tpl_vars['EDIT_AND_EXPORT_ACTION'] == '1'): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">   		    
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else
                                openPopUp('PDF', this, 'index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=PDFMakerAjax&file=CreatePDFFromTemplate&mode=content&record=<?php echo $this->_tpl_vars['ID']; ?>
&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value, '', '900', '800', 'menubar=no,toolbar=no,location=no,status=no,resizable=yes,scrollbars=yes');" class="webMnu"><img src="<?php echo vtiger_imageurl('modules/PDFMaker/img/PDF_edit.png', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else
                                openPopUp('PDF', this, 'index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=PDFMakerAjax&file=CreatePDFFromTemplate&mode=content&record=<?php echo $this->_tpl_vars['ID']; ?>
&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value, '', '900', '800', 'menubar=no,toolbar=no,location=no,status=no,resizable=yes,scrollbars=yes');" class="webMnu"><?php echo $this->_tpl_vars['APP']['LBL_EDIT']; ?>
 <?php echo $this->_tpl_vars['APP']['AND']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_EXPORT_TO_PDF']; ?>
</a>
                    </td>
                </tr>
            <?php endif; ?>
                        <?php if ($this->_tpl_vars['SAVE_AS_DOC_ACTION'] == '1'): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else
                                getPDFDocDivContent(this, '<?php echo $this->_tpl_vars['MODULE']; ?>
', '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="modules/PDFMaker/img/PDFDoc.png" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else
                                getPDFDocDivContent(this, '<?php echo $this->_tpl_vars['MODULE']; ?>
', '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['PDFMAKER_MOD']['LBL_SAVEASDOC']; ?>
</a>

                        <div id="PDFDocDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>
                    </td>
                </tr>
            <?php endif; ?>
                        <?php if ($this->_tpl_vars['MODULE'] == 'Invoice' || $this->_tpl_vars['MODULE'] == 'SalesOrder' || $this->_tpl_vars['MODULE'] == 'PurchaseOrder' || $this->_tpl_vars['MODULE'] == 'Quotes' || $this->_tpl_vars['MODULE'] == 'Receiptcards' || $this->_tpl_vars['MODULE'] == 'Issuecards'): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">
                        <a href="javascript:;" onclick="getPDFBreaklineDiv(this, '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="modules/PDFMaker/img/PDF_bl.png" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="getPDFBreaklineDiv(this, '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['PDFMAKER_MOD']['LBL_PRODUCT_BREAKLINE']; ?>
</a>                
                        <div id="PDFBreaklineDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>                
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['MODULE'] == 'Invoice' || $this->_tpl_vars['MODULE'] == 'SalesOrder' || $this->_tpl_vars['MODULE'] == 'PurchaseOrder' || $this->_tpl_vars['MODULE'] == 'Quotes' || $this->_tpl_vars['MODULE'] == 'Receiptcards' || $this->_tpl_vars['MODULE'] == 'Issuecards' || $this->_tpl_vars['MODULE'] == 'Products'): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">
                        <a href="javascript:;" onclick="getPDFImagesDiv(this, '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="modules/PDFMaker/img/PDF_img.png" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="getPDFImagesDiv(this, '<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['PDFMAKER_MOD']['LBL_PRODUCT_IMAGE']; ?>
</a>                
                        <div id="PDFImagesDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>                
                    </td>
                </tr>
            <?php endif; ?>
                        <?php if ($this->_tpl_vars['EXPORT_TO_RTF_ACTION'] == '1'): ?>
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;border-top:1px dashed #C2C2C2;">   		    
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&type=rtf&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;" class="webMnu"><img src="<?php echo vtiger_imageurl('actionGenerateSalesOrder.gif', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('<?php echo $this->_tpl_vars['PDFMAKER_MOD']['SELECT_TEMPLATE']; ?>
');
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule=<?php echo $this->_tpl_vars['MODULE']; ?>
&action=CreatePDFFromTemplate&record=<?php echo $this->_tpl_vars['ID']; ?>
&type=rtf&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;" class="webMnu"><?php echo $this->_tpl_vars['PDFMAKER_MOD']['LBL_EXPORT_TO_RTF']; ?>
</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php else: ?>
            <tr>
                <td class="rightMailMergeContent">
                    <?php echo $this->_tpl_vars['PDFMAKER_MOD']['CRM_TEMPLATES_DONT_EXIST']; ?>

                    <?php if ($this->_tpl_vars['IS_ADMIN'] == '1'): ?> 
                        <?php echo $this->_tpl_vars['PDFMAKER_MOD']['CRM_TEMPLATES_ADMIN']; ?>
          
                        <a href="index.php?module=PDFMaker&action=EditPDFTemplate&return_module=<?php echo $this->_tpl_vars['MODULE']; ?>
&return_id=<?php echo $this->_tpl_vars['ID']; ?>
&parenttab=Tools" class="webMnu"><?php echo $this->_tpl_vars['PDFMAKER_MOD']['TEMPLATE_CREATE_HERE']; ?>
</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>

    </table>
    <br/><div id="alert_doc_title" style="display:none;"><?php echo $this->_tpl_vars['PDFMAKER_MOD']['ALERT_DOC_TITLE']; ?>
</div>
<?php endif; ?>