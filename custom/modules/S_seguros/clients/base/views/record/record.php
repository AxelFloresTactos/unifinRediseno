<?php
$module_name = 'S_seguros';
$viewdefs[$module_name] = 
array (
  'base' => 
  array (
    'view' => 
    array (
      'record' => 
      array (
        'buttons' => 
        array (
          0 => 
          array (
            'type' => 'button',
            'name' => 'cancel_button',
            'label' => 'LBL_CANCEL_BUTTON_LABEL',
            'css_class' => 'btn-invisible btn-link',
            'showOn' => 'edit',
            'events' => 
            array (
              'click' => 'button:cancel_button:click',
            ),
          ),
          1 => 
          array (
            'type' => 'rowaction',
            'event' => 'button:save_button:click',
            'name' => 'save_button',
            'label' => 'LBL_SAVE_BUTTON_LABEL',
            'css_class' => 'btn btn-primary',
            'showOn' => 'edit',
            'acl_action' => 'edit',
          ),
          2 => 
          array (
            'type' => 'actiondropdown',
            'name' => 'main_dropdown',
            'primary' => true,
            'showOn' => 'view',
            'buttons' => 
            array (
              0 => 
              array (
                'type' => 'rowaction',
                'event' => 'button:edit_button:click',
                'name' => 'edit_button',
                'label' => 'LBL_EDIT_BUTTON_LABEL',
                'acl_action' => 'edit',
              ),
              1 => 
              array (
                'type' => 'shareaction',
                'name' => 'share',
                'label' => 'LBL_RECORD_SHARE_BUTTON',
                'acl_action' => 'view',
              ),
              2 => 
              array (
                'type' => 'pdfaction',
                'name' => 'download-pdf',
                'label' => 'LBL_PDF_VIEW',
                'action' => 'download',
                'acl_action' => 'view',
              ),
              3 => 
              array (
                'type' => 'pdfaction',
                'name' => 'email-pdf',
                'label' => 'LBL_PDF_EMAIL',
                'action' => 'email',
                'acl_action' => 'view',
              ),
              4 => 
              array (
                'type' => 'divider',
              ),
              5 => 
              array (
                'type' => 'rowaction',
                'event' => 'button:find_duplicates_button:click',
                'name' => 'find_duplicates_button',
                'label' => 'LBL_DUP_MERGE',
                'acl_action' => 'edit',
              ),
              6 => 
              array (
                'type' => 'rowaction',
                'event' => 'button:duplicate_button:click',
                'name' => 'duplicate_button',
                'label' => 'LBL_DUPLICATE_BUTTON_LABEL',
                'acl_module' => 'S_seguros',
                'acl_action' => 'create',
              ),
              7 => 
              array (
                'type' => 'rowaction',
                'event' => 'button:audit_button:click',
                'name' => 'audit_button',
                'label' => 'LNK_VIEW_CHANGE_LOG',
                'acl_action' => 'view',
              ),
              8 => 
              array (
                'type' => 'divider',
              ),
              9 => 
              array (
                'type' => 'rowaction',
                'event' => 'button:delete_button:click',
                'name' => 'delete_button',
                'label' => 'LBL_DELETE_BUTTON_LABEL',
                'acl_action' => 'delete',
              ),
            ),
          ),
          3 => 
          array (
            'name' => 'sidebar_toggle',
            'type' => 'sidebartoggle',
          ),
        ),
        'panels' => 
        array (
          0 => 
          array (
            'name' => 'panel_header',
            'label' => 'LBL_RECORD_HEADER',
            'header' => true,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'picture',
                'type' => 'avatar',
                'width' => 42,
                'height' => 42,
                'dismiss_label' => true,
                'readonly' => true,
              ),
              1 => 'name',
              2 => 
              array (
                'name' => 'favorite',
                'label' => 'LBL_FAVORITE',
                'type' => 'favorite',
                'readonly' => true,
                'dismiss_label' => true,
              ),
              3 => 
              array (
                'name' => 'follow',
                'label' => 'LBL_FOLLOW',
                'type' => 'follow',
                'readonly' => true,
                'dismiss_label' => true,
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'panel_body',
            'label' => 'LBL_RECORD_BODY',
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'newTab' => false,
            'panelDefault' => 'expanded',
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'seguro_pipeline',
                'studio' => 'visible',
                'label' => '',
                'span' => 12,
              ),
              1 => 
              array (
                'name' => 's_seguros_accounts_name',
                'label' => 'LBL_S_SEGUROS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
              ),
              2 => 
              array (
                'name' => 'date_entered_by',
                'readonly' => true,
                'inline' => true,
                'type' => 'fieldset',
                'label' => 'LBL_DATE_ENTERED',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'date_entered',
                  ),
                  1 => 
                  array (
                    'type' => 'label',
                    'default_value' => 'LBL_BY',
                  ),
                  2 => 
                  array (
                    'name' => 'created_by_name',
                  ),
                ),
              ),
              3 => 
              array (
                'name' => 'tipo',
                'label' => 'LBL_TIPO',
              ),
              4 => 
              array (
                'name' => 'tipo_registro_sf_c',
                'label' => 'LBL_TIPO_REGISTRO_SF',
              ),
              5 => 
              array (
                'name' => 'tipo_venta_c',
                'label' => 'LBL_TIPO_VENTA',
              ),
              6 => 
              array (
                'name' => 'tipo_sf_c',
                'label' => 'LBL_TIPO_SF',
              ),
              7 => 
              array (
                'name' => 'ejecutivo_c',
                'label' => 'LBL_EJECUTIVO',
              ),
              8 => 
              array (
                'name' => 'tipo_referenciador',
                'label' => 'LBL_TIPO_REFERENCIADOR',
              ),
              9 => 
              array (
                'name' => 'referenciador',
                'studio' => 'visible',
                'label' => 'LBL_REFERENCIADOR',
              ),
              10 => 
              array (
                'name' => 'region',
                'label' => 'LBL_REGION',
                'readonly' => true,
              ),
              11 => 
              array (
                'name' => 'empleados_c',
                'studio' => 'visible',
                'label' => 'LBL_EMPLEADOS',
              ),
              12 => 
              array (
                'name' => 'departamento_c',
                'label' => 'LBL_DEPARTAMENTO',
                'readonly' => true,
              ),
              13 => 
              array (
                'name' => 'etapa',
                'label' => 'LBL_ETAPA',
              ),
              14 => 
              array (
                'name' => 'area',
                'label' => 'LBL_AREA',
              ),
              15 => 
              array (
                'name' => 'prima_objetivo',
                'label' => 'LBL_PRIMA_OBJ_C',
                'inline' => true,
                'type' => 'fieldset',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'monedas_c',
                  ),
                  1 => 
                  array (
                    'name' => 'prima_obj_c',
                  ),
                ),
              ),
              16 => 
              array (
                'name' => 'tipo_cambio_obj',
                'label' => 'LBL_TIPO_CAMBIO_OBJ',
              ),
              17 => 
              array (
                'name' => 'fecha_req',
                'label' => 'LBL_FECHA_REQ',
              ),
              18 => 
              array (
                'name' => 'fecha_cierre_c',
                'label' => 'LBL_FECHA_CIERRE',
              ),
              19 => 
              array (
                'name' => 'motivos_c',
                'studio' => 'visible',
                'label' => 'LBL_MOTIVOS',
              ),
              20 => 
              array (
                'name' => 'motivo_no_cotizado_c',
                'label' => 'LBL_MOTIVO_NO_COTIZADO',
              ),
              21 => 
              array (
                'name' => 'requiere_ayuda_c',
                'label' => 'LBL_REQUIERE_AYUDA',
              ),
              22 => 
              array (
                'name' => 'servicios_a_incluir_c',
                'label' => 'LBL_SERVICIOS_A_INCLUIR',
              ),
              23 => 
              array (
                'name' => 'subramos_c',
                'label' => 'LBL_SUBRAMOS',
              ),
              24 => 
              array (
                'name' => 'oficina_c',
                'label' => 'LBL_OFICINA',
              ),
              25 => 
              array (
                'name' => 'kam_c',
                'label' => 'LBL_KAM',
              ),
              26 => 
              array (
                'name' => 'nacional_c',
                'label' => 'LBL_NACIONAL',
              ),
              27 => 
              array (
                'name' => 'fee_c',
                'label' => 'LBL_FEE',
              ),
              28 => 
              array (
                'name' => 'fee_p_c',
                'label' => 'LBL_FEE_P',
              ),
              29 => 
              array (
                'name' => 'razon_perdida_c',
                'label' => 'LBL_RAZON_PERDIDA',
              ),
              30 => 
              array (
                'name' => 'comentarios_c',
                'studio' => 'visible',
                'label' => 'LBL_COMENTARIOS',
              ),
              31 => 
              array (
                'name' => 'no_renovable_c',
                'label' => 'LBL_NO_RENOVABLE',
              ),
              32 => 
              array (
                'name' => 'motivos_revision_c',
                'studio' => 'visible',
                'label' => 'LBL_MOTIVOS_REVISION',
              ),
              33 => 
              array (
                'name' => 'info_actual',
                'label' => 'LBL_INFO_ACTUAL',
              ),
              34 => 
              array (
                'name' => 'notifica_kam_c',
                'label' => 'LBL_NOTIFICA_KAM',
              ),
            ),
          ),
          2 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL1',
            'label' => 'LBL_RECORDVIEW_PANEL1',
            'columns' => 2,
            'labelsOnTop' => 1,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'prima_neta_c',
                'label' => 'LBL_PRIMA_NETA_C',
                'inline' => true,
                'type' => 'fieldset',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'monedas_c',
                  ),
                  1 => 
                  array (
                    'name' => 'prima_neta_c',
                  ),
                ),
              ),
              1 => 
              array (
                'name' => 'tipo_cambio_n',
                'label' => 'LBL_TIPO_CAMBIO_N',
              ),
              2 => 
              array (
                'name' => 'compania',
                'label' => 'LBL_COMPANIA',
              ),
              3 => 
              array (
                'name' => 'forma_pago_act',
                'label' => 'LBL_FORMA_PAGO_ACT',
              ),
              4 => 
              array (
                'name' => 'siniestralidad',
                'label' => 'LBL_SINIESTRALIDAD',
              ),
              5 => 
              array (
              ),
              6 => 
              array (
                'name' => 'fecha_ini',
                'label' => 'LBL_FECHA_INI',
              ),
              7 => 
              array (
                'name' => 'fecha_fin',
                'label' => 'LBL_FECHA_FIN',
              ),
            ),
          ),
          3 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL3',
            'label' => 'LBL_RECORDVIEW_PANEL3',
            'columns' => 2,
            'labelsOnTop' => 1,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'prima_c',
                'label' => 'LBL_PRIMA',
                'readonly' => true,
              ),
              1 => 
              array (
                'name' => 'comision_tec_c',
                'label' => 'LBL_COMISION_TEC',
                'readonly' => true,
              ),
              2 => 
              array (
                'name' => 'asegurador_tec_c',
                'label' => 'LBL_ASEGURADOR_TEC',
                'readonly' => true,
              ),
              3 => 
              array (
              ),
            ),
          ),
          4 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL2',
            'label' => 'LBL_RECORDVIEW_PANEL2',
            'columns' => 2,
            'labelsOnTop' => 1,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'prima_neta_ganada_c',
                'label' => 'LBL_PRIMA_NETA_GANADA',
                'inline' => true,
                'type' => 'fieldset',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'monedas_c',
                  ),
                  1 => 
                  array (
                    'name' => 'prima_neta_ganada_c',
                  ),
                ),
              ),
              1 => 
              array (
                'name' => 'tipo_cambio_ganada_c',
                'label' => 'LBL_TIPO_CAMBIO_GANADA',
              ),
              2 => 
              array (
                'name' => 'forma_pago',
                'label' => 'LBL_FORMA_PAGO',
              ),
              3 => 
              array (
                'name' => 'comision_c',
                'label' => 'LBL_COMISION',
              ),
              4 => 
              array (
                'name' => 'prima_neta',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_PRIMA_NETA',
                'readonly' => true,
              ),
              5 => 
              array (
                'name' => 'aseguradora_c',
                'label' => 'LBL_ASEGURADORA',
              ),
              6 => 
              array (
                'name' => 'incentivo',
                'label' => 'LBL_INCENTIVO',
              ),
              7 => 
              array (
                'name' => 'ingreso_ref',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_INGRESO_REF',
                'readonly' => true,
              ),
              8 => 
              array (
                'name' => 'fecha_ini_c',
                'label' => 'LBL_FECHA_INI_C',
              ),
              9 => 
              array (
                'name' => 'fecha_fin_c',
                'label' => 'LBL_FECHA_FIN_C',
              ),
              10 => 
              array (
                'name' => 'participa_kam_c',
                'label' => 'LBL_PARTICIPA_KAM',
              ),
              11 => 
              array (
                'name' => 'seguro_uni2_c',
                'label' => 'LBL_SEGURO_UNI2',
              ),
            ),
          ),
          5 => 
          array (
            'name' => 'panel_hidden',
            'label' => 'LBL_SHOW_MORE',
            'hide' => true,
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'newTab' => false,
            'panelDefault' => 'expanded',
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'tipo_cliente_c',
                'label' => 'LBL_TIPO_CLIENTE',
                'span' => 12,
              ),
              1 => 
              array (
                'name' => 'description',
                'span' => 12,
              ),
              2 => 
              array (
                'name' => 'date_modified_by',
                'readonly' => true,
                'inline' => true,
                'type' => 'fieldset',
                'label' => 'LBL_DATE_MODIFIED',
                'fields' => 
                array (
                  0 => 
                  array (
                    'name' => 'date_modified',
                  ),
                  1 => 
                  array (
                    'type' => 'label',
                    'default_value' => 'LBL_BY',
                  ),
                  2 => 
                  array (
                    'name' => 'modified_by_name',
                  ),
                ),
                'span' => 12,
              ),
              3 => 
              array (
                'name' => 'producto_c',
                'label' => 'LBL_PRODUCTO',
                'readonly' => true,
              ),
              4 => 
              array (
                'name' => 'id_disposicion_c',
                'label' => 'LBL_ID_DISPOSICION',
                'readonly' => true,
              ),
            ),
          ),
        ),
        'templateMeta' => 
        array (
          'useTabs' => false,
        ),
      ),
    ),
  ),
);
