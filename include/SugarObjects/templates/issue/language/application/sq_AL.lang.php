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
        'Administration' => 'Administrimi',
        'Product' => 'Produkti',
        'User' => 'Përdoruesi',
    ],
    $object_name . '_status_dom' => [
        'New' => 'E re',
        'Assigned' => 'Caktuar',
        'Closed' => 'Mbyllur',
        'Pending Input' => 'Hyrje në pritje',
        'Rejected' => 'Refuzuar',
        'Duplicate' => 'Dublikatë',
    ],
    $object_name . '_priority_dom' => [
        'P1' => 'I lartë',
        'P2' => 'Mesatar',
        'P3' => 'I ulët',
    ],
    $object_name . '_resolution_dom' => [
        '' => '',
        'Accepted' => 'Pranuar',
        'Duplicate' => 'Dublikatë',
        'Closed' => 'Mbyllur',
        'Out of Date' => 'I papërditësuar',
        'Invalid' => 'I pavlefshëm',
    ],
];
