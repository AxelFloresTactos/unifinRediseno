<?php
// created: 2020-12-09 15:09:38
$viewdefs['Opportunities']['base']['view']['subpanel-for-accounts-opportunities'] = array (
  'type' => 'subpanel-list',
  'rowactions' => 
  array (
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'rowaction',
        'css_class' => 'btn',
        'tooltip' => 'LBL_PREVIEW',
        'event' => 'list:preview:fire',
        'icon' => 'fa-eye',
        'acl_action' => 'view',
        'allow_bwc' => false,
      ),
      1 => 
      array (
        'type' => 'unlink-action',
        'icon' => 'icon-unlink',
        'label' => 'LBL_UNLINK_BUTTON',
      ),
    ),
  ),
  'panels' => 
  array (
    0 => 
    array (
      'name' => 'panel_header',
      'label' => 'LBL_PANEL_1',
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'name',
          'label' => 'LBL_LIST_OPPORTUNITY_NAME',
          'enabled' => true,
          'default' => true,
          'link' => true,
        ),
        1 => 
        array (
          'name' => 'tipo_producto_c',
          'label' => 'LBL_TIPO_PRODUCTO',
          'enabled' => true,
          'default' => true,
        ),
        2 => 
        array (
          'name' => 'negocio_c',
          'label' => 'LBL_NEGOCIO_C',
          'enabled' => true,
          'default' => true,
        ),
        3 => 
        array (
          'name' => 'producto_financiero_c',
          'label' => 'LBL_PRODUCTO_FINANCIERO_C',
          'enabled' => true,
          'default' => true,
        ),
        4 => 
        array (
          'name' => 'tct_estapa_subetapa_txf_c',
          'label' => 'LBL_TCT_ESTAPA_SUBETAPA_TXF',
          'enabled' => true,
          'default' => true,
        ),
        5 => 
        array (
          'name' => 'monto_c',
          'label' => 'LBL_MONTO',
          'enabled' => true,
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'currency_format' => true,
          'default' => true,
        ),
        6 => 
        array (
          'name' => 'amount',
          'label' => 'LBL_LIKELY',
          'enabled' => true,
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'readonly' => false,
          'currency_format' => true,
          'default' => true,
        ),
        7 => 
        array (
          'name' => 'vigencialinea_c',
          'label' => 'LBL_VIGENCIALINEA',
          'enabled' => true,
          'default' => true,
        ),
        8 => 
        array (
          'name' => 'assigned_user_name',
          'target_record_key' => 'assigned_user_id',
          'target_module' => 'Employees',
          'label' => 'LBL_LIST_ASSIGNED_TO_NAME',
          'enabled' => true,
          'default' => true,
        ),
        9 => 
        array (
          'name' => 'asesor_operacion_c',
          'label' => 'LBL_ASESOR_OPERACION_C',
          'enabled' => true,
          'id' => 'USER_ID_C',
          'link' => true,
          'sortable' => false,
          'default' => true,
        ),
      ),
    ),
  ),
);