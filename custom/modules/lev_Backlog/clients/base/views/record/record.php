<?php
$viewdefs['lev_Backlog'] = 
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
                'name' => 'producto_c',
                'label' => 'LBL_PRODUCTO_C',
              ),
              1 => 
              array (
                'name' => 'numero_de_backlog',
                'label' => 'LBL_NUMERO_DE_BACKLOG',
              ),
              2 => 
              array (
                'name' => 'num_tipo_op_leasing_c',
                'label' => 'LBL_NUM_TIPO_OP_LEASING',
              ),
              3 => 
              array (
                'name' => 'num_tipo_op_credito_c',
                'label' => 'LBL_NUM_TIPO_OP_CREDITO',
              ),
              4 => 
              array (
                'name' => 'anio',
                'studio' => 'visible',
                'label' => 'LBL_ANIO',
              ),
              5 => 
              array (
                'name' => 'mes',
                'studio' => 'visible',
                'label' => 'LBL_MES',
              ),
              6 => 
              array (
                'name' => 'cliente',
                'studio' => 'visible',
                'label' => 'LBL_CLIENTE',
              ),
              7 => 
              array (
                'name' => 'tipo_c',
                'label' => 'LBL_TIPO_C',
              ),
              8 => 'assigned_user_name',
              9 => 
              array (
                'name' => 'equipo',
                'studio' => 'visible',
                'label' => 'LBL_EQUIPO',
              ),
              10 => 
              array (
                'name' => 'tipo_operacion_c',
                'label' => 'LBL_TIPO_OPERACION_C',
              ),
              11 => 
              array (
                'name' => 'estatus_operacion_c',
                'label' => 'LBL_ESTATUS_OPERACION_C',
              ),
              12 => 
              array (
              ),
              13 => 
              array (
                'readonly' => false,
                'name' => 'refinanciamiento_c',
                'label' => 'LBL_REFINANCIAMIENTO',
              ),
              14 => 
              array (
                'name' => 'region',
                'studio' => 'visible',
                'label' => 'LBL_REGION',
              ),
              15 => 
              array (
              ),
              16 => 
              array (
                'name' => 'activo',
                'label' => 'LBL_ACTIVO',
              ),
              17 => 
              array (
              ),
              18 => 
              array (
                'name' => 'dif_residuales_c',
                'label' => 'LBL_DIF_RESIDUALES',
              ),
              19 => 
              array (
              ),
              20 => 
              array (
                'name' => 'tasa_c',
                'label' => 'LBL_TASA',
              ),
              21 => 
              array (
                'name' => 'comision_c',
                'label' => 'LBL_COMISION',
              ),
              22 => 
              array (
                'name' => 'monto_original',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_MONTO_ORIGINAL',
                'readonly' => true,
              ),
              23 => 
              array (
                'name' => 'tct_conversion_c',
                'label' => 'LBL_TCT_CONVERSION',
              ),
              24 => 
              array (
                'name' => 'monto_comprometido',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_MONTO_COMPROMETIDO',
              ),
              25 => 
              array (
              ),
              26 => 
              array (
                'name' => 'porciento_ri',
                'label' => 'LBL_PORCIENTO_RI',
              ),
              27 => 
              array (
                'name' => 'renta_inicial_comprometida',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_RENTA_INICIAL_COMPROMETIDA',
              ),
              28 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'monto_final_comprometido_c',
                'label' => 'LBL_MONTO_FINAL_COMPROMETIDO',
              ),
              29 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'ri_final_comprometida_c',
                'label' => 'LBL_RI_FINAL_COMPROMETIDA',
              ),
              30 => 
              array (
                'name' => 'monto_real_logrado',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_MONTO_REAL_LOGRADO',
              ),
              31 => 
              array (
                'name' => 'renta_inicial_real',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_RENTA_INICIAL_REAL',
              ),
              32 => 
              array (
                'name' => 'etapa_c',
                'label' => 'LBL_ETAPA_C',
              ),
              33 => 
              array (
                'name' => 'etapa_preliminar_c',
                'label' => 'LBL_ETAPA_PRELIMINAR_C',
              ),
              34 => 
              array (
                'name' => 'motivo_cancelacion_c',
                'label' => 'LBL_MOTIVO_CANCELACION_C',
                'span' => 12,
              ),
              35 => 
              array (
                'name' => 'tct_competencia_quien_txf_c',
                'label' => 'LBL_TCT_COMPETENCIA_QUIEN_TXF',
              ),
              36 => 
              array (
              ),
              37 => 
              array (
                'name' => 'tct_que_producto_txf_c',
                'label' => 'LBL_TCT_QUE_PRODUCTO_TXF',
              ),
              38 => 
              array (
              ),
              39 => 
              array (
                'name' => 'monto_comprometido_cancelado',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_MONTO_COMPROMETIDO_CANCELADO',
              ),
              40 => 
              array (
                'name' => 'renta_inicialcomp_can',
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'label' => 'LBL_RENTA_INICIALCOMP_CAN',
              ),
              41 => 
              array (
                'name' => 'description',
                'span' => 12,
              ),
              42 => 
              array (
                'name' => 'progreso',
                'studio' => 'visible',
                'label' => 'LBL_PROGRESO',
                'span' => 12,
              ),
              43 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'monto_prospecto_c',
                'label' => 'LBL_MONTO_PROSPECTO_C',
              ),
              44 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'ri_prospecto_c',
                'label' => 'LBL_RI_PROSPECTO_C',
              ),
              45 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'readonly' => false,
                'name' => 'monto_devuelta_c',
                'label' => 'LBL_MONTO_DEVUELTA',
              ),
              46 => 
              array (
              ),
              47 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'monto_credito_c',
                'label' => 'LBL_MONTO_CREDITO_C',
              ),
              48 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'ri_credito_c',
                'label' => 'LBL_RI_CREDITO_C',
              ),
              49 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'monto_rechazado_c',
                'label' => 'LBL_MONTO_RECHAZADO_C',
              ),
              50 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'ri_rechazada_c',
                'label' => 'LBL_RI_RECHAZADA_C',
              ),
              51 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'monto_sin_solicitud_c',
                'label' => 'LBL_MONTO_SIN_SOLICITUD_C',
              ),
              52 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'ri_sin_solicitud_c',
                'label' => 'LBL_RI_SIN_SOLICITUD_C',
              ),
              53 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'monto_con_solicitud_c',
                'label' => 'LBL_MONTO_CON_SOLICITUD_C',
              ),
              54 => 
              array (
                'related_fields' => 
                array (
                  0 => 'currency_id',
                  1 => 'base_rate',
                ),
                'name' => 'ri_con_solicitud_c',
                'label' => 'LBL_RI_CON_SOLICITUD_C',
              ),
              55 => 
              array (
                'name' => 'date_entered_by',
                'readonly' => true,
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
              56 => 
              array (
                'name' => 'date_modified_by',
                'readonly' => true,
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
              ),
              57 => 
              array (
                'name' => 'tag',
                'span' => 12,
              ),
              58 => 
              array (
                'name' => 'tct_carga_masiva_chk_c',
                'label' => 'LBL_TCT_CARGA_MASIVA_CHK',
              ),
              59 => 
              array (
                'name' => 'tct_bloqueo_txf_c',
                'label' => 'LBL_TCT_BLOQUEO_TXF',
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
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'comentarios_c',
                'studio' => 'visible',
                'label' => 'LBL_COMENTARIOS',
              ),
              1 => 
              array (
                'name' => 'bl_estimado_c',
                'label' => 'LBL_BL_ESTIMADO',
              ),
              2 => 
              array (
                'name' => 'tipo_bl_c',
                'label' => 'LBL_TIPO_BL',
              ),
              3 => 
              array (
                'name' => 'rango_bl_c',
                'label' => 'LBL_RANGO_BL',
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
