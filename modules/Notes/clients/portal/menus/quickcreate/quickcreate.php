<?php

//FILE SUGARCRM flav=ent
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

$module_name = 'Notes';
$viewdefs[$module_name]['portal']['menu']['quickcreate'] = [
    //Disabled in Portal by default
    'visible' => false,
    //Included in case quick create for Notes becomes enabled later
    'layout' => 'create',
    'label' => 'LNK_NEW_NOTE',
    'order' => 9,
    'icon' => 'sicon-plus',
];
