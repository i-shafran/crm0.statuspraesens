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
<script>window.onresize = window.resizeTo(650,510);</script>

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
            <td class="genHeaderSmall" width="90%" align="center">{'Profile'|getTranslatedString:$MODULE}</td>
        </tr>
    </table><br>
            
    <table align="center" width="95%" border="2" cellspacing="0" cellpadding="0" class="small">
        <tr>
            <td width="10%" height="30px"><big>{'First name:'|getTranslatedString:$MODULE}</big></td>  
            <td width="50%" height="30px"><big>{$FIRSTNAME}</big></td> 
            <td width="40%" height="30px" rowspan="7" align="center"><img src="{$PHOTOURL}" width="102%" height="700%" align="center"/></td> 
        </tr> 
        <tr>
            <td width="25%" height="30px"><big>{'Last name:'|getTranslatedString:$MODULE}</big></td>
            <td><big>{$LASTNAME}</big></td>
            <td></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Social net:'|getTranslatedString:$MODULE}</big></td>  
            <td><big>{$PROVIDER}</big></td>
            <td></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'User ID:'|getTranslatedString:$MODULE}</big></td>
            <td><big>{$IDENTIFIER}</big></td> 
            <td></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Web site:'|getTranslatedString:$MODULE}</big></td>
            <td><big>{$WEBSITEURL}</big></td>
            <td></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Birthday:'|getTranslatedString:$MODULE}</big></td>
            {if $BIRTHYEAR eq '' and $BIRTHMONTH eq ''}
            <td><big> </big></td>
            {elseif $BIRTHYEAR eq ''}
            <td><big>{$BIRTHDAY}.{$BIRTHMONTH}</big></td>
            {else}
            <td><big>{$BIRTHDAY}.{$BIRTHMONTH}.{$BIRTHYEAR}</big></td>
            {/if}
            <td></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Gender:'|getTranslatedString:$MODULE}</big></td>
            <td><big>{$GENDER|getTranslatedString:$MODULE}</big></td>
            <td></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'e-mail:'|getTranslatedString:$MODULE}</big></td>  
            <td><big>{$EMAIL}</big></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Mobile phone:'|getTranslatedString:$MODULE}</big></td> 
            <td><big>{$MOBILEPHONE}</big></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Home phone:'|getTranslatedString:$MODULE}</big></td> 
            <td><big>{$HOMEPHONE}</big></td>
        </tr>
        <tr>
            <td width="25%" height="30px"><big>{'Region:'|getTranslatedString:$MODULE}</big></td>
            <td><big>{$REGION}</big></td>
        </tr>
    </table>
        
    <div style="position:absolute; bottom:0px;left:0%;right:0%">
        <form action="index.php" method="post">
            <input type="hidden" name="module" value="SPSocialConnector"/>
            <input type="hidden" name="action" value="SPSocialConnectorAjax"/>
            <input type="hidden" name="ajax" value="true"/>
            <input type="hidden" name="file" value="SPSocialConnectorAddData"/>
            <table width="100%" cellpadding="5" cellspacing="0" border="0" class="layerPopupTransport">
                <tr>
                    <td class="small" align="center">
                        <input type="hidden" name="sourcemodule" value="{$SOURCEMODULE}"/>
                        <input type="hidden" name="recordid" value="{$RECORDID}"/>
                        <input type="hidden" name="firstName" value="{$FIRSTNAME}"/>
                        <input type="hidden" name="lastName" value="{$LASTNAME}"/>
                        <input type="hidden" name="webSite" value="{$WEBSITEURL}"/>
                        <input type="hidden" name="birthDay" value="{$BIRTHDAY}"/>
                        <input type="hidden" name="birthMonth" value="{$BIRTHMONTH}"/>
                        <input type="hidden" name="birthYear" value="{$BIRTHYEAR}"/>
                        <input type="hidden" name="email" value="{$EMAIL}"/>
                        <input type="hidden" name="mobilePhone" value="{$MOBILEPHONE}"/>
                        <input type="hidden" name="homePhone" value="{$HOMEPHONE}"/>
                        <input type="hidden" name="region" value="{$REGION}"/>
                        
                        <input type="submit" class="small crmbutton save" value="{$APP.LBL_DOWNLOAD}"/>
                        <input type="button" class="small crmbutton delete" onclick="javascript:window.close();" value="    {$APP.LBL_LOGOUT}    "/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</table>
</body>