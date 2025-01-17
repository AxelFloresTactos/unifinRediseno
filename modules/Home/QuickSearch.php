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


/**
 * quicksearchQuery class, handles AJAX calls from quicksearch.js
 *
 * @copyright  2004-2007 SugarCRM Inc.
 * @license    http://www.sugarcrm.com/crm/products/sugar-professional-eula.html  SugarCRM Professional End User License
 * @since      Class available since Release 4.5.1
 */
class QuickSearchQuery
{
    /**
     * Condition operators
     * @var string
     */
    public const CONDITION_CONTAINS = 'contains';
    public const CONDITION_LIKE_CUSTOM = 'like_custom';
    public const CONDITION_EQUAL = 'equal';

    protected $extra_where;

    /**
     * Query a module for a list of items
     *
     * @param array $args
     * example for querying Account module with 'a':
     * array ('modules' => array('Accounts'), // module to use
     *        'field_list' => array('name', 'id'), // fields to select
     *        'group' => 'or', // how the conditions should be combined
     *        'conditions' => array(array( // array of where conditions to use
     *                              'name' => 'name', // field
     *                              'op' => 'like_custom', // operation
     *                              'end' => '%', // end of the query
     *                              'value' => 'a',  // query value
     *                              )
     *                        ),
     *        'order' => 'name', // order by
     *        'limit' => '30', // limit, number of records to return
     *       )
     * @return array list of elements returned
     */
    public function query($args)
    {
        $args = $this->prepareArguments($args);
        $args = $this->updateQueryArguments($args);
        $data = $this->getRawResults($args);

        return $this->getFormattedJsonResults($data, $args);
    }

    /**
     * get_contact_array
     *
     */
    public function get_contact_array($args)
    {
        $args = $this->prepareArguments($args);
        $args = $this->updateContactArrayArguments($args);
        $data = $this->getRawResults($args);
        $results = $this->prepareResults($data, $args);

        return $this->getFilteredJsonResults($results);
    }

    /**
     * Returns the list of users, faster than using query method for Users module
     *
     * @param array $args arguments used to construct query, see query() for example
     * @return array list of users returned
     */
    public function get_user_array($args)
    {
        $condition = $args['conditions'][0]['value'];
        $results = $this->getUserResults($condition);

        return $this->getJsonEncodedData($results);
    }

    /**
     * Returns non private teams as search results
     *
     * @param array $args
     * @return array
     */
    public function get_non_private_teams_array($args)
    {
        $args = $this->prepareArguments($args);
        $args = $this->updateTeamArrayArguments($args);
        $data = $this->getRawResults($args);

        return $this->getFormattedJsonResults($data, $args);
    }

    /**
     * Returns search results from external API
     *
     * @param array $args
     * @return array
     */
    public function externalApi($args)
    {
        $data = [];
        try {
            $api = ExternalAPIFactory::loadAPI($args['api']);
            $data['fields'] = $api->searchDoc($_REQUEST['query']);
            $data['totalCount'] = safeCount($data['fields']);
        } catch (Exception $ex) {
            $GLOBALS['log']->error($ex->getMessage());
        }

        return $this->getJsonEncodedData($data);
    }

    public function fts_query()
    {
        $_REQUEST['q'] = trim($_REQUEST['term']);
        $view = new ViewFts();
        $view->init();
        echo $view->display(true, true);
    }

    /**
     * Internal function to construct where clauses
     *
     * @param Object $focus
     * @param array $args
     * @return string
     */
    protected function constructWhere($focus, $args)
    {
        global $db, $locale, $current_user;

        $table = $focus->getTableName();
        if (!empty($table)) {
            $table_prefix = $db->getValidDBName($table) . '.';
        } else {
            $table_prefix = '';
        }
        $conditionArray = [];

        if (!isset($args['conditions']) || !is_array($args['conditions'])) {
            $args['conditions'] = [];
        }

        foreach ($args['conditions'] as $condition) {
            if (isset($condition['op'])) {
                $operator = $condition['op'];
            } else {
                $operator = null;
            }

            switch ($operator) {
                case self::CONDITION_CONTAINS:
                    array_push(
                        $conditionArray,
                        sprintf(
                            "%s like '%%%s%%'",
                            $table_prefix . $db->getValidDBName($condition['name']),
                            $db->quote($condition['value'])
                        )
                    );
                    break;

                case self::CONDITION_LIKE_CUSTOM:
                    $like = '';
                    if (!empty($condition['begin'])) {
                        $like .= $db->quote($condition['begin']);
                    }
                    $like .= $db->quote($condition['value']);

                    if (!empty($condition['end'])) {
                        $like .= $db->quote($condition['end']);
                    }

                    if ($focus instanceof Person) {
                        $nameFormat = $locale->getLocaleFormatMacro($current_user);

                        if (strpos($nameFormat, 'l') > strpos($nameFormat, 'f')) {
                            array_push(
                                $conditionArray,
                                $db->getLikeSQL($db->concat($table, ['first_name', 'last_name']), $like)
                            );
                        } else {
                            array_push(
                                $conditionArray,
                                $db->getLikeSQL($db->concat($table, ['last_name', 'first_name']), $like)
                            );
                        }
                    } elseif ($focus instanceof Team) {
                        array_push(
                            $conditionArray,
                            '(' . $db->getLikeSQL($table_prefix . $db->getValidDBName($condition['name']), sprintf('%s%%', $db->quote($condition['value']))) . ' or ' . $db->getLikeSQL($table_prefix . 'name_2', sprintf('%s%%', $db->quote($condition['value']))) . ')'
                        );

                        $condition['exclude_private_teams'] = true;
                    } else {
                        array_push(
                            $conditionArray,
                            $db->getLikeSQL($table_prefix . $db->getValidDBName($condition['name']), $like)
                        );
                    }
                    break;

                case self::CONDITION_EQUAL:
                    if ($condition['value']) {
                        array_push(
                            $conditionArray,
                            sprintf("(%s = '%s')", $db->getValidDBName($condition['name']), $db->quote($condition['value']))
                        );
                    }
                    break;

                default:
                    array_push(
                        $conditionArray,
                        $db->getLikeSQL($table_prefix . $db->getValidDBName($condition['name']), sprintf('%s%%', $db->quote($condition['value'])))
                    );
            }
        }

        $whereClauseArray = [];
        if (!empty($conditionArray)) {
            $whereClauseArray[] = sprintf('(%s)', implode(" {$args['group']} ", $conditionArray));
        }
        if (!empty($this->extra_where)) {
            $whereClauseArray[] = "({$this->extra_where})";
        }

        if ($table == 'users') {
            $whereClauseArray[] = "users.status='Active'";
        }

        return implode(' AND ', $whereClauseArray);
    }

    /**
     * Returns formatted data
     *
     * @param array $results
     * @param array $args
     * @return array
     */
    protected function formatResults($results, $args)
    {
        $data = [];
        global $sugar_config;

        $app_list_strings = $GLOBALS['app_list_strings'] ?? null;
        $data['totalCount'] = safeCount($results);
        $data['fields'] = [];

        for ($i = 0; $i < safeCount($results); $i++) {
            $data['fields'][$i] = [];
            $data['fields'][$i]['module'] = $results[$i]->object_name;

            //C.L.: Bug 43395 - For Quicksearch, do not return values with salutation and title formatting
            if ($results[$i] instanceof Person) {
                $results[$i]->createLocaleFormattedName = false;
            }
            $listData = $results[$i]->get_list_view_data();

            foreach ($args['field_list'] as $field) {
                // handle enums
                if ((isset($results[$i]->field_defs[$field]['type'])
                        && $results[$i]->field_defs[$field]['type'] == 'enum')
                    || (isset($results[$i]->field_defs[$field]['custom_type'])
                        && $results[$i]->field_defs[$field]['custom_type'] == 'enum')) {
                    // get fields to match enum vals
                    if (empty($app_list_strings)) {
                        if (isset($_SESSION['authenticated_user_language']) && $_SESSION['authenticated_user_language'] != '') {
                            $current_language = $_SESSION['authenticated_user_language'];
                        } else {
                            $current_language = $sugar_config['default_language'];
                        }
                        $app_list_strings = return_app_list_strings_language($current_language);
                    }

                    // match enum vals to text vals in language pack for return
                    if (!empty($app_list_strings[$results[$i]->field_defs[$field]['options']])) {
                        $results[$i]->$field =
                            $app_list_strings[$results[$i]->field_defs[$field]['options']][$results[$i]->$field];
                    }
                }

                if ($results[$i] instanceof Team) {
                    $results[$i]->name = Team::getDisplayName($results[$i]->name, $results[$i]->name_2);
                }

                if (isset($listData[$field])) {
                    $data['fields'][$i][$field] = $listData[$field];
                } elseif (isset($results[$i]->$field)) {
                    $data['fields'][$i][$field] = $results[$i]->$field;
                } else {
                    $data['fields'][$i][$field] = '';
                }
            }
        }

        if (is_array($data['fields'])) {
            foreach ($data['fields'] as $i => $recordIn) {
                if (!is_array($recordIn)) {
                    continue;
                }

                foreach ($recordIn as $col => $dataIn) {
                    if (!is_scalar($dataIn)) {
                        continue;
                    }

                    $data['fields'][$i][$col] = html_entity_decode(strval($dataIn), ENT_QUOTES, 'UTF-8');
                }
            }
        }

        return $data;
    }

    /**
     * Filter duplicate results from the list
     *
     * @param array $list
     * @return  array
     */
    protected function filterResults($list)
    {
        $fieldsFiltered = [];
        foreach ($list['fields'] as $field) {
            $found = false;
            foreach ($fieldsFiltered as $item) {
                if ($item === $field) {
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $fieldsFiltered[] = $field;
            }
        }

        $list['totalCount'] = safeCount($fieldsFiltered);
        $list['fields'] = $fieldsFiltered;

        return $list;
    }

    /**
     * Returns raw search results. Filters should be applied later.
     *
     * @param array $args
     * @param boolean $singleSelect
     * @return array
     */
    protected function getRawResults($args, $singleSelect = false)
    {
        $orderBy = !empty($args['order']) ? $args['order'] : '';
        $baseOrderBy = $orderBy;
        $limit = !empty($args['limit']) ? intval($args['limit']) : '';
        $data = [];

        foreach ($args['modules'] as $module) {
            $focus = BeanFactory::newBean($module);

            $orderBy = $focus->db->getValidDBName(($args['order_by_name'] && $focus instanceof Person && $baseOrderBy === 'name') ? 'last_name' : $orderBy);

            if ($focus->ACLAccess('ListView', true)) {
                $where = $this->constructWhere($focus, $args);
                $data = $this->updateData($data, $focus, $orderBy, $where, $limit, $singleSelect);
            }
        }

        // Run ACL Fields Filtering for each bean
        foreach ($data as $bean) {
            $bean->ACLFilterFields();
        }

        return $data;
    }

    /**
     * Returns search results with all fixes applied
     *
     * @param array $data
     * @param array $args
     * @return array
     */
    protected function prepareResults($data, $args)
    {
        $results = [];
        $results['totalCount'] = $count = safeCount($data);
        $results['fields'] = [];

        for ($i = 0; $i < $count; $i++) {
            $field = [];
            $field['module'] = $data[$i]->object_name;

            $field = $this->overrideContactId($field, $data[$i], $args);
            $field = $this->updateContactName($field, $args);

            $results['fields'][$i] = $this->prepareField($field, $args);
        }

        return $results;
    }

    /**
     * Returns user search results
     *
     * @param string $condition
     * @return array
     */
    protected function getUserResults($condition)
    {
        $users = $this->getUserArray($condition);

        $results = [];
        $results['totalCount'] = safeCount($users);
        $results['fields'] = [];

        foreach ($users as $id => $name) {
            array_push(
                $results['fields'],
                [
                    'id' => (string)$id,
                    'user_name' => $name,
                    'module' => 'Users',
                ]
            );
        }

        return $results;
    }

    /**
     * Merges current module search results to given list and returns it
     *
     * @param array $data
     * @param SugarBean $focus
     * @param string $orderBy
     * @param string $where
     * @param string $limit
     * @param boolean $singleSelect
     * @return array
     */
    protected function updateData($data, $focus, $orderBy, $where, $limit, $singleSelect = false)
    {
        $result = $focus->get_list($orderBy, $where, 0, $limit, -1, 0, $singleSelect);

        return array_merge($data, $result['list']);
    }

    /**
     * Updates search result with proper contact name
     *
     * @param array $result
     * @param array $args
     * @return string
     */
    protected function updateContactName($result, $args)
    {
        global $locale;

        $result[$args['field_list'][0]] = $locale->formatName('Contacts', $result);

        return $result;
    }

    /**
     * Overrides contact_id and reports_to_id params (to 'id')
     *
     * @param array $result
     * @param object $data
     * @param array $args
     * @return array
     */
    protected function overrideContactId($result, $data, $args)
    {
        foreach ($args['field_list'] as $field) {
            $result[$field] = (preg_match('/reports_to_id$/s', $field)
                || preg_match('/contact_id$/s', $field))
                ? $data->id // "reports_to_id" to "id"
                : $data->$field;
        }

        return $result;
    }

    /**
     * Returns prepared arguments. Should be redefined in child classes.
     *
     * @param array $arguments
     * @return array
     */
    protected function prepareArguments($args)
    {
        global $sugar_config;

        // override query limits
        if (isset($args['limit']) && $sugar_config['list_max_entries_per_page'] < ($args['limit'] + 1)) {
            $sugar_config['list_max_entries_per_page'] = ($args['limit'] + 1);
        }

        $defaults = [
            'order_by_name' => false,
        ];
        $this->extra_where = '';

        // Sanitize group
        /* BUG: 52684 properly check for 'and' jeff@neposystems.com */
        if (!empty($args['group']) && strcasecmp($args['group'], 'and') == 0) {
            $args['group'] = 'AND';
        } else {
            $args['group'] = 'OR';
        }

        return array_merge($defaults, $args);
    }

    /**
     * Returns prepared field array. Should be redefined in child classes.
     *
     * @param array $field
     * @param array $args
     * @return array
     */
    protected function prepareField($field, $args)
    {
        return $field;
    }

    /**
     * Returns user array
     *
     * @param string $condition
     * @return array
     */
    protected function getUserArray($condition)
    {
        return (showFullName())
            // utils.php, if system is configured to show full name
            ? getUserArrayFromFullName($condition, true)
            : get_user_array(false, 'Active', '', false, $condition, ' AND portal_only=0 ', false);
    }

    /**
     * Returns additional where condition for non private teams and removes arguments that have been replaced with
     * custom where clauses
     *
     * @param array $args
     * @return string
     */
    protected function getNonPrivateTeamsWhere(&$args)
    {
        global $db;

        $where = [];
        $teams_filtered = false;

        if (isset($args['conditions']) && is_array($args['conditions'])) {
            foreach ($args['conditions'] as $i => $condition) {
                if (isset($condition['name'], $condition['value'])) {
                    switch ($condition['name']) {
                        case 'name':
                            $where[] = sprintf(
                                "(teams.name like '%s%%' OR teams.name_2 like '%s%%')",
                                $db->quote($condition['value']),
                                $db->quote($condition['value'])
                            );
                            unset($args['conditions'][$i]);
                            break;
                        case 'user_id':
                            $where[] = sprintf(
                                "teams.id IN (SELECT team_id FROM team_memberships WHERE user_id = '%s' AND deleted = 0)",
                                $db->quote($condition['value'])
                            );
                            unset($args['conditions'][$i]);
                            $teams_filtered = true;
                            break;
                    }
                }
            }
        }

        if (!$teams_filtered) {
            $where[] = 'teams.private = 0';
        }

        return implode(' AND ', $where);
    }

    /**
     * Returns JSON encoded data
     *
     * @param array $data
     * @return string
     */
    protected function getJsonEncodedData($data)
    {
        $json = getJSONobj();

        return $json->encodeReal($data);
    }

    /**
     * Returns formatted JSON encoded search results
     *
     * @param array $args
     * @param array $results
     * @return string
     */
    protected function getFormattedJsonResults($results, $args)
    {
        $results = $this->formatResults($results, $args);

        return $this->getJsonEncodedData($results);
    }

    /**
     * Returns filtered JSON encoded search results
     *
     * @param array $results
     * @return string
     */
    protected function getFilteredJsonResults($results)
    {
        $results = $this->filterResults($results);

        return $this->getJsonEncodedData($results);
    }

    /**
     * Returns updated arguments array
     *
     * @param array $args
     * @return array
     */
    protected function updateQueryArguments($args)
    {
        $args['order_by_name'] = true;

        return $args;
    }

    /**
     * Returns updated arguments array for contact query
     *
     * @param array $args
     * @return array
     */
    protected function updateContactArrayArguments($args)
    {
        return $args;
    }

    /**
     * Returns updated arguments array for team query
     *
     * @param array $args
     * @return array
     */
    protected function updateTeamArrayArguments($args)
    {
        $this->extra_where = $this->getNonPrivateTeamsWhere($args);
        $args['modules'] = ['Teams'];

        return $args;
    }
}
