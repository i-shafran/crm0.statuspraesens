{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset={$APP.LBL_CHARSET}">
	<title>{$MOD.LBL_EDIT_RELATED_BLOCK}</title>
	<link href="{$THEME_PATH}style.css" rel="stylesheet" type="text/css">
	<script language="JavaScript" type="text/javascript" src="include/js/general.js"></script>
	<script language="JavaScript" type="text/javascript" src="include/js/{php} echo $_SESSION['authenticated_user_language'];{/php}.lang.js?{php} echo $_SESSION['vtiger_version'];{/php}"></script>
	<script language="javascript" type="text/javascript" src="include/scriptaculous/prototype.js"></script>
	<script language="JavaScript" type="text/javascript" src="include/js/json.js"></script>
	<script language="JavaScript" type="text/javascript" src="modules/PDFMaker/PDFMaker.js"></script>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="mailClient mailClientBg">
<tr>
	<td>
		<form name="NewBlock" method="POST" ENCTYPE="multipart/form-data" action="index.php" style="margin:0px">
		<input type="hidden" name="module" value="PDFMaker">
		<input type="hidden" name="pdfmodule" value="{$REL_MODULE}">
		<input type="hidden" name="primarymodule" value="{$REL_MODULE}">
		<input type="hidden" name="record" value="{$RECORD}">
		<input type="hidden" name="file" value="SaveRelatedBlock">
		<input type="hidden" name="action" value="PDFMakerAjax">
    <input type="hidden" name="step" id="step" value="1">
    
    <div id="filter_columns" style="display:none"><option value="">{$REP.LBL_NONE}</option>{$SECCOLUMNS}</div>
    
		<table width="100%" border="0" cellspacing="0" cellpadding="5" >
			<tr>
				<td  class="moduleName" width="80%">{$MOD.LBL_EDIT_RELATED_BLOCK} </td>
				<td  width=30% nowrap class="componentName" align=right></td>
			</tr>
		</table>
	
	
		<table width="100%" border="0" cellspacing="0" cellpadding="5" class="homePageMatrixHdr"> 
		<tr>
		<td>
		
					<table width="100%" border="0" cellspacing="0" cellpadding="0" > 
						<tr>
							<td width="25%" valign="top" >
								<table width="100%" border="0" cellpadding="5" cellspacing="0" class="small">
									<tr><td id="step1label" class="settingsTabSelected" style="padding-left:10px;">1. {$REP.LBL_FILTERS} </td></tr>
									<tr><td id="step2label" class="settingsTabList" style="padding-left:10px;">2. {$MOD.LBL_SORTING} </td></tr>
									<tr><td id="step3label" class="settingsTabList" style="padding-left:10px;">3. {$MOD.LBL_BLOCK_STYLE} </td></tr>
								</table>
							</td>
							<td width="75%" valign="top"  bgcolor=white >
								<!-- STEP 1 -->
								<div id="step1" style="display:block;">
								{include file='modules/PDFMaker/BlockFilters.tpl'}
								</div>
								
								<!-- STEP 2 -->
								<div id="step2" style="display:none;">
                                    <div style="height:530px;overflow:auto;">
                                    <table class="small" bgcolor="#ffffff" border="0" cellpadding="5" cellspacing="0" width="100%" id="sortColTbl">
                                        <tr id="row0" height='35px'><td colspan="3"><span class="genHeaderGray">{$MOD.LBL_SORTING}</span><hr></td></tr>
                                        {foreach item="sortColOptions" key="rowID" from="$SORTCOLUMNS" name="sortColForeach"}
                                        <tr id="row{$rowID}">
                                            <td width="20%" align="right">{if $rowID eq "1"}{$MOD.LBL_SORT_BY}{else}{$MOD.LBL_THEN_BY}{/if}</td>
                                            <td>
                                            <select name="sortCol{$rowID}" id="sortCol{$rowID}" class="detailedViewTextBox" onchange="changeSortCol(this);">
                                                {$sortColOptions}
                                            </select>
                                          </td>
                                          <td width="20%" align="left">
                                            <select name="sortDir{$rowID}" class="detailedViewTextBox">
                                              {$SORTORDER.$rowID}
                                            </select>
                                          </td>
                                        </tr>
                                        {/foreach}
                                        {*<tr id="row1">
                                          <td width="20%" align="right">{$MOD.LBL_SORT_BY}:</td>
                                          <td>
                                            <select name="sortCol1" id="sortCol1" class="detailedViewTextBox" onchange="changeSortCol(this);">
                                                <option value="0">{$APP.LBL_NONE}</option>
                                            </select>
                                          </td>
                                          <td width="20%" align="left">
                                            <select name="sortDir1" class="detailedViewTextBox">
                                              <option value="Ascending">{$MOD.LBL_ASC}</option>
                                              <option value="Descending">{$MOD.LBL_DESC}</option>
                                            </select>
                                          </td>
                                        </tr>*}
                                    </table>
                                    {assign var=sortColTotal value=$smarty.foreach.sortColForeach.total}
                                    <input type="hidden" name="sortColCount" id="sortColCount" value="{$sortColTotal}" />
                                    </div>
								</div>
								
								<!-- STEP 3 -->
								{literal}   
                    <script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
                {/literal} 
								
								<div id="step3" style="display:none;">
								    
                    <table class="small" bgcolor="#ffffff" border="0" cellpadding="5" cellspacing="0" width="100%">
										<tr height='10%'>
  										<td colspan="2">
  											<span class="genHeaderGray">{$MOD.LBL_BLOCK_STYLE}</span><hr>
  										</td>
										</tr>
										<tr>
                      <td width="10%" align="right">{$APP.Name}:</td>
                      <td><input type="text" name="blockname" id="blockname" class="detailedViewTextBox" value="{$BLOCKNAME}"></td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <textarea name="relatedblock" id="relatedblock" style="width:90%;height:700px" class=small tabindex="5">{$RELATEDBLOCK}</textarea>
                      </td>
                    </tr>
                </div>
                
                {literal}   
                    <script type="text/javascript">
                    	CKEDITOR.replace('relatedblock',{customConfig:'../../../modules/PDFMaker/fck_config.js'} );
                    </script>
                {/literal}
						</td>
					</tr>
				</table>

			</td>
		</tr>
		</table>
		
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="reportCreateBottom">
		<tr>
			<td align="right" style="padding:10px;">
			<input type="button" name="back_rep" id="back_rep" value=" &nbsp;&lt;&nbsp;{$APP.LBL_BACK}&nbsp; " {if $RECORD eq ""}disabled="disabled"{/if} class="crmbutton small cancel" onClick="changeStepsback();">
			&nbsp;<input type="button" name="next" id="next" value=" &nbsp;{$APP.LNK_LIST_NEXT}&nbsp;&rsaquo;&nbsp; " onClick="changeEditSteps();" class="crmbutton small save">
			&nbsp;<input type="button" name="cancel" value=" &nbsp;{$APP.LBL_CANCEL_BUTTON_LABEL}&nbsp; " class="crmbutton small cancel" onClick="self.close();">
			</td>
		</tr>
	</table>
		</form>	

</td>
</tr>
</table>

<script>
alert_arr.PM_LBL_THEN_BY = '{$MOD.LBL_THEN_BY}';
alert_arr.PM_LBL_ASC = '{$MOD.LBL_ASC}';
alert_arr.PM_LBL_DESC = '{$MOD.LBL_DESC}';
alert_arr.PM_LBL_NONE = '{$APP.LBL_NONE}';
alert_arr.PM_LBL_SORTCOL_DUPLICATES = '{$MOD.LBL_SORTCOL_DUPLICATES}';

var sortRowCount = {$sortColTotal};
var sortColString = '';
fillSortColString();

{literal}
function fillSortColString()
{
    var idx;
    for(idx=1; idx<=sortRowCount; idx++) {
        var selectObj = document.getElementById("sortCol" + idx);
        if(selectObj.value != "0"){
            sortColString += '@@' + selectObj.value;
        }
    }
}
{/literal}
</script>

</body>
</html>