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
$searchFields['Project'] =
    [
        'name' => ['query_type' => 'default'],
        'current_user_only' => ['query_type' => 'default', 'db_field' => ['assigned_user_id'], 'my_items' => true, 'vname' => 'LBL_CURRENT_USER_FILTER', 'type' => 'bool'],

        'favorites_only' => [
            'query_type' => 'format',
            'operator' => 'subquery',
            'subquery' => 'SELECT sugarfavorites.record_id FROM sugarfavorites 
			                    WHERE sugarfavorites.deleted=0 
			                        and sugarfavorites.module = \'Project\' 
			                        and sugarfavorites.assigned_user_id = \'{0}\'',
            'db_field' => ['id']],
        //Range Search Support
        'range_date_entered' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'start_range_date_entered' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'end_range_date_entered' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'range_date_modified' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'start_range_date_modified' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'end_range_date_modified' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],

        'range_estimated_start_date' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'start_range_estimated_start_date' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'end_range_estimated_start_date' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'range_estimated_end_date' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'start_range_estimated_end_date' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        'end_range_estimated_end_date' => ['query_type' => 'default', 'enable_range_search' => true, 'is_date_field' => true],
        //Range Search Support
    ];
