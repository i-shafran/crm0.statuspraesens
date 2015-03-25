{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<br />
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
	<td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>

	<div align=center>
    {include file='SetMenu.tpl'}
    <table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
    <tbody>
    	<tr>
    		<td rowspan="2" valign="top" width="50"><img src="{'quickview.png'|@vtiger_imageurl:$THEME}" border="0" height="48" width="48"></td>
    		<td class="heading2" valign="bottom">
    		   <a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{'VTLIB_LBL_MODULE_MANAGER'|@getTranslatedString:'Settings'}</a> &gt;
    	       <a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=PDFMaker&parenttab=Settings">{'PDFMaker'|@getTranslatedString:'PDFMaker'}</a> &gt;
    		{$MOD.LBL_PRODUCTBLOCKTPL}
    		</td>
    	</tr>
    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_PRODUCTBLOCKTPL_DESC}</td>
    	</tr>
    </tbody>
    </table>
    <br />

    <div style="padding:10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr class="small">
                <td><img src="{'prvPrfTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
                <td class="prvPrfTopBg" width="100%"></td>
                <td><img src="{'prvPrfTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
            </tr>
        </table>

        <form name="productblocks" action="index.php" method="post" onSubmit="return validate(this);">
        <input type="hidden" name="module" value="PDFMaker" />
        <input type="hidden" name="action" value="ProductBlocks" />
        <input type="hidden" name="mode" value="save" />
        <input type="hidden" name="tplid" value="{$EDIT_TEMPLATE.id}" />
        <table class="prvPrfOutline" border="0" cellpadding="10" cellspacing="0" width="100%">
            <tr><td>
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td valign="top" width="20px"><img src="{'prvPrfHdrArrow.gif'|@vtiger_imageurl:$THEME}"> </td>
                        <td class="prvPrfBigText"><b>
                            {if $EDIT_TEMPLATE.id neq ''}
                                {$MOD.LBL_EDIT_PBTPL} "{$EDIT_TEMPLATE.name}"
                            {else}
                                {$MOD.LBL_CREATE_PBTPL}
                            {/if}
                        </b></td>
                        <td align="right">
                            <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmbutton small save" />
                            &nbsp;
                            <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                        </td>
                    </tr>
                </table>
                <br />

                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
          		<tr><td>
                    <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                        <td class="dvtTabCache" style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                        <td width="15%" class="dvtSelectedCell" id="properties_tab" onclick="showHideTab('properties');" align="center" nowrap="nowrap"><b>{$MOD.LBL_PROPERTIES_TAB}</b></td>
                        <td width="15%" class="dvtUnSelectedCell" id="labels_tab" onclick="showHideTab('labels');" align="center" width="75" nowrap="nowrap"><b>{$MOD.LBL_LABELS}</b></td>
                        <td class="dvtTabCache" nowrap="nowrap">&nbsp;</td>
                    </tr>
                    </table>
                </td></tr>
                <tr><td align="left" valign="top">
                
                {********************************************* PROPERTIES DIV*************************************************}
                <div style="display:block;" id="properties_div">
                    {*<table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%" id="tpltbl">*}
                    <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
                            <td valign=top class="small cellLabel" width="200px"><strong>{$MOD.LBL_PDF_NAME}:</strong></td>
                            <td class="small cellText" width="80%">
                                <input class="detailedViewTextBox" type="text" name="template_name" value="{$EDIT_TEMPLATE.name}" />
                            </td>
                        </tr>
    					<tr>
    						<td valign=top class="small cellLabel" ><strong>{$MOD.LBL_ARTICLE}:</strong></td>
    						<td class="cellText small" valign=top>
    						<select name="articelvar" id="articelvar" class="classname">
                            		{html_options  options=$ARTICLE_STRINGS}
                            </select>
                            <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('articelvar');">
      						</td>
    					</tr>
    			        {* insert products & services fields into text *}
                        <tr>
    						<td valign=top class="small cellLabel"><strong>*{$MOD.LBL_PRODUCTS_AVLBL}:</strong></td>
    						<td class="cellText small" valign=top>
                            <select name="psfields" id="psfields" class="classname">
                                {html_options  options=$SELECT_PRODUCT_FIELD}
                            </select>
    						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('psfields');">
      						</td>
    					</tr>
    					{* products fields *}
                        <tr>
    						<td valign=top class="small cellLabel"><strong>*{$MOD.LBL_PRODUCTS_FIELDS}:</strong></td>
    						<td class="cellText small" valign=top>
                            <select name="productfields" id="productfields" class="classname">
                                {html_options  options=$PRODUCTS_FIELDS}
                            </select>
    						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('productfields');">
      						</td>
    					</tr>
                        {* services fields *}
                        <tr>
    						<td valign=top class="small cellLabel"><strong>*{$MOD.LBL_SERVICES_FIELDS}:</strong></td>
    						<td class="cellText small" valign=top>
                            <select name="servicesfields" id="servicesfields" class="classname">
                                {html_options  options=$SERVICES_FIELDS}
                            </select>
    						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('servicesfields');">
      						</td>
    					</tr>
                       <tr>
                        <td colspan="2"><small>{$MOD.LBL_PRODUCT_FIELD_INFO}</small></td>
                       </tr>
                    </table>
                </div>
                
                {********************************************* Labels DIV *************************************************}
                  <div style="display:none;" id="labels_div">
                    <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                    <tr>
    					<td width="200px" valign=top class="small cellLabel"><strong>{$MOD.LBL_GLOBAL_LANG}:</strong></td>
    					<td class="cellText small" valign=top>
    						<select name="global_lang" id="global_lang" class="classname" style="width:80%">
                            		{html_options  options=$GLOBAL_LANG_LABELS}
                            </select>
    				       	<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('global_lang');">
    					</td>
    				</tr>
    				{*<tr>
    					<td valign=top class="small cellLabel"><strong>{$MOD.LBL_MODULE_LANG}:</strong></td>
    					<td class="cellText small" valign=top>
    						<select name="module_lang" id="module_lang" class="classname" style="width:80%">
                            		{html_options  options=$MODULE_LANG_LABELS}
                            </select>
    						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('module_lang');">
    					</td>
    				</tr>*}
                    {if $TYPE eq "professional"}
                     <tr>
    					<td valign=top class="small cellLabel"><strong>{$MOD.LBL_CUSTOM_LABELS}:</strong></td>
    					<td class="cellText small" valign=top>
    						<select name="custom_lang" id="custom_lang" class="classname" style="width:80%">
                            		{html_options  options=$CUSTOM_LANG_LABELS}
                            </select>
    						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('custom_lang');">
    					</td>
    				</tr>
    				{/if}
                    </table>
                  </div>
                
                </td></tr>
                <tr><td>
                   {****************************************** TEMPLATE BODY **********************************}
                    <textarea name="body" id="body" style="width:90%;height:700px" class="small" tabindex="5">{$EDIT_TEMPLATE.body}</textarea>
                    <script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
                    <script type="text/javascript">
                        {literal} CKEDITOR.replace( 'body',{customConfig:'../../../modules/PDFMaker/fck_config_kcfinder.js'} );  {/literal}
                    </script>
                </td></tr>
                </table>
                    
                <br />
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td align="right">
                            <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmbutton small save" />
                            &nbsp;
                            <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                        </td>
                    </tr>
                </table>
            </td></tr>
        </table>
        </form>
    </div>

    </div>
	</td>
    <td valign="top"><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
    </tr>
</tbody>
</table>
<br />

<script type="text/javascript" language="javascript">
function InsertIntoTemplate(element)
{ldelim}
    var oEditor = CKEDITOR.instances.body;
    var selectField =  document.getElementById(element).value;
    var insert_value;

    if(element == "articelvar")
        insert_value = '#'+selectField+'#';
    else if(element == "global_lang")
        insert_value = '%G_'+selectField+'%';
    else if(element == "module_lang")
        insert_value = '%M_'+selectField+'%';
    else if(element == "custom_lang")
        insert_value = '%'+selectField+'%';   {*selectedField already contains prefix C_*}
    else
        insert_value = '$'+selectField+'$';
     
    oEditor.insertHtml(insert_value);
{rdelim}

function validate(formElm)
{ldelim}
    if(formElm.template_name.value == '')
    {ldelim}
        alert("{$MOD.LBL_PDF_NAME}" + alert_arr.CANNOT_BE_EMPTY);
        return false;
    {rdelim}
    
    return true;
{rdelim}

var selectedTab='properties';

function showHideTab(tabname)
{ldelim}
    document.getElementById(selectedTab+'_tab').className="dvtUnSelectedCell";
    document.getElementById(tabname+'_tab').className='dvtSelectedCell';

    document.getElementById(selectedTab+'_div').style.display='none';
    document.getElementById(tabname+'_div').style.display='block';
    //var formerTab=selectedTab;
    selectedTab=tabname;
{rdelim}
</script>