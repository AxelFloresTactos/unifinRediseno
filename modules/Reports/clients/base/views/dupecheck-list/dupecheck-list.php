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
$viewdefs['Reports']['base']['view']['dupecheck-list'] = [
    'panels' => [
        [
            'name' => 'panel_header',
            'label' => 'LBL_PANEL_1',
            'fields' => [
                [
                    'name' => 'name',
                    'label' => 'LBL_REPORT_NAME',
                    'link' => true,
                    'type' => 'name',
                    'enabled' => true,
                    'default' => true,
                ],
                [
                    'name' => 'module',
                    'label' => 'LBL_MODULE',
                    'default' => true,
                ],
                [
                    'name' => 'report_type',
                    'label' => 'LBL_REPORT_TYPE',
                    'type' => 'enum',
                    'options' => 'dom_report_types',
                    'default' => true,
                ],
                [
                    'name' => 'assigned_user_name',
                    'label' => 'LBL_LIST_ASSIGNED_USER',
                    'default' => true,
                    'sortable' => false,
                ],
                [
                    'name' => 'date_entered',
                    'label' => 'LBL_DATE_ENTERED',
                    'default' => false,
                    'readonly' => true,
                ],
            ],
        ],
    ],
];
