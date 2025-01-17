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


class SugarWidgetSubPanelTopSelectButton extends SugarWidgetSubPanelTopButton
{
    /**
     * @var mixed|array<string, mixed>
     */
    public $button_properties;
    /**
     * @var string|mixed
     */
    public $accesskey;
    public $value;
    /**
     * @var mixed
     */
    public $module_name;
    protected $buttonSuffix = 'select_button';

    //button_properties is a collection of properties associated with the widget_class definition. layoutmanager
    public function __construct($button_properties = [])
    {
        $this->button_properties = $button_properties;
    }

    public function getDisplayName()
    {
        return $GLOBALS['app_strings']['LBL_SELECT_BUTTON_LABEL'];
    }

    public function display(array $widget_data, $additionalFormFields = [])
    {
        global $app_strings;

        /**
         * if module is hidden or subpanel for the module is hidden - doesn't show select button
         */
        if (SugarWidget::isModuleHidden($widget_data['module'])) {
            return '';
        }

        $initial_filter = '';

        $this->title = $this->getTitle();
        $this->accesskey = $this->getAccesskey();
        $this->value = $this->getDisplayName();

        if (is_array($this->button_properties)) {
            if (isset($this->button_properties['title'])) {
                $this->title = $app_strings[$this->button_properties['title']];
            }
            if (isset($this->button_properties['accesskey'])) {
                $this->accesskey = $app_strings[$this->button_properties['accesskey']];
            }
            if (isset($this->button_properties['form_value'])) {
                $this->value = $app_strings[$this->button_properties['form_value']];
            }
            if (isset($this->button_properties['module'])) {
                $this->module_name = $this->button_properties['module'];
            }
        }


        $focus = $widget_data['focus'];
        if (ACLController::moduleSupportsACL($widget_data['module']) && !ACLController::checkAccess($widget_data['module'], 'list', true)) {
            $button = ' <input type="button" name="' . $this->getWidgetId() . '" id="' . $this->getWidgetId() . '" class="button"' . "\n"
                . ' title="' . $this->title . '"'
                . ' value="' . $this->value . "\"\n"
                . ' disabled />';
            return $button;
        }

        //refresh the whole page after end of action?
        $refresh_page = 0;
        if (!empty($widget_data['subpanel_definition']->_instance_properties['refresh_page'])) {
            $refresh_page = 1;
        }

        $subpanel_definition = $widget_data['subpanel_definition'];
        $button_definition = $subpanel_definition->get_buttons();

        $subpanel_name = $subpanel_definition->get_name();
        if (empty($this->module_name)) {
            $this->module_name = $subpanel_definition->get_module_name();
        }
        $link_field_name = $subpanel_definition->get_data_source_name(true);
        $popup_mode = 'Single';
        if (isset($widget_data['mode'])) {
            $popup_mode = $widget_data['mode'];
        }
        if (isset($widget_data['initial_filter_fields'])) {
            if (is_array($widget_data['initial_filter_fields'])) {
                foreach ($widget_data['initial_filter_fields'] as $value => $alias) {
                    if (isset($focus->$value) and !empty($focus->$value)) {
                        $initial_filter .= '&' . $alias . '=' . urlencode($focus->$value);
                    }
                }
            }
        }
        $create = 'true';
        if (isset($widget_data['create'])) {
            $create = $widget_data['create'];
        }
        $return_module = $_REQUEST['module'];
        $return_action = 'SubPanelViewer';
        $return_id = $_REQUEST['record'];

        //field_to_name_array
        $fton_array = ['id' => 'subpanel_id'];
        if (isset($widget_data['field_to_name_array']) && is_array($widget_data['field_to_name_array'])) {
            $fton_array = array_merge($fton_array, $widget_data['field_to_name_array']);
        }

        $return_url = "index.php?module=$return_module&action=$return_action&subpanel=$subpanel_name&record=$return_id&sugar_body_only=1";

        $popup_request_data = [
            'call_back_function' => 'set_return_and_save_background',
            'form_name' => 'DetailView',
            'field_to_name_array' => $fton_array,
            'passthru_data' => [
                'child_field' => $subpanel_name,
                'return_url' => urlencode($return_url),
                'link_field_name' => $link_field_name,
                'module_name' => $subpanel_name,
                'refresh_page' => $refresh_page,
            ],
        ];

        // bugfix #57850 add marketing_id to the request data to allow filtering based on it
        if (!empty($_REQUEST['mkt_id'])) {
            $popup_request_data['passthru_data']['marketing_id'] = $_REQUEST['mkt_id'];
        }

        if (is_array($this->button_properties) && !empty($this->button_properties['add_to_passthru_data'])) {
            $popup_request_data['passthru_data'] = array_merge($popup_request_data['passthru_data'], $this->button_properties['add_to_passthru_data']);
        }

        if (is_array($this->button_properties) && !empty($this->button_properties['add_to_passthru_data']['return_type'])) {
            if ($this->button_properties['add_to_passthru_data']['return_type'] == 'report') {
                $initial_filter = '&module_name=' . urlencode($widget_data['module']);
            }
        }
        //acl_roles_users_selectuser_button

        $json_encoded_php_array = $this->_create_json_encoded_popup_request($popup_request_data);
        return ' <input type="button" name="' . $this->getWidgetId() . '" id="' . $this->getWidgetId() . '" class="button"' . "\n"
            . ' title="' . $this->title . '"'
            . ' value="' . $this->value . "\"\n"
            . " onclick='open_popup(\"$this->module_name\",600,400,\"$initial_filter\",true,true,$json_encoded_php_array,\"$popup_mode\",$create);' />\n";
    }

    /**
     * @return string
     */
    protected function getTitle()
    {
        return translate('LBL_SELECT_BUTTON_TITLE');
    }

    /**
     * @return string
     */
    protected function getAccesskey()
    {
        return translate('LBL_SELECT_BUTTON_KEY');
    }
}
