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
        'Marketing' => 'Маркетинг',
        'Knowledge Base' => 'База знань',
        'Sales' => 'Продажі',
    ],

    strtolower($object_name) . '_subcategory_dom' => [
        '' => '',
        'Marketing Collateral' => 'Додаткове маркетингове забезпечення',
        'Product Brochures' => 'Брошури продуктів',
        'FAQ' => 'Запитання й відповіді',
    ],

    strtolower($object_name) . '_status_dom' => [
        'Active' => 'Активні',
        'Draft' => 'Чернетка',
        'FAQ' => 'Запитання й відповіді',
        'Expired' => 'Закінчився термін дії',
        'Under Review' => 'Перебуває на розгляді',
        'Pending' => 'Очікує рішення',
    ],
];
