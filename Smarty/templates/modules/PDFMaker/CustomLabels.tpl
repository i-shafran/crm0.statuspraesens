{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script language="javascript" src="include/js/dtlviewajax.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">loadPDFCSS();</script>
{if $VTIGER_VERSION < '5.4.0'}
    <script language="javascript" type="text/javascript" src="modules/PDFMaker/jQuery/jquery-1.10.2.min.js"></script>
{/if}

<span id="crmspanid" style="display:none;position:absolute;z-index:10000;"  onmouseover="show('crmspanid');">
	<a class="link"  align="right" href="javascript:;">{$APP.LBL_EDIT_BUTTON}</a>
</span>

<br />
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
	<td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>

	<div align=center>
    {include file='SetMenu.tpl'}
    <table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
    <tbody>
    	<tr>
    		<td rowspan="2" valign="top" width="50"><img src="{'quickview.png'|@vtiger_imageurl:$THEME}" alt="{$MOD.LBL_USERS}" title="{$MOD.LBL_USERS}" border="0" height="48" width="48"></td>
    		<td class="heading2" valign="bottom">

    		<b><a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{'VTLIB_LBL_MODULE_MANAGER'|@getTranslatedString:'Settings'}</a> >
    	<a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=PDFMaker&parenttab=Settings">{'PDFMaker'|@getTranslatedString:'PDFMaker'}</a> >
    		{$MOD.LBL_CUSTOM_LABELS}
    	</tr>

    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_CUSTOM_LABELS_DESC}</td>
    	</tr>
    </tbody>
    </table>
    <br />

    <div style="padding:10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr class="small">
                <td><img src="{'prvPrfTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
                <td class="prvPrfTopBg" width="100%"></td>
                <td><img src="{'prvPrfTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
            </tr>
        </table>

        <form name="custom_labels" action="index.php" method="post" onSubmit="return validate(this);">
        <input type="hidden" name="module" value="PDFMaker" />
        <input type="hidden" name="action" value="CustomLabels" />
        <input type="hidden" name="mode" value="save" />
        <input type="hidden" name="newItems" value="" />
        <table class="prvPrfOutline" border="0" cellpadding="10" cellspacing="0" width="100%">
            <tr><td>
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td valign="top" width="20px"><img src="{'prvPrfHdrArrow.gif'|@vtiger_imageurl:$THEME}"> </td>
                        <td class="prvPrfBigText"><b> {$MOD.LBL_DEFINE_CUSTOM_LABELS} </b></td>
                    </tr>
                </table>
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td>
                            <input type="button" value="{$APP.LBL_DELETE_BUTTON_LABEL}" class="crmButton small delete" onclick="confirm_delete();"/>
                        </td>
                        <td align="right">
                            <input type="button" value="{$APP.LBL_ADD_NEW}" class="crmbutton small create" onclick="AddLblTblRow();" />
                            &nbsp;
                            <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" />
                            &nbsp;
                            <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                        </td>
                    </tr>
                </table>

                <table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%" id="lbltbl">
                    <tr>
                        <th class="colHeader pm_colHeader" width="4%" align="center"><input type="checkbox" name="chx_all" onclick="checkedAll(this);"/></th>
                        <th class="colHeader pm_colHeader" width="30%">{$MOD.LBL_KEY}</th>
                        <th class="colHeader pm_colHeader" width="50%">{$MOD.LBL_CURR_LANG_VALUE} ({$CURR_LANG.label})</th>
                        <th class="colHeader pm_colHeader" width="16%" align="center">{$MOD.LBL_OTHER_LANG_VALUES}</th>
                        {*{foreach key=mlang_id item=mlang_value from=$LANGUAGES name=mlang_foreach}
                            <th class="colHeader pm_colHeader">{$mlang_value.label}</th>
                        {/foreach}*}
                    </tr>
                    <script type="text/javascript" language="javascript">var existingKeys = new Array();</script>
                    {assign var="lang_id" value=$CURR_LANG.id}
                    {foreach key=label_id item=label_value from=$LABELS name=lbl_foreach}
                        <tr>
                            <td class="cellLabel" align="center">
                                <input type="checkbox" name="chx_{$label_id}" id="chx_{$smarty.foreach.lbl_foreach.index}"/>
                            </td>
                            <td class="cellLabel" style="font-weight:bold;">
                                {$label_value.key}
                                <input type="hidden" name="lblKey{$label_id}" id="lblKey{$label_id}" value="{$label_value.key}" />
                                <script type="text/javascript" language="javascript">
                                    existingKeys[{$smarty.foreach.lbl_foreach.index}] = '{$label_value.key}';
                                </script>
                            </td>
                            
                            <td class="cellText" align="left" id="mouseArea_{$label_id}_{$lang_id}" onmouseover="hndMouseOver('1','{$label_id}_{$lang_id}');" onmouseout="fnhide('crmspanid');" valign="top">
                                &nbsp;&nbsp;<span id="dtlview_{$label_id}_{$lang_id}">{$label_value.lang_values.$lang_id}</span>
                                 <div id="editarea_{$label_id}_{$lang_id}" style="display:none;">
                                	<input class="detailedViewTextBox" onFocus="this.className='detailedViewTextBoxOn'" onBlur="this.className='detailedViewTextBox'" type="text" id="txtbox_{$label_id}_{$lang_id}" name="{$label_id}_{$lang_id}" maxlength='100' value="{$label_value.lang_values.$lang_id}"></input>
                                    <br><input name="button_{$label_id}_{$lang_id}" type="button" class="crmbutton small save" value="{$APP.LBL_SAVE_LABEL}" onclick="saveEdited('{$label_id}_{$lang_id}');fnhide('crmspanid');"/> {$APP.LBL_OR}
                                    <a href="javascript:;" onclick="hndCancel('dtlview_{$label_id}_{$lang_id}','editarea_{$label_id}_{$lang_id}','{$label_id}_{$lang_id}')" class="link">{$APP.LBL_CANCEL_BUTTON_LABEL}</a>
                                </div>
                            </td>
                            
                            <td class="cellText" align="center">
                                <a href="javascript:void(0)" alt="" id="other_langs_{$label_id}" onclick="showOtherLangs(this, '{$label_id}');">{$MOD.LBL_OTHER_VALS}</a>
                            </td>
                        </tr>
                        
                    {foreachelse}
                        <tr>
                            <td colspan="3" class="cellText" align="center" style="padding:10px;"><strong>{$MOD.LBL_NO_ITEM_FOUND}</strong></td>
                        </tr>
                    {/foreach}
                </table>
                
                <div id="otherLangsDiv" style="display:none; width:350px; position:absolute;" class="layerPopup"></div>
                </div>
                <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                    <tr>
                        <td>
                            <input type="button" value="{$APP.LBL_DELETE_BUTTON_LABEL}" class="crmButton small delete" onclick="confirm_delete();"/>
                        </td>
                        <td align="right">
                            <input type="button" value="{$APP.LBL_ADD_NEW}" class="crmbutton small create" onclick="AddLblTblRow();" />
                            &nbsp;
                            <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" />
                            &nbsp;
                            <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                        </td>
                    </tr>
                </table>
            </td></tr>
        </table>
        </form>
    </div>

    </div>
	</td>
    <td valign="top"><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
    </tr>
</tbody>
</table>
<br />

<script type="text/javascript" language="javascript">
var totalNoOfRows = {$smarty.foreach.lbl_foreach.total};
{literal}
var newItemCounter = 0;

function AddLblTblRow()
{
    var tbl = document.getElementById('lbltbl');
    
    //in case there is no item then hide the first row with notification about no item
    if(tbl.rows.length == 2 && (document.getElementById('chx_0') == null || document.getElementById('chx_0') == undefined))
    {
        tbl.deleteRow(1);
    }
    var rowCount = tbl.rows.length;
    var newRow = tbl.insertRow(rowCount);
    var newChxCell = newRow.insertCell(0);
    var newKeyCell = newRow.insertCell(1);
    var newValCell = newRow.insertCell(2);
    newChxCell.className = 'cellLabel';
    newChxCell.setAttribute('align', 'center');
    newChxCell.innerHTML = '<input type="checkbox" name="chxn_'+ newItemCounter +'" id="chx_'+ totalNoOfRows +'"/>';

    newKeyCell.className = 'cellLabel';
    newKeyCell.innerHTML = '<strong>C_&nbsp;</strong><input type="text" name="newLblKey'+ newItemCounter +'" value="" class="detailedViewTextBox" onFocus="this.className=\'detailedViewTextBoxOn\'" onBlur="this.className=\'detailedViewTextBox\'"/>';

    newValCell.className = 'cellText';
    newValCell.colSpan = 2;
    newValCell.innerHTML = '<input type="text" name="newLblVal'+ newItemCounter +'" class="detailedViewTextBox" onFocus="this.className=\'detailedViewTextBoxOn\'" onBlur="this.className=\'detailedViewTextBox\'"/>';

    document.custom_labels.elements['newItems'].value = newItemCounter + 1;

    totalNoOfRows++;
    newItemCounter++;
}

function validate(oForm)
{
    if(newItemCounter < 1)
        return false;

    if(existingKeys != 'undefined')
    {
        
        var keysInValidated = '';
        var keysName = '';
        var emptyVal = '';
        var i;
        for(i = 0; i < newItemCounter; i++)
        {
            var newLblKey = oForm.elements['newLblKey' + i].value;
            var newLblVal = oForm.elements['newLblVal' + i].value;
            var searchKey = 'C_' + newLblKey;
            if( newLblKey != '' && newLblVal != '' && (existingKeys.indexOf(searchKey) != -1 || areNewKeysSame(i,oForm) == true) )
            {
                keysInValidated += '\n' + searchKey;
            }
            //else if( newLblKey != '' && newLblVal != '' && newLblKey.substring(0,2) != "C_")
            //{
            //    keysName += '\n' + newLblKey;
            //}
            //else if(newLblKey != '' && newLblVal == '')
            //{
            //    emptyVal += '\n' + searchKey;
            //}
        }
        
        {/literal}
        if(keysInValidated != '')
        {ldelim}
            alert('{$MOD.LBL_KEY_EXISTS}' + keysInValidated );
            return false;
        {rdelim}
        
        if(keysName != '')
        {ldelim}
            alert('{$MOD.LBL_KEY_NAME_PREFIX}' + keysName );
            return false;
        {rdelim}
        
        if(emptyVal != '')
        {ldelim}
            alert('{$MOD.LBL_KEY_HAS_EMPTY_VAL}' + emptyVal );
            return false;
        {rdelim}

        {literal}
    }
    
    return true;
}

function areNewKeysSame(idx,oForm)
{
    var i;
    var checkKey = oForm.elements['newLblKey' + idx].value;
    for(i = 0; i < newItemCounter; i++)
    {
        if(i == idx)
            continue;

        var newLblKey = oForm.elements['newLblKey' + i].value;
        if(checkKey == newLblKey)
            return true;
    }
    
    return false;
}

function checkedAll(oTrigger)
{
    for(i = 0; i < totalNoOfRows; i++)
    {
        var tmpChx = document.getElementById('chx_' + i);
        if(tmpChx != 'undefined')
        {
            tmpChx.checked = oTrigger.checked;
        }
    }
}

function confirm_delete()
{
    var toDelete = 0;
    for(i = 0; i < totalNoOfRows; i++)
    {
        var tmpChx = document.getElementById('chx_' + i);
        if(tmpChx != 'undefined')
        {
            if(tmpChx.checked == true)
                toDelete++;
        }
    }
    
    if(toDelete > 0)
    {
        {/literal}
        var confRes = confirm('{$APP.DELETE_CONFIRMATION}' + toDelete + '{$APP.RECORDS}');
        {literal}
        if(confRes == true)
        {
            document.custom_labels.mode.value = 'delete';
            document.custom_labels.submit();
        }
    }
}

function saveEdited(inputName)
{
    var tmpArr = inputName.split('_');
    var label_id  = tmpArr[0];
    var lang_id = tmpArr[1];
    
    var tagValue = document.getElementById('txtbox_'+inputName).value;
    //var tagKey = document.getElementById('lblKey'+label_id).value;
    //if(tagValue == '')
    //{
    //    {/literal}
    //    alert('{$MOD.LBL_KEY_HAS_EMPTY_VAL} ' + tagKey );
    //    return false;
        {literal}
    //}
    
    var dtlView = "dtlview_"+ inputName;
	var editArea = "editarea_"+ inputName;
    new Ajax.Request(
            'index.php',
            {queue: {position: 'end', scope: 'command'},
                    method: 'post',
                    postBody: "module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=custom_labels_edit&label_id="+label_id+"&lang_id="+lang_id+"&label_value="+tagValue,
                    onComplete: function(response)
                    {;}
            }
    );
    
    document.getElementById(dtlView).innerHTML = tagValue;
    showHide(dtlView,editArea);
	itsonview=false;
}

function hideOtherLangs()
{
    itsonview=false;
    fninvsh('otherLangsDiv');
}

function showOtherLangs(rootElm, label_id)
{
    new Ajax.Request(
            'index.php',
            {queue: {position: 'end', scope: 'command'},
                    method: 'post',
                    postBody: "module=PDFMaker&action=PDFMakerAjax&file=CustomLabels&mode=otherLangs&label_id="+label_id,
                    onComplete: function(response)
                    {
                      jQuery("#otherLangsDiv").html(response.responseText);
                      jQuery("#otherLangsDiv").find("script").each(function(i, val) {
                          eval(jQuery(this).text());
                      });
                      
                      fnvshobj(rootElm,'otherLangsDiv');

                      var otherLangsDiv = document.getElementById('otherLangsDiv');
                      var otherLangsDivHandle = document.getElementById('otherLangsDivHandle');
                      Drag.init(otherLangsDivHandle,otherLangsDiv);
                    }
            }
    );
}
{/literal}
</script>
