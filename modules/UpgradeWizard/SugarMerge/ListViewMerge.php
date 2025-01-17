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
 * This class is used to merge list view meta data. It subclasses EditView merge and transforms listview meta data into EditView meta data  for the merge and then transforms it back into list view meta data
 *
 */
class ListViewMerge extends EditViewMerge
{
    protected $varName = 'listViewDefs';
    protected $viewDefs = 'ListView';

    /**
     * Loads the meta data of the original, new, and custom file into the variables originalData, newData, and customData respectively it then transforms them into a structure that EditView Merge would understand
     *
     * @param STRING $module - name of the module's files that are to be merged
     * @param STRING $original_file - path to the file that originally shipped with sugar
     * @param STRING $new_file - path to the new file that is shipping with the patch
     * @param STRING $custom_file - path to the custom file
     */
    protected function loadData($module, $original_file, $new_file, $custom_file)
    {
        parent::loadData($module, $original_file, $new_file, $custom_file);
        $this->originalData = [$module => [$this->viewDefs => [$this->panelName => ['DEFAULT' => $this->originalData[$module]]]]];
        $this->customData = [$module => [$this->viewDefs => [$this->panelName => ['DEFAULT' => $this->customData[$module]]]]];
        $this->newData = [$module => [$this->viewDefs => [$this->panelName => ['DEFAULT' => $this->newData[$module]]]]];
    }

    /**
     * This takes in a  list of panels and returns an associative array of field names to the meta-data of the field as well as the locations of that field
     * Since ListViews don't have the concept of rows and columns it takes the panel and the row to be the field name
     * @param ARRAY $panels - this is the 'panel' section of the meta-data for list views all the meta data is one panel since it is just a list of fields
     * @return ARRAY $fields - an associate array of fields and their meta-data as well as their location
     */
    protected function getFields(&$panels, $multiple = true)
    {
        $fields = [];
        $blanks = 0;
        if (!$multiple) {
            $panels = [$panels];
        }

        foreach ($panels as $panel_id => $panel) {
            foreach ($panel as $col_id => $col) {
                $field_name = $col_id;
                $fields[$field_name . $panel_id] = ['data' => $col, 'loc' => ['row' => $col_id, 'panel' => $col_id]];
            }
        }
        return $fields;
    }

    /**
     * This builds the array of fields from the merged fields in the appropriate order
     * when building the panels for a list view the most important thing is order
     * so we ensure the fields that came from the custom file keep
     * their order then we add any new fields at the end
     *
     * @return ARRAY
     */
    protected function buildPanels()
    {
        $panels = [];
        //first only deal with ones that have their location coming from the custom source
        foreach ($this->mergedFields as $id => $field) {
            if ($field['loc']['source'] == 'custom') {
                $panels[$field['loc']['panel']] = $field['data'];
                unset($this->mergedFields[$id]);
            }
        }
        //now deal with the rest
        foreach ($this->mergedFields as $id => $field) {
            //Set the default attribute to false for all the rest of these fields since they're not from custom source
            $field['data']['default'] = false;
            $panels[$field['loc']['panel']] = $field['data'];
        }
        return $panels;
    }

    /**
     * Since all the meta-data is just a list of fields the panel section should be all the meta data
     *
     */
    protected function setPanels()
    {
        $this->newData = $this->buildPanels();
    }

    /**
     * This will save the merged data to a file
     *
     * @param STRING $to - path of the file to save it to
     * @return BOOLEAN - success or failure of the save
     */
    public function save($to)
    {
        return write_array_to_file("$this->varName['$this->module']", $this->newData, $to);
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

                //but we still merge the meta data of the three
                $this->mergedFields[$field] = [
                    'data' => $this->mergeField($this->originalFields[$field]['data'], $this->newFields[$field]['data'], $this->customFields[$field]['data']),
                    'loc' => $loc];


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

        foreach ($this->newFields as $field => $data) {
            $data['loc']['source'] = 'new';
            $this->mergedFields[$field] = [
                'data' => $data['data'],
                'loc' => $data['loc']];
            unset($this->newFields[$field]);
        }
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
            $new['default'] = $custom['default'] ?? false;
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
                $new['default'] = $custom['default'];
                return $new;
            } else {
                //otherwise we know that new is not an array and custom has been 'customized' so let's keep those customizations.
                $this->log($custom);
                return $custom;
            }
        }

        //default to returning the New version of the field
        $new['default'] = $custom['default'] ?? false;
        return $new;
    }
}
