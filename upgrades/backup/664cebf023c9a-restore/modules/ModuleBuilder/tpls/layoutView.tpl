{*
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
*}


{if $disable_layout}
<span class='required'>
{sugar_translate label="LBL_SYNC_TO_DETAILVIEW_NOTICE" module="ModuleBuilder"}
</span>
{/if}
<table id='layoutEditorButtons' cellspacing='2'>
    <tr>
    {$buttons}
	{if $view == 'editview'}
	<td><input type="checkbox" {if $syncDetailEditViews}checked="true"{/if} id="syncCheckbox" onclick="document.forms.prepareForSave.sync_detail_and_edit.value=this.checked">
	   {sugar_translate label="LBL_SYNC_TO_DETAILVIEW" module="ModuleBuilder"}&nbsp;{sugar_help text=$mod.LBL_SYNC_TO_DETAILVIEW_HELP}
	</input></td>
	{/if}
    </tr>
</table>
<table id='layoutEditorRoleButtons' cellspacing='2'>
    {$layoutButtons}
    {if $view == 'editview'}
        <td><input type="checkbox" {if $syncDetailEditViews}checked="true"{/if} id="syncCheckbox" onclick="document.forms.prepareForSave.sync_detail_and_edit.value=this.checked">
            {sugar_translate label="LBL_SYNC_TO_DETAILVIEW" module="ModuleBuilder"}&nbsp;{sugar_help text=$mod.LBL_SYNC_TO_DETAILVIEW_HELP}
            </input></td>
    {/if}
</table>
<div id='layoutEditor' style="width:675px;">
<input type='hidden' id='fieldwidth' value='{$fieldwidth}'>
<input type='hidden' id='maxColumns' value='{$maxColumns}'>
<input type='hidden' id='nextPanelId' value='{$nextPanelId}'>
<div id='toolbox' style='float:left; overflow-y:auto; overflow-x:hidden';>
    <h2 style='margin-bottom:20px;'>{$mod.LBL_TOOLBOX}</h2>
    
    <div id='delete'>
    {sugar_image name=Delete width=48 height=48}
    </div>

	{if ! isset($fromPortal) && ! isset($wireless) && empty($single_panel)}
    <div id='panelproxy'></div>
    {/if}
    <div id='rowproxy'></div>
    <div id='availablefields'>
    <p id='fillerproxy'></p>

    {counter name='idCount' assign='idCount' start='1'}
    {foreach from=$available_fields item='col' key='id'}
        {assign var="field" value=$col.name}
        <div class='le_field' data-name="{$field}" id='{$idCount}'>
            {if ! $fromModuleBuilder && ($col.name != '(filler)')}
                {capture assign="otherAttributes"}class="le_edit" style="float:right; cursor:pointer;" onclick="editFieldProperties('{$idCount}', '{$col.label|escape:'javascript'}');"{/capture}
                {sugar_getimage name="edit_inline" ext=".gif" other_attributes=$otherAttributes}
            {/if}
            {if isset($col.type) && ($col.type == 'address')}
                {$icon_address}
            {/if}
            {if isset($col.type) && ($col.type == 'phone')}
                {$icon_phone}
            {/if}
            {if isset($field_defs.$field.calculated) && $field_defs.$field.calculated}
                {sugar_getimage name="SugarLogic/icon_calculated" alt=$mod_strings.LBL_CALCULATED ext=".png" other_attributes='class="right_icon" '}
            {/if}
            {if isset($field_defs.$field.dependency) && $field_defs.$field.dependency}
                {sugar_getimage name="SugarLogic/icon_dependent" ext=".png" alt=$mod_strings.LBL_DEPENDANT other_attributes='class="right_icon" '}
            {/if}
            <span id='le_label_{$idCount}'>
            {if !empty($translate) && !empty($col.label)}
                {eval var=$col.label assign='newLabel'}
                {if $from_mb}
                    {if !empty($current_mod_strings[$newLabel])}
                        {$current_mod_strings[$newLabel]|escape:'html'}
                    {else}
                        {$col.label|escape:'html'}
                    {/if}
                {else}
                    {sugar_translate label=$newLabel module=$language}
                {/if}
 			{else}
                {assign var='label' value=$col.label} 
                {if !empty($current_mod_strings[$label])}
                    {$current_mod_strings[$label]|escape:'html'}
                {else}
                	{$label|escape:'html'}
                {/if}
            {/if}{if !empty($col.fieldset)} **{/if}</span>
            <span class='field_name'>{$col.name|escape:'html'}</span>
            <span class='field_label'>{$col.label|escape:'html'}</span>
            {if !empty($col.fieldset_fields)}
            <span class='field_fieldset_fields' id='fieldset_{$idCount}'>
                {foreach from=$col.fieldset_fields item='fsfield'}
                    {eval var=$fsfield.label assign='fslabel'}
                    {if !empty($translate) && !empty($fsfield.label)}
                        {sugar_translate label=$fslabel module=$language}
                    {else}
                        {if !empty($current_mod_strings[$fslabel])}
                            {$current_mod_strings[$fslabel]|escape:'html'}
                        {elseif !empty($mod[$fslabel])}
                            {$mod[$fslabel]|escape:'html'}
                        {else}
                            {$fslabel|escape:'html'}
                        {/if}
                    {/if}<br>
                {/foreach}
            </span>
            {/if}
            <span id='le_tabindex_{$idCount}' class='field_tabindex'>{$col.tabindex}</span>
        </div>
        {counter name='idCount' assign='idCount' print=false}
    {/foreach}
    </div>
</div>

<div id='panels' style='float:left; overflow-y:auto; overflow-x:hidden' class="max-columns-{$maxColumns}">

<h3>{$layouttitle}</h3>
{counter name='idCounter' assign='idCounter' start='1'}
{foreach from=$layout item='panel' key='panelid'}

    <div class='le_panel' id='{$idCount}'>

        <div class='panel_label' id='le_panellabel_{$idCount}'>
          <span class='panel_name' id='le_panelname_{$idCount}'>
          	{capture name=panel_upper assign=panel_upper}{$panelid|upper}{/capture}
			{if $panelid eq 'default'}
          		{$mod.LBL_DEFAULT}
			{elseif $from_mb && isset($current_mod_strings.$panel_upper)}
                {$current_mod_strings.$panel_upper}
			{elseif !empty($translate)}
			    {sugar_translate label=$panelid|upper module=$language}
			{else}
			    {$panelid}
			{/if}</span>
          <span class='panel_id' id='le_panelid_{$idCount}'>{$panelid}</span>
        </div>
        {if $panelid ne 'default'}
            {capture assign="otherAttributes"}class="le_edit" style="float:left; cursor:pointer;" onclick="editPanelProperties('{$idCount}');"{/capture}
            {sugar_getimage name="edit_inline" ext=".gif" other_attributes=$otherAttributes}
        {/if}
        {if $no_tabs != true}
        <span id="le_paneltype_{$idCount}" style="float:left;">
        &nbsp;&nbsp;{sugar_translate label="LBL_TABDEF_TYPE" module="ModuleBuilder"}&nbsp;{sugar_help text=$mod.LBL_TABDEF_TYPE_OPTION_HELP}:
        {/if}
        {if $idCounter == 1}
            {assign var="firstpanelid" value=$panelid}
            {assign var="firstpanelidcount" value=$idCount}
        {/if}
        {if $no_tabs != true}
        <select id="le_paneltype_select_{$idCount}" onchange="document.forms.prepareForSave.tabDefs_{$panelid}_newTab.value=this.value; showHideBox(this.value, {$idCount}, '{$panelid}', '{$firstpanelid}', {$firstpanelidcount});"
                title="{sugar_translate label="LBL_TABDEF_TYPE_HELP" module="ModuleBuilder"}">
          <option value="0" {if $tabDefs[$panel_upper].newTab == false}selected="selected"{/if}>{sugar_translate label="LBL_TABDEF_TYPE_OPTION_PANEL" module="ModuleBuilder"}</option>
          {if $disable_tabs != true}
          <option value="1" {if $tabDefs[$panel_upper].newTab == true}selected="selected"{/if}>{sugar_translate label="LBL_TABDEF_TYPE_OPTION_TAB" module="ModuleBuilder"}</option>
          {/if}
        </select>
        </span>
        {/if}
        {if $no_collapse != true}
        <span id="le_panelcollapse_{$idCount}" style="float:right;{if isset($tabDefs[$panel_upper].newTab) && $tabDefs[$panel_upper].newTab == true}display:none;{/if}">
        &nbsp;{sugar_translate label="LBL_TABDEF_COLLAPSE" module="ModuleBuilder"}{sugar_translate label="LBL_QUESTION_MARK"}
        <input type="checkbox" title="{sugar_translate label="LBL_TABDEF_COLLAPSE_HELP" module="ModuleBuilder"}" {if $tabDefs[$panel_upper].panelDefault == "collapsed"}checked="checked"{/if}
          onclick="if(this.checked) { document.forms.prepareForSave.tabDefs_{$panelid}_panelDefault.value='collapsed'; } else { document.forms.prepareForSave.tabDefs_{$panelid}_panelDefault.value='expanded';}" />
        </span>
        {/if}
        {counter name='idCount' assign='idCount' print=false}

        {foreach from=$panel item='row' key='rid'}
            <div class='le_row' id='{$idCount}'>
            {counter name='idCount' assign='idCount' print=false}

            {foreach from=$row item='col' key='cid'}
                {assign var="field" value=$col.name}
                <div class='le_field' data-name="{$col.name}" id='{$idCount}'>
                    {if ! $fromModuleBuilder && ($col.name != '(filler)')}
                        {capture assign="otherAttributes"}class="le_edit" style="float:right; cursor:pointer;" onclick="editFieldProperties('{$idCount}', '{$col.label|escape:'javascript'}');"{/capture}
                        {sugar_getimage name="edit_inline" ext=".gif" other_attributes=$otherAttributes}
                    {/if}

                    {if isset($col.type) && ($col.type == 'address')}
                        {$icon_address}
                    {/if}
                    {if isset($col.type) && ($col.type == 'phone')}
                        {$icon_phone}
                    {/if}
                    {if isset($field_defs.$field.calculated) && $field_defs.$field.calculated}
                        {sugar_getimage name="SugarLogic/icon_calculated" alt=$mod_strings.LBL_CALCULATED ext=".png" other_attributes='class="right_icon"'}
                    {/if}
                    {if isset($field_defs.$field.dependency) && $field_defs.$field.dependency}
                        {sugar_getimage name="SugarLogic/icon_dependent" ext=".png" alt=$mod_strings.LBL_DEPENDANT other_attributes='class="right_icon"'}
                    {/if}
                    <span id='le_label_{$idCount}'>
                    {eval var=$col.label assign='label'}
                    {if !empty($translate) && !empty($col.label)}
                        {sugar_translate label=$label module=$language}
                    {else}
		                {if !empty($current_mod_strings[$label])}
		                    {$current_mod_strings[$label]|escape:'html'}
		                {elseif !empty($mod[$label])}
		                    {$mod[$label]|escape:'html'}
		                {else}
		                	{$label|escape:'html'}
		                {/if}
		            {/if}{if !empty($col.fieldset)} **{/if}</span>
                    <span class='field_name'>{$col.name|escape:'html'}</span>
                    <span class='field_label'>{$col.label|escape:'html'}</span>
                    {if !empty($col.fieldset_fields)}
                    <span class='field_fieldset_fields' id='fieldset_{$idCount}'>
                        {foreach from=$col.fieldset_fields item='fsfield'}
                            {eval var=$fsfield.label assign='fslabel'}
                            {if !empty($translate) && !empty($fsfield.label)}
                                {sugar_translate label=$fslabel module=$language}
                            {else}
                                {if !empty($current_mod_strings[$fslabel])}
                                    {$current_mod_strings[$fslabel]|escape:'html'}
                                {elseif !empty($mod[$fslabel])}
                                    {$mod[$fslabel]|escape:'html'}
                                {else}
                                    {$fslabel|escape:'html'}
                                {/if}
                            {/if}<br>
                        {/foreach}
                    </span>
                    {/if}
                    <span id='le_tabindex_{$idCount}' class='field_tabindex'>{$col.tabindex}</span>
                </div>
                {counter name='idCount' assign='idCount' print=false}
            {/foreach}

        </div>
    {/foreach}

    </div>
    {counter name='idCounter' assign='idCounter' print=false}
{/foreach}

</div>
<input type='hidden' id='idCount' value='{$idCount}'>
</div>

<form name='prepareForSave' id='prepareForSave' action='index.php'>
{sugar_csrf_form_token}
<input type='hidden' name='module' value='ModuleBuilder'>
<input type='hidden' name='view_module' value='{$view_module}'>
<input type='hidden' name='view' value='{$view}'>
<input type='hidden' name="panels_as_tabs" value='{$displayAsTabs}'>
{foreach from=$layout item='panel' key='panelid'}
{capture name=panel_upper assign=panel_upper}{$panelid|upper}{/capture}
<input type="hidden" name="tabDefs_{$panelid}_newTab" value="{if $tabDefs[$panel_upper].newTab == true}1{else}0{/if}" />
<input type="hidden" name="tabDefs_{$panelid}_panelDefault" value="{$tabDefs[$panel_upper].panelDefault}" />
{/foreach}
<input type='hidden' name="sync_detail_and_edit" value='{$syncDetailEditViews}'>
<!-- BEGIN SUGARCRM flav=ent ONLY -->
{if $fromPortal}
    <input type='hidden' name='PORTAL' value='1'>
{/if}
<!-- END SUGARCRM flav=ent ONLY -->
{if $fromModuleBuilder}
    <input type='hidden' name='MB' value='1'>
    <input type='hidden' name='view_package' value='{$view_package}'>
{/if}
<input type='hidden' name='role' value='{$selected_role}'>
    <input type='hidden' name='layoutOption' value='{$selected_layoutOption}'>
    <input type='hidden' name='dropdownField' value='{$selected_dropdownField}'>
    <input type='hidden' name='dropdownValue' value='{$selected_dropdownValue}'>
<input type='hidden' name='to_pdf' value='1'>
</form>
<script>


Studio2.calcFieldList = {$calc_field_list};


var editPanelProperties = function (panelId, view) {
    panelId = "" + panelId;
	var key_label = document.getElementById('le_panelid_' + panelId).innerHTML.replace(/^\s+|\s+$/g,'');
	var value_label = document.getElementById('le_panelname_' + panelId).innerHTML.replace(/^\s+|\s+$/g,'');
	var params = "module=ModuleBuilder&action=editProperty&view_module=" + encodeURIComponent(ModuleBuilder.module)
	            + (ModuleBuilder.package ?  "&view_package=" + encodeURIComponent(ModuleBuilder.package) : "")
                + "&view=" + encodeURIComponent(view) + "&id_label=le_panelname_" + encodeURIComponent(panelId) + "&name_label=label_" + encodeURIComponent(key_label.toUpperCase())
                + "&title_label=" + encodeURIComponent(SUGAR.language.get("ModuleBuilder", "LBL_LABEL_TITLE")) + "&value_label=" + encodeURIComponent(value_label);
    ModuleBuilder.getContent(params);
};

var showHideBox = function (newTab, idCount, panelId, firstPanelId, firstPanelIdCount) {
    var collapseBox = document.getElementById('le_panelcollapse_' + idCount);
    if (newTab == "1") {
        collapseBox.style.display = 'none';
        if (idCount != firstPanelIdCount) {
            document.getElementById('le_paneltype_select_' + firstPanelIdCount).options[1].selected = true;
            document.getElementById('le_panelcollapse_' + firstPanelIdCount).style.display = 'none';
            document.forms.prepareForSave['tabDefs_' + firstPanelId + '_newTab'].value = '1';
            document.getElementById('le_paneltype_select_' + firstPanelIdCount).disabled = true;
        }
    }
    else {
        var elem = document.getElementById('prepareForSave').elements;
        var has_tab = false;
        collapseBox.style.display = 'block';
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].name.match(/^tabDefs_.*_newTab$/)) {
                if (elem[i].value == '1' && elem[i].name != panelId && elem[i].name != 'tabDefs_'+firstPanelId+'_newTab')
                    has_tab = true;
            }
        }
        if (has_tab == false) {
            document.getElementById('le_paneltype_select_' + firstPanelIdCount).disabled = false;
        }
    }
};


var editFieldProperties = function (idCount, label) {ldelim}
	var value_label = document.getElementById('le_label_' + idCount).innerHTML.replace(/^\s+|\s+$/g,''); 
	var value_tabindex = document.getElementById('le_tabindex_' + idCount).innerHTML.replace(/^\s+|\s+$/g,'');
	var title_label = '{sugar_translate label="LBL_LABEL_TITLE" module="ModuleBuilder"}';
	var title_tabindex = '{sugar_translate label="LBL_TAB_ORDER" module="ModuleBuilder"}';
	
	ModuleBuilder.getContent(
	  	'module=ModuleBuilder&action=editProperty'
	  + '&view_module={$view_module|escape:'url'}' + '{if $fromModuleBuilder}&view_package={$view_package}{/if}'
	  +	'&view={$view|escape:'url'}&id_label=le_label_' + encodeURIComponent(idCount) 
	  + '&name_label=label_' + encodeURIComponent(label) + '&title_label=' + encodeURIComponent(title_label)
	  + '&value_label=' + encodeURIComponent(value_label) + '&id_tabindex=le_tabindex_' + encodeURIComponent(idCount) 
	  + '&title_tabindex=' + encodeURIComponent(title_tabindex)
	  + '&name_tabindex=tabindex&value_tabindex=' + encodeURIComponent(value_tabindex) );
	
{rdelim}

Studio2.firstPanelId = "{$firstpanelid}";
Studio2.firstPanelIdCount = {$firstpanelidcount};
Studio2.init();
if('{$view}'.toLowerCase() != 'editview')
    ModuleBuilder.helpSetup('layoutEditor','default'+'{$view}'.toLowerCase());
if('{$from_mb}')
    ModuleBuilder.helpUnregisterByID('saveBtn');

ModuleBuilder.MBpackage = "{$view_package}";

Studio2.requiredFields = [{$required_fields}];

//rrs: this is for IE 7 which only supports javascript 1.6 and does not have indexOf support.
if (typeof new Array().indexOf == "undefined") {
  Array.prototype.indexOf = function (obj, start) {
    for (var i = (start || 0); i < this.length; i++) {
      if (this[i] == obj) {
        return i;
      }
    }
    return -1;
  }
}

ModuleBuilder.module = "{$view_module}";
ModuleBuilder.package={if $fromModuleBuilder}"{$view_package}"{else}false{/if};


ModuleBuilder.disablePopupPrompt = {if $syncDetailEditViews}{$syncDetailEditViews}{else}false{/if};
</script>

<div id="copy-from-contents" style="display: none">
    <label for="copy-from-options">{sugar_translate label="LBL_COPY_FROM" module="ModuleBuilder"}:&nbsp;</label>
    {html_options name="copy-from-options" id="copy-from-options" options=$copy_from_options}
</div>
