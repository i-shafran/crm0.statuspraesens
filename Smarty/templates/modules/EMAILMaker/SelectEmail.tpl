{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<!-- BEGIN: main -->
<form name="SendEMAKERMail">
<input name="excludedRecords2" type="hidden" id="excludedRecords2" value="{$EXE_REC}">
<input name='viewid2' id="viewid2" type='hidden' value='{$VIEWID}'>
<div id="roleLayEMAILMaker" style="z-index:12;display:block;width:300px;" class="layerPopup">
	<table border=0 cellspacing=0 cellpadding=5 width=100% class=layerHeadingULine>
		<tr>
			<td width="90%" align="left" class="genHeaderSmall" id="{if $FOR_LISTVIEW eq 'true'}EMAILListViewDivHandle{else}sendemakermail_cont_handle{/if}" style="cursor:move;">{$MOD.SELECT_EMAIL}
				{if $ONE_RECORD neq 'true'}
				({$MOD.LBL_MULTIPLE} {$APP[$FROM_MODULE]})
				{/if}
				&nbsp;
			</td>
			<td width="10%" align="right">
				<a href="javascript:fninvsh('roleLayEMAILMaker');"><img title="{$APP.LBL_CLOSE}" alt="{$APP.LBL_CLOSE}" src="{'close.gif'|@vtiger_imageurl:$THEME}" border="0"  align="absmiddle" /></a>
			</td>
		</tr>
	</table>
	<table border=0 cellspacing=0 cellpadding=5 width=95% align=center> 
		<tr><td class="small">
			<table border=0 cellspacing=0 cellpadding=5 width=100% align=center bgcolor=white>
				<tr>
					<td align="left">
                    {if $FOR_LISTVIEW eq 'true' || $TYPE eq "3"}
                     	<table class="small" border="0" cellpadding="3" cellspacing="0" width="100%">
    					<tbody>
                        <tr>
    						<td class="dvtTabCache" style="width: 10px;" nowrap>&nbsp;</td>
    					    <td nowrap class="dvtSelectedCell">
    							<b>{$EMOD.LBL_EMAIL_TEMPLATE}</b> 
    						</td>
    			    		<td class="dvtTabCache" nowrap style="width:40%;">&nbsp;</td>
    				    </tr>
                        <tr>
                            <td class="dvtCellLabel" colspan="3" style="padding:10px;">
                                <select name="use_common_email_template_2" id="use_common_email_template_2" class="detailedViewTextBox" style="width:90%;">
                                  {html_options  options=$EMAIL_TEMPLATES selected=$DEFAULT_TEMPLATE}
                                </select>
                            </td>
                        </tr>
    					</tbody>
    					</table>
    
                        <table class="small" border="0" cellpadding="3" cellspacing="0" width="100%" style="padding-top:10px;"> 
    					<tbody>
                        <tr>
    						<td class="dvtTabCache" style="width: 10px;" nowrap>&nbsp;</td>
    					    <td nowrap class="dvtSelectedCell">
    							<b>{$EMOD.LBL_EMAILS}</b>
    						</td>
    			    		<td class="dvtTabCache" nowrap style="width:40%;">&nbsp;</td>
    				    </tr>
                        <tr>
                            <td class="dvtCellLabel" colspan="3">
                                {if $HAVE_EMAILS eq "true"}
                                    <table border="0" cellpadding="5" cellspacing="0" width="90%">
                                    {foreach name=fields key=fieldid item=elements from=$MAILDATA}
                                        {if $smarty.foreach.fields.index neq 0}<tr><td colspan="2" style="height:10px;"></td></tr>{/if}
                                        {if $ONE_RECORD eq 'true'}
                                            <tr><td colspan="2"><b>{$elements.data.name}</b> {if $elements.type neq ''}<small>({$elements.type})</small> {/if} </td></tr>
                                            {foreach name=emails key=emailname item=emaildata from=$elements.data.emails}
                                                 {if $emaildata.value neq ''} 
                                                     <tr>
                                                     <td align="center"><input type="checkbox" value="{$elements.crmid}@{$emaildata.fieldid}" name="semail"  {if $HAVE_ONE_EMAIL eq "true"}checked {/if}/></td>
                                                     <td align="left">{$emaildata.label}: <i>{$emaildata.value}</i> </td>
                                                     </tr>
                                                 {/if}
                                            {/foreach}
                                        {else}
                                            <tr><td colspan="2">{if $elements.type neq ''}<b>{$elements.type}</b>{else}&nbsp;{/if}</td></tr>
                                            {foreach name=emails key=emailname item=emaildata from=$elements.data.emails}
                                                <tr>
                                                     <td align="center"><input type="checkbox" value="0@{$emaildata.fieldid}@{$elements.fieldid}" name="semail" {if $HAVE_ONE_EMAIL eq "true"}checked {/if}/></td>
                                                     <td align="left">{$emaildata.label}</td>
                                                </tr>
                                            {/foreach}
                                        {/if}
                                    {/foreach}
                                    {if $ONE_RECORD neq 'true'}
                                    <tr><td colspan="2" style="padding:10px 0px 10px {if $MAILDATA|@count > 1}0px{else}20px{/if}"><div style="width:240px;">{$EMOD.LBL_LISTVIEW_BLOCK_INFO}</div></td></tr>
                                    {/if}
                                    </table>
                                {else}
                                    <div style="padding:10px 0px 10px 5px">{$EMOD.LBL_EMAILS_NOT_FOUND}</div>   
                                {/if}
                            </td>
                        </tr>
    					</tbody>
    					</table>
    
                        {if $ENABLE_PDFMAKER eq "true"}
                            <div id="add_pdf_template_attachment_btn_{$TYPE}" style="text-align:right;padding-top:10px;"><a href="javascript:addPDFMakerTemplates('{$TYPE}');"><img src="themes/images/attachment.gif" border="0" align="absmiddle" title="{$EMOD.LBL_ADD_PDFMAKER_TEMPLATES}" alt="{$EMOD.LBL_ADD_PDFMAKER_TEMPLATES}">{$EMOD.LBL_ADD_PDFMAKER_TEMPLATES}</a></div>
                            <div id="pdf_template_attachment_{$TYPE}" style="display:none;padding-top:10px;"> 
                                <table class="small" border="0" cellpadding="3" cellspacing="0" width="100%">
            					<tbody>
                                <tr>
            						<td class="dvtTabCache" style="width: 10px;" nowrap>&nbsp;</td>
            					    <td nowrap class="dvtSelectedCell">
            							<b>{$EMOD.LBL_PDFMAKER_TEMPLATES}</b>
            						</td>
            			    		<td class="dvtTabCache" nowrap style="width:40%;">&nbsp;</td>
            				    </tr>
                                <tr>
                                    <td class="dvtCellLabel" colspan="3">
                                    {$PDF_TEMPLATE_OUTPUT}
                                    <br><br>
                                    {if $PDF_TEMPLATE_OUTPUT neq ""}
                                        {$PDF_LANGUAGE_OUTPUT}
                                        <br><br>
                                    {/if}  
                                    <div style="text-align:right;padding-top:5px"><a href="javascript:removePDFMakerTemplates('{$TYPE}');"><img src="themes/images/attachment.gif" border="0" align="absmiddle" title="{$EMOD.LBL_REMOVE_PDFMAKER_TEMPLATES}" alt="{$EMOD.LBL_REMOVE_PDFMAKER_TEMPLATES}">{$EMOD.LBL_REMOVE_PDFMAKER_TEMPLATES}</a></div>  
                                    </td>
                                </tr>
            					</tbody>
            					</table>
                            </div>
                        {else}
                            <div id="pdf_template_attachment_{$TYPE}" style="display:none;"></div>     
                        {/if} 
                        {if $TYPE eq "5"}{$PDF_DATA}{/if} 
                    {else}
                        <table border="0" cellpadding="5" cellspacing="0" width="90%">
                        {foreach name=fields key=fieldid item=elements from=$MAILDATA}
                            {if $ONE_RECORD eq 'true'}
                                <tr><td colspan="2"><b>{$elements.data.name}</b> {if $elements.type neq ''}<small>({$elements.type})</small> {/if} </td></tr>
                                {foreach name=emails key=emailname item=emaildata from=$elements.data.emails}
                                     {if $emaildata.value neq ''} 
                                         <tr>
                                         <td align="center"><input type="checkbox" value="{$elements.crmid}@{$emaildata.fieldid}" name="semail" {if $HAVE_ONE_EMAIL eq "true"}checked {/if}/></td>
                                         <td align="left">{$emaildata.label}: <i>{$emaildata.value}</i> </td>
                                         </tr>
                                     {/if}
                                {/foreach}
                            {else}
                                {if $elements.type neq ''}<tr><td colspan="2"><b>{$elements.type}</b></td></tr>{/if}
                                {foreach name=emails key=emailname item=emaildata from=$elements.data.emails}
                                    <tr>
                                         <td align="center"><input type="checkbox" value="0@{$emaildata.fieldid}@{$elements.fieldid}" name="semail" {if $HAVE_ONE_EMAIL eq "true"}checked {/if}/></td>
                                         <td align="left">{$emaildata.label}</td>
                                    </tr>
                                {/foreach}
                            {/if}
                            <tr><td colspan="2" style="height:10px;"></td></tr>
                        {/foreach}
                        </table>
                        {$PDF_DATA}
                    {/if}
					</td>	
				</tr>
			</table>
		</td></tr>
	</table>
	<table border=0 cellspacing=0 cellpadding=5 width=100% class="layerPopupTransport">
		<tr><td align=center class="small">
			<input type="button" name="{$APP.LBL_SELECT_BUTTON_LABEL}" value=" {$APP.LBL_SELECT_BUTTON_LABEL} " class="crmbutton small create" onClick="{if $FOR_LISTVIEW eq 'true' || $TYPE eq "3" || $TYPE eq "5"}validate_sendEMAKERListmail('{$IDLIST}','{$FROM_MODULE}','{$TYPE}');{else}validate_sendEMAKERmail('{$IDLIST}','{$FROM_MODULE}');{/if}"/>&nbsp;&nbsp;
			<input type="button" name="{$APP.LBL_CANCEL_BUTTON_LABEL}" value=" {$APP.LBL_CANCEL_BUTTON_LABEL} " class="crmbutton small cancel" onclick="fninvsh('roleLayEMAILMaker');" />
		</td></tr>
	</table>
</div>
</form>