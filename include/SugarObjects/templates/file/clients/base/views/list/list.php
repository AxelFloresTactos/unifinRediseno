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
/*********************************************************************************
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$module_name = '<module_name>';
$viewdefs[$module_name]['base']['view']['list'] = [
    'panels' => [
        [
            'label' => 'LBL_PANEL_DEFAULT',
            'fields' => [
                [
                    'name' => 'document_name',
                    'label' => 'LBL_NAME',
                    'link' => true,
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'modified_by_name',
                    'label' => 'LBL_MODIFIED_USER',
                    'module' => 'Users',
                    'id' => 'USERS_ID',
                    'default' => false,
                    'sortable' => false,
                    'related_fields' => ['modified_user_id'],
                ],
                [
                    'name' => 'category_id',
                    'label' => 'LBL_LIST_CATEGORY',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'subcategory_id',
                    'label' => 'LBL_LIST_SUBCATEGORY',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'team_name',
                    'label' => 'LBL_TEAM',
                    'sortable' => false,
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'created_by_name',
                    'label' => 'LBL_LIST_LAST_REV_CREATOR',
                    'default' => true,
                    'sortable' => false,
                    'enabled' => true,
                ],
                [
                    'name' => 'active_date',
                    'label' => 'LBL_LIST_ACTIVE_DATE',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'exp_date',
                    'label' => 'LBL_LIST_EXP_DATE',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'date_modified',
                    'enabled' => true,
                    'default' => true,
                ],
                [
                    'name' => 'date_entered',
                    'enabled' => true,
                    'default' => true,
                ],
            ],
        ],
    ],
];
