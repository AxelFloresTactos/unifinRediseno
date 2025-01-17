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

//include tree view classes.
require_once 'vendor/ytree/Tree.php';
require_once 'vendor/ytree/Node.php';

require_once 'modules/Documents/TreeData.php';

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
            append_where_clause($where_clauses, 'document_name', 'documents.document_name');
            append_where_clause($where_clauses, 'category_id', 'documents.category_id');
            append_where_clause($where_clauses, 'subcategory_id', 'documents.subcategory_id');
            append_where_clause($where_clauses, 'template_type', 'documents.template_type');
            append_where_clause($where_clauses, 'is_template', 'documents.is_template');

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
        global $app_list_strings;
        global $sugar_config;

        $b_from_documents = false;
        if (isset($_REQUEST['caller']) && $_REQUEST['caller'] == 'Documents') {
            $b_from_documents = true;
        }

        //initalize template
        $form = new XTemplate('modules/Documents/Popup_picker.html');
        $form->assign('MOD', $mod_strings);
        $form->assign('APP', $app_strings);
        $form->assign('THEME', $theme);
        $form->assign('MODULE_NAME', $currentModule);

        //tree header.
        $doctree = new Tree('doctree');
        $doctree->set_param('module', 'Documents');
        if ($b_from_documents) {
            $doctree->set_param('caller', 'Documents');
            $href_string = "javascript:populate_parent_search('doctree')";
        } else {
            $href_string = "javascript:populate_search('doctree')";
        }

        $nodes = get_category_nodes($href_string);
        foreach ($nodes as $node) {
            $doctree->add_node($node);
        }
        $form->assign('TREEHEADER', $doctree->generate_header());
        $form->assign('TREEINSTANCE', $doctree->generate_nodes_array());

        $site_data = '<script> var site_url= {"site_url":"' . getJavascriptSiteURL() . "\"};</script>\n";
        $form->assign('SITEURL', $site_data);

        $form->parse('main.SearchHeader.TreeView');
        $treehtml = $form->text('main.SearchHeader.TreeView');
        $form->reset('main.SearchHeader.TreeView');
        //end tree

        if (isset($_REQUEST['caller']) && $_REQUEST['caller'] == 'Documents') {
            ///process treeview and return.
            return insert_popup_header($theme) . $treehtml . insert_popup_footer();
        }

        ////////////////////////process full search form and list view.//////////////////////////////
        $output_html = '';
        $where = '';
        $where = $this->_get_where_clause();


        $name = empty($_REQUEST['name']) ? '' : $_REQUEST['name'];
        $document_name = empty($_REQUEST['document_name']) ? '' : $_REQUEST['document_name'];
        $category_id = empty($_REQUEST['category_id']) ? '' : $_REQUEST['category_id'];
        $subcategory_id = empty($_REQUEST['subcategory_id']) ? '' : $_REQUEST['subcategory_id'];
        $template_type = empty($_REQUEST['template_type']) ? '' : $_REQUEST['template_type'];
        $is_template = empty($_REQUEST['is_template']) ? '' : $_REQUEST['is_template'];
        $request_data = empty($_REQUEST['request_data']) ? '' : $_REQUEST['request_data'];


        $hide_clear_button = empty($_REQUEST['hide_clear_button']) ? false : true;
        $button = "<form action='index.php' method='post' name='form' id='form'>\n";
        if (!$hide_clear_button) {
            $button .= "<input type='button' name='button' class='button' onclick=\"send_back('','');\" title='"
                . $app_strings['LBL_CLEAR_BUTTON_TITLE'] . "'  value='  "
                . $app_strings['LBL_CLEAR_BUTTON_LABEL'] . "  ' />\n";
        }
        $button .= "<input type='submit' name='button' class='button' onclick=\"window.close();\" title='"
            . $app_strings['LBL_CANCEL_BUTTON_TITLE'] . "' accesskey='"
            . $app_strings['LBL_CANCEL_BUTTON_KEY'] . "' value='  "
            . $app_strings['LBL_CANCEL_BUTTON_LABEL'] . "  ' />\n";
        $button .= "</form>\n";

        $form->assign('NAME', $name);
        $form->assign('DOCUMENT_NAME', $document_name);
        $form->assign('request_data', $request_data);
        $form->assign('CATEGORY_OPTIONS', get_select_options_with_id($app_list_strings['document_category_dom'], $category_id));
        $form->assign('SUB_CATEGORY_OPTIONS', get_select_options_with_id($app_list_strings['document_subcategory_dom'], $subcategory_id));
        $form->assign('IS_TEMPLATE_OPTIONS', get_select_options_with_id($app_list_strings['checkbox_dom'], $is_template));
        $form->assign('TEMPLATE_TYPE_OPTIONS', get_select_options_with_id($app_list_strings['document_template_type_dom'], $template_type));


        ob_start();
        insert_popup_header($theme);
        $output_html .= ob_get_contents();
        ob_end_clean();

        $output_html .= get_form_header($mod_strings['LBL_SEARCH_FORM_TITLE'], '', false);

        $form->parse('main.SearchHeader');
        $output_html .= $form->text('main.SearchHeader');

        // Reset the sections that are already in the page so that they do not print again later.
        $form->reset('main.SearchHeader');

        //add tree view to output_html.
        $output_html .= $treehtml;

        // create the listview
        $seed_bean = BeanFactory::newBean('Documents');
        $ListView = new ListView();
        $ListView->show_select_menu = false;
        $ListView->show_delete_button = false;
        $ListView->show_export_button = false;
        $ListView->process_for_popups = true;
        $ListView->setXTemplate($form);
        $ListView->setHeaderTitle($mod_strings['LBL_LIST_FORM_TITLE']);
        $ListView->setHeaderText($button);
        $ListView->setQuery($where, '', 'document_name', 'DOCUMENT');
        $ListView->setModStrings($mod_strings);

        ob_start();
        $ListView->processListView($seed_bean, 'main', 'DOCUMENT');
        $output_html .= ob_get_contents();
        ob_end_clean();

        $output_html .= insert_popup_footer();
        return $output_html;
    }
} // end of class Popup_Picker
