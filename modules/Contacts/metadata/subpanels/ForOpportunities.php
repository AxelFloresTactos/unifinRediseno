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
    'top_buttons' => [
        ['widget_class' => 'SubPanelTopCreateButton'],
        ['widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Contacts'],
    ],

    'where' => '',


    'list_fields' => [
        'first_name' => [
            'name' => 'first_name',
            'usage' => 'query_only',
        ],
        'last_name' => [
            'name' => 'last_name',
            'usage' => 'query_only',
        ],
        'salutation' => [
            'name' => 'salutation',
            'usage' => 'query_only',
        ],
        'name' => [
            'name' => 'name',
            'vname' => 'LBL_LIST_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'module' => 'Contacts',
            'width' => '23%',
        ],
        'account_name' => [
            'name' => 'account_name',
            'module' => 'Accounts',
            'target_record_key' => 'account_id',
            'target_module' => 'Accounts',
            'widget_class' => 'SubPanelDetailViewLink',
            'vname' => 'LBL_LIST_ACCOUNT_NAME',
            'width' => '22%',
            'sortable' => false,
        ],
        'account_id' => [
            'usage' => 'query_only',

        ],
        'opportunity_role_fields' => [
            'usage' => 'query_only',
        ],
        'opportunity_role_id' => [
            'usage' => 'query_only',
        ],
        'opportunity_role' => [
            'name' => 'opportunity_role',
            'vname' => 'LBL_LIST_CONTACT_ROLE',
            'width' => '10%',
            'sortable' => false,
        ],
        'email' => [
            'name' => 'email',
            'vname' => 'LBL_LIST_EMAIL',
            'widget_class' => 'SubPanelEmailLink',
            'width' => '30%',
            'sortable' => false,
        ],

        'phone_work' => [
            'name' => 'phone_work',
            'vname' => 'LBL_LIST_PHONE',
            'width' => '15%',
        ],
        //kbrill Bug#17483
        'edit_button' => [
            'vname' => 'LBL_EDIT_BUTTON',
            //'widget_class' => 'SubPanelEditButton',
            //C.L. Bug#18035, changed to use SubPanelEditRoleButton
            'widget_class' => 'SubPanelEditRoleButton',
            'role_id' => 'opportunity_role_id',
            'module' => 'Contacts',
            'width' => '5%',
        ],
        'remove_button' => [
            'vname' => 'LBL_REMOVE',
            'widget_class' => 'SubPanelRemoveButton',
            'module' => 'Contacts',
            'width' => '5%',

        ],


    ],
];
