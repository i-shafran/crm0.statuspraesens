{*<!--
/*********************************************************************************
 * The content of this file is subject to the PDF Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<table border=0 cellspacing=0 cellpadding=0 style="width:100%;">
  {if $CRM_TEMPLATES_EXIST eq '0'}
        <tr>
  		<td class="rightMailMergeContent"  style="width:100%;">
  			<select name="use_common_template" id="use_common_template" class="detailedViewTextBox" multiple style="width:90%;" size="5">
          {foreach name="tplForeach" from="$CRM_TEMPLATES" item="templates_label" key="templates_prefix"}
            {if $smarty.foreach.tplForeach.first}
                <option value="{$templates_prefix}" selected="selected">{$templates_label}</option>
            {else}
                <option value="{$templates_prefix}">{$templates_label}</option>
            {/if}
          {/foreach}
        </select>        
  		</td>
		</tr>

    	<tr>
          	<td class="rightMailMergeContent"  style="width:100%;">  			
        		<a href="javascript:;" onclick="fnvshobj(this,'sendpdfmail_cont');sendEMakerMail('{$MODULE}','{$ID}');" class="webMnu"><img src="{'sendmail.gif'|@vtiger_imageurl:$THEME}" hspace="5" align="absmiddle" border="0"/></a>
        		<a href="javascript:;" onclick="fnvshobj(this,'sendpdfmail_cont');sendEMakerMail('{$MODULE}','{$ID}');" class="webMnu">{$APP.LBL_SENDMAIL_BUTTON_LABEL}</a>  
                <div id="sendpdfmail_cont" style="z-index:100001;position:absolute;"></div>
            </td>
        </tr>
  {else}
    <tr>
  		<td class="rightMailMergeContent">
  		  {$PDFMAKER_MOD.CRM_TEMPLATES_DONT_EXIST}
    		{if $IS_ADMIN eq '1'} 
    		  {$PDFMAKER_MOD.CRM_TEMPLATES_ADMIN}          
          <a href="index.php?module=PDFMaker&action=EditPDFTemplate&return_module={$MODULE}&return_id={$ID}&parenttab=Tools" class="webMnu">{$PDFMAKER_MOD.TEMPLATE_CREATE_HERE}</a>
        {/if}
      </td>
		</tr>
  {/if}
</table>

