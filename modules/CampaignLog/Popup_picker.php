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


global $theme;

class Popup_Picker
{
    /*
     *
     */
    // @codingStandardsIgnoreLine PSR2.Methods.MethodDeclaration.Underscore
    public function _get_where_clause()
    {
        $where = '';
        if (isset($_REQUEST['query'])) {
            $where_clauses = [];
            append_where_clause($where_clauses, 'target_id', 'campaign_log.target_id');
            //append_where_clause($where_clauses, "last_name", "prospects.last_name");

            $where = generate_where_statement($where_clauses);
            if (!empty($where)) {
                $where .= ' AND ';
            }
            $where .= " activity_type='targeted'";
        }

        return $where;
    }

    /**
     *
     */
    public function process_page()
    {
        global $theme;
        global $mod_strings;
        global $app_strings;
        global $app_list_strings;
        global $currentModule;
        global $sugar_version, $sugar_config;

        $output_html = '';
        $where = '';

        $where = $this->_get_where_clause();


        $first_name = empty($_REQUEST['first_name']) ? '' : $_REQUEST['first_name'];
        $last_name = empty($_REQUEST['last_name']) ? '' : $_REQUEST['last_name'];

        $request_data = empty($_REQUEST['request_data']) ? '' : $_REQUEST['request_data'];
        $hide_clear_button = empty($_REQUEST['hide_clear_button']) ? false : true;

        $button = "<form action='index.php' method='post' name='form' id='form'>\n";
        //START:FOR MULTI-SELECT
        $multi_select = false;
        if (!empty($_REQUEST['mode']) && strtoupper($_REQUEST['mode']) == 'MULTISELECT') {
            $multi_select = true;
            $button .= "<input type='button' name='button' class='button' onclick=\"send_back_selected('Prospects',document.MassUpdate,'mass[]','" . $app_strings['ERR_NOTHING_SELECTED'] . "');\" title='"
                . $app_strings['LBL_SELECT_BUTTON_TITLE'] . "' value='  "
                . $app_strings['LBL_SELECT_BUTTON_LABEL'] . "  ' />\n";
        }
        //END:FOR MULTI-SELECT
        if (!$hide_clear_button) {
            $button .= "<input type='button' name='button' class='button' onclick=\"send_back('','');\" title='"
                . $app_strings['LBL_CLEAR_BUTTON_TITLE'] . "' value='  "
                . $app_strings['LBL_CLEAR_BUTTON_LABEL'] . "  ' />\n";
        }
        $button .= "<input type='submit' name='button' class='button' onclick=\"window.close();\" title='"
            . $app_strings['LBL_CANCEL_BUTTON_TITLE'] . "' accesskey='"
            . $app_strings['LBL_CANCEL_BUTTON_KEY'] . "' value='  "
            . $app_strings['LBL_CANCEL_BUTTON_LABEL'] . "  ' />\n";
        $button .= "</form>\n";

        $form = new XTemplate('modules/CampaignLog/Popup_picker.html');
        $form->assign('MOD', $mod_strings);
        $form->assign('APP', $app_strings);
        $form->assign('THEME', $theme);
        $form->assign('MODULE_NAME', $currentModule);
        $form->assign('request_data', $request_data);


        ob_start();
        insert_popup_header($theme);
        $output_html .= ob_get_contents();
        ob_end_clean();

        //$output_html .= get_form_header($mod_strings['LBL_SEARCH_FORM_TITLE'], '', false);

        $form->parse('main.SearchHeader');
        $output_html .= $form->text('main.SearchHeader');

        // Reset the sections that are already in the page so that they do not print again later.
        $form->reset('main.SearchHeader');

        // create the listview
        $seed_bean = BeanFactory::newBean('CampaignLog');
        $ListView = new ListView();
        $ListView->show_export_button = false;
        $ListView->process_for_popups = true;
        $ListView->setXTemplate($form);
        $ListView->multi_select_popup = $multi_select;  //FOR MULTI-SELECT
        if ($multi_select) {
            $ListView->xTemplate->assign('TAG_TYPE', 'SPAN');
        } else {
            $ListView->xTemplate->assign('TAG_TYPE', 'A');//FOR MULTI-SELECT
        }
        //$ListView->setHeaderTitle($mod_strings['LBL_LIST_FORM_TITLE']); //FOR MULTI-SELECT
        //$ListView->setHeaderText($button); //FOR MULTI-SELECT
        $ListView->setQuery($where, '', 'campaign_name1', 'CAMPAIGNLOG');
        $ListView->setModStrings($mod_strings);

        ob_start();
        $output_html .= get_form_header($mod_strings['LBL_LIST_FORM_TITLE'], $button, false); //FOR MULTI-SELECT
        $ListView->processListView($seed_bean, 'main', 'CAMPAIGNLOG');
        $output_html .= ob_get_contents();
        ob_end_clean();

        $output_html .= insert_popup_footer();
        return $output_html;
    }
} // end of class Popup_Picker
