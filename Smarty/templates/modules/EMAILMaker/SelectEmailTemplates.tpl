{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
{* ITS4YOU TT0093 VlMe N *}
<br>
<form  name="massdelete" method="POST" onsubmit="VtigerJS_DialogBox.block();">
<input name="idlist" type="hidden">
<input name="module" type="hidden" value="EMAILMaker">
<input name="parenttab" type="hidden" value="Tools">
<input name="action" type="hidden" value="">
<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
    <tr>
        <td class=heading2 align="left" valign=bottom>{$MOD.LBL_TEMPLATES_LIST}</td>
    </tr>
    <tr>
        <td valign=top class="small">{$MOD.LBL_TEMPLATE_GENERATOR_DESCRIPTION}</td>
    </tr>
</table>

<br>

<table border=0 cellspacing=0 cellpadding=10 width=100% >
    <tr>
        <td>
            <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
            <tr>
                <td class="big"><strong>{$MOD.LBL_SELECT_TEMPLATES}</strong></td>
                <td class="small" align=right>&nbsp;</td>
            </tr>
            </table>

        
            <div style="float:left;border:1px solid #000000;margin:5px;">
        	 <div class="tableHeading" style="border-bottom:1px solid #000000;padding:5px;text-align:center;font-weight:bold">
             <a href="index.php?module=EMAILMaker&action=EditEmailTemplate&parenttab=Tools">Blank</a>
             </div>
             <a href="index.php?module=EMAILMaker&action=EditEmailTemplate&parenttab=Tools"><img src="modules/EMAILMaker/templates/blank.png" border="0"></a>
        	</div>
    	 
            {foreach item=templatename key=templatenameid from=$EMAILTEMPLATES}
                <div style="float:left;border:1px solid #000000;margin:5px;">
            	<div class="tableHeading" style="border-bottom:1px solid #000000;padding:5px;text-align:center;font-weight:bold" border="1">
                <a href="index.php?module=EMAILMaker&action=EditEmailTemplate&parenttab=Tools&template={$templatename}">{$templatename}</a>
                </div>
                <a href="index.php?module=EMAILMaker&action=EditEmailTemplate&parenttab=Tools&template={$templatename}"><img src="modules/EMAILMaker/templates/{$templatename}/image.png" border="0"></a>
            	</div>
            {/foreach}
        </td>
    </tr>
</table>
</form>