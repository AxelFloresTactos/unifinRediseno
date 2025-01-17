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
/*********************************************************************************
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
$viewdefs['RevenueLineItems']['mobile']['view']['edit'] = [
    'templateMeta' => [
        'maxColumns' => '1',
        'widths' => [
            ['label' => '10', 'field' => '30'],
        ],
    ],
    'panels' => [
        [
            'fields' => [
                [
                    'name' => 'name',
                    'required' => true,
                ],
                [
                    'name' => 'opportunity_name',
                    'required' => true,
                ],
                [
                    'name' => 'account_name',
                    'readonly' => true,
                ],
                [
                    'name' => 'date_closed',
                    'required' => true,
                ],
                [
                    'name' => 'likely_case',
                    'required' => true,
                ],
                'best_case',
                'worst_case',
                'sales_stage',
                'probability',
                'product_template_name',
                'quantity',
                'discount_amount',
                [
                    'name' => 'quote_name',
                    'readonly' => true,
                ],
                'tag',
                'assigned_user_name',
                'team_name',
            ],
        ],
    ],
];
