<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 13:10:16
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/TagCloudContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168363447254bf6cf890c818-78701256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc1dd5b5def8641318b8462ab09c7d6baa1c1bda' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/TagCloudContents.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168363447254bf6cf890c818-78701256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TAGS' => 0,
    'TAG_ID' => 0,
    'TAG_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf6cf8978ae',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf6cf8978ae')) {function content_54bf6cf8978ae($_smarty_tpl) {?>
<div class="tagsContainer" id="tagCloud"><?php  $_smarty_tpl->tpl_vars['TAG_ID'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TAG_ID']->_loop = false;
 $_smarty_tpl->tpl_vars['TAG_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['TAGS']->value[1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['TAG_ID']->key => $_smarty_tpl->tpl_vars['TAG_ID']->value){
$_smarty_tpl->tpl_vars['TAG_ID']->_loop = true;
 $_smarty_tpl->tpl_vars['TAG_NAME']->value = $_smarty_tpl->tpl_vars['TAG_ID']->key;
?><a class="tagName cursorPointer" data-tagid="<?php echo $_smarty_tpl->tpl_vars['TAG_ID']->value;?>
" rel="<?php echo $_smarty_tpl->tpl_vars['TAGS']->value[0][$_smarty_tpl->tpl_vars['TAG_NAME']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['TAG_NAME']->value;?>
</a>&nbsp;<?php } ?></div>	<?php }} ?>