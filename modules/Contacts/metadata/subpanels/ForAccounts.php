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
            'width' => '43%',
        ],
        'primary_address_city' => [
            'name' => 'primary_address_city',
            'vname' => 'LBL_LIST_CITY',
            'width' => '20%',
        ],
        'primary_address_state' => [
            'name' => 'primary_address_state',
            'vname' => 'LBL_LIST_STATE',
            'width' => '10%',
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
        'edit_button' => [
            'vname' => 'LBL_EDIT_BUTTON',
            'widget_class' => 'SubPanelEditButton',
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
