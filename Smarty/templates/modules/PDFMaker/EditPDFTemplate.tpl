{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
{include file='modules/PDFMaker/Buttons_List.tpl'}
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<form name="PDFMakerEdit" action="index.php?module=PDFMaker&action=SavePDFTemplate" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="return_module" value="PDFMaker">
<input type="hidden" name="parenttab" value="{$PARENTTAB}">
<input type="hidden" name="templateid" value="{$SAVETEMPLATEID}">
<input type="hidden" name="action" value="SavePDFTemplate">
<input type="hidden" name="redirect" value="true">
<tr>        
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100%>

				<tr>
                    {if $EMODE eq 'edit'}
					    {if $DUPLICATE_FILENAME eq ""}
                            <td class=heading2 valign=bottom>&nbsp;&nbsp;<b>{$MOD.LBL_EDIT} &quot;{$FILENAME}&quot; </b></td>
                        {else}
                            <td class=heading2 valign=bottom>&nbsp;&nbsp;<b>{$MOD.LBL_DUPLICATE} &quot;{$DUPLICATE_FILENAME}&quot; </b></td>
                        {/if}
    				{else}
    					<td class=heading2 valign=bottom>&nbsp;&nbsp;<b>{$MOD.LBL_NEW_TEMPLATE} </b></td>
    				{/if}

				</tr>
				</table>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
          		    <tr><td>
                        <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0">
                        <tr>
                            <td class="dvtTabCache" style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                            <td style="width: 15%;" class="dvtSelectedCell" id="properties_tab" onclick="showHideTab('properties');" width="75" align="center" nowrap="nowrap"><b>{$MOD.LBL_PROPERTIES_TAB}</b></td>
                            <td class="dvtUnSelectedCell" id="company_tab" onclick="showHideTab('company');" align="center" nowrap="nowrap"><b>{$MOD.LBL_OTHER_INFO}</b></td>
                            <td class="dvtUnSelectedCell" id="labels_tab" onclick="showHideTab('labels');" align="center" nowrap="nowrap"><b>{$MOD.LBL_LABELS}</b></td>
                            <td class="dvtUnSelectedCell" id="products_tab" onclick="showHideTab('products');" align="center" nowrap="nowrap"><b>{$MOD.LBL_ARTICLE}</b></td>
                            <td class="dvtUnSelectedCell" id="headerfooter_tab" onclick="showHideTab('headerfooter');" align="center" nowrap="nowrap"><b>{$MOD.LBL_HEADER_TAB} / {$MOD.LBL_FOOTER_TAB}</b></td>
                            <td class="dvtUnSelectedCell" id="settings_tab" onclick="showHideTab('settings');" align="center" nowrap="nowrap"><b>{$MOD.LBL_SETTINGS_TAB}</b></td>
                            <td class="dvtUnSelectedCell" id="sharing_tab" onclick="showHideTab('sharing');" align="center" nowrap="nowrap"><b>{$MOD.LBL_SHARING_TAB}</b></td>
                            <td class="dvtTabCache" style="width: 20%;" nowrap="nowrap">&nbsp;</td>
                        </tr>
                        </table>
                    </td></tr>
					
                     <tr><td align="left" valign="top">
                      {********************************************* PROPERTIES DIV*************************************************}
                      <div style="display:block;" id="properties_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">                        
                        {* pdf module name and description *}
                     <tr>
          						  <td width=20% class="small cellLabel"><font color="red">*</font><strong>{$MOD.LBL_PDF_NAME}:</strong></td>
          						  <td width=80% class="small cellText"><input name="filename" id="filename" type="text" value="{$FILENAME}" class="detailedViewTextBox" tabindex="1">&nbsp;</td>
          					 </tr>
          					 <tr>
            						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DESCRIPTION}:</strong></td>
            						<td class="cellText small" valign=top>
                                      <span class="small cellText">
              						    <input name="description" type="text" value="{$DESCRIPTION}" class="detailedViewTextBox" tabindex="2">
              					      </span>
                                    </td>
            				 </tr>     					
            				 {* pdf source module and its available fields *}
            				 <tr>
            						<td valign=top class="small cellLabel">{if $TEMPLATEID eq ""}<font color="red">*</font>{/if}<strong>{$MOD.LBL_MODULENAMES}:</strong></td>
            						<td class="cellText small" valign="top">
                                <select name="modulename" id="modulename" class="classname" onChange="change_modulesorce(this,'modulefields');" {*{if $TEMPLATEID neq ""} style="display:none;"{/if}*}>
                                	{if $TEMPLATEID neq "" || $SELECTMODULE neq ""}
                                        {html_options  options=$MODULENAMES selected=$SELECTMODULE}
                                    {else}
                                        {html_options  options=$MODULENAMES}
                                    {/if}
                                </select>
                                &nbsp;&nbsp;
                                <select name="modulefields" id="modulefields" class="classname">
                                	{if $TEMPLATEID eq "" && $SELECTMODULE eq ""}
                                        <option value="">{$MOD.LBL_SELECT_MODULE_FIELD}</option>
                                    {else}
                                        {html_options  options=$SELECT_MODULE_FIELD}
                                    {/if}
                                </select>
        					            	<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('modulefields');" />
                        </td>      						
          					 </tr>    					
          				 	 {* related modules and its fields *}                					
                        <tr id="body_variables">
                          	<td valign=top class="small cellLabel"><strong>{$MOD.LBL_RELATED_MODULES}:</strong></td>
                          	<td class="cellText small" valign=top>
                          
                                <select name="relatedmodulesorce" id="relatedmodulesorce" class="classname" onChange="change_relatedmodule(this,'relatedmodulefields');">
                                        <option value="none">{$MOD.LBL_SELECT_MODULE}</option>
                                        {html_options  options=$RELATED_MODULES}
                                </select>
                                &nbsp;&nbsp;
                          
                                <select name="relatedmodulefields" id="relatedmodulefields" class="classname">
                                    <option>{$MOD.LBL_SELECT_MODULE_FIELD}</option>
                                </select>
                              	<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('relatedmodulefields');">
                          	</td>      						
                        </tr>
                     {* related bloc tpl *}
                        <tr id="related_block_tpl_row">
                            <td valign=top class="small cellLabel"><strong>{$MOD.LBL_RELATED_BLOCK_TPL}:</strong></td>
                            <td class="cellText small" valign=top>
                                <select name="related_block" id="related_block" class="classname" >
                                    {html_options options=$RELATED_BLOCKS}
                                </select>
                                <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertRelatedBlock();"/>
                                &nbsp;
                                <input type="button" value="{$APP.LBL_CREATE_BUTTON_LABEL}" class="crmButton small save" onclick="CreateRelatedBlock();"/>
                                &nbsp;
                                <input type="button" value="{$APP.LBL_EDIT_BUTTON_LABEL}" class="crmButton small cancel" onclick="EditRelatedBlock();"/>
                                &nbsp;
                                <input type="button" value="{$APP.LBL_DELETE_BUTTON_LABEL}" class="crmButton small delete" onclick="DeleteRelatedBlock();"/>
                            </td>
                        </tr>
                     
                        <tr id="listview_block_tpl_row">
                        	<td valign="top" class="small cellLabel">
                                <input type="checkbox" name="is_listview" id="isListViewTmpl" {$IS_LISTVIEW_CHECKED} onclick="isLvTmplClicked();" title="{$MOD.LBL_LISTVIEW_TEMPLATE}" />
                                <strong>{$MOD.LBL_LISTVIEWBLOCK}:</strong>
                            </td>
                        	<td valign="top" class="small cellText">
  					                 <select name="listviewblocktpl" id="listviewblocktpl" class="classname">
                          		   {html_options  options=$LISTVIEW_BLOCK_TPL}
                             </select>
                             <input type="button" id="listviewblocktpl_butt" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('listviewblocktpl');"/>
                            </td>
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
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_MODULE_LANG}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="module_lang" id="module_lang" class="classname" style="width:80%">
                                		{html_options  options=$MODULE_LANG_LABELS}
                                </select>
        						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('module_lang');">
      						</td>
    					</tr>
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
                      
                      {********************************************* Company and User information DIV *************************************************}
                      <div style="display:none;" id="company_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong>{$MOD.LBL_COMPANY_USER_INFO}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="acc_info_type" id="acc_info_type" class="classname" onChange="change_acc_info(this)">
                      {html_options  options=$CUI_BLOCKS}
                    <select>
                    <div id="acc_info_div" style="display:inline;">
                      <select name="acc_info" id="acc_info" class="classname">
                            {html_options  options=$ACCOUNTINFORMATIONS}
                      </select>
      					      <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('acc_info');">
                    </div>
                    <div id="user_info_div" style="display:none;">
                      <select name="user_info" id="user_info" class="classname">
                            {html_options  options=$USERINFORMATIONS}
                      </select>
      					      <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('user_info');">
                    </div>
                    <div id="logged_user_info_div" style="display:none;">
                      <select name="logged_user_info" id="logged_user_info" class="classname">
                            {html_options  options=$LOGGEDUSERINFORMATION}
                      </select>
      					      <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('logged_user_info');">
                    </div>
      						</td>
    					</tr>
    					{if $MULTICOMPANYINFORMATIONS neq ''}
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$LBL_MULTICOMPANY}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="multicomapny" id="multicomapny" class="classname">
                                		{html_options  options=$MULTICOMPANYINFORMATIONS}
                                </select>
        						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('multicomapny');">
      						</td>
    					</tr>
							{/if}
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.TERMS_AND_CONDITIONS}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="invterandcon" id="invterandcon" class="classname">
                                		{html_options  options=$INVENTORYTERMSANDCONDITIONS}
                                </select>
        						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('invterandcon');">
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_CURRENT_DATE}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="dateval" id="dateval" class="classname">
                                		{html_options  options=$DATE_VARS}
                                </select>
        						<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('dateval');">
      						</td>
    					</tr>
    					{***** BARCODES *****}
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_BARCODES}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="barcodeval" id="barcodeval" class="classname">
                                        <optgroup label="{$MOD.LBL_BARCODES_TYPE1}">
                                		     <option value="EAN13">EAN13</option>
                                		     <option value="ISBN">ISBN</option>
                                		     <option value="ISSN">ISSN</option>
                                		</optgroup>
                                		
                                		<optgroup label="{$MOD.LBL_BARCODES_TYPE2}">
                                		     <option value="UPCA">UPCA</option>
                                		     <option value="UPCE">UPCE</option>
                                		     <option value="EAN8">EAN8</option>
                                		</optgroup>
                                		
                                		<optgroup label="{$MOD.LBL_BARCODES_TYPE3}">
                                		     <option value="EAN2">EAN2</option>
                                		     <option value="EAN5">EAN5</option>
                                		     <option value="EAN13P2">EAN13P2</option>
                                		     <option value="ISBNP2">ISBNP2</option>
                                		     <option value="ISSNP2">ISSNP2</option>
                                		     <option value="UPCAP2">UPCAP2</option>
                                		     <option value="UPCEP2">UPCEP2</option>
                                		     <option value="EAN8P2">EAN8P2</option>
                                		     <option value="EAN13P5">EAN13P5</option>
                                		     <option value="ISBNP5">ISBNP5</option>
                                		     <option value="ISSNP5">ISSNP5</option>
                                		     <option value="UPCAP5">UPCAP5</option>
                                		     <option value="UPCEP5">UPCEP5</option>
                                		     <option value="EAN8P5">EAN8P5</option>
                                		</optgroup>
                                		
                                        <optgroup label="{$MOD.LBL_BARCODES_TYPE4}">     
                                		     <option value="IMB">IMB</option>
                                		     <option value="RM4SCC">RM4SCC</option>
                                		     <option value="KIX">KIX</option>
                                		     <option value="POSTNET">POSTNET</option>
                                		     <option value="PLANET">PLANET</option>
                                		</optgroup>
                                		
                                		<optgroup label="{$MOD.LBL_BARCODES_TYPE5}">    
                                		     <option value="C128A">C128A</option>
                                		     <option value="C128B">C128B</option>
                                		     <option value="C128C">C128C</option>
                                		     <option value="EAN128C">EAN128C</option>
                                		     <option value="C39">C39</option>
                                		     <option value="C39+">C39+</option>
                                		     <option value="C39E">C39E</option>
                                		     <option value="C39E+">C39E+</option>
                                		     <option value="S25">S25</option>
                                		     <option value="S25+">S25+</option>
                                		     <option value="I25">I25</option>
                                		     <option value="I25+">I25+</option>
                                		     <option value="I25B">I25B</option>
                                		     <option value="I25B+">I25B+</option>
                                		     <option value="C93">C93</option>
                                		     <option value="MSI">MSI</option>
                                		     <option value="MSI+">MSI+</option>
                                		     <option value="CODABAR">CODABAR</option>
                                		     <option value="CODE11">CODE11</option>
                                		</optgroup>
                                		
                                		<optgroup label="{$MOD.LBL_QRCODE}">
                                            <option value="QR">QR</option>
                                        </optgroup>
                                </select>
        						<input type="button" value="{$MOD.LBL_INSERT_BARCODE_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('barcodeval');">&nbsp;&nbsp;<a href="modules/PDFMaker/Barcodes.php" target="_new"><img src="themes/images/help_icon.gif" border="0" align="absmiddle"></a>
      						</td>
    					</tr>
    					{************************************ Custom Functions *******************************************}
						{if $TYPE eq "professional"}
                        <tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.CUSTOM_FUNCTIONS}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="customfunction" id="customfunction" class="classname">
                                   {*<option value="its4you_if|param1|comparator|param2|return1|return2">if-else</option>
                                   <option value="its4you_getContactImage|contactid|width|height">Contact Image</option>
                                   <option value="functionname|param1">{$MOD.CUSTOM_FUNCTION}</option>*}
                                   {html_options options=$CUSTOM_FUNCTIONS}
                                 </select>
				  				 <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('customfunction');">
      						</td>
    					</tr>
    					{/if}
                        </table>
                      </div>
                      
                      
                      {********************************************* Header/Footer DIV *************************************************}
                      <div style="display:none;" id="headerfooter_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
												{* pdf header variables*}
												<tr id="header_variables">
													<td valign="top" width="200px" class="cellLabel small"><strong>{$MOD.LBL_HEADER_FOOTER_VARIABLES}:</strong></td>
													<td class="cellText small" valign=top>
														<select name="header_var" id="header_var" class="classname">
														{html_options  options=$HEAD_FOOT_VARS selected=""}
														</select>
														<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('header_var');">
													</td>
												</tr>
												{* pdf footer variables*}
												{*<tr id="footer_variables">
													<td valign="top" width="200px" class="cellLabel small"><strong>{$MOD.LBL_FOOTER_VARIABLE}:</strong></td>
													<td class="cellText small" valign=top>
														<select name="footer_var" id="footer_var" class="classname">
														{html_options  options=$HEAD_FOOT_VARS selected=""}
														</select>
														<input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('footer_var');">
													</td>
												</tr>*}
												{* don't display header on first page *}
                                                <tr>
                                                    <td valign=top class="small cellLabel"><strong>{$MOD.LBL_DISPLAY_HEADER}:</strong></td>
													<td class="cellText small" valign="top">
														<b>{$MOD.LBL_ALL_PAGES}</b><input type="checkbox" id="dh_allid" name="dh_all" onclick="hf_checkboxes_changed(this, 'header');" {$DH_ALL}/>
														&nbsp;
														{$MOD.LBL_FIRST_PAGE}<input type="checkbox" id="dh_firstid" name="dh_first" onclick="hf_checkboxes_changed(this, 'header');" {$DH_FIRST}/>
														&nbsp;
														{$MOD.LBL_OTHER_PAGES}<input type="checkbox" id="dh_otherid" name="dh_other" onclick="hf_checkboxes_changed(this, 'header');" {$DH_OTHER}/>
														&nbsp;
													</td>
                                                </tr>
                                                <tr>
                                                    <td valign=top class="small cellLabel"><strong>{$MOD.LBL_DISPLAY_FOOTER}:</strong></td>
													<td class="cellText small" valign="top">
														<b>{$MOD.LBL_ALL_PAGES}</b><input type="checkbox" id="df_allid" name="df_all" onclick="hf_checkboxes_changed(this, 'footer');" {$DF_ALL}/>
														&nbsp;
														{$MOD.LBL_FIRST_PAGE}<input type="checkbox" id="df_firstid" name="df_first" onclick="hf_checkboxes_changed(this, 'footer');" {$DF_FIRST}/>
														&nbsp;
														{$MOD.LBL_OTHER_PAGES}<input type="checkbox" id="df_otherid" name="df_other" onclick="hf_checkboxes_changed(this, 'footer');" {$DF_OTHER}/>
														&nbsp;
														{$MOD.LBL_LAST_PAGE}<input type="checkbox" id="df_lastid" name="df_last" onclick="hf_checkboxes_changed(this, 'footer');" {$DF_LAST}/>
														&nbsp;
													</td>
                                                </tr>
                                                {*<tr>
													<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DONT_DISPLAY_HEADER_ON_FIRST_PAGE}:</strong></td>    					   
													<td class="cellText small" valign="top">
														<input type="checkbox" id="no_header_on_first_page" name="no_header_on_first_page" {$NO_HEADER_ON_FIRST_PAGE_CHECKED}/>
													</td>
												</tr>*}
												{* don't display footer on last page *}
												{*<tr>
													<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DONT_DISPLAY_FOOTER_ON_LAST_PAGE}:</strong></td>    					   
													<td class="cellText small" valign="top">
														<input type="checkbox" id="no_footer_on_last_page" name="no_footer_on_last_page" {$NO_FOOTER_ON_LAST_PAGE_CHECKED} onchange="if(this.checked && this.form.footer_only_on_last_page.checked) this.form.footer_only_on_last_page.checked=false;" />
													</td>
												</tr>*}
												{* display footer only on last page *}
												{*<tr>
													<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DISPLAY_FOOTER_ONLY_ON_LAST_PAGE}:</strong></td>    					   
													<td class="cellText small" valign="top">
														<input type="checkbox" id="footer_only_on_last_page" name="footer_only_on_last_page" {$FOOTER_ONLY_ON_LAST_PAGE_CHECKED} onchange="if(this.checked && this.form.no_footer_on_last_page.checked) this.form.no_footer_on_last_page.checked=false;" />
													</td>
												</tr>*}
                        </table>
                      </div>
                      
						{*********************************************Products bloc DIV*************************************************}
                      <div style="display:none;" id="products_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr><td>
                          
                          <div id="product_div">
                          <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
                                {* product bloc tpl which is the same as in main Properties tab*}
            					<tr>
            						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_PRODUCT_BLOC_TPL}:</strong></td>
            						<td class="cellText small" valign=top>
            						<select name="productbloctpl2" id="productbloctpl2" class="classname">
                                    		{html_options  options=$PRODUCT_BLOC_TPL}
                                   </select>
                                   <input type="button" value="{$MOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('productbloctpl2');"/>
              		               </td>
                               </tr>
                                <tr>
            						<td valign=top class="small cellLabel" width="200px"><strong>{$MOD.LBL_ARTICLE}:</strong></td>
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
                          
                        </td></tr>
                        </table>
                      </div>
                      
                      
                      {********************************************* Settings DIV *************************************************}
                      <div style="display:none;" id="settings_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        {* file name settings *}
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_FILENAME}:</strong></td>
    						<td class="cellText small" valign=top>
                                <input type="text" name="nameOfFile" value="{$NAME_OF_FILE}" id="nameOfFile" class="detailedViewTextBox" style="width:50%;"/>
                                <select name="filename_fields" id="filename_fields" class="classname small" onchange="insertFieldIntoFilename(this.value);">
                                    <option value="">{$MOD.LBL_SELECT_MODULE_FIELD}</option>
                                    <optgroup label="{$MOD.LBL_COMMON_FILEINFO}">
                                        {html_options  options=$FILENAME_FIELDS}
                                    </optgroup>
                                    {if $TEMPLATEID neq "" || $SELECTMODULE neq ""}
                                        {html_options  options=$SELECT_MODULE_FIELD_FILENAME}
                                    {/if}
                                </select>
      						</td>
    					</tr>
                        {* pdf format settings *}
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_PDF_FORMAT}:</strong></td>
    						<td class="cellText small" valign=top>
                                <table>
                                   <tr>                                       
                                       <td>
                                           <select name="pdf_format" id="pdf_format" class="classname" onchange="CustomFormat();">
                                            {html_options  options=$FORMATS selected=$SELECT_FORMAT }                                    
                                           </select>
                                       </td>
                                       <td style="padding:0">
                                         <table id="custom_format_table" cellpadding="0" cellspacing="2" {if $SELECT_FORMAT neq 'Custom'}style="display:none"{/if}>
                                           <tr>
                                             <td align="right" nowrap><b>{$MOD.LBL_WIDTH}</b></td>
                                             <td>
                                               <input type="text" name="pdf_format_width" id="pdf_format_width" class="detailedViewTextBox" value="{$CUSTOM_FORMAT.width}" style="width:50px">
                                             </td>
                                             <td align="right" nowrap><b>{$MOD.LBL_HEIGHT}</b></td>
                                             <td>
                                               <input type="text" name="pdf_format_height" id="pdf_format_height" class="detailedViewTextBox" value="{$CUSTOM_FORMAT.height}" style="width:50px">
                                             </td>
                                           </tr>
                                         </table>
                                       </td>                                   
                                   </tr>
                                </table>

      						</td>
    					</tr>
    					{* pdf orientation settings *}
                        <tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_PDF_ORIENTATION}:</strong></td>
    						<td class="cellText small" valign=top>
                                <select name="pdf_orientation" id="pdf_orientation" class="classname">
                                    {html_options  options=$ORIENTATIONS selected=$SELECT_ORIENTATION}
                                </select>
      						</td>
    					</tr>
    					{* encoding *}
    					{*
                        <tr>
    					   <td valign=top class="small cellLabel" title="{$MOD.LBL_ENCODING_TITLE}"><strong>{$MOD.LBL_ENCODING}:</strong></td>
    					   <td class="cellText small" valign=top>
                            <select name="encoding" id="encoding" class="classname">
                                {html_options  options=$ENCODINGS selected=$SELECT_ENCODING}
                            </select>
      					   </td>
    					</tr>
    					*}
    					{* ignored picklist values settings *}
    					<tr>
    					   <td valign=top class="small cellLabel" title="{$MOD.LBL_IGNORE_PICKLIST_VALUES_DESC}"><strong>{$MOD.LBL_IGNORE_PICKLIST_VALUES}:</strong></td>
    					   <td class="cellText small" valign="top" title="{$MOD.LBL_IGNORE_PICKLIST_VALUES_DESC}"><input type="text" name="ignore_picklist_values" value="{$IGNORE_PICKLIST_VALUES}" class="detailedViewTextBox"/></td>
    					</tr>
                        {* pdf margin settings *}
                        {assign var=margin_input_width value='50px'}
                        {assign var=margin_label_width value='50px'}
                        <tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_MARGINS}:</strong></td>
    						<td class="cellText small" valign="top">
                                <table>
                                   <tr>
                                       <td align="right" nowrap><b>{$MOD.LBL_TOP}</b></td>
                                       <td>
                                           <input type="text" name="margin_top" id="margin_top" class="detailedViewTextBox" value="{$MARGINS.top}" style="width:{$margin_input_width}" onKeyUp="ControlNumber('margin_top',false);">
                                       </td>
                                       <td align="right" nowrap><b>{$MOD.LBL_BOTTOM}</b></td>
                                       <td>
                                           <input type="text" name="margin_bottom" id="margin_bottom" class="detailedViewTextBox" value="{$MARGINS.bottom}" style="width:{$margin_input_width}" onKeyUp="ControlNumber('margin_bottom',false);">
                                       </td>
                                       <td align="right" nowrap><b>{$MOD.LBL_LEFT}</b></td>
                                       <td>
                                           <input type="text" name="margin_left"  id="margin_left" class="detailedViewTextBox" value="{$MARGINS.left}" style="width:{$margin_input_width}" onKeyUp="ControlNumber('margin_left',false);">
                                       </td>
                                       <td align="right" nowrap><b>{$MOD.LBL_RIGHT}</b></td>
                                       <td>
                                           <input type="text" name="margin_right" id="margin_right" class="detailedViewTextBox" value="{$MARGINS.right}" style="width:{$margin_input_width}" onKeyUp="ControlNumber('margin_right',false);">
                                       </td>
                                   </tr>
                                </table>
                          	</td>
    					</tr>
                        {* decimal settings *}    					
    					<tr>
    					   <td valign=top class="small cellLabel"><strong>{$MOD.LBL_DECIMALS}:</strong></td>
    						<td class="cellText small" valign="top">
                                <table>
                                   <tr>
                                       <td align="right" nowrap><b>{$MOD.LBL_DEC_POINT}</b></td>
                                       <td><input type="text" maxlength="2" name="dec_point" class="detailedViewTextBox" value="{$DECIMALS.point}" style="width:{$margin_input_width}"/></td>
                                       
                                       <td align="right" nowrap><b>{$MOD.LBL_DEC_DECIMALS}</b></td>
                                       <td><input type="text" maxlength="2" name="dec_decimals" class="detailedViewTextBox" value="{$DECIMALS.decimals}" style="width:{$margin_input_width}"/></td>
                                       
                                       <td align="right" nowrap><b>{$MOD.LBL_DEC_THOUSANDS}</b></td>
                                       <td><input type="text" maxlength="2" name="dec_thousands"  class="detailedViewTextBox" value="{$DECIMALS.thousands}" style="width:{$margin_input_width}"/></td>                                       
                                   </tr>
                                </table>
                          	</td>
    					</tr>    					
    					{* status settings *}
    					<tr>
    					   <td valign=top class="small cellLabel"><strong>{$APP.LBL_STATUS}:</strong></td>    					   
    					   <td class="cellText small" valign="top">
                             <select name="is_active" id="is_active" class="classname" onchange="templateActiveChanged(this);">
                                {html_options options=$STATUS selected=$IS_ACTIVE}   
                             </select>
                           </td>
    					</tr>
    					{* is default settings *}
    					<tr>
    					   <td valign=top class="small cellLabel"><strong>{$MOD.LBL_SETASDEFAULT}:</strong></td>    					   
    					   <td class="cellText small" valign="top">
							 <b>{$MOD.LBL_FOR_DV}</b><input type="checkbox" id="is_default_dv" name="is_default_dv" {$IS_DEFAULT_DV_CHECKED}/>
                                &nbsp;
                             <b>{$MOD.LBL_FOR_LV}</b><input type="checkbox" id="is_default_lv" name="is_default_lv" {$IS_DEFAULT_LV_CHECKED}/>
                            {* hidden variable for template order settings *}
                            <input type="hidden" name="tmpl_order" value="{$ORDER}" />
                           </td>
    					</tr>
    					{* is designated for customerportal *}    					
                        <tr id="is_portal_row" {if $SELECTMODULE neq "Invoice" && $SELECTMODULE neq "Quotes" }style="display: none;"{/if}>
    					   <td valign=top class="small cellLabel"><strong>{$MOD.LBL_SETFORPORTAL}:</strong></td>    					   
    					   <td class="cellText small" valign="top">
                             <input type="checkbox" id="is_portal" name="is_portal" {$IS_PORTAL_CHECKED} onclick="return ConfirmIsPortal(this);"/>
                           </td>
    					</tr>    					

                        </table>
                      </div>
                      
                      {********************************************* Sharing DIV *************************************************}
                      <div style="display:none;" id="sharing_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong>{$MOD.LBL_TEMPLATE_OWNER}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="template_owner" id="template_owner" class="classname">
                                		{html_options  options=$TEMPLATE_OWNERS selected=$TEMPLATE_OWNER}
                                </select>
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong>{$MOD.LBL_SHARING_TAB}:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="sharing" id="sharing" class="classname" onchange="sharing_changed();">
                                    {html_options options=$SHARINGTYPES selected=$SHARINGTYPE}
                                </select>
                                
                                <div id="sharing_share_div" style="display:none; border-top:2px dotted #DADADA; margin-top:10px; width:100%;">
                                    <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
    								<tr>
    									<td width="40%" valign=top class="cellBottomDotLinePlain small"><strong>{$CMOD.LBL_MEMBER_AVLBL}</strong></td>
    									<td width="10%">&nbsp;</td>
    									<td width="40%" class="cellBottomDotLinePlain small"><strong>{$CMOD.LBL_MEMBER_SELECTED}</strong></td>
    								</tr>
    								<tr>
    									<td valign=top class="small">
    										{$CMOD.LBL_ENTITY}:&nbsp;
    										<select id="sharingMemberType" name="sharingMemberType" class="small" onchange="showSharingMemberTypes()">
    										<option value="groups" selected>{$CMOD.LBL_GROUPS}</option>
    										<option value="roles">{$CMOD.LBL_ROLES}</option>
    										<option value="rs">{$CMOD.LBL_ROLES_SUBORDINATES}</option>
    										<option value="users">{$CMOD.LBL_USERS}</option>
    										</select>
                                            <input type="hidden" name="sharingFindStr" id="sharingFindStr">&nbsp;
    									</td>
    									<td width="50">&nbsp;</td>
    									<td class="small">&nbsp;</td>
    								</tr>
                              		<tr class="small">
    									<td valign=top>{$CMOD.LBL_MEMBER} {$CMOD.LBL_OF} {$CMOD.LBL_ENTITY}<br>
    										<select id="sharingAvailList" name="sharingAvailList" multiple size="10" class="small crmFormList"></select>
    									</td>
    									<td width="50">
    										<div align="center">
    											<input type="button" name="sharingAddButt" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="sharingAddColumn()" class="crmButton small"/><br /><br />
    											<input type="button" name="sharingDelButt" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="sharingDelColumn()" class="crmButton small"/>
    										</div>
    									</td>
    									<td class="small" style="background-color:#ddFFdd" valign=top>{$CMOD.LBL_MEMBER} {$CMOD.LBL_OF} &quot;{$GROUPNAME}&quot; <br>
    										<select id="sharingSelectedColumns" name="sharingSelectedColumns" multiple size="10" class="small crmFormList">
    										{foreach item=element from=$MEMBER}
    										<option value="{$element.0}">{$element.1}</option>
    										{/foreach}
    										</select>
    										<input type="hidden" name="sharingSelectedColumnsString" id="sharingSelectedColumnsString" value="" />
    									</td>
    								</tr>
    								</table>
                                </div>
      						</td>
    					</tr>
                        </table>
                      </div>
                      
                     {************************************** END OF TABS BLOCK *************************************}                         
                    </td></tr>
                    <tr><td class="small" style="text-align:center;padding:15px 0px 10px 0px;">
					   <input type="submit" value="{$APP.LBL_APPLY_BUTTON_LABEL}" class="crmButton small create" onclick="document.PDFMakerEdit.redirect.value='false'; return savePDF();" >&nbsp;&nbsp;
                       <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" onclick="return savePDF();" >&nbsp;&nbsp;            			
            		   {if $smarty.request.applied eq 'true'}
            		     <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.location.href='index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid={$SAVETEMPLATEID}&parenttab=Tools';" />
            		   {else}
                         <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />
                       {/if}            			
					</td></tr>
                    </table>

                    <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0"><tr>
                          <td style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                          <td style="width: 15%;" class="dvtSelectedCell" id="body_tab2" onclick="showHideTab2('body');" width="75" align="center" nowrap="nowrap"><b>{$MOD.LBL_BODY}</b></td>
           				  <td class="dvtUnSelectedCell" id="header_tab2" onclick="showHideTab2('header');" align="center" nowrap="nowrap"><b>{$MOD.LBL_HEADER_TAB}</b></td>
           				  <td class="dvtUnSelectedCell" id="footer_tab2" onclick="showHideTab2('footer');" align="center" nowrap="nowrap"><b>{$MOD.LBL_FOOTER_TAB}</b></td>
                          <td style="width: 50%;" nowrap="nowrap">&nbsp;</td> 
                    </tr></table>
 
                    {literal}   
                        <script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
                    {/literal} 

                    {*********************************************BODY DIV*************************************************}
                    <div style="display:block;" id="body_div2">
                        <textarea name="body" id="body" style="width:90%;height:700px" class=small tabindex="5">{$BODY}</textarea>
                    </div>
                    
                    <script type="text/javascript">
                    	{php} if (file_exists("kcfinder/browse.php")) { {/php}
                            {literal} CKEDITOR.replace( 'body',{customConfig:'../../../modules/PDFMaker/fck_config_kcfinder.js'} );  {/literal} 
                        {php} } else { {/php} 
                            {literal} CKEDITOR.replace( 'body',{customConfig:'../../../modules/PDFMaker/fck_config.js'} ); {/literal} 
                        {php} } {/php}
                    </script>
                    
                    {*********************************************Header DIV*************************************************}
                    <div style="display:none;" id="header_div2">
                        <textarea name="header_body" id="header_body" style="width:90%;height:200px" class="small">{$HEADER}</textarea>
                    </div>

                    <script type="text/javascript">
                    	{php} if (file_exists("kcfinder/browse.php")) { {/php}
                            {literal} CKEDITOR.replace( 'header_body',{customConfig:'../../../modules/PDFMaker/fck_config_kcfinder.js'} );  {/literal} 
                        {php} } else { {/php} 
                            {literal} CKEDITOR.replace( 'header_body',{customConfig:'../../../modules/PDFMaker/fck_config.js'} ); {/literal} 
                        {php} } {/php}
                    </script>
                    
                    {*********************************************Footer DIV*************************************************}
                    <div style="display:none;" id="footer_div2">
                        <textarea name="footer_body" id="footer_body" style="width:90%;height:200px" class="small">{$FOOTER}</textarea>
                    </div>

                    <script type="text/javascript">
                    	{php} if (file_exists("kcfinder/browse.php")) { {/php}
                            {literal} CKEDITOR.replace( 'footer_body',{customConfig:'../../../modules/PDFMaker/fck_config_kcfinder.js'} );  {/literal} 
                        {php} } else { {/php} 
                            {literal} CKEDITOR.replace( 'footer_body',{customConfig:'../../../modules/PDFMaker/fck_config.js'} ); {/literal} 
                        {php} } {/php}
                    </script>
                    
                	{php} if (file_exists("kcfinder/browse.php")) { {/php}
                        {literal} <script type="text/javascript" src="modules/PDFMaker/fck_config_kcfinder.js"></script>{/literal} 
                    {php} } else { {/php} 
                        {literal} <script type="text/javascript" src="modules/PDFMaker/fck_config.js"></script>{/literal} 
                    {php} } {/php}

                    <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
                        <tr><td class="small" style="text-align:center;padding:10px 0px 10px 0px;" colspan="3">
    					   <input type="submit" value="{$APP.LBL_APPLY_BUTTON_LABEL}" class="crmButton small create" onclick="document.PDFMakerEdit.redirect.value='false'; return savePDF();" >&nbsp;&nbsp;
                           <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" onclick="return savePDF();" >&nbsp;&nbsp;            			
                		   {if $smarty.request.applied eq 'true'}
                		     <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.location.href='index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid={$SAVETEMPLATEID}&parenttab=Tools';" />
                		   {else}
                             <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />
                           {/if}            			
    		   	        </td></tr>
                    </table>                                  
                    
				</td>
				</tr><tr><td align="center" class="small" style="color: rgb(153, 153, 153);">{$MOD.PDF_MAKER} {$VERSION} {$MOD.COPYRIGHT}</td></tr>
				</table>
			</td>
			</tr>
                        </form>
			</table>
 
<script>

var selectedTab='properties';
var selectedTab2='body';

function check4null(form)
{ldelim}

        var isError = false;
        var errorMessage = "";
        // Here we decide whether to submit the form.
        if (trim(form.templatename.value) =='') {ldelim}
                isError = true;
                errorMessage += "\n template name";
                form.templatename.focus();
        {rdelim}
        if (trim(form.foldername.value) =='') {ldelim}
                isError = true;
                errorMessage += "\n folder name";
                form.foldername.focus();
        {rdelim}
        if (trim(form.subject.value) =='') {ldelim}
                isError = true;
                errorMessage += "\n subject";
                form.subject.focus();
        {rdelim}

        // Here we decide whether to submit the form.
        if (isError == true) {ldelim}
                alert("{$MOD.LBL_MISSING_FIELDS}" + errorMessage);
                return false;
        {rdelim}
 return true;

{rdelim}

var module_blocks = new Array();

{foreach item=moduleblocks key=blockname from=$MODULE_BLOCKS}
    module_blocks["{$blockname}"] = new Array({$moduleblocks});
{/foreach}

var module_fields = new Array();

{foreach item=modulefields key=modulename from=$MODULE_FIELDS}
    module_fields["{$modulename}"] = new Array({$modulefields});
{/foreach}
                
var selected_module='{$SELECTMODULE}';

function change_modulesorce(first,second_name)
{ldelim}
    if(selected_module!='')
    {ldelim}
        question = confirm("{$MOD.LBL_CHANGE_MODULE_QUESTION}");
        if(question)
        {ldelim}
            var oEditor = CKEDITOR.instances.body;                        
            oEditor.setData("");
            oEditor = CKEDITOR.instances.header_body;
            oEditor.setData(""); 
            oEditor = CKEDITOR.instances.footer_body;
            oEditor.setData("");
            document.getElementById('nameOfFile').value='';
        {rdelim}
        else
        {ldelim}
            first.value=selected_module;
            return;
        {rdelim}        
    {rdelim}
    selected_module=first.value;
  if (selected_module != "")
    {ldelim}
       document.getElementById('related_block_tpl_row').style.display='table-row';
    {rdelim}
    else
    {ldelim}
        document.getElementById('related_block_tpl_row').style.display='none';
    {rdelim}
    
    {* ITS4YOU-CR VlZa *}
    if (selected_module != "Invoice" && selected_module != "Quotes")
    {ldelim}
      document.getElementById('is_portal_row').style.display='none';
    {rdelim}
    else
    {ldelim}
      document.getElementById('is_portal_row').style.display='table-row';
    {rdelim}
    {* ITS4YOU-END *}
    
    var module = fillModuleFields(first,second_name);
    fillModuleFields(first,'filename_fields');
    change_relatedmodulesorce(first,'relatedmodulesorce');
    fill_module_lang_array(first.value);
    fill_related_blocks_array(first.value);
{rdelim}

function fillModuleFields(first,second_name)
{ldelim}
    second = document.getElementById(second_name);    
    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var module = box.options[box.selectedIndex].value;
    if (!module) return;

    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {ldelim}
            box2.removeChild(optgroups[i]);
    {rdelim}

    var blocks = module_blocks[module];
    var blocks_length = blocks.length;
    if(second_name=='filename_fields')
    {ldelim}
        objOption=document.createElement("option");
        objOption.innerHTML = '{$MOD.LBL_SELECT_MODULE_FIELD}';
        objOption.value = '';
        box2.appendChild(objOption);
        
        optGroup = document.createElement('optgroup');
        optGroup.label = '{$MOD.LBL_COMMON_FILEINFO}';
        box2.appendChild(optGroup); 
        
        {foreach item=field key=field_val from=$FILENAME_FIELDS}
            objOption=document.createElement("option");
            objOption.innerHTML = '{$field}';
            objOption.value = '{$field_val}';
            optGroup.appendChild(objOption);
        {/foreach}
        
        if(module=='Invoice' || module=='Quotes' || module=='SalesOrder' || module=='PurchaseOrder' || module=='Issuecards' || module=='Receiptcards' || module=="Creditnote" || module=="StornoInvoice")
            blocks_length-=2;
    {rdelim}  
     
    for(b=0;b<blocks_length;b+=2)
    {ldelim}
            optGroup = document.createElement('optgroup');
            optGroup.label = blocks[b];
            box2.appendChild(optGroup);

            var list = module_fields[module+'|'+ blocks[b+1]];

    		for(i=0;i<list.length;i+=2)
    		{ldelim}
    		      //<optgroup label="Addresse" class=\"select\" style=\"border:none\">

                  objOption=document.createElement("option");
                  objOption.innerHTML = list[i];
                  objOption.value = list[i+1];

                  optGroup.appendChild(objOption);
    		{rdelim}
    {rdelim}
    
    return module;    
{rdelim}

var all_related_modules = new Array();

{foreach item=related_modules key=relatedmodulename from=$ALL_RELATED_MODULES}
    all_related_modules["{$relatedmodulename}"] = new Array('{$MOD.LBL_SELECT_MODULE}','none'{foreach item=module1 from=$related_modules},'{$APP[$module1.2]|escape} ({$module1.1})','{$module1.2}|{$module1.0}'{/foreach});
{/foreach}

function change_relatedmodulesorce(first,second_name)
{ldelim} 
    second = document.getElementById(second_name);

    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var number = box.options[box.selectedIndex].value;
    if (!number) return;

    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {ldelim}
            box2.removeChild(optgroups[i]);
    {rdelim}

    var list = all_related_modules[number];

    for(i=0;i<list.length;i+=2)
    {ldelim}
          objOption=document.createElement("option");
          objOption.innerHTML = list[i];
          objOption.value = list[i+1];

          box2.appendChild(objOption);
    {rdelim}

    clearRelatedModuleFields();
{rdelim}

function clearRelatedModuleFields()
{ldelim}
    second = document.getElementById("relatedmodulefields");

    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;

    var box2 = second;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {ldelim}
            box2.removeChild(optgroups[i]);
    {rdelim}

    objOption=document.createElement("option");
    objOption.innerHTML = "{$MOD.LBL_SELECT_MODULE_FIELD}";
    objOption.value = "";

    box2.appendChild(objOption);

{rdelim}

var related_module_fields = new Array();

{foreach item=relatedmodulefields key=relatedmodulename from=$RELATED_MODULE_FIELDS}
    related_module_fields["{$relatedmodulename}"] = new Array({$relatedmodulefields});
{/foreach}

function change_relatedmodule(first,second_name)
{ldelim}
    second = document.getElementById(second_name);

    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var number = box.options[box.selectedIndex].value;
    if (!number) return;
    
    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {ldelim}
            box2.removeChild(optgroups[i]);
    {rdelim}

    if (number == "none")
    {ldelim}
        objOption=document.createElement("option");
        objOption.innerHTML = "{$MOD.LBL_SELECT_MODULE_FIELD}";
        objOption.value = "";

        box2.appendChild(objOption);
    {rdelim}
    else
    {ldelim}
        var tmpArr = number.split('|',2);
        var moduleName = tmpArr[0];
        number = tmpArr[1];
        var blocks = module_blocks[moduleName];

        for(b=0;b<blocks.length;b+=2)
        {ldelim}
            var list = related_module_fields[moduleName+'|'+ blocks[b+1]];

    		if (list.length > 0)
    		{ldelim}

    		    optGroup = document.createElement('optgroup');
                optGroup.label = blocks[b];
                box2.appendChild(optGroup);

        		for(i=0;i<list.length;i+=2)
        		{ldelim}
                      objOption=document.createElement("option");
                      objOption.innerHTML = list[i];

                      var objVal = list[i+1];
                      var newObjVal = objVal.replace(moduleName.toUpperCase() + '_', number.toUpperCase() + '_');
                      objOption.value = newObjVal;

                      optGroup.appendChild(objOption);
        		{rdelim}
    		{rdelim}
        {rdelim}
    {rdelim}
{rdelim}

function change_acc_info(element)
{ldelim}

  // alert(element.value);
  switch(element.value)
  {ldelim}
    case "Assigned":
      document.getElementById('acc_info_div').style.display='none';
      document.getElementById('user_info_div').style.display='inline';
      document.getElementById('logged_user_info_div').style.display='none';
    break;
    case "Logged":
      document.getElementById('acc_info_div').style.display='none';
      document.getElementById('user_info_div').style.display='none';
      document.getElementById('logged_user_info_div').style.display='inline';
    break;
    default:
      document.getElementById('acc_info_div').style.display='inline';
      document.getElementById('user_info_div').style.display='none';
      document.getElementById('logged_user_info_div').style.display='none';
    break;
  {rdelim}
{rdelim} 

function InsertIntoTemplate(element)
{ldelim}

    selectField =  document.getElementById(element).value;

    if (selectedTab2 == "body")
        var oEditor = CKEDITOR.instances.body;    
    else if (selectedTab2 == "header")
        var oEditor = CKEDITOR.instances.header_body;
    else if (selectedTab2 == "footer")
        var oEditor = CKEDITOR.instances.footer_body;
    

    if(element!='header_var' && element!='footer_var' && element!='hmodulefields' && element!='fmodulefields' && element!='dateval')
    {ldelim}
      	 if (selectField != '')
      	 {ldelim}
               if (selectField == 'ORGANIZATION_STAMP_SIGNATURE')
       	       {ldelim}
       	           insert_value = '{$COMPANY_STAMP_SIGNATURE}';
      	       {rdelim}
               else if (selectField == 'COMPANY_LOGO')
       	       {ldelim}
       	           insert_value = '{$COMPANYLOGO}';
      	       {rdelim}
               else if (selectField == 'ORGANIZATION_HEADER_SIGNATURE')
       	       {ldelim}
       	           insert_value = '{$COMPANY_HEADER_SIGNATURE}';
      	       {rdelim}
      	       else if (selectField == 'VATBLOCK')
       	       {ldelim}
       	           insert_value = '{$VATBLOCK_TABLE}';
      	       {rdelim}
               else
      	       {ldelim}
                   if (element == "articelvar" || selectField=="LISTVIEWBLOCK_START" || selectField=="LISTVIEWBLOCK_END")
                      insert_value = '#'+selectField+'#';
                   else if (element == "relatedmodulefields")
                      insert_value = '$R_'+selectField+'$';                   
                   else if(element == "productbloctpl" || element == "productbloctpl2")
                      insert_value = selectField;
                   else if(element == "global_lang")
                      insert_value = '%G_'+selectField+'%';
                   else if(element == "module_lang")
                      insert_value = '%M_'+selectField+'%';
                   else if(element == "custom_lang")
                      insert_value = '%'+selectField+'%';   {*selectedField already contains prefix C_*}
                   else if(element == "barcodeval")
                      insert_value = '[BARCODE|'+selectField+'=YOURCODE|BARCODE]'; 
                   else if(element == "customfunction")
                      insert_value = '[CUSTOMFUNCTION|'+selectField+'|CUSTOMFUNCTION]'; 
                   else
                      insert_value = '$'+selectField+'$';


               {rdelim}
               oEditor.insertHtml(insert_value);
      	 {rdelim}

    {rdelim}
    else
    {ldelim}
        
        if (selectField != '')
        {ldelim}
            if(element=='hmodulefields' || element=='fmodulefields' )
                oEditor.insertHtml('$'+selectField+'$');
            else
                oEditor.insertHtml(selectField);
        {rdelim}
    {rdelim}
{rdelim}



function savePDF()
{ldelim}
    var pdf_name =  document.getElementById("filename").value;

    var error = 0;

    if (pdf_name == "")
    {ldelim}
       alert("{$MOD.LBL_PDF_NAME}" + alert_arr.CANNOT_BE_EMPTY);
       error++;
    {rdelim}

    var pdf_module = document.getElementById("modulename").value;

    if (pdf_module == "")
    {ldelim}
       alert("{$MOD.LBL_MODULE_ERROR}");
       error++;
    {rdelim}

    if (!ControlNumber('margin_top',true) || !ControlNumber('margin_bottom',true) || !ControlNumber('margin_left',true) || !ControlNumber('margin_right',true))
    {ldelim}
        error++;
    {rdelim}
    
    if(!CheckCustomFormat())
    {ldelim}        
        error++;
    {rdelim}
    
    if(!CheckSharing())
    {ldelim}
        error++;
    {rdelim}
    
    if (error > 0)
       return false;
    else
       return true;
{rdelim}

function ControlNumber(elid,final)
{ldelim}

    var control_number = document.getElementById(elid).value;

    {literal}

    var re = new Array();
    re[1] = new RegExp("^([0-9])");

    re[2] = new RegExp("^[0-9]{1}[.]$");

    re[3] = new RegExp("^[0-9]{1}[.][0-9]{1}$");

    {/literal}

    if (control_number.length > 3 || !re[control_number.length].test(control_number) || (final == true && control_number.length == 2))
    {ldelim}
        alert("{$MOD.LBL_MARGIN_ERROR}");
        document.getElementById(elid).focus();
        return false;
    {rdelim}
    else
    {ldelim}
        return true;
    {rdelim}

{rdelim}

function refreshPosition(type)
{ldelim}

    var i;

    selectbox = document.getElementById(type + "_position");
    selectbox_value = selectbox.value;

    for(i=selectbox.options.length-1;i>=0;i--)
    {ldelim}
        selectbox.remove(i);
    {rdelim}


    el1 = document.getElementById(type + "_function_left").value;
    el2 = document.getElementById(type + "_function_center").value;
    el3 = document.getElementById(type + "_function_right").value;


    selectbox.options[selectbox.options.length] = new Option("{$MOD.LBL_EMPTY_IMAGE}", "empty");
    if (el1 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("{$MOD.LBL_LEFT}", "left");
    if (el2 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("{$MOD.LBL_CENTER}", "center");
    if (el3 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("{$MOD.LBL_RIGHT}", "right");

    selectbox.value = selectbox_value;

{rdelim}

function showHideTab(tabname)
{ldelim}
    document.getElementById(selectedTab+'_tab').className="dvtUnSelectedCell";    
    document.getElementById(tabname+'_tab').className='dvtSelectedCell';
    
    document.getElementById(selectedTab+'_div').style.display='none';
    document.getElementById(tabname+'_div').style.display='block';
    var formerTab=selectedTab;
    selectedTab=tabname;     
{rdelim}



function showHideTab2(tabname)
{ldelim}
    document.getElementById(selectedTab2+'_tab2').className="dvtUnSelectedCell";    
    document.getElementById(tabname+'_tab2').className='dvtSelectedCell';
    
    {*document.getElementById(selectedTab2+'_variables').style.display='none';  
    document.getElementById(tabname+'_variables').style.display='';*}
    if(tabname == 'body'){ldelim}
    	document.getElementById('body_variables').style.display='';
    	document.getElementById('related_block_tpl_row').style.display='';
    	document.getElementById('listview_block_tpl_row').style.display='';
    	if(document.getElementById('headerfooter_div').style.display=='block')
				showHideTab('properties');
    {rdelim} else {ldelim}
    	document.getElementById('body_variables').style.display='none';
    	document.getElementById('related_block_tpl_row').style.display='none';
    	document.getElementById('listview_block_tpl_row').style.display='none';
    	if(document.getElementById('headerfooter_div').style.display=='none')
				showHideTab('headerfooter');
    {rdelim}
    
    document.getElementById(selectedTab2+'_div2').style.display='none';
    document.getElementById(tabname+'_div2').style.display='block';
    
    box = document.getElementById('modulename')
    var module = box.options[box.selectedIndex].value;
    var formerTab=selectedTab2;
    selectedTab2=tabname;
{rdelim}


{literal}
function fill_module_lang_array(module)
{    
    new Ajax.Request(
                'index.php',
                {queue: {position: 'end', scope: 'command'},
                        method: 'post',
                        postBody: 'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=fill_lang&langmod='+module,
                        onComplete: function(response) {
                                var module_lang = document.getElementById('module_lang');
                                module_lang.length=0;
                                var map = response.responseText.split('|@|');
                                var keys = map[0].split('||');
                                var values = map[1].split('||');
                                
                                for(i=0;i<values.length;i++)
                                {
                                    var item = document.createElement('option');
                                    item.text = values[i];
                                    item.value = keys[i];
                                    try {
                                      module_lang.add(item,null);
                                    }catch(ex){
                                      module_lang.add(item);
                                    }
                                }                                                                
                        }
                }
        );
}

function fill_related_blocks_array(module, selected)
{
    new Ajax.Request(
                'index.php',
                {queue: {position: 'end', scope: 'command'},
                        method: 'post',
                        postBody: 'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=fill_relblocks&selmod='+module,
                        onComplete: function(response) {
                                var related_block = document.getElementById('related_block');
                                related_block.length=0;
                                var map = response.responseText.split('|@|');
                                var keys = map[0].split('||');
                                var values = map[1].split('||');

                                for(i=0;i<values.length;i++)
                                {
                                    var item = document.createElement('option');
                                    item.text = values[i];
                                    item.value = keys[i];
                                    
                                    if(selected != undefined && keys[i] == selected)
                                        item.selected = true;
                                    
                                    try {
                                      related_block.add(item,null);
                                    }catch(ex){
                                      related_block.add(item);
                                    }
                                }
                        }
                }
        );
}

//helper function that is called from SaveRelatedBlock.php
function refresh_related_blocks_array(selected)
{
    var module = document.getElementById('modulename').value;
    fill_related_blocks_array(module, selected);
}

function InsertRelatedBlock()
{
    var relblockid = document.getElementById('related_block').value;

    if(relblockid == '')
        return false;

    var oEditor = CKEDITOR.instances.body;
    new Ajax.Request(
                'index.php',
                {queue: {position: 'end', scope: 'command'},
                        method: 'post',
                        postBody: 'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=get_relblock&relblockid='+relblockid,
                        onComplete: function(response) {
                                oEditor.insertHtml(response.responseText);
                        }
                }
        );
}

function EditRelatedBlock()
{
    var relblockid = document.getElementById('related_block').value;
    if(relblockid == '')
    {
        {/literal}
        alert('{$MOD.LBL_SELECT_RELBLOCK}');
        {literal}
        return false;
    }
        
    var popup_url = 'index.php?module=PDFMaker&action=PDFMakerAjax&file=EditRelatedBlock&record='+relblockid;
    window.open(popup_url,"Editblock","width=790px,height=630px,scrollbars=yes");
}

function CreateRelatedBlock()
{
    var pdf_module = document.getElementById("modulename").value;
    if(pdf_module == '')
    {
        {/literal}
        alert("{$MOD.LBL_MODULE_ERROR}");
        return false;
        {literal}
    }
    var popup_url = 'index.php?module=PDFMaker&action=PDFMakerAjax&file=EditRelatedBlock&pdfmodule='+pdf_module;
    window.open(popup_url,"Editblock","width=790px,height=630px,scrollbars=yes");
}

function DeleteRelatedBlock()
{
    var relblockid = document.getElementById('related_block').value;    
    var result = false;
    if(relblockid == '')
    {
        {/literal}
        alert('{$MOD.LBL_SELECT_RELBLOCK}');
        {literal}
        return false;
    }
    else
    {
        {/literal}
          var selectedIdx = document.getElementById('related_block').selectedIndex;
          result = confirm("{$MOD.LBL_DELETE_RELBLOCK_CONFIRM} '" + document.getElementById("related_block").options[selectedIdx].innerHTML + "'?");
        {literal}
    }
    
    if(result)
    {
        new Ajax.Request(
                'index.php',
                {queue: {position: 'end', scope: 'command'},
                        method: 'post',
                        postBody: 'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=delete_relblock&relblockid='+relblockid,
                        onComplete: function(response) {
                                refresh_related_blocks_array();
                        }
                }
        );
    }
}

function insertFieldIntoFilename(val)
{
    if(val!='')
        document.getElementById('nameOfFile').value+='$'+val+'$';    
}

function EditRelatedBlock_old()
{
{/literal}
    var pdf_module = document.getElementById("modulename").value;
    
    if(pdf_module == '')
    {ldelim}
        alert("{$MOD.LBL_MODULE_ERROR}");
    {rdelim}
    else
    {ldelim}
        var popup_url = 'index.php?module=PDFMaker&action=PDFMakerAjax&file=ListRelatedBlocks&pdfmodule='+pdf_module;
        window.open(popup_url,"Editblock","width=790px,height=630px,scrollbars=yes");
    {rdelim}
{literal}
}

function CustomFormat()
{
    var selObj;
    selObj = document.getElementById('pdf_format');
    
    if(selObj.value == 'Custom')
    {
        document.getElementById('custom_format_table').style.display = 'table';        
    }
    else
    {
        document.getElementById('custom_format_table').style.display = 'none';        
    }    
}

function ConfirmIsPortal(oCheck)
{   
    var module = document.getElementById('modulename').value;
    var curr_templatename = document.getElementById('filename').value;     
    
    if(oCheck.defaultChecked == true && oCheck.checked == false)
    {
        {/literal}
        return confirm('{$MOD.LBL_UNSET_PORTAL}' + '\n' + '{$APP.ARE_YOU_SURE}');
        {literal}
    }
    else if(oCheck.defaultChecked == false && oCheck.checked == true)
    {
        new Ajax.Request(
                'index.php',
                {queue: {position: 'end', scope: 'command'},
                        method: 'post',
                        postBody: 'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=confirm_portal&langmod='+module+'&curr_templatename='+curr_templatename,
                        onComplete: function(response) {                            
                            {/literal}
                            if(confirm(response.responseText + '\n' + '{$APP.ARE_YOU_SURE}') == false)
                                oCheck.checked = false;
                            {literal}                                   
                        }
                }
        );
        return true;
    }
}

function isLvTmplClicked(source)
{
    var oTrigger = document.getElementById('isListViewTmpl');
    var oButt = document.getElementById('listviewblocktpl_butt');
    var oDlvChbx = document.getElementById('is_default_dv');
    
    document.getElementById('listviewblocktpl').disabled = !(oTrigger.checked);
    oButt.disabled = !(oTrigger.checked);

	if(source != 'init')
	{
		oDlvChbx.checked = false;
    	oDlvChbx.disabled = oTrigger.checked;
	}
    
    if(oTrigger.checked == true)
    {
        oButt.className = 'crmButton small create';
    }
    else
    {
        oButt.className = 'crmButton small create inactive';
    }
}

isLvTmplClicked('init');

function hf_checkboxes_changed(oChck, oType)
{
    var prefix;
    var optionsArr;
    if(oType == 'header')
    {
        prefix = 'dh_';
        optionsArr = new Array('allid', 'firstid', 'otherid');
    }
    else
    {
        prefix = 'df_';
        optionsArr = new Array('allid', 'firstid', 'otherid', 'lastid');
    }
        
    var tmpArr = oChck.id.split("_");
    var sufix = tmpArr[1];
    var i;
    if(sufix == 'allid')
    {
        for(i=0; i<optionsArr.length; i++)
        {
            document.getElementById(prefix + optionsArr[i]).checked = oChck.checked;
        }
    }
    else
    {
        var allChck = document.getElementById(prefix + 'allid');
        var allChecked = true;
        for(i=1; i<optionsArr.length; i++)
        {
            if(document.getElementById(prefix + optionsArr[i]).checked == false)
            {
                allChecked = false;
                break;
            }
        }
        allChck.checked = allChecked;
    }
}
{/literal}

var constructedOptionValue;
var constructedOptionName;

var roleIdArr=new Array({$ROLEIDSTR});
var roleNameArr=new Array({$ROLENAMESTR});
var userIdArr=new Array({$USERIDSTR});
var userNameArr=new Array({$USERNAMESTR});
var grpIdArr=new Array({$GROUPIDSTR});
var grpNameArr=new Array({$GROUPNAMESTR});

sharing_changed();


//Sharing functions
function sharing_changed()
{ldelim}
    var selectedValue = document.getElementById('sharing').value;
    if(selectedValue != 'share')
    {ldelim}
        document.getElementById('sharing_share_div').style.display = 'none';
    {rdelim}
    else
    {ldelim}
        document.getElementById('sharing_share_div').style.display = 'block';
        setSharingObjects();
        showSharingMemberTypes();
    {rdelim}
{rdelim}

function showSharingMemberTypes()
{ldelim}
	var selectedOption=document.getElementById('sharingMemberType').value;
	//Completely clear the select box
	document.getElementById('sharingAvailList').options.length = 0;

	if(selectedOption == 'groups')
	{ldelim}
		constructSelectOptions('groups',grpIdArr,grpNameArr);
	{rdelim}
	else if(selectedOption == 'roles')
	{ldelim}
		constructSelectOptions('roles',roleIdArr,roleNameArr);
	{rdelim}
	else if(selectedOption == 'rs')
	{ldelim}

		constructSelectOptions('rs',roleIdArr,roleNameArr);
	{rdelim}
	else if(selectedOption == 'users')
	{ldelim}
		constructSelectOptions('users',userIdArr,userNameArr);
	{rdelim}
{rdelim}

function constructSelectOptions(selectedMemberType,idArr,nameArr)
{ldelim}
	var i;
	var findStr=document.getElementById('sharingFindStr').value;
	if(findStr.replace(/^\s+/g, '').replace(/\s+$/g, '').length !=0)
	{ldelim}
		var k=0;
		for(i=0; i<nameArr.length; i++)
		{ldelim}
			if(nameArr[i].indexOf(findStr) ==0)
			{ldelim}
				constructedOptionName[k]=nameArr[i];
				constructedOptionValue[k]=idArr[i];
				k++;
			{rdelim}
		{rdelim}
	{rdelim}
	else
	{ldelim}
		constructedOptionValue = idArr;
		constructedOptionName = nameArr;
	{rdelim}

	//Constructing the selectoptions
	var j;
	var nowNamePrefix;
	for(j=0;j<constructedOptionName.length;j++)
	{ldelim}
		if(selectedMemberType == 'roles')
		{ldelim}
			nowNamePrefix = 'Roles::'
		{rdelim}
		else if(selectedMemberType == 'rs')
		{ldelim}
			nowNamePrefix = 'RoleAndSubordinates::'
		{rdelim}
		else if(selectedMemberType == 'groups')
		{ldelim}
			nowNamePrefix = 'Group::'
		{rdelim}
		else if(selectedMemberType == 'users')
		{ldelim}
			nowNamePrefix = 'User::'
		{rdelim}

		var nowName = nowNamePrefix + constructedOptionName[j];
		var nowId = selectedMemberType + '::'  + constructedOptionValue[j]
		document.getElementById('sharingAvailList').options[j] = new Option(nowName,nowId);
	{rdelim}
	//clearing the array
	constructedOptionValue = new Array();
    constructedOptionName = new Array();
{rdelim}

function sharingAddColumn()
{ldelim}
    for (i=0;i<selectedColumnsObj.length;i++)
    {ldelim}
        selectedColumnsObj.options[i].selected=false
    {rdelim}

    for (i=0;i<availListObj.length;i++)
    {ldelim}
        if (availListObj.options[i].selected==true)
        {ldelim}
        	var rowFound=false;
        	var existingObj=null;
            for (j=0;j<selectedColumnsObj.length;j++)
            {ldelim}
                if (selectedColumnsObj.options[j].value==availListObj.options[i].value)
                {ldelim}
                    rowFound=true
                    existingObj=selectedColumnsObj.options[j]
                    break
                {rdelim}
            {rdelim}

            if (rowFound!=true)
            {ldelim}
                var newColObj=document.createElement("OPTION")
                newColObj.value=availListObj.options[i].value
                if (browser_ie) newColObj.innerText=availListObj.options[i].innerText
                else if (browser_nn4 || browser_nn6) newColObj.text=availListObj.options[i].text
                selectedColumnsObj.appendChild(newColObj)
                availListObj.options[i].selected=false
                newColObj.selected=true
                rowFound=false
            {rdelim}
            else
            {ldelim}
                if(existingObj != null) existingObj.selected=true
            {rdelim}
        {rdelim}
    {rdelim}
{rdelim}

function sharingDelColumn()
{ldelim}
    for (i=selectedColumnsObj.options.length;i>0;i--)
    {ldelim}
    	if (selectedColumnsObj.options.selectedIndex>=0)
            selectedColumnsObj.remove(selectedColumnsObj.options.selectedIndex)
    {rdelim}
{rdelim}

function setSharingObjects()
{ldelim}
    availListObj=getObj("sharingAvailList")
    selectedColumnsObj=getObj("sharingSelectedColumns")
{rdelim}

//Sharing Ends

function CheckCustomFormat()
{ldelim}
    if(document.getElementById('pdf_format').value == 'Custom')
    {ldelim}
        var pdfWidth = document.getElementById('pdf_format_width').value;
        var pdfHeight = document.getElementById('pdf_format_height').value;
        
        if(pdfWidth > 2000 || pdfHeight > 2000 || pdfWidth < 100 || pdfHeight < 100 || isNaN(pdfWidth) || isNaN(pdfHeight) )
        {ldelim}
            alert('{$MOD.LBL_CUSTOM_FORMAT_ERROR}');
            document.getElementById('pdf_format_width').focus();
            return false;
        {rdelim}
    {rdelim}

    return true;
{rdelim}

function CheckSharing()
{ldelim}
    if(document.getElementById('sharing').value == 'share')
    {ldelim}
        var selColStr = '';
        var selColObj = document.getElementById('sharingSelectedColumns');
        
        for(i = 0; i < selColObj.options.length; i++)
        {ldelim}
            selColStr += selColObj.options[i].value + ';';
        {rdelim}

        if(selColStr == '')
        {ldelim}
            alert('{$MOD.LBL_SHARING_ERROR}');
            document.getElementById('sharingAvailList').focus();
            return false;
        {rdelim}
        document.getElementById('sharingSelectedColumnsString').value = selColStr;
    {rdelim}

    return true;
{rdelim}

function templateActiveChanged(activeElm)
{ldelim}
    var is_defaultElm1 = document.getElementById('is_default_dv');
    var is_defaultElm2 = document.getElementById('is_default_lv');
    //var is_portalElm = document.getElementById('is_portal');
    if(activeElm.value=='1')
    {ldelim}
        is_defaultElm1.disabled=false;
        is_defaultElm2.disabled=false;
    {rdelim}
    else
    {ldelim}
        is_defaultElm1.checked=false;
        is_defaultElm1.disabled=true;
        is_defaultElm2.checked=false;
        is_defaultElm2.disabled=true;
    {rdelim}
{rdelim}
</script>