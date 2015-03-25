<?php /* Smarty version 2.6.18, created on 2014-08-16 01:04:41
         compiled from modules/PDFMaker/EditPDFTemplate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'modules/PDFMaker/EditPDFTemplate.tpl', 81, false),array('modifier', 'escape', 'modules/PDFMaker/EditPDFTemplate.tpl', 945, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/PDFMaker/Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<form name="PDFMakerEdit" action="index.php?module=PDFMaker&action=SavePDFTemplate" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="return_module" value="PDFMaker">
<input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['PARENTTAB']; ?>
">
<input type="hidden" name="templateid" value="<?php echo $this->_tpl_vars['SAVETEMPLATEID']; ?>
">
<input type="hidden" name="action" value="SavePDFTemplate">
<input type="hidden" name="redirect" value="true">
<tr>        
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100%>

				<tr>
                    <?php if ($this->_tpl_vars['EMODE'] == 'edit'): ?>
					    <?php if ($this->_tpl_vars['DUPLICATE_FILENAME'] == ""): ?>
                            <td class=heading2 valign=bottom>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['MOD']['LBL_EDIT']; ?>
 &quot;<?php echo $this->_tpl_vars['FILENAME']; ?>
&quot; </b></td>
                        <?php else: ?>
                            <td class=heading2 valign=bottom>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['MOD']['LBL_DUPLICATE']; ?>
 &quot;<?php echo $this->_tpl_vars['DUPLICATE_FILENAME']; ?>
&quot; </b></td>
                        <?php endif; ?>
    				<?php else: ?>
    					<td class=heading2 valign=bottom>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['MOD']['LBL_NEW_TEMPLATE']; ?>
 </b></td>
    				<?php endif; ?>

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
                            <td style="width: 15%;" class="dvtSelectedCell" id="properties_tab" onclick="showHideTab('properties');" width="75" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_PROPERTIES_TAB']; ?>
</b></td>
                            <td class="dvtUnSelectedCell" id="company_tab" onclick="showHideTab('company');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_OTHER_INFO']; ?>
</b></td>
                            <td class="dvtUnSelectedCell" id="labels_tab" onclick="showHideTab('labels');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_LABELS']; ?>
</b></td>
                            <td class="dvtUnSelectedCell" id="products_tab" onclick="showHideTab('products');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_ARTICLE']; ?>
</b></td>
                            <td class="dvtUnSelectedCell" id="headerfooter_tab" onclick="showHideTab('headerfooter');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_HEADER_TAB']; ?>
 / <?php echo $this->_tpl_vars['MOD']['LBL_FOOTER_TAB']; ?>
</b></td>
                            <td class="dvtUnSelectedCell" id="settings_tab" onclick="showHideTab('settings');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS_TAB']; ?>
</b></td>
                            <td class="dvtUnSelectedCell" id="sharing_tab" onclick="showHideTab('sharing');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_SHARING_TAB']; ?>
</b></td>
                            <td class="dvtTabCache" style="width: 20%;" nowrap="nowrap">&nbsp;</td>
                        </tr>
                        </table>
                    </td></tr>
					
                     <tr><td align="left" valign="top">
                                            <div style="display:block;" id="properties_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">                        
                                             <tr>
          						  <td width=20% class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['MOD']['LBL_PDF_NAME']; ?>
:</strong></td>
          						  <td width=80% class="small cellText"><input name="filename" id="filename" type="text" value="<?php echo $this->_tpl_vars['FILENAME']; ?>
" class="detailedViewTextBox" tabindex="1">&nbsp;</td>
          					 </tr>
          					 <tr>
            						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_DESCRIPTION']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                      <span class="small cellText">
              						    <input name="description" type="text" value="<?php echo $this->_tpl_vars['DESCRIPTION']; ?>
" class="detailedViewTextBox" tabindex="2">
              					      </span>
                                    </td>
            				 </tr>     					
            				             				 <tr>
            						<td valign=top class="small cellLabel"><?php if ($this->_tpl_vars['TEMPLATEID'] == ""): ?><font color="red">*</font><?php endif; ?><strong><?php echo $this->_tpl_vars['MOD']['LBL_MODULENAMES']; ?>
:</strong></td>
            						<td class="cellText small" valign="top">
                                <select name="modulename" id="modulename" class="classname" onChange="change_modulesorce(this,'modulefields');" >
                                	<?php if ($this->_tpl_vars['TEMPLATEID'] != "" || $this->_tpl_vars['SELECTMODULE'] != ""): ?>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MODULENAMES'],'selected' => $this->_tpl_vars['SELECTMODULE']), $this);?>

                                    <?php else: ?>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MODULENAMES']), $this);?>

                                    <?php endif; ?>
                                </select>
                                &nbsp;&nbsp;
                                <select name="modulefields" id="modulefields" class="classname">
                                	<?php if ($this->_tpl_vars['TEMPLATEID'] == "" && $this->_tpl_vars['SELECTMODULE'] == ""): ?>
                                        <option value=""><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
</option>
                                    <?php else: ?>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SELECT_MODULE_FIELD']), $this);?>

                                    <?php endif; ?>
                                </select>
        					            	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('modulefields');" />
                        </td>      						
          					 </tr>    					
          				 	                 					
                        <tr id="body_variables">
                          	<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_RELATED_MODULES']; ?>
:</strong></td>
                          	<td class="cellText small" valign=top>
                          
                                <select name="relatedmodulesorce" id="relatedmodulesorce" class="classname" onChange="change_relatedmodule(this,'relatedmodulefields');">
                                        <option value="none"><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE']; ?>
</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['RELATED_MODULES']), $this);?>

                                </select>
                                &nbsp;&nbsp;
                          
                                <select name="relatedmodulefields" id="relatedmodulefields" class="classname">
                                    <option><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
</option>
                                </select>
                              	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('relatedmodulefields');">
                          	</td>      						
                        </tr>
                                             <tr id="related_block_tpl_row">
                            <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_RELATED_BLOCK_TPL']; ?>
:</strong></td>
                            <td class="cellText small" valign=top>
                                <select name="related_block" id="related_block" class="classname" >
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['RELATED_BLOCKS']), $this);?>

                                </select>
                                <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertRelatedBlock();"/>
                                &nbsp;
                                <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CREATE_BUTTON_LABEL']; ?>
" class="crmButton small save" onclick="CreateRelatedBlock();"/>
                                &nbsp;
                                <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="EditRelatedBlock();"/>
                                &nbsp;
                                <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" class="crmButton small delete" onclick="DeleteRelatedBlock();"/>
                            </td>
                        </tr>
                     
                        <tr id="listview_block_tpl_row">
                        	<td valign="top" class="small cellLabel">
                                <input type="checkbox" name="is_listview" id="isListViewTmpl" <?php echo $this->_tpl_vars['IS_LISTVIEW_CHECKED']; ?>
 onclick="isLvTmplClicked();" title="<?php echo $this->_tpl_vars['MOD']['LBL_LISTVIEW_TEMPLATE']; ?>
" />
                                <strong><?php echo $this->_tpl_vars['MOD']['LBL_LISTVIEWBLOCK']; ?>
:</strong>
                            </td>
                        	<td valign="top" class="small cellText">
  					                 <select name="listviewblocktpl" id="listviewblocktpl" class="classname">
                          		   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['LISTVIEW_BLOCK_TPL']), $this);?>

                             </select>
                             <input type="button" id="listviewblocktpl_butt" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('listviewblocktpl');"/>
                            </td>
                        </tr>
                        </table>
                      </div>
                      
                                            <div style="display:none;" id="labels_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_GLOBAL_LANG']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="global_lang" id="global_lang" class="classname" style="width:80%">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['GLOBAL_LANG_LABELS']), $this);?>

                                </select>
    					       	<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('global_lang');">
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MODULE_LANG']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="module_lang" id="module_lang" class="classname" style="width:80%">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MODULE_LANG_LABELS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('module_lang');">
      						</td>
    					</tr>
                        <?php if ($this->_tpl_vars['TYPE'] == 'professional'): ?>
                         <tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_CUSTOM_LABELS']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="custom_lang" id="custom_lang" class="classname" style="width:80%">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['CUSTOM_LANG_LABELS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('custom_lang');">
      						</td>
    					</tr>
    					<?php endif; ?>
                        </table>
                      </div>
                      
                                            <div style="display:none;" id="company_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_COMPANY_USER_INFO']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="acc_info_type" id="acc_info_type" class="classname" onChange="change_acc_info(this)">
                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['CUI_BLOCKS']), $this);?>

                    <select>
                    <div id="acc_info_div" style="display:inline;">
                      <select name="acc_info" id="acc_info" class="classname">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ACCOUNTINFORMATIONS']), $this);?>

                      </select>
      					      <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('acc_info');">
                    </div>
                    <div id="user_info_div" style="display:none;">
                      <select name="user_info" id="user_info" class="classname">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['USERINFORMATIONS']), $this);?>

                      </select>
      					      <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('user_info');">
                    </div>
                    <div id="logged_user_info_div" style="display:none;">
                      <select name="logged_user_info" id="logged_user_info" class="classname">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['LOGGEDUSERINFORMATION']), $this);?>

                      </select>
      					      <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('logged_user_info');">
                    </div>
      						</td>
    					</tr>
    					<?php if ($this->_tpl_vars['MULTICOMPANYINFORMATIONS'] != ''): ?>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['LBL_MULTICOMPANY']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="multicomapny" id="multicomapny" class="classname">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['MULTICOMPANYINFORMATIONS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('multicomapny');">
      						</td>
    					</tr>
							<?php endif; ?>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['TERMS_AND_CONDITIONS']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="invterandcon" id="invterandcon" class="classname">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['INVENTORYTERMSANDCONDITIONS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('invterandcon');">
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_CURRENT_DATE']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="dateval" id="dateval" class="classname">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['DATE_VARS']), $this);?>

                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('dateval');">
      						</td>
    					</tr>
    					    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_BARCODES']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="barcodeval" id="barcodeval" class="classname">
                                        <optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE1']; ?>
">
                                		     <option value="EAN13">EAN13</option>
                                		     <option value="ISBN">ISBN</option>
                                		     <option value="ISSN">ISSN</option>
                                		</optgroup>
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE2']; ?>
">
                                		     <option value="UPCA">UPCA</option>
                                		     <option value="UPCE">UPCE</option>
                                		     <option value="EAN8">EAN8</option>
                                		</optgroup>
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE3']; ?>
">
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
                                		
                                        <optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE4']; ?>
">     
                                		     <option value="IMB">IMB</option>
                                		     <option value="RM4SCC">RM4SCC</option>
                                		     <option value="KIX">KIX</option>
                                		     <option value="POSTNET">POSTNET</option>
                                		     <option value="PLANET">PLANET</option>
                                		</optgroup>
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_BARCODES_TYPE5']; ?>
">    
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
                                		
                                		<optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_QRCODE']; ?>
">
                                            <option value="QR">QR</option>
                                        </optgroup>
                                </select>
        						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_BARCODE_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('barcodeval');">&nbsp;&nbsp;<a href="modules/PDFMaker/Barcodes.php" target="_new"><img src="themes/images/help_icon.gif" border="0" align="absmiddle"></a>
      						</td>
    					</tr>
    											<?php if ($this->_tpl_vars['TYPE'] == 'professional'): ?>
                        <tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['CUSTOM_FUNCTIONS']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="customfunction" id="customfunction" class="classname">
                                                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['CUSTOM_FUNCTIONS']), $this);?>

                                 </select>
				  				 <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('customfunction');">
      						</td>
    					</tr>
    					<?php endif; ?>
                        </table>
                      </div>
                      
                      
                                            <div style="display:none;" id="headerfooter_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
																								<tr id="header_variables">
													<td valign="top" width="200px" class="cellLabel small"><strong><?php echo $this->_tpl_vars['MOD']['LBL_HEADER_FOOTER_VARIABLES']; ?>
:</strong></td>
													<td class="cellText small" valign=top>
														<select name="header_var" id="header_var" class="classname">
														<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['HEAD_FOOT_VARS'],'selected' => ""), $this);?>

														</select>
														<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('header_var');">
													</td>
												</tr>
																																				                                                <tr>
                                                    <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_DISPLAY_HEADER']; ?>
:</strong></td>
													<td class="cellText small" valign="top">
														<b><?php echo $this->_tpl_vars['MOD']['LBL_ALL_PAGES']; ?>
</b><input type="checkbox" id="dh_allid" name="dh_all" onclick="hf_checkboxes_changed(this, 'header');" <?php echo $this->_tpl_vars['DH_ALL']; ?>
/>
														&nbsp;
														<?php echo $this->_tpl_vars['MOD']['LBL_FIRST_PAGE']; ?>
<input type="checkbox" id="dh_firstid" name="dh_first" onclick="hf_checkboxes_changed(this, 'header');" <?php echo $this->_tpl_vars['DH_FIRST']; ?>
/>
														&nbsp;
														<?php echo $this->_tpl_vars['MOD']['LBL_OTHER_PAGES']; ?>
<input type="checkbox" id="dh_otherid" name="dh_other" onclick="hf_checkboxes_changed(this, 'header');" <?php echo $this->_tpl_vars['DH_OTHER']; ?>
/>
														&nbsp;
													</td>
                                                </tr>
                                                <tr>
                                                    <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_DISPLAY_FOOTER']; ?>
:</strong></td>
													<td class="cellText small" valign="top">
														<b><?php echo $this->_tpl_vars['MOD']['LBL_ALL_PAGES']; ?>
</b><input type="checkbox" id="df_allid" name="df_all" onclick="hf_checkboxes_changed(this, 'footer');" <?php echo $this->_tpl_vars['DF_ALL']; ?>
/>
														&nbsp;
														<?php echo $this->_tpl_vars['MOD']['LBL_FIRST_PAGE']; ?>
<input type="checkbox" id="df_firstid" name="df_first" onclick="hf_checkboxes_changed(this, 'footer');" <?php echo $this->_tpl_vars['DF_FIRST']; ?>
/>
														&nbsp;
														<?php echo $this->_tpl_vars['MOD']['LBL_OTHER_PAGES']; ?>
<input type="checkbox" id="df_otherid" name="df_other" onclick="hf_checkboxes_changed(this, 'footer');" <?php echo $this->_tpl_vars['DF_OTHER']; ?>
/>
														&nbsp;
														<?php echo $this->_tpl_vars['MOD']['LBL_LAST_PAGE']; ?>
<input type="checkbox" id="df_lastid" name="df_last" onclick="hf_checkboxes_changed(this, 'footer');" <?php echo $this->_tpl_vars['DF_LAST']; ?>
/>
														&nbsp;
													</td>
                                                </tr>
                                                																																																                        </table>
                      </div>
                      
						                      <div style="display:none;" id="products_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr><td>
                          
                          <div id="product_div">
                          <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
                                            					<tr>
            						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_BLOC_TPL']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
            						<select name="productbloctpl2" id="productbloctpl2" class="classname">
                                    		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['PRODUCT_BLOC_TPL']), $this);?>

                                   </select>
                                   <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('productbloctpl2');"/>
              		               </td>
                               </tr>
                                <tr>
            						<td valign=top class="small cellLabel" width="200px"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ARTICLE']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
            						<select name="articelvar" id="articelvar" class="classname">
                                    		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ARTICLE_STRINGS']), $this);?>

                                    </select>
                                    <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('articelvar');">
              						</td>
            					</tr>
            			                                        <tr>
            						<td valign=top class="small cellLabel"><strong>*<?php echo $this->_tpl_vars['MOD']['LBL_PRODUCTS_AVLBL']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                    <select name="psfields" id="psfields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SELECT_PRODUCT_FIELD']), $this);?>

                                    </select>
            						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('psfields');">            						
              						</td>
            					</tr>
            					                                
                                <tr>
            						<td valign=top class="small cellLabel"><strong>*<?php echo $this->_tpl_vars['MOD']['LBL_PRODUCTS_FIELDS']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                    <select name="productfields" id="productfields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['PRODUCTS_FIELDS']), $this);?>

                                    </select>
            						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('productfields');">            						
              						</td>
            					</tr>
                                                                
                                <tr>
            						<td valign=top class="small cellLabel"><strong>*<?php echo $this->_tpl_vars['MOD']['LBL_SERVICES_FIELDS']; ?>
:</strong></td>
            						<td class="cellText small" valign=top>
                                    <select name="servicesfields" id="servicesfields" class="classname">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SERVICES_FIELDS']), $this);?>

                                    </select>
            						<input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_INSERT_TO_TEXT']; ?>
" class="crmButton small create" onclick="InsertIntoTemplate('servicesfields');">            						
              						</td>
            					</tr>
                               <tr>
                                <td colspan="2"><small><?php echo $this->_tpl_vars['MOD']['LBL_PRODUCT_FIELD_INFO']; ?>
</small></td>
                               </tr>
            			  </table>
                          </div>
                          
                        </td></tr>
                        </table>
                      </div>
                      
                      
                                            <div style="display:none;" id="settings_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                            					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_FILENAME']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
                                <input type="text" name="nameOfFile" value="<?php echo $this->_tpl_vars['NAME_OF_FILE']; ?>
" id="nameOfFile" class="detailedViewTextBox" style="width:50%;"/>
                                <select name="filename_fields" id="filename_fields" class="classname small" onchange="insertFieldIntoFilename(this.value);">
                                    <option value=""><?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
</option>
                                    <optgroup label="<?php echo $this->_tpl_vars['MOD']['LBL_COMMON_FILEINFO']; ?>
">
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['FILENAME_FIELDS']), $this);?>

                                    </optgroup>
                                    <?php if ($this->_tpl_vars['TEMPLATEID'] != "" || $this->_tpl_vars['SELECTMODULE'] != ""): ?>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SELECT_MODULE_FIELD_FILENAME']), $this);?>

                                    <?php endif; ?>
                                </select>
      						</td>
    					</tr>
                            					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PDF_FORMAT']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
                                <table>
                                   <tr>                                       
                                       <td>
                                           <select name="pdf_format" id="pdf_format" class="classname" onchange="CustomFormat();">
                                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['FORMATS'],'selected' => $this->_tpl_vars['SELECT_FORMAT']), $this);?>
                                    
                                           </select>
                                       </td>
                                       <td style="padding:0">
                                         <table id="custom_format_table" cellpadding="0" cellspacing="2" <?php if ($this->_tpl_vars['SELECT_FORMAT'] != 'Custom'): ?>style="display:none"<?php endif; ?>>
                                           <tr>
                                             <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_WIDTH']; ?>
</b></td>
                                             <td>
                                               <input type="text" name="pdf_format_width" id="pdf_format_width" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['CUSTOM_FORMAT']['width']; ?>
" style="width:50px">
                                             </td>
                                             <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_HEIGHT']; ?>
</b></td>
                                             <td>
                                               <input type="text" name="pdf_format_height" id="pdf_format_height" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['CUSTOM_FORMAT']['height']; ?>
" style="width:50px">
                                             </td>
                                           </tr>
                                         </table>
                                       </td>                                   
                                   </tr>
                                </table>

      						</td>
    					</tr>
    					                        <tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PDF_ORIENTATION']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
                                <select name="pdf_orientation" id="pdf_orientation" class="classname">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ORIENTATIONS'],'selected' => $this->_tpl_vars['SELECT_ORIENTATION']), $this);?>

                                </select>
      						</td>
    					</tr>
    					    					    					    					<tr>
    					   <td valign=top class="small cellLabel" title="<?php echo $this->_tpl_vars['MOD']['LBL_IGNORE_PICKLIST_VALUES_DESC']; ?>
"><strong><?php echo $this->_tpl_vars['MOD']['LBL_IGNORE_PICKLIST_VALUES']; ?>
:</strong></td>
    					   <td class="cellText small" valign="top" title="<?php echo $this->_tpl_vars['MOD']['LBL_IGNORE_PICKLIST_VALUES_DESC']; ?>
"><input type="text" name="ignore_picklist_values" value="<?php echo $this->_tpl_vars['IGNORE_PICKLIST_VALUES']; ?>
" class="detailedViewTextBox"/></td>
    					</tr>
                                                <?php $this->assign('margin_input_width', '50px'); ?>
                        <?php $this->assign('margin_label_width', '50px'); ?>
                        <tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_MARGINS']; ?>
:</strong></td>
    						<td class="cellText small" valign="top">
                                <table>
                                   <tr>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_TOP']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_top" id="margin_top" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['top']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_top',false);">
                                       </td>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_BOTTOM']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_bottom" id="margin_bottom" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['bottom']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_bottom',false);">
                                       </td>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_LEFT']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_left"  id="margin_left" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['left']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_left',false);">
                                       </td>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_RIGHT']; ?>
</b></td>
                                       <td>
                                           <input type="text" name="margin_right" id="margin_right" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['MARGINS']['right']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
" onKeyUp="ControlNumber('margin_right',false);">
                                       </td>
                                   </tr>
                                </table>
                          	</td>
    					</tr>
                            					
    					<tr>
    					   <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_DECIMALS']; ?>
:</strong></td>
    						<td class="cellText small" valign="top">
                                <table>
                                   <tr>
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_DEC_POINT']; ?>
</b></td>
                                       <td><input type="text" maxlength="2" name="dec_point" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['DECIMALS']['point']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
"/></td>
                                       
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_DEC_DECIMALS']; ?>
</b></td>
                                       <td><input type="text" maxlength="2" name="dec_decimals" class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['DECIMALS']['decimals']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
"/></td>
                                       
                                       <td align="right" nowrap><b><?php echo $this->_tpl_vars['MOD']['LBL_DEC_THOUSANDS']; ?>
</b></td>
                                       <td><input type="text" maxlength="2" name="dec_thousands"  class="detailedViewTextBox" value="<?php echo $this->_tpl_vars['DECIMALS']['thousands']; ?>
" style="width:<?php echo $this->_tpl_vars['margin_input_width']; ?>
"/></td>                                       
                                   </tr>
                                </table>
                          	</td>
    					</tr>    					
    					    					<tr>
    					   <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['APP']['LBL_STATUS']; ?>
:</strong></td>    					   
    					   <td class="cellText small" valign="top">
                             <select name="is_active" id="is_active" class="classname" onchange="templateActiveChanged(this);">
                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['STATUS'],'selected' => $this->_tpl_vars['IS_ACTIVE']), $this);?>
   
                             </select>
                           </td>
    					</tr>
    					    					<tr>
    					   <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SETASDEFAULT']; ?>
:</strong></td>    					   
    					   <td class="cellText small" valign="top">
							 <b><?php echo $this->_tpl_vars['MOD']['LBL_FOR_DV']; ?>
</b><input type="checkbox" id="is_default_dv" name="is_default_dv" <?php echo $this->_tpl_vars['IS_DEFAULT_DV_CHECKED']; ?>
/>
                                &nbsp;
                             <b><?php echo $this->_tpl_vars['MOD']['LBL_FOR_LV']; ?>
</b><input type="checkbox" id="is_default_lv" name="is_default_lv" <?php echo $this->_tpl_vars['IS_DEFAULT_LV_CHECKED']; ?>
/>
                                                        <input type="hidden" name="tmpl_order" value="<?php echo $this->_tpl_vars['ORDER']; ?>
" />
                           </td>
    					</tr>
    					    					
                        <tr id="is_portal_row" <?php if ($this->_tpl_vars['SELECTMODULE'] != 'Invoice' && $this->_tpl_vars['SELECTMODULE'] != 'Quotes'): ?>style="display: none;"<?php endif; ?>>
    					   <td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SETFORPORTAL']; ?>
:</strong></td>    					   
    					   <td class="cellText small" valign="top">
                             <input type="checkbox" id="is_portal" name="is_portal" <?php echo $this->_tpl_vars['IS_PORTAL_CHECKED']; ?>
 onclick="return ConfirmIsPortal(this);"/>
                           </td>
    					</tr>    					

                        </table>
                      </div>
                      
                                            <div style="display:none;" id="sharing_div">
                        <table class="dvtContentSpace" width="100%" border="0" cellpadding="3" cellspacing="0" style="padding:10px;">
                        <tr>
    						<td width="200px" valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE_OWNER']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="template_owner" id="template_owner" class="classname">
                                		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['TEMPLATE_OWNERS'],'selected' => $this->_tpl_vars['TEMPLATE_OWNER']), $this);?>

                                </select>
      						</td>
    					</tr>
    					<tr>
    						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['MOD']['LBL_SHARING_TAB']; ?>
:</strong></td>
    						<td class="cellText small" valign=top>
        						<select name="sharing" id="sharing" class="classname" onchange="sharing_changed();">
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['SHARINGTYPES'],'selected' => $this->_tpl_vars['SHARINGTYPE']), $this);?>

                                </select>
                                
                                <div id="sharing_share_div" style="display:none; border-top:2px dotted #DADADA; margin-top:10px; width:100%;">
                                    <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
    								<tr>
    									<td width="40%" valign=top class="cellBottomDotLinePlain small"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER_AVLBL']; ?>
</strong></td>
    									<td width="10%">&nbsp;</td>
    									<td width="40%" class="cellBottomDotLinePlain small"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER_SELECTED']; ?>
</strong></td>
    								</tr>
    								<tr>
    									<td valign=top class="small">
    										<?php echo $this->_tpl_vars['CMOD']['LBL_ENTITY']; ?>
:&nbsp;
    										<select id="sharingMemberType" name="sharingMemberType" class="small" onchange="showSharingMemberTypes()">
    										<option value="groups" selected><?php echo $this->_tpl_vars['CMOD']['LBL_GROUPS']; ?>
</option>
    										<option value="roles"><?php echo $this->_tpl_vars['CMOD']['LBL_ROLES']; ?>
</option>
    										<option value="rs"><?php echo $this->_tpl_vars['CMOD']['LBL_ROLES_SUBORDINATES']; ?>
</option>
    										<option value="users"><?php echo $this->_tpl_vars['CMOD']['LBL_USERS']; ?>
</option>
    										</select>
                                            <input type="hidden" name="sharingFindStr" id="sharingFindStr">&nbsp;
    									</td>
    									<td width="50">&nbsp;</td>
    									<td class="small">&nbsp;</td>
    								</tr>
                              		<tr class="small">
    									<td valign=top><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_OF']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_ENTITY']; ?>
<br>
    										<select id="sharingAvailList" name="sharingAvailList" multiple size="10" class="small crmFormList"></select>
    									</td>
    									<td width="50">
    										<div align="center">
    											<input type="button" name="sharingAddButt" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="sharingAddColumn()" class="crmButton small"/><br /><br />
    											<input type="button" name="sharingDelButt" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="sharingDelColumn()" class="crmButton small"/>
    										</div>
    									</td>
    									<td class="small" style="background-color:#ddFFdd" valign=top><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_OF']; ?>
 &quot;<?php echo $this->_tpl_vars['GROUPNAME']; ?>
&quot; <br>
    										<select id="sharingSelectedColumns" name="sharingSelectedColumns" multiple size="10" class="small crmFormList">
    										<?php $_from = $this->_tpl_vars['MEMBER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
    										<option value="<?php echo $this->_tpl_vars['element']['0']; ?>
"><?php echo $this->_tpl_vars['element']['1']; ?>
</option>
    										<?php endforeach; endif; unset($_from); ?>
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
                      
                                              
                    </td></tr>
                    <tr><td class="small" style="text-align:center;padding:15px 0px 10px 0px;">
					   <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_APPLY_BUTTON_LABEL']; ?>
" class="crmButton small create" onclick="document.PDFMakerEdit.redirect.value='false'; return savePDF();" >&nbsp;&nbsp;
                       <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" class="crmButton small save" onclick="return savePDF();" >&nbsp;&nbsp;            			
            		   <?php if ($_REQUEST['applied'] == 'true'): ?>
            		     <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.location.href='index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid=<?php echo $this->_tpl_vars['SAVETEMPLATEID']; ?>
&parenttab=Tools';" />
            		   <?php else: ?>
                         <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.history.back()" />
                       <?php endif; ?>            			
					</td></tr>
                    </table>

                    <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0"><tr>
                          <td style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                          <td style="width: 15%;" class="dvtSelectedCell" id="body_tab2" onclick="showHideTab2('body');" width="75" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_BODY']; ?>
</b></td>
           				  <td class="dvtUnSelectedCell" id="header_tab2" onclick="showHideTab2('header');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_HEADER_TAB']; ?>
</b></td>
           				  <td class="dvtUnSelectedCell" id="footer_tab2" onclick="showHideTab2('footer');" align="center" nowrap="nowrap"><b><?php echo $this->_tpl_vars['MOD']['LBL_FOOTER_TAB']; ?>
</b></td>
                          <td style="width: 50%;" nowrap="nowrap">&nbsp;</td> 
                    </tr></table>
 
                    <?php echo '   
                        <script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
                    '; ?>
 

                                        <div style="display:block;" id="body_div2">
                        <textarea name="body" id="body" style="width:90%;height:700px" class=small tabindex="5"><?php echo $this->_tpl_vars['BODY']; ?>
</textarea>
                    </div>
                    
                    <script type="text/javascript">
                    	<?php  if (file_exists("kcfinder/browse.php")) {  ?>
                            <?php echo ' CKEDITOR.replace( \'body\',{customConfig:\'../../../modules/PDFMaker/fck_config_kcfinder.js\'} );  '; ?>
 
                        <?php  } else {  ?> 
                            <?php echo ' CKEDITOR.replace( \'body\',{customConfig:\'../../../modules/PDFMaker/fck_config.js\'} ); '; ?>
 
                        <?php  }  ?>
                    </script>
                    
                                        <div style="display:none;" id="header_div2">
                        <textarea name="header_body" id="header_body" style="width:90%;height:200px" class="small"><?php echo $this->_tpl_vars['HEADER']; ?>
</textarea>
                    </div>

                    <script type="text/javascript">
                    	<?php  if (file_exists("kcfinder/browse.php")) {  ?>
                            <?php echo ' CKEDITOR.replace( \'header_body\',{customConfig:\'../../../modules/PDFMaker/fck_config_kcfinder.js\'} );  '; ?>
 
                        <?php  } else {  ?> 
                            <?php echo ' CKEDITOR.replace( \'header_body\',{customConfig:\'../../../modules/PDFMaker/fck_config.js\'} ); '; ?>
 
                        <?php  }  ?>
                    </script>
                    
                                        <div style="display:none;" id="footer_div2">
                        <textarea name="footer_body" id="footer_body" style="width:90%;height:200px" class="small"><?php echo $this->_tpl_vars['FOOTER']; ?>
</textarea>
                    </div>

                    <script type="text/javascript">
                    	<?php  if (file_exists("kcfinder/browse.php")) {  ?>
                            <?php echo ' CKEDITOR.replace( \'footer_body\',{customConfig:\'../../../modules/PDFMaker/fck_config_kcfinder.js\'} );  '; ?>
 
                        <?php  } else {  ?> 
                            <?php echo ' CKEDITOR.replace( \'footer_body\',{customConfig:\'../../../modules/PDFMaker/fck_config.js\'} ); '; ?>
 
                        <?php  }  ?>
                    </script>
                    
                	<?php  if (file_exists("kcfinder/browse.php")) {  ?>
                        <?php echo ' <script type="text/javascript" src="modules/PDFMaker/fck_config_kcfinder.js"></script>'; ?>
 
                    <?php  } else {  ?> 
                        <?php echo ' <script type="text/javascript" src="modules/PDFMaker/fck_config.js"></script>'; ?>
 
                    <?php  }  ?>

                    <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
                        <tr><td class="small" style="text-align:center;padding:10px 0px 10px 0px;" colspan="3">
    					   <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_APPLY_BUTTON_LABEL']; ?>
" class="crmButton small create" onclick="document.PDFMakerEdit.redirect.value='false'; return savePDF();" >&nbsp;&nbsp;
                           <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" class="crmButton small save" onclick="return savePDF();" >&nbsp;&nbsp;            			
                		   <?php if ($_REQUEST['applied'] == 'true'): ?>
                		     <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.location.href='index.php?action=DetailViewPDFTemplate&module=PDFMaker&templateid=<?php echo $this->_tpl_vars['SAVETEMPLATEID']; ?>
&parenttab=Tools';" />
                		   <?php else: ?>
                             <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onclick="window.history.back()" />
                           <?php endif; ?>            			
    		   	        </td></tr>
                    </table>                                  
                    
				</td>
				</tr><tr><td align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo $this->_tpl_vars['MOD']['PDF_MAKER']; ?>
 <?php echo $this->_tpl_vars['VERSION']; ?>
 <?php echo $this->_tpl_vars['MOD']['COPYRIGHT']; ?>
</td></tr>
				</table>
			</td>
			</tr>
                        </form>
			</table>
 
<script>

var selectedTab='properties';
var selectedTab2='body';

function check4null(form)
{

        var isError = false;
        var errorMessage = "";
        // Here we decide whether to submit the form.
        if (trim(form.templatename.value) =='') {
                isError = true;
                errorMessage += "\n template name";
                form.templatename.focus();
        }
        if (trim(form.foldername.value) =='') {
                isError = true;
                errorMessage += "\n folder name";
                form.foldername.focus();
        }
        if (trim(form.subject.value) =='') {
                isError = true;
                errorMessage += "\n subject";
                form.subject.focus();
        }

        // Here we decide whether to submit the form.
        if (isError == true) {
                alert("<?php echo $this->_tpl_vars['MOD']['LBL_MISSING_FIELDS']; ?>
" + errorMessage);
                return false;
        }
 return true;

}

var module_blocks = new Array();

<?php $_from = $this->_tpl_vars['MODULE_BLOCKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blockname'] => $this->_tpl_vars['moduleblocks']):
?>
    module_blocks["<?php echo $this->_tpl_vars['blockname']; ?>
"] = new Array(<?php echo $this->_tpl_vars['moduleblocks']; ?>
);
<?php endforeach; endif; unset($_from); ?>

var module_fields = new Array();

<?php $_from = $this->_tpl_vars['MODULE_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modulename'] => $this->_tpl_vars['modulefields']):
?>
    module_fields["<?php echo $this->_tpl_vars['modulename']; ?>
"] = new Array(<?php echo $this->_tpl_vars['modulefields']; ?>
);
<?php endforeach; endif; unset($_from); ?>
                
var selected_module='<?php echo $this->_tpl_vars['SELECTMODULE']; ?>
';

function change_modulesorce(first,second_name)
{
    if(selected_module!='')
    {
        question = confirm("<?php echo $this->_tpl_vars['MOD']['LBL_CHANGE_MODULE_QUESTION']; ?>
");
        if(question)
        {
            var oEditor = CKEDITOR.instances.body;                        
            oEditor.setData("");
            oEditor = CKEDITOR.instances.header_body;
            oEditor.setData(""); 
            oEditor = CKEDITOR.instances.footer_body;
            oEditor.setData("");
            document.getElementById('nameOfFile').value='';
        }
        else
        {
            first.value=selected_module;
            return;
        }        
    }
    selected_module=first.value;
  if (selected_module != "")
    {
       document.getElementById('related_block_tpl_row').style.display='table-row';
    }
    else
    {
        document.getElementById('related_block_tpl_row').style.display='none';
    }
    
        if (selected_module != "Invoice" && selected_module != "Quotes")
    {
      document.getElementById('is_portal_row').style.display='none';
    }
    else
    {
      document.getElementById('is_portal_row').style.display='table-row';
    }
        
    var module = fillModuleFields(first,second_name);
    fillModuleFields(first,'filename_fields');
    change_relatedmodulesorce(first,'relatedmodulesorce');
    fill_module_lang_array(first.value);
    fill_related_blocks_array(first.value);
}

function fillModuleFields(first,second_name)
{
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
    {
            box2.removeChild(optgroups[i]);
    }

    var blocks = module_blocks[module];
    var blocks_length = blocks.length;
    if(second_name=='filename_fields')
    {
        objOption=document.createElement("option");
        objOption.innerHTML = '<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
';
        objOption.value = '';
        box2.appendChild(objOption);
        
        optGroup = document.createElement('optgroup');
        optGroup.label = '<?php echo $this->_tpl_vars['MOD']['LBL_COMMON_FILEINFO']; ?>
';
        box2.appendChild(optGroup); 
        
        <?php $_from = $this->_tpl_vars['FILENAME_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_val'] => $this->_tpl_vars['field']):
?>
            objOption=document.createElement("option");
            objOption.innerHTML = '<?php echo $this->_tpl_vars['field']; ?>
';
            objOption.value = '<?php echo $this->_tpl_vars['field_val']; ?>
';
            optGroup.appendChild(objOption);
        <?php endforeach; endif; unset($_from); ?>
        
        if(module=='Invoice' || module=='Quotes' || module=='SalesOrder' || module=='PurchaseOrder' || module=='Issuecards' || module=='Receiptcards' || module=="Creditnote" || module=="StornoInvoice")
            blocks_length-=2;
    }  
     
    for(b=0;b<blocks_length;b+=2)
    {
            optGroup = document.createElement('optgroup');
            optGroup.label = blocks[b];
            box2.appendChild(optGroup);

            var list = module_fields[module+'|'+ blocks[b+1]];

    		for(i=0;i<list.length;i+=2)
    		{
    		      //<optgroup label="Addresse" class=\"select\" style=\"border:none\">

                  objOption=document.createElement("option");
                  objOption.innerHTML = list[i];
                  objOption.value = list[i+1];

                  optGroup.appendChild(objOption);
    		}
    }
    
    return module;    
}

var all_related_modules = new Array();

<?php $_from = $this->_tpl_vars['ALL_RELATED_MODULES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['relatedmodulename'] => $this->_tpl_vars['related_modules']):
?>
    all_related_modules["<?php echo $this->_tpl_vars['relatedmodulename']; ?>
"] = new Array('<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE']; ?>
','none'<?php $_from = $this->_tpl_vars['related_modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module1']):
?>,'<?php echo ((is_array($_tmp=$this->_tpl_vars['APP'][$this->_tpl_vars['module1']['2']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 (<?php echo $this->_tpl_vars['module1']['1']; ?>
)','<?php echo $this->_tpl_vars['module1']['2']; ?>
|<?php echo $this->_tpl_vars['module1']['0']; ?>
'<?php endforeach; endif; unset($_from); ?>);
<?php endforeach; endif; unset($_from); ?>

function change_relatedmodulesorce(first,second_name)
{ 
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
    {
            box2.removeChild(optgroups[i]);
    }

    var list = all_related_modules[number];

    for(i=0;i<list.length;i+=2)
    {
          objOption=document.createElement("option");
          objOption.innerHTML = list[i];
          objOption.value = list[i+1];

          box2.appendChild(objOption);
    }

    clearRelatedModuleFields();
}

function clearRelatedModuleFields()
{
    second = document.getElementById("relatedmodulefields");

    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;

    var box2 = second;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {
            box2.removeChild(optgroups[i]);
    }

    objOption=document.createElement("option");
    objOption.innerHTML = "<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
";
    objOption.value = "";

    box2.appendChild(objOption);

}

var related_module_fields = new Array();

<?php $_from = $this->_tpl_vars['RELATED_MODULE_FIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['relatedmodulename'] => $this->_tpl_vars['relatedmodulefields']):
?>
    related_module_fields["<?php echo $this->_tpl_vars['relatedmodulename']; ?>
"] = new Array(<?php echo $this->_tpl_vars['relatedmodulefields']; ?>
);
<?php endforeach; endif; unset($_from); ?>

function change_relatedmodule(first,second_name)
{
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
    {
            box2.removeChild(optgroups[i]);
    }

    if (number == "none")
    {
        objOption=document.createElement("option");
        objOption.innerHTML = "<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_MODULE_FIELD']; ?>
";
        objOption.value = "";

        box2.appendChild(objOption);
    }
    else
    {
        var tmpArr = number.split('|',2);
        var moduleName = tmpArr[0];
        number = tmpArr[1];
        var blocks = module_blocks[moduleName];

        for(b=0;b<blocks.length;b+=2)
        {
            var list = related_module_fields[moduleName+'|'+ blocks[b+1]];

    		if (list.length > 0)
    		{

    		    optGroup = document.createElement('optgroup');
                optGroup.label = blocks[b];
                box2.appendChild(optGroup);

        		for(i=0;i<list.length;i+=2)
        		{
                      objOption=document.createElement("option");
                      objOption.innerHTML = list[i];

                      var objVal = list[i+1];
                      var newObjVal = objVal.replace(moduleName.toUpperCase() + '_', number.toUpperCase() + '_');
                      objOption.value = newObjVal;

                      optGroup.appendChild(objOption);
        		}
    		}
        }
    }
}

function change_acc_info(element)
{

  // alert(element.value);
  switch(element.value)
  {
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
  }
} 

function InsertIntoTemplate(element)
{

    selectField =  document.getElementById(element).value;

    if (selectedTab2 == "body")
        var oEditor = CKEDITOR.instances.body;    
    else if (selectedTab2 == "header")
        var oEditor = CKEDITOR.instances.header_body;
    else if (selectedTab2 == "footer")
        var oEditor = CKEDITOR.instances.footer_body;
    

    if(element!='header_var' && element!='footer_var' && element!='hmodulefields' && element!='fmodulefields' && element!='dateval')
    {
      	 if (selectField != '')
      	 {
               if (selectField == 'ORGANIZATION_STAMP_SIGNATURE')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['COMPANY_STAMP_SIGNATURE']; ?>
';
      	       }
               else if (selectField == 'COMPANY_LOGO')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['COMPANYLOGO']; ?>
';
      	       }
               else if (selectField == 'ORGANIZATION_HEADER_SIGNATURE')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['COMPANY_HEADER_SIGNATURE']; ?>
';
      	       }
      	       else if (selectField == 'VATBLOCK')
       	       {
       	           insert_value = '<?php echo $this->_tpl_vars['VATBLOCK_TABLE']; ?>
';
      	       }
               else
      	       {
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
                      insert_value = '%'+selectField+'%';                      else if(element == "barcodeval")
                      insert_value = '[BARCODE|'+selectField+'=YOURCODE|BARCODE]'; 
                   else if(element == "customfunction")
                      insert_value = '[CUSTOMFUNCTION|'+selectField+'|CUSTOMFUNCTION]'; 
                   else
                      insert_value = '$'+selectField+'$';


               }
               oEditor.insertHtml(insert_value);
      	 }

    }
    else
    {
        
        if (selectField != '')
        {
            if(element=='hmodulefields' || element=='fmodulefields' )
                oEditor.insertHtml('$'+selectField+'$');
            else
                oEditor.insertHtml(selectField);
        }
    }
}



function savePDF()
{
    var pdf_name =  document.getElementById("filename").value;

    var error = 0;

    if (pdf_name == "")
    {
       alert("<?php echo $this->_tpl_vars['MOD']['LBL_PDF_NAME']; ?>
" + alert_arr.CANNOT_BE_EMPTY);
       error++;
    }

    var pdf_module = document.getElementById("modulename").value;

    if (pdf_module == "")
    {
       alert("<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_ERROR']; ?>
");
       error++;
    }

    if (!ControlNumber('margin_top',true) || !ControlNumber('margin_bottom',true) || !ControlNumber('margin_left',true) || !ControlNumber('margin_right',true))
    {
        error++;
    }
    
    if(!CheckCustomFormat())
    {        
        error++;
    }
    
    if(!CheckSharing())
    {
        error++;
    }
    
    if (error > 0)
       return false;
    else
       return true;
}

function ControlNumber(elid,final)
{

    var control_number = document.getElementById(elid).value;

    <?php echo '

    var re = new Array();
    re[1] = new RegExp("^([0-9])");

    re[2] = new RegExp("^[0-9]{1}[.]$");

    re[3] = new RegExp("^[0-9]{1}[.][0-9]{1}$");

    '; ?>


    if (control_number.length > 3 || !re[control_number.length].test(control_number) || (final == true && control_number.length == 2))
    {
        alert("<?php echo $this->_tpl_vars['MOD']['LBL_MARGIN_ERROR']; ?>
");
        document.getElementById(elid).focus();
        return false;
    }
    else
    {
        return true;
    }

}

function refreshPosition(type)
{

    var i;

    selectbox = document.getElementById(type + "_position");
    selectbox_value = selectbox.value;

    for(i=selectbox.options.length-1;i>=0;i--)
    {
        selectbox.remove(i);
    }


    el1 = document.getElementById(type + "_function_left").value;
    el2 = document.getElementById(type + "_function_center").value;
    el3 = document.getElementById(type + "_function_right").value;


    selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_EMPTY_IMAGE']; ?>
", "empty");
    if (el1 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_LEFT']; ?>
", "left");
    if (el2 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_CENTER']; ?>
", "center");
    if (el3 == "hf_function_1") selectbox.options[selectbox.options.length] = new Option("<?php echo $this->_tpl_vars['MOD']['LBL_RIGHT']; ?>
", "right");

    selectbox.value = selectbox_value;

}

function showHideTab(tabname)
{
    document.getElementById(selectedTab+'_tab').className="dvtUnSelectedCell";    
    document.getElementById(tabname+'_tab').className='dvtSelectedCell';
    
    document.getElementById(selectedTab+'_div').style.display='none';
    document.getElementById(tabname+'_div').style.display='block';
    var formerTab=selectedTab;
    selectedTab=tabname;     
}



function showHideTab2(tabname)
{
    document.getElementById(selectedTab2+'_tab2').className="dvtUnSelectedCell";    
    document.getElementById(tabname+'_tab2').className='dvtSelectedCell';
    
        if(tabname == 'body'){
    	document.getElementById('body_variables').style.display='';
    	document.getElementById('related_block_tpl_row').style.display='';
    	document.getElementById('listview_block_tpl_row').style.display='';
    	if(document.getElementById('headerfooter_div').style.display=='block')
				showHideTab('properties');
    } else {
    	document.getElementById('body_variables').style.display='none';
    	document.getElementById('related_block_tpl_row').style.display='none';
    	document.getElementById('listview_block_tpl_row').style.display='none';
    	if(document.getElementById('headerfooter_div').style.display=='none')
				showHideTab('headerfooter');
    }
    
    document.getElementById(selectedTab2+'_div2').style.display='none';
    document.getElementById(tabname+'_div2').style.display='block';
    
    box = document.getElementById('modulename')
    var module = box.options[box.selectedIndex].value;
    var formerTab=selectedTab2;
    selectedTab2=tabname;
}


<?php echo '
function fill_module_lang_array(module)
{    
    new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=fill_lang&langmod=\'+module,
                        onComplete: function(response) {
                                var module_lang = document.getElementById(\'module_lang\');
                                module_lang.length=0;
                                var map = response.responseText.split(\'|@|\');
                                var keys = map[0].split(\'||\');
                                var values = map[1].split(\'||\');
                                
                                for(i=0;i<values.length;i++)
                                {
                                    var item = document.createElement(\'option\');
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
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=fill_relblocks&selmod=\'+module,
                        onComplete: function(response) {
                                var related_block = document.getElementById(\'related_block\');
                                related_block.length=0;
                                var map = response.responseText.split(\'|@|\');
                                var keys = map[0].split(\'||\');
                                var values = map[1].split(\'||\');

                                for(i=0;i<values.length;i++)
                                {
                                    var item = document.createElement(\'option\');
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
    var module = document.getElementById(\'modulename\').value;
    fill_related_blocks_array(module, selected);
}

function InsertRelatedBlock()
{
    var relblockid = document.getElementById(\'related_block\').value;

    if(relblockid == \'\')
        return false;

    var oEditor = CKEDITOR.instances.body;
    new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=get_relblock&relblockid=\'+relblockid,
                        onComplete: function(response) {
                                oEditor.insertHtml(response.responseText);
                        }
                }
        );
}

function EditRelatedBlock()
{
    var relblockid = document.getElementById(\'related_block\').value;
    if(relblockid == \'\')
    {
        '; ?>

        alert('<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_RELBLOCK']; ?>
');
        <?php echo '
        return false;
    }
        
    var popup_url = \'index.php?module=PDFMaker&action=PDFMakerAjax&file=EditRelatedBlock&record=\'+relblockid;
    window.open(popup_url,"Editblock","width=790px,height=630px,scrollbars=yes");
}

function CreateRelatedBlock()
{
    var pdf_module = document.getElementById("modulename").value;
    if(pdf_module == \'\')
    {
        '; ?>

        alert("<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_ERROR']; ?>
");
        return false;
        <?php echo '
    }
    var popup_url = \'index.php?module=PDFMaker&action=PDFMakerAjax&file=EditRelatedBlock&pdfmodule=\'+pdf_module;
    window.open(popup_url,"Editblock","width=790px,height=630px,scrollbars=yes");
}

function DeleteRelatedBlock()
{
    var relblockid = document.getElementById(\'related_block\').value;    
    var result = false;
    if(relblockid == \'\')
    {
        '; ?>

        alert('<?php echo $this->_tpl_vars['MOD']['LBL_SELECT_RELBLOCK']; ?>
');
        <?php echo '
        return false;
    }
    else
    {
        '; ?>

          var selectedIdx = document.getElementById('related_block').selectedIndex;
          result = confirm("<?php echo $this->_tpl_vars['MOD']['LBL_DELETE_RELBLOCK_CONFIRM']; ?>
 '" + document.getElementById("related_block").options[selectedIdx].innerHTML + "'?");
        <?php echo '
    }
    
    if(result)
    {
        new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=delete_relblock&relblockid=\'+relblockid,
                        onComplete: function(response) {
                                refresh_related_blocks_array();
                        }
                }
        );
    }
}

function insertFieldIntoFilename(val)
{
    if(val!=\'\')
        document.getElementById(\'nameOfFile\').value+=\'$\'+val+\'$\';    
}

function EditRelatedBlock_old()
{
'; ?>

    var pdf_module = document.getElementById("modulename").value;
    
    if(pdf_module == '')
    {
        alert("<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_ERROR']; ?>
");
    }
    else
    {
        var popup_url = 'index.php?module=PDFMaker&action=PDFMakerAjax&file=ListRelatedBlocks&pdfmodule='+pdf_module;
        window.open(popup_url,"Editblock","width=790px,height=630px,scrollbars=yes");
    }
<?php echo '
}

function CustomFormat()
{
    var selObj;
    selObj = document.getElementById(\'pdf_format\');
    
    if(selObj.value == \'Custom\')
    {
        document.getElementById(\'custom_format_table\').style.display = \'table\';        
    }
    else
    {
        document.getElementById(\'custom_format_table\').style.display = \'none\';        
    }    
}

function ConfirmIsPortal(oCheck)
{   
    var module = document.getElementById(\'modulename\').value;
    var curr_templatename = document.getElementById(\'filename\').value;     
    
    if(oCheck.defaultChecked == true && oCheck.checked == false)
    {
        '; ?>

        return confirm('<?php echo $this->_tpl_vars['MOD']['LBL_UNSET_PORTAL']; ?>
' + '\n' + '<?php echo $this->_tpl_vars['APP']['ARE_YOU_SURE']; ?>
');
        <?php echo '
    }
    else if(oCheck.defaultChecked == false && oCheck.checked == true)
    {
        new Ajax.Request(
                \'index.php\',
                {queue: {position: \'end\', scope: \'command\'},
                        method: \'post\',
                        postBody: \'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=confirm_portal&langmod=\'+module+\'&curr_templatename=\'+curr_templatename,
                        onComplete: function(response) {                            
                            '; ?>

                            if(confirm(response.responseText + '\n' + '<?php echo $this->_tpl_vars['APP']['ARE_YOU_SURE']; ?>
') == false)
                                oCheck.checked = false;
                            <?php echo '                                   
                        }
                }
        );
        return true;
    }
}

function isLvTmplClicked(source)
{
    var oTrigger = document.getElementById(\'isListViewTmpl\');
    var oButt = document.getElementById(\'listviewblocktpl_butt\');
    var oDlvChbx = document.getElementById(\'is_default_dv\');
    
    document.getElementById(\'listviewblocktpl\').disabled = !(oTrigger.checked);
    oButt.disabled = !(oTrigger.checked);

	if(source != \'init\')
	{
		oDlvChbx.checked = false;
    	oDlvChbx.disabled = oTrigger.checked;
	}
    
    if(oTrigger.checked == true)
    {
        oButt.className = \'crmButton small create\';
    }
    else
    {
        oButt.className = \'crmButton small create inactive\';
    }
}

isLvTmplClicked(\'init\');

function hf_checkboxes_changed(oChck, oType)
{
    var prefix;
    var optionsArr;
    if(oType == \'header\')
    {
        prefix = \'dh_\';
        optionsArr = new Array(\'allid\', \'firstid\', \'otherid\');
    }
    else
    {
        prefix = \'df_\';
        optionsArr = new Array(\'allid\', \'firstid\', \'otherid\', \'lastid\');
    }
        
    var tmpArr = oChck.id.split("_");
    var sufix = tmpArr[1];
    var i;
    if(sufix == \'allid\')
    {
        for(i=0; i<optionsArr.length; i++)
        {
            document.getElementById(prefix + optionsArr[i]).checked = oChck.checked;
        }
    }
    else
    {
        var allChck = document.getElementById(prefix + \'allid\');
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
'; ?>


var constructedOptionValue;
var constructedOptionName;

var roleIdArr=new Array(<?php echo $this->_tpl_vars['ROLEIDSTR']; ?>
);
var roleNameArr=new Array(<?php echo $this->_tpl_vars['ROLENAMESTR']; ?>
);
var userIdArr=new Array(<?php echo $this->_tpl_vars['USERIDSTR']; ?>
);
var userNameArr=new Array(<?php echo $this->_tpl_vars['USERNAMESTR']; ?>
);
var grpIdArr=new Array(<?php echo $this->_tpl_vars['GROUPIDSTR']; ?>
);
var grpNameArr=new Array(<?php echo $this->_tpl_vars['GROUPNAMESTR']; ?>
);

sharing_changed();


//Sharing functions
function sharing_changed()
{
    var selectedValue = document.getElementById('sharing').value;
    if(selectedValue != 'share')
    {
        document.getElementById('sharing_share_div').style.display = 'none';
    }
    else
    {
        document.getElementById('sharing_share_div').style.display = 'block';
        setSharingObjects();
        showSharingMemberTypes();
    }
}

function showSharingMemberTypes()
{
	var selectedOption=document.getElementById('sharingMemberType').value;
	//Completely clear the select box
	document.getElementById('sharingAvailList').options.length = 0;

	if(selectedOption == 'groups')
	{
		constructSelectOptions('groups',grpIdArr,grpNameArr);
	}
	else if(selectedOption == 'roles')
	{
		constructSelectOptions('roles',roleIdArr,roleNameArr);
	}
	else if(selectedOption == 'rs')
	{

		constructSelectOptions('rs',roleIdArr,roleNameArr);
	}
	else if(selectedOption == 'users')
	{
		constructSelectOptions('users',userIdArr,userNameArr);
	}
}

function constructSelectOptions(selectedMemberType,idArr,nameArr)
{
	var i;
	var findStr=document.getElementById('sharingFindStr').value;
	if(findStr.replace(/^\s+/g, '').replace(/\s+$/g, '').length !=0)
	{
		var k=0;
		for(i=0; i<nameArr.length; i++)
		{
			if(nameArr[i].indexOf(findStr) ==0)
			{
				constructedOptionName[k]=nameArr[i];
				constructedOptionValue[k]=idArr[i];
				k++;
			}
		}
	}
	else
	{
		constructedOptionValue = idArr;
		constructedOptionName = nameArr;
	}

	//Constructing the selectoptions
	var j;
	var nowNamePrefix;
	for(j=0;j<constructedOptionName.length;j++)
	{
		if(selectedMemberType == 'roles')
		{
			nowNamePrefix = 'Roles::'
		}
		else if(selectedMemberType == 'rs')
		{
			nowNamePrefix = 'RoleAndSubordinates::'
		}
		else if(selectedMemberType == 'groups')
		{
			nowNamePrefix = 'Group::'
		}
		else if(selectedMemberType == 'users')
		{
			nowNamePrefix = 'User::'
		}

		var nowName = nowNamePrefix + constructedOptionName[j];
		var nowId = selectedMemberType + '::'  + constructedOptionValue[j]
		document.getElementById('sharingAvailList').options[j] = new Option(nowName,nowId);
	}
	//clearing the array
	constructedOptionValue = new Array();
    constructedOptionName = new Array();
}

function sharingAddColumn()
{
    for (i=0;i<selectedColumnsObj.length;i++)
    {
        selectedColumnsObj.options[i].selected=false
    }

    for (i=0;i<availListObj.length;i++)
    {
        if (availListObj.options[i].selected==true)
        {
        	var rowFound=false;
        	var existingObj=null;
            for (j=0;j<selectedColumnsObj.length;j++)
            {
                if (selectedColumnsObj.options[j].value==availListObj.options[i].value)
                {
                    rowFound=true
                    existingObj=selectedColumnsObj.options[j]
                    break
                }
            }

            if (rowFound!=true)
            {
                var newColObj=document.createElement("OPTION")
                newColObj.value=availListObj.options[i].value
                if (browser_ie) newColObj.innerText=availListObj.options[i].innerText
                else if (browser_nn4 || browser_nn6) newColObj.text=availListObj.options[i].text
                selectedColumnsObj.appendChild(newColObj)
                availListObj.options[i].selected=false
                newColObj.selected=true
                rowFound=false
            }
            else
            {
                if(existingObj != null) existingObj.selected=true
            }
        }
    }
}

function sharingDelColumn()
{
    for (i=selectedColumnsObj.options.length;i>0;i--)
    {
    	if (selectedColumnsObj.options.selectedIndex>=0)
            selectedColumnsObj.remove(selectedColumnsObj.options.selectedIndex)
    }
}

function setSharingObjects()
{
    availListObj=getObj("sharingAvailList")
    selectedColumnsObj=getObj("sharingSelectedColumns")
}

//Sharing Ends

function CheckCustomFormat()
{
    if(document.getElementById('pdf_format').value == 'Custom')
    {
        var pdfWidth = document.getElementById('pdf_format_width').value;
        var pdfHeight = document.getElementById('pdf_format_height').value;
        
        if(pdfWidth > 2000 || pdfHeight > 2000 || pdfWidth < 100 || pdfHeight < 100 || isNaN(pdfWidth) || isNaN(pdfHeight) )
        {
            alert('<?php echo $this->_tpl_vars['MOD']['LBL_CUSTOM_FORMAT_ERROR']; ?>
');
            document.getElementById('pdf_format_width').focus();
            return false;
        }
    }

    return true;
}

function CheckSharing()
{
    if(document.getElementById('sharing').value == 'share')
    {
        var selColStr = '';
        var selColObj = document.getElementById('sharingSelectedColumns');
        
        for(i = 0; i < selColObj.options.length; i++)
        {
            selColStr += selColObj.options[i].value + ';';
        }

        if(selColStr == '')
        {
            alert('<?php echo $this->_tpl_vars['MOD']['LBL_SHARING_ERROR']; ?>
');
            document.getElementById('sharingAvailList').focus();
            return false;
        }
        document.getElementById('sharingSelectedColumnsString').value = selColStr;
    }

    return true;
}

function templateActiveChanged(activeElm)
{
    var is_defaultElm1 = document.getElementById('is_default_dv');
    var is_defaultElm2 = document.getElementById('is_default_lv');
    //var is_portalElm = document.getElementById('is_portal');
    if(activeElm.value=='1')
    {
        is_defaultElm1.disabled=false;
        is_defaultElm2.disabled=false;
    }
    else
    {
        is_defaultElm1.checked=false;
        is_defaultElm1.disabled=true;
        is_defaultElm2.checked=false;
        is_defaultElm2.disabled=true;
    }
}
</script>