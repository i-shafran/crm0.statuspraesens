{*<!--/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/ -->*}	
<script type="text/javascript" src="modules/{$MODULE}/{$MODULE}.js"></script>
<div id = "layoutblock">
<div id="relatedlistdiv" style="display:none; position: absolute; width: 225px; left: 300px; top: 300px;"></div>
<br>	
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
	<tr>
    <td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
    <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
      <br>	
			{include file='SetMenu.tpl'}
			<table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td rowspan="2" valign="top" width="50"><img src="{'orgshar.gif'|@vtiger_imageurl:$THEME}" alt="Users" title="Users" border="0" height="48" width="48"></td>
					<td class="heading2" valign="bottom">
						<b><a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{$SMOD.VTLIB_LBL_MODULE_MANAGER}</a> 
						&gt;<a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule={$MODULE}&parenttab=Settings">{if $APP.$MODULE } {$APP.$MODULE} {elseif $MOD.$MODULE} {$MOD.$MODULE} {else} {$MODULE} {/if}</a> &gt; 
						<a href="index.php?module={$MODULE}&action=LicenseSettings&parenttab=Settings">{$MOD.LICENSE_SETTINGS}</a></b>
					</td>
				</tr>
				<tr>
					<td class="small" valign="top">{$MOD.LICENSE_SETTINGS_INFO}
					</td>
					<td align="right" width="15%">&nbsp;
					</td>
					<td align="right" width="8%">&nbsp;
					</td>
					&nbsp; <img src="{'vtbusy.gif'|@vtiger_imageurl:$THEME}" id="vtbusy_info" style="display:none;position:absolute;top:180px;right:100px;" border="0" />
				</tr>
			</table>
			<br />
			
<table border="0" cellpadding="3" cellspacing="0" width="100%">
	<tbody><tr><td align="center">
		<div id="licenselistdiv" style="display:block; position:relative; width:225px;width:70%;" class="layerPopup">
		<form action="index.php" method="post" name="form" onsubmit="VtigerJS_DialogBox.block();">
		<input type="hidden" name="fld_module" value="{$MODULE}">
		<input type="hidden" name="parenttab" value="Settings">
		<input type="hidden" name="module" value="EMAILMaker"/>
		<input type="hidden" name="action" id="action" value=""/>
		<input type="hidden" name="file" id="file" value=""/>
        <input type="hidden" name="return_module" value="EMAILMaker"/>
		<input type="hidden" name="return_action" value="LicenseSetings"/>
		<table width="100%" class="settingsSelUITopLine" cellpadding="4" cellspacing="0">
    	<tr>
     		<td align="left" valign="middle" class="small cellLabel" style="width:25%;">
            <input type="hidden" name="installtype" value="" id="" />                                       
            <strong>{$MOD.LBL_LICENCEKEY}</strong>
  			</td>
				<td align="left" valign="middle" class="small" >
     			<input type="text"  class="detailedViewTextBox small" onfocus="this.className='detailedViewTextBoxOn'" onblur="this.className='detailedViewTextBox'" style="width:150px;" value="{$LICENSE}" name="key"/>
     		</td>
     		<td align="left" valign="middle" class="small"  style="width:70%;" nowrap>
				    {if $VERSION_TYPE neq "basic" && $VERSION_TYPE neq "professional"}	
                    <input value="{$MOD.LBL_ACTIVATE_KEY}" name="activate_license_btn"  class="crmbutton small save" title="{$MOD.LBL_ACTIVATE_KEY_TITLE}" onclick="javascript:if(setEMAILMakerLicenseKey(this.form,'validate'))this.form.submit();" type="button">
					&nbsp;
                    {/if}
					<input value="{$MOD.LBL_REACTIVATE}" name="reactivate_license_btn"  class="crmButton small cancel" title="{$MOD.LBL_REACTIVATE_DESC}" onclick="javascript:if(setEMAILMakerLicenseKey(this.form,'reactivate'))this.form.submit();" type="button">
					&nbsp;
                    {if $VERSION_TYPE eq "basic" || $VERSION_TYPE eq "professional"}
					<input value="{$MOD.LBL_DEACTIVATE}" name="deactivate_license_btn"  class="crmButton delete small" title="{$MOD.LBL_DEACTIVATE_DESC}" onclick="javascript:if(setEMAILMakerLicenseKey(this.form,'deactivate','{$MOD.LBL_DEACTIVATE_QUESTION}'))this.form.submit();" type="button">
				    {/if}
                </td> 
			</tr>
		</table>
		</div>
	</form>	
	</td></tr></tbody>
</table>


			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td class="small" align="right" nowrap="nowrap"><a href="#top">{$APP.LBL_SCROLL}</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>