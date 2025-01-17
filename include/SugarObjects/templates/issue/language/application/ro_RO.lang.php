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
        'Administration' => 'Administrare',
        'Product' => 'Produs',
        'User' => 'Utilizator',
    ],
    $object_name . '_status_dom' => [
        'New' => 'Nou',
        'Assigned' => 'Atribuit',
        'Closed' => 'Închis',
        'Pending Input' => 'Intrare în așteptare',
        'Rejected' => 'Respins',
        'Duplicate' => 'Duplicat',
    ],
    $object_name . '_priority_dom' => [
        'P1' => 'Ridicat',
        'P2' => 'Mediu',
        'P3' => 'Scăzut',
    ],
    $object_name . '_resolution_dom' => [
        '' => '',
        'Accepted' => 'Acceptat',
        'Duplicate' => 'Duplicat',
        'Closed' => 'Închis',
        'Out of Date' => 'Expirat',
        'Invalid' => 'Nevalid',
    ],
];
