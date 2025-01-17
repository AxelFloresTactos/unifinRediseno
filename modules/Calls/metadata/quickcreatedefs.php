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
$viewdefs ['Calls'] =
    [
        'QuickCreate' => [
            'templateMeta' => [
                'maxColumns' => '2',
                'form' => [
                    'hidden' => [
                        0 => '<input type="hidden" name="isSaveAndNew" value="false">',
                        1 => '<input type="hidden" name="send_invites">',
                        2 => '<input type="hidden" name="user_invitees">',
                        3 => '<input type="hidden" name="lead_invitees">',
                        4 => '<input type="hidden" name="contact_invitees">',
                    ],
                    'buttons' => [
                        0 =>
                            [
                                'customCode' => '<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" onclick="SUGAR.calls.fill_invitees();this.form.action.value=\'Save\'; this.form.return_action.value=\'DetailView\'; {if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}this.form.return_id.value=\'\'; {/if}return check_form(\'EditView\') && isValidDuration();" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">',
                            ],
                        1 => 'CANCEL',
                        2 =>
                            [
                                'customCode' => '<input title="{$MOD.LBL_SEND_BUTTON_TITLE}" class="button" onclick="this.form.send_invites.value=\'1\';SUGAR.calls.fill_invitees();this.form.action.value=\'Save\';this.form.return_action.value=\'EditView\';this.form.return_module.value=\'{$smarty.request.return_module}\';return check_form(\'EditView\') && isValidDuration();" type="submit" name="button" value="{$MOD.LBL_SEND_BUTTON_LABEL}">',
                            ],
                        3 =>
                            [
                                'customCode' => '{if $fields.status.value != "Held"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" class="button" onclick="SUGAR.calls.fill_invitees(); this.form.status.value=\'Held\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Calls\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; return check_form(\'EditView\') && isValidDuration();" type="submit" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
                            ],
                    ],
                ],
                'widths' => [
                    0 =>
                        [
                            'label' => '10',
                            'field' => '30',
                        ],
                    1 =>
                        [
                            'label' => '10',
                            'field' => '30',
                        ],
                ],
                'javascript' => '<script type="text/javascript">{$JSON_CONFIG_JAVASCRIPT}</script>' .
                    '<script>toggle_portal_flag();function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',

                'useTabs' => false,
            ],
            'panels' => [
                'default' => [
                    [
                        [
                            'name' => 'name',
                            'displayParams' => [
                                'required' => true,
                            ],
                        ],
                        [
                            'name' => 'status',
                            'displayParams' => [
                                'required' => true,
                            ],
                            'fields' => [
                                [
                                    'name' => 'direction',
                                ],
                                [
                                    'name' => 'status',
                                ],
                            ],
                        ],
                    ],

                    [
                        [
                            'name' => 'date_start',
                            'type' => 'datetimecombo',
                            'displayParams' => [
                                'required' => true,
                                'updateCallback' => 'SugarWidgetScheduler.update_time();',
                            ],
                            'label' => 'LBL_DATE_TIME',
                        ],
                        [
                            'name' => 'parent_name',
                            'label' => 'LBL_LIST_RELATED_TO',
                        ],
                    ],

                    [
                        [
                            'name' => 'duration_hours',
                            'label' => 'LBL_DURATION',
                            'customCode' => '{literal}<script type="text/javascript">function isValidDuration() { form = document.getElementById(\'EditView\'); if ( form.duration_hours.value + form.duration_minutes.value <= 0 ) { alert(\'{/literal}{$MOD.NOTICE_DURATION_TIME}{literal}\'); return false; } return true; }</script>{/literal}<input id="duration_hours" name="duration_hours" tabindex="1" size="2" maxlength="2" type="text" value="{$fields.duration_hours.value}" onkeyup="SugarWidgetScheduler.update_time();"/>{$fields.duration_minutes.value}&nbsp;<span class="dateFormat">{$MOD.LBL_HOURS_MINUTES}',
                            'displayParams' => [
                                'required' => true,
                            ],
                        ],
                        [
                            'name' => 'reminder_time',
                            'customCode' => '{include file="modules/Meetings/tpls/reminders.tpl"}',
                            'label' => 'LBL_REMINDER',
                        ],

                    ],

                    [
                        [
                            'name' => 'assigned_user_name',
                            'label' => 'LBL_ASSIGNED_TO_NAME',
                        ],
                        [
                            'name' => 'team_name',
                        ],
                    ],

                    [
                        [
                            'name' => 'description',
                            'comment' => 'Full text of the note',
                            'label' => 'LBL_DESCRIPTION',
                        ],
                    ],
                ],
            ],
        ],
    ];
