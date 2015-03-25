<?php /* Smarty version 2.6.18, created on 2014-09-23 16:29:36
         compiled from modules/SPSocialConnector/SPSocialConnectorEnterUrlWizard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'modules/SPSocialConnector/SPSocialConnectorEnterUrlWizard.tpl', 19, false),)), $this); ?>

<div style="width: 400px;">

	<form method="POST" action="javascript:void(0);">
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" class="small mailClient">
	<tr>
                		<td colspan="2" class="mailClientWriteEmailHeader" width="90%" align="left"><?php echo ((is_array($_tmp='Import')) ? $this->_run_mod_handler('getTranslatedString', true, $_tmp, $this->_tpl_vars['MODULE']) : getTranslatedString($_tmp, $this->_tpl_vars['MODULE'])); ?>
</td>
                	</table>
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" align="center">
	<tr>
		<td>
		
                                                <?php echo ((is_array($_tmp='Enter URL')) ? $this->_run_mod_handler('getTranslatedString', true, $_tmp, $this->_tpl_vars['MODULE']) : getTranslatedString($_tmp, $this->_tpl_vars['MODULE'])); ?>
<br/>
			                        			<input name="message" class="small" size="63" onkeyup="$('__compose_wordcount__').innerHTML=this.value.length;"></input>
		</td>
	<tr>
                		<td align="right"><span id="__compose_wordcount__">0</span> <?php echo ((is_array($_tmp='characters')) ? $this->_run_mod_handler('getTranslatedString', true, $_tmp, $this->_tpl_vars['MODULE']) : getTranslatedString($_tmp, $this->_tpl_vars['MODULE'])); ?>
 </td>
                	</tr>
	</table>
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" class="layerPopupTransport">
	<tr>
		<td class="small" align="center">
	
                        <input type="hidden" name="recordid" value="<?php echo $this->_tpl_vars['RECORDID']; ?>
" />
			<input type="hidden" name="sourcemodule" value="<?php echo $this->_tpl_vars['SOURCEMODULE']; ?>
" />
                        
			<input type="button" class="small crmbutton save" onclick="SPSocialConnectorCommon.LoadProfile(this.form); SPSocialConnectorCommon.hideEnterUrlWizard();" value="     <?php echo $this->_tpl_vars['APP']['LBL_NEXT_BUTTON_LABEL']; ?>
     "/>
			<input type="button" class="small crmbutton cancel" onclick="SPSocialConnectorCommon.hideEnterUrlWizard();" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"/>
		</td>
	</tr>
	</table>

	</form>
</div>