<?php /* Smarty version 2.6.18, created on 2014-12-24 16:01:05
         compiled from modules/EMAILMaker/EditPicklist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'modules/EMAILMaker/EditPicklist.tpl', 13, false),array('modifier', 'getTranslatedString', 'modules/EMAILMaker/EditPicklist.tpl', 24, false),)), $this); ?>
<br />
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
	<td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>
	<div align=center>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'SetMenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
    <tbody>
    	<tr>
    		<td rowspan="2" valign="top" width="50"><img src="<?php echo vtiger_imageurl('quickview.png', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" title="<?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
" border="0" height="48" width="48"></td>
    		<td class="heading2" valign="bottom">
    		
    		<b><a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings"><?php echo getTranslatedString('VTLIB_LBL_MODULE_MANAGER', 'Settings'); ?>
</a> > 
    	<a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=EMAILMaker&parenttab=Settings"><?php echo getTranslatedString('EMAILMaker', 'EMAILMaker'); ?>
</a> > 
    		<?php echo $this->_tpl_vars['MOD']['LBL_PICKLIST_EDITOR']; ?>
			
    	</tr>
    	<tr>
    		<td class="small" valign="top"><?php echo $this->_tpl_vars['MOD']['LBL_PICKLIST_EDITOR_INFO']; ?>
</td>
    	</tr>
    </tbody>
    </table>		
	<br>
    <form action="index.php" method="post">
    <input type="hidden" name="module" value="EMAILMaker">	
    <input type="hidden" name="action" value="EditPicklist">
    <input type="hidden" name="mode" value="<?php if ($this->_tpl_vars['MODE'] == 'view'): ?>edit<?php else: ?>save<?php endif; ?>">
    <table class="small" border="0" cellpadding="5" cellspacing="0" width="350px">
        <tbody>
        <tr>
            <td colspan="2" align="right">
            <?php if ($this->_tpl_vars['MODE'] == 'view'): ?>
                <input type="submit" value=" <?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
 " title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
" class="crmButton small edit" name="edit" >
            <?php else: ?>
                <input type="submit" value=" <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
 " name="save" class="crmButton small save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"/>&nbsp;&nbsp;
                <input type="button" value=" <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
 " name="Cancel" class="crmButton cancel small" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onClick="window.history.back();" />
            <?php endif; ?>
            </td>
        </tr>
        <?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
        <tr>
        <td colspan="2" align="right"><small><?php echo $this->_tpl_vars['MOD']['LBL_PICKLIST_INSTRUCTION']; ?>
</small></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td class="prvPrfTexture" style="width: 20px;">&nbsp;</td>
            <td valign="top">
            <table class="small listTable" border="0" cellpadding="5" cellspacing="0" width="100%">
                <tbody>
                <tr id="gva">
                  <td class="small colHeader"><strong><?php echo $this->_tpl_vars['APP']['LBL_MODULE']; ?>
</strong><strong></strong></td>
                  <td class="small colHeader"><div align="center"><strong><?php echo $this->_tpl_vars['MOD']['LBL_PICKLIST_COUNT']; ?>
</strong></div></td>
                </tr> 
  
				<!-- module loops-->
			    <?php $_from = $this->_tpl_vars['MODULESLIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mailmerge'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mailmerge']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['module']):
        $this->_foreach['mailmerge']['iteration']++;
?>
                <tr>
		          <td class="small cellLabel" width="40%"><p><?php echo $this->_tpl_vars['module']['tablabel']; ?>
</p></td>
		          <td class="small cellText">
                  <?php if ($this->_tpl_vars['MODE'] == 'view'): ?>
                    <?php if ($this->_tpl_vars['module']['count'] == ''): ?>5<?php else: ?><?php echo $this->_tpl_vars['module']['count']; ?>
<?php endif; ?>
                  <?php else: ?>
                    <input type="text" name="email_picklist_value_<?php echo $this->_tpl_vars['module']['tabid']; ?>
" value="<?php echo $this->_tpl_vars['module']['count']; ?>
" class="detailedViewTextBox">
                  <?php endif; ?>
                  </td>
   				</tr>
                <?php endforeach; endif; unset($_from); ?>
            </table>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
            <?php if ($this->_tpl_vars['MODE'] == 'view'): ?>
                <input type="submit" value=" <?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
 " title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
" class="crmButton small edit" name="edit" >
            <?php else: ?>
                <input type="submit" value=" <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
 " name="save" class="crmButton small save" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"/>&nbsp;&nbsp;
                <input type="button" value=" <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
 " name="Cancel" class="crmButton cancel small" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onClick="window.history.back();" />
            <?php endif; ?>
            </td>
        </tr>
    </table>
    </form>
    </div>
	</td>
    <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
    </tr>
</tbody>
</table>
<br>

<?php if ($this->_tpl_vars['ERROR'] == 'true'): ?>
    <script language="javascript" type="text/javascript">
        alert('<?php echo $this->_tpl_vars['MOD']['ALERT_DOWNLOAD_ERROR']; ?>
');
    </script>
<?php endif; ?>

<?php echo '
<script type=\'text/javascript\'>
function vtlib_toggleEmailModule(moduleid, modulename, action, type) {
	if(typeof(type) == \'undefined\') type = \'\';

	var data = "module=EMAILMaker&action=EMAILMakerAjax&file=EMAILButtons&moduleid=" + moduleid + "&modulename=" + encodeURIComponent(modulename) + "&module_" + action + "=true&type="+type;

	$(\'status\').show();
	new Ajax.Request(
		\'index.php\',
        {queue: {position: \'end\', scope: \'command\'},
        	method: \'post\',
            postBody: data,
            onComplete: function(response) {
				$(\'status\').hide();
				// Reload the page to apply the effect of module setting
				window.location.href = \'index.php?module=EMAILMaker&action=EMAILButtons&parenttab=Settings\';
			}
		}
	);
}
</script>
'; ?>
