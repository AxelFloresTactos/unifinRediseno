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

$viewdefs['Accounts']['base']['view']['record'] = [
    'buttons' => [
        [
            'type' => 'button',
            'name' => 'cancel_button',
            'label' => 'LBL_CANCEL_BUTTON_LABEL',
            'css_class' => 'btn-invisible btn-link',
            'showOn' => 'edit',
            'events' => [
                'click' => 'button:cancel_button:click',
            ],
        ],
        [
            'type' => 'rowaction',
            'event' => 'button:save_button:click',
            'name' => 'save_button',
            'label' => 'LBL_SAVE_BUTTON_LABEL',
            'css_class' => 'btn btn-primary',
            'showOn' => 'edit',
            'acl_action' => 'edit',
        ],
        [
            'type' => 'actiondropdown',
            'name' => 'main_dropdown',
            'primary' => true,
            'showOn' => 'view',
            'buttons' => [
                [
                    'type' => 'rowaction',
                    'event' => 'button:edit_button:click',
                    'name' => 'edit_button',
                    'label' => 'LBL_EDIT_BUTTON_LABEL',
                    'acl_action' => 'edit',
                ],
                [
                    'type' => 'escalate-action',
                    'event' => 'button:escalate_button:click',
                    'name' => 'escalate_button',
                    'label' => 'LBL_ESCALATE_BUTTON_LABEL',
                    'acl_action' => 'create',
                ],
                [
                    'type' => 'shareaction',
                    'name' => 'share',
                    'label' => 'LBL_RECORD_SHARE_BUTTON',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'pdfaction',
                    'name' => 'download-pdf',
                    'label' => 'LBL_PDF_VIEW',
                    'action' => 'download',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'pdfaction',
                    'name' => 'email-pdf',
                    'label' => 'LBL_PDF_EMAIL',
                    'action' => 'email',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'divider',
                ],
                [
                    'type' => 'rowaction',
                    'event' => 'button:find_duplicates_button:click',
                    'name' => 'find_duplicates_button',
                    'label' => 'LBL_DUP_MERGE',
                    'acl_action' => 'edit',
                ],
                [
                    'type' => 'rowaction',
                    'event' => 'button:duplicate_button:click',
                    'name' => 'duplicate_button',
                    'label' => 'LBL_DUPLICATE_BUTTON_LABEL',
                    'acl_module' => 'Accounts',
                    'acl_action' => 'create',
                ],
                [
                    'type' => 'rowaction',
                    'event' => 'button:historical_summary_button:click',
                    'name' => 'historical_summary_button',
                    'label' => 'LBL_HISTORICAL_SUMMARY',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'rowaction',
                    'event' => 'button:audit_button:click',
                    'name' => 'audit_button',
                    'label' => 'LNK_VIEW_CHANGE_LOG',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'divider',
                ],
                [
                    'type' => 'rowaction',
                    'event' => 'button:delete_button:click',
                    'name' => 'delete_button',
                    'label' => 'LBL_DELETE_BUTTON_LABEL',
                    'acl_action' => 'delete',
                ],
            ],
        ],
        [
            'name' => 'sidebar_toggle',
            'type' => 'sidebartoggle',
        ],
    ],
    'panels' => [
        [
            'name' => 'panel_header',
            'label' => 'LBL_PANEL_HEADER',
            'header' => true,
            'fields' => [
                [
                    'name' => 'picture',
                    'type' => 'avatar',
                    'size' => 'large',
                    'dismiss_label' => true,
                    'readonly' => true,
                    'white_list' => true,
                    'licenseDependency' => [
                        'HINT' => [
                            'name' => 'hint_account_pic',
                            'type' => 'hint-accounts-logo',
                        ],
                    ],
                ],
                [
                    'name' => 'name',
                    'type' => 'name',
                    'licenseDependency' => [
                        'HINT' => [
                            'type' => 'hint-accounts-search-dropdown',
                        ],
                    ],
                ],
                [
                    'name' => 'favorite',
                    'label' => 'LBL_FAVORITE',
                    'type' => 'favorite',
                    'dismiss_label' => true,
                ],
                [
                    'name' => 'is_escalated',
                    'type' => 'badge',
                    'badge_label' => 'LBL_ESCALATED',
                    'warning_level' => 'important',
                    'dismiss_label' => true,
                ],
                [
                    'name' => 'follow',
                    'label' => 'LBL_FOLLOW',
                    'type' => 'follow',
                    'readonly' => true,
                    'dismiss_label' => true,
                ],
            ],
        ],
        [
            'name' => 'panel_body',
            'label' => 'LBL_RECORD_BODY',
            'columns' => 2,
            'placeholders' => true,
            'fields' => [
                'website',
                'industry',
                'parent_name',
                'account_type',
                'business_center_name',
                'service_level',
                'assigned_user_name',
                'phone_office',
                [
                    'name' => 'tag',
                    'span' => 12,
                ],
            ],
        ],
        [
            'name' => 'panel_hidden',
            'label' => 'LBL_RECORD_SHOWMORE',
            'hide' => true,
            'columns' => 2,
            'placeholders' => true,
            'fields' => [
                [
                    'name' => 'billing_address',
                    'type' => 'fieldset',
                    'css_class' => 'address',
                    'label' => 'LBL_BILLING_ADDRESS',
                    'fields' => [
                        [
                            'name' => 'billing_address_street',
                            'css_class' => 'address_street',
                            'placeholder' => 'LBL_BILLING_ADDRESS_STREET',
                        ],
                        [
                            'name' => 'billing_address_city',
                            'css_class' => 'address_city',
                            'placeholder' => 'LBL_BILLING_ADDRESS_CITY',
                        ],
                        [
                            'name' => 'billing_address_state',
                            'css_class' => 'address_state',
                            'placeholder' => 'LBL_BILLING_ADDRESS_STATE',
                        ],
                        [
                            'name' => 'billing_address_postalcode',
                            'css_class' => 'address_zip',
                            'placeholder' => 'LBL_BILLING_ADDRESS_POSTALCODE',
                        ],
                        [
                            'name' => 'billing_address_country',
                            'css_class' => 'address_country',
                            'placeholder' => 'LBL_BILLING_ADDRESS_COUNTRY',
                        ],
                    ],
                ],
                [
                    'name' => 'shipping_address',
                    'type' => 'fieldset',
                    'css_class' => 'address',
                    'label' => 'LBL_SHIPPING_ADDRESS',
                    'fields' => [
                        [
                            'name' => 'shipping_address_street',
                            'css_class' => 'address_street',
                            'placeholder' => 'LBL_SHIPPING_ADDRESS_STREET',
                        ],
                        [
                            'name' => 'shipping_address_city',
                            'css_class' => 'address_city',
                            'placeholder' => 'LBL_SHIPPING_ADDRESS_CITY',
                        ],
                        [
                            'name' => 'shipping_address_state',
                            'css_class' => 'address_state',
                            'placeholder' => 'LBL_SHIPPING_ADDRESS_STATE',
                        ],
                        [
                            'name' => 'shipping_address_postalcode',
                            'css_class' => 'address_zip',
                            'placeholder' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
                        ],
                        [
                            'name' => 'shipping_address_country',
                            'css_class' => 'address_country',
                            'placeholder' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
                        ],
                        [
                            'name' => 'copy',
                            'label' => 'NTC_COPY_BILLING_ADDRESS',
                            'type' => 'copy',
                            'mapping' => [
                                'billing_address_street' => 'shipping_address_street',
                                'billing_address_city' => 'shipping_address_city',
                                'billing_address_state' => 'shipping_address_state',
                                'billing_address_postalcode' => 'shipping_address_postalcode',
                                'billing_address_country' => 'shipping_address_country',
                            ],
                        ],
                    ],
                ],
                [
                    'name' => 'phone_alternate',
                    'label' => 'LBL_PHONE_ALT',
                ],
                [
                    'name' => 'geocode_status',
                    'licenseFilter' => ['MAPS'],
                ],
                'email',
                'phone_fax',
                'campaign_name',
                'twitter',
                [
                    'name' => 'description',
                    'span' => 12,
                ],
                'sic_code',
                'ticker_symbol',
                'annual_revenue',
                'employees',
                'ownership',
                'rating',

                [
                    'name' => 'duns_num',
                    'readonly' => true,
                ],
                [
                    'name' => 'date_entered_by',
                    'readonly' => true,
                    'inline' => true,
                    'type' => 'fieldset',
                    'label' => 'LBL_DATE_ENTERED',
                    'fields' => [
                        [
                            'name' => 'date_entered',
                        ],
                        [
                            'type' => 'label',
                            'default_value' => 'LBL_BY',
                        ],
                        [
                            'name' => 'created_by_name',
                        ],
                    ],
                ],
                'team_name',
                [
                    'name' => 'date_modified_by',
                    'readonly' => true,
                    'inline' => true,
                    'type' => 'fieldset',
                    'label' => 'LBL_DATE_MODIFIED',
                    'fields' => [
                        [
                            'name' => 'date_modified',
                        ],
                        [
                            'type' => 'label',
                            'default_value' => 'LBL_BY',
                        ],
                        [
                            'name' => 'modified_by_name',
                        ],
                    ],
                ],
            ],
        ],
        [
            'name' => 'panel_hint',
            'label' => 'LBL_HINT_PANEL',
            'columns' => 2,
            'labels' => true,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => [
                'hint_account_size',
                'hint_account_industry',
                'hint_account_location',
                'hint_account_founded_year',
                'hint_account_industry_tags',
                'hint_account_naics_code_lbl',
                'hint_account_fiscal_year_end',
                [
                    'name' => 'hint_account_facebook_handle',
                    'type' => 'stage2_url',
                ],
                [
                    'name' => 'hint_account_logo',
                    'type' => 'stage2_image',
                    'readonly' => true,
                    'dismiss_label' => true,
                    'white_list' => true,
                    'fields' => ['hint_account_pic'],
                ],
            ],
            'licenseFilter' => ['HINT'],
        ],
    ],
];
