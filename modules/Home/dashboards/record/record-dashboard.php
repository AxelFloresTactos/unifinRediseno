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
return [
    'metadata' => [
        'components' => [
            [
                'rows' => [
                    [
                        [
                            'view' => [
                                'type' => 'twitter',
                                'label' => 'LBL_DASHLET_RECENT_TWEETS_SUGARCRM_NAME',
                                'twitter' => 'sugarcrm',
                                'limit' => 20,
                            ],
                            'width' => 12,
                        ],
                    ],
                    [
                        [
                            'view' => [
                                'type' => 'dashablelist',
                                'label' => 'TPL_DASHLET_MY_MODULE',
                                'display_columns' => [
                                    'name',
                                    'account_name',
                                    'phone_work',
                                    'title',
                                ],
                                'limit' => 15,
                            ],
                            'context' => [
                                'module' => 'Contacts',
                            ],
                            'width' => 12,
                        ],
                    ],
                ],
                'width' => 4,
            ],
            [
                'rows' => [
                    [
                        [
                            'view' => [
                                'type' => 'sales-pipeline',
                                'label' => 'LBL_DASHLET_PIPLINE_NAME',
                                'visibility' => 'user',
                            ],
                            'width' => 12,
                        ],
                    ],
                    [
                        [
                            'view' => [
                                'type' => 'bubblechart',
                                'label' => 'LBL_DASHLET_TOP10_SALES_OPPORTUNITIES_NAME',
                                'filter_duration' => 'current',
                                'visibility' => 'user',
                            ],
                            'width' => 12,
                        ],
                    ],
                ],
                'width' => 8,
            ],
        ],
    ],
    'name' => 'LBL_HOME_DASHBOARD',
];
