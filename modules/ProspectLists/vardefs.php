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
$dictionary['ProspectList'] = [
    'favorites' => true,
    'table' => 'prospect_lists',
    'color' => 'army',
    'icon' => 'sicon-target-lists-lg',
    'unified_search' => true,
    'full_text_search' => true,
    'fields' => [
        'id' => [
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'required' => true,
            'reportable' => false,
        ],
        'name' => [
            'name' => 'name',
            'vname' => 'LBL_NAME',
            'type' => 'name',
            'dbType' => 'varchar',
            'len' => '255',
            'importable' => 'required',
            'unified_search' => true,
            'full_text_search' => ['enabled' => true, 'searchable' => true, 'boost' => 1.33],
            'required' => true,
        ],
        'list_type' => [
            'name' => 'list_type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
            'options' => 'prospect_list_type_dom',
            'len' => 100,
            'importable' => 'required',
        ],
        'date_entered' => [
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'full_text_search' => [
                'enabled' => true,
                'searchable' => false,
                // Disabled until UX component is available
                //'aggregations' => array(
                //    'date_entered' => array(
                //        'type' => 'DateRange',
                //    ),
                //),
            ],
            'readonly' => true,
        ],
        'date_modified' => [
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'full_text_search' => [
                'enabled' => true,
                'searchable' => false,
                // Disabled until UX component is available
                //'aggregations' => array(
                //    'date_modified' => array(
                //        'type' => 'DateRange',
                //    ),
                //),
            ],
            'readonly' => true,
        ],
        'modified_user_id' => [
            'name' => 'modified_user_id',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_MODIFIED',
            'type' => 'assigned_user_name',
            'table' => 'modified_user_id_users',
            'isnull' => 'false',
            'dbType' => 'id',
            'reportable' => true,
            'full_text_search' => [
                'enabled' => true,
                'searchable' => false,
                'type' => 'id',
                'aggregations' => [
                    'modified_user_id' => [
                        'type' => 'MyItems',
                        'label' => 'LBL_AGG_MODIFIED_BY_ME',
                    ],
                ],
            ],
            'readonly' => true,
        ],
        'modified_by_name' => [
            'name' => 'modified_by_name',
            'vname' => 'LBL_MODIFIED',
            'type' => 'relate',
            'reportable' => false,
            'source' => 'non-db',
            'table' => 'users',
            'rname' => 'name',
            'id_name' => 'modified_user_id',
            'module' => 'Users',
            'duplicate_merge' => 'disabled',
            'readonly' => true,
            'link' => 'modified_user_link',
        ],
        'created_by' => [
            'name' => 'created_by',
            'rname' => 'user_name',
            'id_name' => 'created_by',
            'vname' => 'LBL_CREATED',
            'type' => 'assigned_user_name',
            'table' => 'created_by_users',
            'isnull' => 'false',
            'dbType' => 'id',
            'full_text_search' => [
                'enabled' => true,
                'searchable' => false,
                'type' => 'id',
                'aggregations' => [
                    'created_by' => [
                        'type' => 'MyItems',
                        'label' => 'LBL_AGG_CREATED_BY_ME',
                    ],
                ],
            ],
            'readonly' => true,
        ],
        'created_by_name' => [
            'name' => 'created_by_name',
            'vname' => 'LBL_CREATED',
            'type' => 'relate',
            'reportable' => false,
            'source' => 'non-db',
            'table' => 'users',
            'rname' => 'name',
            'id_name' => 'created_by',
            'module' => 'Users',
            'duplicate_merge' => 'disabled',
            'readonly' => true,
            'link' => 'created_by_link',
        ],
        'deleted' => [
            'name' => 'deleted',
            'vname' => 'LBL_CREATED_BY',
            'type' => 'bool',
            'required' => false,
            'reportable' => false,
        ],
        'description' => [
            'name' => 'description',
            'vname' => 'LBL_DESCRIPTION',
            'type' => 'text',
            'full_text_search' => ['enabled' => true, 'searchable' => true, 'boost' => 0.39],
            'reportable' => false,
        ],
        'domain_name' => [
            'name' => 'domain_name',
            'vname' => 'LBL_DOMAIN_NAME',
            'type' => 'varchar',
            'len' => '255',
            'dependency' => 'equal($list_type, "exempt_domain")',
            'reportable' => false,
        ],
        'entry_count' => [
            'name' => 'entry_count',
            'type' => 'int',
            'source' => 'non-db',
            'vname' => 'LBL_LIST_ENTRIES',
        ],
        'prospects' => [
            'name' => 'prospects',
            'type' => 'link',
            'relationship' => 'prospect_list_prospects',
            'source' => 'non-db',
            'vname' => 'LBL_PROSPECTS',
        ],
        'contacts' => [
            'name' => 'contacts',
            'type' => 'link',
            'relationship' => 'prospect_list_contacts',
            'source' => 'non-db',
            'vname' => 'LBL_CONTACTS',
        ],
        'leads' => [
            'name' => 'leads',
            'type' => 'link',
            'relationship' => 'prospect_list_leads',
            'source' => 'non-db',
            'vname' => 'LBL_LEADS',
        ],
        'accounts' => [
            'name' => 'accounts',
            'type' => 'link',
            'relationship' => 'prospect_list_accounts',
            'source' => 'non-db',
            'vname' => 'LBL_ACCOUNTS',
        ],
        'campaigns' => [
            'name' => 'campaigns',
            'type' => 'link',
            'relationship' => 'prospect_list_campaigns',
            'source' => 'non-db',
            'vname' => 'LBL_CAMPAIGNS',
        ],
        'users' => [
            'name' => 'users',
            'type' => 'link',
            'relationship' => 'prospect_list_users',
            'source' => 'non-db',
            'vname' => 'LBL_USERS',
        ],
        'email_marketing' => [
            'name' => 'email_marketing',
            'type' => 'link',
            'relationship' => 'email_marketing_prospect_lists',
            'source' => 'non-db',
        ],
        'modified_user_link' => [
            'name' => 'modified_user_link',
            'type' => 'link',
            'relationship' => 'prospectlists_modified_user',
            'vname' => 'LBL_MODIFIED_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
            'side' => 'right',
        ],
        'created_by_link' => [
            'name' => 'created_by_link',
            'type' => 'link',
            'relationship' => 'prospectlists_created_by',
            'vname' => 'LBL_CREATED_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
            'side' => 'right',
        ],
        'marketing_id' => [
            'name' => 'marketing_id',
            'vname' => 'LBL_MARKETING_ID',
            'type' => 'id',
            'source' => 'non-db',
        ],
        'marketing_name' => [
            'name' => 'marketing_name',
            'vname' => 'LBL_MARKETING_NAME',
            'type' => 'varchar',
            'len' => '255',
            'source' => 'non-db',
        ],
    ],
    'indices' => [
        [
            'name' => 'prospectlistsspk',
            'type' => 'primary',
            'fields' => ['id'],
        ],
        [
            'name' => 'idx_prospect_list_name',
            'type' => 'index',
            'fields' => ['name'],
        ],
        ['name' => 'idx_prospect_list_list_type', 'type' => 'index', 'fields' => ['list_type']],
        ['name' => 'idx_prospect_list_date_entered', 'type' => 'index', 'fields' => ['date_entered']],
    ],
    'relationships' => [
        'prospectlists_assigned_user' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'ProspectLists',
            'rhs_table' => 'prospect_lists',
            'rhs_key' => 'assigned_user_id',
            'relationship_type' => 'one-to-many',
        ],
        'prospectlists_modified_user' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'ProspectLists',
            'rhs_table' => 'prospect_lists',
            'rhs_key' => 'modified_user_id',
            'relationship_type' => 'one-to-many',
        ],
        'prospectlists_created_by' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'ProspectLists',
            'rhs_table' => 'prospect_lists',
            'rhs_key' => 'created_by',
            'relationship_type' => 'one-to-many',
        ],
    ],
    'duplicate_check' => [
        'enabled' => false,
    ],
    'after_create' => [
        'copy_rel_from' => [
            'accounts',
            'contacts',
            'leads',
            'prospects',
            'users',
        ],
    ],
    'uses' => [
        'taggable',
    ],
];

VardefManager::createVardef(
    'ProspectLists',
    'ProspectList',
    [
        'assignable',
        'team_security',
        'commentlog',
    ]
);
