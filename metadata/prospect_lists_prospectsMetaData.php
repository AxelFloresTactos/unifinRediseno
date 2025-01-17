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

$dictionary['prospect_lists_prospects'] = [
    'table' => 'prospect_lists_prospects',
    'fields' => [
        'id' => [
            'name' => 'id',
            'type' => 'id',
        ],
        'prospect_list_id' => [
            'name' => 'prospect_list_id',
            'type' => 'id',
        ],
        'related_id' => [
            'name' => 'related_id',
            'type' => 'id',
        ],
        'related_type' => [
            'name' => 'related_type',
            'type' => 'varchar',
            'len' => '25',
        ],
        'date_modified' => [
            'name' => 'date_modified',
            'type' => 'datetime',
        ],
        'deleted' => [
            'name' => 'deleted',
            'type' => 'bool',
            'len' => '1',
            'default' => '0',
        ],
    ],
    'indices' => [
        [
            'name' => 'prospect_lists_prospectspk',
            'type' => 'primary',
            'fields' => [
                'id',
            ],
        ],
        [
            'name' => 'idx_plp_pro_id',
            'type' => 'index',
            'fields' => [
                'prospect_list_id',
                'deleted',
            ],
        ],
        [
            'name' => 'idx_plp_rel_id',
            'type' => 'alternate_key',
            'fields' => [
                'related_id',
                'related_type',
                'prospect_list_id',
            ],
        ],
    ],
    'relationships' => [
        'prospect_list_contacts' => [
            'lhs_module' => 'ProspectLists',
            'lhs_table' => 'prospect_lists',
            'lhs_key' => 'id',
            'rhs_module' => 'Contacts',
            'rhs_table' => 'contacts',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'prospect_lists_prospects',
            'join_key_lhs' => 'prospect_list_id',
            'join_key_rhs' => 'related_id',
            'relationship_role_column' => 'related_type',
            'relationship_role_column_value' => 'Contacts',
        ],
        'prospect_list_prospects' => [
            'lhs_module' => 'ProspectLists',
            'lhs_table' => 'prospect_lists',
            'lhs_key' => 'id',
            'rhs_module' => 'Prospects',
            'rhs_table' => 'prospects',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'prospect_lists_prospects',
            'join_key_lhs' => 'prospect_list_id',
            'join_key_rhs' => 'related_id',
            'relationship_role_column' => 'related_type',
            'relationship_role_column_value' => 'Prospects',
        ],
        'prospect_list_leads' => [
            'lhs_module' => 'ProspectLists',
            'lhs_table' => 'prospect_lists',
            'lhs_key' => 'id',
            'rhs_module' => 'Leads',
            'rhs_table' => 'leads',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'prospect_lists_prospects',
            'join_key_lhs' => 'prospect_list_id',
            'join_key_rhs' => 'related_id',
            'relationship_role_column' => 'related_type',
            'relationship_role_column_value' => 'Leads',
        ],
        'prospect_list_users' => [
            'lhs_module' => 'ProspectLists',
            'lhs_table' => 'prospect_lists',
            'lhs_key' => 'id',
            'rhs_module' => 'Users',
            'rhs_table' => 'users',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'prospect_lists_prospects',
            'join_key_lhs' => 'prospect_list_id',
            'join_key_rhs' => 'related_id',
            'relationship_role_column' => 'related_type',
            'relationship_role_column_value' => 'Users',
        ],
        'prospect_list_accounts' => [
            'lhs_module' => 'ProspectLists',
            'lhs_table' => 'prospect_lists',
            'lhs_key' => 'id',
            'rhs_module' => 'Accounts',
            'rhs_table' => 'accounts',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'prospect_lists_prospects',
            'join_key_lhs' => 'prospect_list_id',
            'join_key_rhs' => 'related_id',
            'relationship_role_column' => 'related_type',
            'relationship_role_column_value' => 'Accounts',
        ],
    ],
];
