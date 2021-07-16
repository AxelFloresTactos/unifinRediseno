<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 7/20/2015
 * Time: 4:00 PM
 */

require_once("custom/Levementum/DropdownValuesHelper.php");
require_once("custom/Levementum/UnifinAPI.php");
require_once('config_override.php');

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class reAsignarCuentas extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'POSTreAsignarCuentas' => array(
                'reqType' => 'POST',
                'path' => array('reAsignarCuentas'),
                'pathVars' => array(''),
                'method' => 'asignarCuentas',
                'shortHelp' => 'Obtener cuentas de promotores',
            ),
        );
    }

    public function asignarCuentas($api, $args)
    {
	  try {
        global $db, $current_user;
        $actualizados = array();
        $no_actualizados = array();
        $reAsignado = $args['data']['reAssignado'];
        $product = $args['data']['producto_seleccionado'];
        //Eliminando saltos de línea
        $product = str_replace("\r", "", $product);
        $promoActual = $args['data']['promoActual'];
        $optRadio = $args['data']['optBl'];
        $nombreArchivo = $args['data']['nombreArchivo'];
        $statusProducto = $args['data']['status_producto'];
        $idProducto = $args['data']['producto_seleccionado_id'];

        $GLOBALS['log']->fatal("cuentas " . print_r($args['data']['seleccionados'], true));


        if ($product == "LEASING") {
            $user_field = "user_id_c"; //user_id_c = promotorleasing_c
        } else if ($product == "FACTORAJE") {
            $user_field = "user_id1_c"; //user_id1_c = promotorfactoraje_c
        } else if ($product == "CREDITO AUTOMOTRIZ") {
            $user_field = "user_id2_c"; //user_id2_c = promotorcredit_c
        } else if ($product == "FLEET") {
            $user_field = "user_id6_c";
        } else if ($product == "UNICLICK") {
            $user_field = "user_id7_c";
        } else if ($product == "UNILEASE") {
            $user_field = "user_id7_c";
        } else if ($product == "RM") {
            $user_field = "user_id8_c";
        }

        $IntValue = new DropdownValuesHelper();
        $callApi = new UnifinAPI();
        foreach ($args['data']['seleccionados'] as $key => $value) {

            $cuenta = $value;
			$account = BeanFactory::retrieveBean('Accounts', $value, array('disable_row_level_security' => true));

            if ($account == null || $user_field == null || $reAsignado == null || $promoActual == null) {

                array_push($no_actualizados, $value);

            } else {
                /****************************Re-Asigna Fecha y Re-Asigna Asesor en UNI_PRODUCTOS*****************/
                if ($account->load_relationship('accounts_uni_productos_1')) {
                    $uniProducto = $account->accounts_uni_productos_1->getBeans($account->id, array('disable_row_level_security' => true));

                    $fechaReAsignaAsesor = date("Y-m-d"); //Fecha de Hoy

                    foreach ($uniProducto as $asignaFecha) {

                        switch ($product) {
                            case 'LEASING':
                                if ($asignaFecha->tipo_producto == '1') {  //Leasing
                                    // $GLOBALS['log']->fatal("Leasing UniProductos - Reasignado");
                                    $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                                    $asignaFecha->assigned_user_id = $reAsignado;
                                    //Valida que sea 9 no viable para desmarcar los campos no Viable por producto
                                    if ($promoActual=="cc736f7a-4f5f-11e9-856a-a0481cdf89eb"){
                                        if ($asignaFecha->no_viable==1) {
                                            $asignaFecha->no_viable=0;
                                            $asignaFecha->no_viable_razon="";
                                            $asignaFecha->no_viable_razon_fp="";
                                            $asignaFecha->no_viable_quien="";
                                            $asignaFecha->no_viable_porque="";
                                            $asignaFecha->no_viable_producto="";
                                            $asignaFecha->no_viable_razon_cf="";
                                            $asignaFecha->no_viable_otro_c="";
                                            $asignaFecha->no_viable_razon_ni="";
                                            }
                                    }
                                    # estatus_atencion
                                    if ($asignaFecha->estatus_atencion == '2') {
                                        /** diferente de Activo */
#1-5 y 3 es cliente
                                        if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                            $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                            $regla2 = $this->SolicitudCredito($account->id);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 1);
                                            $GLOBALS['log']->fatal("Leasing  Reasignado Prospecto" . " " . $regla1 . " Regla2 " . $regla2 . " Regala3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }

                                        } elseif ($account->tipo_registro_cuenta_c == 3) {
                                            $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                            $regla2 = $this->getAnexos($account->idcliente_c, 1);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 1);
                                            $GLOBALS['log']->fatal("Leasing  Reasignado Cliente " . " " . $regla1 . " Regla2 " . $regla2 . "Regla 3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }
                                        }
                                    }

                                }
                                break;
                            case 'CREDITO AUTOMOTRIZ':
                                if ($asignaFecha->tipo_producto == '3') { //Credito-Automotriz
                                    // $GLOBALS['log']->fatal("Credito UniProductos - Reasignado");
                                    $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                                    $asignaFecha->assigned_user_id = $reAsignado;
                                    if ($promoActual=="cc736f7a-4f5f-11e9-856a-a0481cdf89eb"){
                                        if ($asignaFecha->no_viable==1) {
                                            $asignaFecha->no_viable=0;
                                            $asignaFecha->no_viable_razon="";
                                            $asignaFecha->no_viable_razon_fp="";
                                            $asignaFecha->no_viable_quien="";
                                            $asignaFecha->no_viable_porque="";
                                            $asignaFecha->no_viable_producto="";
                                            $asignaFecha->no_viable_razon_cf="";
                                            $asignaFecha->no_viable_otro_c="";
                                            $asignaFecha->no_viable_razon_ni="";
                                        }
                                    }

                                    if ($asignaFecha->estatus_atencion == '2') {
                                        /** diferente de Activo */
#1-5 y 3 es cliente
                                        if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                            $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                            $regla2 = $this->SolicitudCredito($account->id);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 3);
                                            $GLOBALS['log']->fatal("CA  Reasignado Prospecto" . " " . $regla1 . " Regla 2" . $regla2 . " Regla3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }

                                        } elseif ($account->tipo_registro_cuenta_c == 3) {
                                            $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                            $regla2 = $this->getAnexos($account->idcliente_c, 3);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 3);
                                            $GLOBALS['log']->fatal("CA  Reasignado Cliente " . " " . $regla1 . " Regla 2  " . $regla2 . " Regla 3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }
                                        }
                                    }
                                }
                                break;
                            case 'FACTORAJE':
                                if ($asignaFecha->tipo_producto == '4') { //Factoraje
                                    // $GLOBALS['log']->fatal("Factoraje UniProductos - Reasignado");
                                    $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                                    $asignaFecha->assigned_user_id = $reAsignado;
                                    if ($promoActual=="cc736f7a-4f5f-11e9-856a-a0481cdf89eb"){
                                        if ($asignaFecha->no_viable==1) {
                                            $asignaFecha->no_viable=0;
                                            $asignaFecha->no_viable_razon="";
                                            $asignaFecha->no_viable_razon_fp="";
                                            $asignaFecha->no_viable_quien="";
                                            $asignaFecha->no_viable_porque="";
                                            $asignaFecha->no_viable_producto="";
                                            $asignaFecha->no_viable_razon_cf="";
                                            $asignaFecha->no_viable_otro_c="";
                                            $asignaFecha->no_viable_razon_ni="";
                                        }
                                    }

                                    if ($asignaFecha->estatus_atencion == '2') {
                                        /** diferente de Activo */
#1-5 y 3 es cliente
                                        if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                            $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                            $regla2 = $this->SolicitudCredito($account->id);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 4);
                                            $GLOBALS['log']->fatal("F  Reasignado Prospecto" . " " . $regla1 . " Regla2 " . $regla2 . " Regla3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }

                                        } elseif ($account->tipo_registro_cuenta_c == 3) {
                                            $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                            $regla2 = $this->getAnexos($account->idcliente_c, 4);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 4);
                                            $GLOBALS['log']->fatal("F  Reasignado Cliente " . " " . $regla1 . " Regla2 " . $regla2 . " Regla3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }
                                        }
                                    }
                                }
                                break;
                            case 'FLEET':
                                if ($asignaFecha->tipo_producto == '6') { //Fleet
                                    // $GLOBALS['log']->fatal("Fleet UniProductos - Reasignado");
                                    $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                                    $asignaFecha->assigned_user_id = $reAsignado;
                                    if ($promoActual=="cc736f7a-4f5f-11e9-856a-a0481cdf89eb"){
                                        if ($asignaFecha->no_viable==1) {
                                            $asignaFecha->no_viable=0;
                                            $asignaFecha->no_viable_razon="";
                                            $asignaFecha->no_viable_razon_fp="";
                                            $asignaFecha->no_viable_quien="";
                                            $asignaFecha->no_viable_porque="";
                                            $asignaFecha->no_viable_producto="";
                                            $asignaFecha->no_viable_razon_cf="";
                                            $asignaFecha->no_viable_otro_c="";
                                            $asignaFecha->no_viable_razon_ni="";
                                        }
                                    }

                                    if ($asignaFecha->estatus_atencion == '2') {
                                        /** diferente de Activo */
#1-5 y 3 es cliente
                                        if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                            $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                            $regla2 = $this->SolicitudCredito($account->id);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 6);
                                            $GLOBALS['log']->fatal("Fleet  Reasignado Prospecto" . " " . $regla1 . " Regla2 " . $regla2 . " Regla3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }

                                        } elseif ($account->tipo_registro_cuenta_c == 3) {
                                            $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                            $regla2 = $this->getAnexos($account->idcliente_c, 6);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 6);
                                            $GLOBALS['log']->fatal("Fleet  Reasignado Cliente " . " " . $regla1 . " Regla2" . $regla2 . " Regla 3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }
                                        }
                                    }
                                }
                                break;
                            case 'UNICLICK':
                                if ($asignaFecha->tipo_producto == '8') { //Uniclick
                                    // $GLOBALS['log']->fatal("Uniclick UniProductos - Reasignado");
                                    $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                                    $asignaFecha->assigned_user_id = $reAsignado;
                                    if ($promoActual=="cc736f7a-4f5f-11e9-856a-a0481cdf89eb"){
                                        if ($asignaFecha->no_viable==1) {
                                            $asignaFecha->no_viable=0;
                                            $asignaFecha->no_viable_razon="";
                                            $asignaFecha->no_viable_razon_fp="";
                                            $asignaFecha->no_viable_quien="";
                                            $asignaFecha->no_viable_porque="";
                                            $asignaFecha->no_viable_producto="";
                                            $asignaFecha->no_viable_razon_cf="";
                                            $asignaFecha->no_viable_otro_c="";
                                            $asignaFecha->no_viable_razon_ni="";
                                        }
                                    }

                                    if ($asignaFecha->estatus_atencion == '2') {
                                        /** diferente de Activo */
#1-5 y 3 es cliente
                                        if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                            $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                            $regla2 = $this->SolicitudCredito($account->id);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 8);
                                            $GLOBALS['log']->fatal("uniclick  Reasignado Prospecto" . " " . $regla1 . " Regla2 " . $regla2 . " Regla3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }

                                        } elseif ($account->tipo_registro_cuenta_c == 3) {
                                            $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                            $regla2 = $this->getAnexos($account->idcliente_c, 8);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 8);
                                            $GLOBALS['log']->fatal("uniclick  Reasignado Cliente " . " " . $regla1 . " Regla2 " . $regla2 . " Regla3" . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }
                                        }
                                    }
                                }
                                break;
                            case 'UNILEASE':
                                if ($asignaFecha->tipo_producto == '8') { //Uniclick
                                    // $GLOBALS['log']->fatal("Uniclick UniProductos - Reasignado");
                                    $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                                    $asignaFecha->assigned_user_id = $reAsignado;
                                    if ($promoActual=="cc736f7a-4f5f-11e9-856a-a0481cdf89eb"){
                                        if ($asignaFecha->no_viable==1) {
                                            $asignaFecha->no_viable=0;
                                            $asignaFecha->no_viable_razon="";
                                            $asignaFecha->no_viable_razon_fp="";
                                            $asignaFecha->no_viable_quien="";
                                            $asignaFecha->no_viable_porque="";
                                            $asignaFecha->no_viable_producto="";
                                            $asignaFecha->no_viable_razon_cf="";
                                            $asignaFecha->no_viable_otro_c="";
                                            $asignaFecha->no_viable_razon_ni="";
                                        }
                                    }

                                    if ($asignaFecha->estatus_atencion == '2') {
                                        /** diferente de Activo */
#1-5 y 3 es cliente
                                        if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                            $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                            $regla2 = $this->SolicitudCredito($account->id);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 8);
                                            $GLOBALS['log']->fatal("unilease  Reasignado Prospecto" . " " . $regla1 . " Regla2" . $regla2 . " Regla3" . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }

                                        } elseif ($account->tipo_registro_cuenta_c == 3) {
                                            $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                            $regla2 = $this->getAnexos($account->idcliente_c, 8);
                                            $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                            $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 8);
                                            $GLOBALS['log']->fatal("unilease  Reasignado Cliente " . " " . $regla1 . " Regla2 " . $regla2 . " Regla3 " . $regla3);

                                            if ($regla1 || $regla2 || $regla3) {
                                                $asignaFecha->estatus_atencion = 1;
                                            }
                                        }
                                    }
                                }
                                break;
                        }
                        /** Excepcion para actualiza SOS cuando es tipo producto LEASINGS */
                        if ($asignaFecha->tipo_producto == '7' && $product == 'LEASING') {
                            $GLOBALS['log']->fatal("Actualizar SOS");
                            $asignaFecha->fecha_asignacion_c = $fechaReAsignaAsesor;
                            $asignaFecha->assigned_user_id = $reAsignado;

                            if ($asignaFecha->estatus_atencion == '2') {
                                /** diferente de Activo */
#1-5 y 3 es cliente
                                if ($account->tipo_registro_cuenta_c == 1 || $account->tipo_registro_cuenta_c == 2) {
                                    $regla1 = $this->MeetOrCallValid(30, $account->id, $reAsignado);
                                    $regla2 = $this->SolicitudCredito($account->id);
                                    $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                    $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 1);
                                    $GLOBALS['log']->fatal("sos  Reasignado Prospecto" . " " . $regla1 . " REgla2 " . $regla2 . " Regla3 " . $regla3);

                                    if ($regla1 || $regla2 || $regla3) {
                                        $asignaFecha->estatus_atencion = 1;
                                    }

                                } elseif ($account->tipo_registro_cuenta_c == 3) {
                                    $regla1 = $this->MeetOrCallValid(90, $account->id, $reAsignado);
                                    $regla2 = $this->getAnexos($account->idcliente_c, 1);
                                    $idEmpresarial = $account->parent_id != "" ? $account->parent_id : $account->id;
                                    $regla3 = $this->grupoEmpresarial($idEmpresarial, $account->id, 1);
                                    $GLOBALS['log']->fatal("sos  Reasignado Cliente " . " " . $regla1 . " Regla2 " . $regla2 . " Regla3 " . $regla3);

                                    if ($regla1 || $regla2 || $regla3) {
                                        $asignaFecha->estatus_atencion = 1;
                                    }
                                }
                            }
                        }

                        $asignaFecha->save();
                    }
                }

                switch ($product) {
                    case 'LEASING':
                        $account->user_id_c = $reAsignado;
                        break;
                    case 'CREDITO AUTOMOTRIZ':
                        $account->user_id2_c = $reAsignado;
                        break;
                    case 'FACTORAJE':
                        $account->user_id1_c = $reAsignado;
                        break;
                    case 'FLEET':
                        $account->user_id6_c = $reAsignado;
                        break;
                    case 'UNICLICK':
                        $account->user_id7_c = $reAsignado;
                        break;
                    case 'UNILEASE':
                        $account->user_id7_c = $reAsignado;
                        break;
                    case 'RM':
                        $account->user_id8_c = $reAsignado;
                        break;
                }

                $account->save();

                array_push($actualizados, $account->id);

                // Funcionalidad para notificar al promotor reasigando
                $User = new User();
                $User->retrieve($reAsignado);
                $para = $User->email1;
                if ($para != null) {
                    if ($User->status != 'Active') {
                        $reAsignado = '';
                    } else {
                        if ($User->optout_c == 1) {
                            $reAsignado = '5cd93b08-6f5a-11e8-8553-00155d963615';
                        }
                    }

                    $jefeAsignado = '';
                    $jefe = $User->reports_to_id;
                    $User->retrieve($jefe);
                    //Establecer id a nuevo jefe solo si éste es Activo
                    if ($User->status == 'Active') {
                        if ($User->optout_c != 1) {
                            $jefeAsignado = $User->email1;
                        }
                    } else {
                        $jefeAsignado = '';
                    }

                    $User->retrieve($promoActual);
                    if ($User->status == 'Active') {
                        if ($User->optout_c == 1) {
                            $promoActual = '5cd93b08-6f5a-11e8-8553-00155d963615';
                        }
                    } else {
                        $promoActual = '';
                    }

                    $jefeActual = '';
                    $jefe = $User->reports_to_id;
                    $User->retrieve($jefe);
                    //Establecer id a jefe Actual solo si éste es Activo
                    if ($User->status == 'Active') {
                        if ($User->optout_c != 1) {
                            $jefeActual = $User->email1;
                        }
                    } else {
                        $jefeActual = '';
                    }
                    $idrm = $account->user_id8_c;
                    $UserRM = new User();
                    $UserRM->retrieve($idrm);
                    $paraRM = $UserRM->email1;

                    $notifica = BeanFactory::newBean('TCT2_Notificaciones');
                    $notifica->name = $para . ' ' . date("Y-m-d H:i:s");
                    $notifica->created_by = $promoActual;
                    $notifica->assigned_user_id = $reAsignado;
                    $notifica->tipo = 'Cambio Promotor';
                    $notifica->tct2_notificaciones_accountsaccounts_ida = $value;
                    $notifica->jefe_anterior_c = $jefeActual;
                    $notifica->jefe_nuevo_c = $jefeAsignado;
                    $notifica->actual_c = $promoActual;
                    $notifica->emailrm_c = $paraRM;

                    $notifica->save();

                    $notId = $notifica->id;
                    global $db;
                    $query = "update tct2_notificaciones set created_by = '$promoActual' where id = '$notId'";
                    $result = $db->query($query);


                }

                //Restablece usuario por asignar
                $reAsignado = $args['data']['reAssignado'];

                //Actualiza Oportunidades
                if ($product == 'LEASING') $producto = 1;
                if ($product == 'CREDITO AUTOMOTRIZ') $producto = 3;
                if ($product == 'FACTORAJE') $producto = 4;
                if ($product == 'FLEET') $producto = 6;
                if ($product == 'UNICLICK') $producto = 8;
                if ($product == 'UNILEASE') $producto = 9;
                if ($product == 'RM') $producto = 11; # Validar si se debe reasignar las oportunidades

                $usr_bean = BeanFactory::retrieveBean("Users", $reAsignado, array('disable_row_level_security' => true));

                $query = <<<SQL
UPDATE opportunities
INNER JOIN accounts_opportunities ON accounts_opportunities.opportunity_id = opportunities.id AND accounts_opportunities.deleted = 0
INNER JOIN accounts ON accounts.id = accounts_opportunities.account_id AND accounts.deleted = 0
INNER JOIN opportunities_cstm cs ON opportunities.id = cs.id_c
SET opportunities.assigned_user_id = '{$reAsignado}',
opportunities.team_id = '{$usr_bean->default_team}',
opportunities.team_set_id = '{$usr_bean->team_set_id}'
WHERE accounts.id = '{$value}' AND cs.tipo_producto_c = '{$producto}'
SQL;
                $queryResult = $db->query($query);

                /*   $queryUpdateTeams = "UPDATE opportunities
                     INNER JOIN accounts_opportunities ON accounts_opportunities.opportunity_id = opportunities.id AND accounts_opportunities.deleted = 0
                     INNER JOIN users ON opportunities.assigned_user_id = users.id
                     SET
                         opportunities.team_id = users.team_set_id,
                         opportunities.team_set_id = concat(left(users.team_set_id, 33),'af0')
                     WHERE accounts_opportunities.account_id ='" . $value . "';";
                   $resultUpdateTeams = $db->query($queryUpdateTeams);*/

                //Actualizar el usuario asignado a registros de Backlog relacionados a las cuentas
                //Obtener Backlogs de la cuenta que sean de meses futuros

//                $usr_prd_principal=$current_user->tipodeproducto_c;

                //    if ($product == 'LEASING') {
                $anio_actual = date("Y");
                $mes_actual = intval(date("n"));
                $hoy = date("d");
                $condicion = '';
                if ($optRadio == 'siguientes') {
                    $condicion = "AND ((b.anio = year(NOW()) and b.mes > month(NOW())) OR b.anio > year(NOW()))";
                } else {
                    $condicion = " AND ((b.anio = year(NOW()) and b.mes >= month(NOW())) OR b.anio > year(NOW()))";
                }

                if ($producto == '1') {
                    $sos_condicion = " OR cstm.producto_c='7'";
                }

                $bl_cuenta = "SELECT b.id, b.mes,b.description
FROM
  lev_backlog b
  INNER JOIN lev_backlog_cstm cstm
  ON cstm.id_c=b.id
WHERE
  b.account_id_c = '{$value}'" . $condicion . "
  AND (cstm.producto_c='{$producto}' " . $sos_condicion . ") AND deleted = 0";

                $result_bl_cuentas = $db->query($bl_cuenta);

                if ($result_bl_cuentas->num_rows > 0 && $result_bl_cuentas != null) {
                    //Recupera nuevo usuario asignado
                    $User = new User();
                    $User->retrieve($reAsignado);
                    while ($row = $db->fetchByAssoc($result_bl_cuentas)) {

                        $bl = BeanFactory::retrieveBean("lev_Backlog", $row['id'], array('disable_row_level_security' => true));
                        if ($bl != null) {
                            //Actualiza valores
                            $bl->assigned_user_id = $reAsignado;
                            $bl->description = $row['description'] . ' \n UNI2CRM - ' . $hoy . '/' . $mes_actual . '/' . $anio_actual . ': BL Reasignado a promotor ' . $IntValue->getUserName($reAsignado);
                            $bl->equipo = $User->equipo_c;
                            $bl->region = $User->region_c;
                            $bl->save();
                        }
                    }

                }
//                }


                $query = <<<SQL
select CASE WHEN idcliente_c > 0 THEN idcliente_c ELSE 0 END idCliente from accounts_cstm where id_c = '{$value}'
SQL;
                $idCliente = $db->getone($query);
                //Peticiones para actualizar uni2
                if (intval($idCliente) > 0) {
                    $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> :  Se sincronizaran promtores con UNICS ");
                    if ($product == "LEASING") {
                        $host = "http://" . $GLOBALS['unifin_url'] . "/Uni2WsClnt/WsRest/Uni2ClntService.svc/Uni2/AsignaPromotor?idCliente=" . $idCliente . "&usuarioPromotorLeasing=" . $IntValue->getUserName($reAsignado) . "&usuarioDominio=" . $current_user->user_name;
                    } else if ($product == "FACTORAJE") {
                        $host = "http://" . $GLOBALS['unifin_url'] . "/Uni2WsClnt/WsRest/Uni2ClntService.svc/Uni2/AsignaPromotor?idCliente=" . $idCliente . "&usuarioPromotorFactoring=" . $IntValue->getUserName($reAsignado) . "&usuarioDominio=" . $current_user->user_name;
                    } else if ($product == "CREDITO AUTOMOTRIZ") {
                        $host = "http://" . $GLOBALS['unifin_url'] . "/Uni2WsClnt/WsRest/Uni2ClntService.svc/Uni2/AsignaPromotor?idCliente=" . $idCliente . "&usuarioPromotorCredit=" . $IntValue->getUserName($reAsignado) . "&usuarioDominio=" . $current_user->user_name;
                    }
                    $callApi->unifingetCall($host);
                } else {
                    $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> :  La persona a reasignar no cuenta con IdCliente: " . print_r($idCliente, 1));
                }
            }
        }
        $main_array['actualizados'] = $actualizados;
        $main_array['no_actualizados'] = $no_actualizados;
        if (count($no_actualizados) > 0 && $nombreArchivo != null && !empty($nombreArchivo)) {
            $fichero = 'custom/errores_reasignacion/' . $nombreArchivo . '.txt';
            $texto_archivo = '';
            for ($i = 0;
                 $i < count($no_actualizados);
                 $i++) {
                $texto_archivo .= $no_actualizados[$i] . "\n";
            }
// Escribir los contenidos en el fichero,
//// usando la bandera FILE_APPEND para añadir el contenido al final del fichero
/// // y la bandera LOCK_EX para evitar que cualquiera escriba en el fichero al mismo tiempo
            file_put_contents($fichero, $texto_archivo, FILE_APPEND | LOCK_EX);
        }
	  } //try
	  catch (Exception $e) {
        array_push($main_array['no_actualizados'],$cuenta);
		$GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <".$current_user->user_name."> : Error al reasignar la cuenta ".$cuenta." ".$e->getMessage());
        return $main_array;
      }
      return $main_array;
    }

    public function MeetOrCallValid($numDays, $idAccount, $nuevoAsesor)
    {
        /** Recupera Reuniones menores a ciertos dias segun el caso */

        $today = date("Y-m-d", strtotime("+1 days"));
        $lastDays = date('Y-m-d', strtotime("-{$numDays} days"));
        $callORmeeting = false;
        $queryMeetings = "select * from meetings where status='Held'
                          AND  assigned_user_id='{$nuevoAsesor}'
                          AND parent_id='{$idAccount}'
                          AND parent_type='Accounts'
                           AND CONVERT_TZ(date_entered,'+00:00',@@global.time_zone)  >= '{$lastDays}'
                          AND CONVERT_TZ(date_entered,'+00:00',@@global.time_zone)  <= '{$today}'
                          AND deleted=0";

        $queryCalls = "select * from calls where status='Held'
                          AND  assigned_user_id='{$nuevoAsesor}'
                          AND parent_id='{$idAccount}'
                          AND parent_type='Accounts'
                          AND CONVERT_TZ(date_entered,'+00:00',@@global.time_zone)  >= '{$lastDays}'
                          AND CONVERT_TZ(date_entered,'+00:00',@@global.time_zone)  <= '{$today}'
                          AND deleted=0";

        $resultM = $GLOBALS['db']->query($queryMeetings);
        $resultC = $GLOBALS['db']->query($queryCalls);

        if ($resultM->num_rows > 0 || $resultC->num_rows > 0) {
            $callORmeeting = true;
        }
        return $callORmeeting;
    }

    public function getAnexos($idCorto, $idProducto)
    {
        global $sugar_config;
        $host = $sugar_config['url_executeStoredCRM'];
        $url = $host . '/unifinMiddleware/middlewareUni2/executeStoredCRM';
        $timeout = 500;
        $error_report = FALSE;

        $headers = array(
            'Content-Type:application/json',
        );
        $data = json_encode(
            array(
                "idCliente" => $idCorto,
                "idProducto" => $idProducto
            )
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
        $resultado=false;
        try {
            $response = curl_exec($curl);
            $GLOBALS['log']->fatal("respuesta servicio Anexo\n" . $response);
            $GLOBALS['log']->fatal("respuesta servicio Anexo\n" . $response['respStore']);

            $responseArray= json_decode($response,true);
            $GLOBALS['log']->fatal("Respuesta response Anexos Areglos " .  print_r($responseArray,true));
            $GLOBALS['log']->fatal("Respuesta response Anexos valor " .  ($responseArray['respStore']==1 && $responseArray['respStore']!="")?'verdadero':'falso error');
            curl_close($curl);
            $resultado=($responseArray['respStore']==1 && $responseArray['respStore']!="")?true:false;

        } catch (Exception $ex) {
            $GLOBALS['log']->fatal("Error al " . $ex);

        }

        return $resultado;
    }

    public function grupoEmpresarial($idEmpresarial, $idCuenta, $idProducto)
    {
        $existeAtendido = false;
        $buscagrupo = "select a.id ,a.name, a.parent_id ,u.name,u.estatus_atencion,u.tipo_producto from accounts a
INNER JOIN accounts_uni_productos_1_c r
ON r.accounts_uni_productos_1accounts_ida=a.id
  INNER JOIN uni_productos u
ON u.id=r.accounts_uni_productos_1uni_productos_idb
  AND u.tipo_producto='{$idProducto}'
  AND u.estatus_atencion='1'
where (a.parent_id='{$idEmpresarial}' OR a.id='{$idEmpresarial}')
      and a.id!='{$idCuenta}'";

        $resultEmp = $GLOBALS['db']->query($buscagrupo);

        if ($resultEmp->num_rows > 0) {
            $existeAtendido = true;
        }

        return $existeAtendido;
    }

    public function SolicitudCredito($idCuenta)
    {
        $existeOpp = false;
        $getOpportunities = "select * from accounts_opportunities rel
INNER JOIN opportunities op
on op.id=rel.opportunity_id
INNER JOIN opportunities_cstm cstm
on cstm.id_c=op.id
where rel.account_id='{$idCuenta}'
      AND cstm.tct_etapa_ddw_c='C'";

        $resultOpp = $GLOBALS['db']->query($getOpportunities);

        if ($resultOpp->num_rows > 0) {
            $existeOpp = true;
        }

        return $existeOpp;

    }
}
