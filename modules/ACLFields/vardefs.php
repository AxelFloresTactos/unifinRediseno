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


$dictionary['ACLField'] = ['table' => 'acl_fields', 'archive' => false, 'comment' => 'Determine the allowable fields for users'
    , 'fields' => [
        'id' => [
            'name' => 'id',
            'vname' => 'LBL_ID',
            'required' => true,
            'type' => 'id',
            'reportable' => false,
            'comment' => 'Unique identifier',
        ],
        'date_entered' => [
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'required' => true,
            'comment' => 'Date record created',
        ],
        'date_modified' => [
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'required' => true,
            'comment' => 'Date record last modified',
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
            'required' => false,
            'len' => 36,
            'reportable' => true,
            'comment' => 'User who last modified record',
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
            'len' => 36,
            'comment' => 'User ID who created record',
        ],
        'name' => [
            'name' => 'name',
            'type' => 'varchar',
            'vname' => 'LBL_NAME',
            'len' => 150,
            'comment' => 'Name of the allowable action (view, list, delete, edit)',
        ],
        'category' => [
            'name' => 'category',
            'vname' => 'LBL_CATEGORY',
            'type' => 'varchar',
            'len' => 100,
            'reportable' => true,
            'comment' => 'Category of the allowable action (usually the name of a module)',
        ],
        'aclaccess' => [
            'name' => 'aclaccess',
            'vname' => 'LBL_ACCESS',
            'type' => 'int',
            'len' => 3,
            'reportable' => true,
            'comment' => 'Number specifying access priority; highest access "wins"',
        ],
        'deleted' => [
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'reportable' => false,
            'comment' => 'Record deletion indicator',
        ],
        'role_id' => [
            'name' => 'role_id',
            'vname' => 'LBL_ID',
            'required' => true,
            'type' => 'id',
            'reportable' => false,
            'comment' => 'Unique identifier',
        ],
    ],
    'acls' => ['SugarACLAdminOnly' => ['adminFor' => 'Users']],
    'indices' => [
        ['name' => 'aclfieldid', 'type' => 'primary', 'fields' => ['id']],
        ['name' => 'idx_aclfield_role_del', 'type' => 'index', 'fields' => ['role_id', 'category', 'deleted']],
        [
            'name' => 'idx_del_category',
            'type' => 'index',
            'fields' => [
                'deleted',
                'category',
            ],
        ],
    ],

];
