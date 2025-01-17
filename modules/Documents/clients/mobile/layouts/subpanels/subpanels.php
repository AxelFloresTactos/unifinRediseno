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
$viewdefs['Documents']['mobile']['layout']['subpanels'] = [
    'components' => [
        [
            'layout' => 'subpanel',
            'label' => 'LBL_CONTRACTS_SUBPANEL_TITLE',
            'context' => [
                'link' => 'contracts',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_ACCOUNTS_SUBPANEL_TITLE',
            'context' => [
                'link' => 'accounts',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_CONTACTS_SUBPANEL_TITLE',
            'context' => [
                'link' => 'contacts',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_OPPORTUNITIES_SUBPANEL_TITLE',
            'context' => [
                'link' => 'opportunities',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_CASES_SUBPANEL_TITLE',
            'context' => [
                'link' => 'cases',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_RLI_SUBPANEL_TITLE',
            'creatable' => false,
            'context' => [
                'link' => 'revenuelineitems',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_QUOTES_SUBPANEL_TITLE',
            'context' => [
                'link' => 'quotes',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_PURCHASES_SUBPANEL_TITLE',
            'context' => [
                'link' => 'purchases',
            ],
        ],
        [
            'layout' => 'subpanel',
            'label' => 'LBL_PLIS_SUBPANEL_TITLE',
            'context' => [
                'link' => 'purchasedlineitems',
            ],
        ],
    ],
];
