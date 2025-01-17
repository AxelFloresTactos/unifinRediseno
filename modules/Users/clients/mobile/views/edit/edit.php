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
$viewdefs['Users']['mobile']['view']['edit'] = [
    'templateMeta' => [
        'maxColumns' => '1',
        'widths' => [
            ['label' => '10', 'field' => '30'],
        ],
    ],
    'panels' => [
        [
            'label' => 'LBL_DETAIL',
            'fields' => [
                [
                    'name' => 'first_name',
                    'displayParams' => [
                        'wireless_edit_only' => true,
                    ],
                ],
                [
                    'name' => 'last_name',
                    'displayParams' => [
                        'required' => true,
                        'wireless_edit_only' => true,
                    ],
                ],
                [
                    'name' => 'title',
                    'customCode' => '{if $EDIT_TITLE_DEPT}<input type="text" name="{$fields.title.name}" id="{$fields.title.name}" size="30" maxlength="50" value="{$fields.title.value}" title="" tabindex="t" >' .
                        '{else}{$fields.title.value}<input type="hidden" name="{$fields.title.name}" id="{$fields.title.name}" value="{$fields.title.value}">{/if}',
                ],
                [
                    'name' => 'department',
                    'customCode' => '{if $EDIT_TITLE_DEPT}<input type="text" name="{$fields.department.name}" id="{$fields.department.name}" size="30" maxlength="50" value="{$fields.department.value}" title="" tabindex="t" >' .
                        '{else}{$fields.department.value}<input type="hidden" name="{$fields.department.name}" id="{$fields.department.name}" value="{$fields.department.value}">{/if}',
                ],
                'phone_work',
                'phone_mobile',
                'email',
                'address_street',
                'address_city',
                'address_state',
                'address_postalcode',
                'address_country',
            ],
        ],
    ],
];
