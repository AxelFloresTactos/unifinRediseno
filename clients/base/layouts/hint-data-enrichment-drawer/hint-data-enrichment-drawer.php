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
$viewdefs['base']['layout']['hint-data-enrichment-drawer'] = [
    'components' => [
        [
            'layout' => [
                'type' => 'default',
                'name' => 'sidebar',
                'components' => [
                    [
                        'layout' => [
                            'type' => 'base',
                            'name' => 'main-pane',
                            'css_class' => 'main-pane span8 overflow-y-auto',
                            'components' => [
                                [
                                    'view' => 'hint-data-enrichment-drawer-header',
                                ],
                                [
                                    'layout' => 'hint-data-enrichment-drawer-content',
                                ],
                            ],
                        ],
                    ],
                    [
                        'layout' => [
                            'type' => 'base',
                            'name' => 'side-pane',
                            'components' => [
                                [
                                    'view' => 'hint-data-enrichment-drawer-fields',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
