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

<div style="width: 400px;">

	<form method="POST" action="javascript:void(0);">
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" class="small mailClient">
	<tr>
                {* SalesPlatform.ru begin: SPSocialConnector localization *}
		<td colspan="2" class="mailClientWriteEmailHeader" width="90%" align="left">{'Import'|getTranslatedString:$MODULE}</td>
                {* SalesPlatform.ru end *}
	</table>
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" align="center">
	<tr>
		<td>
		
                        {* SalesPlatform.ru begin: SPSocialConnector localization *}
                        {'Enter URL'|getTranslatedString:$MODULE}<br/>
			{* Message:<br/> *}
                        {* SalesPlatform.ru end *}
			<input name="message" class="small" size="63" onkeyup="$('__compose_wordcount__').innerHTML=this.value.length;"></input>
		</td>
	<tr>
                {* SalesPlatform.ru begin: SPSocialConnector localization *}
		<td align="right"><span id="__compose_wordcount__">0</span> {'characters'|getTranslatedString:$MODULE} </td>
                {* SalesPlatform.ru end *}
	</tr>
	</table>
	
	<table width="100%" cellpadding="5" cellspacing="0" border="0" class="layerPopupTransport">
	<tr>
		<td class="small" align="center">
	
                        <input type="hidden" name="recordid" value="{$RECORDID}" />
			<input type="hidden" name="sourcemodule" value="{$SOURCEMODULE}" />
                        
			<input type="button" class="small crmbutton save" onclick="SPSocialConnectorCommon.LoadProfile(this.form); SPSocialConnectorCommon.hideEnterUrlWizard();" value="     {$APP.LBL_NEXT_BUTTON_LABEL}     "/>
			<input type="button" class="small crmbutton cancel" onclick="SPSocialConnectorCommon.hideEnterUrlWizard();" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"/>
		</td>
	</tr>
	</table>

	</form>
</div>