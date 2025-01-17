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

$viewdefs['Reports']['base']['filter']['reports'] = [
    'filters' => [
        [
            'id' => 'by_module',
            'name' => 'LBL_FILTER_BY_MODULE',
            'filter_definition' => [
                [
                    'module' => [
                        '$in' => [],
                    ],
                ],
            ],
            'editable' => true,
            'is_template' => true,
        ],
        [
            'id' => 'with_charts',
            'name' => 'LBL_FILTER_WITH_CHARTS',
            'filter_definition' => [
                [
                    'chart_type' => [
                        '$not_equals' => 'none',
                    ],
                ],
            ],
            'editable' => false,
            'is_template' => true,
        ],
    ],
];
