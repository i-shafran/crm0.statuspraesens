<?php /* Smarty version Smarty-3.1.7, created on 2015-09-24 12:35:25
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Install/Step6.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4543204025603dffd58ae44-91619888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d1271e7731dd961bd362f5d758c46385460f609' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Install/Step6.tpl',
      1 => 1435138111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4543204025603dffd58ae44-91619888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'AUTH_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5603dffd5bf39',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5603dffd5bf39')) {function content_5603dffd5bf39($_smarty_tpl) {?>
<form class="form-horizontal" name="step6" method="post" action="index.php">
	<input type=hidden name="module" value="Install" />
	<input type=hidden name="view" value="Index" />
	<input type=hidden name="mode" value="Step7" />
	<input type=hidden name="auth_key" value="<?php echo $_smarty_tpl->tpl_vars['AUTH_KEY']->value;?>
" />

	<div class="row-fluid main-container">
		<div class="inner-container">
			<div class="row-fluid">
				<div class="span10">
					<h4><?php echo vtranslate('LBL_ONE_LAST_THING','Install');?>
</h4>
				</div>
				<div class="span2">
					
                    <a href="http://salesplatform.ru/wiki/index.php/SalesPlatform_vtiger_crm_630" target="_blank" class="pull-right">
                    
                    
						<img src="<?php echo vimage_path('help.png');?>
" alt="Help-Icon"/>
					</a>
				</div>
			</div>
		    <hr>
			<div class="offset2 row-fluid">
				<div class="span8">
					<table class="config-table input-table">
						<tbody>
							<tr>
								<td>    
									<strong>Пожалуйста, выберите вид вашей деятельности</strong> <span class="no">*</span>
                                                                        
                                                                        
								</td>
								<td>
                                                                        
                                                                        <select name="industry" class="select2" required="true" style="width:235px;" placeholder="Выбрать...">
										<option value=""></option> 
										<option>Автомобилестроение</option>
                                                                                <option>Аренда</option>
                                                                                <option>Банковские и финансовые услуги</option>
                                                                                <option>Биотехнологии</option>
                                                                                <option>Бухгалтерия</option> 
                                                                                <option>Государственная служба</option>
                                                                                <option>Здравоохранение</option>
                                                                                <option>Колл-Центр</option>
                                                                                <option>Коммунальные услуги</option>
                                                                                <option>Компьютерная техника</option>
                                                                                <option>Консалтинг</option>
                                                                                <option>Логистика</option>
                                                                                <option>Машиностроение</option>
                                                                                <option>Медиа</option>
                                                                                <option>Недвижимость</option>
                                                                                <option>Некоммерческое</option>
                                                                                <option>Обрабатывающая промышленность</option>
                                                                                <option>Образование</option>
                                                                                <option>Одежда и аксессуары</option>
                                                                                <option>Охранная деятельность</option>
                                                                                <option>Перевозки</option>
                                                                                <option>Подбор персонала</option>
                                                                                <option>Программное обеспечение</option>
                                                                                <option>Продукты питания и услуги</option>
                                                                                <option>Развлечения</option>
										<option>Реклама</option>
                                                                                <option>Розничная и оптовая торговля</option>                                                                         
										<option>Сельское хозяйство</option>
                                                                                <option>Спорт</option>
                                                                                <option>Страхование</option>
                                                                                <option>Строительство</option>
                                                                                <option>Телекоммуникации</option>
										<option>Тузизм</option>
                                                                                <option>Услуги</option>
                                                                                <option>Фармацевтика</option>
                                                                                <option>Финансы</option>
										<option>Химическая промышленность</option>
										<option>Энергетика</option>
										<option>Юриспруденция</option>
										<option>Другое</option>
									</select>
                                                                        
                                                                        
								</td>
							</tr>
							<tr>
								<td colspan="2">
                                                                        
                                                                        Мы собираем анонимную информацию, чтобы помочь нам улучшить 
                                                                        будущие версии Vtiger. Данные о том, как и где используется CRM, помогают 
                                                                        нам определить области в продукте, которые должны быть улучшены. Эти улучшения
                                                                        позволят в будущем сделать Vtiger еще более удобным и эффективным. Собранные
                                                                        данные не будут переданы третьим лицам.
                                                                        
                                                                        
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row-fluid offset2">
				<div class="span8">
					<div class="button-container">
						<input type="button" class="btn btn-large btn-primary" value="<?php echo vtranslate('LBL_NEXT','Install');?>
" name="step7"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<div id="progressIndicator" class="row-fluid main-container hide">
	<div class="inner-container">
		<div class="span12 inner-container">
			<div class="row-fluid">
				<div class="span12 welcome-div alignCenter">
					<h3><?php echo vtranslate('LBL_INSTALLATION_IN_PROGRESS','Install');?>
...</h3><br>
					<img src="<?php echo vimage_path('install_loading.gif');?>
"/>
					<h6><?php echo vtranslate('LBL_PLEASE_WAIT','Install');?>
.... </h6>
				</div>
			</div>
		</div>
	</div>
</div>
</div><?php }} ?>