{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script>
function ExportTemplates()
{ldelim}
     window.location.href = "index.php?module=EMAILMaker&action=EMAILMakerAjax&file=ExportEmailTemplate&templates={$TEMPLATEID}";
{rdelim}

function change_modulesorce(first)
{ldelim}

{rdelim}
</script>
<!-- DISPLAY -->
<form action="index.php?module=EMAILMaker&action=SaveDripEmails" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
<input type="hidden" name="action" value="SaveDripEmails">
<input type="hidden" name="module" value="EMAILMaker">
<input type="hidden" name="retur_module" value="EMAILMaker">
<input type="hidden" name="return_action" value="">
<input type="hidden" name="dripid" value="{$SAVEDRIPID}">
<input type="hidden" name="parenttab" value="{$PARENTTAB}">
<table border=0 cellspacing=0 cellpadding=5 width=100%>
	<tr>
        <td valign=bottom><span class="dvHeaderText">&nbsp;
        {if $EMODE eq 'edit'}
            {if $DUPLICATE_DRIPNAME eq ""}
                {$MOD.LBL_EDIT} &quot;{$DRIPNAME}&quot;
            {else}  
                {$MOD.LBL_DUPLICATE} &quot;{$DUPLICATE_DRIPNAME}&quot;
            {/if}    
		{else}
			{$MOD.LBL_CREATING_NEW_DRIP_EMAILS}
		{/if}
        </span>
        <hr noshade size=1></td>
    </tr>
    <tr>
        <td class="small" style="text-align:center;">
           <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" onclick="return saveEmail();" >&nbsp;&nbsp;            			
           <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />            			
        </td>
    </tr>
</table>


<table border=0 cellspacing=0 cellpadding=10 width=100% >
<tr>
<td>
	<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
	<tr>
		<td class="big"><strong>{$MOD.LBL_PROPERTIES}</strong></td>
	</tr>
	</table>
	
	<table border=0 cellspacing=0 cellpadding=5 width=100% >
	<tr>
		<td width=20% class="small cellLabel"><strong>{$MOD.LBL_DRIP_NAME}:</strong></td>
		<td width=80% class="small cellText"><strong><input name="dripname" id="dripname" type="text" value="{$DRIPNAME}" class="detailedViewTextBox" tabindex="1"></strong></td>
    </tr>
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_DESCRIPTION}:</strong></td>
		<td class="cellText small" valign=top><input name="description" type="text" value="{$DESCRIPTION}" class="detailedViewTextBox" tabindex="2"></td>
	</tr>
    {****************************************** email sorce module *********************************************}	
	<tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_MODULENAMES}:</strong></td>
		<td class="cellText small" valign=top>
        <select name="modulename" id="modulename" class="classname" onChange="change_modulesorce(this);" {if $EMODE eq 'edit'}disabled{/if}>
        	{if $SELECTMODULE neq ""}
                {html_options  options=$MODULENAMES selected=$SELECTMODULE}
            {else}
                {html_options  options=$MODULENAMES}
            {/if}
        </select>
        </td>
	</tr>
    <tr>
        <td width="200px" valign=top class="small cellLabel"><strong>{$MOD.LBL_DRIP_OWNER}:</strong></td>
		<td class="cellText small">
			<select name="drip_owner" id="drip_owner" class="classname">
            		{html_options  options=$DRIP_OWNERS selected=$DRIP_OWNER}
            </select>
		</td>
    </tr>
    <tr>
		<td valign=top class="small cellLabel"><strong>{$MOD.LBL_SHARING_TAB}:</strong></td>
		<td class="cellText small" valign=top>
			<select name="sharing" id="sharing" class="classname" onchange="sharing_changed();">
                {html_options options=$SHARINGTYPES selected=$SHARINGTYPE}
            </select>
            
            <div id="sharing_share_div" style="display:none; border-top:2px dotted #DADADA; margin-top:10px; width:100%;">
                <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
					<td width="40%" valign=top class="cellBottomDotLinePlain small"><strong>{$CMOD.LBL_MEMBER_AVLBL}</strong></td>
					<td width="10%">&nbsp;</td>
					<td width="40%" class="cellBottomDotLinePlain small"><strong>{$CMOD.LBL_MEMBER_SELECTED}</strong></td>
				</tr>
				<tr>
					<td valign=top class="small">
						{$CMOD.LBL_ENTITY}:&nbsp;
						<select id="sharingMemberType" name="sharingMemberType" class="small" onchange="showSharingMemberTypes()">
						<option value="groups" selected>{$CMOD.LBL_GROUPS}</option>
						<option value="roles">{$CMOD.LBL_ROLES}</option>
						<option value="rs">{$CMOD.LBL_ROLES_SUBORDINATES}</option>
						<option value="users">{$CMOD.LBL_USERS}</option>
						</select>
                        <input type="hidden" name="sharingFindStr" id="sharingFindStr">&nbsp;
					</td>
					<td width="50">&nbsp;</td>
					<td class="small">&nbsp;</td>
				</tr>
          		<tr class="small">
					<td valign=top>{$CMOD.LBL_MEMBER} {$CMOD.LBL_OF} {$CMOD.LBL_ENTITY}<br>
						<select id="sharingAvailList" name="sharingAvailList" multiple size="10" class="small crmFormList"></select>
					</td>
					<td width="50">
						<div align="center">
							<input type="button" name="sharingAddButt" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="sharingAddColumn()" class="crmButton small"/><br /><br />
							<input type="button" name="sharingDelButt" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="sharingDelColumn()" class="crmButton small"/>
						</div>
					</td>
					<td class="small" style="background-color:#ddFFdd" valign=top>{$CMOD.LBL_MEMBER} {$CMOD.LBL_OF} &quot;{$GROUPNAME}&quot; <br>
						<select id="sharingSelectedColumns" name="sharingSelectedColumns" multiple size="10" class="small crmFormList">
						{foreach item=element from=$MEMBER}
						<option value="{$element.0}">{$element.1}</option>
						{/foreach}
						</select>
						<input type="hidden" name="sharingSelectedColumnsString" id="sharingSelectedColumnsString" value="" />
					</td>
				</tr>
				</table>
            </div>
		</td>
	</tr>
	</table> 					
</td>
</table>
<table border=0 cellspacing=0 cellpadding=5 width=100%>
<tr>
    <td class="small" style="text-align:center;">
       <input type="submit" value="{$APP.LBL_SAVE_BUTTON_LABEL}" class="crmButton small save" onclick="return saveEmail();" >&nbsp;&nbsp;            			
       <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />            			
    </td>
</tr>
</table>

<script>

function saveEmail()
{ldelim}
    var drip_name =  document.getElementById("dripname").value;

    var error = 0;

    if (drip_name == "")
    {ldelim}
       alert("{$MOD.LBL_DRIP_NAME}" + alert_arr.CANNOT_BE_EMPTY);
       error++;
    {rdelim}

    if(!CheckSharing())
    {ldelim}
        error++;
    {rdelim}

    if (error > 0)
       return false;
    else
       return true;
{rdelim}

var constructedOptionValue;
var constructedOptionName;

var roleIdArr=new Array({$ROLEIDSTR});
var roleNameArr=new Array({$ROLENAMESTR});
var userIdArr=new Array({$USERIDSTR});
var userNameArr=new Array({$USERNAMESTR});
var grpIdArr=new Array({$GROUPIDSTR});
var grpNameArr=new Array({$GROUPNAMESTR});

sharing_changed();


//Sharing functions
function sharing_changed()
{ldelim}
    var selectedValue = document.getElementById('sharing').value;
    if(selectedValue != 'share')
    {ldelim}
        document.getElementById('sharing_share_div').style.display = 'none';
    {rdelim}
    else
    {ldelim}
        document.getElementById('sharing_share_div').style.display = 'block';
        setSharingObjects();
        showSharingMemberTypes();
    {rdelim}
{rdelim}

function showSharingMemberTypes()
{ldelim}
	var selectedOption=document.getElementById('sharingMemberType').value;
	//Completely clear the select box
	document.getElementById('sharingAvailList').options.length = 0;

	if(selectedOption == 'groups')
	{ldelim}
		constructSelectOptions('groups',grpIdArr,grpNameArr);
	{rdelim}
	else if(selectedOption == 'roles')
	{ldelim}
		constructSelectOptions('roles',roleIdArr,roleNameArr);
	{rdelim}
	else if(selectedOption == 'rs')
	{ldelim}

		constructSelectOptions('rs',roleIdArr,roleNameArr);
	{rdelim}
	else if(selectedOption == 'users')
	{ldelim}
		constructSelectOptions('users',userIdArr,userNameArr);
	{rdelim}
{rdelim}

function constructSelectOptions(selectedMemberType,idArr,nameArr)
{ldelim}
	var i;
	var findStr=document.getElementById('sharingFindStr').value;
	if(findStr.replace(/^\s+/g, '').replace(/\s+$/g, '').length !=0)
	{ldelim}
		var k=0;
		for(i=0; i<nameArr.length; i++)
		{ldelim}
			if(nameArr[i].indexOf(findStr) ==0)
			{ldelim}
				constructedOptionName[k]=nameArr[i];
				constructedOptionValue[k]=idArr[i];
				k++;
			{rdelim}
		{rdelim}
	{rdelim}
	else
	{ldelim}
		constructedOptionValue = idArr;
		constructedOptionName = nameArr;
	{rdelim}

	//Constructing the selectoptions
	var j;
	var nowNamePrefix;
	for(j=0;j<constructedOptionName.length;j++)
	{ldelim}
		if(selectedMemberType == 'roles')
		{ldelim}
			nowNamePrefix = 'Roles::'
		{rdelim}
		else if(selectedMemberType == 'rs')
		{ldelim}
			nowNamePrefix = 'RoleAndSubordinates::'
		{rdelim}
		else if(selectedMemberType == 'groups')
		{ldelim}
			nowNamePrefix = 'Group::'
		{rdelim}
		else if(selectedMemberType == 'users')
		{ldelim}
			nowNamePrefix = 'User::'
		{rdelim}

		var nowName = nowNamePrefix + constructedOptionName[j];
		var nowId = selectedMemberType + '::'  + constructedOptionValue[j]
		document.getElementById('sharingAvailList').options[j] = new Option(nowName,nowId);
	{rdelim}
	//clearing the array
	constructedOptionValue = new Array();
    constructedOptionName = new Array();
{rdelim}

function sharingAddColumn()
{ldelim}
    for (i=0;i<selectedColumnsObj.length;i++)
    {ldelim}
        selectedColumnsObj.options[i].selected=false
    {rdelim}

    for (i=0;i<availListObj.length;i++)
    {ldelim}
        if (availListObj.options[i].selected==true)
        {ldelim}
        	var rowFound=false;
        	var existingObj=null;
            for (j=0;j<selectedColumnsObj.length;j++)
            {ldelim}
                if (selectedColumnsObj.options[j].value==availListObj.options[i].value)
                {ldelim}
                    rowFound=true
                    existingObj=selectedColumnsObj.options[j]
                    break
                {rdelim}
            {rdelim}

            if (rowFound!=true)
            {ldelim}
                var newColObj=document.createElement("OPTION")
                newColObj.value=availListObj.options[i].value
                if (browser_ie) newColObj.innerText=availListObj.options[i].innerText
                else if (browser_nn4 || browser_nn6) newColObj.text=availListObj.options[i].text
                selectedColumnsObj.appendChild(newColObj)
                availListObj.options[i].selected=false
                newColObj.selected=true
                rowFound=false
            {rdelim}
            else
            {ldelim}
                if(existingObj != null) existingObj.selected=true
            {rdelim}
        {rdelim}
    {rdelim}
{rdelim}

function sharingDelColumn()
{ldelim}
    for (i=selectedColumnsObj.options.length;i>0;i--)
    {ldelim}
    	if (selectedColumnsObj.options.selectedIndex>=0)
            selectedColumnsObj.remove(selectedColumnsObj.options.selectedIndex)
    {rdelim}
{rdelim}

function setSharingObjects()
{ldelim}
    availListObj=getObj("sharingAvailList")
    selectedColumnsObj=getObj("sharingSelectedColumns")
{rdelim}

//Sharing Ends

function CheckSharing()
{ldelim}
    if(document.getElementById('sharing').value == 'share')
    {ldelim}
        var selColStr = '';
        var selColObj = document.getElementById('sharingSelectedColumns');
        
        for(i = 0; i < selColObj.options.length; i++)
        {ldelim}
            selColStr += selColObj.options[i].value + ';';
        {rdelim}

        if(selColStr == '')
        {ldelim}
            alert('{$MOD.LBL_SHARING_ERROR}');
            document.getElementById('sharingAvailList').focus();
            return false;
        {rdelim}
        document.getElementById('sharingSelectedColumnsString').value = selColStr;
    {rdelim}

    return true;
{rdelim}
</script>

