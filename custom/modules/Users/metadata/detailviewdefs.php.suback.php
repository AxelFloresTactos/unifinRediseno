<?php
$viewdefs['Users'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'form' => 
      array (
        'headerTpl' => 'modules/Users/tpls/DetailViewHeader.tpl',
        'footerTpl' => 'modules/Users/tpls/DetailViewFooter.tpl',
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_USER_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'LBL_USER_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 'full_name',
          1 => 'picture',
        ),
        1 => 
        array (
          0 => 'user_name',
          1 => 'status',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'iniciales_c',
            'label' => 'LBL_INICIALES',
          ),
        ),
        3 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'UserType',
            'customCode' => '{$USER_TYPE_READONLY}',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'fecha_baja_c',
            'label' => 'LBL_FECHA_BAJA',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'obj_objetivos_users_name',
            'label' => 'LBL_OBJ_OBJETIVOS_USERS_FROM_OBJ_OBJETIVOS_TITLE',
          ),
        ),
      ),
      'lbl_detailview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'ext_c',
            'label' => 'LBL_EXT',
          ),
          1 => 'phone_mobile',
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'puestousuario_c',
            'studio' => 'visible',
            'label' => 'LBL_PUESTOUSUARIO',
          ),
          1 => 'reports_to_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'subpuesto_c',
            'label' => 'LBL_SUBPUESTO',
          ),
          1 => 
          array (
            'name' => 'no_empleado_c',
            'label' => 'LBL_NO_EMPLEADO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'region_c',
            'label' => 'LBL_REGION',
          ),
          1 => 
          array (
            'name' => 'tct_team_address_txf_c',
            'label' => 'LBL_TCT_TEAM_ADDRESS_TXF_C',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'equipo_c',
            'studio' => 'visible',
            'label' => 'LBL_EQUIPO',
          ),
          1 => 
          array (
            'name' => 'equipos_c',
            'studio' => 'visible',
            'label' => 'LBL_EQUIPOS_C',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'tipodeproducto_c',
            'studio' => 'visible',
            'label' => 'LBL_TIPODEPRODUCTO',
          ),
          1 => 
          array (
            'name' => 'productos_c',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCTOS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'tct_id_uni2_txf_c',
            'label' => 'LBL_TCT_ID_UNI2_TXF',
          ),
          1 => 
          array (
            'name' => 'tct_id_unics_txf_c',
            'label' => 'LBL_TCT_ID_UNICS_TXF',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'id_active_directory_c',
            'label' => 'LBL_ID_ACTIVE_DIRECTORY_C',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'tct_altaproveedor_chk_c',
            'label' => 'LBL_TCT_ALTAPROVEEDOR_CHK',
          ),
          1 => 
          array (
            'name' => 'tct_alta_clientes_chk_c',
            'label' => 'LBL_TCT_ALTA_CLIENTES_CHK',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'tct_alta_cd_chk_c',
            'label' => 'LBL_TCT_ALTA_CD_CHK_C',
          ),
          1 => 
          array (
            'name' => 'cac_c',
            'label' => 'LBL_CAC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'optout_c',
            'label' => 'LBL_OPTOUT',
          ),
          1 => 
          array (
            'name' => 'aut_caratulariesgo_c',
            'label' => 'LBL_AUT_CARATULARIESGO',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tct_propietario_real_chk_c',
            'label' => 'LBL_TCT_PROPIETARIO_REAL_CHK',
          ),
          1 => 
          array (
            'name' => 'tct_vetar_usuarios_chk_c',
            'label' => 'LBL_TCT_VETAR_USUARIOS_CHK_C',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'tct_alta_credito_simple_chk_c',
            'label' => 'LBL_TCT_ALTA_CREDITO_SIMPLE_CHK',
          ),
          1 => 
          array (
            'name' => 'deudor_factoraje_c',
            'label' => 'LBL_DEUDOR_FACTORAJE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'agente_telefonico_c',
            'label' => 'LBL_AGENTE_TELEFONICO',
          ),
          1 => 
          array (
            'name' => 'depurar_leads_c',
            'label' => 'LBL_DEPURAR_LEADS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'cuenta_especial_c',
            'label' => 'LBL_CUENTA_ESPECIAL',
          ),
          1 => 
          array (
            'name' => 'responsable_oficina_chk_c',
            'label' => 'LBL_RESPONSABLE_OFICINA_CHK',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'notifica_fiscal_c',
            'label' => 'LBL_NOTIFICA_FISCAL',
          ),
          1 => 
          array (
            'name' => 'admin_cartera_c',
            'label' => 'LBL_ADMIN_CARTERA_C',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'excluir_precalifica_c',
            'label' => 'LBL_EXCLUIR_PRECALIFICA',
          ),
          1 => 
          array (
            'name' => 'license_type',
            'customCode' => '{$LICENSE_TYPE_READONLY}',
          ),
        ),
        9 => 
        array (
          0 => 'business_center_name',
          1 => 
          array (
            'name' => 'multilinea_c',
            'label' => 'LBL_MULTILINEA_C',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'reset_leadcancel_c',
            'label' => 'LBL_RESET_LEADCANCEL_C',
          ),
          1 => 
          array (
            'name' => 'valida_vta_cruzada_c',
            'label' => 'LBL_VALIDA_VTA_CRUZADA',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'tct_cancelar_ref_cruzada_chk_c',
            'label' => 'LBL_TCT_CANCELAR_REF_CRUZADA_CHK',
          ),
          1 => 
          array (
            'name' => 'tct_no_contactar_chk_c',
            'label' => 'LBL_TCT_NO_CONTACTAR_CHK',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'bloqueo_credito_c',
            'label' => 'LBL_BLOQUEO_CREDITO_C',
          ),
          1 => 
          array (
            'name' => 'bloqueo_cumple_c',
            'label' => 'LBL_BLOQUEO_CUMPLE_C',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'bloqueo_cuentas_c',
            'label' => 'LBL_BLOQUEO_CUENTAS',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'portal_proveedores_c',
            'label' => 'LBL_PORTAL_PROVEEDORES',
          ),
          1 => 
          array (
            'name' => 'editar_backlog_chk_c',
            'label' => 'LBL_EDITAR_BACKLOG_CHK',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'admin_backlog_c',
            'label' => 'LBL_ADMIN_BACKLOG',
          ),
          1 => '',
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'excluye_valida_c',
            'label' => 'LBL_EXCLUYE_VALIDA',
          ),
          1 => 
          array (
            'readonly' => false,
            'name' => 'lenia_c',
            'label' => 'LBL_LENIA',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'habilita_envio_tc_c',
            'label' => 'LBL_HABILITA_ENVIO_TC',
          ),
          1 => '',
        ),
        18 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'admin_seguros_c',
            'label' => 'LBL_ADMIN_SEGUROS',
          ),
          1 => 
          array (
            'readonly' => false,
            'name' => 'seguimiento_seguros_c',
            'label' => 'LBL_SEGUIMIENTO_SEGUROS',
          ),
        ),
        19 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'reasignacion_po_c',
            'label' => 'LBL_REASIGNACION_PO',
          ),
          1 => 
          array (
            'readonly' => false,
            'name' => 'asignacion_po_c',
            'label' => 'LBL_ASIGNACION_PO',
          ),
        ),
        20 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'cancelar_casos_c',
            'label' => 'LBL_CANCELAR_CASOS',
          ),
          1 => 
          array (
            'readonly' => false,
            'name' => 'seguimiento_bc_c',
            'label' => 'LBL_SEGUIMIENTO_BC',
          ),
        ),
      ),
      'lbl_detailview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'vacaciones_inicio_c',
            'label' => 'LBL_VACACIONES_INICIO',
          ),
          1 => 
          array (
            'readonly' => false,
            'name' => 'vacaciones_fin_c',
            'label' => 'LBL_VACACIONES_FIN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'readonly' => false,
            'name' => 'vacaciones_detalle_c',
            'studio' => 'visible',
            'label' => 'LBL_VACACIONES_DETALLE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
