<?php /* Smarty version Smarty-3.1.7, created on 2015-09-30 13:11:25
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/SideBar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:412732529560bb54df101c5-12902590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '707d68fdb79afe8090eca61b126489b2ff847212' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/SideBar.tpl',
      1 => 1436794412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '412732529560bb54df101c5-12902590',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560bb54df3817',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560bb54df3817')) {function content_560bb54df3817($_smarty_tpl) {?>
<div class="sideBarContents"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarLinks.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="clearfix"></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>