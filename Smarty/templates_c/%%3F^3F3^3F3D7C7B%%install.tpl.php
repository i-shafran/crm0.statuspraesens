<?php /* Smarty version 2.6.18, created on 2014-11-12 15:52:30
         compiled from modules/EMAILMaker/install.tpl */ ?>
<br/>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>   		
   		<td class="showPanelBg" valign="top" width="100%">
   			<table  cellpadding="0" cellspacing="0" width="100%" border=0>
  				<tr>
				<td width="50%" valign=top>
					<form name="install"  method="POST" action="index.php">
						<input type="hidden" name="module" value="EMAILMaker"/>
						<input type="hidden" name="action" value="install"/>
						<table align="center" cellpadding="15" cellspacing="0" width="85%" class="mailClient importLeadUI small" border="0">
							<tr>
								<td colspan="2" valign="middle" align="left" class="mailClientBg genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NAME']; ?>
 <?php if ($this->_tpl_vars['IS_BASIC'] == 'no'): ?><?php echo $this->_tpl_vars['MOD']['LBL_INSTALL']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['STEP'] != 'error'): ?>>> <?php echo $this->_tpl_vars['STEPNAME']; ?>
 >> <?php echo $this->_tpl_vars['CURRENT_STEP']; ?>
/<span id="total_steps"><?php echo $this->_tpl_vars['TOTAL_STEPS']; ?>
</span><?php endif; ?></td>
								<br/>
							</tr>
							<?php if ($this->_tpl_vars['STEP'] == '1'): ?>
							<tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="70%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">
                                       <input type="hidden" name="installtype" value="validate"/>                                       
                                       <span class="genHeaderSmall"><?php if ($this->_tpl_vars['IS_BASIC'] == 'yes'): ?><?php echo $this->_tpl_vars['MOD']['LBL_UPGRADE_TITLE']; ?>
<?php else: ?><?php echo $this->_tpl_vars['MOD']['LBL_WELCOME']; ?>
<?php endif; ?></span>
  									   </td>
     								 </tr>
                                     
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;color:black;">
     								   <?php if ($this->_tpl_vars['IS_BASIC'] == 'no'): ?><?php echo $this->_tpl_vars['MOD']['LBL_WELCOME_DESC']; ?>
<?php else: ?><?php echo $this->_tpl_vars['MOD']['LBL_UPGRADE_DESC']; ?>
<?php endif; ?>
                                       </td>  
     								 </tr>
     								  <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;color:black;">
     								   <?php if ($this->_tpl_vars['IS_BASIC'] == 'no'): ?><?php echo $this->_tpl_vars['MOD']['LBL_WELCOME_FINISH']; ?>
<?php else: ?><?php echo $this->_tpl_vars['MOD']['LBL_UPGRADE_FINISH']; ?>
<?php endif; ?>
                                       </td>  
     								 </tr>
                                     <tr><td align="left" valign="top" class="small">&nbsp;</td></tr>
                                       
                                     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">
                                       <input type="hidden" name="installtype" value="validate"/>                                       
                                       <strong><?php echo $this->_tpl_vars['MOD']['LBL_INSERT_KEY']; ?>
</strong>
  									   </td>
     								 </tr>
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;color:red;">
     								   <?php echo $this->_tpl_vars['MOD']['LBL_ONLINE_ASSURE']; ?>

                                       </td>  
     								 </tr>   								
     								 <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;padding-top:10px;">
     								   <input type="text" class="small detailedViewTextBox" name="key" value="<?php if ($this->_tpl_vars['IS_BASIC'] == 'yes' && $this->_tpl_vars['LICENSE_KEY'] != ''): ?><?php echo $this->_tpl_vars['LICENSE_KEY']; ?>
<?php endif; ?>" style="width:200px;font-size:13px;"/>
                                       </td>  
     								 </tr>
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="30%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php elseif ($this->_tpl_vars['STEP'] == '2'): ?>
							<input type="hidden" name="installtype" value="redirect_recalculate" />
							<tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="70%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">                                                                               
                                       <span class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_FINAL_INSTRUCTIONS_TITLE']; ?>
</span>
  									   </td>
     								 </tr>
     								 <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;">   								    
                                        <?php echo $this->_tpl_vars['MOD']['LBL_FINAL_INSTRUCTIONS']; ?>

                                       </td>
                                     </tr>
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="50%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php elseif ($this->_tpl_vars['STEP'] == 'error'): ?>
 							<tr>
    							<td border="0" cellpadding="5" cellspacing="0" width="50%">
    							<table width="100%">
    							     <tr>
                                       <td align="left" valign="top" style="padding-left:40px;">                                       
                                       <span class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['LBL_INSTAL_ERROR']; ?>
</span>
  									   </td>
     								 </tr>
                                     <tr>
     								   <td align="left" valign="top" class="small" style="padding-left:40px;">
     								    <?php if ($this->_tpl_vars['INVALID'] != 'true'): ?>
                                            <?php echo $this->_tpl_vars['MOD']['LBL_ERROR_TBL']; ?>
:<br/>
                                        <?php endif; ?>
     								   <?php $_from = $this->_tpl_vars['ERROR_TBL']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tbl']):
?>
     								   <pre><?php echo $this->_tpl_vars['tbl']; ?>
</pre><br />
     								   <?php endforeach; endif; unset($_from); ?>
                                       </td>  
     								 </tr>     								 
    							</table>    							
    						    </td>
    						    <td border="0" cellpadding="5" cellspacing="0" width="50%">
    							&nbsp;
    							</td>
 							</tr>
 							<?php endif; ?>
 							<tr>
								<td align="center" colspan="2" border=0 cellspacing=0 cellpadding=5 width=98% class="layerPopupTransport">	
									<?php if ($this->_tpl_vars['STEP'] == '1'): ?>
                                        <input type="submit" id="validate_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_VALIDATE']; ?>
" class="crmbutton small create"/>&nbsp;&nbsp;
                                        <?php if ($this->_tpl_vars['IS_BASIC'] == 'no'): ?><input type="button" id="order_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_ORDER_NOW']; ?>
" class="crmbutton small cancel" onclick="window.location.href='http://www.vtiger.sk/en/vtiger-shop.html'"/><?php endif; ?>
                                    <?php elseif ($this->_tpl_vars['STEP'] == '2'): ?>
              						    <input type="submit" id="next_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_FINISH']; ?>
" class="crmbutton small create"/>&nbsp;&nbsp;
                                    <?php elseif ($this->_tpl_vars['STEP'] == 'error' && $this->_tpl_vars['INVALID'] != 'true'): ?>
              						    <input type="button" id="refresh_button" value="<?php echo $this->_tpl_vars['MOD']['LBL_RELOAD']; ?>
" class="crmbutton small create" onclick="window.location.reload();"/>&nbsp;&nbsp;
                                    <?php endif; ?> 

              						<?php if ($this->_tpl_vars['STEP'] == 'error'): ?>
                                       <?php if ($this->_tpl_vars['INVALID'] == 'true'): ?>
                                        <input type="button" name="<?php echo $this->_tpl_vars['APP']['LBL_BACK']; ?>
" value="<?php echo $this->_tpl_vars['APP']['LBL_BACK']; ?>
" class="crmbutton small create" onclick="window.history.back()" />
                                       <?php endif; ?>
                                       <input type="button" name="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmbutton small cancel" onclick="window.location.href='index.php?module=Home&action=index&parenttab=My Home Page'" />
                                    <?php endif; ?> 
								</td>
							</tr>
 						</table>
 					</form>
 				</td>
 				</tr>
 			</table>
 		</td>
 	</tr>
</table>

<script>
function changeInstallType(type)
{

   document.getElementById('next_button').disabled = false;
   document.getElementById('next_button').style.display = "inline";
    
   if (type == "express")
   {
        bad_files_count = document.getElementById('bad_files').value;
        
        if (bad_files_count != "0") 
        {
           document.getElementById('next_button').disabled = true;
           document.getElementById('next_button').style.display = "none";
        }          
        
        document.getElementById('total_steps').innerHTML='4';
   }
   else if (type == "custom")
   {        
        document.getElementById('total_steps').innerHTML='5';
   }
}

<?php echo '    
function controlPermissions()
{
    
    
    var url = "module=EMAILMaker&action=EMAILMakerAjax&file=controlPermissions";
    new Ajax.Request(
                    \'index.php\',
                      {queue: {position: \'end\', scope: \'command\'},
                              method: \'post\',
                              postBody:url,
                              onComplete: function(response) {
                                      document.getElementById(\'list_permissions\').innerHTML = response.responseText;
                                      
                                      bad_files_count = document.getElementById(\'bad_files\').value;
                                      
                                      type = document.getElementById(\'installexpress\').checked;
                                      
                                      if (type == true && bad_files_count == "0")
                                      {
                                          document.getElementById(\'next_button\').disabled = false;
                                          document.getElementById(\'next_button\').style.display = "inline";
                                          
                                          document.getElementById(\'btn_control_permissions\').style.display = "none"; 
                                      }
                              }
                      }
                      );
                  
}
'; ?>
    
</script>