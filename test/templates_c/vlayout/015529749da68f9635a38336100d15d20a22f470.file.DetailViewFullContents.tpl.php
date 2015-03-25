<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 13:47:49
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/DetailViewFullContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155407259754bf75c50efb02-52256961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015529749da68f9635a38336100d15d20a22f470' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/DetailViewFullContents.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155407259754bf75c50efb02-52256961',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'RECORD_STRUCTURE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf75c516265',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf75c516265')) {function content_54bf75c516265($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>
<?php }} ?>