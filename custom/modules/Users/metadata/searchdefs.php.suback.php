<?php
$searchdefs['Users'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'search_name' => 
      array (
        'name' => 'search_name',
        'label' => 'LBL_NAME',
        'type' => 'name',
        'default' => true,
      ),
    ),
    'advanced_search' => 
    array (
      'first_name' => 
      array (
        'name' => 'first_name',
        'default' => true,
        'width' => '10',
      ),
      'last_name' => 
      array (
        'name' => 'last_name',
        'default' => true,
        'width' => '10',
      ),
      'user_name' => 
      array (
        'name' => 'user_name',
        'default' => true,
        'width' => '10',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10',
      ),
      'is_admin' => 
      array (
        'name' => 'is_admin',
        'default' => true,
        'width' => '10',
      ),
      'puestousuario_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_PUESTOUSUARIO',
        'width' => '10',
        'name' => 'puestousuario_c',
      ),
      'subpuesto_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_SUBPUESTO',
        'width' => '10',
        'name' => 'subpuesto_c',
      ),
      'title' => 
      array (
        'name' => 'title',
        'default' => true,
        'width' => '10',
      ),
      'is_group' => 
      array (
        'name' => 'is_group',
        'default' => true,
        'width' => '10',
      ),
      'department' => 
      array (
        'name' => 'department',
        'default' => true,
        'width' => '10',
      ),
      'phone' => 
      array (
        'name' => 'phone',
        'label' => 'LBL_ANY_PHONE',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'address_street' => 
      array (
        'name' => 'address_street',
        'label' => 'LBL_ANY_ADDRESS',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'email' => 
      array (
        'name' => 'email',
        'label' => 'LBL_ANY_EMAIL',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'address_city' => 
      array (
        'name' => 'address_city',
        'label' => 'LBL_CITY',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'address_state' => 
      array (
        'name' => 'address_state',
        'label' => 'LBL_STATE',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'address_postalcode' => 
      array (
        'name' => 'address_postalcode',
        'label' => 'LBL_POSTAL_CODE',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'address_country' => 
      array (
        'name' => 'address_country',
        'label' => 'LBL_COUNTRY',
        'type' => 'name',
        'default' => true,
        'width' => '10',
      ),
      'cac_c' => 
      array (
        'readonly' => false,
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_CAC',
        'width' => 10,
        'name' => 'cac_c',
      ),
      'posicion_operativa_c' => 
      array (
        'readonly' => false,
        'type' => 'multienum',
        'default' => true,
        'label' => 'LBL_POSICION_OPERATIVA',
        'width' => 10,
        'name' => 'posicion_operativa_c',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
