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
$viewdefs[$module_name]['mobile']['view']['list'] = [
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
                    'name' => 'amount_usdollar',
                    'label' => 'LBL_LIST_AMOUNT',
                    'align' => 'right',
                    'currency_format' => true,
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => $_module_name . '_type',
                    'label' => 'LBL_TYPE',
                ],
                [
                    'name' => 'lead_source',
                    'label' => 'LBL_LEAD_SOURCE',
                ],
                [
                    'name' => 'next_step',
                    'label' => 'LBL_NEXT_STEP',
                ],
                [
                    'name' => 'probability',
                    'label' => 'LBL_PROBABILITY',
                ],
                [
                    'name' => 'date_closed',
                    'label' => 'LBL_LIST_DATE_CLOSED',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'date_entered',
                    'label' => 'LBL_DATE_ENTERED',
                    'readonly' => true,
                ],
                [
                    'name' => 'created_by_name',
                    'label' => 'LBL_CREATED',
                    'readonly' => true,
                ],
                [
                    'name' => 'team_name',
                    'label' => 'LBL_LIST_TEAM',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'assigned_user_name',
                    'label' => 'LBL_LIST_ASSIGNED_USER',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'modified_by_name',
                    'label' => 'LBL_MODIFIED',
                    'readonly' => true,
                ],
            ],
        ],
    ],
];
