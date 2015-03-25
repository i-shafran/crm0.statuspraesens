{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<!-- DISPLAY -->
<form action="index.php?module=EMAILMaker" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="action" value="">
<input type="hidden" name="module" value="EMAILMaker">
<input type="hidden" name="retur_module" value="EMAILMaker">
<input type="hidden" name="return_action" value="">
<input type="hidden" name="dripid" value="{$DRIPID}">
<input type="hidden" name="driptplid" value="{$DRIPTPLID}">
<input type="hidden" name="parenttab" value="{$PARENTTAB}">
<table border=0 cellspacing=0 cellpadding=5 width=100%>
 <tr>
	<td valign=bottom><span class="dvHeaderText"><strong>&nbsp;
    {if $EMODE eq 'edit'}
    {$MOD.LBL_EDIT_DRIP_TEMPLATE}
    {else}
    {$MOD.LBL_ADD_NEW_DRIP_TEMPLATE} 
    {/if}
    &quot;{$DRIPNAME}&quot;</span><hr noshade size=1></td>
</tr>
<tr>
        <td class="small" style="text-align:center;">
           <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" onclick="this.form.action.value='SaveDripEmailTemplates';" >&nbsp;&nbsp;            			
           <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />            			
        </td>
    </tr>
</table>
<table border=0 cellspacing=0 cellpadding=10 width=100% >
<tr>
<td>
	<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
	<tr>
		<td class="big"><strong>{$MOD.LBL_PROPERTIES}</strong></td>
	</tr>
	</table>
	
	<table border=0 cellspacing=0 cellpadding=5 width=100% >
	<tr>
		<td width=20% class="small cellLabel"><strong>{$MOD.LBL_EMAIL_TEMPLATE}:</strong></td>
		<td align=left class="dvtCellInfo">
		<select name="templateid">
        {html_options  options=$EMAIL_TEMPLATES_TO_DRIP selected=$TEMPLATEID}
        </select>	
		</td>
    </tr>
 	<tr>
		<td width=20% class="small cellLabel"><strong>{$MOD.LBL_DELAY}:</strong></td>
		<td align=left class="dvtCellInfo">
        <select name="delay_days">
        {section name=days loop=32}
            <option value="{$smarty.section.days.index}" {if $DELAY.days eq $smarty.section.days.index}selected{/if}>{$smarty.section.days.index}</option>
        {/section}
        </select>
        &nbsp;{$CMOD.LBL_DAYS}
        <select name="delay_hours">
        {section name=hours loop=24}
            <option value="{$smarty.section.hours.index}" {if $DELAY.hours eq $smarty.section.hours.index}selected{/if}>{$smarty.section.hours.index}</option>
        {/section}
        </select>
        &nbsp;{$CMOD.LBL_HOURS}
        <select name="delay_minutes">
            {html_options  options=$DELAY_MINUTES selected=$DELAY.minutes}
        </select>&nbsp;{$CMOD.LBL_MINUTES}
        </td>
    </tr>
    </table>				
</td>
</table>

<table border=0 cellspacing=0 cellpadding=5 width=100%>
    <tr>
        <td class="small" style="text-align:center;">
           <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" onclick="this.form.action.value='SaveDripEmailTemplates';" >&nbsp;&nbsp;            			
           <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />            			
        </td>
    </tr>
</table>
