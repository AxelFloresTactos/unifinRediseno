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
// created: 2005-11-04 15:39:46
$acldefs['ProjectTask'] = [
    'forms' => [
        'by_name' => [
            'change_project' => [
                'display_option' => 'disabled',
                'action_option' => 'list',
                'app_action' => 'EditView',
                'module' => 'Project',
            ],
            'change_parent' => [
                'display_option' => 'disabled',
                'action_option' => 'list',
                'app_action' => 'EditView',
                'module' => 'ProjectTask',
            ],
        ],
    ],
    'form_names' => [
        'by_id' => 'by_id',
        'by_name' => 'by_name',
        'DetailView' => 'DetailView',
        'EditView' => 'EditView',
    ],
];
