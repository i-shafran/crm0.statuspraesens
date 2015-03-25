<?php /* Smarty version 2.6.18, created on 2014-12-24 16:22:02
         compiled from modules/SPSocialConnector/SPSocialConnectorSelectWizard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'modules/SPSocialConnector/SPSocialConnectorSelectWizard.tpl', 19, false),array('modifier', 'vtiger_imageurl', 'modules/SPSocialConnector/SPSocialConnectorSelectWizard.tpl', 23, false),)), $this); ?>

<div style="width: 400px;">

	<form method="POST" action="javascript:void(0);">

	<table width="100%" cellpadding="5" cellspacing="0" border="0" class="layerHeadingULine">
	<tr>
                		<td class="genHeaderSmall" width="90%" align="left"><?php echo ((is_array($_tmp='Select URL')) ? $this->_run_mod_handler('getTranslatedString', true, $_tmp, $this->_tpl_vars['MODULE']) : getTranslatedString($_tmp, $this->_tpl_vars['MODULE'])); ?>
</td>
		                		<td width="10%" align="right">
			<a href="javascript:void(0);" onclick="SPSocialConnectorCommon.hideSelectWizard();"><img src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
" border="0"/></a>
		</td>
	</table>
	
	<table width="95%" cellpadding="5" cellspacing="0" border="0" align="center">
	<tr>
		<td>
		
			<table width="100%" cellpadding="5" cellspacing="0" border="0" align="center" bgcolor="white">
			<tr>
                                				<td align="left"><?php echo ((is_array($_tmp='Please select the URL to send the message')) ? $this->_run_mod_handler('getTranslatedString', true, $_tmp, $this->_tpl_vars['MODULE']) : getTranslatedString($_tmp, $this->_tpl_vars['MODULE'])); ?>
 <br/><br/>
                                				
				<div align="center" style="height: 120px; overflow-y: auto; overflow-x: hidden;">
					<table width="90%" cellpadding="5" cellspacing="0" border="0" align="left">
					
					<?php $_from = $this->_tpl_vars['URLFIELDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_FIELDID'] => $this->_tpl_vars['_FIELDINFO']):
?>					
						<?php $_from = $this->_tpl_vars['_FIELDINFO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_FIELDLABEL'] => $this->_tpl_vars['_FIELDNAME']):
?>
						<tr>
							<td align="right" width="15%"><input type="checkbox" name="urltype" value="<?php echo $this->_tpl_vars['_FIELDNAME']; ?>
"/></td>
							<td align="left"><strong><?php echo $this->_tpl_vars['_FIELDLABEL']; ?>
</strong> <?php if ($this->_tpl_vars['FIELDVALUES'][$this->_tpl_vars['_FIELDNAME']]): ?><br/><?php echo $this->_tpl_vars['FIELDVALUES'][$this->_tpl_vars['_FIELDNAME']]; ?>
<?php endif; ?></td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					<?php endforeach; endif; unset($_from); ?>
										
					</table> 	
				</div>
				</td>			
			</tr>			
			</table>			
		
		</td>
	</tr>
	</table>
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" class="layerPopupTransport">
	<tr>
		<td class="small" align="center">
			<input type="hidden" name="idstring" value="<?php echo $this->_tpl_vars['IDSTRING']; ?>
" />
            <input type="hidden" name="excludedRecords" value="<?php echo $this->_tpl_vars['excludedRecords']; ?>
"/>
            <input type="hidden" name="viewid" value="<?php echo $this->_tpl_vars['VIEWID']; ?>
"/>
			<input type="hidden" name="searchurl" value="<?php echo $this->_tpl_vars['SEARCHURL']; ?>
"/>
			<input type="hidden" name="sourcemodule" value="<?php echo $this->_tpl_vars['SOURCEMODULE']; ?>
" />
			<input type="button" class="small crmbutton create" onclick="SPSocialConnectorCommon.displayComposeWizard(this.form);" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
"/>
			<input type="button" class="small crmbutton cancel" onclick="SPSocialConnectorCommon.hideSelectWizard();" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"/>
		</td>
	</tr>
	</table>
	
	</form>

</div>