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
$viewdefs['Home']['base']['view']['search-dashboard-headerpane'] = [
    'buttons' => [
        [
            'type' => 'actiondropdown',
            'buttons' => [
                [
                    'name' => 'reset_button',
                    'type' => 'rowaction',
                    'label' => 'LBL_RESET_BUTTON_LABEL',
                    'css_class' => 'btn',
                ],

                [
                    'name' => 'collapse_button',
                    'type' => 'rowaction',
                    'label' => 'LBL_DASHLET_MINIMIZE_ALL',
                ],

                [
                    'name' => 'expand_button',
                    'type' => 'rowaction',
                    'label' => 'LBL_DASHLET_MAXIMIZE_ALL',
                ],
            ],
            'showOn' => 'view',
        ],
    ],
    'panels' => [
        [
            'name' => 'header',
            'fields' => [
                [
                    'type' => 'label',
                    'name' => 'name',
                    'default_value' => 'LBL_FACETS_DASHBOARD_TITLE',
                ],
            ],
        ],
    ],
];
