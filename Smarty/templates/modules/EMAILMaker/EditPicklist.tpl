{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
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
    	<a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=EMAILMaker&parenttab=Settings">{'EMAILMaker'|@getTranslatedString:'EMAILMaker'}</a> > 
    		{$MOD.LBL_PICKLIST_EDITOR}			
    	</tr>
    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_PICKLIST_EDITOR_INFO}</td>
    	</tr>
    </tbody>
    </table>		
	<br>
    <form action="index.php" method="post">
    <input type="hidden" name="module" value="EMAILMaker">	
    <input type="hidden" name="action" value="EditPicklist">
    <input type="hidden" name="mode" value="{if $MODE eq "view"}edit{else}save{/if}">
    <table class="small" border="0" cellpadding="5" cellspacing="0" width="350px">
        <tbody>
        <tr>
            <td colspan="2" align="right">
            {if $MODE eq "view"}
                <input type="submit" value=" {$APP.LBL_EDIT_BUTTON_LABEL} " title="{$APP.LBL_EDIT_BUTTON_LABEL}" class="crmButton small edit" name="edit" >
            {else}
                <input type="submit" value=" {$APP.LBL_SAVE_BUTTON_LABEL} " name="save" class="crmButton small save" title="{$APP.LBL_SAVE_BUTTON_LABEL}"/>&nbsp;&nbsp;
                <input type="button" value=" {$APP.LBL_CANCEL_BUTTON_LABEL} " name="Cancel" class="crmButton cancel small" title="{$APP.LBL_CANCEL_BUTTON_LABEL}" onClick="window.history.back();" />
            {/if}
            </td>
        </tr>
        {if $MODE eq "edit"}
        <tr>
        <td colspan="2" align="right"><small>{$MOD.LBL_PICKLIST_INSTRUCTION}</small></td>
        </tr>
        {/if}
        <tr>
            <td class="prvPrfTexture" style="width: 20px;">&nbsp;</td>
            <td valign="top">
            <table class="small listTable" border="0" cellpadding="5" cellspacing="0" width="100%">
                <tbody>
                <tr id="gva">
                  <td class="small colHeader"><strong>{$APP.LBL_MODULE}</strong><strong></strong></td>
                  <td class="small colHeader"><div align="center"><strong>{$MOD.LBL_PICKLIST_COUNT}</strong></div></td>
                </tr> 
  
				<!-- module loops-->
			    {foreach item=module name=mailmerge from=$MODULESLIST}
                <tr>
		          <td class="small cellLabel" width="40%"><p>{$module.tablabel}</p></td>
		          <td class="small cellText">
                  {if $MODE eq "view"}
                    {if $module.count eq ''}5{else}{$module.count}{/if}
                  {else}
                    <input type="text" name="email_picklist_value_{$module.tabid}" value="{$module.count}" class="detailedViewTextBox">
                  {/if}
                  </td>
   				</tr>
                {/foreach}
            </table>
            </td>
        </tr>        
        <tr>
            <td colspan="2" align="right">
            {if $MODE eq "view"}
                <input type="submit" value=" {$APP.LBL_EDIT_BUTTON_LABEL} " title="{$APP.LBL_EDIT_BUTTON_LABEL}" class="crmButton small edit" name="edit" >
            {else}
                <input type="submit" value=" {$APP.LBL_SAVE_BUTTON_LABEL} " name="save" class="crmButton small save" title="{$APP.LBL_SAVE_BUTTON_LABEL}"/>&nbsp;&nbsp;
                <input type="button" value=" {$APP.LBL_CANCEL_BUTTON_LABEL} " name="Cancel" class="crmButton cancel small" title="{$APP.LBL_CANCEL_BUTTON_LABEL}" onClick="window.history.back();" />
            {/if}
            </td>
        </tr>
    </table>
    </form>
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

{literal}
<script type='text/javascript'>
function vtlib_toggleEmailModule(moduleid, modulename, action, type) {
	if(typeof(type) == 'undefined') type = '';

	var data = "module=EMAILMaker&action=EMAILMakerAjax&file=EMAILButtons&moduleid=" + moduleid + "&modulename=" + encodeURIComponent(modulename) + "&module_" + action + "=true&type="+type;

	$('status').show();
	new Ajax.Request(
		'index.php',
        {queue: {position: 'end', scope: 'command'},
        	method: 'post',
            postBody: data,
            onComplete: function(response) {
				$('status').hide();
				// Reload the page to apply the effect of module setting
				window.location.href = 'index.php?module=EMAILMaker&action=EMAILButtons&parenttab=Settings';
			}
		}
	);
}
</script>
{/literal}
