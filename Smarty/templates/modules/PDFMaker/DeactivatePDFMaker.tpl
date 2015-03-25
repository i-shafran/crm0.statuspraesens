{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
{include file='modules/PDFMaker/Buttons_List.tpl'}

<script>
function ExportTemplates()
{ldelim}
     window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=ExportPDFTemplate&templates={$TEMPLATEID}";
{rdelim}
</script>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        {*<td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>*}
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100%>
		    	<form method="post" action="index.php" name="etemplatedetailview" onsubmit="VtigerJS_DialogBox.block();">  
				<input type="hidden" name="action" value="PDFMakerAjax">
				<input type="hidden" name="file" value="DeactivateLicense">
				<input type="hidden" name="key" value="{$LICENSE_KEY}">
				<input type="hidden" name="module" value="PDFMaker">
				<input type="hidden" name="templateid" value="{$TEMPLATEID}">
				<input type="hidden" name="parenttab" value="{$PARENTTAB}">
				<input type="hidden" name="isDuplicate" value="false">
				<input type="hidden" name="subjectChanged" value="">
				<tr>
					{*<td width=50 rowspan=2 valign=top><img src="{'PDFTemplates.jpg'|@vtiger_imageurl:$THEME}" border=0 ></td>*}
					<td class=heading2 valign=bottom>&nbsp;&nbsp;<b>{$MOD.LBL_DEACTIVATE_TITLE} &quot;{$LICENSE_KEY}&quot; </b></td>
				</tr>
				</table>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
					<center>
                    <h2>{$MOD.LBL_DEACTIVATE_QUESTION}</h2>
                    {$MOD.LBL_DEACTIVATE_DESC}<br><br>
                    <input type="submit" value="{$MOD.LBL_DEACTIVATE}" class="crmButton delete small"/>
                    </center>				
				</td>
				</tr><tr><td align="center" class="small" style="color: rgb(153, 153, 153);">{$MOD.PDF_MAKER} {$VERSION} {$MOD.COPYRIGHT}</td></tr>
				</table>

			</td>
			</tr>
			</table>
		</td>
	</tr>
	</form>
	</table>
		


</td>
   </tr>   
</tbody>
</table>
