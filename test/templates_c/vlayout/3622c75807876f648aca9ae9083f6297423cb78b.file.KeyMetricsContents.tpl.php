<?php /* Smarty version Smarty-3.1.7, created on 2015-10-07 12:44:35
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/KeyMetricsContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10451522425614e983903339-11187190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3622c75807876f648aca9ae9083f6297423cb78b' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/KeyMetricsContents.tpl',
      1 => 1436794412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10451522425614e983903339-11187190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'KEYMETRICS' => 0,
    'KEYMETRIC' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5614e983943f9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5614e983943f9')) {function content_5614e983943f9($_smarty_tpl) {?>
<div style='padding:5px'><?php  $_smarty_tpl->tpl_vars['KEYMETRIC'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['KEYMETRIC']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['KEYMETRICS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['KEYMETRIC']->key => $_smarty_tpl->tpl_vars['KEYMETRIC']->value){
$_smarty_tpl->tpl_vars['KEYMETRIC']->_loop = true;
?><div style='padding:5px'><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['count'];?>
</span><a href="?module=<?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['module'];?>
&view=List&viewname=<?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['id'];?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['KEYMETRIC']->value['name'],$_smarty_tpl->tpl_vars['KEYMETRIC']->value['module']);?>
</a></div><?php } ?></div>
<?php }} ?>