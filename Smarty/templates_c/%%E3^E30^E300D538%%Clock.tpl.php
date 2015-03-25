<?php /* Smarty version 2.6.18, created on 2014-08-16 01:04:21
         compiled from Clock.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'Clock.tpl', 21, false),)), $this); ?>

<?php if ($this->_tpl_vars['WORLD_CLOCK_DISPLAY'] == 'true'): ?>

<div id="wclock" style="z-index:10000001;" class="layerPopup">
	<table class="mailClientBg" align="center" border="0" cellpadding="5" cellspacing="0" width="100%">
	<tr style="cursor:move;" >
		<td style="text-align:left;" id="Handle"><b><?php echo $this->_tpl_vars['APP']['LBL_WORLD_CLOCK']; ?>
</b></td>
		<td align="right">
			<a href="javascript:;">
				<img src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
" border="0"  onClick="fninvsh('wclock')" hspace="5" align="absmiddle">
			</a>
		</td>
	</tr>
	</table>
	<table class="hdrNameBg" align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
	<tr>
	<td nowrap="nowrap" colspan="2">
	<div style="background-image: url(<?php echo $this->_tpl_vars['IMAGEPATH']; ?>
clock_bg.gif); background-repeat: no-repeat; background-position: 4px 38px;" id="theClockLayer">
<div id="theCities" class="citystyle">
<form action="" name="frmtimezone">
<input name="PHPSESSID" value="162c0ab587f6c555aaaa30d681b61f7c" type="hidden">
<input type="hidden" name="monthstransl" value=<?php echo $this->_tpl_vars['MONTHSTRANSL']; ?>
>
<select name="clockcity" size="1" class="importBox small"   id="clockcity" style="width:125px;"  onchange="lcl(this.selectedIndex,this.options[0].selected)">
<?php $_from = $this->_tpl_vars['COUNTRYSTIMEDATATRANSL']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['COUNTRYVALUE']):
?>
    <?php if (($this->_foreach['foo']['iteration']-1) == 0): ?>
        <option value="<?php echo $this->_tpl_vars['COUNTRYVALUE'][0]; ?>
" selected="selected"><?php echo $this->_tpl_vars['COUNTRYVALUE'][1]; ?>
</option>
    <?php else: ?>  
        <option value="<?php echo $this->_tpl_vars['COUNTRYVALUE'][0]; ?>
"><?php echo $this->_tpl_vars['COUNTRYVALUE'][1]; ?>
</option>
    <?php endif; ?>    
<?php endforeach; endif; unset($_from); ?>
</select>
</form>
</div>
<script type="text/javascript">
        var theme = "<?php echo $this->_tpl_vars['THEME']; ?>
";
</script>
<script type="text/javascript" src="include/js/clock.js"></script>

<div id="theFace0" class="facestyle" style="color: rgb(0, 0, 0); top: 81px; left: 96px;">3</div>
<div id="theFace1" class="facestyle" style="color: rgb(0, 0, 0); top: 102px; left: 90.3731px;">4</div>
<div id="theFace2" class="facestyle" style="color: rgb(0, 0, 0); top: 117.373px; left: 75px;">5</div>
<div id="theFace3" class="facestyle" style="color: rgb(0, 0, 0); top: 123px; left: 54px;">6</div>
<div id="theFace4" class="facestyle" style="color: rgb(0, 0, 0); top: 117.373px; left: 33px;">7</div>
<div id="theFace5" class="facestyle" style="color: rgb(0, 0, 0); top: 102px; left: 17.6269px;">8</div>
<div id="theFace6" class="facestyle" style="color: rgb(0, 0, 0); top: 81px; left: 12px;">9</div>
<div id="theFace7" class="facestyle" style="color: rgb(0, 0, 0); top: 60px; left: 17.6269px;">10</div>
<div id="theFace8" class="facestyle" style="color: rgb(0, 0, 0); top: 44.6269px; left: 33px;">11</div>
<div id="theFace9" class="facestyle" style="color: rgb(0, 0, 0); top: 39px; left: 54px;">12</div>
<div id="theFace10" class="facestyle" style="color: rgb(0, 0, 0); top: 44.6269px; left: 75px;">1</div>
<div id="theFace11" class="facestyle" style="color: rgb(0, 0, 0); top: 60px; left: 90.3731px;">2</div>
</div></td>
</tr>
</tbody>
</table>
</div>
<script>
	var theHandle = document.getElementById("Handle");
	var theRoot   = document.getElementById("wclock");
	Drag.init(theHandle, theRoot);
</script>

<?php endif; ?>