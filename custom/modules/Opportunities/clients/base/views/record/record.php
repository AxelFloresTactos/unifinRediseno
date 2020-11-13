<?php
// created: 2020-10-12 12:18:14
$viewdefs['Opportunities']['base']['view']['record'] = array (
  'buttons' => 
  array (
    0 => 
    array (
      'type' => 'button',
      'name' => 'vobo_leasing',
      'label' => 'Vo.Bo.',
      'css_class' => 'btn-success hidden',
      'showOn' => 'view',
      'events' => 
      array (
        'click' => 'button:btn_auth_button:click',
      ),
    ),
    1 => 
    array (
      'type' => 'button',
      'name' => 'rechazo_leasing',
      'label' => 'Rechazar',
      'css_class' => 'btn-danger hidden',
      'showOn' => 'view',
      'events' => 
      array (
        'click' => 'button:btn_noauth_button:click',
      ),
    ),
    2 => 
    array (
      'type' => 'button',
      'name' => 'cancel_button',
      'label' => 'LBL_CANCEL_BUTTON_LABEL',
      'css_class' => 'btn-invisible btn-link',
      'showOn' => 'edit',
    ),
    3 => 
    array (
      'type' => 'rowaction',
      'event' => 'button:save_button:click',
      'name' => 'save_button',
      'label' => 'LBL_SAVE_BUTTON_LABEL',
      'css_class' => 'btn btn-primary',
      'showOn' => 'edit',
      'acl_action' => 'edit',
    ),
    4 => 
    array (
      'type' => 'actiondropdown',
      'name' => 'main_dropdown',
      'primary' => true,
      'showOn' => 'view',
      'css_class' => 'noEdit',
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
          'type' => 'divider',
        ),
        3 => 
        array (
          'type' => 'rowaction',
          'event' => 'button:historical_summary_button:click',
          'name' => 'historical_summary_button',
          'label' => 'LBL_HISTORICAL_SUMMARY',
          'acl_action' => 'view',
        ),
        4 => 
        array (
          'type' => 'rowaction',
          'event' => 'button:audit_button:click',
          'name' => 'audit_button',
          'label' => 'LNK_VIEW_CHANGE_LOG',
          'acl_action' => 'view',
        ),
        5 => 
        array (
          'type' => 'divider',
        ),
        6 => 
        array (
          'type' => 'rowaction',
          'event' => 'button:expediente_button:click',
          'name' => 'expediente',
          'label' => 'Expediente',
          'acl_action' => 'view',
        ),
        7 => 
        array (
          'type' => 'rowaction',
          'event' => 'button:sobregiro:click',
          'name' => 'solicita_sobregiro',
          'label' => 'Solicitar Sobregiro',
          'acl_action' => 'view',
        ),
        9 => 
        array (
          'type' => 'rowaction',
          'event' => 'button:expediente_credito_button:click',
          'name' => 'expediente_credito',
          'label' => 'Expediente de Credito',
          'acl_action' => 'view',
        ),
        10 => 
        array (
          'type' => 'pdfaction',
          'name' => 'download-pdf',
          'label' => 'LBL_PDF_VIEW',
          'action' => 'download',
          'acl_action' => 'view',
        ),
        11 => 
        array (
          'type' => 'rowaction',
          'event' => 'button:votacion_comite_button:click',
          'name' => 'votacion_comite',
          'label' => 'Votacion Comite',
          'acl_action' => 'view',
        ),
      ),
    ),
    5 => 
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
      'header' => true,
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'picture',
          'type' => 'avatar',
          'size' => 'large',
          'dismiss_label' => true,
          'readonly' => true,
        ),
        1 => 
        array (
          'name' => 'name',
          'related_fields' => 
          array (
            0 => 'total_revenue_line_items',
            1 => 'closed_revenue_line_items',
            2 => 'included_revenue_line_items',
          ),
        ),
        2 => 
        array (
          'name' => 'favorite',
          'label' => 'LBL_FAVORITE',
          'type' => 'favorite',
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
        4 => 
        array (
          'name' => 'renewal',
          'type' => 'renewal',
          'dismiss_label' => true,
        ),
      ),
    ),
    1 => 
    array (
      'name' => 'panel_body',
      'label' => 'LBL_RECORD_BODY',
      'columns' => 2,
      'labels' => true,
      'labelsOnTop' => true,
      'placeholders' => true,
      'newTab' => true,
      'panelDefault' => 'expanded',
      'fields' => 
      array (
        0 => 
        array (
          'name' => 'pipeline_opp',
          'studio' => 'visible',
          'label' => 'LBL_PIPELINE_OPP',
          'span' => 12,
          'dismiss_label' => true,

        ),
        1 => 
        array (
          'name' => 'tct_etapa_ddw_c',
          'label' => 'LBL_TCT_ETAPA_DDW_C',
        ),
        2 => 
        array (
          'name' => 'estatus_c',
          'label' => 'LBL_ESTATUS',
        ),
        3 => 
        array (
          'name' => 'opportunities_directores',
          'label' => 'Director de la solicitud',
          'studio' => 'visible',
        ),
        4 => 
        array (
          'name' => 'vobo_dir_c',
          'label' => 'LBL_VOBO_DIR',
        ),
        5 => 
        array (
          'name' => 'vobo_descripcion_txa_c',
          'studio' => 'visible',
          'label' => 'LBL_VOBO_DESCRIPCION_TXA',
        ),
        6 => 
        array (
          'name' => 'director_notificado_c',
          'label' => 'LBL_DIRECTOR_NOTIFICADO',
        ),
        7 => 
        array (
          'name' => 'doc_scoring_chk_c',
          'label' => 'LBL_DOC_SCORING_CHK',
        ),
        8 => 
        array (
          'name' => 'bandera_excluye_chk_c',
          'label' => 'LBL_BANDERA_EXCLUYE_CHK',
        ),
        9 => 
        array (
          'name' => 'director_solicitud_c',
          'label' => 'LBL_DIRECTOR_SOLICITUD',
          'span' => 12,
        ),
        10 => 
        array (
          'name' => 'idsolicitud_c',
          'label' => 'LBL_IDSOLICITUD',
        ),
        11 => 
        array (
          'name' => 'id_process_c',
          'label' => 'LBL_ID_PROCESS',
        ),
        12 => 
        array (
          'name' => 'account_name',
          'related_fields' => 
          array (
            0 => 'account_id',
          ),
        ),
        13 => 
        array (
          'name' => 'tipo_producto_c',
          'studio' => 'visible',
          'label' => 'LBL_TIPO_PRODUCTO',
        ),
        14 => 
        array (
          'name' => 'tipo_operacion_c',
          'studio' => 'visible',
          'label' => 'LBL_TIPO_OPERACION',
        ),
        15 => 
        array (
          'name' => 'tipo_de_operacion_c',
          'studio' => 'visible',
          'label' => 'LBL_TIPO_DE_OPERACION',
        ),
        16 => 
        array (
          'name' => 'plan_financiero_c',
          'studio' => 'visible',
          'label' => 'LBL_PLAN_FINANCIERO',
        ),
        17 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        18 => 
        array (
          'name' => 'tipo_seguro_c',
          'label' => 'LBL_TIPO_SEGURO',
        ),
        19 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'accesorios_c',
          'label' => 'LBL_ACCESORIOS',
        ),
        20 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'seguro_vida_c',
          'label' => 'LBL_SEGURO_VIDA',
        ),
        21 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'seguro_desempleo_c',
          'label' => 'LBL_SEGURO_DESEMPLEO',
        ),
        22 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'monto_c',
          'label' => 'LBL_MONTO',
        ),
        23 => 
        array (
          'name' => 'amount',
          'type' => 'currency',
          'label' => 'LBL_LIKELY',
          'related_fields' => 
          array (
            0 => 'amount',
            1 => 'currency_id',
            2 => 'base_rate',
          ),
          'currency_field' => 'currency_id',
          'base_rate_field' => 'base_rate',
          'span' => 6,
        ),
        24 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'monto_gpo_emp_c',
          'label' => 'LBL_MONTO_GPO_EMP_C',
        ),
        25 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        26 => 
        array (
          'name' => 'tct_numero_vehiculos_c',
          'label' => 'LBL_TCT_NUMERO_VEHICULOS',
        ),
        27 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        28 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'ca_pago_mensual_c',
          'label' => 'LBL_CA_PAGO_MENSUAL',
        ),
        29 => 
        array (
          'name' => 'plazo_c',
          'studio' => 'visible',
          'label' => 'LBL_PLAZO',
        ),
        30 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'ca_importe_enganche_c',
          'label' => 'LBL_CA_IMPORTE_ENGANCHE',
        ),
        31 => 
        array (
          'name' => 'porciento_ri_c',
          'label' => 'LBL_PORCIENTO_RI_C',
        ),
        32 => 
        array (
          'name' => 'assigned_user_name',
        ),
        33 => 
        array (
          'name' => 'usuario_bo_c',
          'studio' => 'visible',
          'label' => 'LBL_USUARIO_BO',
        ),
        34 => 
        array (
          'name' => 'asesor_operacion_c',
          'studio' => 'visible',
          'label' => 'LBL_ASESOR_OPERACION_C',
          'readonly' => true,
          'span' => 12,
        ),
        35 => 
        array (
          'name' => 'f_tipo_factoraje_c',
          'studio' => 'visible',
          'label' => 'LBL_F_TIPO_FACTORAJE',
          'span' => 12,
        ),
        36 => 
        array (
          'name' => 'tipo_tasa_ordinario_c',
          'studio' => 'visible',
          'label' => 'LBL_TIPO_TASA_ORDINARIO',
        ),
        37 => 
        array (
          'name' => 'tasa_fija_ordinario_c',
          'label' => 'LBL_TASA_FIJA_ORDINARIO',
        ),
        38 => 
        array (
          'name' => 'instrumento_c',
          'studio' => 'visible',
          'label' => 'LBL_INSTRUMENTO',
        ),
        39 => 
        array (
          'name' => 'puntos_sobre_tasa_c',
          'label' => 'LBL_PUNTOS_SOBRE_TASA',
        ),
        40 => 
        array (
          'name' => 'porcentaje_ca_c',
          'label' => 'LBL_PORCENTAJE_CA',
        ),
        41 => 
        array (
          'name' => 'f_aforo_c',
          'label' => 'LBL_F_AFORO',
        ),
        42 => 
        array (
          'name' => 'tipo_tasa_moratorio_c',
          'studio' => 'visible',
          'label' => 'LBL_TIPO_TASA_MORATORIO',
        ),
        43 => 
        array (
          'name' => 'tasa_fija_moratorio_c',
          'label' => 'LBL_TASA_FIJA_MORATORIO',
        ),
        44 => 
        array (
          'name' => 'instrumento_moratorio_c',
          'studio' => 'visible',
          'label' => 'LBL_INSTRUMENTO_MORATORIO',
        ),
        45 => 
        array (
          'name' => 'puntos_tasa_moratorio_c',
          'label' => 'LBL_PUNTOS_TASA_MORATORIO',
        ),
        46 => 
        array (
          'name' => 'factor_moratorio_c',
          'label' => 'LBL_FACTOR_MORATORIO',
        ),
        47 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        48 => 
        array (
          'name' => 'cartera_descontar_c',
          'studio' => 'visible',
          'label' => 'LBL_CARTERA_DESCONTAR_C',
          'span' => 12,
        ),
        49 => 
        array (
          'name' => 'comision_c',
          'label' => 'LBL_COMISION',
        ),
        50 => 
        array (
          'name' => 'opportunities_ag_vendedores_1_name',
        ),
        51 => 
        array (
          'name' => 'condiciones_financieras',
          'studio' => 'visible',
          'label' => 'LBL_CONDICIONES_FINANCIERAS',
          'span' => 12,
        ),
        52 => 
        array (
          'name' => 'ratificacion_incremento_c',
          'label' => 'LBL_RATIFICACION_INCREMENTO',
        ),
        53 => 
        array (
          'name' => 'ri_usuario_bo_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_USUARIO_BO',
        ),
        54 => 
        array (
          'name' => 'ri_anio_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_ANIO_C',
        ),
        55 => 
        array (
          'name' => 'ri_mes_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_MES_C',
        ),
        56 => 
        array (
          'related_fields' => 
          array (
            0 => 'currency_id',
            1 => 'base_rate',
          ),
          'name' => 'monto_ratificacion_increment_c',
          'label' => 'LBL_MONTO_RATIFICACION_INCREMENT',
        ),
        57 => 
        array (
          'name' => 'plazo_ratificado_incremento_c',
          'studio' => 'visible',
          'label' => 'LBL_PLAZO_RATIFICADO_INCREMENTO',
        ),
        58 => 
        array (
          'name' => 'condiciones_financieras_incremento_ratificacion',
          'studio' => 'visible',
          'label' => 'LBL_CONDICIONES_FINANCIERAS_INCREMENTO_RATIFICACION',
          'span' => 12,
        ),
        59 => 
        array (
          'name' => 'ri_porcentaje_ca_c',
          'label' => 'LBL_RI_PORCENTAJE_CA',
        ),
        60 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        61 => 
        array (
          'name' => 'ri_tipo_tasa_ordinario_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_TIPO_TASA_ORDINARIO',
        ),
        62 => 
        array (
          'name' => 'ri_tasa_fija_ordinario_c',
          'label' => 'LBL_RI_TASA_FIJA_ORDINARIO',
        ),
        63 => 
        array (
          'name' => 'ri_instrumento_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_INSTRUMENTO',
        ),
        64 => 
        array (
          'name' => 'ri_puntos_sobre_tasa_c',
          'label' => 'LBL_RI_PUNTOS_SOBRE_TASA',
        ),
        65 => 
        array (
          'name' => 'ri_tipo_tasa_moratorio_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_TIPO_TASA_MORATORIO',
        ),
        66 => 
        array (
          'name' => 'ri_tasa_fija_moratorio_c',
          'label' => 'LBL_RI_TASA_FIJA_MORATORIO',
        ),
        67 => 
        array (
          'name' => 'ri_instrumento_moratorio_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_INSTRUMENTO_MORATORIO',
        ),
        68 => 
        array (
          'name' => 'ri_puntos_tasa_moratorio_c',
          'label' => 'LBL_RI_PUNTOS_TASA_MORATORIO',
        ),
        69 => 
        array (
          'name' => 'ri_factor_moratorio_c',
          'label' => 'LBL_RI_FACTOR_MORATORIO',
        ),
        70 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        71 => 
        array (
          'name' => 'ri_cartera_descontar_c',
          'studio' => 'visible',
          'label' => 'LBL_RI_CARTERA_DESCONTAR',
          'span' => 12,
        ),
        72 => 
        array (
          'name' => 'referenciada_c',
          'label' => 'LBL_REFERENCIADA_C',
        ),
        73 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        74 => 
        array (
          'name' => 'referenciador_c',
          'studio' => 'visible',
          'label' => 'LBL_REFERENCIADOR_C',
        ),
        75 => 
        array (
          'name' => 'comision_referenciador_c',
          'label' => 'LBL_COMISION_REFERENCIADOR_C',
        ),
        76 => 
        array (
          'name' => 'vendedor_c',
          'label' => 'LBL_VENDEDOR_C',
        ),
        77 => 
        array (
          'name' => 'pago_referenciador_c',
          'studio' => 'visible',
          'label' => 'LBL_PAGO_REFERENCIADOR_C',
        ),
        78 => 
        array (
          'name' => 'seguro_contado_c',
          'label' => 'LBL_SEGURO_CONTADO_C',
        ),
        79 => 
        array (
          'name' => 'seguro_financiado_c',
          'label' => 'LBL_SEGURO_FINANCIADO_C',
        ),
        80 => 
        array (
          'name' => 'garantia_adicional_c',
          'label' => 'LBL_GARANTIA_ADICIONAL_C',
        ),
        81 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        82 => 
        array (
          'name' => 'descripcion_garantia_adicion_c',
          'studio' => 'visible',
          'label' => 'LBL_DESCRIPCION_GARANTIA_ADICION',
          'span' => 12,
        ),
        83 => 
        array (
          'name' => 'f_comentarios_generales_c',
          'studio' => 'visible',
          'label' => 'LBL_F_COMENTARIOS_GENERALES',
          'span' => 12,
        ),
        84 => 
        array (
          'name' => 'ult_operacion_activa_c',
          'label' => 'LBL_ULT_OPERACION_ACTIVA',
        ),
        85 => 
        array (
          'name' => 'operacion_curso_chk_c',
          'label' => 'LBL_OPERACION_CURSO_CHK',
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
          'name' => 'tct_oportunidad_perdida_chk_c',
          'label' => 'LBL_TCT_OPORTUNIDAD_PERDIDA_CHK',
        ),
        1 => 
        array (
          'name' => 'tct_razon_op_perdida_ddw_c',
          'label' => 'LBL_TCT_RAZON_OP_PERDIDA_DDW',
        ),
        2 => 
        array (
          'name' => 'tct_competencia_quien_txf_c',
          'label' => 'LBL_TCT_COMPETENCIA_QUIEN_TXF',
        ),
        3 => 
        array (
          'name' => 'tct_competencia_porque_txf_c',
          'label' => 'LBL_TCT_COMPETENCIA_PORQUE_TXF',
        ),
        4 => 
        array (
          'name' => 'tct_sin_prod_financiero_ddw_c',
          'label' => 'LBL_TCT_SIN_PROD_FINANCIERO_DDW',
        ),
        5 => 
        array (
        ),
        6 => 'renewal_parent_name',
      ),
    ),
    3 => 
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
          'name' => 'area_benef_c',
          'label' => 'LBL_AREA_BENEF_C',
          'studio' => 'visible',
        ),
        1 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        2 => 
        array (
          'name' => 'estado_benef_c',
          'label' => 'LBL_ESTADO_BENEF_C',
        ),
        3 => 
        array (
          'name' => 'municipio_benef_c',
          'label' => 'LBL_MUNICIPIO_BENEF_C',
        ),
        4 => 
        array (
          'name' => 'ent_gob_benef_c',
          'label' => 'LBL_ENT_GOB_BENEF_C',
        ),
        5 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        6 => 
        array (
          'name' => 'cuenta_benef_c',
          'studio' => 'visible',
          'label' => 'LBL_CUENTA_BENEF_C',
        ),
        7 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        8 => 
        array (
          'name' => 'emp_no_reg_benef_c',
          'label' => 'LBL_EMP_NO_REG_BENEF_C',
        ),
        9 => 
        array (
        ),
      ),
    ),
    4 => 
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
          'name' => 'subyacente_c',
          'label' => 'LBL_SUBYACENTE_C',
        ),
        1 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        2 => 
        array (
          'name' => 'estado_suby_c',
          'label' => 'LBL_ESTADO_SUBY_C',
        ),
        3 => 
        array (
          'name' => 'municipio_suby_c',
          'label' => 'LBL_MUNICIPIO_SUBY_C',
        ),
        4 => 
        array (
          'name' => 'ent_gob_suby_c',
          'label' => 'LBL_ENT_GOB_SUBY_C',
        ),
        5 => 
        array (
            'name' => 'blank_space',
            'label' => 'LBL_BLANK_SPACE',
        ),
        6 => 
        array (
          'name' => 'otro_suby_c',
          'studio' => 'visible',
          'label' => 'LBL_OTRO_SUBY_C',
        ),
        7 => 
        array (
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'useTabs' => true,
  ),
);