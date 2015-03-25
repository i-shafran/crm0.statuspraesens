<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 13:47:41
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/DetailViewSidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176525872754bf75bd8301f8-92273645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd77d0be471d01ae1db1f49e6b74747270739e70c' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/DetailViewSidebar.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176525872754bf75bd8301f8-92273645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf75bd86723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf75bd86723')) {function content_54bf75bd86723($_smarty_tpl) {?>
<div class="row-fluid"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBar.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>