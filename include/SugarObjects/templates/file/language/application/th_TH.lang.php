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
        'Marketing' => 'การตลาด',
        'Knowledge Base' => 'ฐานความรู้',
        'Sales' => 'การขาย',
    ],

    strtolower($object_name) . '_subcategory_dom' => [
        '' => '',
        'Marketing Collateral' => 'สิ่งส่งเสริมทางการตลาด',
        'Product Brochures' => 'โบรชัวร์ผลิตภัณฑ์',
        'FAQ' => 'คำถามที่พบบ่อย',
    ],

    strtolower($object_name) . '_status_dom' => [
        'Active' => 'ใช้งาน',
        'Draft' => 'ร่าง',
        'FAQ' => 'คำถามที่พบบ่อย',
        'Expired' => 'หมดอายุ',
        'Under Review' => 'อยู่ระหว่างตรวจทาน',
        'Pending' => 'รอดำเนินการ',
    ],
];
