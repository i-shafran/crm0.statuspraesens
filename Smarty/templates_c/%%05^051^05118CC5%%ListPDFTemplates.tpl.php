<?php /* Smarty version 2.6.18, created on 2014-11-12 15:52:08
         compiled from modules/SPPDFTemplates/ListPDFTemplates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'modules/SPPDFTemplates/ListPDFTemplates.tpl', 123, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script>
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
</script>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">   
<tr>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
    <form  name="massdelete" method="POST" onsubmit="VtigerJS_DialogBox.block();">
    <input name="idlist" type="hidden">
    <input name="module" type="hidden" value="SPPDFTemplates">
    <input name="parenttab" type="hidden" value="Tools">
    <input name="action" type="hidden" value="">
    <table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
    <tr>
        <td class=heading2 align="left" valign=bottom><b><a href="index.php?module=SPPDFTemplates&action=ListPDFTemplates&parenttab=Tools"><?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE_GENERATOR']; ?>
</a></b></td>
    </tr>
    <tr>
        <td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE_GENERATOR_DESCRIPTION']; ?>
</td>
    </tr>
    </table>

<br>
    <table border=0 cellspacing=0 cellpadding=10 width=100% >
    <tr><td>
        <table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
        <tr>
            <td class="big"><strong><?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE_GENERATOR']; ?>
</strong></td>
            <td class="small" align=right>&nbsp;</td>
        </tr>
        </table>

        <table border=0 cellspacing=0 cellpadding=5 width=100% class="listTableTopButtons">
        <tr>
            <td class=small><input type="submit" value="<?php echo $this->_tpl_vars['MOD']['LBL_DELETE']; ?>
" onclick="return massDelete();" class="crmButton delete small"></td>
            <td class=small align=right><input class="crmButton create small" type="submit" value="<?php echo $this->_tpl_vars['MOD']['LBL_ADD_TEMPLATE']; ?>
" name="profile"  onclick="this.form.action.value='EditPDFTemplate'; this.form.parenttab.value='Tools'">&nbsp;&nbsp;</td>
        </tr>
        </table>

        <table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
        <tr>
            <td width=2% class="colHeader small">#</td>
            <td width=3% class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_LIST_SELECT']; ?>
</td>
            <td width=20% class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_TEMPLATE_NAME']; ?>
</td>
            <td width=20% class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_MODULENAMES']; ?>
</td>
            <td width=5% class="colHeader small"><?php echo $this->_tpl_vars['MOD']['LBL_ACTION']; ?>
</td>
        </tr>
        <?php $_from = $this->_tpl_vars['PDFTEMPLATES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mailmerge'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mailmerge']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['mailmerge']['iteration']++;
?>
        <tr>
            <td class="listTableRow small" valign=top><?php echo $this->_foreach['mailmerge']['iteration']; ?>
</td>
            <td class="listTableRow small" valign=top><input type="checkbox" class=small name="selected_id" value="<?php echo $this->_tpl_vars['template']['templateid']; ?>
"></td>
            <td class="listTableRow small" valign=top><b><?php echo $this->_tpl_vars['template']['name']; ?>
</b></a></td>
            <td class="listTableRow small" valign=top><b><?php echo $this->_tpl_vars['template']['module']; ?>
</b></a></td>
            <td class="listTableRow small" valign=top nowrap><?php echo $this->_tpl_vars['template']['edit']; ?>
</td>
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
                            &nbsp;&nbsp;-<a href="index.php?module=SPPDFTemplates&action=EditPDFTemplate&parenttab=Tools"><?php echo $this->_tpl_vars['APP']['LBL_CREATE']; ?>
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
    </table>
