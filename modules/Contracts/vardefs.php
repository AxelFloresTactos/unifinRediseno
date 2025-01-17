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

$dictionary['Contract'] = [
    'table' => 'contracts',
    'favorites' => false,
    'audited' => true,
    'activity_enabled' => true,
    'color' => 'ocean',
    'icon' => 'sicon-contracts-lg',
    'unified_search' => true,
    'full_text_search' => true,
    'comment' => 'A contract collects information about important legal and contractural obligations',
    'fields' => [
        'name' => [
            'name' => 'name',
            'vname' => 'LBL_CONTRACT_NAME',
            'dbType' => 'varchar',
            'type' => 'name',
            'len' => '255',
            'required' => true,
            'comment' => 'The name of the contract',
            'importable' => 'required',
            'unified_search' => true,
            'full_text_search' => ['enabled' => true, 'searchable' => true, 'boost' => 1.59],
        ],
        'reference_code' => [
            'name' => 'reference_code',
            'vname' => 'LBL_REFERENCE_CODE',
            'type' => 'varchar',
            'len' => '255',
            'required' => false,
            'comment' => 'The reference code used by the organization to refer to this contract',
            'full_text_search' => ['enabled' => true, 'searchable' => true, 'boost' => 0.62],
        ],
        'quotes' => [
            'name' => 'quotes',
            'type' => 'link',
            'vname' => 'LBL_QUOTES',
            'relationship' => 'contracts_quotes',
            'source' => 'non-db',
        ],
        'opportunities' => [
            'name' => 'opportunities',
            'type' => 'link',
            'vname' => 'LBL_OPPORTUNITY',
            'relationship' => 'contracts_opportunities',
            'link_type' => 'one',
            'source' => 'non-db',
        ],
        'opportunity_name' => [
            'name' => 'opportunity_name',
            'rname' => 'name',
            'id_name' => 'opportunity_id',
            'vname' => 'LBL_OPPORTUNITY_NAME',
            'type' => 'relate',
            'table' => 'opportunities',
            'isnull' => 'true',
            'module' => 'Opportunities',
            'dbType' => 'varchar',
            'link' => 'opportunities',
            'len' => '255',
            'source' => 'non-db',
            'massupdate' => false,
            'unified_search' => true,
        ],
        'opportunity_id' => [
            'name' => 'opportunity_id',
            'type' => 'id',
            'vname' => 'LBL_OPPORTUNITY_ID',
            'source' => 'non-db',
        ],
        'account_name' => [
            'name' => 'account_name',
            'rname' => 'name',
            'id_name' => 'account_id',
            'vname' => 'LBL_ACCOUNT_NAME',
            'type' => 'relate',
            'table' => 'accounts',
            'isnull' => 'true',
            'join_name' => 'accounts',
            'module' => 'Accounts',
            'dbType' => 'varchar',
            'link' => 'accounts',
            'len' => '255',
            'source' => 'non-db',
            'required' => true,
            'unified_search' => true,
        ],
        'account_id' => [
            'name' => 'account_id',
            'vname' => 'LBL_ACCOUNT_ID',
            'type' => 'id',
            'audited' => true,
            'importable' => 'required',
            'reportable' => false,
            'comment' => 'The account ID to which the contract is associated',
        ],
        'accounts' => [
            'name' => 'accounts',
            'type' => 'link',
            'relationship' => 'account_contracts',
            'source' => 'non-db',
            'link_type' => 'one',
            'module' => 'Accounts',
            'bean_name' => 'Account',
            'vname' => 'LBL_ACCOUNTS',
        ],
        'start_date' => [
            'name' => 'start_date',
            'vname' => 'LBL_START_DATE',
            'type' => 'date',
            'validation' => ['type' => 'isbefore', 'compareto' => 'end_date', 'blank' => true],
            'audited' => true,
            'comment' => 'The effective date of the contract',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ],
        'end_date' => [
            'name' => 'end_date',
            'vname' => 'LBL_END_DATE',
            'type' => 'date',
            'audited' => true,
            'comment' => 'The date in which the contract is no longer effective',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ],
        'total_contract_value' => [
            'name' => 'total_contract_value',
            'vname' => 'LBL_TOTAL_CONTRACT_VALUE',
            'dbType' => 'decimal',
            'type' => 'currency',
            'len' => '26,6',
            'comment' => 'The overall value of the contract',
            'related_fields' => [
                'currency_id',
                'base_rate',
            ],
            'convertToBase' => true,
        ],
        'total_contract_value_usdollar' => [
            'name' => 'total_contract_value_usdollar',
            'vname' => 'LBL_TOTAL_CONTRACT_VALUE_USDOLLAR',
            'dbType' => 'decimal',
            'type' => 'currency',
            'len' => '26,6',
            'comment' => 'The overall contract value expressed in USD',
            'studio' => [
                'wirelesslistview' => false,
                'wirelesseditview' => false,
                'wirelessdetailview' => false,
                'wireless_basic_search' => false,
                'wireless_advanced_search' => false,
                'mobile' => false,
            ],
            'readonly' => true,
            'is_base_currency' => true,
            'related_fields' => [
                'currency_id',
                'base_rate',
            ],
            'formula' => 'ifElse(isNumeric($total_contract_value), currencyDivide($total_contract_value, $base_rate), "")',
            'calculated' => true,
            'enforced' => true,
        ],
        'status' => [
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
            'len' => 100,
            'required' => true,
            'options' => 'contract_status_dom',
            'audited' => true,
            'comment' => 'The contract status',
            'importable' => 'required',
            'full_text_search' => [
                'enabled' => true,
                'searchable' => false,
            ],
        ],
        'customer_signed_date' => [
            'name' => 'customer_signed_date',
            'vname' => 'LBL_CUSTOMER_SIGNED_DATE',
            'type' => 'date',
            'comment' => 'Date in which the ultimate customer signed the contract',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ],
        'company_signed_date' => [
            'name' => 'company_signed_date',
            'vname' => 'LBL_COMPANY_SIGNED_DATE',
            'type' => 'date',
            'comment' => 'Date in which the company using Sugar signed the contract',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
        ],
        'contract_term' => [
            'name' => 'contract_term',
            'vname' => 'LBL_CONTRACT_TERM',
            'type' => 'int',
            'len' => 5,
            'source' => 'non-db',
        ],
        'expiration_notice' => [
            'name' => 'expiration_notice',
            'vname' => 'LBL_EXPIRATION_NOTICE',
            'type' => 'datetimecombo',
            'reportable' => false,
            'massupdate' => false,
            'comment' => 'Date to issue an expiration notice (useful for workflow rules)',
        ],
        'time_to_expiry' => [
            'name' => 'time_to_expiry',
            'vname' => 'LBL_TIME_TO_EXPIRY',
            'type' => 'int',
            'len' => 5,
            'source' => 'non-db',
            'sortable' => false,
        ],
        'type_name' => [
            'name' => 'type_name',
            'vname' => 'LBL_TYPE_NAME',
            'rname' => 'name',
            'id_name' => 'type',
            'type' => 'relate',
            'studio' => 'false', //C.L. - Use type, not type_name; the QuickSearch is not implemented for type_name
            'table' => 'contract_types',
            'module' => 'ContractTypes',
            'len' => '36',
            'reportable' => false,
            'source' => 'non-db',
            'link' => 'contract_types',
            'comment' => 'The contract type',
            'exportable' => true,
            'export_link_type' => 'one',//relationship type to be used during export
        ],
        'contract_types' => [
            'name' => 'contract_types',
            'type' => 'link',
            'vname' => 'LBL_PRODUCTS',
            'relationship' => 'contracts_contract_types',
            'link_type' => 'one',
            'source' => 'non-db',
        ],
        'type' => [
            'name' => 'type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
            'function' => 'getContractTypesDropDown',
            'merge_filter' => 'enabled',
            'duplicate_merge' => 'disabled',
            'comment' => 'The dropdown options for Contract types',
        ],
        'contracts_documents' => [
            'name' => 'contracts_documents',
            'type' => 'link',
            'relationship' => 'contracts_documents',
            'source' => 'non-db',
            'vname' => 'LBL_DOCUMENTS',
        ],
        'parent_name' => [
            'name' => 'parent_name',
            'vname' => 'LBL_MEMBER_OF',
            'id_name' => 'parent_id',
            'module' => 'Contracts',
            'rname' => 'name',
            'type' => 'relate',
            'required' => false,
            'reportable' => false,
            'audited' => true,
            'source' => 'non-db',
            'comment' => 'parent_name of contract, added to prevent ability to add flex relate field to module because of relationship in linked_documentsMetaData.php',
            'massupdate' => false,
            'studio' => false,
        ],
        'contacts' => [
            'name' => 'contacts',
            'type' => 'link',
            'relationship' => 'contracts_contacts',
            'source' => 'non-db',
            'vname' => 'LBL_CONTACTS',
        ],
        'notes' => [
            'name' => 'notes',
            'type' => 'link',
            'relationship' => 'contract_notes',
            'source' => 'non-db',
            'vname' => 'LBL_NOTES',
        ],
        'messages' => [
            'name' => 'messages',
            'type' => 'link',
            'relationship' => 'contract_messages',
            'source' => 'non-db',
            'vname' => 'LBL_MESSAGES',
        ],
        'products' => [
            'name' => 'products',
            'type' => 'link',
            'vname' => 'LBL_PRODUCTS',
            'relationship' => 'contracts_products',
            'link_type' => 'one',
            'source' => 'non-db',
        ],
    ],
    'relationships' => [
        'contracts_contract_types' => [
            'lhs_module' => 'ContractTypes',
            'lhs_table' => 'contract_types',
            'lhs_key' => 'id',
            'rhs_module' => 'Contracts',
            'rhs_table' => 'contracts',
            'rhs_key' => 'type',
            'relationship_type' => 'one-to-many',
        ],
        'contract_notes' => [
            'lhs_module' => 'Contracts',
            'lhs_table' => 'contracts',
            'lhs_key' => 'id',
            'rhs_module' => 'Notes',
            'rhs_table' => 'notes',
            'rhs_key' => 'parent_id',
            'relationship_role_column' => 'parent_type',
            'relationship_role_column_value' => 'Contracts',
            'relationship_type' => 'one-to-many',
        ],
        'contract_messages' => [
            'lhs_module' => 'Contracts',
            'lhs_table' => 'contracts',
            'lhs_key' => 'id',
            'rhs_module' => 'Messages',
            'rhs_table' => 'messages',
            'rhs_key' => 'parent_id',
            'relationship_role_column' => 'parent_type',
            'relationship_role_column_value' => 'Contracts',
            'relationship_type' => 'one-to-many',
        ],
        'account_contracts' => [
            'lhs_module' => 'Accounts',
            'lhs_table' => 'accounts',
            'lhs_key' => 'id',
            'rhs_module' => 'Contracts',
            'rhs_table' => 'contracts',
            'rhs_key' => 'account_id',
            'relationship_type' => 'one-to-many',
        ],
        'contracts_assigned_user' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'Contracts',
            'rhs_table' => 'contracts',
            'rhs_key' => 'assigned_user_id',
            'relationship_type' => 'one-to-many',
        ],
        'contracts_created_by' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'Contracts',
            'rhs_table' => 'contracts',
            'rhs_key' => 'created_by',
            'relationship_type' => 'one-to-many',
        ],
        'contracts_modified_user' => [
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => 'Contracts',
            'rhs_table' => 'contracts',
            'rhs_key' => 'modified_user_id',
            'relationship_type' => 'one-to-many',
        ],
    ],
    'indices' => [
        ['name' => 'idx_contract_status', 'type' => 'index', 'fields' => ['status']],
        ['name' => 'idx_contract_start_date', 'type' => 'index', 'fields' => ['start_date']],
        ['name' => 'idx_contract_end_date', 'type' => 'index', 'fields' => ['end_date']],
    ],
    'uses' => [
        'default',
        'assignable',
        'team_security',
        'currency',
        'taggable',
        'audit',
    ],
];

VardefManager::createVardef('Contracts', 'Contract');

//boost value for full text search
$dictionary['Contract']['fields']['description']['full_text_search']['boost'] = 0.63;
