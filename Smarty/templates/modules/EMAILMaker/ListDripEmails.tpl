{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*} 
{if $IS_DRIP_ACTIVE eq "true"}

<table border=0 cellspacing=0 cellpadding=2 width=100% class="small" style="padding:5px 0px 5px 0px">
    <tr>
        <td class="small" width="150px">{if $DELETE eq "permitted"}<input type="submit" value="{$MOD.LBL_DELETE}" onclick="return massDelete();" class="crmButton delete small">{/if}</td>
        <td align="right">
        {if $EDIT eq "permitted"}
        <input class="crmButton create small" type="submit" value="{$MOD.LBL_ADD_DRIP}" name="profile"  onclick="this.form.action.value='EditDripEmails'; this.form.parenttab.value='Tools'">&nbsp;
        {/if}
        </td>                        
    </tr>
</table>

<table border=0 cellspacing=1 cellpadding=0 width=100% class="lvtBg">
	<tr>
		<td>
            <table border=0 cellspacing=1 cellpadding=3 width=100% class="lvt small">
                <tr height="25px">
                    <td width=2% class="lvtCol">#</td>
                    <td width=3% class="lvtCol">{$MOD.LBL_LIST_SELECT}</td>
                    <td width=20% class="lvtCol">{$MOD.LBL_DRIP_NAME}</td>
                    <td width=20% class="lvtCol">{$MOD.LBL_MODULENAMES}</td>
                    <td width=45% class="lvtCol">{$MOD.LBL_DESCRIPTION}</td>
                    {if $EDIT eq "permitted"}<td width=5% class="lvtCol">{$MOD.LBL_ACTION}</td>{/if}
                </tr>
                {foreach item=template name=mailmerge from=$EMAILTEMPLATES}
                <tr bgcolor=white onMouseOver="this.className='lvtColDataHover'" onMouseOut="this.className='lvtColData'" id="row_{$smarty.foreach.mailmerge.index}">
                    <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$smarty.foreach.mailmerge.iteration}</td>
                    <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))"><input type="checkbox" class=small name="selected_id" value="{$template.dripid}"></td>
                    <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$template.dripname}</td>
                    <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$template.module}</td>
                    <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$template.description}&nbsp;</td>
                    {if $EDIT eq "permitted"}<td class="listTableRow small" valign=top nowrap>{$template.edit}</td>{/if}
                </tr>
                {foreachelse}
                <tr>
                    <td style="background-color:#efefef;height:340px" align="center" colspan="6">
                        <div style="border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 45%; position: relative; z-index: 10000000;">
                            <table border="0" cellpadding="5" cellspacing="0" width="98%">
                            <tr><td rowspan="2" width="25%"><img src="{'empty.jpg'|@vtiger_imageurl:$THEME}" height="60" width="61"></td>
                                <td style="border-bottom: 1px solid rgb(204, 204, 204);" nowrap="nowrap" width="75%" align="left">
                                    <span class="genHeaderSmall">{$APP.LBL_NO} {$MOD.LBL_DRIP_EMAILS} {$APP.LBL_FOUND}</span>
                                </td>
                            </tr>
                            {if $EDIT eq "permitted"}
                            <tr>
                                <td class="small" align="left" nowrap="nowrap">{$APP.LBL_YOU_CAN_CREATE} {$APP.LBL_A} {$MOD.LBL_DRIP_EMAILS} {$APP.LBL_NOW}. {$APP.LBL_CLICK_THE_LINK}:<br>
                                    &nbsp;&nbsp;-<a href="index.php?module=EMAILMaker&action=EditDripEmails&parenttab=Tools">{$APP.LBL_CREATE} {$APP.LBL_A} {$MOD.LBL_DRIP_EMAILS}</a><br>
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
    </tr>            
</table>
{else}
<br><br><center>{$MOD.LBL_DELAY_INFO}<center>    
{/if}        