{*<!--
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/
-->*}

<link rel="stylesheet" type="text/css" href="{$THEME_PATH}style.css">
<script language="JavaScript" type="text/javascript" src="include/js/ListView.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/general.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/Inventory.js"></script>
<script language="JavaScript" type="text/javascript" src="include/js/json.js"></script>
<!-- vtlib customization: Javascript hook -->
<script language="JavaScript" type="text/javascript" src="include/js/vtlib.js"></script>
<!-- END -->
<script language="JavaScript" type="text/javascript" src="include/js/{php} echo $_SESSION['authenticated_user_language'];{/php}.lang.js?{php} echo $_SESSION['vtiger_version'];{/php}"></script>
<script language="javascript" type="text/javascript" src="include/scriptaculous/prototype.js"></script>
<script type='text/javascript' src='modules/com_vtiger_workflow/resources/jquery-1.2.6.js'></script>
<script>window.onresize = window.resizeTo(420,230);</script>

<body  onload=set_focus() class="small" marginwidth=0 marginheight=0 leftmargin=0 topmargin=0 bottommargin=0 rightmargin=0>
{* SalesPlatform.ru begin *}
<form name="SendMail"><div id="sendmail_cont" style="z-index:100001;position:absolute;"></div></form>
{* SalesPlatform.ru end *}
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mailClient mailClientBg">
    <tr>
        <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        {if $recid_var_value neq ''}
                        <td class="moduleName" width="80%" style="padding-left:10px;">{$APP[$MODULE]}&nbsp;{$APP.LBL_RELATED_TO}&nbsp;{$APP[$PARENT_MODULE]}</td>
                        {else}
                            {if $RECORD_ID}
                        <td class="moduleName" width="80%" style="padding-left:10px;"><a href="javascript:;" onclick="window.history.back();">{$APP[$MODULE]}</a> > {$PRODUCT_NAME}</td>
                            {else}
                        <td class="moduleName" width="80%" style="padding-left:10px;">{$APP[$MODULE]}</td>
                            {/if}
                        {/if}
                            <td  width=30% nowrap class="componentName" align=right>{$APP.VTIGER}</td>
                    </tr>
            </table>
        </td>
    </tr>
        
    <table width="100%" cellpadding="5" cellspacing="0" border="0">
        <tr>
            <td class="genHeaderSmall" width="90%" align="center">{'Status'|getTranslatedString:$MODULE}</td>
        </tr>
    </table><br>
        
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="small">
        {if $FL_EMPTY_FIELD}
        <tr>
            <td><big>{'Error: empty URL field'|getTranslatedString:$MODULE}</big></td>            
        </tr>
        {else}
            {foreach item=data from=$RES}
        <tr>
            <td><big>{$data|getTranslatedString:$MODULE}</big></td>
        </tr>
            {/foreach}
        {/if}
    </table>
            
    <div style="position:absolute; bottom:0px;left:0%;right:0%">
        <table width="100%" cellpadding="5" cellspacing="0" border="0" class="layerPopupTransport">
            <tr>
                <td class="small" align="center">
                    <input type="button" class="small crmbutton delete" onclick="javascript:window.close();" value="{$APP.LBL_LOGOUT}"/>
                </td>
            </tr>
        </table>
    </div>
</table>
</body>