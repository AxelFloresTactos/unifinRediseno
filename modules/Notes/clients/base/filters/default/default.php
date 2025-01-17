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

$viewdefs['Notes']['base']['filter']['default'] = [
    'default_filter' => 'all_records',
    'filters' => [
        [
            'id' => 'created_by_me',
            'name' => 'LBL_CREATED_BY_ME',
            'filter_definition' => [
                '$creator' => '',
                'email_id' => [
                    '$empty' => '',
                ],
            ],
            'editable' => false,
        ],
    ],
    'fields' => [
        'name' => [],
        'contact_name' => [],
        'parent_name' => [],
        'date_entered' => [],
        'date_modified' => [],
        'tag' => [],
        '$owner' => [
            'predefined_filter' => true,
            'vname' => 'LBL_CURRENT_USER_FILTER',
        ],
        '$favorite' => [
            'predefined_filter' => true,
            'vname' => 'LBL_FAVORITES_FILTER',
        ],
    ],
];
