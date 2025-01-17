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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$app_list_strings = [
    strtolower($object_name) . '_category_dom' => [
        '' => '',
        'Marketing' => '行銷',
        'Knowledge Base' => '知識庫',
        'Sales' => '銷售',
    ],

    strtolower($object_name) . '_subcategory_dom' => [
        '' => '',
        'Marketing Collateral' => '行銷材料',
        'Product Brochures' => '產品手冊',
        'FAQ' => '常見問題集',
    ],

    strtolower($object_name) . '_status_dom' => [
        'Active' => '使用中',
        'Draft' => '草案',
        'FAQ' => '常見問題集',
        'Expired' => '已過期',
        'Under Review' => '正在檢閱',
        'Pending' => '擱置中',
    ],
];
