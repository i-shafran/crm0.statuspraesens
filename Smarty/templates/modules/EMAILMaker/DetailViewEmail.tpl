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

<script type="text/javascript">
function changeEmailMakerSelectBox()
{ldelim}
    sent_mail_selectbox_val = document.getElementById("sent_mail_selectbox").value;
    open_mail_selectbox_val = document.getElementById("open_mail_selectbox").value;;
    
    loadEMAILMakerRecipientsListBlock('module=EMAILMaker&action=EMAILMakerAjax&file=DetailViewEmail&emailid={$RECORDID}&ajxaction=LOADRECIPIENTSLIST{$URL_QRY}&start={$N_START}&sent_mail_selectbox='+sent_mail_selectbox_val+'&open_mail_selectbox='+open_mail_selectbox_val,'tbl_EMAILMaker_Recipients','EMAILMaker_Recipients');
{rdelim}
</script>
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
	<td valign=bottom width="80%"><span class="dvHeaderText">&nbsp;&nbsp;{$MOD.LBL_VIEWING} &quot;{$SUBJECT}&quot;</span></td>
    <td rowspan="2" nowrap> 
    {$GRAPH1}    
    </td>
    <td rowspan="2" nowrap> 
    {$GRAPH2}    
    </td>
</tr>
<tr>
    <td>
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
    	<tr>
    		<td class="big"><strong>{$MOD.LBL_PROPERTIES}</strong></td>
    		<td class="small" align=right>&nbsp;&nbsp;
              &nbsp;
            </td>
    	</tr>
    	</table>
    	
    	<table border=0 cellspacing=0 cellpadding=5 width=100% >
    	<tr>
    		<td valign=top class="small cellLabel" align=right width="25%">{$MOD.LBL_EMAIL_SUBJECT}</td>
    		<td class="cellText small" valign=top width="25%">{$SUBJECT}&nbsp;</td>
            
            <td valign=top class="small cellLabel" align=right width=25%>{$MOD.LBL_NUMBER_OF_RECIPIENTS}</td>
    		<td class="cellText small" valign=top>{$NUMBER_OF_RECIPIENTS}&nbsp;</td>
        </tr>
        <tr>
    		<td valign=top class="small cellLabel" align=right width=25%>{$MOD.LBL_EMAILS_SENT_FROM}</td>
    		<td class="cellText small" valign=top>{$EMAILS_SENT_FROM}</td>
            
            <td valign=top class="small cellLabel" align=right width=25%>{$MOD.LBL_TOTAL_SENT_EMAILS}</td>
    		<td class="cellText small" valign=top>{$TOTAL_SENT_EMAILS}&nbsp;</td>
    	</tr>
        {****************************************** email sorce module *********************************************}	
    	<tr>
    		<td valign=top class="small cellLabel" align=right width=25%>{$MOD.LBL_FIRST_EMAIL_SENT}</td>
    		<td class="cellText small" valign=top>{$FIRST_EMAIL_SENT}</td>
            
            <td valign=top class="small cellLabel" align=right width=25%>{$MOD.LBL_TOTAL_OPEN_EMAILS}</td>
    		<td class="cellText small" valign=top>{$TOTAL_OPEN_EMAILS}</td>
    	</tr>
    	{****************************************** email subject *********************************************}
        <tr>
    		<td class="small cellLabel" align=right width=25%>{$MOD.LBL_LAST_EMAIL_SENT}</td>
    		<td class="small cellText">{$LAST_EMAIL_SENT}</td>
            
            <td valign=top class="small cellLabel" align=right width=25%>&nbsp;</td>
    		<td class="cellText small" valign=top>&nbsp;</td>
        </tr>
    	</table>
    </td>
</tr>
</table>
<table border=0 cellspacing=0 cellpadding=10 width=100% >
<tr>
<td>
	<div id="tbl_EMAILMaker_Recipients" class="small" style="width:100%;">
    {include file="modules/EMAILMaker/DetailViewEmailContent.tpl"}
    </div>
    
    <br><br>
    
    {if $EMAIL_BODY neq ""}
    <table width="100%"  border="0" cellspacing="0" cellpadding="0" class="thickBorder">
    <tr>
      <td valign=top>
      <table width="100%"  border="0" cellspacing="0" cellpadding="5" >
          <tr>
            <td valign="top" class="small" style="background-color:#cccccc"><strong>{$MOD.LBL_EMAIL_TEMPLATE}</strong></td>
          </tr>
         
          <tr>
            <td class="cellText small">{$EMAIL_BODY}</td>
          </tr>
          
      </table>
      </td>                          
    </tr>                        
    </table>
    {/if} 

</td>
</table>

			