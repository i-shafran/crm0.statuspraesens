{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
	<tr>
		<td class="big"><strong>{$MOD.LBL_PROPERTIES}</strong></td>
	</tr>
</table>
	
<table border=0 cellspacing=0 cellpadding=5 width=100% >
	<tr>
		<td width=20% class="small cellLabel"><strong>{$MOD.LBL_DRIP_NAME}:</strong></td>
		<td width=80% class="small cellText"><strong>{$DRIPNAME}</strong></td>
    </tr>
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DESCRIPTION}:</strong></td>
		<td class="cellText small" valign=top>{$DESCRIPTION}</td>
	</tr>
    {****************************************** email sorce module *********************************************}	
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_MODULENAMES}:</strong></td>
		<td class="cellText small" valign=top>{$SELECTMODULE}</td>
	</tr>
    <tr>
        <td width="200px" valign=top class="small cellLabel"><strong>{$MOD.LBL_DRIP_OWNER}:</strong></td>
		<td class="cellText small">{$DRIP_OWNER}</td>
    </tr>
    <tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_SHARING_TAB}:</strong></td>
		<td class="cellText small" valign=top>{$SHARINGTYPE}</td>
	</tr>
</table> 
