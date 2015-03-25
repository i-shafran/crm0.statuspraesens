{*<!--
/*********************************************************************************
 * The content of this file is subject to the EMAIL Maker license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 ********************************************************************************/
-->*}
<form name="basicSearch" method="post" action="index.php" onSubmit="return callSearch('Basic');">
<input type="hidden" name="searchtype" value="BasicSearch">
<input type="hidden" name="module" value="{$MODULE}" id="curmodule">
<input name="maxrecords" type="hidden" value="{$MAX_RECORDS}" id='maxrecords'>
<input type="hidden" name="parenttab" value="{$CATEGORY}">
<input type="hidden" name="action" value="index">
<input type="hidden" name="query" value="true">
<input type="hidden" name="search_cnt">
</form>
<div id="ListViewContents" class="small" style="width:100%;">
{include file="modules/EMAILMaker/ListEmailsEntries.tpl"}
</div>
                                