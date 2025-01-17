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
        'Administration' => '管理',
        'Product' => '產品',
        'User' => '使用者',
    ],
    $object_name . '_status_dom' => [
        'New' => '新',
        'Assigned' => '已指派',
        'Closed' => '已關閉',
        'Pending Input' => '待輸入',
        'Rejected' => '已拒絕',
        'Duplicate' => '重複',
    ],
    $object_name . '_priority_dom' => [
        'P1' => '高',
        'P2' => '中',
        'P3' => '低',
    ],
    $object_name . '_resolution_dom' => [
        '' => '',
        'Accepted' => '已接受',
        'Duplicate' => '重複',
        'Closed' => '已關閉',
        'Out of Date' => '已過期',
        'Invalid' => '無效',
    ],
];
