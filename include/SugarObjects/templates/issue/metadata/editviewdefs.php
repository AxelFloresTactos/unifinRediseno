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
$module_name = '<module_name>';
$_object_name = '<_object_name>';
$viewdefs[$module_name]['EditView'] = [
    'templateMeta' => ['maxColumns' => '2',
        'widths' => [
            ['label' => '10', 'field' => '30'],
            ['label' => '10', 'field' => '30'],
        ],
    ],


    'panels' => [
        'default' => [

            [

                [
                    'name' => $_object_name . '_number',
                    'type' => 'readonly',
                ],
                'assigned_user_name',
            ],

            [
                'priority',
                ['name' => 'team_name', 'displayParams' => ['display' => true]],
            ],

            [
                'resolution',
                'status',
            ],
            [
                'follow_up_datetime',
            ],
            [
                'resolved_datetime',
            ],
            [
                ['name' => 'name', 'displayParams' => ['size' => 60]],
            ],

            [
                'description',
            ],


            [
                'work_log',
            ],
        ],

    ],

];
