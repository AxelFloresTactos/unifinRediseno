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

$viewdefs['Contracts']['base']['filter']['default'] = [
    'default_filter' => 'all_records',
    'fields' => [
        'name' => [],
        'type' => [],
        'account_name' => ['dbFields' => [],],
        'start_date' => [],
        'end_date' => [],
        'tag' => [],
        'status' => [],
        'assigned_user_name' => [],
        '$owner' => ['predefined_filter' => true, 'vname' => 'LBL_CURRENT_USER_FILTER',],
        '$favorite' => ['predefined_filter' => true, 'vname' => 'LBL_FAVORITES_FILTER',],
    ],
];
