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
    		{$MOD.LBL_MYPREF}
    		</td>
    	</tr>

    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_MYPREF_DESC}</td>
    	</tr>
    </tbody>
    </table>
    <br />

    <form action="index.php" name="pref_form" method="post">
    <input type="hidden" name="module" value="PDFMaker" />
    <input type="hidden" name="action" value="MyPreferences" />
    <input type="hidden" name="mode" value="save" />
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
                        <td class="prvPrfBigText"><b> {$MOD.LBL_DEFINE_MYPREF} </b></td>
                        <td align="right">
                            <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" />
                            &nbsp;
                            <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                        </td>
                    </tr>
                </table>
                <br />
                
                <table width="100%" cellspacing="0" cellpadding="5" border="0" class="tableHeading">
					<tr><td class="big"><strong>{$MOD.LBL_NOTIFICATION_SETT}</strong></td></tr>
				</table>
                
                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <td class="dvtCellLabel" width="25%" align="right">{$MOD.LBL_SHOW_NOTIF}</td>
                        <td class="dvtCellInfo" width="75%" align="left"><input type="checkbox" name="is_notified" {$IS_NOTIFIED_CHECKED}></td>
                    </tr>
                </table>
                
                <br />
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td align="right">
                            <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" />
                            &nbsp;
                            <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
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