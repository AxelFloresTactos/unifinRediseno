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
 * Description:  Contains field arrays that are used for caching
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
$fields_array['Release'] = ['column_fields' => ['id'
    , 'name'
    , 'list_order'
    , 'date_entered'
    , 'date_modified'
    , 'status'
    , 'modified_user_id'
    , 'created_by',
],
    'list_fields' => ['id', 'name', 'list_order', 'status'],
    'required_fields' => ['name' => 1, 'list_order' => 1, 'status' => 1],
];
