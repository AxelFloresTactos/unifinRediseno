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

$viewdefs['Products']['base']['filter']['default'] = [
    'default_filter' => 'all_records',
    'fields' => [
        'name' => [],
        'contact_name' => [],
        'status' => [],
        'type_name' => [],
        'category_name' => [],
        'manufacturer_name' => [],
        'mft_part_num' => [],
        'vendor_part_num' => [],
        'tax_class' => [],
        'support_term' => [],
        'date_entered' => [],
        'date_modified' => [],
        'tag' => [],
        '$favorite' => [
            'predefined_filter' => true,
            'vname' => 'LBL_FAVORITES_FILTER',
        ],
    ],
];
