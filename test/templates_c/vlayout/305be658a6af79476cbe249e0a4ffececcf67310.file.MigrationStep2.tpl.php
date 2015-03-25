<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 13:10:10
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Migration/MigrationStep2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189713092754bf6cf27eda19-60374996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '305be658a6af79476cbe249e0a4ffececcf67310' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Migration/MigrationStep2.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189713092754bf6cf27eda19-60374996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf6cf28b55b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf6cf28b55b')) {function content_54bf6cf28b55b($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Header.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid page-container"><div class="row-fluid"><div class="span6"><div class="logo"><img src="<?php echo vimage_path('logo.png');?>
" alt="Vtiger Logo"/></div></div><div class="span6"><div class="head pull-right"><h3> <?php echo vtranslate('LBL_MIGRATION_WIZARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div></div></div><div class="row-fluid main-container"><div class="span12 inner-container"><div class="row-fluid"><div class="span10"><h4> <?php echo vtranslate('LBL_MIGRATION_COMPLETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h4></div></div><hr><div class="row-fluid"><div class="span4 welcome-image"><img src="<?php echo vimage_path('migration_screen.png');?>
" alt="Vtiger Logo"/></div><div class="span1"></div><div class="span6"><br><br><h5><?php echo vtranslate('LBL_MIGRATION_COMPLETED_SUCCESSFULLY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
  </h5><br><br><?php echo vtranslate('LBL_CRM_DOCUMENTATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><?php echo vtranslate('LBL_TALK_TO_US_AT_FORUMS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><?php echo vtranslate('LBL_DISCUSS_WITH_US_AT_BLOGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><br><br><br><div class="button-container"><input type="button" onclick="window.location.href='index.php'" class="btn btn-large btn-primary" value="<?php echo vtranslate('Finish',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/></div></div></div></div></div></div></div><?php }} ?>