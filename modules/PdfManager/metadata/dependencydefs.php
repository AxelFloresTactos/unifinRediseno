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


$dependencies['PdfManager']['read_only_base_module_edition'] = [
    'hooks' => ['edit', 'view'],
    'trigger' => 'true',
    'triggerFields' => [
        'id',
    ],
    'onload' => true,
    'actions' => [
        [
            'name' => 'ReadOnly',
            'params' => [
                'target' => 'base_module',
                'value' => 'not(equal($record, ""))',
            ],
        ],
    ],
    'notActions' => [],
];
