<?php /* Smarty version Smarty-3.1.7, created on 2015-09-24 22:15:36
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Import/Import_Step2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194536340456044bd8424bb5-98464702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a62d907dc32575d96200c890051197ac995c0929' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Import/Import_Step2.tpl',
      1 => 1443094544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194536340456044bd8424bb5-98464702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'SUPPORTED_FILE_TYPES' => 0,
    '_FILE_TYPE' => 0,
    'SUPPORTED_FILE_ENCODING' => 0,
    '_FILE_ENCODING' => 0,
    '_FILE_ENCODING_LABEL' => 0,
    'SUPPORTED_DELIMITERS' => 0,
    '_DELIMITER' => 0,
    '_DELIMITER_LABEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56044bd848dbb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56044bd848dbb')) {function content_56044bd848dbb($_smarty_tpl) {?>

<table width="100%" cellspacing="0" cellpadding="2">
	<tr>
		<td><strong><?php echo vtranslate('LBL_IMPORT_STEP_2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</strong></td>
		<td class="big"><?php echo vtranslate('LBL_IMPORT_STEP_2_DESCRIPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
		<td>&nbsp;</td>
	</tr>
	<tr id="file_type_container">
		<td>&nbsp;</td>
		<td><span><?php echo vtranslate('LBL_FILE_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></td>
		<td>
			<select name="type" id="type" onchange="ImportJs.handleFileTypeChange();">
				<?php  $_smarty_tpl->tpl_vars['_FILE_TYPE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_FILE_TYPE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUPPORTED_FILE_TYPES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_FILE_TYPE']->key => $_smarty_tpl->tpl_vars['_FILE_TYPE']->value){
$_smarty_tpl->tpl_vars['_FILE_TYPE']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['_FILE_TYPE']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['_FILE_TYPE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr id="file_encoding_container">
		<td>&nbsp;</td>
		<td><span><?php echo vtranslate('LBL_CHARACTER_ENCODING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></td>
		<td>
			<select name="file_encoding" id="file_encoding">
				<?php  $_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->_loop = false;
 $_smarty_tpl->tpl_vars['_FILE_ENCODING'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUPPORTED_FILE_ENCODING']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->key => $_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->value){
$_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->_loop = true;
 $_smarty_tpl->tpl_vars['_FILE_ENCODING']->value = $_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['_FILE_ENCODING']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['_FILE_ENCODING_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr id="delimiter_container">
		<td>&nbsp;</td>
		<td><span><?php echo vtranslate('LBL_DELIMITER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></td>
		<td>
			<select name="delimiter" id="delimiter">
				<?php  $_smarty_tpl->tpl_vars['_DELIMITER_LABEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->_loop = false;
 $_smarty_tpl->tpl_vars['_DELIMITER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUPPORTED_DELIMITERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->key => $_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->value){
$_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->_loop = true;
 $_smarty_tpl->tpl_vars['_DELIMITER']->value = $_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['_DELIMITER']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['_DELIMITER_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr id="has_header_container">
		<td>&nbsp;</td>
		<td><span><?php echo vtranslate('LBL_HAS_HEADER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></td>
		<td><input type="checkbox" id="has_header" name="has_header" checked /></td>
	</tr>
</table><?php }} ?>