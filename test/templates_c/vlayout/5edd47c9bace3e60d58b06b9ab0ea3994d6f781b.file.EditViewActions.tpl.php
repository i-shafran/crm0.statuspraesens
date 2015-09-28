<?php /* Smarty version Smarty-3.1.7, created on 2015-09-28 14:14:08
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/EditViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26908346956092100911607-83923446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5edd47c9bace3e60d58b06b9ab0ea3994d6f781b' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Vtiger/EditViewActions.tpl',
      1 => 1436794412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26908346956092100911607-83923446',
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
  'unifunc' => 'content_560921009428f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560921009428f')) {function content_560921009428f($_smarty_tpl) {?>

<div class="row-fluid"><div class="pull-right"><?php if ($_smarty_tpl->tpl_vars['FL_IMPORT_BUTTON']->value&&($_smarty_tpl->tpl_vars['MODULE']->value=='Leads'||$_smarty_tpl->tpl_vars['MODULE']->value=='Accounts'||$_smarty_tpl->tpl_vars['MODULE']->value=='Contacts')){?><button class="btn btn-info" type="button" onclick="SPSocialConnector_Edit_Js.triggerEnterURL('index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&record_id=<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
&view=MassActionAjax&mode=showEnterURLForm');"><strong><?php echo vtranslate('LBL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<?php }?><button class="btn btn-success" type="submit"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><div class="clearfix"></div></div><br></form></div><?php }} ?>