{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script>
function ExportTemplates()
{ldelim}
     window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=ExportEmailTemplate&templates={$TEMPLATEID}";
{rdelim}

function addAttachmentToTemplate()
{ldelim}
    window.open("index.php?module=EMAILMaker&return_module=Documents&action=Popup&html=Popup_picker&form=HelpDeskEditView&popuptype=specific","test","width=640,height=602,resizable=0,scrollbars=0,top=150,left=200");
{rdelim}

function addDocumentIntoEmail(document_id, document_name)
{ldelim}
    window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=SaveEmailTemplate&templateid={$TEMPLATEID}&mode=add_document&documentid="+document_id;
{rdelim}

function DeleteEmailDocument(document_id)
{ldelim}
    if(confirm('{$APP.SURE_TO_DELETE}')) window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=SaveEmailTemplate&templateid={$TEMPLATEID}&mode=delete_document&documentid="+document_id;
{rdelim}

function DeleteMassEmail(me_id)
{ldelim}
    if(confirm('{$APP.SURE_TO_DELETE}')) window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=EMAILMakerME&templateid={$TEMPLATEID}&mode=delete&meid="+me_id;
{rdelim}


</script>
<!-- DISPLAY -->
<table border=0 cellspacing=0 cellpadding=5 width=100%>
<form method="post" action="index.php" name="etemplatedetailview" onsubmit="VtigerJS_DialogBox.block();">  
<input type="hidden" name="action" value="">
<input type="hidden" name="module" value="EMAILMaker">
<input type="hidden" name="retur_module" value="EMAILMaker">
<input type="hidden" name="return_action" value="">
<input type="hidden" name="templateid" value="{$TEMPLATEID}">
<input type="hidden" name="parenttab" value="{$PARENTTAB}">
<input type="hidden" name="isDuplicate" value="false">
<tr>
	<td valign=bottom><span class="dvHeaderText"><strong>&nbsp;&nbsp;{$MOD.LBL_VIEWING} &quot;{$FILENAME}&quot;</span></td>
    <td align="right">
    &nbsp;&nbsp;
		  {if $EDIT eq 'permitted'}
              <input class="crmButton edit small" type="submit" name="Button" value="{$APP.LBL_EDIT_BUTTON_LABEL}" onclick="this.form.action.value='EditEmailTemplate'; this.form.parenttab.value='Tools'">&nbsp;
		      <input class="crmbutton small create" type="submit" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON}" title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="U"  onclick="this.form.isDuplicate.value='true'; this.form.action.value='EditEmailTemplate';">&nbsp;
          {/if}
          {if $DELETE eq 'permitted'}
	       	  <input class="crmbutton small delete" type="button"  name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" onclick="this.form.return_action.value='index'; var confirmMsg = '{$APP.NTC_DELETE_CONFIRMATION}'; submitFormForActionWithConfirmation('etemplatedetailview', 'DeleteEmailTemplate', confirmMsg);" >&nbsp;
	   	  {/if}
          &nbsp;
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
		<td width=20% class="small cellLabel"><strong>{$MOD.LBL_EMAIL_NAME}:</strong></td>
		<td width=80% class="small cellText">&nbsp;<strong>{$FILENAME}</strong></td>
    </tr>
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DESCRIPTION}:</strong></td>
		<td class="cellText small" valign=top>&nbsp;{$DESCRIPTION}&nbsp;</td>
	</tr>
    <tr>
		<td valign=top class="small cellLabel"><strong>{$APP.Category}:</strong></td>
		<td class="cellText small" valign=top>&nbsp;{$EMAIL_CATEGORY}&nbsp;</td>
	</tr>
    {****************************************** email sorce module *********************************************}	
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_MODULENAMES}:</strong></td>
		<td class="cellText small" valign=top>&nbsp;{$MODULENAME}</td>
	</tr>
    {****************************************** pdf is active *********************************************}
	<tr>
		<td valign=top class="small cellLabel"><strong>{$APP.LBL_STATUS}:</strong></td>
		<td class="cellText small" valign=top>&nbsp;{$IS_ACTIVE}</td>
	</tr>
    {****************************************** email is default *********************************************}
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_SETASDEFAULT}:</strong></td>
		<td class="cellText small" valign=top>&nbsp;{$IS_DEFAULT}</td>
	</tr>
	{****************************************** email subject *********************************************}
    <tr>
		<td width=20% class="small cellLabel"><strong>{$MOD.LBL_EMAIL_SUBJECT}:</strong></td>
		<td width=80% class="small cellText">&nbsp;<strong>{$SUBJECT}</strong></td>
    </tr>
    </table>
                    
    <br><br>     
    
    {****************************************** email attachment *****************************************************} 
               
    <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
	<tr>
		<td class="big"><strong>{$MOD.LBL_ATTACHMENTS}</strong></td>
		<td class="small" align=right>&nbsp;&nbsp;
		  {if $EDIT eq 'permitted'}
              <input class="crmButton edit small" type="button" name="Button" value="{$APP.LBL_SELECT_BUTTON_LABEL} {$APP.Document}" onclick="addAttachmentToTemplate();">&nbsp;
          {/if}
        </td>
	</tr>
	</table>
    <table border=0 cellspacing=1 cellpadding=3 width=100% style="background-color:#eaeaea;" class="small">
    	<tr style="height:25px" bgcolor=white>
    		{foreach key=index item=_HEADER_FIELD from=$RELATEDOCUMENTSDATA.header}
    		<td class="lvtCol">{$_HEADER_FIELD}</td>
    		{/foreach}
    	</tr>
    	{foreach key=_RECORD_ID item=_RECORD from=$RELATEDOCUMENTSDATA.entries}
            {if $_RECORD_ID neq "0"}
                <tr bgcolor=white id="document_attachment_{$_RECORD_ID}">
                	{foreach key=index item=_RECORD_DATA from=$_RECORD}
        				 {* vtlib customization: Trigger events on listview cell *}
                         <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$_RECORD_DATA}</td>
                         {* END *}
        			{/foreach}
                    {if $DELETE eq 'permitted'}
                        <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))"><a href="javascript:DeleteEmailDocument('{$_RECORD_ID}')">{$APP.LBL_DELETE}</a></td>
        		    {/if}
                </tr>
            {/if}
    	{foreachelse}
    		<tr style="height: 25px;" bgcolor="white"><td colspan="10"><i>{$APP.LBL_NONE_INCLUDED}</i></td></tr>
    	{/foreach}
    </table>

    <br><br>

    {****************************************** email body *****************************************************} 
    <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
	<tr>
	  <td colspan="2" valign=top class="cellText small">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" class="thickBorder">
        <tr>
          <td valign=top>
          <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
              <tr>
                <td colspan="2" valign="top" class="small" style="background-color:#cccccc"><strong>{$MOD.LBL_EMAIL_TEMPLATE}</strong></td>
              </tr>
             
              <tr>
                <td valign="top" class="cellLabel small">{$MOD.LBL_BODY}</td>
                <td class="cellText small">{$BODY}</td>
              </tr>
              
          </table>
          </td>                          
        </tr>                        
      </table>
      </td>
	  </tr>
	  
	  
	</table> 					
</td>
</table>

