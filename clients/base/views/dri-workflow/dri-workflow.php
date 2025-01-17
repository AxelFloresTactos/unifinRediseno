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

$viewdefs['base']['view']['dri-workflow'] = [
    'activityButtons' => [
        [
            'type' => 'actiondropdown',
            'name' => 'main_dropdown',
            'buttons' => [
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-check',
                    'name' => 'activity_complete_button',
                    'event' => 'activity:complete_button:click',
                    'tooltip' => 'LBL_COMPLETE_BUTTON_TITLE',
                    'acl_action' => 'edit',
                    'label' => ' ',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-chevron-right',
                    'name' => 'activity_start_button',
                    'event' => 'activity:start_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_START_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-preview',
                    'name' => 'activity_preview_button',
                    'event' => 'activity:preview_button:click',
                    'label' => 'LBL_PREVIEW',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-edit',
                    'name' => 'activity_edit_button',
                    'event' => 'activity:edit_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_EDIT_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-user',
                    'name' => 'activity_add_sub_task_button',
                    'event' => 'stage:add_sub_task_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Tasks',
                    'label' => 'LBL_ADD_CJ_SUB_TASK_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-calendar',
                    'name' => 'activity_add_sub_meeting_button',
                    'event' => 'stage:add_sub_meeting_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Meetings',
                    'label' => 'LBL_ADD_CJ_SUB_MEETING_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-phone',
                    'name' => 'activity_add_sub_call_button',
                    'event' => 'stage:add_sub_call_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Calls',
                    'label' => 'LBL_ADD_CJ_SUB_CALL_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-user',
                    'name' => 'activity_assign_me_button',
                    'event' => 'activity:assign_me_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_ASSIGN_ME_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'activity_not_applicable_button',
                    'event' => 'activity:not_applicable_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_NOT_APPLICABLE_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'activity_delete_button',
                    'event' => 'activity:delete_button:click',
                    'acl_action' => 'delete',
                    'label' => 'LBL_DELETE_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-copy',
                    'event' => 'activity:duplicate_button:click',
                    'name' => 'duplicate_button',
                    'label' => 'LBL_DUPLICATE_BUTTON_LABEL',
                ],
            ],
        ],
    ],
    'activityChildButtons' => [
        [
            'type' => 'actiondropdown',
            'name' => 'main_dropdown',
            'buttons' => [
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-check',
                    'name' => 'activity_complete_button',
                    'event' => 'activity:complete_button:click',
                    'tooltip' => 'LBL_COMPLETE_BUTTON_TITLE',
                    'acl_action' => 'edit',
                    'label' => ' ',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-chevron-right',
                    'name' => 'activity_start_button',
                    'event' => 'activity:start_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_START_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-preview',
                    'name' => 'activity_preview_button',
                    'event' => 'activity:preview_button:click',
                    'label' => 'LBL_PREVIEW',
                    'acl_action' => 'view',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-edit',
                    'name' => 'activity_edit_button',
                    'event' => 'activity:edit_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_EDIT_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-user',
                    'name' => 'activity_assign_me_button',
                    'event' => 'activity:assign_me_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_ASSIGN_ME_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'activity_not_applicable_button',
                    'event' => 'activity:not_applicable_button:click',
                    'acl_action' => 'edit',
                    'label' => 'LBL_NOT_APPLICABLE_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'activity_delete_button',
                    'event' => 'activity:delete_button:click',
                    'acl_action' => 'delete',
                    'label' => 'LBL_DELETE_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-copy',
                    'event' => 'activity:duplicate_button:click',
                    'childCopy' => true,
                    'name' => 'duplicate_button',
                    'label' => 'LBL_DUPLICATE_BUTTON_LABEL',
                ],
            ],
        ],
    ],
    'stageButtons' => [
        [
            'type' => 'actiondropdown',
            'name' => 'main_dropdown',
            'buttons' => [
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-edit',
                    'name' => 'stage_edit_button',
                    'event' => 'stage:edit_button:click',
                    'tooltip' => 'LBL_EDIT_BUTTON_TITLE',
                    'acl_action' => 'edit',
                    'label' => ' ',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-user',
                    'name' => 'stage_add_task_button',
                    'event' => 'stage:add_task_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Tasks',
                    'label' => 'LBL_ADD_TASK_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-calendar',
                    'name' => 'stage_add_meeting_button',
                    'event' => 'stage:add_meeting_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Meetings',
                    'label' => 'LBL_ADD_MEETING_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-phone',
                    'name' => 'stage_add_call_button',
                    'event' => 'stage:add_call_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Calls',
                    'label' => 'LBL_ADD_CALL_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-user',
                    'name' => 'stage_link_task_button',
                    'event' => 'stage:link_task_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Tasks',
                    'label' => 'LBL_LINK_TASK_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-calendar',
                    'name' => 'stage_link_meeting_button',
                    'event' => 'stage:link_meeting_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Meetings',
                    'label' => 'LBL_LINK_MEETING_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-phone',
                    'name' => 'stage_link_call_button',
                    'event' => 'stage:link_call_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'Calls',
                    'label' => 'LBL_LINK_CALL_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'stage_delete_button',
                    'event' => 'stage:delete_button:click',
                    'acl_action' => 'delete',
                    'label' => 'LBL_DELETE_STAGE_BUTTON_TITLE',
                ],
            ],
        ],
    ],
    'topButtons' => [
        [
            'type' => 'actiondropdown',
            'name' => 'main_dropdown',
            'buttons' => [
                [
                    'type' => 'rowaction',
                    'name' => 'journey_add_stage_button',
                    'event' => 'journey:add_stage_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'DRI_SubWorkflows',
                    'label' => 'LBL_ADD_STAGE_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-edit',
                    'name' => 'journey_edit_button',
                    'event' => 'journey:edit_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'DRI_Workflows',
                    'label' => 'LBL_EDIT_JOURNEY_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-settings',
                    'name' => 'journey_configure_template_button',
                    'event' => 'journey:configure_template_button:click',
                    'acl_action' => 'view',
                    'acl_module' => 'DRI_Workflow_Templates',
                    'label' => 'LBL_CONFIGURE_TEMPLATE_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-ban',
                    'name' => 'journey_cancel_button',
                    'event' => 'journey:cancel_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'DRI_Workflows',
                    'label' => 'LBL_CANCEL_JOURNEY_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-archive',
                    'name' => 'journey_archive_button',
                    'event' => 'journey:archive_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'DRI_Workflows',
                    'label' => 'LBL_ARCHIVE_JOURNEY_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'journey_unarchive_button',
                    'event' => 'journey:unarchive_button:click',
                    'acl_action' => 'edit',
                    'acl_module' => 'DRI_Workflows',
                    'label' => 'LBL_UNARCHIVE_JOURNEY_BUTTON_TITLE',
                ],
                [
                    'type' => 'rowaction',
                    'icon' => 'sicon-close',
                    'name' => 'journey_delete_button',
                    'event' => 'journey:delete_button:click',
                    'acl_action' => 'delete',
                    'acl_module' => 'DRI_Workflows',
                    'label' => 'LBL_DELETE_BUTTON_TITLE',
                ],
            ],
        ],
    ],
    'last_state' => [
        'id' => 'dri-workflow',
        'defaults' => [
            'show_more' => 'less',
        ],
    ],
];
