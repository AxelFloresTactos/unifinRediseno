<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 7/17/2015
 * Time: 6:03 PM
 */

$viewdefs['base']['view']['Reasignacion_publico_objetivo'] = array(
    'panels' => array(
        array(
            'fields' => array(
                array(
                    'name' => 'users_accounts_1_name',
                    'label' => 'Asesor Actual',
                    'type' => 'relate',
                    'view' => 'edit',
                ),
            ),
        ),
    ),
    'panelsTo' => array(
    array(
        'fields' => array(
            array(
                'name' => 'asignar_a_promotor',
                'label' => 'Reasignar a: ',
                'type' => 'relate',
                'view' => 'edit',
            ),
        ),
    ),
)
);