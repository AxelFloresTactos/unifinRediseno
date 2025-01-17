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

$module_name = 'pmse_Emails_Templates';
$viewdefs[$module_name] =
    [
        'EditView' => [
            'templateMeta' => [
                'maxColumns' => '2',
                'widths' => [
                    0 =>
                        [
                            'label' => '10',
                            'field' => '30',
                        ],
                    1 =>
                        [
                            'label' => '10',
                            'field' => '30',
                        ],
                ],
            ],
            'panels' => [
                'default' => [
                    0 =>
                        [
                            0 => 'name',
                            1 => 'assigned_user_name',
                        ],
                    1 =>
                        [
                        ],
                    2 =>
                        [
                            0 => 'description',
                        ],
                ],
            ],
        ],
    ];
