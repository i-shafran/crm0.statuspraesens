<?php /* Smarty version Smarty-3.1.7, created on 2015-09-24 14:35:57
         compiled from "/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Users/Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202076285603e01d5ba9a6-53969789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f689bc195d971cc07a670fe0262466ec157419c6' => 
    array (
      0 => '/www/3.dev.ept.ru/html/includes/runtime/../../layouts/vlayout/modules/Users/Login.tpl',
      1 => 1436794412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202076285603e01d5ba9a6-53969789',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COMPANY_DETAILSCOMPANY_DETAILS' => 0,
    'COMPANY_DETAILS' => 0,
    'APPUNIQUEKEY' => 0,
    'CURRENT_VERSION' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5603e01d63a05',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5603e01d63a05')) {function content_5603e01d63a05($_smarty_tpl) {?>
<!-- for Login page we are added --><link href="libraries/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="libraries/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"><link href="libraries/bootstrap/css/jqueryBxslider.css" rel="stylesheet" /><script src="libraries/jquery/jquery.min.js"></script><script src="libraries/jquery/boxslider/jqueryBxslider.js"></script><script src="libraries/jquery/boxslider/respond.min.js"></script><script>jQuery(document).ready(function(){scrollx = jQuery(window).outerWidth();window.scrollTo(scrollx,0);slider = jQuery('.bxslider').bxSlider({auto: true,pause: 4000,randomStart : true,autoHover: true});jQuery('.bx-prev, .bx-next, .bx-pager-item').live('click',function(){ slider.startAuto(); });});</script><div class="container-fluid login-container"><div class="row-fluid"><div class="span3"><div class="logo"><img src="layouts/vlayout/skins/images/logo.png"><br /><a target="_blank" href="http://<?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILSCOMPANY_DETAILS']->value['website'];?>
"><?php echo $_smarty_tpl->tpl_vars['COMPANY_DETAILS']->value['name'];?>
</a></div></div><div class="span9"><div class="helpLinks"><a href="http://community.salesplatform.ru/">Сообщество</a> |<a href="http://community.salesplatform.ru/forums/">Форум</a> |<a href="http://salesplatform.ru/wiki/">Документация</a> |<a href="http://community.salesplatform.ru/blogs/">Блог</a> |<a href="http://salesplatform.ru/">SalesPlatform.ru</a></div></div></div><div class="row-fluid"><div class="span12"><div class="content-wrapper"><div class="container-fluid"><div class="row-fluid"><div class="span6" id="sp-login-span6"><div class="login-area" id="sp-login-area"><!-- <div class="span6"> --><!--	<div class="login-area"> --><!-- SalesPlatform.ru end --><div class="login-box" id="loginDiv"><div class=""><h3 class="login-header">Вход</h3></div><form class="form-horizontal login-form" style="margin:0;" action="index.php?module=Users&action=Login" method="POST"><?php if (isset($_REQUEST['error'])){?><div class="alert alert-error"><p>Неверное имя пользователя или пароль</p></div><?php }?><?php if (isset($_REQUEST['fpError'])){?><div class="alert alert-error"><p>Неверное имя пользователя или Email</p></div><?php }?><?php if (isset($_REQUEST['status'])){?><div class="alert alert-success"><p>Письмо отправлено на Ваш почтовый ящик</p></div><?php }?><?php if (isset($_REQUEST['statusError'])){?><div class="alert alert-error"><p>Сервер исходящнй почты не настроен</p></div><?php }?><div class="control-group"><label class="control-label" for="username"><b>Пользователь</b></label><div class="controls"><input type="text" id="username" name="username" placeholder="Username"></div></div><div class="control-group"><label class="control-label" for="password"><b>Пароль</b></label><div class="controls"><input type="password" id="password" name="password" placeholder="Password"></div></div><div class="control-group signin-button"><div class="controls" id="forgotPassword"><button type="submit" class="btn btn-primary sbutton">Вход</button>&nbsp;&nbsp;&nbsp;<a>Забыли пароль ?</a></div></div><img src='//stats.salesplatform.ru/stats.php?uid=<?php echo $_smarty_tpl->tpl_vars['APPUNIQUEKEY']->value;?>
&v=<?php echo $_smarty_tpl->tpl_vars['CURRENT_VERSION']->value;?>
&type=U' alt='' title='' border=0 width='1px' height='1px'></form><div class="login-subscript"><small> SalesPlatform Vtiger CRM <?php echo $_smarty_tpl->tpl_vars['CURRENT_VERSION']->value;?>
</small></div></div><div class="login-box hide" id="forgotPasswordDiv"><form class="form-horizontal login-form" style="margin:0;" action="forgotPassword.php" method="POST"><div class=""><h3 class="login-header">Напоминание пароля</h3></div><div class="control-group"><label class="control-label" for="username"><b>Пользователь</b></label><div class="controls"><input type="text" id="username" name="username" placeholder="Username"></div></div><div class="control-group"><label class="control-label" for="email"><b>Email</b></label><div class="controls"><input type="text" id="email" name="email"  placeholder="Email"></div></div><div class="control-group signin-button"><div class="controls" id="backButton"><input type="submit" class="btn btn-primary sbutton" value="Отправить" name="retrievePassword">&nbsp;&nbsp;&nbsp;<a>Назад</a></div></div></form></div></div></div></div></div></div></div></div></div><div class="navbar navbar-fixed-bottom"><div class="navbar-inner"><div class="container-fluid"><div class="row-fluid"><div class="span6 pull-left" ><div class="footer-content"><small>&#169 2004-<?php echo date('Y');?>
&nbsp;<a href="https://www.vtiger.com"> vtiger.com</a> |&nbsp;&#169 2011-<?php echo date('Y');?>
&nbsp; <a href="http://salesplatform.ru/"> SalesPlatform.ru</a></div></div><div class="span6 pull-right" ><div class="pull-right footer-icons"><small><?php echo vtranslate('LBL_CONNECT_WITH_US',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</small><a href="http://community.salesplatform.ru/"><img src="layouts/vlayout/skins/images/forum.png"></a>&nbsp;<a href="https://twitter.com/salesplatformru"><img src="layouts/vlayout/skins/images/twitter.png"></a></div></div></div></div></div></div></body><script>jQuery(document).ready(function(){jQuery("#forgotPassword a").click(function() {jQuery("#loginDiv").hide();jQuery("#forgotPasswordDiv").show();});jQuery("#backButton a").click(function() {jQuery("#loginDiv").show();jQuery("#forgotPasswordDiv").hide();});jQuery("input[name='retrievePassword']").click(function (){var username = jQuery('#user_name').val();var email = jQuery('#emailId').val();var email1 = email.replace(/^\s+/,'').replace(/\s+$/,'');var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;if(username == ''){alert('Пожалуйста, введите корректное имя пользователя');return false;} else if(!emailFilter.test(email1) || email == ''){alert('Пожалуйста, введите корректный Email');return false;} else if(email.match(illegalChars)){alert( "Email содержит некорректные символы");return false;} else {return true;}});});</script>
<?php }} ?>