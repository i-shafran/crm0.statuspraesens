<?php /* Smarty version 2.6.18, created on 2014-08-19 17:12:26
         compiled from modules/Import/Import_Advanced_Buttons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'modules/Import/Import_Advanced_Buttons.tpl', 13, false),)), $this); ?>

<input type="submit" name="import" value="<?php echo getTranslatedString('LBL_IMPORT_BUTTON_LABEL', $this->_tpl_vars['MODULE']); ?>
" class="crmButton big edit"
	   onclick="return ImportJs.sanitizeAndSubmit();" />
&nbsp;&nbsp;
<input type="button" name="cancel" value="<?php echo getTranslatedString('LBL_CANCEL_BUTTON_LABEL', $this->_tpl_vars['MODULE']); ?>
" class="crmButton big cancel"
	   onclick="window.history.back()" />