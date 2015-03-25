<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 19:26:42
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/ProjectTaskSummaryWidgetContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70679982354bfc53298b147-51805325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bebb58b791228bbcb0a44fd5d8c91eefa505f85c' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/ProjectTaskSummaryWidgetContents.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70679982354bfc53298b147-51805325',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RELATED_HEADERS' => 0,
    'HEADER' => 0,
    'MODULE_NAME' => 0,
    'TASK_NAME_HEADER' => 0,
    'TASK_PROGRESS_HEADER' => 0,
    'RELATED_RECORDS' => 0,
    'RELATED_RECORD' => 0,
    'MODULE' => 0,
    'RELATED_MODULE' => 0,
    'NUMBER_OF_RECORDS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bfc532ad840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bfc532ad840')) {function content_54bfc532ad840($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['HEADER']->key => $_smarty_tpl->tpl_vars['HEADER']->value){
$_smarty_tpl->tpl_vars['HEADER']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['HEADER']->value->get('label')=="Project Task Name"){?><?php ob_start();?><?php echo vtranslate($_smarty_tpl->tpl_vars['HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TASK_NAME_HEADER'] = new Smarty_variable($_tmp1, null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['HEADER']->value->get('label')=="Progress"){?><?php ob_start();?><?php echo vtranslate($_smarty_tpl->tpl_vars['HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TASK_PROGRESS_HEADER'] = new Smarty_variable($_tmp2, null, 0);?><?php }?><?php } ?><div class="row-fluid"><span class="span7"><strong><?php echo $_smarty_tpl->tpl_vars['TASK_NAME_HEADER']->value;?>
</strong></span><span class="span4"><span class="pull-right"><strong><?php echo $_smarty_tpl->tpl_vars['TASK_PROGRESS_HEADER']->value;?>
</strong></span></span></div><?php  $_smarty_tpl->tpl_vars['RELATED_RECORD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_RECORD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_RECORDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_RECORD']->key => $_smarty_tpl->tpl_vars['RELATED_RECORD']->value){
$_smarty_tpl->tpl_vars['RELATED_RECORD']->_loop = true;
?><div class="recentActivitiesContainer"><ul class="unstyled"><li><div class="row-fluid"><span class="span7 textOverflowEllipsis"><a href="<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDetailViewUrl();?>
" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE']->value;?>
_Related_Record_<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('id');?>
" title="<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('projecttaskname');?>
"><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('projecttaskname');?>
</a></span><span class="span4 horizontalLeftSpacingForSummaryWidgetContents"><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('projecttaskprogress');?>
</span></span></div></li></ul></div><?php } ?><?php $_smarty_tpl->tpl_vars['NUMBER_OF_RECORDS'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['RELATED_RECORDS']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['NUMBER_OF_RECORDS']->value==5){?><div class="row-fluid"><div class="pull-right"><a class="moreRecentTasks cursorPointer"><?php echo vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div><?php }?><?php }} ?>