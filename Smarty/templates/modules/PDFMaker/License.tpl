{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<br />
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
	<td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>

	<div align=center>
    {include file='SetMenu.tpl'}
    <table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
    <tbody>
    	<tr>
    		<td rowspan="2" valign="top" width="50"><img src="{'quickview.png'|@vtiger_imageurl:$THEME}" border="0" height="48" width="48"></td>
    		<td class="heading2" valign="bottom">
    		   <a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{'VTLIB_LBL_MODULE_MANAGER'|@getTranslatedString:'Settings'}</a> &gt;
    	       <a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=PDFMaker&parenttab=Settings">{'PDFMaker'|@getTranslatedString:'PDFMaker'}</a> &gt;
    		{$MOD.LBL_LICENSE}
    		</td>
    	</tr>

    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_LICENSE_DESC}</td>
    	</tr>
    </tbody>
    </table>
    <br />

	<form action="index.php" method="post" name="form" onsubmit="VtigerJS_DialogBox.block();">
	<input type="hidden" name="parenttab" value="Settings">
	<input type="hidden" name="module" value="{$MODULE}"/>
	<input type="hidden" name="action" id="action" value="{$MODULE}Ajax"/>
	<input type="hidden" name="file" id="file" value=""/>
    <input type="hidden" name="return_module" value="{$MODULE}"/>
	<input type="hidden" name="return_action" value="License"/>
    <div style="padding:10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr class="small">
                <td><img src="{'prvPrfTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
                <td class="prvPrfTopBg" width="100%"></td>
                <td><img src="{'prvPrfTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
            </tr>
        </table>

        <table class="prvPrfOutline" border="0" cellpadding="10" cellspacing="0" width="100%">
            <tr><td>
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td valign="top" width="20px"><img src="{'prvPrfHdrArrow.gif'|@vtiger_imageurl:$THEME}"> </td>
                        <td class="prvPrfBigText"><b> {$MOD.LBL_LICENSE_DESC}</b></td>
                    </tr>
                </table>
                <br />

                <table width="100%" cellspacing="0" cellpadding="5" border="0" class="tableHeading">
					<tr><td class="big"><strong>{$MOD.LBL_LICENSE}</strong></td></tr>
				</table>

                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <td class="dvtCellLabel" width="25%" align="right">{$MOD.LBL_LICENSE_KEY}</td>
                        <td class="dvtCellInfo" width="75%" align="left">
							<input type="text"  class="detailedViewTextBox small" onfocus="this.className='detailedViewTextBoxOn'" onblur="this.className='detailedViewTextBox'" style="width:200px;" value="{$LICENSE}" name="key"/>
                            &nbsp;
							{if $VERSION_TYPE neq "basic" && $VERSION_TYPE neq "professional"}
		                    	<input value="{$MOD.LBL_ACTIVATE_KEY}" name="activate_license_btn"  class="crmbutton small save" title="{$MOD.LBL_ACTIVATE_KEY_TITLE}" onclick="javascript:if(setLicenseKey(this.form,'validate'))this.form.submit();" type="button">
							{else}
								<input value="{$MOD.LBL_REACTIVATE}" name="reactivate_license_btn"  class="crmButton small cancel" title="{$MOD.LBL_REACTIVATE_DESC}" onclick="javascript:if(setLicenseKey(this.form,'reactivate'))this.form.submit();" type="button">
                            {/if}
		                    {if $VERSION_TYPE eq "basic" || $VERSION_TYPE eq "professional"}
	                            &nbsp;
								<input value="{$MOD.LBL_DEACTIVATE}" name="deactivate_license_btn"  class="crmButton delete small" title="{$MOD.LBL_DEACTIVATE_DESC}" onclick="javascript:if(setLicenseKey(this.form,'deactivate','{$MOD.LBL_DEACTIVATE_QUESTION}'))this.form.submit();" type="button">
						    {/if}
		                </td>
                    </tr>
                </table>
            </td></tr>
        </table>
    </div>
    </form>

    </div>
	</td>
    <td valign="top"><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
    </tr>
</tbody>
</table>
<br />
{literal}
<script type="text/javascript" language="javascript">
function setLicenseKey(formObj, control, alertTxt)
{
    if(control == 'validate')
        formObj.file.value = 'ReactivateLicense';
    else if(control == 'reactivate')
        formObj.file.value = 'ReactivateLicense';
    else if(control == 'deactivate')
        formObj.file.value = 'DeactivateLicense';

    if(alertTxt != undefined)
        return confirm(alertTxt);
    else
        return true;
}
{/literal}
</script>