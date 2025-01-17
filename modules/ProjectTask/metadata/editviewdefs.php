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
$viewdefs['ProjectTask']['EditView'] = [
    'templateMeta' => ['maxColumns' => '2',

        'widths' => [
            ['label' => '10', 'field' => '30'],
            ['label' => '10', 'field' => '30'],
        ],
        'includes' => [
            ['file' => 'modules/ProjectTask/ProjectTask.js'],
        ],
        'form' => [
            'buttons' => [
                ['customCode' => '{if $FROM_GRID}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" ' .
                    'onclick="this.form.action.value=\'Save\'; this.form.return_module.value=\'Project\'; this.form.return_action.value=\'EditGridView\'; ' .
                    'this.form.return_id.value=\'{$project_id}\'; return check_form(\'EditView\');"	type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}"/>' .
                    '{else}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" ' .
                    'onclick="this.form.action.value=\'Save\'; return check_form(\'EditView\');" type="submit" name="button" ' .
                    'value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if}&nbsp;',
                ],
                ['customCode' => '{if $FROM_GRID}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" ' .
                    'onclick="SUGAR.grid.closeTaskDetails()"; ' .
                    'type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">' .
                    '{else}{if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}' .
                    '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" ' .
                    'onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" ' .
                    'type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">' .
                    '{elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}' .
                    '<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" ' .
                    'onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" ' .
                    'type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">' .
                    '{else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" ' .
                    'onclick="this.form.action.value=\'index\'; this.form.module.value=\'{$smarty.request.return_module}\'; this.form.record.value=\'{$smarty.request.return_id}\';" ' .
                    'type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">{/if}{/if}&nbsp;',
                ],
            ],
        ],
    ],
    'panels' => [
        'default' => [

            [
                [
                    'name' => 'name',
                    'label' => 'LBL_NAME',
                ],

                [
                    'name' => 'project_task_id',
                    'type' => 'readonly',
                    'label' => 'LBL_TASK_ID',
                ],
            ],

            [
                [
                    'name' => 'duration',
                    'type' => 'readonly',
                    'customCode' => '{$fields.duration.value}&nbsp;{$fields.duration_unit.value}',
                ],
            ],

            [
                [
                    'name' => 'date_start',
                    'type' => 'readonly',
                ],

                [
                    'name' => 'date_finish',
                    'type' => 'readonly',
                ],
            ],

            [
                [
                    'name' => 'status',
                    'customCode' => '<select name="{$fields.status.name}" id="{$fields.status.name}" title="" tabindex="s" onchange="update_percent_complete(this.value);">{if isset($fields.status.value) && $fields.status.value != ""}{html_options options=$fields.status.options selected=$fields.status.value}{else}{html_options options=$fields.status.options selected=$fields.status.default}{/if}</select>',
                ],
                'priority',
            ],


            [

                [
                    'name' => 'percent_complete',
                    'customCode' => '<span id="percent_complete_text">{$fields.percent_complete.value}</span><input type="hidden" name="{$fields.percent_complete.name}" id="{$fields.percent_complete.name}" value="{$fields.percent_complete.value}" /></tr>',
                ],
            ],


            [
                [
                    'name' => 'resource_id',
                    'customCode' => '{$resource}',
                    'label' => 'LBL_RESOURCE',
                ],
                [

                    'name' => 'team_name',
                    'type' => 'readonly',
                    'label' => 'LBL_TEAM',
                ],
            ],

            [
                'milestone_flag',
            ],

            [

                [
                    'name' => 'project_name',
                    'type' => 'readonly',
                    'customCode' => '<a href="index.php?module=Project&action=DetailView&record={$fields.project_id.value}">{$fields.project_name.value}&nbsp;</a>',
                    'label' => 'LBL_PROJECT_NAME',
                ],
                [
                    'name' => 'actual_duration',
                    'customCode' => '<input id="actual_duration" type="text" tabindex="2" value="{$fields.actual_duration.value}" size="3" name="actual_duration"/>&nbsp;{$fields.duration_unit.value}',
                    'label' => 'LBL_ACTUAL_DURATION',
                ],
            ],
            [

                'task_number',
                'order_number',
            ],

            [
                'estimated_effort',
                'utilization',
            ],

            [
                [
                    'name' => 'description',
                ],
            ],
        ],
    ],


];
