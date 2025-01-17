<?php
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
/*********************************************************************************
 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


global $app_strings;
//we don't want the parent module's string file, but rather the string file specifc to this subpanel
global $current_language;
$current_module_strings = return_module_language($current_language, 'Opportunities');

global $currentModule;

global $theme;
global $focus;
global $action;


// focus_list is the means of passing data to a SubPanelView.
global $focus_list;

$button = "<form action='index.php' method='post' name='form' id='form'>\n";
$button .= "<input type='hidden' name='module' value='Opportunities'>\n";
if ($currentModule == 'Accounts') {
    $button .= "<input type='hidden' name='account_id' value='$focus->id'>\n<input type='hidden' name='account_name' value=\"" . urlencode($focus->name) . "\">\n";
}
if ($currentModule == 'Contacts') {
    $button .= "<input type='hidden' name='account_id' value='$focus->account_id'>\n<input type='hidden' name='account_name' value=\"" . urlencode($focus->account_name) . "\">\n";
    $button .= "<input type='hidden' name='contact_id' value='$focus->id'>\n";
}
$button .= "<input type='hidden' name='return_module' value='" . $currentModule . "'>\n";
$button .= "<input type='hidden' name='return_action' value='" . $action . "'>\n";
$button .= "<input type='hidden' name='return_id' value='" . $focus->id . "'>\n";
$button .= "<input type='hidden' name='action'>\n";

$button .= "<input title='" . $app_strings['LBL_NEW_BUTTON_TITLE'] . "' accessyKey='" . $app_strings['LBL_NEW_BUTTON_KEY'] . "' class='button' onclick=\"this.form.action.value='EditView'\" type='submit' name='New' value='  " . $app_strings['LBL_NEW_BUTTON_LABEL'] . "  '>\n";
if ($currentModule == 'Accounts') {
    ///////////////////////////////////////
    ///
    /// SETUP PARENT POPUP

    $popup_request_data = [
        'call_back_function' => 'set_return_and_save',
        'form_name' => 'DetailView',
        'field_to_name_array' => [
            'id' => 'opportunity_id',
        ],
    ];

    $json = getJSONobj();
    $encoded_popup_request_data = $json->encode($popup_request_data);

    //
    ///////////////////////////////////////

    $button .= "<input title='" . $app_strings['LBL_SELECT_BUTTON_TITLE']
        . "' accessyKey='" . $app_strings['LBL_SELECT_BUTTON_KEY']
        . "' type='button' class='button' value='  " . $app_strings['LBL_SELECT_BUTTON_LABEL']
        . "  ' name='button' onclick='open_popup(\"Opportunities\", 600, 400, \"\", false, true, {$encoded_popup_request_data});'>\n";
    //		."  ' name='button' onclick='window.open(\"index.php?module=Opportunities&action=Popup&html=Popup_picker&form=DetailView&form_submit=true\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'>\n";
} else {
    ///////////////////////////////////////
    ///
    /// SETUP PARENT POPUP

    $popup_request_data = [
        'call_back_function' => 'set_return_and_save',
        'form_name' => 'DetailView',
        'field_to_name_array' => [
            'id' => 'opportunity_id',
        ],
    ];

    $json = getJSONobj();
    $encoded_popup_request_data = $json->encode($popup_request_data);

    //
    ///////////////////////////////////////

    $button .= "<input title='" . $app_strings['LBL_SELECT_BUTTON_TITLE']
        . "' accessyKey='" . $app_strings['LBL_SELECT_BUTTON_KEY']
        . "' type='button' class='button' value='  " . $app_strings['LBL_SELECT_BUTTON_LABEL']
        . "  ' name='button' onclick='open_popup(\"Opportunities\", 600, 400, \"\", false, true, {$encoded_popup_request_data});'>\n";
    //		."  ' name='button' onclick='window.open(\"index.php?module=Opportunities&action=Popup&html=Popup_picker&form=ContactDetailView&form_submit=true&query=true&account_id=$focus->account_id&account_name=$focus->account_name\",\"new\",\"width=600,height=400,resizable=1,scrollbars=1\");'>\n";
}
$button .= "</form>\n";
$header_text = '';
$ListView = new ListView();
$ListView->initNewXTemplate('modules/Opportunities/SubPanelView.html', $current_module_strings);
$ListView->xTemplateAssign('RETURN_URL', '&return_module=' . $currentModule . "&return_action=DetailView&return_id={$_REQUEST['record']}");
$ListView->xTemplateAssign('EDIT_INLINE_PNG', SugarThemeRegistry::current()->getImage('edit_inline', 'align="absmiddle" border="0"', null, null, '.gif', $app_strings['LNK_EDIT']));
$ListView->setHeaderTitle($current_module_strings['LBL_MODULE_NAME'] . $header_text);
$ListView->setHeaderText($button);
$ListView->processListView($focus_list, 'main', 'OPPORTUNITY');
