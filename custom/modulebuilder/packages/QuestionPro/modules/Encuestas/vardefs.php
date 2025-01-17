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
$vardefs = array (
  'fields' => 
  array (
    'related_module' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'related_module',
      'vname' => 'LBL_RELATED_MODULE',
      'type' => 'enum',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'default' => 'Home',
      'calculated' => false,
      'len' => 100,
      'size' => '20',
      'options' => 'moduleList',
      'dependency' => false,
    ),
    'related_id' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'related_id',
      'vname' => 'LBL_RELATED_ID',
      'type' => 'varchar',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'default' => '',
      'full_text_search' => 
      array (
        'enabled' => '0',
        'boost' => '1',
        'searchable' => false,
      ),
      'calculated' => false,
      'len' => '255',
      'size' => '20',
    ),
    'account_id_c' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'account_id_c',
      'vname' => 'LBL_CUENTA_ACCOUNT_ID',
      'type' => 'id',
      'massupdate' => false,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => 1,
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'len' => 36,
      'size' => '20',
    ),
    'cuenta' => 
    array (
      'required' => false,
      'readonly' => false,
      'source' => 'non-db',
      'name' => 'cuenta',
      'vname' => 'LBL_CUENTA',
      'type' => 'relate',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'dependency' => 'equal($related_module,"Accounts")',
      'len' => 255,
      'size' => '20',
      'id_name' => 'account_id_c',
      'ext2' => 'Accounts',
      'module' => 'Accounts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'lead_id_c' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'lead_id_c',
      'vname' => 'LBL_LEAD_LEAD_ID',
      'type' => 'id',
      'massupdate' => false,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => 1,
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'len' => 36,
      'size' => '20',
    ),
    'lead' => 
    array (
      'required' => false,
      'readonly' => false,
      'source' => 'non-db',
      'name' => 'lead',
      'vname' => 'LBL_LEAD',
      'type' => 'relate',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'dependency' => 'equal($related_module,"Leads")',
      'len' => 255,
      'size' => '20',
      'id_name' => 'lead_id_c',
      'ext2' => 'Leads',
      'module' => 'Leads',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'user_id_c' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'user_id_c',
      'vname' => 'LBL_USUARIO_USER_ID',
      'type' => 'id',
      'massupdate' => false,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => 1,
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'len' => 36,
      'size' => '20',
    ),
    'usuario' => 
    array (
      'required' => false,
      'readonly' => false,
      'source' => 'non-db',
      'name' => 'usuario',
      'vname' => 'LBL_USUARIO',
      'type' => 'relate',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'dependency' => 'equal($related_module,"Users")',
      'len' => 255,
      'size' => '20',
      'id_name' => 'user_id_c',
      'ext2' => 'Users',
      'module' => 'Users',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'fecha_envio' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'fecha_envio',
      'vname' => 'LBL_FECHA_ENVIO',
      'type' => 'date',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'size' => '20',
      'enable_range_search' => false,
    ),
    'email_alterno' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'email_alterno',
      'vname' => 'LBL_EMAIL_ALTERNO',
      'type' => 'varchar',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'default' => '',
      'full_text_search' => 
      array (
        'enabled' => '0',
        'boost' => '1',
        'searchable' => false,
      ),
      'calculated' => false,
      'len' => '255',
      'size' => '20',
    ),
    'fecha_respuesta' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'fecha_respuesta',
      'vname' => 'LBL_FECHA_RESPUESTA',
      'type' => 'date',
      'massupdate' => true,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'calculated' => false,
      'size' => '20',
      'enable_range_search' => false,
    ),
    'respuesta_json' => 
    array (
      'required' => false,
      'readonly' => false,
      'name' => 'respuesta_json',
      'vname' => 'LBL_RESPUESTA_JSON',
      'type' => 'text',
      'massupdate' => false,
      'hidemassupdate' => false,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'enabled',
      'duplicate_merge_dom_value' => '1',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'pii' => false,
      'default' => '',
      'full_text_search' => 
      array (
        'enabled' => '0',
        'boost' => '1',
        'searchable' => false,
      ),
      'calculated' => false,
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '20',
    ),
  ),
  'relationships' => 
  array (
  ),
);