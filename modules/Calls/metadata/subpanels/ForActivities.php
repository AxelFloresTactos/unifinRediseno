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

$subpanel_layout = [
    //Removed button because this layout def is a component of
    //the activities sub-panel.
    //'where' => "(calls.status=\'Planned\')",
    'where' => "(calls.status != 'Held' AND calls.status != 'Not Held')",


    'list_fields' => [
        'object_image' => [
            'vname' => 'LBL_OBJECT_IMAGE',
            'widget_class' => 'SubPanelIcon',
            'width' => '2%',
        ],
        'name' => [
            'vname' => 'LBL_LIST_SUBJECT',
            'widget_class' => 'SubPanelDetailViewLink',
            'width' => '30%',
        ],
        'status' => [
            'widget_class' => 'SubPanelActivitiesStatusField',
            'vname' => 'LBL_LIST_STATUS',
            'width' => '15%',

        ],
        'contact_name' => [
            'widget_class' => 'SubPanelDetailViewLink',
            'target_record_key' => 'contact_id',
            'target_module' => 'Contacts',
            'module' => 'Contacts',
            'vname' => 'LBL_LIST_CONTACT',
            'width' => '11%',
            'sortable' => false,
        ],
        'contact_name_owner' => [
            'usage' => 'query_only',
            'force_exists' => true,
        ],
        'contact_name_mod' => [
            'usage' => 'query_only',
            'force_exists' => true,
        ],
        'contact_id' => [
            'usage' => 'query_only',

        ],
        'date_start' => [
            'vname' => 'LBL_LIST_DUE_DATE',
            'width' => '10%',
        ],
        'assigned_user_name' => [
            'name' => 'assigned_user_name',
            'vname' => 'LBL_LIST_ASSIGNED_TO_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'target_record_key' => 'assigned_user_id',
            'target_module' => 'Employees',
            'width' => '10%',
        ],
        'edit_button' => [
            'vname' => 'LBL_EDIT_BUTTON',
            'widget_class' => 'SubPanelEditButton',
            'width' => '2%',
        ],
        'close_button' => [
            'widget_class' => 'SubPanelCloseButton',
            'vname' => 'LBL_LIST_CLOSE',
            'width' => '6%',
            'sortable' => false,
        ],
        'remove_button' => [
            'vname' => 'LBL_REMOVE',
            'widget_class' => 'SubPanelRemoveButton',
            'width' => '2%',
        ],
        'time_start' => [
            'usage' => 'query_only',

        ],
        'recurring_source' => [
            'usage' => 'query_only',
        ],

    ],
];
