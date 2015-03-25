{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script language="javascript" type="text/javascript">loadPDFCSS();</script>
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
    		<td rowspan="2" valign="top" width="50"><img src="{'quickview.png'|@vtiger_imageurl:$THEME}" border="0" height="48" width="48"></td>
    		<td class="heading2" valign="bottom">
    		   <a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{'VTLIB_LBL_MODULE_MANAGER'|@getTranslatedString:'Settings'}</a> &gt;
    	       <a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule=PDFMaker&parenttab=Settings">{'PDFMaker'|@getTranslatedString:'PDFMaker'}</a> &gt;
    		{$MOD.LBL_DEBUG}
    		</td>
    	</tr>

    	<tr>
    		<td class="small" valign="top">{$MOD.LBL_DEBUG_DESC}</td>
    	</tr>
    </tbody>
    </table>
    <br />

    <form action="index.php" name="pref_form" method="post">
    <input type="hidden" name="module" value="PDFMaker" />
    <input type="hidden" name="action" value="Debugging" />
    <input type="hidden" name="mode" value="save" />
    <div style="padding:10px;">
        {*<table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr class="small">
                <td><img src="{'prvPrfTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
                <td class="prvPrfTopBg" width="100%"></td>
                <td><img src="{'prvPrfTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
            </tr>
        </table>*}

        <table class="prvPrfOutline" style="border:0;" cellpadding="0" cellspacing="0" width="100%">
            <tr><td>
                <table class="small" width="100%" border="0" cellpadding="3" cellspacing="0">
                        <tr>
                            <td class="dvtTabCache" style="width: 10px;" nowrap="nowrap">&nbsp;</td>
                            <td style="width: 15%;" class="dvtSelectedCell" id="debug_tab" onclick="showHideTab('debug');" width="75" align="center" nowrap="nowrap"><b>{$MOD.LBL_DEBUG}</b></td>
                            {*<td class="dvtUnSelectedCell" id="db_tab" onclick="showHideTab('db');" align="center" nowrap="nowrap"><b>{$MOD.LBL_DB_TAB}</b></td>*}
                            <td class="dvtUnSelectedCell" id="phpinfo_tab" onclick="showHideTab('phpinfo');" align="center" nowrap="nowrap"><b>{$MOD.LBL_PHPINFO_TAB}</b></td>
                            <td class="dvtTabCache" style="width: 70%;" nowrap="nowrap">&nbsp;</td>
                        </tr>
                        </table>
                    </td></tr>
                    
                    <tr><td align="left" valign="top">
                      {********************************************* GENERAL DEBUG INFO *************************************************}
                      <div style="display:block;" id="debug_div">
                        <table class="pm_tabContent">
                            <tr><td style="padding:10px;">
                                {* SWITCH DEBUGGING ON/OFF *}
                                <table width="100%" cellspacing="0" cellpadding="5" border="0" class="tableHeading">
                        			<tr><td class="big"><strong>{$MOD.LBL_ACTIONS}</strong></td></tr>
                        		</table>
                                <table cellpadding="5" cellspacing="0" width="100%">
                                    <tr>
                                        <td class="dvtCellLabel" width="25%" align="right">{$MOD.LBL_DEBUGGING_SETT}</td>
                                        <td class="dvtCellInfo" width="75%" align="left">
                                            {if $DEBUG_ON_CHECKED ne 'on'}
                                            <input type="hidden" name="is_debugging_on" value="on">
                                            <input type="submit" value="{$MOD.LBL_ON}" class="crmButton small save" >
                                            {else}
                                            <input type="hidden" name="is_debugging_on" value="off">
                                            <input type="submit" value="{$MOD.LBL_OFF}" class="crmButton small cancel" >
                                            {/if}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="dvtCellLabel" width="25%" align="right">{$MOD.LBL_DBG_SMARTY}</td>
                                        <td class="dvtCellInfo" width="75%" align="left">
                                            <input type="button" value="{$MOD.LBL_DELETE}" class="crmbutton small delete" onclick="deleteSmarty();">
                                        </td>
                                    </tr>
                                     <tr>
                                        <td class="dvtCellLabel" width="25%" align="right">{$MOD.LBL_DBG_EXPORT}</td>
                                        <td class="dvtCellInfo" width="75%" align="left">
                                            <input type="button" value="{$APP.LBL_EXPORT}" class="crmbutton small save" onclick="exportDbgInfo();">
                                        </td>
                                    </tr>
                                </table>
                                <br />
                                
                                {include file="$INCL_TEMPLATE_NAME"}
                                
                            </td></tr>
                            <tr><td class="small" style="text-align:center;padding:15px 0px 10px 0px;">
                               <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onclick="window.history.back()" />
                        	</td></tr>
                        </table>
                      </div>
                      
                      {********************************************* DATABASE TABLES *************************************************}
                      {*<div style="display:none;" id="db_div">
                        <table class="pm_tabContent" cellpadding="3" cellspacing="0">
                            <tr><td style="padding:10px;">
                            <div>
                                <iframe src="modules/PDFMaker/cadminer.php" width="100%" height="700px" onload="resizeFrame(this)" frameborder="0" name="adminer_frame" id="adminer_frame"></iframe>
                            </div>
                            </td>
                            </tr>
                        </table>
                      </div>*}
                      {********************************************* PHPINFO *************************************************}
                      <div style="display:none;" id="phpinfo_div">
                        <table class="pm_tabContent" cellpadding="3" cellspacing="0">
                            <tr><td style="padding:10px;">
                                <table width="100%" cellspacing="0" cellpadding="5" border="0" class="tableHeading">
                					<tr><td class="big"><strong>{$MOD.LBL_PHPINFO}</strong></td></tr>
                				</table>
                				<table cellpadding="5" cellspacing="0" width="100%">
                                    <tr>
                                        <td class="dvtCellInfo">
                                            <div id="phpinfo">
                                                {$DBG_PHPINFO}
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td></tr>
                        </table>
                      </div>
                      
                    </td></tr>
                </table>
                
          </td></tr>

        </table>
            </td></tr>
        </table>
    </div>
    </form>

    </div>
	</td>
    <td valign="top"><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
</tr></tbody>
</table>
<br />

<script language="javascript" type="text/javascript">
var selectedTab='debug';

preselectTab('{$SELTAB}');

function preselectTab(tabname)
{ldelim}
    if(tabname == 'db' || tabname == 'phpinfo')
        showHideTab(tabname);
        {*resizeFrame(document.getElementById("adminer_frame"));*}
{rdelim}

function showHideTab(tabname)
{ldelim}
    document.getElementById(selectedTab+'_tab').className="dvtUnSelectedCell";
    document.getElementById(tabname+'_tab').className='dvtSelectedCell';

    document.getElementById(selectedTab+'_div').style.display='none';
    document.getElementById(tabname+'_div').style.display='block';
    
    selectedTab=tabname;
{rdelim}

function resizeFrame(f)
{ldelim}
    tmpHeight = f.contentWindow.document.body.scrollHeight + 50;
    if(tmpHeight > 700)
        f.style.height = tmpHeight + "px";
{rdelim}

{literal}

function deleteSmarty()
{
    new Ajax.Request(
            'index.php',
            {queue: {position: 'end', scope: 'command'},
                    method: 'post',
                    postBody: "module=PDFMaker&action=PDFMakerAjax&file=Debugging&mode=smarty",
                    onComplete: function(response)
                    {
                        alert(response.responseText);
                    }
            }
    );
}
{/literal}

function exportDbgInfo()
{ldelim}
    window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=Debugging&mode=export";
{rdelim}
</script>