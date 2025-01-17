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
$viewdefs['Emails']['base']['view']['create'] = [
    'template' => 'record',
    'buttons' => [
        [
            'name' => 'cancel_button',
            'type' => 'button',
            'label' => 'LBL_CANCEL_BUTTON_LABEL',
            'css_class' => 'btn-invisible btn-link',
            'events' => [
                'click' => 'button:cancel_button:click',
            ],
        ],
        [
            'name' => 'save_button',
            'type' => 'button',
            'label' => 'LBL_ARCHIVE',
            'primary' => true,
            'showOn' => 'create',
            'events' => [
                'click' => 'button:save_button:click',
            ],
        ],
        [
            'name' => 'sidebar_toggle',
            'type' => 'sidebartoggle',
        ],
    ],
    'panels' => [
        [
            'name' => 'panel_body',
            'label' => 'LBL_PANEL_2',
            'columns' => 1,
            'labels' => true,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => [
                [
                    'name' => 'date_sent',
                    'type' => 'datetimecombo',
                    'label' => 'LBL_DATE_SENT',
                    'span' => 12,
                    'required' => true,
                ],
                [
                    'name' => 'from_collection',
                    'type' => 'from',
                    'label' => 'LBL_FROM',
                    'span' => 12,
                    'required' => true,
                ],
                [
                    'name' => 'to_collection',
                    'type' => 'email-recipients',
                    'label' => 'LBL_TO_ADDRS',
                    'span' => 12,
                    'decorate_opt_out' => false,
                ],
                [
                    'name' => 'cc_collection',
                    'type' => 'email-recipients',
                    'label' => 'LBL_CC',
                    'span' => 12,
                    'decorate_opt_out' => false,
                ],
                [
                    'name' => 'bcc_collection',
                    'type' => 'email-recipients',
                    'label' => 'LBL_BCC',
                    'span' => 12,
                    'decorate_opt_out' => false,
                ],
                [
                    'name' => 'name',
                    'label' => 'LBL_SUBJECT',
                    'span' => 12,
                    'required' => true,
                ],
                [
                    'name' => 'description_html',
                    'dismiss_label' => true,
                    'span' => 12,
                    'fieldSelector' => 'archive_html_body',
                    'tinyConfig' => [
                        'toolbar' => 'code | bold italic underline strikethrough | alignleft aligncenter alignright ' .
                            'alignjustify | forecolor backcolor | fontfamily fontsize blocks | ' .
                            'cut copy paste pastetext | search searchreplace | bullist numlist | ' .
                            'outdent indent | ltr rtl | undo redo | link unlink anchor image | subscript ' .
                            'superscript | charmap | table | hr removeformat | insertdatetime | ' .
                            'sugarattachment sugarsignature sugartemplate',
                    ],
                ],
                [
                    'name' => 'attachments_collection',
                    'type' => 'email-attachments',
                    'dismiss_label' => true,
                    'span' => 12,
                ],
            ],
        ],
        [
            'name' => 'panel_hidden',
            'hide' => true,
            'columns' => 1,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => [
                [
                    'type' => 'teamset',
                    'name' => 'team_name',
                    'span' => 12,
                ],
                [
                    'name' => 'parent_name',
                    'span' => 12,
                ],
                [
                    'name' => 'assigned_user_name',
                    'type' => 'relate',
                    'span' => 12,
                ],
                [
                    'name' => 'tag',
                    'span' => 12,
                ],
            ],
        ],
    ],
];
