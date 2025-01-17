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
$_module_name = '<_module_name>';
$viewdefs[$module_name]['base']['view']['list'] = [
    'panels' => [
        [
            'label' => 'LBL_PANEL_DEFAULT',
            'fields' => [
                [
                    'name' => 'name',
                    'label' => 'LBL_LIST_SALE_NAME',
                    'link' => true,
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'sales_stage',
                    'label' => 'LBL_LIST_SALE_STAGE',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'amount',
                    'label' => 'LBL_LIST_AMOUNT',
                    'align' => 'right',
                    'default' => true,
                    'enabled' => true,
                    'related_fields' => [
                        'currency_id',
                        'base_rate',
                    ],
                ],
                [
                    'name' => $_module_name . '_type',
                    'label' => 'LBL_TYPE',
                    'default' => false,
                ],
                [
                    'name' => 'lead_source',
                    'label' => 'LBL_LEAD_SOURCE',
                    'default' => false,
                ],
                [
                    'name' => 'next_step',
                    'label' => 'LBL_NEXT_STEP',
                    'default' => false,
                ],
                [
                    'name' => 'probability',
                    'label' => 'LBL_PROBABILITY',
                    'default' => false,
                ],
                [
                    'name' => 'date_closed',
                    'label' => 'LBL_LIST_DATE_CLOSED',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'date_modified',
                    'enabled' => true,
                    'default' => true,
                ],
                [
                    'name' => 'date_entered',
                    'readonly' => true,
                    'default' => false,
                ],
                [
                    'name' => 'created_by_name',
                    'label' => 'LBL_CREATED',
                    'readonly' => true,
                    'default' => false,
                ],
                [
                    'name' => 'team_name',
                    'label' => 'LBL_TEAM',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'assigned_user_name',
                    'label' => 'LBL_ASSIGNED_TO_NAME',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'modified_by_name',
                    'label' => 'LBL_MODIFIED',
                    'readonly' => true,
                    'default' => false,
                ],
            ],
        ],
    ],
];
