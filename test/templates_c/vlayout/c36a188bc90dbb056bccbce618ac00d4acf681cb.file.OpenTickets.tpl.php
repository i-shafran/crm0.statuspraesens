<?php /* Smarty version Smarty-3.1.7, created on 2015-10-07 12:44:29
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/HelpDesk/dashboards/OpenTickets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2872091735614e97d80cf54-35836806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c36a188bc90dbb056bccbce618ac00d4acf681cb' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/HelpDesk/dashboards/OpenTickets.tpl',
      1 => 1436794412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2872091735614e97d80cf54-35836806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5614e97d8365b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5614e97d8365b')) {function content_5614e97d8365b($_smarty_tpl) {?>
<div class="dashboardWidgetHeader">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="dashboardWidgetContent">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashBoardWidgetContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<script type="text/javascript">
	Vtiger_Pie_Widget_Js('Vtiger_Opentickets_Widget_Js',{},{
		/**
		 * Function which will give chart related Data
		 */
		generateData : function() {
			var container = this.getContainer();
			var jData = container.find('.widgetData').val();
			var data = JSON.parse(jData);
			var chartData = [];
			for(var index in data) {
				var row = data[index];
				var rowData = [row.name, parseInt(row.count), row.id];
				chartData.push(rowData);
			}
			return {'chartData':chartData};
		}
	});
</script><?php }} ?>