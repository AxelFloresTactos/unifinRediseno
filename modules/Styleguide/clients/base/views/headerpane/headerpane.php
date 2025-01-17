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
$viewdefs['Styleguide']['base']['view']['headerpane'] = [
    'buttons' => [
        [
            'name' => 'create_button',
            'type' => 'button',
            'label' => 'LBL_CREATE_BUTTON_LABEL',
            'css_class' => 'btn-primary',
            'acl_action' => 'create',
            'route' => [
                'action' => 'create',
            ],
        ],
        [
            'name' => 'import_vcard_button',
            'type' => 'button',
            'label' => 'LBL_IMPORT_VCARD',
            'css_class' => 'btn-primary',
            'acl_action' => 'import',
            'events' => [
                'click' => 'function(e){
                    app.drawer.open({
                            layout : "vcard-import",
                            context: {
                                create: true
                            }
                        });
                    }',
            ],
        ],

        [
            'name' => 'sidebar_toggle',
            'type' => 'sidebartoggle',
        ],
    ],
];
