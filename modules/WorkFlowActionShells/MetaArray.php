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


$process_dictionary['ActionsCreateStep1'] = ['action' => 'CreateStep1',
    'elements' => [

        'update' => [
            'trigger_type' => 'all',
            'top' => [
                'type' => 'radio',
                'name' => 'action_type',
                'value' => 'update',
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_UPDATE_TITLE'],
                    //end top options
                ],
                //end top
            ],
            'bottom' => [
                'type' => 'text',
                'value' => 'update',
                'related' => '0',
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_UPDATE_TITLE', 'text_type' => 'static'],
                    //end bottom options
                ],
                //end bottom
            ],
//end update array
        ],
        'update_rel' => [
            'trigger_type' => 'all',
            'top' => [
                'type' => 'radio',
                'name' => 'action_type',
                'value' => 'update_rel',
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_UPDATE_REL_TITLE'],
                    //end top options
                ],
                //end top
            ],
            'bottom' => [
                'type' => 'text',
                'value' => 'update_rel',
                'related' => ['count' => '1', 'rel1_field' => 'rel_module'],
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_UPDATE_REL', 'text_type' => 'static'],
                    '2' => [
                        'vname' => 'LBL_RECORD',
                        'default' => 'on',
                        'text_type' => 'dynamic',
                        'type' => 'href',
                        'value' => 'rel_module',
                        'value_type' => 'relrel_module',
                        'jscript_function' => 'get_single_selector',
                        'jscript_content' => ['self', 'rel_module', 'field', 'rel_filter'],
                    ],
                    //end bottom options
                ],
                //end bottom
            ],
//end update_rel array
        ],
        'new' => [
            'trigger_type' => 'all',
            'top' => [
                'type' => 'radio',
                'name' => 'action_type',
                'value' => 'new',
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_NEW_TITLE'],
                    //end top options
                ],
                //end top
            ],
            'bottom' => [
                'type' => 'text',
                'value' => 'new',
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_NEW', 'text_type' => 'static'],
                    '2' => [
                        'vname' => 'LBL_RECORD',
                        'default' => 'on',
                        'text_type' => 'dynamic',
                        'type' => 'href',
                        'value' => 'action_module',
                        'value_type' => 'module',
                        'jscript_function' => 'get_single_selector',
                        'jscript_content' => ['self', 'action_module', 'module_list', 'singular'],
                    ],
                    //end bottom options
                ],
                //end bottom
            ],
//end new array
        ],
        'new_rel' => [
            'trigger_type' => 'all',
            'top' => [
                'type' => 'radio',
                'name' => 'action_type',
                'value' => 'new_rel',
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_NEW_REL_TITLE'],
                    //end top options
                ],
                //end top
            ],
            'bottom' => [
                'type' => 'text',
                'value' => 'new_rel',
                'related' => ['count' => '1', 'rel1_field' => 'rel_module'],
                'options' => [
                    '1' => ['vname' => 'LBL_ACTION_NEW_REL', 'text_type' => 'static'],
                    '2' => [
                        'vname' => 'LBL_RELATED_RECORD',
                        'default' => 'on',
                        'text_type' => 'dynamic',
                        'type' => 'href',
                        'value' => 'rel_module',
                        'value2' => 'action_module',
                        'value_type' => 'relrel_module',
                        'jscript_function' => 'get_rel_selector',
                        'jscript_content' => ['self'],
                    ],
                    //end bottom options
                ],
                //end bottom
            ],
//end new_rel array
        ],
    ],

    'hide_others' => [
        'target_field' => 'action_type',
        'target_element' => [''],

    ],
//End process dictionary ActionsCreateStep1
];
