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
 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$module_name = '<module_name>';
$subpanel_layout = [
    'top_buttons' => [
        ['widget_class' => 'SubPanelTopCreateButton'],
        ['widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name],
    ],

    'where' => '',


    'list_fields' => [
        'name' => [
            'name' => 'name',
            'vname' => 'LBL_LIST_SALE_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'width' => '40%',
        ],
        'sales_stage' => [
            'name' => 'sales_stage',
            'vname' => 'LBL_LIST_SALE_STAGE',
            'width' => '15%',
        ],
        'date_closed' => [
            'name' => 'date_closed',
            'vname' => 'LBL_LIST_DATE_CLOSED',
            'width' => '15%',
        ],
        'amount' => [
            'vname' => 'LBL_LIST_AMOUNT',
            'width' => '15%',
        ],
        'assigned_user_name' => [
            'name' => 'assigned_user_name',
            'vname' => 'LBL_LIST_ASSIGNED_TO_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'target_record_key' => 'assigned_user_id',
            'target_module' => 'Employees',
        ],
        'edit_button' => [
            'vname' => 'LBL_EDIT_BUTTON',
            'widget_class' => 'SubPanelEditButton',
            'module' => $module_name,
            'width' => '4%',
        ],
        'amount_usdollar' => [
            'usage' => 'query_only',
        ],
        'remove_button' => [
            'vname' => 'LBL_REMOVE',
            'widget_class' => 'SubPanelRemoveButton',
            'module' => $module_name,
            'width' => '5%',
        ],
    ],
];
