{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
{if $ENABLE_EMAILMAKER neq 'true'}
    {assign var="EMAIL_FUNCTION" value="sendPDFmail"}
{else}
    {assign var="EMAIL_FUNCTION" value="sendEMAILMakerPDFmail"}
{/if}

{if $ENABLE_PDFMAKER eq 'true'}
    <table border=0 cellspacing=0 cellpadding=0 style="width:100%;">
        {if $CRM_TEMPLATES_EXIST eq '0'}
            <tr>
                <td class="rightMailMergeContent"  style="width:100%;">
                    <select name="use_common_template" id="use_common_template" class="detailedViewTextBox" multiple style="width:90%;" size="5">
                        {foreach name="tplForeach" from="$CRM_TEMPLATES" item="itemArr" key="templateid"}
                            {if $itemArr.is_default eq '1' || $itemArr.is_default eq '3'}
                                <option value="{$templateid}" selected="selected">{$itemArr.templatename}</option>
                            {else}
                                <option value="{$templateid}">{$itemArr.templatename}</option>
                            {/if}
                        {/foreach}
                    </select>        
                </td>
            </tr>

            {if $TEMPLATE_LANGUAGES|@sizeof > 1}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">    	
                        <select name="template_language" id="template_language" class="detailedViewTextBox" style="width:90%;" size="1">
                            {html_options  options=$TEMPLATE_LANGUAGES selected=$CURRENT_LANGUAGE}
                        </select>
                    </td>
                </tr>
            {else}
                {foreach from="$TEMPLATE_LANGUAGES" item="lang" key="lang_key"}
                    <input type="hidden" name="template_language" id="template_language" value="{$lang_key}"/>
                {/foreach}
            {/if}
            {* Export to PDF *}
            <tr>
                <td class="rightMailMergeContent"  style="width:100%;">   		    
                    <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else if ((navigator.userAgent.match(/iPad/i) != null) || (navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null))
                                window.open('index.php?module=PDFMaker&relmodule={$MODULE}&action=CreatePDFFromTemplate&record={$ID}&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value);
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule={$MODULE}&action=CreatePDFFromTemplate&record={$ID}&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;" class="webMnu"><img src="{'actionGeneratePDF.gif'|@vtiger_imageurl:$THEME}" hspace="5" align="absmiddle" border="0"/></a>
                    <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else if ((navigator.userAgent.match(/iPad/i) != null) || (navigator.userAgent.match(/iPhone/i) != null) || (navigator.userAgent.match(/iPod/i) != null))
                                window.open('index.php?module=PDFMaker&relmodule={$MODULE}&action=CreatePDFFromTemplate&record={$ID}&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value);
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule={$MODULE}&action=CreatePDFFromTemplate&record={$ID}&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;">{$APP.LBL_EXPORT_TO_PDF}</a>
                </td>
            </tr>
            {* Send Email with PDF *}
            {if $SEND_EMAIL_PDF_ACTION eq "1"}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">  			
                        <a href="javascript:;" onclick="fnvshobj(this, 'sendpdfmail_cont');{$EMAIL_FUNCTION}('{$MODULE}', '{$ID}');" class="webMnu"><img src="{'PDFMail.gif'|@vtiger_imageurl:$THEME}" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="fnvshobj(this, 'sendpdfmail_cont');{$EMAIL_FUNCTION}('{$MODULE}', '{$ID}');" class="webMnu">{$APP.LBL_SEND_EMAIL_PDF}</a>
                        <div id="sendpdfmail_cont" style="z-index:100001;position:absolute;"></div>
                    </td>
                </tr>
            {/if}
            {* Edit and Export to PDF *}            
            {if $EDIT_AND_EXPORT_ACTION eq "1"}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">   		    
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else
                                openPopUp('PDF', this, 'index.php?module=PDFMaker&relmodule={$MODULE}&action=PDFMakerAjax&file=CreatePDFFromTemplate&mode=content&record={$ID}&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value, '', '900', '800', 'menubar=no,toolbar=no,location=no,status=no,resizable=yes,scrollbars=yes');" class="webMnu"><img src="{'modules/PDFMaker/img/PDF_edit.png'|@vtiger_imageurl:$THEME}" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else
                                openPopUp('PDF', this, 'index.php?module=PDFMaker&relmodule={$MODULE}&action=PDFMakerAjax&file=CreatePDFFromTemplate&mode=content&record={$ID}&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value, '', '900', '800', 'menubar=no,toolbar=no,location=no,status=no,resizable=yes,scrollbars=yes');" class="webMnu">{$APP.LBL_EDIT} {$APP.AND} {$APP.LBL_EXPORT_TO_PDF}</a>
                    </td>
                </tr>
            {/if}
            {* Save PDF into documents *}
            {if $SAVE_AS_DOC_ACTION eq "1"}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else
                                getPDFDocDivContent(this, '{$MODULE}', '{$ID}');" class="webMnu"><img src="modules/PDFMaker/img/PDFDoc.png" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else
                                getPDFDocDivContent(this, '{$MODULE}', '{$ID}');" class="webMnu">{$PDFMAKER_MOD.LBL_SAVEASDOC}</a>

                        <div id="PDFDocDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>
                    </td>
                </tr>
            {/if}
            {* PDF product images*}
            {if $MODULE eq 'Invoice' || $MODULE eq 'SalesOrder' || $MODULE eq 'PurchaseOrder' || $MODULE eq 'Quotes' || $MODULE eq 'Receiptcards' || $MODULE eq 'Issuecards'}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">
                        <a href="javascript:;" onclick="getPDFBreaklineDiv(this, '{$ID}');" class="webMnu"><img src="modules/PDFMaker/img/PDF_bl.png" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="getPDFBreaklineDiv(this, '{$ID}');" class="webMnu">{$PDFMAKER_MOD.LBL_PRODUCT_BREAKLINE}</a>                
                        <div id="PDFBreaklineDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>                
                    </td>
                </tr>
            {/if}
            {if $MODULE eq 'Invoice' || $MODULE eq 'SalesOrder' || $MODULE eq 'PurchaseOrder' || $MODULE eq 'Quotes' || $MODULE eq 'Receiptcards' || $MODULE eq 'Issuecards' || $MODULE eq 'Products'}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;">
                        <a href="javascript:;" onclick="getPDFImagesDiv(this, '{$ID}');" class="webMnu"><img src="modules/PDFMaker/img/PDF_img.png" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="getPDFImagesDiv(this, '{$ID}');" class="webMnu">{$PDFMAKER_MOD.LBL_PRODUCT_IMAGE}</a>                
                        <div id="PDFImagesDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>                
                    </td>
                </tr>
            {/if}
            {* Export to RTF *}
            {if $EXPORT_TO_RTF_ACTION eq "1"}
                <tr>
                    <td class="rightMailMergeContent"  style="width:100%;border-top:1px dashed #C2C2C2;">   		    
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule={$MODULE}&action=CreatePDFFromTemplate&record={$ID}&type=rtf&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;" class="webMnu"><img src="{'actionGenerateSalesOrder.gif'|@vtiger_imageurl:$THEME}" hspace="5" align="absmiddle" border="0"/></a>
                        <a href="javascript:;" onclick="if (getSelectedTemplates() == '')
                                alert('{$PDFMAKER_MOD.SELECT_TEMPLATE}');
                            else
                                document.location.href = 'index.php?module=PDFMaker&relmodule={$MODULE}&action=CreatePDFFromTemplate&record={$ID}&type=rtf&commontemplateid=' + getSelectedTemplates() + '&language=' + document.getElementById('template_language').value;" class="webMnu">{$PDFMAKER_MOD.LBL_EXPORT_TO_RTF}</a>
                    </td>
                </tr>
            {/if}
        {else}
            <tr>
                <td class="rightMailMergeContent">
                    {$PDFMAKER_MOD.CRM_TEMPLATES_DONT_EXIST}
                    {if $IS_ADMIN eq '1'} 
                        {$PDFMAKER_MOD.CRM_TEMPLATES_ADMIN}          
                        <a href="index.php?module=PDFMaker&action=EditPDFTemplate&return_module={$MODULE}&return_id={$ID}&parenttab=Tools" class="webMnu">{$PDFMAKER_MOD.TEMPLATE_CREATE_HERE}</a>
                    {/if}
                </td>
            </tr>
        {/if}

    </table>
    <br/><div id="alert_doc_title" style="display:none;">{$PDFMAKER_MOD.ALERT_DOC_TITLE}</div>
{/if}