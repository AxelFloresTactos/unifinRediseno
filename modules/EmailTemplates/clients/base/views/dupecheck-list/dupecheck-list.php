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
$viewdefs['EmailTemplates']['base']['view']['dupecheck-list'] = [
    'panels' => [
        [
            'label' => 'LBL_PANEL_1',
            'fields' => [
                [
                    'name' => 'name',
                    'label' => 'LBL_NAME',
                    'link' => true,
                    'default' => true,
                ],
                [
                    'name' => 'type',
                    'label' => 'LBL_TYPE',
                    'link' => false,
                    'default' => true,
                ],
                [
                    'name' => 'description',
                    'default' => true,
                    'sortable' => false,
                    'label' => 'LBL_DESCRIPTION',
                ],
                [
                    'name' => 'assigned_user_name',
                    'label' => 'LBL_LIST_ASSIGNED_USER',
                    'default' => true,
                ],
                [
                    'name' => 'date_modified',
                    'label' => 'LBL_DATE_MODIFIED',
                    'default' => false,
                    'readonly' => true,
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
