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

$dictionary['WorkFlowActionShell'] = ['table' => 'workflow_actionshells'
    , 'fields' => [
        'id' => [
            'name' => 'id',
            'vname' => 'LBL_NAME',
            'type' => 'id',
            'required' => true,
            'reportable' => false,
        ],
        'deleted' => [
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
        ],
        'date_entered' => [
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'required' => true,
        ],
        'date_modified' => [
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'required' => true,
        ],
        'modified_user_id' => [
            'name' => 'modified_user_id',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_ASSIGNED_TO',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => 'false',
            'dbType' => 'id',
            'reportable' => true,
        ],
        'created_by' => [
            'name' => 'created_by',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_ASSIGNED_TO',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => 'false',
            'dbType' => 'id',
        ],
        'action_type' => [
            'name' => 'action_type',
            'vname' => 'LBL_ACTION_TYPE',
            'type' => 'enum',
            'required' => true,
            'options' => 'wflow_action_type_dom',
            'len' => 100,
        ],
        'parent_id' => [
            'name' => 'parent_id',
            'type' => 'id',
            'required' => true,
            'reportable' => false,
        ],
        'parameters' => [
            'name' => 'parameters',
            'vname' => 'LBL_EXT1',
            'type' => 'varchar',
            'len' => '255',
            'required' => false,
        ],
        'rel_module' => [
            'name' => 'rel_module',
            'vname' => 'LBL_REL_MODULE',
            'type' => 'varchar',
            'len' => '50',
        ],
        'rel_module_type' => [
            'name' => 'rel_module_type',
            'vname' => 'LBL_RELATED_TYPE',
            'type' => 'enum',
            'options' => 'wflow_rel_type_dom',
            'len' => 10,
        ],
        'action_module' => [
            'name' => 'action_module',
            'vname' => 'LBL_ACTION_MODULE',
            'type' => 'varchar',
            'len' => '255',
        ],
        'actions' => [
            'name' => 'actions',
            'type' => 'link',
            'relationship' => 'actions',
            'module' => 'WorkFlowActions',
            'bean_name' => 'WorkFlowAction',
            'source' => 'non-db',
        ],
        'action_bridge' => [
            'name' => 'action_bridge',
            'type' => 'link',
            'relationship' => 'action_bridge',
            'module' => 'WorkFlows',
            'bean_name' => 'WorkFlow',
            'source' => 'non-db',
        ],
        'rel1_action_fil' => [
            'name' => 'rel1_action_fil',
            'type' => 'link',
            'relationship' => 'rel1_action_fil',
            'module' => 'Expressions',
            'bean_name' => 'Expression',
            'source' => 'non-db',
        ],
        'parent_base_module' => [
            'name' => 'parent_base_module',
            'vname' => 'LBL_BASE_MODULE',
            'type' => 'varchar',
            'source' => 'non-db',
        ],
        'parent_type' => [
            'name' => 'parent_type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
            'options' => 'wflow_type_dom',
            'source' => 'non-db',
        ],
    ],
    'acls' => ['SugarACLDeveloperOrAdmin' => true],
    'indices' => [
        ['name' => 'actionshell_k', 'type' => 'primary', 'fields' => ['id']],
        ['name' => 'idx_actionshell', 'type' => 'index', 'fields' => ['deleted']],
    ]
    , 'relationships' => [
        'actions' => ['lhs_module' => 'WorkFlowActionShells', 'lhs_table' => 'workflow_actionshells', 'lhs_key' => 'id',
            'rhs_module' => 'WorkFlowActions', 'rhs_table' => 'workflow_actions', 'rhs_key' => 'parent_id',
            'relationship_type' => 'one-to-many'],
        'action_bridge' => ['lhs_module' => 'WorkFlowActionShells', 'lhs_table' => 'workflow_actionshells', 'lhs_key' => 'id',
            'rhs_module' => 'WorkFlow', 'rhs_table' => 'workflow', 'rhs_key' => 'parent_id',
            'relationship_type' => 'one-to-many'],
        'rel1_action_fil' => ['lhs_module' => 'WorkFlowActionShells', 'lhs_table' => 'workflow_actionshells', 'lhs_key' => 'id',
            'rhs_module' => 'Expressions', 'rhs_table' => 'expressions', 'rhs_key' => 'parent_id',
            'relationship_role_column' => 'parent_type',
            'relationship_role_column_value' => 'rel1_action_fil', 'relationship_type' => 'one-to-many'],
    ],
];
