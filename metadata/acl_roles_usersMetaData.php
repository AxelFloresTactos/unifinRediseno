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

$dictionary['acl_roles_users'] = [
    'table' => 'acl_roles_users',
    'fields' => [
        'id' => [
            'name' => 'id',
            'type' => 'id',
        ],
        'role_id' => [
            'name' => 'role_id',
            'type' => 'id',
        ],
        'user_id' => [
            'name' => 'user_id',
            'type' => 'id',
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
            'name' => 'acl_roles_userspk',
            'type' => 'primary',
            'fields' => [
                'id',
            ],
        ],
        [
            'name' => 'idx_acluser_id',
            'type' => 'index',
            'fields' => [
                'user_id',
            ],
        ],
        [
            'name' => 'idx_aclrole_user',
            'type' => 'alternate_key',
            'fields' => [
                'role_id',
                'user_id',
            ],
        ],
    ],
    'relationships' => [
        'acl_roles_users' => [
            'lhs_module' => 'ACLRoles',
            'lhs_table' => 'acl_roles',
            'lhs_key' => 'id',
            'rhs_module' => 'Users',
            'rhs_table' => 'users',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'acl_roles_users',
            'join_key_lhs' => 'role_id',
            'join_key_rhs' => 'user_id',
            'relationship_class' => 'ACLRoleUserRelationship',
            'relationship_file' => 'modules/ACLRoles/ACLRoleUserRelationship.php',
        ],
    ],
];
