<?php
$module_name = 'minut_Minutas';
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
            'label' => 'Finalizar Reunión',
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
              1 => 
              array (
                'name' => 'name',
                'readonly' => true,
              ),
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
              4 => 
              array (
                'name' => 'counter_minuta',
                'studio' => 'visible',
                'label' => ' ',
                'span' => 12,
              ),
            ),
          ),
          1 => 
          array (
            'newTab' => true,
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
                'name' => 'tct_relacionado_con_c',
                'studio' => 'visible',
                'label' => 'LBL_TCT_RELACIONADO_CON_C',
                'readonly' => true,
              ),
              1 => 
              array (
                'name' => 'minut_minutas_meetings_name',
                'studio' => 'visible',
                'label' => 'LBL_MINUT_MINUTAS_MEETINGS_FROM_MEETINGS_TITLE',
                'readonly' => true,
              ),
            ),
          ),
          2 => 
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
                'name' => 'minuta_participantes',
                'studio' => 'visible',
                'label' => 'minuta_participantes',
                'span' => 12,
              ),
            ),
          ),
          3 => 
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
                'name' => 'minuta_objetivos',
                'studio' => 'visible',
                'label' => 'minuta_objetivos',
                'span' => 12,
              ),
            ),
          ),
          4 => 
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
                'name' => 'tct_comments_rel_txa_c',
                'studio' => 'visible',
                'label' => 'LBL_TCT_COMMENTS_REL_TXA',
                'span' => 12,
              ),
              1 => 
              array (
                'name' => 'tct_cliente_no_interesado_chk',
                'label' => 'LBL_TCT_CLIENTE_NO_INTERESADO_CHK',
              ),
              2 => 
              array (
                'name' => 'tct_motivo_c',
                'label' => 'LBL_TCT_MOTIVO_C',
              ),
              3 => 
              array (
                'name' => 'assigned_user_name',
                'label' => 'LBL_ASSIGNED_TO',
                'readonly' => true,
              ),
              4 => 
              array (
              ),
              5 => 
              array (
                'name' => 'objetivo_c',
                'label' => 'LBL_OBJETIVO_C',
                'readonly' => true,
              ),
              6 => 
              array (
                'name' => 'resultado_c',
                'label' => 'LBL_RESULTADO_C',
              ),
            ),
          ),
          5 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL8',
            'label' => 'LBL_RECORDVIEW_PANEL8',
            'columns' => 2,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'minuta_lead_management_lead',
                'studio' => 'visible',
                'label' => 'minuta_lead_management_lead',
                'dismiss_label' => true,
                'span' => 12,
              ),
            ),
          ),
          6 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL7',
            'label' => 'LBL_RECORDVIEW_PANEL7',
            'columns' => 2,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'minuta_lead_management',
                'studio' => 'visible',
                'label' => 'minuta_lead_management',
                'dismiss_label' => true,
                'span' => 12,
              ),
            ),
          ),
          7 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL5',
            'label' => 'LBL_RECORDVIEW_PANEL5',
            'columns' => 2,
            'labelsOnTop' => 1,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'minuta_reuniones_llamadas',
                'studio' => 'visible',
                'label' => 'minuta_reuniones_llamadas',
                'span' => 12,
              ),
            ),
          ),
          8 => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
            'name' => 'LBL_RECORDVIEW_PANEL4',
            'label' => 'LBL_RECORDVIEW_PANEL4',
            'columns' => 2,
            'labelsOnTop' => 1,
            'placeholders' => 1,
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'tct_proceso_unifin_platfom_c',
                'label' => 'LBL_TCT_PROCESO_UNIFIN_PLATFOM_C',
              ),
              1 => 
              array (
                'name' => 'tct_proceso_unifin_time_c',
                'label' => 'LBL_TCT_PROCESO_UNIFIN_TIME',
              ),
              2 => 
              array (
                'name' => 'tct_proceso_unifin_address_c',
                'label' => 'LBL_TCT_PROCESO_UNIFIN_ADDRESS',
              ),
              3 => 
              array (
                'name' => 'documentos_c',
                'label' => 'LBL_DOCUMENTOS',
              ),
            ),
          ),
        ),
        'templateMeta' => 
        array (
          'useTabs' => true,
        ),
      ),
    ),
  ),
);
