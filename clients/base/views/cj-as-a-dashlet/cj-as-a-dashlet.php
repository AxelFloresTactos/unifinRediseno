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
$viewdefs['base']['view']['cj-as-a-dashlet'] = [
    'dashlets' => [
        [
            'label' => 'LBL_CJ_AS_A_DASHLET',
            'description' => 'LBL_CJ_AS_A_DASHLET_DESC',
            'config' => [],
            'preview' => [],
            'filter' => [
                'module' => explode(',', $GLOBALS['sugar_config']['customer_journey']['enabled_modules']),
                'blacklist' => [
                    'module' => [
                        'Administration',
                        'Emails',
                        'pmse_Project',
                        'CJ_Forms',
                        'CJ_WebHooks',
                        'DRI_SubWorkflows',
                        'DRI_SubWorkflow_Templates',
                        'DRI_Workflows',
                        'DRI_Workflow_Task_Templates',
                        'DRI_Workflow_Templates',
                    ],
                ],
                'view' => 'record',
            ],
        ],
    ],
];
