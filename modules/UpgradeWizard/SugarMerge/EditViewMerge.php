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
 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

/**
 * This is the base class that all other SugarMerge objects extend
 *
 */
class EditViewMerge
{
    /**
     * @var mixed|mixed[]
     */
    public $mergeData;
    /**
     * @var int|string
     */
    public $defaulPanel;
    /**
     * The variable name that is used with the file for example in editviewdefs and detailviewdefs it is $viewdefs
     *
     * @var STRING
     */
    protected $varName = 'viewdefs';
    /**
     * Enter the name of the parameter used in the $varName for example in editviewdefs and detailviewdefs it is 'EditView' and 'DetailView' respectively - $viewdefs['EditView']
     *
     * @var STRING
     */
    protected $viewDefs = 'EditView';
    /**
     * this will store the meta data for the original file
     *
     * @var ARRAY
     */
    protected $originalData = [];
    /**
     * this will store the meta data for the new file
     *
     * @var ARRAY
     */
    protected $newData = [];
    /**
     * this will store the meta data for the custom file
     *
     * @var ARRAY
     */
    protected $customData = [];
    /**
     * this will store an associative array contianing all the fields that are used in the original meta data file
     *
     * @var ARRAY
     */
    protected $originalFields = [];
    /**
     * this will store an associative array contianing all the fields that are used in the new meta data file
     *
     * @var ARRAY
     */
    protected $newFields = [];
    /**
     * this will store an associative array contianing all the fields that are used in the custom meta data file
     *
     * @var ARRAY
     */
    protected $customFields = [];
    /**
     * this will store an associative array contianing all the merged fields
     *
     * @var ARRAY
     */
    protected $mergedFields = [];
    /**
     * the name of the module to be merged
     *
     * @var STRING
     */
    protected $module = 'module';
    /**
     * the max number of columns for this view
     *
     * @var INT
     */
    protected $maxCols = 2;
    /**
     * If we should use the best match algorithim
     *
     * @var BOOLEAN
     */
    protected $bestMatch = true;
    /**
     * The default panel we place the fields in if we aren't using the best match algorithim
     *
     * @var STRING
     */
    protected $defaultPanel = 'default';
    /**
     * The name of the panels section in the meta data
     *
     * @var STRING
     */
    protected $panelName = 'panels';
    /**
     * The name of the templateMeta data secion in the meta data
     */
    protected $templateMetaName = 'templateMeta';
    /**
     * The file pointer to log to if set to NULL it will use the GLOBALS['log'] if available and log to debug
     *
     * @var FILEPOINTER
     */
    protected $fp = null;


    /**
     * Determines if getFields should analyze panels to determine if it is a MultiPanel
     *
     * @var unknown_type
     */
    protected $scanForMultiPanel = true;

    /**
     * If true then it works as though it's a multipanel
     *
     * @var BOOLEAN
     */
    protected $isMultiPanel = true;


    /**
     * The ids of the panels found in custom metadata fuke
     *
     */
    protected $customPanelIds = [];


    /**
     * The ids of the panels found in original metadata fuke
     *
     */
    protected $originalPanelIds = [];


    /**
     * The ids of the panels found in original metadata fuke
     *
     */
    protected $newPanelIds = [];


    /**
     * Special case conversion
     *
     */
    protected $fieldConversionMapping = [
        'Campaigns' => ['created_by_name' => 'date_entered', 'modified_by_name' => 'date_modified'],
        'Cases' => ['created_by_name' => 'date_entered', 'modified_by_name' => 'date_modified'],
        'Contracts' => ['created_by_name' => 'date_entered', 'modified_by_name' => 'date_modified'],
        'Leads' => ['created_by' => 'date_entered'],
        'Meetings' => ['created_by_name' => 'date_entered', 'modified_by_name' => 'date_modified'],
        'ProspectLists' => ['created_by_name' => 'date_entered', 'modified_by_name' => 'date_modified'],
        'Prospects' => ['created_by_name' => 'date_entered', 'modified_by_name' => 'date_modified'],
    ];

    /*
     * In order to maintain changes to buttons, customcode, ect during upgrade
     * we will now take existing custom values for useTabs, tabDefs and
     * syncDetailEditViews for all modules. Everything else comes from the
     * new viewdefs. - rgonzalez
     */
    protected $templateMetaVarsToMerge = ['useTabs', 'tabDefs', 'syncDetailEditViews'];

    /**
     * Clears out the values of the arrays so that the same object can be utilized
     *
     */
    protected function clear()
    {
        unset($this->newData);
        $this->newData = [];
        unset($this->customData);
        $this->customData = [];
        unset($this->originalData);
        $this->originalData = [];
        unset($this->newFields);
        $this->newFields = [];
        unset($this->customFields);
        $this->customFields = [];
        unset($this->originalFields);
        $this->originalFields = [];
        unset($this->mergedFields);
        $this->mergedFields = [];
        unset($this->mergeData);
        $this->mergeData = [];
        $this->defaultPanel = 'default';
    }

    /**
     * Allows the user to choose to use the best match algorithim or not
     *
     * @param BOOLEAN $on
     */
    public function setBestMatch($on = true)
    {
        $this->bestMatch = $on;
    }


    /**
     * Allows users to set the name to use as the default panel in the meta data
     *
     * @param STRING $name - name of the default panel
     */
    public function setDefaultPanel($name = 'default')
    {
        $this->defaultPanel = $name;
    }

    /**
     * Allows the user to set a filepointer that is already open to log to
     *
     * @param FILEPOINTER $fp
     */
    public function setLogFilePointer($fp)
    {
        $this->fp = $fp;
    }

    /**
     * opens the file with the 'a' parameter and use it to log messages to
     *
     * @param STRING $file - path to file we wish to log to
     */
    public function setLogFile($file)
    {
        $this->fp = fopen($file, 'a');
    }

    /**
     * returns true if $val1 and $val2 match otherwise it returns false
     *
     * @param MULTI $val1 - a value to compare to val2
     * @param MULTI $val2 - a value to compare to val1
     * @return BOOLEAN - if $val1 and $val2 match
     */
    protected function areMatchingValues($val1, $val2)
    {
        if (!is_array($val1)) {
            //if val2 is an array and val1 isn't then it isn't a match
            if (is_array($val2)) {
                return false;
            }
            //otherwise both are not arrays so we can return a comparison between them
            return $val1 == $val2;
        } else {
            //if val1 is an array and val2 isn't then it isn't a match
            if (!is_array($val2)) {
                return false;
            }
        }
        foreach ($val1 as $k => $v) {
            if (!isset($val2[$k])) {
                return false;
            }
            if (!$this->areMatchingValues($val1[$k], $val2[$k])) {
                return false;
            }
            unset($val2[$k]);
            unset($val1[$k]);
        }
        //this implies that there are still values left  so the two must not match since we unset any matching values
        if (!empty($val2)) {
            return false;
        }
        return true;
    }

    /**
     * Recursiveley merges two arrays
     *
     * @param ARRAY $gimp - if keys match this arrays values are overriden
     * @param ARRAY $dom - if keys match this arrays values will override the others
     * @return ARRAY $merged - the merges array
     */
    public function arrayMerge($gimp, $dom)
    {
        if (is_array($gimp) && is_array($dom)) {
            foreach ($dom as $domKey => $domVal) {
                if (isset($gimp[$domKey])) {
                    if (is_array($domVal)) {
                        $gimp[$domKey] = $this->arrayMerge($gimp[$domKey], $dom[$domKey]);
                    } else {
                        $gimp[$domKey] = $domVal;
                    }
                } else {
                    $gimp[$domKey] = $domVal;
                }
            }
        }
        return $gimp;
    }

    /**
     * Merges the meta data of a single field
     *
     * @param ARRAY $orig - the original meta-data for this field
     * @param ARRAY $new - the new meta-data for this field
     * @param ARRAY $custom - the custom meta-data for this field
     * @return ARRAY $merged - the merged meta-data
     */
    protected function mergeField($orig, $new, $custom)
    {
        $orig_custom = $this->areMatchingValues($orig, $custom);
        $new_custom = $this->areMatchingValues($new, $custom);
        // if both are true then there is nothing to merge since all three fields match
        if (!($orig_custom && $new_custom)) {
            $this->log('merging field');
            $this->log('original meta-data');
            $this->log($orig);
            $this->log('new meta-data');
            $this->log($new);
            $this->log('custom meta-data');
            $this->log($custom);
            $this->log('merged meta-data');
            $log = true;
        } else {
            return $new;
        }
        //if orignal and custom match always take the new value or if new and custom match
        if ($orig_custom || $new_custom) {
            $this->log($new);
            return $new;
        }
        //if original and new match always take the custom
        if ($this->areMatchingValues($orig, $new)) {
            $this->log($custom);
            return $custom;
        }

        if (is_array($custom)) {
            //if both new and custom are arrays then at this point new != custom and orig != custom and orig != new  so let's merge the custom and the new and return that
            if (is_array($new)) {
                $new = $this->arrayMerge($custom, $new);
                $this->log($new);
                return $new;
            } else {
                //otherwise we know that new is not an array and custom has been 'customized' so let's keep those customizations.
                $this->log($custom);
                return $custom;
            }
        }
        //default to returning the New version of the field
        $this->log($new);
        return $new;
    }

    /**
     * Merges the fields together and stores them in $this->mergedFields
     *
     */
    protected function mergeFields()
    {
        foreach ($this->customFields as $field => $data) {
            //if we have this field in both the new fields and the original fields - it has existed since the last install/upgrade
            if (isset($this->newFields[$field]) && isset($this->originalFields[$field])) {
                //if both the custom field and the original match then we take the location of the custom field since it hasn't moved
                $loc = $this->customFields[$field]['loc'];
                $loc['source'] = 'custom';

                $do_merge = true;

                //Address fields present a special problem...
                if (preg_match('/(alt_|primary_|billing_|shipping_)address_street/i', $field, $matches)) {
                    $prefix = $matches[1];
                    $city = $prefix . 'address_city';
                    $postal_code = $prefix . 'address_postalcode';
                    $state = $prefix . 'address_state';
                    $country = $prefix . 'address_country';

                    if (isset($this->customFields[$city]) ||
                        isset($this->customFields[$postal_code]) ||
                        isset($this->customFields[$state]) ||
                        isset($this->customFields[$country])) {
                        $do_merge = false;
                        $this->mergedFields[$field] = [
                            'data' => $this->customFields[$field]['data'],
                            'loc' => $loc];
                    }
                }

                if ($do_merge) {
                    //but we still merge the meta data of the three
                    $this->mergedFields[$field] = [
                        'data' => $this->mergeField($this->originalFields[$field]['data'], $this->newFields[$field]['data'], $this->customFields[$field]['data']),
                        'loc' => $loc];
                }
                //if it's not set in the new fields then it was a custom field or an original field so we take the custom fields data and set the location source to custom
            } elseif (!isset($this->newFields[$field])) {
                $this->mergedFields[$field] = $data;
                $this->mergedFields[$field]['loc']['source'] = 'custom';
            } else {
                //otherwise  the field is in both new and custom but not in the orignal so we merge the new and custom data together and take the location from the custom
                $this->mergedFields[$field] = [
                    'data' => $this->mergeField('', $this->newFields[$field]['data'], $this->customFields[$field]['data']),
                    'loc' => $this->customFields[$field]['loc']];

                $this->mergedFields[$field]['loc']['source'] = 'custom';
            }

            //then we clear out the field from
            unset($this->originalFields[$field]);
            unset($this->customFields[$field]);
            unset($this->newFields[$field]);
        }


        /**
         * These are fields that were removed by the customer
         */
        foreach ($this->originalFields as $field => $data) {
            unset($this->originalFields[$field]);
            unset($this->newFields[$field]);
        }

        /**
         * These are fields that were added by sugar
         */
        $new_field_panel = $this->defaultPanel;
        foreach ($this->customPanelIds as $custom_panel_ids => $panels) {
            $new_field_panel = $custom_panel_ids;
        }

        foreach ($this->newFields as $field => $data) {
            $data['loc']['source'] = 'new';
            $data['loc']['panel'] = $new_field_panel;
            $this->mergedFields[$field] = [
                'data' => $data['data'],
                'loc' => $data['loc']];
            unset($this->newFields[$field]);
        }
    }

    /**
     * Walks through the merged fields and places them in the appropriate place based on their location parameter as well as the choosen algorithim
     *
     * @return ARRAY $panels - the new panels section for the merged file
     */
    protected function buildPanels()
    {
        $panels = [];

        $panel_keys = array_keys($this->customPanelIds);
        $this->defaultPanel = end($panel_keys);

        foreach ($this->mergedFields as $field_id => $field) {
            //If this field is in a panel not defined in the custom layout, set it to default panel
            if (!isset($this->customPanelIds[$field['loc']['panel']])) {
                $field['loc']['panel'] = $this->defaultPanel;
            }

            if ($field['loc']['source'] == 'new') {
                if ($this->bestMatch) {
                    //for best match as long as the column is filled let's keep walking down till we can fill it
                    $keys = array_keys(
                        $this->customData[$this->module][$this->viewDefs][$this->panelName][$field['loc']['panel']]
                    );
                    $row = end($keys);
                    $col = 0;
                    while (!empty($panels[$field['loc']['panel']][$row][$col])) {
                        $col++;
                        if ($col == 2) {
                            $row++;
                            $col = 0;
                        }
                    }
                    //row should be at a point that there is no field in this location
                    $panels[$field['loc']['panel']][$row][$col] = $field['data'];
                } else {
                    //so for not best match we place it in the default panel at the first available column for the row
                    $row = 0;
                    while (!empty($panels[$this->defaultPanel][$row][$field['loc']['col']])) {
                        $row++;
                    }
                    $panels[$field['loc']['panel']][$row][$field['loc']['col']] = $field['data'];
                }
            } else {
                $panels[$field['loc']['panel']][$field['loc']['row']][$field['loc']['col']] = $field['data'];
            }
        }

        foreach ($panels as $k => $panel) {
            foreach ($panel as $r => $row) {
                ksort($panels[$k][$r]);
            }
            ksort($panels[$k]);
        }

        return $panels;
    }

    /**
     * Merge the templateMeta entry for the view defs.  Only merge studio accessible
     * changes to the templateMeta. Upgrade entries should take precedence in all other
     * cases.
     */
    protected function mergeTemplateMeta()
    {
        if (isset($this->customData[$this->module][$this->viewDefs][$this->templateMetaName])
            && is_array($this->customData[$this->module][$this->viewDefs][$this->templateMetaName])
        ) {
            $custTM = &$this->customData[$this->module][$this->viewDefs][$this->templateMetaName];
            $newTM = &$this->newData[$this->module][$this->viewDefs][$this->templateMetaName];
            $oldTM = &$this->originalData[$this->module][$this->viewDefs][$this->templateMetaName];
            foreach ($custTM as $key => $value) {
                //Some sections we can always clone from custom to new
                if ($this->safeInArray($key, $this->templateMetaVarsToMerge)) {
                    $newTM[$key] = $value;
                } //Check for entire sections that were removed and skip taking the custom version
                elseif (isset($oldTM[$key]) && !isset($newTM[$key])) {
                    continue;
                } //3-way merge
                elseif (is_array($value)) {
                    $newTM[$key] = MergeUtils::deepMergeDef(
                        $oldTM[$key] ?? [],
                        $newTM[$key] ?? [],
                        $value
                    );
                } //If the value didn't change, keep the custom version
                else {
                    if ((empty($newTM[$key]) && empty($oldTM[$key]))
                        || (!empty($newTM[$key]) && !empty($oldTM[$key]) && $newTM[$key] == $oldTM[$key])
                    ) {
                        $newTM[$key] = $value;
                    }
                }
            }
        }
    }


    /**
     * Sets the panel section for the meta-data after it has been merged
     *
     */
    protected function setPanels()
    {
        $this->newData[$this->module][$this->viewDefs][$this->panelName] = $this->buildPanels();
    }

    /**
     * Parses out the fields for each files meta data and then calls on mergeFields and setPanels
     *
     */
    protected function mergeMetaData()
    {
        $this->originalFields = $this->getFields($this->originalData[$this->module][$this->viewDefs][$this->panelName]);
        $this->originalPanelIds = $this->getPanelIds($this->originalData[$this->module][$this->viewDefs][$this->panelName]);
        $this->customFields = $this->getFields($this->customData[$this->module][$this->viewDefs][$this->panelName]);
        $this->customPanelIds = $this->getPanelIds($this->customData[$this->module][$this->viewDefs][$this->panelName]);
        $this->newFields = $this->getFields($this->newData[$this->module][$this->viewDefs][$this->panelName]);
        $this->newPanelIds = $this->getPanelIds($this->newData[$this->module][$this->viewDefs][$this->panelName]);
        $this->mergeFields();
        $this->mergeTemplateMeta();
        $this->setPanels();
    }

    /**
     * This takes in a  list of panels and returns an associative array of field names to the meta-data of the field as well as the locations of that field
     *
     * @param ARRAY $panels - this is the 'panel' section of the meta-data
     * @return ARRAY $fields - an associate array of fields and their meta-data as well as their location
     */
    protected function getFields(&$panels)
    {

        $fields = [];
        $blanks = 0;
        $setDefaultPanel = false;

        if (!is_array($panels)) {
            return $fields;
        }
        if (count($panels) == 1) {
            $arrayKeys = array_keys($panels);
            if (!empty($arrayKeys[0])) {
                $this->defaultPanel = $arrayKeys[0];
                $panels = $panels[$arrayKeys[0]];
            } else {
                $panels = $panels[''];
            }
            $setDefaultPanel = true;
        }

        if ($this->scanForMultiPanel) {
            require_once 'include/SugarFields/Parsers/MetaParser.php';
            if ($setDefaultPanel || !MetaParser::hasMultiplePanels($panels)) {
                $panels = [$this->defaultPanel => $panels];
                $this->isMultiPanel = false;
            }
        }

        foreach ($panels as $panel_id => $panel) {
            foreach ($panel as $row_id => $rows) {
                foreach ($rows as $col_id => $col) {
                    if (empty($col)) {
                        $field_name = 'BLANK_' . $blanks;
                        $blanks++;
                    } else {
                        $field_name = is_array($col) && isset($col['name']) ? $col['name'] : $col;
                        if (is_array($col)) {
                            if (!empty($col['name'])) {
                                $field_name = $col['name'];
                            }
                        } else {
                            $field_name = $col;
                        }
                    }

                    if (is_string($field_name)) {
                        // We need to replace all instances of the fake uploadfile and filename field that has custom code with the real filename field
                        if (!empty($col['customCode'])) {
                            if ($field_name == 'uploadfile') {
                                $replaceField = false;
                                if (!empty($col['customCode'])) {
                                    $replaceField = true;
                                    unset($col['customCode']);
                                }

                                if (!empty($col['displayParams']) && !empty($col['displayParams']['link'])) {
                                    $replaceField = true;
                                }

                                if ($replaceField) {
                                    $field_name = 'filename';
                                    $col['name'] = 'filename';
                                }
                            } elseif ($field_name == 'filename') {
                                $col = 'filename';
                            }
                        }

                        $fields[$field_name] = ['data' => $col, 'loc' => ['panel' => "{$panel_id}", 'row' => "{$row_id}", 'col' => "{$col_id}"]];
                    }
                }
            }
        }

        return $fields;
    }


    /**
     * getPanelIds
     *
     */
    protected function getPanelIds($panels)
    {

        $panel_ids = [];
        $setDefaultPanel = false;

        if (safeCount($panels) == 1) {
            $arrayKeys = array_keys($panels);
            if (!empty($arrayKeys[0])) {
                $this->defaulPanel = $arrayKeys[0];
                $panels = $panels[$arrayKeys[0]];
            } else {
                $panels = $panels[''];
            }
            $setDefaultPanel = true;
        }

        if ($this->scanForMultiPanel) {
            require_once 'include/SugarFields/Parsers/MetaParser.php';
            if ($setDefaultPanel || !MetaParser::hasMultiplePanels($panels)) {
                $panels = [$this->defaultPanel => $panels];
                $this->isMultiPanel = false;
            }
        }

        foreach ($panels as $panel_id => $panel) {
            $panel_ids[$panel_id] = $panel_id;
        }

        return $panel_ids;
    }

    /**
     * Loads the meta data of the original, new, and custom file into the variables originalData, newData, and customData respectively
     *
     * @param STRING $module - name of the module's files that are to be merged
     * @param STRING $original_file - path to the file that originally shipped with sugar
     * @param STRING $new_file - path to the new file that is shipping with the patch
     * @param STRING $custom_file - path to the custom file
     */
    protected function loadData($module, $original_file, $new_file, $custom_file)
    {
        $this->module = $module;
        $varName = $this->varName;
        ${$varName} = [];
        require $original_file;
        ${$varName} = $this->renameEmailField(${$varName});
        $this->originalData = ${$varName};
        require $new_file;
        $this->newData = ${$varName};
        if (file_exists($custom_file)) {
            require $custom_file;
            ${$varName} = $this->renameEmailField(${$varName});
            $this->customData = ${$varName};
        } else {
            $this->customData = $this->originalData;
        }
    }

    /**
     * Renames email1 field to email before merging layouts
     *
     * @param mixed $viewDefs Layout definitions
     * @return array Updated layout definitions
     */
    protected function renameEmailField($viewDefs)
    {
        if (is_array($viewDefs)) {
            array_walk_recursive($viewDefs, function (&$value, $key) {
                if (($key === 'name' || is_numeric($key)) && $value === 'email1') {
                    $value = 'email';
                }
            });
        }
        return $viewDefs;
    }

    /**
     * This will save the merged data to a file
     *
     * @param STRING $to - path of the file to save it to
     * @return BOOLEAN - success or failure of the save
     */
    public function save($to)
    {
        return write_array_to_file("viewdefs['$this->module']['$this->viewDefs']", $this->newData[$this->module][$this->viewDefs], $to);
    }

    /**
     * This will return the meta data of the merged file
     *
     * @return ARRAY - the meta data of the merged file
     */
    public function getData()
    {
        return $this->newData;
    }

    /**
     * public function that will merge meta data from an original sugar file that shipped with the product, a customized file, and a new file shipped with an upgrade
     *
     * @param STRING $module - name of the module's files that are to be merged
     * @param STRING $original_file - path to the file that originally shipped with sugar
     * @param STRING $new_file - path to the new file that is shipping with the patch
     * @param STRING $custom_file - path to the custom file
     * @param BOOLEAN $save - boolean on if it should save the results to the custom file or not
     * @return BOOLEAN - if the merged file was saved if false is passed in for the save parameter it always returns true
     */
    public function merge($module, $original_file, $new_file, $custom_file = false, $save = true)
    {
        $this->clear();
        $this->log("\n\n" . 'Starting a merge in ' . get_class($this));
        $this->log('merging the following files');
        $this->log('original file:' . $original_file);
        $this->log('new file:' . $new_file);
        $this->log('custom file:' . $custom_file);
        if (empty($custom_file) && $save) {
            return true;
        } else {
            $this->loadData($module, $original_file, $new_file, $custom_file);
            $this->mergeMetaData();
            if ($save && !empty($this->newData) && !empty($custom_file)) {
                //backup the file
                copy($custom_file, $custom_file . '.suback.php');
                return $this->save($custom_file);
            }
        }
        if (!$save) {
            return true;
        }
        return false;
    }

    /**
     * Logs the given message if the message is not a string it will export it first. If $this->fp is NULL then it will try to log to the $GLOBALS['log'] if it is available
     *
     * @param MULTI $message
     */
    protected function log($message)
    {
        if (!is_string($message)) {
            $message = var_export($message, true);
        }
        if (!empty($this->fp)) {
            fwrite($this->fp, $message . "\n");
        } else {
            if (!empty($GLOBALS['log'])) {
                $GLOBALS['log']->debug($message . "\n");
            }
        }
    }

    protected function safeInArray($needle, $haystack, bool $strict = false) : bool
    {
        if (!is_array($haystack)) {
            return false;
        }
        return in_array($needle, $haystack, $strict);
    }
}
