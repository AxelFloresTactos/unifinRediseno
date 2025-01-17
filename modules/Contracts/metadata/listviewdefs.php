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


$listViewDefs['Contracts'] = [
    'NAME' => [
        'width' => '40',
        'label' => 'LBL_LIST_CONTRACT_NAME',
        'link' => true,
        'default' => true],
    'ACCOUNT_NAME' => [
        'width' => '20',
        'label' => 'LBL_LIST_ACCOUNT_NAME',
        'module' => 'Accounts',
        'id' => 'ACCOUNT_ID',
        'link' => true,
        'default' => true,
        'ACLTag' => 'ACCOUNT',
        'related_fields' => ['account_id']],
    'STATUS' => [
        'width' => '10',
        'label' => 'LBL_STATUS',
        'link' => false,
        'default' => true],
    'START_DATE' => [
        'width' => '15',
        'label' => 'LBL_LIST_START_DATE',
        'link' => false,
        'default' => true],
    'END_DATE' => [
        'width' => '15',
        'label' => 'LBL_LIST_END_DATE',
        'link' => false,
        'default' => true],
    'TEAM_NAME' => [
        'width' => '2',
        'label' => 'LBL_LIST_TEAM',
        'default' => false,
        'related_fields' => ['team_id']],

    'ASSIGNED_USER_NAME' => [
        'width' => '2',
        'label' => 'LBL_LIST_ASSIGNED_TO_USER',
        'module' => 'Employees',
        'id' => 'ASSIGNED_USER_ID',
        'default' => true],

];
