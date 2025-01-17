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

$viewdefs['Notes']['base']['view']['activity-card-content'] = [
    'panels' => [
        [
            'name' => 'panel_body',
            'label' => 'LBL_PANEL_2',
            'css_class' => 'panel-body',
            'fields' => [
                [
                    'name' => 'description',
                    'settings' => [
                        'max_display_chars' => 10000,
                        'collapsed' => false,
                    ],
                ],
            ],
        ],
        [
            'name' => 'panel_attachments',
            'label' => 'LBL_PANEL_3',
            'css_class' => 'panel-attachments mt-2',
            'fields' => [
                [
                    'name' => 'attachment_list',
                    'type' => 'multi-attachments',
                    'modulefield' => 'filename',
                    'related_fields' => [
                        'filename',
                        'file_mime_type',
                    ],
                ],
            ],
        ],
    ],
];
