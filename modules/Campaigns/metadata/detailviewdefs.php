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
$viewdefs['Campaigns']['DetailView'] = [
    'templateMeta' => [
        'form' => [
            'hidden' => ['<input type="hidden" name="mode" value="">'],
            'buttons' => [
                'EDIT',
                'SHARE',
                'DUPLICATE',
                'DELETE',
                // FIXME review these SUGAR.ajaxUI.* methods
                [
                    'customCode' => '<input title="{$MOD.LBL_TEST_BUTTON_TITLE}"  class="button" onclick="this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';this.form.mode.value=\'test\';SUGAR.ajaxUI.submitForm(this.form);" type="{$ADD_BUTTON_STATE}" name="button" id="send_test_button" value="{$MOD.LBL_TEST_BUTTON_LABEL}">',
                    //Bug#51778: The custom code will be replaced with sugar_html. customCode will be duplicated.
                    'sugar_html' => [
                        'type' => 'input',
                        'value' => '{$MOD.LBL_TEST_BUTTON_LABEL}',
                        'htmlOptions' => [
                            'type' => '{$ADD_BUTTON_STATE}',
                            'title' => '{$MOD.LBL_TEST_BUTTON_TITLE}',
                            'class' => 'button',
                            'onclick' => 'this.form = document.getElementById(\'formDetailView\'); this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';this.form.mode.value=\'test\';SUGAR.ajaxUI.submitForm(this.form);',
                            'name' => 'button',
                            'id' => 'send_test_button',
                        ],
                    ],
                ],
                [
                    'customCode' => '<input title="{$MOD.LBL_QUEUE_BUTTON_TITLE}" class="button" onclick="this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';SUGAR.ajaxUI.submitForm(this.form);" type="{$ADD_BUTTON_STATE}" name="button" id="send_emails_button" value="{$MOD.LBL_QUEUE_BUTTON_LABEL}">',
                    //Bug#51778: The custom code will be replaced with sugar_html. customCode will be duplicated.
                    'sugar_html' => [
                        'type' => 'input',
                        'value' => '{$MOD.LBL_QUEUE_BUTTON_LABEL}',
                        'htmlOptions' => [
                            'type' => '{$ADD_BUTTON_STATE}',
                            'title' => '{$MOD.LBL_QUEUE_BUTTON_TITLE}',
                            'class' => 'button',
                            'onclick' => 'this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';SUGAR.ajaxUI.submitForm(this.form);',
                            'name' => 'button',
                            'id' => 'send_emails_button',
                        ],
                    ],
                ],
                [
                    'customCode' => '<input title="{$MOD.LBL_MARK_AS_SENT}" class="button" onclick="this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'DetailView\';this.form.mode.value=\'set_target\';SUGAR.ajaxUI.submitForm(this.form);" type="{$TARGET_BUTTON_STATE}" name="button" id="mark_as_sent_button" value="{$MOD.LBL_MARK_AS_SENT}">',
                    //Bug#51778: The custom code will be replaced with sugar_html. customCode will be duplicated.
                    'sugar_html' => [
                        'type' => 'input',
                        'value' => '{$MOD.LBL_MARK_AS_SENT}',
                        'htmlOptions' => [
                            'type' => '{$TARGET_BUTTON_STATE}',
                            'title' => '{$MOD.LBL_MARK_AS_SENT}',
                            'class' => 'button',
                            'onclick' => 'this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'DetailView\';this.form.mode.value=\'set_target\';SUGAR.ajaxUI.submitForm(this.form);',
                            'name' => 'button',
                            'id' => 'mark_as_sent_button',
                        ],
                    ],

                ],
                ['customCode' => '<script>{$MSG_SCRIPT}</script>'],
            ],
            'links' => [
                '{if $HAS_EDIT_ACCESS}<input type="button" class="button" onclick="javascript:window.location=\'index.php?module=Campaigns&action=WizardHome&record={$fields.id.value}\';" name="button" id="launch_wizard_button" value="{$MOD.LBL_TO_WIZARD_TITLE}" />{/if}',
                '<input type="button" class="button" onclick="javascript:window.location=\'index.php?module=Campaigns&action=TrackDetailView&record={$fields.id.value}\';" name="button" id="view_status_button" value="{$MOD.LBL_TRACK_BUTTON_LABEL}" />',
                '<input id="viewRoiButtonId" type="button" class="button" onclick="javascript:window.location=\'index.php?module=Campaigns&action=RoiDetailView&record={$fields.id.value}\';" name="button" id="view_roi_button" value="{$MOD.LBL_TRACK_ROI_BUTTON_LABEL}" />',

            ],
        ],
        'maxColumns' => '2',
        'widths' => [
            ['label' => '10', 'field' => '30'],
            ['label' => '10', 'field' => '30'],
        ],

    ],
    'panels' => [
        'lbl_campaign_information' => [
            [
                'name',
                [
                    'name' => 'status',
                    'label' => 'LBL_CAMPAIGN_STATUS',
                ],
            ],
            [

                [
                    'name' => 'start_date',
                    'label' => 'LBL_CAMPAIGN_START_DATE',
                ],
                'campaign_type',
            ],
            [
                [
                    'name' => 'end_date',
                    'label' => 'LBL_CAMPAIGN_END_DATE',
                ],
                [
                    'name' => 'frequency',
                    'customCode' => '{if $fields.campaign_type.value == "NewsLetter"}<div style=\'none\' id=\'freq_field\'>{$APP_LIST.newsletter_frequency_dom[$fields.frequency.value]}</div>{/if}&nbsp;',
                    'customLabel' => '{if $fields.campaign_type.value == "NewsLetter"}<div style=\'none\' id=\'freq_label\'>{$MOD.LBL_CAMPAIGN_FREQUENCY}</div>{/if}&nbsp;',
                ],
            ],
            [
                [
                    'name' => 'impressions',
                    'label' => 'LBL_CAMPAIGN_IMPRESSIONS',
                ],
            ],
            [

                [
                    'name' => 'budget',
                    'label' => '{$MOD.LBL_CAMPAIGN_BUDGET} ({$CURRENCY})',
                ],
                [
                    'name' => 'expected_cost',
                    'label' => '{$MOD.LBL_CAMPAIGN_EXPECTED_COST} ({$CURRENCY})',
                ],
            ],
            [
                [
                    'name' => 'actual_cost',
                    'label' => '{$MOD.LBL_CAMPAIGN_ACTUAL_COST} ({$CURRENCY})',
                ],
                [
                    'name' => 'expected_revenue',
                    'label' => '{$MOD.LBL_CAMPAIGN_EXPECTED_REVENUE} ({$CURRENCY})',
                ],
            ],
            [

                [
                    'name' => 'objective',
                    'label' => 'LBL_CAMPAIGN_OBJECTIVE',
                ],
            ],
            [

                [
                    'name' => 'content',
                    'label' => 'LBL_CAMPAIGN_CONTENT',
                ],
            ],
        ],
        'LBL_PANEL_ASSIGNMENT' => [
            [
                [
                    'name' => 'assigned_user_name',
                    'label' => 'LBL_ASSIGNED_TO',
                ],
                [
                    'name' => 'date_modified',
                    'label' => 'LBL_DATE_MODIFIED',
                    'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value|escape:"html":"UTF-8"}',
                ],
            ],
            [

                [
                    'name' => 'team_name',
                    'LBL_TEAM_NAME',
                    'customCode' => '{$fields.team_name.value|escape}',
                ],
                [
                    'name' => 'date_entered',
                    'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value|escape:"html":"UTF-8"}',
                ],
            ],
        ],
    ],
];
