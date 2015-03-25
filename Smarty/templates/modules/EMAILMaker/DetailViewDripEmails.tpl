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
<form name="DetailViewDripEmails" action="index.php?module=EMAILMaker" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="action" value="">
<input type="hidden" name="module" value="EMAILMaker">
<input type="hidden" name="retur_module" value="EMAILMaker">
<input type="hidden" name="return_action" value="">
<input type="hidden" name="dripid" value="{$DRIPID}">
<input type="hidden" name="parenttab" value="{$PARENTTAB}">
<table border=0 cellspacing=0 cellpadding=5 width=100%>
 <tr>
	<td valign=bottom><span class="dvHeaderText"><strong>&nbsp;&nbsp;{$MOD.LBL_VIEWING} &quot;{$DRIPNAME}&quot;</span></td>
    <td align="right">
    &nbsp;&nbsp;
		  {if $EDIT eq 'permitted'}
              <input class="crmButton edit small" type="submit" name="Button" value="{$APP.LBL_EDIT_BUTTON_LABEL}" onclick="this.form.action.value='EditDripEmails'; this.form.parenttab.value='Tools'">&nbsp;
		      {* <input class="crmbutton small create" type="submit" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON}" title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="U"  onclick="this.form.isDuplicate.value='true'; this.form.action.value='';">&nbsp; *}
          {/if}
          {if $DELETE eq 'permitted'}
	       	  <input class="crmbutton small delete" type="button"  name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" onclick="this.form.return_action.value='index'; var confirmMsg = '{$APP.SURE_TO_DELETE}'; submitFormForActionWithConfirmation('DetailViewDripEmails', 'Delete', confirmMsg);" >&nbsp;
	   	  {/if}
          &nbsp;
    </td>
</tr>
</table>
<table border=0 cellspacing=0 cellpadding=10 width=100% >
<tr>
<td>
	{include file="modules/EMAILMaker/DetailViewDripInfo.tpl"}
    
    <br><br>
    <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
	<tr>
		<td class="big"><strong>{$MOD.LBL_EMAILS}</strong></td>
        <td align="right">
        {if $EDIT eq "permitted"}
        <input class="crmButton create small" type="submit" value="{$MOD.LBL_ADD_TEMPLATE}" onclick="this.form.action.value='EditDripEmailTemplates'; this.form.parenttab.value='Tools'">&nbsp;
        {/if}
        </td>
	</tr>
	</table>
    
    <table class="listTable" width="100%" border="0" cellspacing="1" cellpadding="5" id='expressionlist'>
    	<tr>
    		<td class="colHeader small" width="1%"></td>
            <td class="colHeader small" width="30%">{$MOD.LBL_EMAIL_TEMPLATE}</td>
    		<td class="colHeader small" width="29%">{$MOD.LBL_EMAIL_SUBJECT}</td>
            <td class="colHeader small" width="25%">{$MOD.LBL_DELAY}</td>
            <td class="colHeader small" width="25%">{$APP.LBL_STATUS}</td>
            <td class="colHeader small" width="15%">{$APP.LBL_ACTION}</td>
    	</tr>
    	{foreach item=driptemplate name=driptemplateslist from=$EMAILTEMPLATES}
        <tr>
    		<td class="listTableRow small">{$smarty.foreach.driptemplateslist.iteration}.</td>
            <td class="listTableRow small">{$driptemplate.template_name}</td>
    		<td class="listTableRow small">{$driptemplate.template_subject}</td>
            <td class="listTableRow small">{$driptemplate.delay}</td>
            <td class="listTableRow small">{$driptemplate.status}</td> 
            <td class="listTableRow small">
    		{if $EDIT eq "permitted"}	
                <a href="index.php?module=EMAILMaker&action=EditDripEmailTemplates&dripid={$DRIPID}&driptplid={$driptemplate.id}">
    				<img border="0" title="Edit" alt="Edit"	style="cursor: pointer;" id="driptemplateslist_editlink_{$smarty.foreach.driptemplateslist.iteration}" src="themes/images/editfield.gif"/>
    			</a>
            {/if}
            {if $DELETE eq 'permitted'}
    			<a href="index.php?module=EMAILMaker&action=Delete&dripid={$DRIPID}&driptplid={$driptemplate.id}" onclick="return confirm('{$APP.SURE_TO_DELETE}');">
    				<img border="0" title="Delete" alt="Delete" src="themes/images/delete.gif" style="cursor: pointer;" id="driptemplateslist_deletelink_{$smarty.foreach.driptemplateslist.iteration}"/>
    			</a>
            {/if}
    		</td>
    	</tr>
        {foreachelse}
            <tr>
                <td style="background-color:#efefef;height:200px" align="center" colspan="6">
                    <div style="border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 45%; position: relative; z-index: 10000000;">
                        <table border="0" cellpadding="5" cellspacing="0" width="98%">
                        <tr><td rowspan="2" width="25%"><img src="{'empty.jpg'|@vtiger_imageurl:$THEME}" height="60" width="61"></td>
                            <td style="border-bottom: 1px solid rgb(204, 204, 204);" nowrap="nowrap" width="75%" align="left">
                                <span class="genHeaderSmall">{$APP.LBL_NO} {$MOD.LBL_EMAIL_TEMPLATE} {$APP.LBL_FOUND}</span>
                            </td>
                        </tr>
                        {if $EDIT eq "permitted"}
                        <tr>
                            <td class="small" align="left" nowrap="nowrap">{$MOD.LBL_YOU_CAN_ADD} {$APP.LBL_A} {$MOD.LBL_EMAIL_TEMPLATE} {$APP.LBL_NOW}. {$APP.LBL_CLICK_THE_LINK}:<br>
                                &nbsp;&nbsp;-<a href="index.php?module=EMAILMaker&action=EditDripEmails&parenttab=Tools">{$APP.LBL_ADD_NEW} {$APP.LBL_A} {$MOD.LBL_EMAIL_TEMPLATE}</a><br>
                            </td>
                        </tr>
                        {/if}
                        </table>
                    </div>
                </td>
            </tr>
        {/foreach}
    </table>    					
</td>
</table>