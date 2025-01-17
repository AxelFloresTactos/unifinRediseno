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
$viewdefs['EmailTemplates']['base']['filter']['basic'] = [
    'create' => true,
    'quicksearch_field' => ['name'],
    'quicksearch_priority' => 1,
    'filters' => [
        [
            'id' => 'all_records',
            'name' => 'LBL_LISTVIEW_FILTER_ALL',
            'filter_definition' => [],
            'editable' => false,
        ],
        [
            'id' => 'all_email_type',
            'name' => 'LBL_FILTER_EMAIL_TYPE_TEMPLATES',
            'filter_definition' => [
                '$or' => [
                    [
                        'type' => ['$is_null' => ''],
                    ],
                    [
                        'type' => ['$equals' => ''],
                    ],
                    [
                        'type' => ['$equals' => 'email'],
                    ],
                ],
            ],
            'editable' => false,
        ],
        [
            'id' => 'all_campaign_type',
            'name' => 'LBL_FILTER_CAMPAIGN_TYPE_TEMPLATES',
            'filter_definition' => [
                '$or' => [
                    [
                        'type' => ['$is_null' => ''],
                    ],
                    [
                        'type' => ['$equals' => ''],
                    ],
                    [
                        'type' => ['$equals' => 'campaign'],
                    ],
                ],
            ],
            'editable' => false,
        ],
        [
            'id' => 'all_workflow_type',
            'name' => 'LBL_FILTER_WORKFLOW_TYPE_TEMPLATES',
            'filter_definition' => [
                '$or' => [
                    [
                        'type' => ['$is_null' => ''],
                    ],
                    [
                        'type' => ['$equals' => ''],
                    ],
                    [
                        'type' => ['$equals' => 'workflow'],
                    ],
                ],
            ],
            'editable' => false,
        ],
        [
            'id' => 'all_system_type',
            'name' => 'LBL_FILTER_SYSTEM_TYPE_TEMPLATES',
            'filter_definition' => [
                '$or' => [
                    [
                        'type' => ['$is_null' => ''],
                    ],
                    [
                        'type' => ['$equals' => ''],
                    ],
                    [
                        'type' => ['$equals' => 'system'],
                    ],
                ],
            ],
            'editable' => false,
        ],
    ],
];
