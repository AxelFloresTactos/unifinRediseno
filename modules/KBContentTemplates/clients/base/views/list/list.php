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

$viewdefs['KBContentTemplates']['base']['view']['list'] = [
    'panels' => [
        [
            'label' => 'LBL_PANEL_1',
            'fields' => [
                [
                    'name' => 'name',
                    'label' => 'LBL_NAME',
                    'default' => true,
                    'enabled' => true,
                    'link' => true,
                ],
                [
                    'name' => 'created_by_name',
                    'label' => 'LBL_CREATED',
                    'default' => true,
                    'enabled' => true,
                    'readonly' => true,
                ],
                [
                    'name' => 'date_entered',
                    'label' => 'LBL_DATE_ENTERED',
                    'default' => true,
                    'enabled' => true,
                    'readonly' => true,
                ],
                [
                    'name' => 'date_modified',
                    'label' => 'LBL_DATE_MODIFIED',
                    'default' => true,
                    'enabled' => true,
                    'readonly' => true,
                ],
            ],
        ],
    ],
    'orderBy' => [
        'field' => 'date_entered',
        'direction' => 'desc',
    ],
];
