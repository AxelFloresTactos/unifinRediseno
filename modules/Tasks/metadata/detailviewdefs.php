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
$viewdefs ['Tasks'] =
    [
        'DetailView' => [
            'templateMeta' => [
                'form' => [
                    'buttons' => [
                        'EDIT',
                        'DUPLICATE',
                        'DELETE',

                        [
                            'customCode' => '{if $fields.status.value != "Completed"} <input type="hidden" name="isSaveAndNew" value="false">  <input type="hidden" name="status" value="">  <input id="close_and_create_new_button" title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"  class="button"  onclick="this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true; this.form.return_id.value=\'{$fields.id.value}\';"  name="button"  value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"  type="submit">{/if}',
                            //Bug#51778: The custom code will be replaced with sugar_html. customCode will be deplicated.
                            'sugar_html' => [
                                'type' => 'submit',
                                'value' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
                                'htmlOptions' => [
                                    'title' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
                                    'class' => 'button',
                                    'onclick' => 'this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true; this.form.return_id.value=\'{$fields.id.value}\';',
                                    'name' => 'button',
                                    'id' => 'close_and_create_new_button',
                                ],
                                'template' => '{if $fields.status.value != "Completed"}[CONTENT]{/if}',
                            ],
                        ],

                        [
                            'customCode' => '{if $fields.status.value != "Completed"} <input type="hidden" name="isSave" value="false">  <input title="{$APP.LBL_CLOSE_BUTTON_TITLE}" id="close_button" class="button"  onclick="this.form.status.value=\'Completed\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Tasks\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'"  name="button1"  value="{$APP.LBL_CLOSE_BUTTON_TITLE}"  type="submit">{/if}',
                            //Bug#51778: The custom code will be replaced with sugar_html. customCode will be deplicated.
                            'sugar_html' => [
                                'type' => 'submit',
                                'value' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
                                'htmlOptions' => [
                                    'title' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
                                    'class' => 'button',
                                    'onclick' => 'this.form.status.value=\'Completed\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Tasks\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'',
                                    'name' => 'button1',
                                    'id' => 'close_button',
                                ],
                            ],
                        ],
                    ],
                    'hidden' => [
                        '<input type="hidden" name="isSaveAndNew">',
                        '<input type="hidden" name="status" value="">',
                        '<input type="hidden" name="isSave">',
                    ],
                ],
                'maxColumns' => '2',
                'widths' => [

                    [
                        'label' => '10',
                        'field' => '30',
                    ],

                    [
                        'label' => '10',
                        'field' => '30',
                    ],
                ],
                'useTabs' => false,
            ],
            'panels' => [
                'lbl_task_information' => [

                    [

                        [
                            'name' => 'name',
                            'label' => 'LBL_SUBJECT',
                        ],
                        'status',
                    ],

                    [
                        'date_start',

                        [
                            'name' => 'parent_name',
                            'customLabel' => '{sugar_translate label=\'LBL_MODULE_NAME\' module=$fields.parent_type.value}',
                        ],
                    ],

                    [
                        'date_due',

                        [
                            'name' => 'contact_name',
                            'label' => 'LBL_CONTACT',
                        ],
                    ],

                    [
                        'priority',
                    ],

                    [
                        'description',
                    ],
                ],
                'LBL_PANEL_ASSIGNMENT' => [

                    [

                        [
                            'name' => 'assigned_user_name',
                            'label' => 'LBL_ASSIGNED_TO',
                        ],

                        'team_name',
                    ],

                    [

                        [
                            'name' => 'date_entered',
                            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                            'label' => 'LBL_DATE_ENTERED',
                        ],

                        [
                            'name' => 'date_modified',
                            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                            'label' => 'LBL_DATE_MODIFIED',
                        ],
                    ],
                ],
            ],
        ],

    ];
