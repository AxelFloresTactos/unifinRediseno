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
            append_where_clause($where_clauses, 'first_name', 'users.first_name');
            append_where_clause($where_clauses, 'last_name', 'users.last_name');
            append_where_clause($where_clauses, 'user_name', 'users.user_name');

            $where = generate_where_statement($where_clauses);
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
        global $currentModule;
        global $sugar_version, $sugar_config;

        $output_html = '';
        $where = '';

        $where = $this->_get_where_clause();


        $first_name = empty($_REQUEST['first_name']) ? '' : $_REQUEST['first_name'];
        $last_name = empty($_REQUEST['last_name']) ? '' : $_REQUEST['last_name'];
        $user_name = empty($_REQUEST['user_name']) ? '' : $_REQUEST['user_name'];
        $request_data = empty($_REQUEST['request_data']) ? '' : $_REQUEST['request_data'];
        $hide_clear_button = empty($_REQUEST['hide_clear_button']) ? false : true;

        $button = "<form action='index.php' method='post' name='form' id='form'>\n";
        if (!$hide_clear_button) {
            $button .= "<input type='button' name='button' class='button' onclick=\"send_back('','');\" title='"
                . $app_strings['LBL_CLEAR_BUTTON_TITLE'] . "'  />\n";
        }
        $button .= "<input type='submit' name='button' class='button' onclick=\"window.close();\" title='"
            . $app_strings['LBL_CANCEL_BUTTON_TITLE'] . "' accesskey='"
            . $app_strings['LBL_CANCEL_BUTTON_KEY'] . "' value='  "
            . $app_strings['LBL_CANCEL_BUTTON_LABEL'] . "  ' />\n";
        $button .= "</form>\n";

        $form = new XTemplate('modules/Employees/Popup_picker.html');
        $form->assign('MOD', $mod_strings);
        $form->assign('APP', $app_strings);
        $form->assign('THEME', $theme);
        $form->assign('MODULE_NAME', $currentModule);
        $form->assign('FIRST_NAME', $first_name);
        $form->assign('LAST_NAME', $last_name);
        $form->assign('USER_NAME', $user_name);
        $form->assign('request_data', $request_data);

        ob_start();
        insert_popup_header($theme);
        $output_html .= ob_get_contents();
        ob_end_clean();

        $output_html .= get_form_header($mod_strings['LBL_SEARCH_FORM_TITLE'], '', false);

        $form->parse('main.SearchHeader');
        $output_html .= $form->text('main.SearchHeader');

        // Reset the sections that are already in the page so that they do not print again later.
        $form->reset('main.SearchHeader');

        // create the listview
        $seed_bean = BeanFactory::newBean('Employees');
        $ListView = new ListView();
        $ListView->show_export_button = false;
        $ListView->process_for_popups = true;
        $ListView->setXTemplate($form);
        $ListView->setHeaderTitle($mod_strings['LBL_LIST_FORM_TITLE']);
        $ListView->setHeaderText($button);
        $ListView->setQuery($where, '', 'user_name', 'EMPLOYEE');
        $ListView->setModStrings($mod_strings);

        ob_start();
        $ListView->processListView($seed_bean, 'main', 'EMPLOYEE');
        $output_html .= ob_get_contents();
        ob_end_clean();

        $output_html .= insert_popup_footer();
        return $output_html;
    }
} // end of class Popup_Picker
