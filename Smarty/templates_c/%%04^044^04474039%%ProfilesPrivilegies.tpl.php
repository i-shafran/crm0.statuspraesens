<?php /* Smarty version 2.6.18, created on 2014-12-24 16:01:02
         compiled from modules/EMAILMaker/ProfilesPrivilegies.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'modules/EMAILMaker/ProfilesPrivilegies.tpl', 13, false),array('modifier', 'getTranslatedString', 'modules/EMAILMaker/ProfilesPrivilegies.tpl', 25, false),)), $this); ?>
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
    		<?php echo $this->_tpl_vars['MOD']['LBL_PROFILES']; ?>
			
    	</tr>
    
    	<tr>
    		<td class="small" valign="top"><?php echo $this->_tpl_vars['MOD']['LBL_PROFILES_DESC']; ?>
</td>
    	</tr>
    </tbody>
    </table>
    <br />
    
    <div style="padding:10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr class="small">
                <td><img src="<?php echo vtiger_imageurl('prvPrfTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
                <td class="prvPrfTopBg" width="100%"></td>
                <td><img src="<?php echo vtiger_imageurl('prvPrfTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
            </tr>
        </table>
        
        <form name="profiles_privilegies" action="index.php" method="post" >
        <input type="hidden" name="module" value="EMAILMaker" />
        <input type="hidden" name="action" value="ProfilesPrivilegies" />
        <input type="hidden" name="mode" value="save" />
        <table class="prvPrfOutline" border="0" cellpadding="10" cellspacing="0" width="100%">
            <tr><td>
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td valign="top" width="20px"><img src="<?php echo vtiger_imageurl('prvPrfHdrArrow.gif', $this->_tpl_vars['THEME']); ?>
"> </td>
                        <td class="prvPrfBigText"><b> <?php echo $this->_tpl_vars['MOD']['LBL_SETPRIVILEGIES']; ?>
 </b></td>
                        <td align="right">
                            <input type="submit" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" class="crmButton small save" />
                            &nbsp;
                            <input type="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" onClick="window.history.back();" />
                        </td>    
                    </tr>
                </table>
                <br />
                <table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="90%" style="margin:0 auto;">
                    <tr>
                        <td class="colHeader" width="40%"><?php echo $this->_tpl_vars['MOD']['LBL_PROFILES']; ?>
</td>
                        <td class="colHeader" width="20%" align="center"><?php echo $this->_tpl_vars['MOD']['LBL_CREATE_EDIT']; ?>
</td>
                        <td class="colHeader" width="20%" align="center"><?php echo $this->_tpl_vars['MOD']['LBL_VIEW']; ?>
</td>
                        <td class="colHeader" width="20%" align="center"><?php echo $this->_tpl_vars['MOD']['LBL_DELETE']; ?>
</td>                    
                    </tr>
                    
                    <?php $_from = $this->_tpl_vars['PERMISSIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr']):
?>
                        <?php $_from = $this->_tpl_vars['arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['profile_name'] => $this->_tpl_vars['profile_arr']):
?>
                            <tr>
                                <td class="cellLabel">
                                    <?php echo $this->_tpl_vars['profile_name']; ?>
                                    
                                </td>
                                <td class="cellText" align="center">
                                    <input type="checkbox" <?php echo $this->_tpl_vars['profile_arr']['EDIT']['checked']; ?>
 id="<?php echo $this->_tpl_vars['profile_arr']['EDIT']['name']; ?>
" name="<?php echo $this->_tpl_vars['profile_arr']['EDIT']['name']; ?>
" onclick="other_chk_clicked(this, '<?php echo $this->_tpl_vars['profile_arr']['DETAIL']['name']; ?>
')"/>                                    
                                </td>
                                <td class="cellText" align="center">
                                    <input type="checkbox" <?php echo $this->_tpl_vars['profile_arr']['DETAIL']['checked']; ?>
 id="<?php echo $this->_tpl_vars['profile_arr']['DETAIL']['name']; ?>
" name="<?php echo $this->_tpl_vars['profile_arr']['DETAIL']['name']; ?>
" onclick="view_chk_clicked(this, '<?php echo $this->_tpl_vars['profile_arr']['EDIT']['name']; ?>
', '<?php echo $this->_tpl_vars['profile_arr']['DELETE']['name']; ?>
');"/>                                    
                                </td>
                                <td class="cellText" align="center">
                                    <input type="checkbox" <?php echo $this->_tpl_vars['profile_arr']['DELETE']['checked']; ?>
 id="<?php echo $this->_tpl_vars['profile_arr']['DELETE']['name']; ?>
" name="<?php echo $this->_tpl_vars['profile_arr']['DELETE']['name']; ?>
" onclick="other_chk_clicked(this, '<?php echo $this->_tpl_vars['profile_arr']['DETAIL']['name']; ?>
')"/>
                                </td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>    
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            </td></tr>
        </table>
        </form>        
    </div>
    
    </div>
	</td>
    <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
    </tr>
</tbody>
</table>
<br>

<?php echo '
<script language="javascript" type="text/javascript">
function view_chk_clicked(source_chk, edit_chk_id, delete_chk_id)
{
    if(source_chk.checked == false)
    {
        document.getElementById(edit_chk_id).checked = false;
        document.getElementById(delete_chk_id).checked = false;
    }
}

function other_chk_clicked(source_chk, detail_chk)
{   
    if(source_chk.checked == true)
    {
        document.getElementById(detail_chk).checked = true;
    }
}
</script>
'; ?>
    