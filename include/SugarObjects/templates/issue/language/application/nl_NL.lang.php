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
        'Administration' => 'Beheer',
        'Product' => 'Product',
        'User' => 'Gebruiker',
    ],
    $object_name . '_status_dom' => [
        'New' => 'Nieuw',
        'Assigned' => 'Toegewezen',
        'Closed' => 'Gesloten',
        'Pending Input' => 'Wacht op input',
        'Rejected' => 'Afgewezen',
        'Duplicate' => 'Dupliceren',
    ],
    $object_name . '_priority_dom' => [
        'P1' => 'Hoog',
        'P2' => 'Medium',
        'P3' => 'Laag',
    ],
    $object_name . '_resolution_dom' => [
        '' => '',
        'Accepted' => 'Geaccepteerd',
        'Duplicate' => 'Dupliceren',
        'Closed' => 'Gesloten',
        'Out of Date' => 'Verlopen',
        'Invalid' => 'Ongeldig',
    ],
];
