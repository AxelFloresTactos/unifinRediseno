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
$viewdefs['Emails']['base']['view']['panel-top'] = [
    'buttons' => [
        [
            'type' => 'actiondropdown',
            'name' => 'panel_dropdown',
            'css_class' => 'pull-right',
            'buttons' => [
                [
                    'type' => 'emailaction-paneltop',
                    'icon' => 'sicon-plus',
                    'name' => 'email_compose_button',
                    'label' => ' ',
                    'acl_action' => 'create',
                    'set_recipient_to_parent' => true,
                    'set_related_to_parent' => true,
                    'tooltip' => 'LBL_CREATE_BUTTON_LABEL',
                ],
                [
                    'type' => 'link-action',
                    'name' => 'select_button',
                    'label' => 'LBL_ASSOC_RELATED_RECORD',
                    'css_class' => 'disabled',
                ],
            ],
        ],
    ],
];
