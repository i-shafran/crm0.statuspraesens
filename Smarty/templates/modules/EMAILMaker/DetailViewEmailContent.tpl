{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
 <script type='text/javascript'>
{literal}

function isEMAILMakerRecipientsListBlockLoaded(id,urldata){
	var elem = document.getElementById(id);
	if(elem == null || typeof elem == 'undefined' || urldata.indexOf('order_by') != -1 ||
		urldata.indexOf('start') != -1 || urldata.indexOf('withCount') != -1){
		return false;
	}
	var tables = elem.getElementsByTagName('table');
	return tables.length > 0;
}

function loadEMAILMakerRecipientsListBlock(urldata,target,imagesuffix) {

	var showdata = 'show_'+imagesuffix;
	var showdata_element = $(showdata);

	var hidedata = 'hide_'+imagesuffix;
	var hidedata_element = $(hidedata);
	if(isEMAILMakerRecipientsListBlockLoaded(target,urldata) == true){
		$(target).show();
		showdata_element.hide();
      	hidedata_element.show();
		//$('delete_'+imagesuffix).show();
		return;
	}
	var indicator = 'indicator_'+imagesuffix;
	var indicator_element = $(indicator);
	indicator_element.show();
	//$('delete_'+imagesuffix).show();
	
	var target_element = $(target);
	
	new Ajax.Request(
		'index.php',
        {queue: {position: 'end', scope: 'command'},
                method: 'post',
                postBody: urldata,
                onComplete: function(response) {
					var responseData = trim(response.responseText);
      				target_element.update(responseData);
					target_element.show();
      				showdata_element.hide();
      				hidedata_element.show();
      				indicator_element.hide();
					if($('return_module').value == 'Campaigns'){
						var obj = document.getElementsByName(imagesuffix+'_selected_id');
						var relatedModule = imagesuffix.replace('Campaigns_',"");
						$(relatedModule+'_count').innerHTML = numofRows;
						if(selectallActivation == 'true'){
							$(imagesuffix+'_selectallActivate').value='true';
							$(imagesuffix+'_linkForSelectAll').show();
							$(imagesuffix+'_selectAllRec').style.display='none';
							$(imagesuffix+'_deSelectAllRec').style.display='inline';
							var exculdedArray=excludedRecords.split(';');
							if (obj) {
								var viewForSelectLink = showSelectAllLink(obj,exculdedArray);
								$(imagesuffix+'_selectCurrentPageRec').checked = viewForSelectLink;
								$(imagesuffix+'_excludedRecords').value = $(imagesuffix+'_excludedRecords').value+excludedRecords;
							}
						}else{
							$(imagesuffix+'_linkForSelectAll').hide();
							rel_toggleSelect(false,imagesuffix+'_selected_id',relatedModule);
						}
						updateParentCheckbox(obj,imagesuffix);
					}
				}
        }
	);
}

function hideEMAILMakerRecipientsListBlock(target, imagesuffix) {
	
	var showdata = 'show_'+imagesuffix;
	var showdata_element = $(showdata);
	
	var hidedata = 'hide_'+imagesuffix;
	var hidedata_element = $(hidedata);
	
	var target_element = $(target);
	if(target_element){
		target_element.hide();
	}
	hidedata_element.hide();
	showdata_element.show();
	//$('delete_'+imagesuffix).hide();
}

function disableEMAILMakerRecipientsListBlock(urldata,target,imagesuffix){
	var showdata = 'show_'+imagesuffix;
	var showdata_element = $(showdata);

	var hidedata = 'hide_'+imagesuffix;
	var hidedata_element = $(hidedata);

	var indicator = 'indicator_'+imagesuffix;
	var indicator_element = $(indicator);
	indicator_element.show();
	
	var target_element = $(target);
	new Ajax.Request(
		'index.php',
        {queue: {position: 'end', scope: 'command'},
                method: 'post',
                postBody: urldata,
                onComplete: function(response) {
					var responseData = trim(response.responseText);
					target_element.hide();
					//$('delete_'+imagesuffix).hide();
      				hidedata_element.hide();
					showdata_element.show();
      				indicator_element.hide();
				}
        }
	);
}
{/literal}
</script>
                            
<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
<tr>
	<td class="big" nowrap><strong>{$MOD.LBL_RECIPIENTS}</strong> <img id="indicator_EMAILMaker_Recipients" style="display:none;" src="{'vtbusy.gif'|@vtiger_imageurl:$THEME}" border="0" align="absmiddle" /></td>
</tr>
</table>

<table border=0 cellspacing=0 cellpadding=0 width=100% class="small" 
style="border-bottom:1px solid #999999;padding:5px; background-color: #eeeeff;">
<tr>
	<td align="left">{$NAVIGATION.0}</td>
	<td align="right">
    {$MOD.LBL_SENT_EMAIL}:&nbsp;
    <select id="sent_mail_selectbox" onChange="changeEmailMakerSelectBox();" class="small">
    <option value="">{$APP.LBL_ALL}</option>
    <option value="1" {if $SENT_MAIL_SELECTBOX eq "1"}selected{/if}>{$APP.LBL_YES}</option>
    <option value="0" {if $SENT_MAIL_SELECTBOX eq "0"}selected{/if}>{$APP.LBL_NO}</option>
    </select>
    &nbsp;&nbsp;
    Open:&nbsp;<select id="open_mail_selectbox" onChange="changeEmailMakerSelectBox();" class="small">
    <option value="">{$APP.LBL_ALL}</option>
    <option value="1" {if $OPEN_MAIL_SELECTBOX eq "1"}selected{/if}>{$APP.LBL_YES}</option>
    <option value="0" {if $OPEN_MAIL_SELECTBOX eq "0"}selected{/if}>{$APP.LBL_NO}</option>
    </select>
    {$NAVIGATION.1} 
    </td>
	<td align="right">&nbsp;</td>
</tr>
</table>

<table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
    <tr>
        <td width=2% class="lvtCol">#</td>
        {*<td width=3% class="lvtCol">Select</td>*}
        {foreach item=header_data key=header_coll from=$TABLE_HEADER}
        <td class="lvtCol">{$header_data}</td>
        {/foreach}
        <td width=3% class="lvtCol">{$APP.LBL_ACTION}</td>
    </tr>
    {foreach name=recipientslist item=recipient key=recipientid from=$RECIPIENTS}
    <tr>
        <td class="listTableRow small" valign=middle>{$smarty.foreach.recipientslist.iteration}</td>
        {*<td class="listTableRow small" valign=middle><input type="checkbox" class=small name="selected_id" value="12"></td>*}
        <td class="listTableRow small" valign=middle>{$recipient.recipient_name}</b></a></td>
        <td class="listTableRow small" valign=middle><a href="javascript:;" onclick="ShowEmail('{$recipient.activityid}');">{$recipient.subject}</a></b></a></td>
        <td class="listTableRow small" valign=middle>{$recipient.related_to}</td>
        <td class="listTableRow small" valign=middle>{$recipient.email_sent}</a></td>
        <td class="listTableRow small" valign=middle>{$recipient.is_sent}{if $recipient.error neq ""} <i>({$recipient.error})<i>{/if}</td>
        <td class="listTableRow small" valign=middle>{$recipient.access_count}</a></td>
        <td class="listTableRow small" valign=middle>{$recipient.actions}</a></td>
    </tr> 
    {/foreach}
</table>
                    
                    