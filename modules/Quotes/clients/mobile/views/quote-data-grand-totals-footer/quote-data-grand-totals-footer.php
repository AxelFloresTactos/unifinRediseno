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
$viewdefs['Quotes']['mobile']['view']['quote-data-grand-totals-footer'] = [
    'panels' => [
        [
            'name' => 'panel_quote_data_grand_totals_footer',
            'fields' => [
                [
                    'name' => 'deal_tot',
                    'type' => 'currency',
                    'related_fields' => [
                        'deal_tot_discount_percentage',
                    ],
                    'label' => 'LBL_LIST_DEAL_TOT',
                ],
                [
                    'name' => 'new_sub',
                    'type' => 'currency',
                    'label' => 'LBL_NEW_SUB',
                ],
                [
                    'name' => 'tax',
                    'type' => 'currency',
                    'related_fields' => [
                        'taxrate_value',
                    ],
                    'label' => 'LBL_TAX',
                ],
                [
                    'name' => 'shipping',
                    'type' => 'currency',
                    'default' => '0.00',
                    'label' => 'LBL_SHIPPING',
                ],
                [
                    'name' => 'total',
                    'label' => 'LBL_LIST_GRAND_TOTAL',
                    'type' => 'currency',
                ],
            ],
        ],
    ],
];
