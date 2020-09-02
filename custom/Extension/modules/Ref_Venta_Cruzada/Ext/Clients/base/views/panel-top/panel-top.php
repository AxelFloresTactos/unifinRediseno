<?php
/**
 * Created by Tactos.
 * User: EJC
 */
$viewdefs['Ref_Venta_Cruzada']['base']['view']['panel-top']['buttons'] = array(
    array(
        'type' => 'actiondropdown',
        'name' => 'panel_dropdown',
        'css_class' => 'pull-right',
        'buttons' => array(
            array(
				'type' => 'sticky-rowaction',
				'icon' => 'fa-plus',
				'name' => 'create_button',
				'label' => ' ',
				'acl_action' => 'create',
				'tooltip' => 'LBL_CREATE_BUTTON_LABEL',
            ),
        ),
    ),
); 
