{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}        
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" >
<meta http-equiv="Content-Type" content="text/html; charset={$APP.LBL_CHARSET}">
<title>{$MOD.TITLE_COMPOSE_MAIL}</title>
<link REL="SHORTCUT ICON" HREF="include/images/vtigercrm_icon.ico">	
<style type="text/css">
@import url("themes/{$THEME}/style.css");
{literal}
.inputWrapper {
    overflow: hidden;
    position: relative;
}

.fileInput {
    cursor: pointer;
    height: 100%;
    position:absolute;
    top: 0;
    right: 0;
    /*This makes the button huge so that it can be clicked on*/
    font-size:50px;
}
.hidden {
    /*Opacity settings for all browsers*/
    opacity: 0;
    -moz-opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
}
{/literal}
</style>
<script language="javascript" type="text/javascript" src="include/scriptaculous/prototype.js"></script>
<script src="include/scriptaculous/scriptaculous.js" type="text/javascript"></script>
<script src="include/js/general.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="include/js/{php} echo $_SESSION['authenticated_user_language'];{/php}.lang.js?{php} echo $_SESSION['vtiger_version'];{/php}"></script>
<script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="modules/EMAILMaker/multifile.js"></script>
</head>
<body marginheight="0" marginwidth="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
{literal}
<form name="EditView" method="POST" ENCTYPE="multipart/form-data" action="index.php">
{/literal}
<input type="hidden" name="send_mail" >
<input type="hidden" name="contact_id" value="{$CONTACT_ID}">
<input type="hidden" name="user_id" value="{$USER_ID}">
<input type="hidden" name="filename" value="{$FILENAME}">
<input type="hidden" name="old_id" value="{$OLD_ID}">
<input type="hidden" name="module" value="{$MODULE}">
<input type="hidden" name="record" value="{$ID}">
<input type="hidden" name="mode" value="{$MODE}">
<input type="hidden" name="is_drip" value="{$IS_DRIP}">
<input type="hidden" name="action">
<input type="hidden" name="popupaction" value="create">
<input type="hidden" name="hidden_toid" id="hidden_toid">
<input type="hidden" name="pid" value="{$PID}">
<input type="hidden" name="pmodule" value="{$select_module}">
<input type="hidden" name="sorce_ids" value="{$SORCE_IDS}">
<input type="hidden" name="related_to" value="{$RELATED_TO}">
<input type="hidden" name="type" value="{$TYPE}">
<input type="hidden" name="s_type" value="{$S_TYPE}">
<input type="hidden" name="recipients_list_type" value="{$SET_RECIPIENTS_LIST}">
{if $NO_RCPTS neq ""}{$NO_RCPTS}{/if}
<table class="small mailClient mailClientWriteEmailHeader" border="0" cellpadding="0" cellspacing="0" width="100%" id="title_table">
<tr>
	<td colspan=3 >{$MOD.LBL_COMPOSE_EMAIL}</td>
</tr>
</table>
<table class="small mailClient" border="0" cellpadding="0" cellspacing="0" width="100%" >
<tbody>
</tr>
{foreach item=row from=$BLOCKS}
{foreach item=elements from=$row}
{if $elements.2.0 eq 'parent_id'}
<tr>
<td width="75%" style="border-bottom: 1px solid #C0C0C0;" id="recipients_td">
<table class="small mailClient" border="0" cellpadding="0" cellspacing="0" width="100%" >
   <tr>
   <td id="from_td1" class="dvtCellLabel" style="padding: 5px;" width="140px" align="right" nowrap >{$EMOD.LBL_EMAILS_SENT_FROM}:</td>
   <td id="from_td2" colspan="2" class="cellText" style="border-left:0px; padding: 5px;">
   <select name="from_email" class="small">
   {html_options  options=$FROM_EMAILS selected=$SELECTED_DEFAULT_FROM}
   </select> 
   </td>
   <td id="from_td3" align="right" class="cellText" style="border-left:0px; padding: 5px;"><input class="crmButton small create" type="button" onClick="openEditEmails();" value="  {$EMOD.LBL_EDIT_RECIPIENTS}  ">&nbsp;</td>
   </tr>
   {if $EMAILS_TABLE eq ""}
       <tr>
           <td colspan="5" valign="top">
               <div style="height:200px; overflow:scroll;z-key:10000;background-color:#ffffff;" id="recipients_div">
                   
                   <table class="small mailClient mailClientWriteEmailHeader" border=0 cellspacing=0 cellpadding=0 width=100% id="edit_emails_title"  style="display:none">
                    <tr>
                        <td width="95%">{$EMOD.LBL_EDIT_RECIPIENTS}</td>
                        <td style="padding-right:10px"><input class="crmbutton small cancel" type="button" onClick="closeEditEmails();" value="  << {$APP.LBL_GO_BACK}  "></td>
                    </tr>
                   </table>
                   <table class="small mailClient" border=0 cellspacing=0 cellpadding=0 width=100%>
                            <tr>
                            <td colspan=3 id="edit_emails_title" style="display:none">
                                	<!-- Email Header -->
                                	<table border=0 cellspacing=0 cellpadding=0 width=100% class="mailClientWriteEmailHeader">
                                	<tr>
                                		<td>{$MOD.LBL_COMPOSE_EMAIL}</td>
                                	</tr>
                                	</table>
                            	</td>
                            </tr>
                   {if $SET_RECIPIENTS_LIST eq "group"}
                            <tr>
                                <td class="dvtCellLabel" width="130px" align="right" valign="top" style="padding-top: 5px;"><span title="{$EMAILS_LIST_TITLE}"><font color="red">*</font><b>{$EMOD.LBL_EMAILS}</b></span>:</td>
                                <td class="cellText" valign="top" style="padding:0px;">
                                    <table id="table_emaillist"  cellpadding="2" cellspacing="0" width="100%" style="border:0px solid #C0C0C0;border-collapse:collapse">
                                    {foreach item="p_emails" key="p_id" from=$TO_MAIL}    
                        		         {$p_emails} 
                                    {/foreach} 
                                    </table>
                            	</td>
                            	<td class="cellText" style="padding: 5px;" width="130px;" align="left" valign="top" nowrap>
                            		<select name="parent_type">
                            			{foreach key=labelval item=selectval from=$elements.1.0}
                            				{if $selectval eq selected}
                            					{assign var=selectmodule value="selected"}
                            				{else}
                            					{assign var=selectmodule value=""}
                            				{/if}
                            				<option value="{$labelval}" {$selectmodule}>{$APP[$labelval]}</option>
                            			{/foreach}
                                        <option value="other">{$EMOD.LBL_OTHER}</option>
                            		</select>
                            		&nbsp;
                            		<span  class="mailClientCSSButton">
                            		<img src="{'select.gif'|@vtiger_imageurl:$THEME}" alt="{$APP.LBL_SELECT}" title="{$APP.LBL_SELECT}" LANGUAGE=javascript onclick='addEmailAdress("0", document.EditView.parent_type.value, "index.php?module=EMAILMaker&return_module="+ document.EditView.parent_type.value +"&action=Popup&html=Popup_picker&form=HelpDeskEditView&popuptype=set_return_emails&type=1","");' align="absmiddle" style='cursor:hand;cursor:pointer'>&nbsp;
                            		</span>
                            	</td>
                            </tr>
                   {else}
                       {foreach item="p_emails" key="p_id" from=$TO_MAIL}
                           <tr>
                        	<td class="dvtCellLabel" align="right" width="130px;"><input type="hidden" name="Control_Pids[]" value="{$p_id}"><b><span id="panem_{$p_id}">{$FROM_SORCE[$p_id]}</span></b>:
                            {*<input name="{$elements.2.0}" id="{$elements.2.0}" type="hidden" value="{$IDLISTS}">*}
                            </td>
                        	<td class="cellText" style="padding: 2px;" valign="top">
                                <table id="table_emaillist_{$p_id}" cellpadding="2" cellspacing="0" width="100%" style="border:0px solid #C0C0C0;border-collapse:collapse">
                                {if $p_emails neq ""}{$p_emails}{/if}
                                </table>                            
                        	</td>
                        	<td class="cellText" style="padding: 5px;" width="130px;" align="left" valign="top" nowrap>
                        		<select name="parent_type_{$p_id}">
                        			{foreach key=labelval item=selectval from=$elements.1.0}
                        				{if $selectval eq selected}
                        					{assign var=selectmodule value="selected"}
                        				{else}
                        					{assign var=selectmodule value=""}
                        				{/if}
                        				<option value="{$labelval}" {$selectmodule}>{$APP[$labelval]}</option>
                        			{/foreach}
                                    <option value="other">{$EMOD.LBL_OTHER}</option>
                        		</select>
                        		&nbsp;
                        		<span  class="mailClientCSSButton">
                        		<img src="{'select.gif'|@vtiger_imageurl:$THEME}" alt="{$APP.LBL_SELECT}" title="{$APP.LBL_SELECT}" LANGUAGE=javascript onclick='addEmailAdress("{$p_id}", document.EditView.parent_type_{$p_id}.value, "index.php?module=EMAILMaker&return_module="+ document.EditView.parent_type_{$p_id}.value + "&action=Popup&html=Popup_picker&form=HelpDeskEditView&popuptype=set_return_emails&pid={$p_id}","")' align="absmiddle" style='cursor:hand;cursor:pointer'>&nbsp;
                        		</span></td>
                           </tr>
                       {/foreach}
                   {/if}  
                   </table>
               </div>
           </td>
       </tr>                
   {else}
       <tr><td colspan="5">
       <table border=0 cellspacing=0 cellpadding=0 width=100%>
       {foreach item="tds" from=$EMAILS_TABLE}
           <tr>
           {foreach item="parray" key="td_id" from=$tds}
                {if $parray.pid neq ""}
                    <td class="cellText" style="padding: 5px; border-left:1px solid #C1C1C1;font-size:12px;">
                        <b>{$parray.pname}</b>
                    </td>
                    <td class="cellText" align="right" style="padding: 5px; border-right:1px solid #C1C1C1;" nowrap>
                    
                        <select name="parent_type_{$parray.pid}">
                			{foreach key=labelval item=selectval from=$elements.1.0}
                				{if $selectval eq selected}
                					{assign var=selectmodule value="selected"}
                				{else}
                					{assign var=selectmodule value=""}
                				{/if}
                				<option value="{$labelval}" {$selectmodule}>{$APP[$labelval]}</option>
                			{/foreach}
                		</select>
                        <span  class="mailClientCSSButton">
                		<img src="{'select.gif'|@vtiger_imageurl:$THEME}" alt="{$APP.LBL_SELECT}" title="{$APP.LBL_SELECT}" LANGUAGE=javascript onclick='addEmailAdress(document.EditView.parent_type_{$parray.pid}.value, "index.php?module=EMAILMaker&return_module="+ document.EditView.parent_type_{$parray.pid}.value +"&action=Popup&html=Popup_picker&form=HelpDeskEditView&popuptype=set_return_emails&pid={$parray.pid}","");' align="absmiddle" style='cursor:hand;cursor:pointer'>&nbsp;
                		</span>
                    </td>
                {else}
                     <td rowspan="2" colspan="2" style="border-right:1px solid #C1C1C1;border-left:1px solid #C1C1C1;border-bottom:1px solid #C1C1C1;">&nbsp;</td>    
                {/if}
           {/foreach}
           </tr>
           
           <tr>
           {foreach item="parray" key="td_id" from=$tds}
                {if $parray.pid neq ""}
                <td id="div_emaillist_{$parray.pid}" colspan="2" style="border-right:1px solid #C1C1C1;border-left:1px solid #C1C1C1;border-bottom:1px solid #C1C1C1;" valign="top">{if $parray.pdata neq ""}{$parray.pdata}{else}&nbsp;{/if}</td>
                {/if}
           {/foreach}
           </tr>
       {/foreach}
       </table>
       </td></tr>
   {/if}
{elseif $elements.2.0 eq 'subject'}
   <tr>
	<td id="subject_td_1" class="dvtCellLabel" style="padding: 5px;{* if $VTIGER_VERSION neq "5.2.1" && $VTIGER_VERSION neq "5.3.0"}{if $IS_DRIP eq "no"}border-bottom:0px;{/if}{/if *}" width="120px" align="right" nowrap ><font color="red">*</font>{if $IS_DRIP eq "yes"}{$EMOD.LBL_DRIP_NAME}{else}{$elements.1.0}{/if}:</td>
        <td id="subject_td_2" colspan="2" class="cellText" style="padding: 5px;{* if $VTIGER_VERSION neq "5.2.1" && $VTIGER_VERSION neq "5.3.0"}{if $IS_DRIP eq "no"}border-bottom:0px;{/if}{/if *}">
        {if $WEBMAIL eq 'true' or $RET_ERROR eq 1}
                <input id="subject" type="text" class="txtBox" name="{$elements.2.0}" value="{$SUBJECT}" id="{$elements.2.0}" style="width:99%;border:1px solid #bababa;">
        {else}
                <input id="subject" type="text" class="txtBox" name="{$elements.2.0}" value="{if $SUBJECT neq ""}{$SUBJECT}{else}{$elements.3.0}{/if}" id="{$elements.2.0}" style="width:99%;border:1px solid #bababa;">
        {/if}
        <select name="subject_fields" id="subject_fields" class="classname small" onchange="insertFieldIntoSubject(this.value);" style="display:none;">
           <option value="">{$EMOD.LBL_SELECT_MODULE_FIELD}</option>
           <optgroup label="{$EMOD.LBL_COMMON_EMAILINFO}">
                {html_options  options=$SUBJECT_FIELDS}
           </optgroup>
           {if $TYPE eq "2" || $S_TYPE eq "2"}
           {html_options  options=$SELECT_MODULE_FIELD_SUBJECT}
           {/if}
        </select>
        </td>                    
   </tr>
   {* if $VTIGER_VERSION neq "5.2.1" && $VTIGER_VERSION neq "5.3.0"}
   {if $IS_DRIP eq "no"}
   <tr>
        <td class="small cellLabel" align="right" width="120px;"  style="padding: 5px; border-bottom:0px;"><input name="email_delay" type="checkbox" onClick="controlDelay(this)" value="1">{$EMOD.LBL_DELAY}:</td>
        <td class="cellText"  style="padding: 5px; border-bottom:0px;">
            <select id="email_delay_days" name="email_delay_days" disabled>
            {section name=days loop=32}
                <option value="{$smarty.section.days.index}">{$smarty.section.days.index}</option>
            {/section}
            </select>
            &nbsp;{$CMOD.LBL_DAYS}&nbsp;
            <select id="email_delay_hours" name="email_delay_hours" disabled>
            {section name=hours loop=24}
                <option value="{$smarty.section.hours.index}">{$smarty.section.hours.index}</option>
            {/section}
            </select>
            &nbsp;{$CMOD.LBL_HOURS}&nbsp;
            <select id="email_delay_minutes" name="email_delay_minutes" disabled>
                {html_options  options=$DELAY_MINUTES}
            </select>&nbsp;{$CMOD.LBL_MINUTES}
        </td>   
   </tr>
   {/if}
   {/if *}
{elseif $elements.2.0 eq 'filename'}
</table>
{if $IS_DRIP eq "no"}
</td>
<td valign="top" style="border-left: 1px solid #C0C0C0;border-bottom: 1px solid #C0C0C0;" id="attachment_td">
   <table width="100%">
   <tr>
       <td class="dvtCellLabel" style="padding: 5px;" align="left" nowrap>
            <div style="padding-right:5px;float:left;">
            {$elements.1.0}  :
            <select id="attachment_type" name="attachment_type" onChange="changeAttachmentToEmail(this.value)">
            <option value="file" selected>{$EMOD.LBL_FILE}</option>
            <option value="document">{$APP.Document}</option>
            </select>
            </div>
            <div id="document_btn" class="mailClientCSSButton" style="display:none; width: 20px;float:left;padding:0px">
            <img src="{'select.gif'|@vtiger_imageurl:$THEME}" alt="{$APP.LBL_SELECT}" title="{$APP.LBL_SELECT}" LANGUAGE=javascript onclick='addAttachmentToEmail()' align="absmiddle" style='cursor:hand;cursor:pointer'>&nbsp;
            </div>
            <div id="file_btn" class="inputWrapper mailClientCSSButton" style="width: 20px;float:left;padding:0px">
            <img src="{'select.gif'|@vtiger_imageurl:$THEME}" alt="{$APP.LBL_SELECT}" title="{$APP.LBL_SELECT}" align="absmiddle" style='cursor:hand;cursor:pointer'>&nbsp;
            <input id="my_file_element" type="file" name="{$elements.2.0}" tabindex="7">
            <input type="hidden" name="{$elements.2.0}_hidden" value="" />
            </div>
       </td>
   </tr>
   <tr>
       <td class="cellText" style="padding: 0px;border:0px;">
           <div style="padding:5px;height:180px;overflow:auto;">
                {if $SHOW_PDF_TEMPLATES eq 'true'}
                <div class="cellText" style="padding:5px;"><b>{$EMOD.LBL_PDFMAKER_TEMPLATES}:</b><input type="hidden" name="pdf_template_ids" value="{$PDF_TEMPLATE_IDS}"><input type="hidden" name="pdf_language" value="{$PDF_LANGUAGE}"></div>
                <table class="small" width="100%" cellpadding="0" cellspacing="0">   
                {foreach item="pdf_template_name" key="attach_id" from=$PDFMakerTemplates}	
                    <tr><td class="cellText" style="padding:2px;">
                    {$pdf_template_name}
                    </td></tr>
                {/foreach}
                </table>
                <div class="cellText" style="padding:5px;"><b>{$EMOD.LBL_ATTACHMENTS}:</b></div>  
                {/if}
                <input name="del_file_list" type="hidden" value="">    
                <div id="files_list">
        		{foreach item="document_name" key="document_id" from=$ATT_DOCUMENTS}
                    <table width="100%" class="small" cellpadding="1" cellspacing="1">
                        <tr>
                            <td class="cellText">{$document_name}<input type="hidden" name="documents[]" id="document_attachment_{$document_id}" value="{$document_id}"></td>
                            <td class="cellText" align="right" width="20px" nowrap><a href="javascript:;" onClick="this.parentNode.parentNode.parentNode.parentNode.removeChild( this.parentNode.parentNode.parentNode); return false;">{$APP.LNK_DELETE}</a></td>
                        </tr>
                    </table>
                {/foreach}
        		</div>
        		<script>
        			var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), 1000 );
        			multi_selector.count = 0
        			multi_selector.addElement( document.getElementById( 'my_file_element' ) );
        		</script>
                <div id="attach_cont" class="addEventInnerBox" style="border:0px;overflow:auto;width:100%;position:relative;left:0px;top:0px;"></div>
           </div>
       </td>
   </tr>
   </table>
{/if}   
</td>
</tr>
{* COMPOSE EMAIL EDITOR START *}
 <tr id="compose_email_block_editor" style="display:none">
   <td colspan="3" class="cellText" >
        <table class="small mailClient" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
    						<td valign=top class="small cellLabel" style="padding: 5px;" width="140px" align="right" nowrap>{$EMOD.LBL_RECIPIENT_FIELDS}:</td>
    						<td class="cellText small" valign="top" style="padding: 5px;">
                                <select name="r_modulename" id="r_modulename" class="classname" onChange="fillModuleFields(this,'recipientmodulefields');" {*{if $TEMPLATEID neq ""} style="display:none;"{/if}*}>
                                        {html_options  options=$RECIPIENTMODULENAMES}
                                </select>
                                &nbsp;&nbsp;
                                <select name="recipientmodulefields" id="recipientmodulefields" class="classname">
                                      <option value="">{$EMOD.LBL_SELECT_MODULE_FIELD}</option>
                                </select>
        						<input type="button" value="{$EMOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('recipientmodulefields');" />
                            </td>      						
    					</tr>                         
                        {* email source module and its available fields *}
    					<tr {if $TYPE neq "2" && $S_TYPE neq "2"}style="display:none"{/if}>
    						<td valign=top class="small cellLabel" style="padding: 5px;" align="right" nowrap>{if $SELECTMODULE neq ""}{$SELECTMODULE}{else}{$EMOD.LBL_MODULENAMES}{/if}:</td>
    						<td class="cellText small" valign="top" style="padding: 5px;">
                                <select name="modulefields" id="modulefields" class="classname">
                                	{if $SELECTMODULE neq ""}
                                        {html_options  options=$SELECT_MODULE_FIELD}
                                    {else}
                                        <option value="">{$EMOD.LBL_SELECT_MODULE_FIELD}</option>
                                    {/if}
                                </select>
        						<input type="button" value="{$EMOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('modulefields');" />
                            </td>      						
    					</tr>   
                        {* related modules and its fields *}                					
                        <tr id="body_variables" style="display:{if $TYPE neq "2"}none{else}{$BODY_VARIABLES_DISPLAY}{/if}">
                          	<td valign=top class="small cellLabel" style="padding: 5px;" align="right" nowrap>{$EMOD.LBL_RELATED_MODULES}:</td>
                          	<td class="cellText small" valign=top style="padding: 5px;">
                          
                                <select name="relatedmodulesorce" id="relatedmodulesorce" class="classname" onChange="change_relatedmodule(this,'relatedmodulefields');">
                                        <option value="none">{$EMOD.LBL_SELECT_MODULE}</option>
                                        {html_options  options=$RELATED_MODULES}
                                </select>
                                &nbsp;&nbsp;
                          
                                <select name="relatedmodulefields" id="relatedmodulefields" class="classname">
                                    <option>{$EMOD.LBL_SELECT_MODULE_FIELD}</option>
                                </select>
                              	<input type="button" value="{$EMOD.LBL_INSERT_TO_TEXT}" class="crmButton small create" onclick="InsertIntoTemplate('relatedmodulefields');">
                          	</td>      						
                        </tr> 
        </table>
   </td>
   </tr>
   {* COMPOSE EMAIL EDITOR END *}
   <tr>
        <td colspan="3" class="mailSubHeader" align="center">
            {if $IS_DRIP eq "no"}
        	    <input type="button" id="show_edit_block_btn" value="{$EMOD.LBL_SHOW_EDIT_BLOCK}" class="crmButton small create" onclick="ShowEditBlock();" />
                <input type="button" id="hide_edit_block_btn" value="{$EMOD.LBL_HIDE_EDIT_BLOCK}" class="crmButton small create" onclick="HideEditBlock();" style="display:none;"/>
                <input title="{$APP.LBL_SELECTEMAILTEMPLATE_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECTEMAILTEMPLATE_BUTTON_KEY}" class="crmbutton small edit" onclick="window.open('index.php?module=EMAILMaker&action=lookupemailtemplates&pid={$PID}&formodule={$select_module}','emailtemplate','top=100,left=200,height=600,width=800,resizable=yes,scrollbars=yes,menubar=no,addressbar=no,status=yes')" type="button" name="button" value=" {$APP.LBL_SELECTEMAILTEMPLATE_BUTTON_LABEL}  ">
    		{/if}
            <input name="{$MOD.LBL_SEND}" value=" {$APP.LBL_SEND} " class="crmbutton small save" type="button" onclick="return email_validate(this.form,'send');">&nbsp;
    		<input name="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" value=" {$APP.LBL_CANCEL_BUTTON_LABEL} " class="crmbutton small cancel" type="button" onClick="window.close()">
        </td>
   </tr>
   {elseif $elements.2.0 eq 'description'}
   <tr>
	<td colspan="3" align="center" valign="top" height="480" id="description_td">
        {if $IS_DRIP eq "no"}
            {if $WEBMAIL eq 'true' or $RET_ERROR eq 1}
    		    <input type="hidden" name="from_add" value="{$from_add}">
    		    <input type="hidden" name="att_module" value="Webmails">
    		    <input type="hidden" name="mailid" value="{$mailid}">
    		    <input type="hidden" name="mailbox" value="{$mailbox}">
                <textarea style="display: none;" class="detailedViewTextBox" id="description" name="description" cols="90" rows="8">{$DESCRIPTION}</textarea>
            {else}
                <textarea style="display: none;" class="detailedViewTextBox" id="description" name="description" cols="90" rows="16">{if $DESCRIPTION neq ""}{$DESCRIPTION}{else}{$elements.3.0}{/if}</textarea>        
            {/if}
        {else} 
        <div style="height:100%;overflow:scroll;">
            {foreach name=emailtemplates item=template key=templateid from=$EMAIL_TEMPLATES}
            <div style="padding:10px">
                <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
        			<tr>
        				<td class="big"><strong>{$smarty.foreach.emailtemplates.iteration}.</strong></td>
        			</tr>
    			</table>
    			<table width="100%"  border="0" cellspacing="0" cellpadding="5">
                    <tr class="small">
                        <td width="15%" class="small cellLabel" align="right"><strong>{$EMOD.LBL_EMAIL_TEMPLATE}:</strong></td>
                        <td width="85%" class="cellText" >
                        <select name="send_templateid[{$smarty.foreach.emailtemplates.index}]">
                        {html_options options=$EMAIL_TEMPLATES_TO_DRIP selected=$template.template_id}
                        </select>
                        </td>
                      </tr>
                      <tr class="small">
                        <td class="small cellLabel" align="right"><strong>{$EMOD.LBL_DELAY}:</strong></td>
                        <td class="cellText">
                            <select id="delay_days_{$smarty.foreach.emailtemplates.index}" name="delay_days_{$smarty.foreach.emailtemplates.index}">
                            {section name=days loop=32}
                                <option value="{$smarty.section.days.index}" {if $template.delay_array.days eq $smarty.section.days.index}selected{/if}>{$smarty.section.days.index}</option>
                            {/section}
                            </select>
                            &nbsp;{$template.delay_lang_array.days}&nbsp;
                            <select id="delay_hours_{$smarty.foreach.emailtemplates.index}" name="delay_hours_{$smarty.foreach.emailtemplates.index}">
                            {section name=hours loop=24}
                                <option value="{$smarty.section.hours.index}" {if $template.delay_array.hours eq $smarty.section.hours.index}selected{/if}>{$smarty.section.hours.index}</option>
                            {/section}
                            </select>
                            &nbsp;{$template.delay_lang_array.hours}&nbsp;
                            <select id="delay_minutes_{$smarty.foreach.emailtemplates.index}" name="delay_minutes_{$smarty.foreach.emailtemplates.index}">
                                {html_options  options=$DELAY_MINUTES selected=$template.delay_array.minutes}
                            </select>&nbsp;{$template.delay_lang_array.minutes}
                        </td>
                    </tr>
                </table>
            </div>    
        	{/foreach}
        </div>    
        {/if}   
	</td>
   </tr>
   {/if}
{/foreach}
{/foreach}
   <tr> 
	<td colspan="3" class="mailSubHeader" style="padding: 5px;" align="center">
		{if $IS_DRIP eq "no"}
            <input title="{$APP.LBL_SELECTEMAILTEMPLATE_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECTEMAILTEMPLATE_BUTTON_KEY}" class="crmbutton small edit" onclick="window.open('index.php?module=Users&action=lookupemailtemplates','emailtemplate','top=100,left=200,height=400,width=500,menubar=no,addressbar=no,status=yes')" type="button" name="button" value=" {$APP.LBL_SELECTEMAILTEMPLATE_BUTTON_LABEL}  ">
		{/if}
        <input name="{$MOD.LBL_SEND}" value=" {$APP.LBL_SEND} " class="crmbutton small save" type="button" onclick="return email_validate(this.form,'send');">&nbsp;
		<input name="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" value=" {$APP.LBL_CANCEL_BUTTON_LABEL} " class="crmbutton small cancel" type="button" onClick="window.close()">
	</td>
   </tr>
</tbody>
</table>
</form>

<script>
var cc_err_msg = '{$MOD.LBL_CC_EMAIL_ERROR}';
var no_rcpts_err_msg = '{$MOD.LBL_NO_RCPTS_EMAIL_ERROR}';
var bcc_err_msg = '{$MOD.LBL_BCC_EMAIL_ERROR}';
var conf_mail_srvr_err_msg = '{$MOD.LBL_CONF_MAILSERVER_ERROR}';
{literal}

function addEmailAdress(pid,parent_type, popup_link, email)
{
    if (parent_type == "other")
    {
        email_adress = prompt("{/literal}{$EMOD.LBL_SET_EMAIL_ADRESS}{literal}", email);
        
        if (email_adress)
        {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if(reg.test(email_adress) == false) 
            {
               alert('{/literal}{$EMOD.LBL_INVALID_EMAIL_ADRESS}{literal}');
               addEmailAdress("other", "", email_adress)
               
               return false;
            }
            else
            {
                email_exists = window.document.getElementById('emailadress_'+pid+'_0_'+email_adress);
                if (!email_exists)
                {
                    var el_name = pid+'_email_'+email_adress;
                                
                    /* var emaillist_content = window.opener.document.getElementById('div_emaillist_26').innerHTML;*/
                    
                    var selectbox = '<select name="ToEmails[]" id="to_email_' + el_name + '" style="font-size:10px;"><option value="normal_' + el_name + '">To:</option><option value="cc_' + el_name + '">Cc :</option><option value="bcc_' + el_name + '">Bcc :</option></select>';
                    
                    var clear_btn = '<img src="themes/images/clear_field.gif" alt="Clear" title="Clear" LANGUAGE=javascript onClick="clearEmailFromTable(\'26\',\'\',\'\',this); return false;" align="absmiddle" style="cursor:hand;cursor:pointer">';
                    
                    border_style = '1px solid #C0C0C0';
                    
                    var new_tr = window.document.getElementById('table_emaillist{/literal}{if $TYPE eq "1"}'{else}_'+pid{/if}{literal}).insertRow(0);
                    
                    new_tr.id = 'emailadress_'+pid+'_email_'+email_adress;
                    
                    var td1 = new_tr.insertCell(0);
                    var td2 = new_tr.insertCell(1);
                    var td3 = new_tr.insertCell(2);
                    
                    td1.innerHTML = selectbox;
                    td1.width = "10px";
                    //td1.style.borderTop = border_style;
                    //td1.style.borderBottom = border_style;
                    //td1.style.borderLeft = border_style;
        
                    
                    td2.innerHTML = "{/literal}{$EMOD.LBL_OTHER}{literal} <i>&lt;" + email_adress + "&gt;</i>";
                    td2.style.fontSize = "10px"; 
                    td2.style.lineHeight = "12px";
                    //td2.style.borderTop = border_style;
                    //td2.style.borderBottom = border_style;
         
                    
                    td3.innerHTML = clear_btn;
                    td3.width = "10px";
                    //td3.style.borderTop = border_style;
                    //td3.style.borderBottom = border_style;
                    //td3.style.borderRight = border_style;
                }
            }
        }
        
    }
    else
    {
        window.open(popup_link,"test","width=640,height=602,resizable=0,scrollbars=0,top=150,left=200");
    }
}  

function addDocumentIntoEmail(document_id, document_name)
{
    var list_target = document.getElementById("files_list")
	
    var table = document.createElement('table');
    table.width = "100%";
    table.className = "small";
    table.cellpadding = "1";
    table.cellspacing = "1";
    
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    cell1.className = "cellText";
    cell1.innerHTML = document_name;
    
    var attachment_input = document.createElement( 'input' );
	attachment_input.id = "document_attachment_" + document_id;
    attachment_input.name = 'documents[]';
    attachment_input.type = 'hidden';
	attachment_input.value = document_id;
    cell1.appendChild(attachment_input);

    var cell2 = row.insertCell(1);
    cell2.noWrap = true;
    cell2.width = "20px";
    cell2.align = "right";
    cell2.className = "cellText";
    cell2.innerHTML = "";

    a = document.createElement('a');
    a.innerText = '{/literal}{$APP.LNK_DELETE}{literal}';
    a.textContent = '{/literal}{$APP.LNK_DELETE}{literal}';
    a.href = 'javascript:;';
    a.onclick= function()
    {
		this.parentNode.parentNode.parentNode.parentNode.removeChild( this.parentNode.parentNode.parentNode);
		return false;
	};
     
    cell2.appendChild(a);
    
    
    list_target.appendChild( table );
} 
 
 
function changeAttachmentToEmail(attachment_type_val) 
{
    file_btn_el = document.getElementById("file_btn");
    document_btn_el = document.getElementById("document_btn");
    
    if (attachment_type_val == "file")
    {
        file_btn_el.style.display = "inline"; 
        document_btn_el.style.display = "none";   
    }
    else if (attachment_type_val == "document")   
    {
        file_btn_el.style.display = "none"; 
        document_btn_el.style.display = "inline";  
    }
} 
 
function addAttachmentToEmail()
{
    window.open("index.php?module=EMAILMaker&return_module=Documents&action=Popup&html=Popup_picker&form=HelpDeskEditView&popuptype=specific","test","width=640,height=602,resizable=0,scrollbars=0,top=150,left=200");
}

function email_validate(oform,mode)
{
	if(trim(mode) == '')
	{
		return false;
	}
    
    {/literal}
    {if $IS_DRIP eq "yes"}
        Delay_Times = new Array();
        
        {foreach name=emailtemplates item=template key=templateid from=$EMAIL_TEMPLATES}
        Delay_Times[{$templateid}] = getDelayTime('{$templateid}'); 
        {/foreach}
       
        var new_seq = "0";
        for (i=0;i<(Delay_Times.length - 1);i++)
        {ldelim}
            ni = i+1; 
            if (Delay_Times[i] > Delay_Times[ni]) new_seq = "1";
        {rdelim}
        
        if (new_seq == "1")
        {ldelim}
            if(!confirm("{$EMOD.LBL_DRIP_QUESTION}")) return false;
        {rdelim}
  
    {/if}
    {literal}
    
	if(oform.subject.value.replace(/^\s+/g, '').replace(/\s+$/g, '').length==0)
	{
		if(email_sub = prompt('You did not specify a subject from this email. If you would like to provide one, please type it now','(no-Subject)'))
		{
			oform.subject.value = email_sub;
		}else
		{
			return false;
		}
	}
    
    var control_pids = controlPids();
    if(!control_pids)
	{
		return false;
	}
    
	if(mode == 'send')
	{
		server_check()	
	}
    else if(mode == 'save')
	{
		oform.action.value='Save';
		oform.submit();
	}
    else
	{
		return false;
	}
}
//function to extract the mailaddress inside < > symbols.......for the bug fix #3752
function findAngleBracket(mailadd)
{
        var strlen = mailadd.length;
        var success = 0;
        var gt = 0;
        var lt = 0;
        var ret = '';
        for(i=0;i<strlen;i++){
                if(mailadd.charAt(i) == '<' && gt == 0){
                        lt = 1;
                }
                if(mailadd.charAt(i) == '>' && lt == 1){
                        gt = 1;
                }
                if(mailadd.charAt(i) != '<' && lt == 1 && gt == 0)
                        ret = ret + mailadd.charAt(i);

        }
        if(/^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/.test(ret)){
                return true;
        }
        else
                return false;

}
function server_check()
{
	var oform = window.document.EditView;
        new Ajax.Request(
        	'index.php',
                {queue: {position: 'end', scope: 'command'},
                	method: 'post',
                        postBody:"module=Emails&action=EmailsAjax&file=Save&ajax=true&server_check=true",
			onComplete: function(response) {
			if(response.responseText.indexOf('SUCCESS') > -1)
			{
				oform.send_mail.value='true';
				oform.action.value='Save';
                oform.module.value='EMAILMaker';
				oform.submit();
			}else
			{
				//alert('Please Configure Your Mail Server');
				alert(conf_mail_srvr_err_msg);
				return false;
			}
               	    }
                }
        );
}

function clearEmailFromTable(pid,entity_id,email_id,r)
{
   //email_element = document.getElementById('emaildiv_'+pid+'_'+entity_id+'_'+email_id);
   //email_element.parentNode.removeChild(email_element);   

   var i=r.parentNode.parentNode.rowIndex;
   {/literal}

   {if $TYPE eq "1" || $TYPE eq "3"}
       document.getElementById('table_emaillist').deleteRow(i);
   {else} 
       document.getElementById('table_emaillist_'+pid).deleteRow(i);
   {/if} 
   {literal} 
}  

function controlPids()
{
    var error = 0;
    var HaveTo = new Array();
    var allSelectEls = document.getElementsByTagName("select"); 
    for(var i=0;i<allSelectEls.length;i++)
	{
        if(allSelectEls[i].getAttribute("name")!="ToEmails[]")continue;
        Control_Vals = allSelectEls[i].value.split("_");
        
        if (Control_Vals[0] == "normal")
        {
            HaveTo[Control_Vals[1]] = true;
        }
	}
    
    var allInputEls=document.getElementsByTagName("input");
	for(var i=0;i<allInputEls.length;i++)
	{
        if(allInputEls[i].getAttribute("name")!="Control_Pids[]")continue;
        var control = allInputEls[i].value;
 
        if (!HaveTo[control])
        {
            p_name = document.getElementById("panem_"+ control).innerHTML;
            //alert("\"" + p_name + "\" {/literal}{$EMOD.LBL_HAVE_NOT_ADRESS_TO}{literal}");
            error++;    
        }  
	}

    if (error > 0)  
    {
        return confirm("{/literal}{$EMOD.LBL_NO_RCPTS_EMAIL_ERROR2}{literal}");
    }    
    else
    {
        if (HaveTo.length == 0)
        {
            alert("{/literal}{$MOD.LBL_NO_RCPTS_EMAIL_ERROR}{literal}");
            return false;  
        }
        else
            return true;    
    }
        
}                       

{/literal}

var invarray = ['SUBTOTAL', 'TOTALWITHOUTVAT', 'TOTALDISCOUNT', 'TOTALDISCOUNTPERCENT', 'TOTALAFTERDISCOUNT', 
                'VAT', 'VATPERCENT', 'VATBLOCK', 'TOTALWITHVAT', 'ADJUSTMENT', 'TOTAL', 'SHTAXTOTAL', 'SHTAXAMOUNT',
                'CURRENCYNAME', 'CURRENCYSYMBOL', 'CURRENCYCODE'];

var module_blocks = new Array();

{foreach item=moduleblocks key=blockname from=$MODULE_BLOCKS}
    module_blocks["{$blockname}"] = new Array({$moduleblocks});
{/foreach}

var module_fields = new Array();

{foreach item=modulefields key=modulename from=$MODULE_FIELDS}
    module_fields["{$modulename}"] = new Array({$modulefields});
{/foreach}


function fillModuleFields(first,second_name)
{ldelim}
    second = document.getElementById(second_name);    
    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var module = box.options[box.selectedIndex].value;
    if (!module) return;

    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {ldelim}
            box2.removeChild(optgroups[i]);
    {rdelim}

    var blocks = module_blocks[module];
    var blocks_length = blocks.length;
    if(second_name=='subject_fields')
    {ldelim}
        objOption=document.createElement("option");
        objOption.innerHTML = '{$MOD.LBL_SELECT_MODULE_FIELD}';
        objOption.value = '';
        box2.appendChild(objOption);
        
        optGroup = document.createElement('optgroup');
        optGroup.label = '{$MOD.LBL_COMMON_EMAILINFO}';
        box2.appendChild(optGroup); 
        
        {foreach item=field key=field_val from=$SUBJECT_FIELDS}
            objOption=document.createElement("option");
            objOption.innerHTML = '{$field}';
            objOption.value = '{$field_val}';
            optGroup.appendChild(objOption);
        {/foreach}
        
        if(module=='Invoice' || module=='Quotes' || module=='SalesOrder' || module=='PurchaseOrder' || module=='Issuecards' || module=='Receiptcards' || module=="Creditnote" || module=="StornoInvoice")
            blocks_length-=2;
    {rdelim}  
     
    for(b=0;b<blocks_length;b+=2)
    {ldelim}
            optGroup = document.createElement('optgroup');
            optGroup.label = blocks[b];
            box2.appendChild(optGroup);

            var list = module_fields[module+'|'+ blocks[b+1]];

    		for(i=0;i<list.length;i+=2)
    		{ldelim}
    		      //<optgroup label="Addresse" class=\"select\" style=\"border:none\">

                  objOption=document.createElement("option");
                  objOption.innerHTML = list[i];
                  objOption.value = list[i+1];

                  optGroup.appendChild(objOption);
    		{rdelim}
    {rdelim}
    
    return module;    
{rdelim}

var module_related_fields = new Array();
{$MODULE_RELATED_FIELDS}
{* foreach item=related_modules key=relatedmodulename from=$MODULE_RELATED_FIELDS}
module_related_fields["{$relatedmodulename}"] = new Array('',''{foreach item=module1 key=modulekey from=$related_modules},'{$modulekey}','{$module1}'{/foreach});
{/foreach *}

var all_related_modules = new Array();
{$ALL_RELATED_MODULES}
{* foreach item=related_modules key=relatedmodulename from=$ALL_RELATED_MODULES}
all_related_modules["{$relatedmodulename}--{$module1.fieldname}"] = new Array('',''{foreach item=module1 key=modulekey from=$related_modules},'{$module1.module}','{$module1.modulelabel}'{/foreach});
{/foreach *}

{*{$modulekey} - {$module1.module} - modulelabel {$module1.module} - {$module1.fieldlabel} - {$module1.fieldname}*}
{* all_related_modules["{$relatedmodulename}"] = new Array('{$MOD.LBL_SELECT_MODULE}','none'{foreach item=module1 from=$related_modules} ,'{$APP.$module1|escape}','{$module1}'{/foreach});  *}

var related_module_fields = new Array();

{foreach item=relatedmodulefields key=relatedmodulename from=$RELATED_MODULE_FIELDS}
    related_module_fields["{$relatedmodulename}"] = new Array({$relatedmodulefields});
{/foreach}

function change_relatedmodule(first,second_name)
{ldelim}
    second = document.getElementById(second_name);

    optionTest = true;
    lgth = second.options.length - 1;

    second.options[lgth] = null;
    if (second.options[lgth]) optionTest = false;
    if (!optionTest) return;
    var box = first;
    var number_data = box.options[box.selectedIndex].value;
    var number_array = number_data.split("--");
    var number = number_array[0]; 

    if (!number) return;
   
    var box2 = second;

    //box2.options.length = 0;

    var optgroups = box2.childNodes;
    for(i = optgroups.length - 1 ; i >= 0 ; i--)
    {ldelim}
            box2.removeChild(optgroups[i]);
    {rdelim}

    if (number == "none")
    {ldelim}
        objOption=document.createElement("option");
        objOption.innerHTML = "{$MOD.LBL_SELECT_MODULE_FIELD}";
        objOption.value = "";

        box2.appendChild(objOption);
    {rdelim}
    else
    {ldelim}
        var blocks = module_blocks[number];

        for(b=0;b<blocks.length;b+=2)
        {ldelim}
            var list = related_module_fields[number+'|'+ blocks[b+1]];

    		if (list.length > 0)
    		{ldelim}

    		    optGroup = document.createElement('optgroup');
                optGroup.label = blocks[b];
                box2.appendChild(optGroup);

        		for(i=0;i<list.length;i+=2)
        		{ldelim}
                      objOption=document.createElement("option");
                      objOption.innerHTML = list[i];
                      objOption.value = list[i+1];


                      optGroup.appendChild(objOption);
        		{rdelim}
    		{rdelim}
        {rdelim}
    {rdelim}
{rdelim}


function InsertIntoTemplate(element)
{ldelim}

    selectField =  document.getElementById(element).value;

    oEditor = CKEDITOR.instances.description; 
      
    if(element!='header_var' && element!='footer_var' && element!='hmodulefields' && element!='fmodulefields')
    {ldelim}        
        

      	 if (selectField != '')
      	 {ldelim}
               if (selectField == 'ORGANIZATION_STAMP_SIGNATURE')
       	       {ldelim}
       	           insert_value = '{$COMPANY_STAMP_SIGNATURE}';
      	       {rdelim}
               else if (selectField == 'COMPANY_LOGO')
       	       {ldelim}
       	           insert_value = '{$COMPANYLOGO}';
      	       {rdelim}
               else if (selectField == 'ORGANIZATION_HEADER_SIGNATURE')
       	       {ldelim}
       	           insert_value = '{$COMPANY_HEADER_SIGNATURE}';
      	       {rdelim}
               else
      	       {ldelim}
                   if (element == "articelvar")
                      insert_value = '#'+selectField+'#';
                   else if (element == "relatedmodulefields") 
                   {ldelim}                                      
                      rel_module_sorce = document.getElementById('relatedmodulesorce').value; 
                      rel_module_data = rel_module_sorce.split("--");
                                            
                      insert_value = '$r-'+ rel_module_data[1] + '-'+ selectField+'$';   
                   {rdelim}                   
                   else if(element == "productbloctpl" || element == "productbloctpl2" || element == "dateval")
                      insert_value = selectField;
                   else if(element == "global_lang")
                      insert_value = '%G_'+selectField+'%';
                   else if(element == "module_lang")
                      insert_value = '%M_'+selectField+'%';  
                   else if(element == "modulefields")
                   {ldelim}
                       if(inArray(selectField, invarray))
                           insert_value = '$'+selectField+'$';  
                       else
                           insert_value = '$s-'+selectField+'$';      
                   {rdelim}
                   else if(element == "customfunction")
                      insert_value = '[CUSTOMFUNCTION|'+selectField+'|CUSTOMFUNCTION]'; 
                   else
                      insert_value = '$'+selectField+'$';


               {rdelim}
               oEditor.insertHtml(insert_value);
      	 {rdelim}

    {rdelim}
    else
    {ldelim}
        if (selectField != '')
        {ldelim}
            if(element=='hmodulefields' || element=='fmodulefields' )
                oEditor.insertHtml('$'+selectField+'$');
            else
                oEditor.insertHtml(selectField);
        {rdelim}
    {rdelim}
{rdelim}

function inArray(needle, haystack) 
{ldelim}
    var length = haystack.length;
    for(var i = 0; i < length; i++) 
    {ldelim}
        if(typeof haystack[i] == 'object') 
        {ldelim}
            if(arrayCompare(haystack[i], needle)) return true;
        {rdelim} else {ldelim}
            if(haystack[i] == needle) return true;
        {rdelim}
    {rdelim}
    return false;
{rdelim}

function insertFieldIntoSubject(val)
{ldelim}
    if(val!='')
    {ldelim}
        if(val=='##DD.MM.YYYY##' || val=='##DD-MM-YYYY##' || val=='##DD/MM/YYYY##' || val=='##MM-DD-YYYY##' || val=='##MM/DD/YYYY##' || val=='##YYYY-MM-DD##')
            document.getElementById('subject').value+= val;
        else
            document.getElementById('subject').value+='$s-'+val+'$'; 
    {rdelim}
{rdelim}

function ShowEditBlock()
{ldelim}
    document.getElementById("compose_email_block_editor").style.display = "table-row";
    document.getElementById("subject").style.width = "65%";
    document.getElementById("subject_fields").style.display = "inline";
    document.getElementById("show_edit_block_btn").style.display = "none";
    document.getElementById("hide_edit_block_btn").style.display = "inline";
{rdelim}

function HideEditBlock()
{ldelim}
    document.getElementById("compose_email_block_editor").style.display = "none";
    document.getElementById("subject").style.width = "99%";
    document.getElementById("subject_fields").style.display = "none";
    document.getElementById("show_edit_block_btn").style.display = "inline";
    document.getElementById("hide_edit_block_btn").style.display = "none";
{rdelim}

function showDelaySend(is_checked)

{ldelim}
    
    var days_el = document.getElementById("email_delay_days"); 
    var hours_el = document.getElementById("email_delay_hours");
    var minutes_el = document.getElementById("email_delay_minutes");

    if (is_checked)
    {ldelim}
        days_el.disabled=false
        hours_el.disabled=false
        minutes_el.disabled=false
    {rdelim}
    else
    {ldelim}
        days_el.disabled=true
        hours_el.disabled=true
        minutes_el.disabled=true
    {rdelim}

{rdelim}

function controlDelay(ch_el)
{ldelim}

    {if $IS_DELAY_ACTIVE eq "true"}
        showDelaySend(ch_el.checked)
    {else}	
    {literal}   

            new Ajax.Request(
            	'index.php',
                    {queue: {position: 'end', scope: 'command'},
                    	method: 'post',
                            postBody:"module=EMAILMaker&action=EMAILMakerAjax&file=controlPermissions&ajax=true",
    			            onComplete: function(response) {
                			if(response.responseText == "yes")
                			{
                			     showDelaySend(ch_el.checked); 	
                			}
                            else
                			{
                                alert('{/literal}{$EMOD.LBL_DELAY_IS_NOT_ACTIVE}{literal}'); 
                                ch_el.checked = false;
                			}
                   	    }
                    }
            );
    
    {/literal}
    {/if}
{rdelim}

function getDelayTime(d)
{ldelim}
 
 var days_val = document.getElementById("delay_days_" + d).value * 1; 
 var hours_val = document.getElementById("delay_hours_" + d).value * 1; 
 var minutes_val = document.getElementById("delay_minutes_" + d).value * 1; 
 
 var times = (days_val * 24 * 60) + (hours_val * 60) + minutes_val;
 
 return times;
{rdelim}

function openEditEmails()
{ldelim}
    document.getElementById("title_table").style.display = "none";
    document.getElementById("from_td1").style.display = "none";
    document.getElementById("from_td2").style.display = "none";
    document.getElementById("from_td3").style.display = "none";
    document.getElementById("description_td").style.display = "none";
    document.getElementById("attachment_td").style.display = "none"; 
    document.getElementById("recipients_td").style.width = "100%"; 
    
    //document.getElementById("recipients_div").style.display = "inline"; 
    document.getElementById("recipients_div").style.position = "absolute";
    document.getElementById("recipients_div").style.width = "100%"; 
    document.getElementById("recipients_div").style.height = "100%";
    
    
    document.getElementById("edit_emails_title").style.display = "block";
    document.getElementById("edit_emails_title").style.width = "100%"; 
      
    
{rdelim}

function closeEditEmails()
{ldelim}
    document.getElementById("title_table").style.display = "block";
    document.getElementById("from_td1").style.display = "table-cell";
    document.getElementById("from_td2").style.display = "table-cell";
    document.getElementById("from_td3").style.display = "table-cell";
    document.getElementById("description_td").style.display = "table-cell";
    document.getElementById("attachment_td").style.display = "table-cell"; 
    document.getElementById("recipients_td").style.width = "70%"; 
    
    //document.getElementById("recipients_div").style.display = "inline"; 
    
    document.getElementById("recipients_div").style.position = "static";
    document.getElementById("recipients_div").style.width = "100%"; 
    document.getElementById("recipients_div").style.height = "200px";
    
    
    document.getElementById("edit_emails_title").style.display = "none";
    document.getElementById("edit_emails_title").style.width = "100%"; 
{rdelim}

</script>
{if $IS_DRIP eq "no"}
<script type="text/javascript" defer="1">
	var textAreaName = 'description';
	CKEDITOR.replace( textAreaName,	{ldelim}
		extraPlugins : 'uicolor',
		uiColor: '#dfdff1'
	{rdelim} ) ;
	var oCKeditor = CKEDITOR.instances[textAreaName];
</script>
{/if}
</body>
</html>
