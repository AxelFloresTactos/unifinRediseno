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

$viewdefs['Bugs']['base']['filter']['default'] = [
    'quicksearch_field' => ['name', 'bug_number'],
    'quicksearch_priority' => 2,
    'default_filter' => 'all_records',
    'fields' => [
        'name' => [],
        'status' => [],
        'priority' => [],
        'found_in_release' => [],
        'fixed_in_release' => [],
        'resolution' => [],
        'bug_number' => [],
        'date_entered' => [],
        'date_modified' => [],
        'assigned_user_name' => [],
        'tag' => [],
        '$owner' => [
            'predefined_filter' => true,
            'vname' => 'LBL_CURRENT_USER_FILTER',
        ],
        '$favorite' => [
            'predefined_filter' => true,
            'vname' => 'LBL_FAVORITES_FILTER',
        ],
        'is_escalated' => [],
    ],
];
