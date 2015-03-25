{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
{* OTHER DEBUGGING INFO *}
{if $EXPORTING eq 'true'}
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset={$CHARSET}">
    	<title></title>
    	<style type="text/css">
    	{literal}
    	body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        .tableHeading{
            background-color:#DEDEDE;
            border:1px solid #DEDEDE;
        }
        .big {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 18px;
            color: #000000;
            font-weight:bold;
        }
        .dvtCellLabel, .cellLabel,.cellLabelnew{
        	background-color:#F7F7F7;
        	border-bottom:1px solid #DEDEDE;
        	border-left:1px solid #DEDEDE;
        	border-right:1px solid #DEDEDE;
        	color:#545454;
        	padding-left:10px;
        	padding-right:10px;
        	white-space:nowrap;
        }
        .dvtCellInfo, .cellInfo {
        	padding-left:10px;
        	padding-right:10px;
        	border-bottom:1px solid #dedede;
        	border-right:1px solid #dedede;
        	border-left:1px solid #dedede;
        }
        {/literal}
        </style>
    </head>
    <body>
{/if}

<table width="100%" cellspacing="0" cellpadding="5" border="0" class="tableHeading">
	<tr>
        <td class="big" width="98%"><strong>{$MOD.LBL_DEBUGGING_INFO}</strong></td>
    </tr>
</table>
<table cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td class="dvtCellLabel" width="25%" align="right">{$MOD.LBL_DBG_MEMLIMIT}</td>
        <td class="dvtCellInfo" width="73%" align="left">
            <strong>{$MOD.LBL_ORIGINAL_VAL}: </strong>{$DBG_MEMLIMIT_OLD}&nbsp;&nbsp;&nbsp;
            <strong>{$MOD.LBL_NEW_VAL}: </strong>{$DBG_MEMLIMIT_NEW}
        </td>
        <td class="dvtCellInfo" width="2%">{$DBG_MEMLIMIT_NOTIF}</td>
    </tr>
    <tr>
        <td class="dvtCellLabel" align="right">{$MOD.LBL_DBG_MAXINVARS}</td>
        <td class="dvtCellInfo" align="left">
            {$DBG_MAXINVARS}
        </td>
        <td class="dvtCellInfo">{$DBG_MAXINVARS_NOTIF}</td>
    </tr>
    <tr>
        <td class="dvtCellLabel" align="right">{$MOD.LBL_DBG_MAXEXTIME}</td>
        <td class="dvtCellInfo" align="left">
            {$DBG_MAXEXTIME}
        </td>
        <td class="dvtCellInfo">{$DBG_MAXEXTIME_NOTIF}</td>
    </tr>
    <tr>
        <td class="dvtCellLabel" align="right">{$MOD.LBL_DBG_SUHOSIN}</td>
        <td class="dvtCellInfo" align="left" colspan="2">
            {if $DBG_SUHOSIN neq "true"}
                <strong>{$MOD.LBL_DISABLED}</strong>&nbsp;&nbsp;&nbsp;
            {else}
                <strong>{$MOD.LBL_ENABLED}</strong>&nbsp;&nbsp;&nbsp;
            {/if}

            {if $DBG_SUHOSIN neq "false"}
                <strong>{$MOD.LBL_REQUEST_MV}: </strong>{$DBG_SUHOSIN_REQ_MAX_VARS}&nbsp;&nbsp;&nbsp;
                <strong>{$MOD.LBL_POST_MV}: </strong>{$DBG_SUHOSIN_POST_MAX_VARS}
            {/if}
        </td>
        {*<td class="dvtCellInfo">{$DBG_SUHOSIN_NOTIF}</td>*}
    </tr>
    <tr>
        <td class="dvtCellLabel" align="right">{$MOD.LBL_DBG_VERSIONS}</td>
        <td class="dvtCellInfo" align="left" colspan="2">
            <strong>{$APP.VTIGER}: </strong>{$DBG_VTIGER_VERSION}&nbsp;&nbsp;&nbsp;
            <strong>{$MOD.PDF_MAKER}: </strong>{$DBG_PDFMAKER_VERSION}&nbsp;&nbsp;&nbsp;
            <strong>{$MOD.LBL_MPDF}: </strong>{$DBG_MPDF_VERSION}&nbsp;&nbsp;&nbsp;
            <strong>{$MOD.LBL_PHP}: </strong>{$DBG_PHP_VERSION}
        </td>
    </tr>
</table>

{if $DBG_ITEMS_PERMS|@count gt 0}
<br />
{* FILES PERMISSIONS *}
<table width="100%" cellspacing="0" cellpadding="5" border="0" class="tableHeading">
	<tr><td class="big"><strong>{$MOD.LBL_DEBUGGING_FILES_PERM}</strong></td></tr>
</table>
<table cellpadding="5" cellspacing="0" width="100%">
    {foreach item=fileItem from=$DBG_ITEMS_PERMS key=fileItemDesc}
    <tr>
        <td class="dvtCellLabel" width="25%" align="right">{$fileItemDesc}</td>
        <td class="dvtCellInfo" width="73%" align="left">{$MOD.LBL_DBG_FP_NOT_WRITABLE}</td>
        <td class="dvtCellInfo" width="2%"><img src="themes/images/no.gif" title="{$MOD.LBL_NOT_WRITABLE}" alt="{$MOD.LBL_NOT_WRITABLE}"></td>
    </tr>
    {/foreach}
</table>
{/if}

{if $EXPORTING eq 'true'}
    </body>
</html>
{/if}