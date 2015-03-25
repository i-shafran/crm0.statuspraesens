<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 13:10:16
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/DashBoardWidgetContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114459021654bf6cf8d04de5-22812104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38b63bc9ea844a6f8f698b491971d85ef75496af' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/DashBoardWidgetContents.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114459021654bf6cf8d04de5-22812104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DATA' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf6cf8d7042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf6cf8d7042')) {function content_54bf6cf8d7042($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['DATA']->value)>0){?><input class="widgetData" type=hidden value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATA']->value));?>
' /><div class="widgetChartContainer" style="height:250px;width:85%"></div><?php }else{ ?><span class="noDataMsg"><?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 <?php echo vtranslate('LBL_MATCHED_THIS_CRITERIA');?>
</span><?php }?><?php }} ?>