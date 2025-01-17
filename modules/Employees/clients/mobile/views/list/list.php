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

$viewdefs['Employees']['mobile']['view']['list'] = [
    'panels' => [
        [
            'label' => 'LBL_PANEL_DEFAULT',
            'fields' => [
                [
                    'name' => 'name',
                    'label' => 'LBL_NAME',
                    'link' => true,
                    'orderBy' => 'last_name',
                    'default' => true,
                    'enabled' => true,
                    'related_fields' => ['first_name', 'last_name', 'salutation'],
                ],
                [
                    'name' => 'title',
                    'label' => 'LBL_TITLE',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'email',
                    'label' => 'LBL_EMAIL',
                    'sortable' => false,
                    'link' => true,
                    'customCode' => '{$EMAIL_LINK}{$EMAIL}</a>',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'phone_work',
                    'label' => 'LBL_OFFICE_PHONE',
                    'default' => true,
                    'enabled' => true,
                ],
                [
                    'name' => 'phone_home',
                    'label' => 'LBL_HOME_PHONE',
                    'default' => false,
                ],
                [
                    'name' => 'phone_mobile',
                    'label' => 'LBL_MOBILE_PHONE',
                    'default' => false,
                ],
                [
                    'name' => 'phone_other',
                    'label' => 'LBL_WORK_PHONE',
                    'default' => false,
                ],
                [
                    'name' => 'phone_fax',
                    'label' => 'LBL_FAX_PHONE',
                    'default' => false,
                ],
                [
                    'name' => 'address_street',
                    'label' => 'LBL_PRIMARY_ADDRESS_STREET',
                    'default' => false,
                ],
                [
                    'name' => 'address_city',
                    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
                    'default' => false,
                ],
                [
                    'name' => 'address_state',
                    'label' => 'LBL_PRIMARY_ADDRESS_STATE',
                    'default' => false,
                ],
                [
                    'name' => 'address_postalcode',
                    'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
                    'default' => false,
                ],
                [
                    'name' => 'date_entered',
                    'label' => 'LBL_DATE_ENTERED',
                    'default' => false,
                    'readonly' => true,
                ],
                [
                    'name' => 'picture',
                    'label' => 'LBL_PICTURE_FILE',
                    'enabled' => true,
                    'default' => true,
                ],

                [
                    'name' => 'team_name',
                    'label' => 'LBL_TEAM',
                    'default' => true,
                    'enabled' => true,
                ],
            ]]]];
