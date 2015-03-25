<?php /* Smarty version 2.6.18, created on 2014-08-16 01:04:21
         compiled from modules/PDFMaker/ListPDFTemplates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'modules/PDFMaker/ListPDFTemplates.tpl', 201, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="javascript" type="text/javascript">loadPDFCSS();</script>
<script>
function ExportTemplates()
{
	if(typeof(document.massdelete.selected_id) == 'undefined')
		return false;
        x = document.massdelete.selected_id.length;
        idstring = "";

        if ( x == undefined)
        {

                if (document.massdelete.selected_id.checked)
                {
                        idstring = document.massdelete.selected_id.value;

                        window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=ExportPDFTemplate&templates="+idstring;
		     	xx=1;
                }
                else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
        }
        else
        {
                xx = 0;
                for(i = 0; i < x ; i++)
                {
                        if(document.massdelete.selected_id[i].checked)
                        {
                                idstring = document.massdelete.selected_id[i].value +";"+idstring
                        xx++
                        }
                }
                if (xx != 0)
                {
                        document.massdelete.idlist.value=idstring;

                        window.location.href = "index.php?module=PDFMaker&action=PDFMakerAjax&file=ExportPDFTemplate&templates="+idstring;
                }
                else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
       }

}

function massDelete()
{
	if(typeof(document.massdelete.selected_id) == 'undefined')
		return false;
        x = document.massdelete.selected_id.length;
        idstring = "";

        if ( x == undefined)
        {

                if (document.massdelete.selected_id.checked)
               {
                        document.massdelete.idlist.value=document.massdelete.selected_id.value+';';
			xx=1;
                }
                else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
        }
        else
        {
                xx = 0;
                for(i = 0; i < x ; i++)
                {
                        if(document.massdelete.selected_id[i].checked)
                        {
                                idstring = document.massdelete.selected_id[i].value +";"+idstring
                        xx++
                        }
                }
                if (xx != 0)
                {
                        document.massdelete.idlist.value=idstring;
                }
               else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
       }
		if(confirm("<?php echo $this->_tpl_vars['APP']['DELETE_CONFIRMATION']; ?>
"+xx+"<?php echo $this->_tpl_vars['APP']['RECORDS']; ?>
"))
		{
	        	document.massdelete.action.value= "DeletePDFTemplate";
		}
		else
		{
			return false;
		}

}

function SaveTemplatesOrder()
{
    $("vtbusy_info").style.display="inline";
    var tmpl_order = '';

    for(i=0;i<document.massdelete.elements.length;i++)
    {
        var elm = document.massdelete.elements[i];
        
        if(elm.type == 'text' && elm.name.indexOf('tmpl_order_', 0) == 0 )
        {
            if((isNaN(elm.value) == false && elm.Value != '') )
            {
                var templateid = elm.name.split('_',3)[2];
                var order = elm.value;
                tmpl_order += templateid + '_' + order + '#';
            }
            else
            {
                alert('<?php echo $this->_tpl_vars['MOD']['LBL_ORDER_ERROR']; ?>
');
                elm.focus();
                $("vtbusy_info").style.display="none";
                return false;
            }
        }
        
    }
    
    <?php echo '
    new Ajax.Request(
              \'index.php\',
              {queue: {position: \'end\', scope: \'command\'},
                      method: \'post\',
                      postBody: \'module=PDFMaker&action=PDFMakerAjax&file=AjaxRequestHandle&handler=templates_order&tmpl_order=\'+tmpl_order,
                      onComplete: function(response) {
                          if (response.responseText == "ok")
                          {
                             '; ?>

                             alert('<?php echo $this->_tpl_vars['MOD']['LBL_ORDER_SAVE_OK']; ?>
');
                             <?php echo '
                          }
                          else
                          {
                             '; ?>

                             alert('<?php echo $this->_tpl_vars['MOD']['LBL_ORDER_SAVE_ERROR']; ?>
');
                             <?php echo '
                          }
                          $("vtbusy_info").style.display="none";
                      }
              }
      );
      '; ?>

    
    return true;
}
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'modules/PDFMaker/Buttons_List.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tr>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
    <form  name="massdelete" method="POST" onsubmit="VtigerJS_DialogBox.block();">
    <input name="idlist" type="hidden">
    <input name="module" type="hidden" value="PDFMaker">
    <input name="parenttab" type="hidden" value="Tools">
    <input name="action" type="hidden" value="">

    <table border=0 cellspacing=0 cellpadding=0 width=100% >
    <tr><td>
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="listTableTopButtons">
        <tr>
            <td class=small width="38%">&nbsp;
            <?php if ($this->_tpl_vars['DELETE'] == 'permitted'): ?>
                <input type="submit" value="<?php echo $this->_tpl_vars['MOD']['LBL_DELETE']; ?>
" onclick="return massDelete();" class="crmButton delete small">
			<?php endif; ?>
			</td>
			<td align="center" width="24%" style="verical-align:middle;">
                <?php if ($this->_tpl_vars['RELEASE_NOTIF'] != '' || $this->_tpl_vars['DEBUG_NOTIF'] != ''): ?>
                    <div id="release_notif" class="small" width="100%" scrolldelay="100" style="color:red; font-weight:bold; border:1px dashed; padding:4px; text-align:center;">
                    <?php echo $this->_tpl_vars['RELEASE_NOTIF']; ?>

                    <?php echo $this->_tpl_vars['DEBUG_NOTIF']; ?>

                    </div>
                <?php endif; ?>
            </td>
			<td align="right" width="38%">&nbsp;
    			<span id="vtbusy_info" style="display:none;" valign="bottom"><img src="<?php echo vtiger_imageurl('vtbusy.gif', $this->_tpl_vars['THEME']); ?>
" border="0"></span>&nbsp;
    			<?php if ($this->_tpl_vars['EDIT'] == 'permitted'): ?>
                    <input class="crmButton create small" type="submit" value="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TEMPLATE']; ?>
" name="profile"  onclick="this.form.action.value='EditPDFTemplate'; this.form.parenttab.value='Tools'" />
        			&nbsp;
                <?php endif; ?>
                <?php if ($this->_tpl_vars['IS_ADMIN'] == '1' && $this->_tpl_vars['TO_UPDATE'] == 'true'): ?>
                   <input type="button" value="<?php echo $this->_tpl_vars['MOD']['LBL_UPDATE']; ?>
" class="crmbutton small delete" title="<?php echo $this->_tpl_vars['MOD']['LBL_UPDATE']; ?>
" onclick="window.location.href='index.php?module=PDFMaker&action=update&parenttab=Tools'" />
                   &nbsp;
                <?php endif; ?>
                <input type="button" value="<?php echo $this->_tpl_vars['MOD']['PDFMakerManual']; ?>
" class="crmbutton small save" title="<?php echo $this->_tpl_vars['MOD']['PDFMakerManual']; ?>
" onclick="window.location.href='http://www.its4you.sk/images/pdf_maker/pdfmaker-for-vtigercrm.pdf'" />
            </td>
        </tr>
        </table>

        <?php if ($this->_tpl_vars['DIR'] == 'asc'): ?>
            <?php $this->assign('dir_img', '<img src="themes/images/arrow_up.gif" border="0" />'); ?>
        <?php else: ?>
            <?php $this->assign('dir_img', '<img src="themes/images/arrow_down.gif" border="0" />'); ?>
        <?php endif; ?>

        <?php $this->assign('name_dir', 'asc'); ?>
        <?php $this->assign('module_dir', 'asc'); ?>
        <?php $this->assign('description_dir', 'asc'); ?>
        <?php $this->assign('order_dir', 'asc'); ?>

        <?php if ($this->_tpl_vars['ORDERBY'] == 'filename' && $this->_tpl_vars['DIR'] == 'asc'): ?>
            <?php $this->assign('name_dir', 'desc'); ?>
        <?php elseif ($this->_tpl_vars['ORDERBY'] == 'module' && $this->_tpl_vars['DIR'] == 'asc'): ?>
            <?php $this->assign('module_dir', 'desc'); ?>
        <?php elseif ($this->_tpl_vars['ORDERBY'] == 'description' && $this->_tpl_vars['DIR'] == 'asc'): ?>
            <?php $this->assign('description_dir', 'desc'); ?>
        <?php elseif ($this->_tpl_vars['ORDERBY'] == 'order' && $this->_tpl_vars['DIR'] == 'asc'): ?>
            <?php $this->assign('order_dir', 'desc'); ?>
        <?php endif; ?>

        <table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
        <tr>
            <td width=2% class="colHeader pm_colHeader">#</td>
            <td width=3% class="colHeader pm_colHeader"><?php echo $this->_tpl_vars['MOD']['LBL_LIST_SELECT']; ?>
</td>
            <td width=20% class="colHeader pm_colHeader"><a href="index.php?module=PDFMaker&action=index&parenttab=Tools&orderby=name&dir=<?php echo $this->_tpl_vars['name_dir']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_PDF_NAME']; ?>
<?php if ($this->_tpl_vars['ORDERBY'] == 'filename'): ?><?php echo $this->_tpl_vars['dir_img']; ?>
<?php endif; ?></a></td>
            <td width=20% class="colHeader pm_colHeader"><a href="index.php?module=PDFMaker&action=index&parenttab=Tools&orderby=module&dir=<?php echo $this->_tpl_vars['module_dir']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_MODULENAMES']; ?>
<?php if ($this->_tpl_vars['ORDERBY'] == 'module'): ?><?php echo $this->_tpl_vars['dir_img']; ?>
<?php endif; ?></a></td>
            <td width=34% class="colHeader pm_colHeader"><a href="index.php?module=PDFMaker&action=index&parenttab=Tools&orderby=description&dir=<?php echo $this->_tpl_vars['description_dir']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_DESCRIPTION']; ?>
<?php if ($this->_tpl_vars['ORDERBY'] == 'description'): ?><?php echo $this->_tpl_vars['dir_img']; ?>
<?php endif; ?></a></td>
            <td width=6% class="colHeader pm_colHeader"><a href="index.php?module=PDFMaker&action=index&parenttab=Tools&orderby=order&dir=<?php echo $this->_tpl_vars['order_dir']; ?>
"><?php echo $this->_tpl_vars['MOD']['LBL_ORDER']; ?>
<?php if ($this->_tpl_vars['ORDERBY'] == 'order'): ?><?php echo $this->_tpl_vars['dir_img']; ?>
<?php endif; ?></a>&nbsp;&nbsp;<a href="#" onclick="return SaveTemplatesOrder();"><img src="themes/images/save.png" width="15" border="0" alt="Save" title="<?php echo $this->_tpl_vars['MOD']['LBL_SAVE_ORDER']; ?>
" /></a></td>
            <?php if ($this->_tpl_vars['VERSION_TYPE'] != 'deactivate'): ?><td width=5% class="colHeader pm_colHeader"><?php echo $this->_tpl_vars['APP']['LBL_STATUS']; ?>
</td>
            <td width=5% class="colHeader pm_colHeader"><?php echo $this->_tpl_vars['MOD']['LBL_ACTION']; ?>
</td><?php endif; ?>
        </tr>
        <?php $_from = $this->_tpl_vars['PDFTEMPLATES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mailmerge'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mailmerge']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['mailmerge']['iteration']++;
?>
        <tr <?php if ($this->_tpl_vars['template']['status'] == 0): ?> style="font-style:italic;" <?php endif; ?>>
            <td class="listTableRow small" valign=top><?php echo $this->_foreach['mailmerge']['iteration']; ?>
</td>
            <td class="listTableRow small" valign=top><input type="checkbox" class=small name="selected_id" value="<?php echo $this->_tpl_vars['template']['templateid']; ?>
"></td>
            <td class="listTableRow small" valign=top><?php echo $this->_tpl_vars['template']['filename']; ?>
</a></td>
            <td class="listTableRow small" valign=top <?php if ($this->_tpl_vars['template']['status'] == 0): ?> style="color:#888;" <?php endif; ?>><?php echo $this->_tpl_vars['template']['module']; ?>
</a></td>
            <td class="listTableRow small" valign=top <?php if ($this->_tpl_vars['template']['status'] == 0): ?> style="color:#888;" <?php endif; ?>><?php echo $this->_tpl_vars['template']['description']; ?>
&nbsp;</td>
            <td class="listTableRow small" valign=top align=center><input <?php if ($this->_tpl_vars['template']['status'] == 0): ?>disabled="disabled"<?php endif; ?> type="text" class="txtBox" style="width:30px;" maxlength="4" name="tmpl_order_<?php echo $this->_tpl_vars['template']['templateid']; ?>
" value="<?php echo $this->_tpl_vars['template']['order']; ?>
" /></td>
            <?php if ($this->_tpl_vars['VERSION_TYPE'] != 'deactivate'): ?><td class="listTableRow small" valign=top <?php if ($this->_tpl_vars['template']['status'] == 0): ?> style="color:#888;" <?php endif; ?>><?php echo $this->_tpl_vars['template']['status_lbl']; ?>
&nbsp;</td>
            <td class="listTableRow small" valign=top nowrap><?php echo $this->_tpl_vars['template']['edit']; ?>
</td><?php endif; ?>
        </tr>
        <?php endforeach; else: ?>
       <tr>
            <td style="background-color:#efefef;height:340px" align="center" colspan="6">
                <div style="border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 45%; position: relative; z-index: 10000000;">
                    <table border="0" cellpadding="5" cellspacing="0" width="98%">
                    <tr><td rowspan="2" width="25%"><img src="<?php echo vtiger_imageurl('empty.jpg', $this->_tpl_vars['THEME']); ?>
" height="60" width="61"></td>
                        <td style="border-bottom: 1px solid rgb(204, 204, 204);" nowrap="nowrap" width="75%" align="left">
                            <span class="genHeaderSmall"><?php echo $this->_tpl_vars['APP']['LBL_NO']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_FOUND']; ?>
</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="small" align="left" nowrap="nowrap"><?php echo $this->_tpl_vars['APP']['LBL_YOU_CAN_CREATE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_A']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_NOW']; ?>
. <?php echo $this->_tpl_vars['APP']['LBL_CLICK_THE_LINK']; ?>
:<br>
                            &nbsp;&nbsp;-<a href="index.php?module=PDFMaker&action=EditPDFTemplate&parenttab=Tools"><?php echo $this->_tpl_vars['APP']['LBL_CREATE']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_A']; ?>
 <?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE']; ?>
</a><br>
                        </td>
                    </tr>
                    </table>
                </div>
            </td>
        </tr>
        <?php endif; unset($_from); ?>

        </table>
        </form>
    </td>
    </tr>
    <tr><td align="center" class="small" style="color: rgb(153, 153, 153);"><?php echo $this->_tpl_vars['MOD']['PDF_MAKER']; ?>
 <?php echo $this->_tpl_vars['VERSION']; ?>
 <?php echo $this->_tpl_vars['MOD']['COPYRIGHT']; ?>
</td></tr>
    </table>

</td></tr></table>