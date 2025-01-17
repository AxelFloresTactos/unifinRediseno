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
/******** general UI Stuff ***********/
require_once 'modules/Campaigns/utils.php';


global $app_strings;
global $timedate;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $sugar_version, $sugar_config;


/*************** GENERAL SETUP WORK **********/

$focus = BeanFactory::newBean('Campaigns');
if (!empty($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
}
if (isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
    $focus->id = '';
}
global $theme;


$json = getJSONobj();

$GLOBALS['log']->info('Campaign NewsLetter Wizard');

if ((isset($_REQUEST['wizardtype']) && $_REQUEST['wizardtype'] == 1) || ($focus->campaign_type == 'NewsLetter')) {
    echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], [$mod_strings['LBL_NEWSLETTER WIZARD_TITLE'] . $focus->name], true, false);
} else {
    echo getClassicModuleTitle($mod_strings['LBL_MODULE_NAME'], [$mod_strings['LBL_CAMPAIGN'] . $focus->name], true, false);
}


$ss = new Sugar_Smarty();
$ss->assign('MOD', $mod_strings);
$ss->assign('APP', $app_strings);

if (isset($_REQUEST['return_module'])) {
    $ss->assign('RETURN_MODULE', $_REQUEST['return_module']);
}
if (isset($_REQUEST['return_action'])) {
    $ss->assign('RETURN_ACTION', $_REQUEST['return_action']);
}
if (isset($_REQUEST['return_id'])) {
    $ss->assign('RETURN_ID', $_REQUEST['return_id']);
}
// handle Create $module then Cancel
if (empty($_REQUEST['return_id'])) {
    $ss->assign('RETURN_ACTION', 'index');
}

$qsd = QuickSearchDefaults::getQuickSearchDefaults();
$qsd->setFormName('wizform');
$sqs_objects = ['parent_name' => $qsd->getQSParent(),
    'assigned_user_name' => $qsd->getQSUser(),
    //'prospect_list_name' => getProspectListQSObjects(),
    'test_name' => getProspectListQSObjects('prospect_list_type_test', 'test_name', 'wiz_step3_test_name_id'),
    'unsubscription_name' => getProspectListQSObjects('prospect_list_type_exempt', 'unsubscription_name', 'wiz_step3_unsubscription_name_id'),
    'subscription_name' => getProspectListQSObjects('prospect_list_type_default', 'subscription_name', 'wiz_step3_subscription_name_id'),
];


$teamSetField = new SugarFieldTeamset('Teamset');
$teamSetField->initClassicView($focus->field_defs, 'wizform');
$sqs_objects = array_merge($sqs_objects, $teamSetField->getClassicViewQS());

$quicksearch_js = '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '</script>';

$ss->assign('JAVASCRIPT', $quicksearch_js);


//set the campaign type based on wizardtype value from request object
$campaign_type = 'newsletter';
if ((isset($_REQUEST['wizardtype']) && $_REQUEST['wizardtype'] == 1) || ($focus->campaign_type == 'NewsLetter')) {
    $campaign_type = 'newsletter';
    $ss->assign('CAMPAIGN_DIAGNOSTIC_LINK', diagnose());
} elseif ((isset($_REQUEST['wizardtype']) && $_REQUEST['wizardtype'] == 2) || ($focus->campaign_type == 'Email')) {
    $campaign_type = 'email';
    $ss->assign('CAMPAIGN_DIAGNOSTIC_LINK', diagnose());
} else {
    $campaign_type = 'general';
}


//******** CAMPAIGN HEADER AND BUDGET UI DIV Stuff (both divs) **********/
/// Users Popup
$popup_request_data = [
    'call_back_function' => 'set_return',
    'form_name' => 'wizform',
    'field_to_name_array' => [
        'id' => 'assigned_user_id',
        'user_name' => 'assigned_user_name',
    ],
];
$ss->assign('encoded_users_popup_request_data', $json->encode($popup_request_data));


$popup_request_data = [
    'call_back_function' => 'set_return',
    'form_name' => 'wizform',
    'field_to_name_array' => [
        'id' => 'team_id',
        'name' => 'team_name',
    ],
];
$ss->assign('encoded_team_popup_request_data', $json->encode($popup_request_data));

if (!empty($focus->budget)) {
    $focus->budget = SugarCurrency::formatAmountUserLocale($focus->budget, $focus->currency_id, false);
}
if (!empty($focus->actual_cost)) {
    $focus->actual_cost = SugarCurrency::formatAmountUserLocale($focus->actual_cost, $focus->currency_id, false);
}
if (!empty($focus->expected_cost)) {
    $focus->expected_cost = SugarCurrency::formatAmountUserLocale($focus->expected_cost, $focus->currency_id, false);
}
if (!empty($focus->expected_revenue)) {
    $focus->expected_revenue = SugarCurrency::formatAmountUserLocale($focus->expected_revenue, $focus->currency_id, false);
}

//set default values
$ss->assign('CALENDAR_LANG', 'en');
$ss->assign('USER_DATEFORMAT', '(' . $timedate->get_user_date_format() . ')');
$ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
$ss->assign('CAMP_DATE_ENTERED', $focus->date_entered);
$ss->assign('CAMP_DATE_MODIFIED', $focus->date_modified);
$ss->assign('CAMP_CREATED_BY', $focus->created_by_name);
$ss->assign('CAMP_MODIFIED_BY', $focus->modified_by_name);
$ss->assign('ID', $focus->id);
$ss->assign('CAMP_TRACKER_TEXT', $focus->tracker_text);
$ss->assign('CAMP_START_DATE', $focus->start_date);
$ss->assign('CAMP_END_DATE', $focus->end_date);
$ss->assign('CAMP_BUDGET', $focus->budget);
$ss->assign('CAMP_ACTUAL_COST', $focus->actual_cost);
$ss->assign('CAMP_EXPECTED_REVENUE', $focus->expected_revenue);
$ss->assign('CAMP_EXPECTED_COST', $focus->expected_cost);
$ss->assign('CAMP_OBJECTIVE', $focus->objective);
$ss->assign('CAMP_CONTENT', $focus->content);
$ss->assign('CAMP_NAME', $focus->name);
$ss->assign('CAMP_RECORD', $focus->id);
$ss->assign('CAMP_IMPRESSIONS', $focus->impressions);
if (empty($focus->assigned_user_id) && empty($focus->id)) {
    $focus->assigned_user_id = $current_user->id;
}
if (empty($focus->assigned_name) && empty($focus->id)) {
    $focus->assigned_user_name = $current_user->user_name;
}
$ss->assign('ASSIGNED_USER_OPTIONS', get_select_options_with_id(get_user_array(true, 'Active', $focus->assigned_user_id), $focus->assigned_user_id));
$ss->assign('ASSIGNED_USER_NAME', $focus->assigned_user_name);
$ss->assign('ASSIGNED_USER_ID', $focus->assigned_user_id);

if ((!isset($focus->status)) && (!isset($focus->id))) {
    $ss->assign('STATUS_OPTIONS', get_select_options_with_id($app_list_strings['campaign_status_dom'], 'Planning'));
} else {
    $ss->assign('STATUS_OPTIONS', get_select_options_with_id($app_list_strings['campaign_status_dom'], $focus->status));
}

//hide frequency options if this is not a newsletter
if ($campaign_type == 'newsletter') {
    $ss->assign('HIDE_FREQUENCY_IF_NEWSLETTER', 'Select');
    $ss->assign('FREQUENCY_LABEL', $mod_strings['LBL_CAMPAIGN_FREQUENCY']);
    if ((!isset($focus->frequency)) && (!isset($focus->id))) {
        $ss->assign('FREQ_OPTIONS', get_select_options_with_id($app_list_strings['newsletter_frequency_dom'], 'Monthly'));
    } else {
        $ss->assign('FREQ_OPTIONS', get_select_options_with_id($app_list_strings['newsletter_frequency_dom'], $focus->frequency));
    }
} else {
    $ss->assign('HIDE_FREQUENCY_IF_NEWSLETTER', "input type='hidden'");
    $ss->assign('FREQUENCY_LABEL', '&nbsp;');
}
global $current_user;
$currency = new ListCurrency();
if (isset($focus->currency_id) && !empty($focus->currency_id)) {
    $selectCurrency = $currency->getSelectOptions($focus->currency_id);
    $ss->assign('CURRENCY', $selectCurrency);
} elseif ($current_user->getPreference('currency') && !isset($focus->id)) {
    $selectCurrency = $currency->getSelectOptions($current_user->getPreference('currency'));
    $ss->assign('CURRENCY', $selectCurrency);
} else {
    $selectCurrency = $currency->getSelectOptions();
    $ss->assign('CURRENCY', $selectCurrency);
}
global $current_user;

if (empty($focus->id) && !isset($_REQUEST['isDuplicate'])) {
    $ss->assign('TEAM_OPTIONS', get_select_options_with_id(get_team_array(), $current_user->default_team));
    $ss->assign('TEAM_NAME', $current_user->default_team_name);
    $ss->assign('TEAM_ID', $current_user->default_team);
} else {
    $ss->assign('TEAM_OPTIONS', get_select_options_with_id(get_team_array(), $focus->team_id));
    $ss->assign('TEAM_NAME', $focus->team_name);
    $ss->assign('TEAM_ID', $focus->team_id);
}
echo $currency->getJavascript();

$seps = get_number_seperators();
$ss->assign('NUM_GRP_SEP', $seps[0]);
$ss->assign('DEC_SEP', $seps[1]);


//fill out the campaign type dropdown based on type of campaign being created
if ($campaign_type == 'general') {
    //get regular campaign dom object and strip out entries for email and newsletter
    $myTypeOptionsArr = [];
    $OptionsArr = $app_list_strings['campaign_type_dom'];
    foreach ($OptionsArr as $key => $val) {
        if ($val == 'Newsletter' || $val == 'Email' || $val == '') {
            //do not add
        } else {
            $myTypeOptionsArr[$key] = $val;
        }
    }

    //now create select option html without the newsletter/email, or blank ('') options
    $type_option_html = ' ';
    $selected = false;
    foreach ($myTypeOptionsArr as $optionKey => $optionName) {
        //if the selected flag is set to true, then just populate
        if ($selected) {
            $type_option_html .= "<option value='$optionKey' >$optionName</option>";
        } else {//if not selected yet, check to see if this option should be selected
            //if the campaign type is not empty, then select the retrieved type
            if (!empty($focus->campaign_type)) {
                //check to see if key matches campaign type
                if ($optionKey == $focus->campaign_type) {
                    //mark as selected
                    $type_option_html .= "<option value='$optionKey' selected>$optionName</option>";
                    //mark as selected for next time
                    $selected = true;
                } else {
                    //key does not match, just populate
                    $type_option_html .= "<option value='$optionKey' >$optionName</option>";
                }
            } else {
                //since the campaign type is empty, then select first one
                $type_option_html .= "<option value='$optionKey' selected>$optionName</option>";
                //mark as selected for next time
                $selected = true;
            }
        }
    }
    //assign the modified dropdown for general campaign creation
    $ss->assign('CAMPAIGN_TYPE_OPTIONS', $type_option_html);
    $ss->assign('SHOULD_TYPE_BE_DISABLED', 'select');
} elseif ($campaign_type == 'email') {
    //Assign Email as type of campaign being created an disable the select widget
    $ss->assign('CAMPAIGN_TYPE_OPTIONS', $mod_strings['LBL_EMAIL']);
    $ss->assign('SHOULD_TYPE_BE_DISABLED', "input type='hidden' value='Email'");
} else {
    //Assign NewsLetter as type of campaign being created an disable the select widget
    $ss->assign('CAMPAIGN_TYPE_OPTIONS', $mod_strings['LBL_NEWSLETTER']);
    $ss->assign('SHOULD_TYPE_BE_DISABLED', "input type='hidden' value='NewsLetter'");
}


/***************  TRACKER UI DIV Stuff ***************/
//retrieve the trackers
$focus->load_relationship('tracked_urls');

$trkr_lists = $focus->tracked_urls->get();
$trkr_html = '';
$ss->assign('TRACKER_COUNT', safeCount($trkr_lists));
if (safeCount($trkr_lists) > 0) {
    global $odd_bg, $even_bg, $hilite_bg;

    $trkr_count = 0;
    //create the html to create tracker table
    foreach ($trkr_lists as $trkr_id) {
        $ct_focus = BeanFactory::getBean('CampaignTrackers', $trkr_id);
        if (isset($ct_focus->tracker_name) && !empty($ct_focus->tracker_name)) {
            if ($ct_focus->is_optout) {
                $opt = 'checked';
            } else {
                $opt = '';
            }
            $trkr_html .= "<div id='existing_trkr" . $trkr_count . "'> <table width='100%' border='0' cellspacing='0' cellpadding='0'>";
            $trkr_html .= "<tr class='evenListRowS1'><td width='15%'><input name='wiz_step3_is_optout" . $trkr_count . "' title='" . $mod_strings['LBL_EDIT_OPT_OUT'] . $trkr_count . "' id='existing_is_optout" . $trkr_count . "' class='checkbox' type='checkbox' $opt  /><input name='wiz_step3_id" . $trkr_count . "' value='" . $ct_focus->id . "' id='existing_tracker_id" . $trkr_count . "'type='hidden''/></td>";
            $trkr_html .= "<td width='40%'> <input id='existing_tracker_name" . $trkr_count . "' type='text' size='20' maxlength='255' name='wiz_step3_tracker_name" . $trkr_count . "' title='" . $mod_strings['LBL_EDIT_TRACKER_NAME'] . $trkr_count . "' value='" . $ct_focus->tracker_name . "' ></td>";
            $trkr_html .= "<td width='40%'><input type='text' size='60' maxlength='255' name='wiz_step3_tracker_url" . $trkr_count . "' title='" . $mod_strings['LBL_EDIT_TRACKER_URL'] . $trkr_count . "' id='existing_tracker_url" . $trkr_count . "' value='" . $ct_focus->tracker_url . "' ></td>";
            $trkr_html .= "<td><a href='#' onclick=\"javascript:remove_existing_tracker('existing_trkr" . $trkr_count . "','" . $ct_focus->id . "'); \" >  ";
            $trkr_html .= SugarThemeRegistry::current()->getImage('delete_inline', "border='0'  align='absmiddle'", 12, 12, '.gif', $mod_strings['LBL_DELETE']) . '</a></td></tr></table></div>';
        }
        $trkr_count = $trkr_count + 1;
    }

    $trkr_html .= "<div id='no_trackers'></div>";
} else {
    $trkr_html .= "<div id='no_trackers'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr class='evenListRowS1'><td>" . $mod_strings['LBL_NONE'] . '</td></tr></table></div>';
}
$ss->assign('EXISTING_TRACKERS', $trkr_html);


/************** SUBSCRIPTION UI DIV Stuff ***************/
//fill in popups for target list options
$popup_request_data = [
    'call_back_function' => 'set_return',
    'form_name' => 'wizform',
    'field_to_name_array' => [
        'id' => 'wiz_step3_subscription_name_id',
        'name' => 'wiz_step3_subscription_name',

    ],
];

$json = getJSONobj();
$encoded_newsletter_popup_request_data = $json->encode($popup_request_data);
$ss->assign('encoded_subscription_popup_request_data', $encoded_newsletter_popup_request_data);

$popup_request_data = [
    'call_back_function' => 'set_return',
    'form_name' => 'wizform',
    'field_to_name_array' => [
        'id' => 'wiz_step3_unsubscription_name_id',
        'name' => 'unsubscription_name',

    ],
];

$json = getJSONobj();
$encoded_newsletter_popup_request_data = $json->encode($popup_request_data);
$ss->assign('encoded_unsubscription_popup_request_data', $encoded_newsletter_popup_request_data);

$popup_request_data = [
    'call_back_function' => 'set_return', //set_return_and_save_background
    'form_name' => 'wizform',
    'field_to_name_array' => [
        'id' => 'wiz_step3_test_name_id',
        'name' => 'test_name',

    ],
];

$json = getJSONobj();
$encoded_newsletter_popup_request_data = $json->encode($popup_request_data);
$ss->assign('encoded_test_popup_request_data', $encoded_newsletter_popup_request_data);


$popup_request_data = [
    'call_back_function' => 'set_return_prospect_list',
    'form_name' => 'wizform',
    'field_to_name_array' => [
        'id' => 'popup_target_list_id',
        'name' => 'popup_target_list_name',
        'list_type' => 'popup_target_list_type',

    ],
];

$json = getJSONobj();
$encoded_newsletter_popup_request_data = $json->encode($popup_request_data);
$ss->assign('encoded_target_list_popup_request_data', $encoded_newsletter_popup_request_data);

$ss->assign('TARGET_OPTIONS', get_select_options_with_id($app_list_strings['prospect_list_type_dom'], 'default'));

//retrieve the subscriptions
$focus->load_relationship('prospectlists');

$prospect_lists = $focus->prospectlists->get();

if ((isset($_REQUEST['wizardtype']) && $_REQUEST['wizardtype'] == 1) || ($focus->campaign_type == 'NewsLetter')) {
    //this is a newsletter type campaign, fill in subscription values

    //if prospect lists are returned, then iterate through and populate form values
    if (safeCount($prospect_lists) > 0) {
        foreach ($prospect_lists as $pl_id) {
            //retrieve prospect list
            $pl = BeanFactory::getBean('ProspectLists', $pl_id);

            if (isset($pl->list_type) && !empty($pl->list_type)) {
                //assign values based on type
                if (($pl->list_type == 'default') || ($pl->list_type == 'seed')) {
                    $ss->assign('SUBSCRIPTION_ID', $pl->id);
                    $ss->assign('SUBSCRIPTION_NAME', $pl->name);
                };
                if ($pl->list_type == 'exempt') {
                    $ss->assign('UNSUBSCRIPTION_ID', $pl->id);
                    $ss->assign('UNSUBSCRIPTION_NAME', $pl->name);
                };
                if ($pl->list_type == 'test') {
                    $ss->assign('TEST_ID', $pl->id);
                    $ss->assign('TEST_NAME', $pl->name);
                };
            }
        }
    }
} else {
    //this is not a newlsetter campaign, so fill in target list table
    //create array for javascript, this will help to display the option text, not the value
    $dom_txt = ' ';
    foreach ($app_list_strings['prospect_list_type_dom'] as $key => $val) {
        $dom_txt .= "if(trgt_type_text =='$key'){trgt_type_text='$val';}";
    }
    $ss->assign('PL_DOM_STMT', $dom_txt);
    $trgt_count = 0;
    $trgt_html = ' ';
    if (safeCount($prospect_lists) > 0) {
        foreach ($prospect_lists as $pl_id) {
            //retrieve prospect list
            $pl_focus = BeanFactory::getBean('ProspectLists', $pl_id);
            $trgt_html .= "<div id='existing_trgt" . $trgt_count . "'> <table class='tabDetailViewDL2' width='100%'>";
            $trgt_html .= "<td width='25%'> <input id='existing_target_name" . $trgt_count . "' type='hidden' type='text' size='60' maxlength='255' name='existing_target_name" . $trgt_count . "'  value='" . $pl_focus->name . "' >" . $pl_focus->name . '</td>';
            $trgt_html .= "<td width='25%'><input type='hidden' size='60' maxlength='255' name='existing_tracker_list_type" . $trgt_count . "'   id='existing_tracker_list_type" . $trgt_count . "' value='" . $pl_focus->list_type . "' >" . $app_list_strings['prospect_list_type_dom'][$pl_focus->list_type];
            $trgt_html .= "<input type='hidden' name='added_target_id" . $trgt_count . "' id='added_target_id" . $trgt_count . "' value='" . $pl_focus->id . "' ></td>";
            $trgt_html .= "<td><a href='#' onclick=\"javascript:remove_existing_target('existing_trgt" . $trgt_count . "','" . $pl_focus->id . "'); \" >  ";
            $trgt_html .= SugarThemeRegistry::current()->getImage('delete_inline', "border='0' align='absmiddle'", 12, 12, '.gif', $mod_strings['LBL_DELETE']) . '</a></td></tr></table></div>';


            $trgt_count = $trgt_count + 1;
        }

        $trgt_html .= "<div id='no_targets'></div>";
    } else {
        $trgt_html .= "<div id='no_targets'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr class='evenListRowS1'><td>" . $mod_strings['LBL_NONE'] . '</td></tr></table></div>';
    }
    $ss->assign('EXISTING_TARGETS', $trgt_html);
}


/**************************** WIZARD UI DIV Stuff *******************/
$mrkt_string = $mod_strings['LBL_NAVIGATION_MENU_MARKETING'];
if (!empty($focus->id)) {
    $mrkt_url = "<a  href='index.php?action=WizardMarketing&module=Campaigns&return_module=Campaigns&return_action=WizardHome";
    $mrkt_url .= '&return_id=' . $focus->id . '&campaign_id=' . $focus->id;
    $mrkt_url .= "'>" . $mrkt_string . '</a>';
    $mrkt_string = $mrkt_url;
}
$summ_url = $mod_strings['LBL_NAVIGATION_MENU_SUMMARY'];
if (!empty($focus->id)) {
    $summ_url = "<a  href='index.php?action=WizardHome&module=Campaigns";
    $summ_url .= '&return_id=' . $focus->id . '&record=' . $focus->id;
    $summ_url .= "'> " . $mod_strings['LBL_NAVIGATION_MENU_SUMMARY'] . '</a>';
}


$script_to_call = '';
if (!empty($focus->id)) {
    $script_to_call = 'link_navs(1,4);';
    if (isset($_REQUEST['direct_step']) and !empty($_REQUEST['direct_step'])) {
        $script_to_call .= '   direct(' . intval($_REQUEST['direct_step']) . ');';
    }
}
$ss->assign('HILITE_ALL', $script_to_call);


//  this is the wizard control script that resides in page
$divScript = <<<EOQ

 <script type="text/javascript" language="javascript">

    /*
     * this is the custom validation script that will call the right validation for each div
     */
    function validate_wiz_form(step){
        switch (step){
            case 'step1':
            if(!validate_step1()){return false;}
            break;
            case 'step2':
            if(!validate_step2()){return false;}
            break;
            default://no additional validation needed
        }
        return true;

    }

    showfirst('newsletter');
</script>
EOQ;

$ss->assign('DIV_JAVASCRIPT', $divScript);


$sshtml = ' ';
$i = 1;

//Create the html to fill in the wizard steps

if ($campaign_type == 'general') {
    $steps = create_campaign_steps();
    $ss->assign('NAV_ITEMS', create_wiz_menu_items($steps, 'campaign', $mrkt_string, $summ_url));
    $ss->assign('HIDE_CONTINUE', 'hidden');
} elseif ($campaign_type == 'email') {
    $steps = create_email_steps();
    $ss->assign('NAV_ITEMS', create_wiz_menu_items($steps, 'email', $mrkt_string, $summ_url));
    $ss->assign('HIDE_CONTINUE', 'submit');
} else {
    $steps = create_newsletter_steps();
    $ss->assign('NAV_ITEMS', create_wiz_menu_items($steps, 'newsletter', $mrkt_string, $summ_url));
    $ss->assign('HIDE_CONTINUE', 'submit');
}

$ss->assign('TOTAL_STEPS', safeCount($steps));
$sshtml = create_wiz_step_divs($steps, $ss);
$ss->assign('STEPS', $sshtml);


/**************************** FINAL END OF PAGE UI Stuff *******************/
$ss->display(SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardNewsletter.tpl'));

function create_common_wizard_steps()
{
    global $mod_strings;
    $steps = [];
    $steps[$mod_strings['LBL_NAVIGATION_MENU_GEN1']] = SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardCampaignHeader.tpl');
    $steps[$mod_strings['LBL_NAVIGATION_MENU_GEN2']] = SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardCampaignBudget.tpl');
    $steps[$mod_strings['LBL_NAVIGATION_MENU_TRACKERS']] = SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardCampaignTracker.tpl');
    return $steps;
}

function create_newsletter_steps()
{
    global $mod_strings;
    $steps = create_common_wizard_steps();
    $steps[$mod_strings['LBL_NAVIGATION_MENU_SUBSCRIPTIONS']] = SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardCampaignTargetList.tpl');
    return $steps;
}

function create_campaign_steps()
{
    global $mod_strings;
    $steps = create_common_wizard_steps();
    $steps[$mod_strings['LBL_TARGET_LISTS']] = SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardCampaignTargetListForNonNewsLetter.tpl');
    return $steps;
}

function create_email_steps()
{
    global $mod_strings;
    $steps = create_common_wizard_steps();
    $steps[$mod_strings['LBL_TARGET_LISTS']] = SugarAutoLoader::existingCustomOne('modules/Campaigns/tpls/WizardCampaignTargetListForNonNewsLetter.tpl');
    return $steps;
}


function create_wiz_step_divs($steps, $ss)
{

    //Assign the Teamset field
    $teamSetField = new SugarFieldTeamset('Teamset');
    $focus = BeanFactory::newBean('Campaigns');
    $code = $teamSetField->getClassicView($focus->field_defs, 'wizform');
    $ss->assign('TEAM_SET_FIELD', $code);
    $step_html = '';
    if (isset($steps) && !empty($steps)) {
        $i = 1;
        foreach ($steps as $name => $step) {
            $step_html .= "<p><div id='step$i'>";
            $step_html .= $ss->fetch($step);
            $step_html .= '</div></p>';
            $i = $i + 1;
        }
    }
    return $step_html;
}

function create_wiz_menu_items($steps, $type, $mrkt_string, $summ_url)
{
    $i = null;
    global $mod_strings;
    $nav_html = '<table border="0" cellspacing="0" cellpadding="0" width="100%" >';
    if (isset($steps) && !empty($steps)) {
        $i = 1;
        foreach ($steps as $name => $step) {
            $nav_html .= "<tr><td scope='row' nowrap><div id='nav_step$i'>$name</div></td></tr>";
            $i = $i + 1;
        }
    }
    if ($type == 'newsletter' || $type == 'email') {
        $nav_html .= "<tr><td scope='row' nowrap><div id='nav_step'" . ($i + 1) . ">$mrkt_string</div></td></tr>";
        $nav_html .= "<tr><td scope='row' nowrap><div id='nav_step'" . ($i + 2) . '>' . $mod_strings['LBL_NAVIGATION_MENU_SEND_EMAIL'] . '</div></li>';
        $nav_html .= "<tr><td scope='row' nowrap><div id='nav_step'" . ($i + 3) . '>' . $summ_url . '</div></td></tr>';
    } else {
        $nav_html .= "<tr><td scope='row' nowrap><div id='nav_step'" . ($i + 1) . '>' . $summ_url . '</div></td></tr>';
    }

    $nav_html .= '</table>';

    return $nav_html;
}
