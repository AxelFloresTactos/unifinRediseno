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
$object_name = strtolower($object_name);
$app_list_strings = [

    $object_name . '_type_dom' => [
        'Administration' => 'الإدارة',
        'Product' => 'المنتج',
        'User' => 'المستخدم',
    ],
    $object_name . '_status_dom' => [
        'New' => 'جديد',
        'Assigned' => 'معيَّن',
        'Closed' => 'مغلق',
        'Pending Input' => 'إدخال معلق',
        'Rejected' => 'مرفوض',
        'Duplicate' => 'تكرار',
    ],
    $object_name . '_priority_dom' => [
        'P1' => 'مرتفع',
        'P2' => 'متوسط',
        'P3' => 'منخفض',
    ],
    $object_name . '_resolution_dom' => [
        '' => '',
        'Accepted' => 'مقبول',
        'Duplicate' => 'تكرار',
        'Closed' => 'مغلق',
        'Out of Date' => 'قديم',
        'Invalid' => 'غير صالح',
    ],
];
