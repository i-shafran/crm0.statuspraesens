<?php /* Smarty version 2.6.18, created on 2014-12-24 16:00:58
         compiled from modules/EMAILMaker/EMAILButtons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'modules/EMAILMaker/EMAILButtons.tpl', 13, false),array('modifier', 'getTranslatedString', 'modules/EMAILMaker/EMAILButtons.tpl', 24, false),)), $this); ?>
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
    		<?php echo $this->_tpl_vars['MOD']['LBL_EMAIL_BUTTONS']; ?>
			
    	</tr>
    
    	<tr>
    		<td class="small" valign="top"><?php echo $this->_tpl_vars['MOD']['LBL_EMAIL_BUTTONS_DESC']; ?>
</td>
    	</tr>
    </tbody>
    </table>		
	<br>	
    <table class="small" border="0" cellpadding="5" cellspacing="0" width="650px">
        <tbody>
                <tr>
            <td class="prvPrfTexture" style="width: 20px;">&nbsp;</td>
            <td valign="top">
            <table class="small listTable" border="0" cellpadding="5" cellspacing="0" width="100%">
                <tbody>
                <tr id="gva">
                  <td class="small colHeader"><strong><?php echo $this->_tpl_vars['APP']['LBL_MODULE']; ?>
</strong><strong></strong></td>
                  <td class="small colHeader"><div align="center"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ALOWED_DETAIL_BLOCK']; ?>
</strong></div></td>
                  <td class="small colHeader"><div align="center"><strong><?php echo $this->_tpl_vars['MOD']['LBL_ALOWED_LISTVIEW_BUTTON']; ?>
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
                      <a href="javascript:void(0);" onclick="vtlib_toggleEmailModule('<?php echo $this->_tpl_vars['module']['tabid']; ?>
', '<?php echo $this->_tpl_vars['module']['name']; ?>
', '<?php if ($this->_tpl_vars['module']['link_type_a'] == 'enabled'): ?>disable<?php else: ?>enable<?php endif; ?>','a');"><img src="themes/images/<?php echo $this->_tpl_vars['module']['link_type_a']; ?>
.gif" alt="<?php if ($this->_tpl_vars['module']['link_type_a'] == 'enabled'): ?>Disable<?php else: ?>Enable<?php endif; ?> <?php echo $this->_tpl_vars['module']['name']; ?>
" title="<?php if ($this->_tpl_vars['module']['link_type_a'] == 'enabled'): ?>Disable<?php else: ?>Enable<?php endif; ?> <?php echo $this->_tpl_vars['module']['name']; ?>
" align="absmiddle" border="0"></a>
                      </td>
                      <td class="small cellText">
                      <a href="javascript:void(0);" onclick="vtlib_toggleEmailModule('<?php echo $this->_tpl_vars['module']['tabid']; ?>
', '<?php echo $this->_tpl_vars['module']['name']; ?>
', '<?php if ($this->_tpl_vars['module']['link_type_b'] == 'enabled'): ?>disable<?php else: ?>enable<?php endif; ?>','b');"><img src="themes/images/<?php echo $this->_tpl_vars['module']['link_type_b']; ?>
.gif" alt="<?php if ($this->_tpl_vars['module']['link_type_b'] == 'enabled'): ?>Disable<?php else: ?>Enable<?php endif; ?> <?php echo $this->_tpl_vars['module']['name']; ?>
" title="<?php if ($this->_tpl_vars['module']['link_type_b'] == 'enabled'): ?>Disable<?php else: ?>Enable<?php endif; ?> <?php echo $this->_tpl_vars['module']['name']; ?>
" align="absmiddle" border="0"></a>
                      </td>

				</tr>
                <?php endforeach; endif; unset($_from); ?>
            </table>
            </td>
        </tr>        
            </table>
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
