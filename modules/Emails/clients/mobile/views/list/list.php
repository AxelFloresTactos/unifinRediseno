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
$viewdefs['Emails']['mobile']['view']['list'] = [
    'panels' => [
        [
            'name' => 'panel_header',
            'fields' => [
                [
                    'name' => 'from_collection',
                    'type' => 'email-sender',
                    'label' => 'LBL_FROM',
                    'sortable' => false,
                    'max_num' => -1,
                    'fields' => [
                        'email_address_id',
                        'email_address',
                        'address_type',
                        'parent_type',
                        'parent_id',
                        'parent_name',
                        'invalid_email',
                        'opt_out',
                    ],
                    'enabled' => true,
                    'default' => true,
                ],
                [
                    'name' => 'name',
                    'enabled' => true,
                    'default' => true,
                    /* Fetch the following fields along with other fields displayed on the list view */
                    'related_fields' => [
                        'my_favorite',
                        'following',
                        'state',
                        'parent_name',
                        'description_html',
                        'description',
                        'assigned_user_name',
                        'team_name',
                        'tag',
                        'mailbox_name',
                        'total_attachments',
                        [
                            'name' => 'to_collection',
                            'max_num' => -1,
                            'fields' => [
                                'email_address_id',
                                'email_address',
                                'address_type',
                                'parent_type',
                                'parent_id',
                                'parent_name',
                                'invalid_email',
                                'opt_out',
                            ],
                        ],
                        [
                            'name' => 'attachments_collection',
                            'max_num' => -1,
                            'fields' => [
                                'name',
                                'filename',
                                'file_size',
                                'file_source',
                                'file_mime_type',
                                'file_ext',
                                'upload_id',
                            ],
                        ],
                        [
                            'name' => 'cc_collection',
                            'max_num' => -1,
                            'fields' => [
                                'email_address_id',
                                'email_address',
                                'address_type',
                                'parent_type',
                                'parent_id',
                                'parent_name',
                                'invalid_email',
                                'opt_out',
                            ],
                        ],
                        [
                            'name' => 'bcc_collection',
                            'max_num' => -1,
                            'fields' => [
                                'email_address_id',
                                'email_address',
                                'address_type',
                                'parent_type',
                                'parent_id',
                                'parent_name',
                                'invalid_email',
                                'opt_out',
                            ],
                        ],
                    ],
                ],
                [
                    'name' => 'date_sent',
                    'label' => 'LBL_DATE',
                    'enabled' => true,
                    'default' => true,
                ],
            ],
        ],
    ],
];
