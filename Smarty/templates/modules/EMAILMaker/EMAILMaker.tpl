{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script language="JavaScript" type="text/javascript" src="include/js/ListView.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/search.js"></script>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script>
{if $VIEW_CONTENT neq "DetailViewEmailTemplate"} 
    function ExportTemplates()
    {ldelim}
    	if(typeof(document.massdelete.selected_id) == 'undefined')
    		return false;
            x = document.massdelete.selected_id.length;
            idstring = "";
    
            if ( x == undefined)
            {ldelim}
    
                    if (document.massdelete.selected_id.checked)
                    {ldelim}
                            idstring = document.massdelete.selected_id.value;
                            
                            window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=ExportEmailTemplate&templates="+idstring;
    		     	xx=1;
                    {rdelim}
                    else
                    {ldelim}
                            alert("{$APP.SELECT_ATLEAST_ONE}");
                            return false;
                    {rdelim}
            {rdelim}
            else
            {ldelim}
                    xx = 0;
                    for(i = 0; i < x ; i++)
                    {ldelim}
                            if(document.massdelete.selected_id[i].checked)
                            {ldelim}
                                    idstring = document.massdelete.selected_id[i].value +";"+idstring
                            xx++
                            {rdelim}
                    {rdelim}
                    if (xx != 0)
                    {ldelim}
                            document.massdelete.idlist.value=idstring;
                            
                            window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=ExportEmailTemplate&templates="+idstring;
                    {rdelim}
                    else
                    {ldelim}
                            alert("{$APP.SELECT_ATLEAST_ONE}");
                            return false;
                    {rdelim}
           {rdelim}
    
    {rdelim}
    
    function massDelete()
    {ldelim}
    	if(typeof(document.massdelete.selected_id) == 'undefined')
    		return false;
            x = document.massdelete.selected_id.length;
            idstring = "";
    
            if ( x == undefined)
            {ldelim}
    
                    if (document.massdelete.selected_id.checked)
                   {ldelim}
                            document.massdelete.idlist.value=document.massdelete.selected_id.value+';';
    			xx=1;
                    {rdelim}
                    else
                    {ldelim}
                            alert("{$APP.SELECT_ATLEAST_ONE}");
                            return false;
                    {rdelim}
            {rdelim}
            else
            {ldelim}
                    xx = 0;
                    for(i = 0; i < x ; i++)
                    {ldelim}
                            if(document.massdelete.selected_id[i].checked)
                            {ldelim}
                                    idstring = document.massdelete.selected_id[i].value +";"+idstring
                            xx++
                            {rdelim}
                    {rdelim}
                    
                    if (xx != 0)
                    {ldelim}
                            document.massdelete.idlist.value=idstring;
                    {rdelim}
                    else
                    {ldelim}
                            alert("{$APP.SELECT_ATLEAST_ONE}");
                            return false;
                    {rdelim}
            {rdelim}
    		if(confirm("{$APP.DELETE_CONFIRMATION}"+xx+"{$APP.RECORDS}"))
    		{ldelim}
    	        	{if $VIEW_CONTENT eq "ListDripEmails"} 
                        document.massdelete.action.value= "Delete";
                    {else} 
                        document.massdelete.action.value= "DeleteEmailTemplate";
                    {/if}
    		{rdelim}
    		else
    		{ldelim}
    			return false;
    		{rdelim}
    
    {rdelim}
{/if}

{if $IS_ADMIN eq '1'}
    {literal}
    function reactivateLicense()
    {
        {/literal}
        var reply = prompt('{$MOD.LBL_INSERT_KEY}');
        {literal}
        $("vtbusy_info").style.display="inline";

        if(reply != null && reply!='')
        {
          new Ajax.Request(
                      'index.php',
                      {queue: {position: 'end', scope: 'command'},
                              method: 'post',
                              postBody: 'module=EMAILMaker&action=EMAILMakerAjax&file=ReactivateLicense&key='+reply,
                              onComplete: function(response) {

                                  if (response.responseText == "ok")
                                  {
                                     {/literal} alert('{$MOD.REACTIVATE_SUCCESS}');
                                     location.reload(false);
                                     {literal}
                                  }
                                  else if (response.responseText == "error")
                                  {
                                     {/literal} alert('{$MOD.LBL_INVALID_FOPEN_CURL}'); {literal}
                                  }
                                  else
                                  {
                                     {/literal} alert('{$MOD.LBL_INVALID_KEY}'); {literal}
                                  }

                                  $("vtbusy_info").style.display="none";
                              }
                      }
              );
        }
        else
            $("vtbusy_info").style.display="none";
    }
    {/literal}

    {literal}
    function deactivateLicense(listform)
    {
        {/literal}
        {if $LICENSE_KEY eq ""}
            var reply = prompt('{$MOD.LBL_INSERT_KEY}');
            {literal}
            $("vtbusy_info").style.display="inline";

            if(reply != null && reply!='')
            {
              new Ajax.Request(
                          'index.php',
                          {queue: {position: 'end', scope: 'command'},
                                  method: 'post',
                                  postBody: 'module=EMAILMaker&action=EMAILMakerAjax&file=DeactivateLicense&mode=control&key='+reply,
                                  onComplete: function(response) {
                                      $("vtbusy_info").style.display="none";
                                      if (response.responseText != "")
                                      {
                                          alert(response.responseText);
                                      }
                                      else
                                      {
                                          listform.license_key.value=reply;
                                          listform.submit();
                                      }

                                  }
                          }
                  );
            }
            else
                $("vtbusy_info").style.display="none";
            {/literal}
        {else}
        listform.action.value='DeactivateEMAILMaker';
        listform.submit();
        {/if}

    {literal}
    }
    {/literal}
{/if}
</script>
{include file='modules/EMAILMaker/Buttons_List.tpl'}  
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">   
<tr>
    {*<td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>*}
    <td class="showPanelBg" style="padding: 0 10px 10px 10px;" valign="top" width="100%">
    {if $VIEW_CONTENT eq "ListEmails" || $VIEW_CONTENT eq "ListEmailTemplates" || $VIEW_CONTENT eq "ListDripEmails"}
    <form  name="massdelete" method="POST" onsubmit="VtigerJS_DialogBox.block();">
    <input name="idlist" type="hidden">
    <input name="module" type="hidden" value="EMAILMaker">
    <input name="parenttab" type="hidden" value="Tools">
    <input name="action" type="hidden" value="">
    {/if}
    
    <table border=0 cellspacing=0 cellpadding=10 width=100% >
    <tr>
        <td style="padding-top:10;"> 
            {*
            <table border=0 cellspacing=0 cellpadding=0 width=100% align=center>
        		<tr>
        			<td>
        				<br><br>
                        <table border=0 cellspacing=0 cellpadding=3 width=100% class="small">
        				<tr>
        					<td class="dvtTabCache" style="width:10px" nowrap>&nbsp;</td>
        					<td class="dvt{if $VIEW_TYPE neq "Emails"}Un{/if}SelectedCell" align=center nowrap>{if $VIEW_TYPE neq "Emails"}<a href="index.php?action=ListView&module=EMAILMaker&parenttab=Tools">{$MOD.LBL_SENT_MAILS_LIST}</a>{else}{$MOD.LBL_SENT_MAILS_LIST}{/if}</td>	
        					<td class="dvtTabCache" style="width:10px">&nbsp;</td>
        					<td class="dvt{if $VIEW_TYPE neq "EmailTemplates"}Un{/if}SelectedCell" align="center" nowrap>{if $VIEW_TYPE neq "EmailTemplates"}<a href="index.php?action=ListEmailTemplates&module=EMAILMaker&parenttab=Tools">{$MOD.LBL_EMAIL_TEMPLATES_LIST}</a>{else}{$MOD.LBL_EMAIL_TEMPLATES_LIST}{/if}</td>
                            <td class="dvtTabCache" style="width:10px">&nbsp;</td>
        					<td class="dvt{if $VIEW_TYPE neq "DripEmails"}Un{/if}SelectedCell" align="center" nowrap>{if $VIEW_TYPE neq "DripEmails"}<a href="index.php?action=ListDripEmails&module=EMAILMaker&parenttab=Tools">{$MOD.LBL_DRIP_EMAILS_LIST}</a>{else}{$MOD.LBL_DRIP_EMAILS_LIST}{/if}</td>
                            <td class="dvtTabCache" align="right" style="width:100%">&nbsp;</td>
        				</tr>
        				</table>
        			</td>
        		</tr>
        		<tr>
        			<td valign=top align=left >  
                   
                        <table border=0 cellspacing=0 cellpadding=3 width=100% class="dvtContentSpace" style="border-bottom:0;">
    				        <tr valign=top>
    					        <td align=left style="padding:10px 10px 10px 15px;">
                                {if $VIEW_CONTENT eq "ListEmails"}    
                                    {include file="modules/EMAILMaker/ListEmails.tpl"}
                                {elseif $VIEW_CONTENT eq "DetailViewEmail"}    
                                    {include file="modules/EMAILMaker/DetailViewEmail.tpl"}
                                {elseif $VIEW_CONTENT eq "ListEmailTemplates"}    
                                    {include file="modules/EMAILMaker/ListEmailTemplates.tpl"}
                                {elseif $VIEW_CONTENT eq "DetailViewEmailTemplate"}    
                                    {include file="modules/EMAILMaker/DetailViewEmailTemplate.tpl"}
                                {elseif $VIEW_CONTENT eq "ListDripEmails"}    
                                    {include file="modules/EMAILMaker/ListDripEmails.tpl"}
                                {elseif $VIEW_CONTENT eq "SelectEmailTemplates"}    
                                    {include file="modules/EMAILMaker/SelectEmailTemplates.tpl"}
                                {elseif $VIEW_CONTENT eq "EditEmailTemplate"}    
                                    {include file="modules/EMAILMaker/EditEmailTemplate.tpl"}
                                {elseif $VIEW_CONTENT eq "EditDripEmails"}    
                                    {include file="modules/EMAILMaker/EditDripEmails.tpl"}
                                {elseif $VIEW_CONTENT eq "DetailViewDripEmails"}    
                                    {include file="modules/EMAILMaker/DetailViewDripEmails.tpl"}    
                                {elseif $VIEW_CONTENT eq "EditDripEmailTemplates"}    
                                    {include file="modules/EMAILMaker/EditDripEmailTemplates.tpl"}  
                                {/if}
                                </td>
                            </tr>
                        </table>            
                    </td>
                </tr>
            </table>
            *}
            {if $VIEW_CONTENT eq "ListEmailTemplates"}    
                {include file="modules/EMAILMaker/ListEmailTemplates.tpl"}
            {elseif $VIEW_CONTENT eq "DetailViewEmailTemplate"}    
                {include file="modules/EMAILMaker/DetailViewEmailTemplate.tpl"}
            {elseif $VIEW_CONTENT eq "SelectEmailTemplates"}    
                {include file="modules/EMAILMaker/SelectEmailTemplates.tpl"}
            {elseif $VIEW_CONTENT eq "EditEmailTemplate"}    
                {include file="modules/EMAILMaker/EditEmailTemplate.tpl"}
            {elseif $VIEW_CONTENT eq "DetailViewMassEmail"}    
                {include file="modules/EMAILMaker/DetailViewMassEmail.tpl"}
            {elseif $VIEW_CONTENT eq "EditViewMassEmail"}    
                {include file="modules/EMAILMaker/EditViewMassEmail.tpl"}
            {else}     
                {include file="modules/EMAILMaker/ListEmailTemplates.tpl"}
            {/if}            
        </td>
    </tr>
    </table> 
    </td>
</tr>
<tr><td align="center" class="small" style="color: rgb(153, 153, 153);">{$MOD.EMAIL_MAKER} {$VERSION} {$MOD.COPYRIGHT}</td></tr>
</table>
{if $VIEW_CONTENT eq "ListEmails"}</form>{/if}