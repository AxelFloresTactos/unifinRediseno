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

$viewdefs['pmse_Inbox']['base']['view']['list'] = [
    'panels' => [
        [
            'label' => 'LBL_PANEL_1',
            'fields' => [
                [
                    'name' => 'cas_id',
                    'label' => 'LBL_CAS_ID',
                    'default' => true,
                    'enabled' => true,
                    'link' => false,
                ],
                [
                    'name' => 'pro_title',
                    'label' => 'LBL_PROCESS_DEFINITION_NAME',
                    'default' => true,
                    'enabled' => true,
                    'link' => true,
                    'type' => 'pmse-link',
                ],
                [
                    'name' => 'task_name',
                    'label' => 'LBL_PROCESS_NAME',
                    'default' => true,
                    'enabled' => true,
                    'link' => false,
                ],
                [
                    'name' => 'cas_title',
                    'label' => 'LBL_RECORD_NAME',
                    'default' => true,
                    'enabled' => true,
                    'link' => true,
                    'type' => 'pmse-link',
                    'sortable' => false,
                ],
                [
                    'name' => 'assigned_user_name',
                    'label' => 'LBL_OWNER',
                    'default' => false,
                    'enabled' => true,
                    'link' => false,
                ],
                [
                    'name' => 'cas_user_id_full_name',
                    'label' => 'LBL_ACTIVITY_OWNER',
                    'default' => true,
                    'enabled' => true,
                    'link' => false,
                ],
                [
                    'name' => 'prj_user_id_full_name',
                    'label' => 'LBL_PROCESS_OWNER',
                    'default' => true,
                    'enabled' => true,
                    'link' => false,
                ],
                [
                    'label' => 'LBL_DATE_MODIFIED',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'date_modified',
                    'readonly' => true,
                ],
                [
                    'label' => 'LBL_DATE_ENTERED',
                    'enabled' => true,
                    'default' => true,
                    'name' => 'date_entered',
                    'readonly' => true,
                ],
            ],
        ],
    ],
    'orderBy' => [
        'field' => 'date_modified',
        'direction' => 'desc',
    ],
];
