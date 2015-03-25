<?php /* Smarty version 2.6.18, created on 2014-08-16 01:05:06
         compiled from modules/EMAILMaker/EmailMakerActions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'modules/EMAILMaker/EmailMakerActions.tpl', 15, false),array('modifier', 'vtiger_imageurl', 'modules/EMAILMaker/EmailMakerActions.tpl', 22, false),)), $this); ?>
<table border=0 cellspacing=0 cellpadding=0 style="width:100%;">
  <?php if ($this->_tpl_vars['CRM_TEMPLATES_EXIST'] == '0'): ?>
        <tr>
  		<td class="rightMailMergeContent"  style="width:100%;">
			<select name="use_common_email_template" id="use_common_email_template" class="detailedViewTextBox"  style="width:90%;" size="<?php echo $this->_tpl_vars['PICKLIST_COUNT']; ?>
">
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['CRM_TEMPLATES'],'selected' => $this->_tpl_vars['DEFAULT_TEMPLATE']), $this);?>
  
            </select>        
  		</td>
		</tr>
  <?php endif; ?>
    	<tr>
          	<td class="rightMailMergeContent"  style="width:100%;">  			
        		<a href="javascript:;" onclick="fnvshobj(this,'sendemakermail_cont');sendEMakerMail('<?php echo $this->_tpl_vars['MODULE']; ?>
','<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><img src="<?php echo vtiger_imageurl('sendmail.png', $this->_tpl_vars['THEME']); ?>
" hspace="5" align="absmiddle" border="0"/></a>
        		<a href="javascript:;" onclick="fnvshobj(this,'sendemakermail_cont');sendEMakerMail('<?php echo $this->_tpl_vars['MODULE']; ?>
','<?php echo $this->_tpl_vars['ID']; ?>
');" class="webMnu"><?php echo $this->_tpl_vars['APP']['LBL_SENDMAIL_BUTTON_LABEL']; ?>
</a>  
                <div id="sendemakermail_cont" style="z-index:100001;position:absolute;"></div>
            </td>
        </tr>
</table>
