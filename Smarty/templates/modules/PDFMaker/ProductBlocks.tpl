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
{if $VTIGER_VERSION < '5.4.0'}
    <script language="javascript" type="text/javascript" src="modules/PDFMaker/jQuery/jquery-1.10.2.min.js"></script>
{/if}
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
                                    {$MOD.LBL_PRODUCTBLOCKTPL}
                                </td>
                            </tr>

                            <tr>
                                <td class="small" valign="top">{$MOD.LBL_PRODUCTBLOCKTPL_DESC}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br />

                    <form action="index.php" name="tpl_form" method="post">
                        <input type="hidden" name="module" value="PDFMaker" />
                        <input type="hidden" name="action" value="ProductBlocks" />
                        <input type="hidden" name="mode" value="delete" />
                        <div style="padding:10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr class="small">
                                    <td><img src="{'prvPrfTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
                                    <td class="prvPrfTopBg" width="100%"></td>
                                    <td><img src="{'prvPrfTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
                                </tr>
                            </table>

                            <table class="prvPrfOutline" border="0" cellpadding="10" cellspacing="0" width="100%">
                                <tr><td>
                                        <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                                            <tr>
                                                <td valign="top" width="20px"><img src="{'prvPrfHdrArrow.gif'|@vtiger_imageurl:$THEME}"> </td>
                                                <td class="prvPrfBigText"><b> {$MOD.LBL_DEFINE_PBTPL} </b></td>
                                            </tr>
                                        </table>
                                        <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <input type="button" value="{$APP.LBL_DELETE_BUTTON_LABEL}" class="crmButton small delete" onclick="confirm_delete();"/>
                                                </td>
                                                <td align="right">
                                                    <input type="button" value="{$APP.LBL_ADD_NEW}" class="crmbutton small create" onclick="document.location.href = 'index.php?module=PDFMaker&action=ProductBlocks&parenttab=Settings&mode=edit'" />
                                                    &nbsp;
                                                    <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                                                </td>
                                            </tr>
                                        </table>

                                        <table class="tableHeading" border="0" cellpadding="5" cellspacing="0" width="100%" id="tpltbl">
                                            <tr>
                                                <th class="colHeader pm_colHeader" width="5%" align="center"><input type="checkbox" name="chx_all" onclick="checkedAll(this);"/></th>
                                                <th class="colHeader pm_colHeader" width="25%">{$MOD.LBL_PDF_NAME}</th>
                                                <th class="colHeader pm_colHeader" width="62%" id="bodyColumn">{$MOD.LBL_BODY}</th>
                                                <th class="colHeader pm_colHeader" width="8%">{$MOD.LBL_ACTION}</th>
                                            </tr>

                                            {foreach item=arr key=tpl_id item=tpl_value from=$PB_TEMPLATES name=tpl_foreach}
                                                <tr>
                                                    <td class="cellLabel" align="center">
                                                        <input type="checkbox" name="chx_{$tpl_id}" id="chx_{$smarty.foreach.tpl_foreach.index}"/>
                                                    </td>
                                                    <td class="cellLabel" style="font-weight:bold;">
                                                        <a href="index.php?module=PDFMaker&action=ProductBlocks&parenttab=Settings&mode=edit&tplid={$tpl_id}" title="{$MOD.LBL_EDIT}">{$tpl_value.name}</a>
                                                    </td>
                                                    <td class="cellText" align="left" >
                                                        <div style="overflow-x:auto; overflow-y:auto; width:100px;" class="bodyCell">
                                                            {$tpl_value.body}
                                                        </div>
                                                    </td>
                                                    <td class="cellText">
                                                        <a href="index.php?module=PDFMaker&action=ProductBlocks&parenttab=Settings&mode=edit&tplid={$tpl_id}" title="{$MOD.LBL_EDIT}">{$MOD.LBL_EDIT}</a>
                                                        |
                                                        <a href="index.php?module=PDFMaker&action=ProductBlocks&parenttab=Settings&mode=duplicate&tplid={$tpl_id}" title="{$MOD.LBL_DUPLICATE}">{$MOD.LBL_DUPLICATE}</a>
                                                    </td>
                                                </tr>
                                            {foreachelse}
                                                <tr>
                                                    <td colspan="3" class="cellText" align="center" style="padding:10px;"><strong>{$MOD.LBL_NO_ITEM_FOUND}</strong></td>
                                                </tr>
                                            {/foreach}
                                        </table>

                                        <table class="small" border="0" width="100%" cellpadding="2" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <input type="button" value="{$APP.LBL_DELETE_BUTTON_LABEL}" class="crmButton small delete" onclick="confirm_delete();"/>
                                                </td>
                                                <td align="right">
                                                    <input type="button" value="{$APP.LBL_ADD_NEW}" class="crmbutton small create" onclick="document.location.href = 'index.php?module=PDFMaker&action=ProductBlocks&parenttab=Settings&mode=edit'" />
                                                    &nbsp;
                                                    <input type="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" class="crmButton small cancel" onClick="window.history.back();" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td></tr>
                            </table>
                        </div>
                    </form>

                </div>
            </td>
            <td valign="top"><img src="{'showPanelTopRight.gif'|@vtiger_imageurl:$THEME}"></td>
        </tr>
    </tbody>
</table>
<br />


<script language="javascript" type="text/javascript">
        var totalNoOfRows = {$smarty.foreach.tpl_foreach.total};
    {literal}
        jQuery(document).ready(function() {
            var elmWidth = jQuery("#bodyColumn").width();
            jQuery(".bodyCell").each(function() {
                jQuery(this).css("width", elmWidth + "px");
            });
        });

        function checkedAll(oTrigger)
        {
            for (i = 0; i < totalNoOfRows; i++)
            {
                var tmpChx = document.getElementById('chx_' + i);
                if (tmpChx != 'undefined')
                {
                    tmpChx.checked = oTrigger.checked;
                }
            }
        }

        function confirm_delete()
        {
            var toDelete = 0;
            for (i = 0; i < totalNoOfRows; i++)
            {
                var tmpChx = document.getElementById('chx_' + i);
                if (tmpChx != undefined)
                {
                    if (tmpChx.checked == true)
                        toDelete++;
                }
            }

            if (toDelete > 0)
            {
    {/literal}
                var confRes = confirm('{$APP.DELETE_CONFIRMATION}' + toDelete + '{$APP.RECORDS}');
    {literal}
                if (confRes == true)
                {
                    document.tpl_form.submit();
                }
            }
        }
    </script>
{/literal}
