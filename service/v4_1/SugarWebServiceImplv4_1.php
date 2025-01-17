<?php

if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
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

/**
 * SugarWebServiceImplv4_1.php
 *
 * This class is an implementation class for all the web services.  Version 4_1 adds limit/off support to the
 * get_relationships function.  We also added the sync_get_modified_relationships function call from version
 * one to facilitate querying for related meetings/calls contacts/users records.
 *
 */
require_once 'service/v4/SugarWebServiceImplv4.php';

class SugarWebServiceImplv4_1 extends SugarWebServiceImplv4
{
    /**
     * Class Constructor Object
     *
     */
    public function __construct()
    {
        self::$helperObject = new SugarWebServiceUtilv4_1();
    }

    /**
     * Retrieve a collection of beans that are related to the specified bean and optionally return relationship data for those related beans.
     * So in this API you can get contacts info for an account and also return all those contact's email address or an opportunity info also.
     *
     * @param String $session -- Session ID returned by a previous call to login.
     * @param String $module_name -- The name of the module that the primary record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
     * @param String $module_id -- The ID of the bean in the specified module
     * @param String $link_field_name -- The name of the lnk field to return records from.  This name should be the name the relationship.
     * @param String $related_module_query -- A portion of the where clause of the SQL statement to find the related items.  The SQL query will already be filtered to only include the beans that are related to the specified bean.
     * @param Array $related_fields - Array of related bean fields to be returned.
     * @param Array $related_module_link_name_to_fields_array - For every related bean returrned, specify link fields name to fields info for that bean to be returned. For ex.'link_name_to_fields_array' => array(array('name' =>  'email_addresses', 'value' => array('id', 'email_address', 'opt_out', 'primary_address'))).
     * @param Number $deleted -- false if deleted records should not be include, true if deleted records should be included.
     * @param String $order_by -- field to order the result sets by
     * @param Number $offset -- where to start in the return
     * @param Number $limit -- number of results to return (defaults to all)
     * @return Array 'entry_list' -- Array - The records that were retrieved
     *               'relationship_list' -- Array - The records link field data. The example is if asked about accounts contacts email address then return data would look like Array ( [0] => Array ( [name] => email_addresses [records] => Array ( [0] => Array ( [0] => Array ( [name] => id [value] => 3fb16797-8d90-0a94-ac12-490b63a6be67 ) [1] => Array ( [name] => email_address [value] => hr.kid.qa@example.com ) [2] => Array ( [name] => opt_out [value] => 0 ) [3] => Array ( [name] => primary_address [value] => 1 ) ) [1] => Array ( [0] => Array ( [name] => id [value] => 403f8da1-214b-6a88-9cef-490b63d43566 ) [1] => Array ( [name] => email_address [value] => kid.hr@example.name ) [2] => Array ( [name] => opt_out [value] => 0 ) [3] => Array ( [name] => primary_address [value] => 0 ) ) ) ) )
     * @exception 'SoapFault' -- The SOAP error, if any
     */
    public function get_relationships($session, $module_name, $module_id, $link_field_name, $related_module_query, $related_fields, $related_module_link_name_to_fields_array, $deleted, $order_by = '', $offset = 0, $limit = false)
    {
        $related_fields = object_to_array_deep($related_fields);
        $related_module_link_name_to_fields_array = object_to_array_deep($related_module_link_name_to_fields_array);

        $this->getLogger()->info('Begin: SugarWebServiceImpl->get_relationships');
        self::$helperObject = new SugarWebServiceUtilv4_1();
        global $beanList, $beanFiles;
        $error = new SoapError();

        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', $module_name, 'read', 'no_access', $error)) {
            $this->getLogger()->info('End: SugarWebServiceImpl->get_relationships');
            return;
        } // if

        $mod = BeanFactory::getBean($module_name, $module_id);

        if (empty($mod->id)) {
            $error->set_error('no_records');
            self::$helperObject->setFaultObject($error);
            $this->getLogger()->info('End: SugarWebServiceImpl->get_relationships');
            return;
        }

        if (!self::$helperObject->checkQuery($error, $related_module_query, $order_by)) {
            $this->getLogger()->info('End: SugarWebServiceImpl->get_relationships');
            return;
        } // if

        if (!self::$helperObject->checkACLAccess($mod, 'DetailView', $error, 'no_access')) {
            $this->getLogger()->info('End: SugarWebServiceImpl->get_relationships');
            return;
        } // if

        $output_list = [];
        $linkoutput_list = [];

        // get all the related modules data.
        $result = self::$helperObject->getRelationshipResults($mod, $link_field_name, $related_fields, $related_module_query, $order_by, $offset, $limit);

        if ($this->getLogger()->wouldLog('debug')) {
            $this->getLogger()->debug('SoapHelperWebServices->get_relationships - return data for getRelationshipResults is ' . var_export($result, true));
        } // if
        if ($result) {
            $list = $result['rows'];
            $filterFields = $result['fields_set_on_rows'];

            if (sizeof($list) > 0) {
                // get the related module name and instantiate a bean for that
                $submodulename = $mod->$link_field_name->getRelatedModuleName();
                $submoduletemp = BeanFactory::newBean($submodulename);

                foreach ($list as $row) {
                    $submoduleobject = @clone($submoduletemp);
                    // set all the database data to this object
                    foreach ($filterFields as $field) {
                        $submoduleobject->$field = $row[$field];
                    } // foreach
                    if (isset($row['id'])) {
                        $submoduleobject->id = $row['id'];
                    }
                    $output_list[] = self::$helperObject->get_return_value_for_fields($submoduleobject, $submodulename, $filterFields);
                    if (!empty($related_module_link_name_to_fields_array)) {
                        $linkoutput_list[] = self::$helperObject->get_return_value_for_link_fields($submoduleobject, $submodulename, $related_module_link_name_to_fields_array);
                    } // if
                } // foreach
            }
        } // if

        $this->getLogger()->info('End: SugarWebServiceImpl->get_relationships');
        return ['entry_list' => $output_list, 'relationship_list' => $linkoutput_list];
    }


    /**
     * get_modified_relationships
     *
     * Get a list of the relationship records that have a date_modified value set within a specified date range.  This is used to
     * help facilitate sync operations.  The module_name should be "Users" and the related_module one of "Meetings", "Calls" and
     * "Contacts".
     *
     * @param xsd:string $session String of the session id
     * @param xsd:string $module_name String value of the primary module to retrieve relationship against
     * @param xsd:string $related_module String value of the related module to retrieve records off of
     * @param xsd:string $from_date String value in YYYY-MM-DD HH:MM:SS format of date_start range (required)
     * @param xsd:string $to_date String value in YYYY-MM-DD HH:MM:SS format of ending date_start range (required)
     * @param xsd:int $offset Integer value of the offset to begin returning records from
     * @param xsd:int $max_results Integer value of the max_results to return; -99 for unlimited
     * @param xsd:int $deleted Integer value indicating deleted column value search (defaults to 0).  Set to 1 to find deleted records
     * @param xsd:string $module_user_id String value of the user id (optional, but defaults to SOAP session user id anyway)  The module_user_id value
     * here ought to be the user id of the user initiating the SOAP session
     * @param tns:select_fields $select_fields Array value of fields to select and return as name/value pairs
     * @param xsd:string $relationship_name String value of the relationship name to search on
     * @param xsd:string $deletion_date String value in YYYY-MM-DD HH:MM:SS format for filtering on deleted records whose date_modified falls within range
     * this allows deleted records to be returned as well
     *
     * @return Array records that match search criteria
     */
    public function get_modified_relationships($session, $module_name, $related_module, $from_date, $to_date, $offset, $max_results, $deleted = 0, $module_user_id = '', $select_fields = [], $relationship_name = '', $deletion_date = '')
    {
        global $beanList, $beanFiles;
        $select_fields = object_to_array_deep($select_fields);
        $error = new SoapError();
        $output_list = [];

        if (empty($from_date)) {
            $error->set_error('invalid_call_error, missing from_date');
            return ['result_count' => 0, 'next_offset' => 0, 'field_list' => $select_fields, 'entry_list' => [], 'error' => $error->get_soap_array()];
        }

        if (empty($to_date)) {
            $error->set_error('invalid_call_error, missing to_date');
            return ['result_count' => 0, 'next_offset' => 0, 'field_list' => $select_fields, 'entry_list' => [], 'error' => $error->get_soap_array()];
        }

        self::$helperObject = new SugarWebServiceUtilv4_1();
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', $module_name, 'read', 'no_access', $error)) {
            $this->getLogger()->info('End: SugarWebServiceImpl->get_modified_relationships');
            return;
        } // if

        if (empty($beanList[$module_name]) || empty($beanList[$related_module])) {
            $error->set_error('no_module');
            return ['result_count' => 0, 'next_offset' => 0, 'field_list' => $select_fields, 'entry_list' => [], 'error' => $error->get_soap_array()];
        }

        global $current_user;
        if (!self::$helperObject->check_modules_access($current_user, $module_name, 'read') || !self::$helperObject->check_modules_access($current_user, $related_module, 'read')) {
            $error->set_error('no_access');
            return ['result_count' => 0, 'next_offset' => 0, 'field_list' => $select_fields, 'entry_list' => [], 'error' => $error->get_soap_array()];
        }

        if ($max_results > 0 || $max_results == '-99') {
            global $sugar_config;
            $sugar_config['list_max_entries_per_page'] = $max_results;
        }

        // Cast to integer
        $deleted = (int)$deleted;
        $query = '(m1.date_modified > ' . db_convert("'" . $GLOBALS['db']->quote($from_date) . "'", 'datetime') . ' AND m1.date_modified <= ' . db_convert("'" . $GLOBALS['db']->quote($to_date) . "'", 'datetime') . " AND {0}.deleted = $deleted)";
        if (isset($deletion_date) && !empty($deletion_date)) {
            $query .= ' OR ({0}.date_modified > ' . db_convert("'" . $GLOBALS['db']->quote($deletion_date) . "'", 'datetime') . ' AND {0}.date_modified <= ' . db_convert("'" . $GLOBALS['db']->quote($to_date) . "'", 'datetime') . ' AND {0}.deleted = 1)';
        }

        if (!empty($module_user_id)) {
            $query .= " AND m2.id = '" . $GLOBALS['db']->quote($module_user_id) . "'";
        }

        $query = string_format($query, ['m1']);

        require_once 'soap/SoapRelationshipHelper.php';
        $results = retrieve_modified_relationships($module_name, $related_module, $query, $deleted, $offset, $max_results, $select_fields, $relationship_name);

        $list = $results['result'];

        foreach ($list as $value) {
            $output_list[] = self::$helperObject->array_get_return_value($value, $results['table_name']);
        }

        $next_offset = $offset + safeCount($output_list);

        return [
            'result_count' => safeCount($output_list),
            'next_offset' => $next_offset,
            'entry_list' => $output_list,
            'error' => $error->get_soap_array(),
        ];
    }
}
