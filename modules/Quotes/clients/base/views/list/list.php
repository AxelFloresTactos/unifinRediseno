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
$viewdefs['Quotes']['base']['view']['list'] = [
    'panels' => [
        [
            'name' => 'panel_header',
            'label' => 'LBL_PANEL_1',
            'fields' => [
                [
                    'label' => 'LBL_LIST_QUOTE_NUM',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'quote_num',
                ],
                [
                    'label' => 'LBL_LIST_QUOTE_NAME',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'name',
                    'link' => true,
                ],
                [
                    'target_record_key' => 'billing_account_id',
                    'target_module' => 'Accounts',
                    'label' => 'LBL_LIST_ACCOUNT_NAME',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'billing_account_name',
                    'sortable' => true,
                ],
                [
                    'label' => 'LBL_QUOTE_STAGE',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'quote_stage',
                ],
                [
                    'label' => 'LBL_TOTAL',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'total',
                    'related_fields' => [
                        'currency_id',
                    ],
                ],
                [
                    'label' => 'LBL_LIST_AMOUNT_USDOLLAR',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'total_usdollar',
                ],
                [
                    'name' => 'date_quote_expected_closed',
                    'label' => 'LBL_LIST_DATE_QUOTE_EXPECTED_CLOSED',
                    'enabled' => true,
                    'default' => true,
                ],
                [
                    'name' => 'assigned_user_name',
                    'target_record_key' => 'assigned_user_id',
                    'target_module' => 'Employees',
                    'label' => 'LBL_LIST_ASSIGNED_TO_NAME',
                    'enabled' => true,
                    'default' => true,
                    'sortable' => false,
                ],
                [
                    'name' => 'date_modified',
                    'enabled' => true,
                    'default' => true,
                ],
                [
                    'name' => 'date_entered',
                    'enabled' => true,
                    'default' => true,
                ],
            ],
        ],
    ],
];
