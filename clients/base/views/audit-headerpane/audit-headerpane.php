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
$viewdefs['base']['view']['audit-headerpane'] = [
    'template' => 'headerpane',
    'fields' => [
        [
            'name' => 'title',
            'type' => 'label',
            'default_value' => 'LBL_AUDIT_TITLE',
        ],
    ],
    'buttons' => [
        [
            'name' => 'close_button',
            'type' => 'button',
            'label' => 'LBL_CLOSE_BUTTON_TITLE',
            'css_class' => 'btn btn-primary',
        ],
    ],
];
