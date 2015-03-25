<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 14:44:13
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Settings/Webforms/EditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170304222454bf82fdbbb5d7-58942406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a4bde580736a7b314936254ce51cf61ff7d5fe3' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Settings/Webforms/EditView.tpl',
      1 => 1421831101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170304222454bf82fdbbb5d7-58942406',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf82fdc5ece',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf82fdc5ece')) {function content_54bf82fdc5ece($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewBlocks.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="targetFieldsTableContainer"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("FieldsEditView.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><br><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewActions.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="row-fluid" style="margin-bottom:150px;"></div><?php }} ?>