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

<div>
	<table width="100%" cellpadding="3" cellspacing="1" border="0" class="lvt small">
	
		{assign var="_TRSTARTED" value=false}
		
		{foreach item=RESULT from=$RESULTS name=NUMBERSECTION}
		
		{if $smarty.foreach.NUMBERSECTION.index % 4 == 0}
		
			{* Close the tr if it was started last *}		
			{if $_TRSTARTED}
				</tr>
				{assign var="_TRSTARTED" value=false}
			{/if}
			
			<tr class="lvtColData" onmouseover="this.className='lvtColDataHover'" onmouseout="this.className='lvtColData'" >
			{assign var="_TRSTARTED" value=true}
		{/if}
		
		{assign var="_TDBGCOLOR" value="#FFFFFF"}
		
		{if $RESULT.status == 'Processing'}
			{assign var="_TDBGCOLOR" value="#FFFCDF"}
		{elseif $RESULT.status == 'Delivered'}
			{assign var="_TDBGCOLOR" value="#90EE90"}			
		{elseif $RESULT.status eq 'Failed'}
			{assign var="_TDBGCOLOR" value="#FF6347"}
		{/if}
		
                {* SalesPlatform.ru begin : status message added*}
		<td nowrap="nowrap" bgcolor="{$_TDBGCOLOR}" width="25%" title="{$RESULT.statusmessage|getTranslatedString:$MODULE}">{$RESULT.to_url}</td>
		{* <td nowrap="nowrap" bgcolor="{$_TDBGCOLOR}" width="25%">{$RESULT.to_url}</td> *}
                {* SalesPlatform.ru end *}
		
		{/foreach}
	
		{* Close the tr if it was started last *}		
		{if $_TRSTARTED}
			</tr>
			{assign var="_TRSTARTED" value=false}
		{/if}
			
			
	</table>
</div>