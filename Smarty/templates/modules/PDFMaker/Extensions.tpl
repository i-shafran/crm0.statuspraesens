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
    		<td rowspan="2" valign="top" width="50"><img src="{'quickview.png'|@vtiger_imageurl:$THEME}" alt="{$MOD.LBL_USERS}" title="{$MOD.LBL_USERS}" border="0" height="48" width="48"></td>
    		<td class="heading2" valign="bottom">
    		
    		<b><a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{'VTLIB_LBL_MODULE_MANAGER'|@getTranslatedString:'Settings'}</a> > 
    	<a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=PDFMaker&parenttab=Settings">{'PDFMaker'|@getTranslatedString:'PDFMaker'}</a> > 
    		{$MOD.LBL_EXTENSIONS}			
    	</tr>
    
    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_EXTENSIONS_DESC}</td>
    	</tr>
    </tbody>
    </table>		
		
    {foreach item=arr from=$EXTENSIONS_ARR}
    <br />
    <table border="0" cellpadding="10" cellspacing="0" width="100%">		
    <tr>
      <td>
        <table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%">
        <tr>
            <td class="detailedViewHeader" style="border-right:0;width:95%"><strong>{$arr.label}</strong></td>
            <td class="detailedViewHeader" style="border-left:0;width:5%">
                <input type="button" class="crmButton small save" value="{$MOD.LBL_DOWNLOAD}" onclick="location.href='{$arr.download}'"/>
            </td>
        </tr>
        <tr><td colspan="2" class="dvtCellInfo">
                    <strong>{$arr.desc}</strong><br /><br />
                    {$MOD.LBL_INSTAL_EXT}<br />
                    {$arr.exinstall}<br />
                    {$MOD.LBL_CUSTOM_INSTAL_EXT}
                    <a href="{$arr.manual}" >{$arr.label}.txt</a>
            </td>
        </tr>
        </table>
      </td>
    </tr>
    </table>          
    {/foreach}
    
    </div>
	</td>
    <td valign="top"><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
    </tr>
</tbody>
</table>
<br>

{if $ERROR eq 'true'}
    <script language="javascript" type="text/javascript">
        alert('{$MOD.ALERT_DOWNLOAD_ERROR}');
    </script>
{/if}