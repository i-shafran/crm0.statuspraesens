<?php /* Smarty version Smarty-3.1.7, created on 2015-01-21 14:27:27
         compiled from "/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/EditViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112895161054bf7f0f9ce003-24689782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c22713e58ac1647e48f607e92bf9275471a246af' => 
    array (
      0 => '/www/crm0.praesens.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/EditViewActions.tpl',
      1 => 1421831082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112895161054bf7f0f9ce003-24689782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FL_IMPORT_BUTTON' => 0,
    'MODULE' => 0,
    'RECORD_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54bf7f0fa6301',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bf7f0fa6301')) {function content_54bf7f0fa6301($_smarty_tpl) {?>

<div class="row-fluid"><div class="pull-right"><?php if ($_smarty_tpl->tpl_vars['FL_IMPORT_BUTTON']->value&&($_smarty_tpl->tpl_vars['MODULE']->value=='Leads'||$_smarty_tpl->tpl_vars['MODULE']->value=='Accounts'||$_smarty_tpl->tpl_vars['MODULE']->value=='Contacts')){?><button class="btn btn-info" type="button" onclick="SPSocialConnector_Edit_Js.triggerEnterURL('index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&record_id=<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
&view=MassActionAjax&mode=showEnterURLForm');"><strong><?php echo vtranslate('LBL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<?php }?><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><div class="clearfix"></div></div><br></form></div><?php }} ?>