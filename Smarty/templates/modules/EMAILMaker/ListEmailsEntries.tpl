{if $smarty.request.ajax neq ''}
&#&#&#{$ERROR}&#&#&#
{/if}
<script language="JavaScript" type="text/javascript" src="include/js/ListView.js"></script>
<form name="massdelete" method="POST" id="massdelete" onsubmit="VtigerJS_DialogBox.block();">
     <input name='search_url' id="search_url" type='hidden' value='{$SEARCH_URL}'>
     <input name="idlist" id="idlist" type="hidden">
     <input name="change_owner" type="hidden">
     <input name="change_status" type="hidden">
     <input name="action" type="hidden">
     <input name="where_export" type="hidden" value="{php} echo to_html($_SESSION['export_where']);{/php}">
     <input name="step" type="hidden">
     <input name="allids" type="hidden" id="allids" value="{$ALLIDS}">
     <input name="selectedboxes" id="selectedboxes" type="hidden" value="{$SELECTEDIDS}">
     <input name="allselectedboxes" id="allselectedboxes" type="hidden" value="{$ALLSELECTEDIDS}">
     <input name="excludedRecords" type="hidden" id="excludedRecords" value="">
     <input name="numOfRows" id="numOfRows" type="hidden" value="">
<!-- List View Master Holder starts -->
<table border=0 cellspacing=1 cellpadding=0 width=100% class="lvtBg">
	<tr>
		<td>
		<!-- List View's Buttons and Filters starts -->
        {if $DRIP_SUBJECT neq ""}<div style="font-size:14px;padding:10px 0px 10px 0px"><strong><a href="index.php?action=ListView&module=EMAILMaker&parenttab=Tools">{$MOD.LBL_SENT_MAILS_LIST}</a> &gt; {$MOD.LBL_VIEWING} {$MOD.LBL_DRIP_EMAILS_LIST|lower} &quot;{$DRIP_SUBJECT}&quot;</strong></div>{/if}
        <table border=0 cellspacing=0 cellpadding=2 width=100% class="small">
		    <tr>
				<!-- Buttons -->
				<td style="padding-right:20px" nowrap>
                </td>
				<td class="small" nowrap>
					{$recordListRange}
				</td>
				<!-- Page Navigation -->
				<td nowrap width="30%" align="center">
					<table border=0 cellspacing=0 cellpadding=0 class="small">
						<tr>{$NAVIGATION}</tr>
					</table>
                </td>
			    <td width=40% align="right">
                </td>	
       		</tr>
		</table>
		<!-- List View's Buttons and Filters ends -->
		
		<div>
			<table border=0 cellspacing=1 cellpadding=3 width=100% class="lvt small">
			<!-- Table Headers -->
			    <tr height="25px">
                    {*
                    <td class="lvtCol">
                    <input type="checkbox"  name="selectall" id="selectCurrentPageRec" onClick=toggleSelect_ListView(this.checked,"selected_id")>
                    </td>
    				*}
                    {foreach name="listviewforeach" item=header from=$LISTHEADER}
     			    <td class="lvtCol">{$header}</td>
    				{/foreach}
    			</tr>
    			<!-- Table Contents -->
    			{foreach item=entity key=entity_id from=$LISTENTITY}
        			<tr bgcolor=white onMouseOver="this.className='lvtColDataHover'" height="25px" onMouseOut="this.className='lvtColData'" id="row_{$entity_id}">
                    {* <td width="2%"><input type="checkbox" NAME="selected_id" id="{$entity_id}" value= '{$entity_id}' onClick="check_object(this)"></td> *}
        			{foreach item=data from=$entity}
        			{* vtlib customization: Trigger events on listview cell *}	
        			<td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$data}</td>
        			{* END *}
    	            {/foreach}
    		      	</tr>
                {foreachelse}
			<tr><td style="background-color:#efefef;height:340px" align="center" colspan="{$smarty.foreach.listviewforeach.iteration+1}">
			<div style="border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 45%; position: relative; z-index: 10000000;">
				{assign var=vowel_conf value='LBL_A'}
				{if $MODULE eq 'Accounts' || $MODULE eq 'Invoice'}
				{assign var=vowel_conf value='LBL_AN'}
				{/if}
				{assign var=MODULE_CREATE value=$SINGLE_MOD}
				{if $MODULE eq 'HelpDesk'}
				{assign var=MODULE_CREATE value='Ticket'}
				{/if}

				
				<table border="0" cellpadding="5" cellspacing="0" width="98%">
				<tr>
				<td rowspan="2" width="25%"><img src="{'empty.jpg'|@vtiger_imageurl:$THEME}"></td>
				<td style="border-bottom: 1px solid rgb(204, 204, 204);" nowrap="nowrap" width="75%"><span class="genHeaderSmall">
					{$APP.LBL_NO} {$MOD.LBL_EMAILS} {$APP.LBL_FOUND} !</span></td>
				</tr>
				</table>

				</div>					
				</td></tr>	
             {/foreach}
                
			</table>
		</div>

        <table border=0 cellspacing=0 cellpadding=2 width=100%>
		     <tr>
				 <td style="padding-right:20px" nowrap></td>
				 <td class="small" nowrap>
					{$recordListRange}
				 </td>
				 <td nowrap width="30%" align="center">
				    <table border=0 cellspacing=0 cellpadding=0 class="small">
				         <tr>{$NAVIGATION}</tr>
				     </table>
				 </td>
				 <td align="right" width=40%>
				 </td>
		     </tr>
   		</table>
        </td>
    </tr>
</table>
</form>