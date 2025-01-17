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
$viewdefs['Emails']['base']['view']['subpanel-for-users'] = [
    'type' => 'subpanel-list',
    'panels' => [
        [
            'name' => 'panel_header',
            'label' => 'LBL_PANEL_1',
            'fields' => [
                [
                    'label' => 'LBL_LIST_SUBJECT',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'name',
                ],
                [
                    'label' => 'LBL_LIST_STATUS',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'state',
                ],
                [
                    'target_record_key' => 'contact_id',
                    'target_module' => 'Contacts',
                    'label' => 'LBL_LIST_CONTACT',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'contact_name',
                ],
                [
                    'enabled' => true,
                    'default' => true,
                    'name' => 'date_modified',
                    'readonly' => true,
                ],
                [
                    'enabled' => true,
                    'default' => true,
                    'name' => 'date_entered',
                    'readonly' => true,
                ],
                [
                    'name' => 'assigned_user_name',
                    'target_record_key' => 'assigned_user_id',
                    'target_module' => 'Employees',
                    'label' => 'LBL_LIST_ASSIGNED_TO_NAME',
                    'enabled' => true,
                    'default' => true,
                ],
            ],
        ],
    ],
];
