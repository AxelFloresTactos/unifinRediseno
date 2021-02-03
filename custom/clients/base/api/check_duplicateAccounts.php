<?php

/**
 * Created by PhpStorm.
 * User: tactos
 * Date: 9/01/20
 * Time: 05:03 PM
 */
class check_duplicateAccounts extends SugarApi
{

    public function registerApiRest()
    {
        return array(
            //GET
            'existsAccounts' => array(
                //request type
                'reqType' => 'POST',
                //set authentication
                'noLoginRequired' => false,
                //endpoint path
                'path' => array('existsLeadAccounts'),
                //endpoint variables
                'pathVars' => array(''),
                //method to call
                'method' => 'validation_process',
                //short help string to be displayed in the help documentation
                'shortHelp' => 't',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            )

        );
    }

    public function validation_process($api, $args)
    {
        $id_Lead = $args['id'];
        $msjExiste = "El Lead que intentas convertir ya está registrada como Cuenta";
        $hayReunionPlaneada = false;
        $responseLEads = array();
        $finish = array();
        global $sugar_config;
        $url = $sugar_config['site_url'];
        /**
         * Validamos que el Lead no exista en Cuentas
         */
        $bean = BeanFactory::retrieveBean('Leads', $id_Lead, array('disable_row_level_security' => true));
        // $GLOBALS['log']->fatal("nombre del LEads " . $bean->first_name);
        $result = $this->existLeadAccount($bean);
        $count = count($result);
        if ($bean->subtipo_registro_c != "4") {
            if ($count == 0) {


                $responsMeeting = $this->getMeetingsUser($bean);
                $GLOBALS['log']->fatal("responsMeeting", $responsMeeting);
                   
                $requeridos = $this->validaRequeridos($bean);

                if (($responsMeeting['status'] != "stop" && !empty($responsMeeting['data'])) && $requeridos == "") {

                    /** Creamos la Cuenta */
                    //Obtener el puesto del usuario
                    $idAsesor=$responsMeeting['data']['LEASING'];
                    //Comprobando que el usuario asignado a la reunión tenga menos de 20 registros asignados
                    //Obteniendo puesto del usuario asignado a la reunión
                    $usuario_asesor = BeanFactory::retrieveBean('Users', $idAsesor, array('disable_row_level_security' => true));
                    $puesto_asesor=$usuario_asesor->puestousuario_c;
                        
                    $args=array('id_user'=>$idAsesor);
                    $objRegistrosAsignados= GetRegistrosAsignadosForProtocolo::getRecordsAssign("",$args);
                    $total_asignados=$objRegistrosAsignados['total_asignados'];

                    $GLOBALS['log']->fatal("Total de asignados: " . $total_asignados. " Usuario: ".$usuario_asesor->user_name." Puesto: ".$puesto_asesor);
                    
                    if($total_asignados>=20 && ($puesto_asesor=='2' || $puesto_asesor=='5')){ //2-Director Leasing, 5-Asesor Leasing
                        
                        $msj_reunion="No es posible generar la conversión pues el Asesor asignado a la Reunión/Llamada ya cuenta con más de 20 registros Asignados<br>Para continuar es necesario atender alguno de sus registros asignados";

                        $finish = array("idCuenta" => "", "mensaje" => $msj_reunion);

                    }else{

                        $bean_account = $this->createAccount($bean, $responsMeeting, false);

                        if (!empty($bean_account->id)) {
                            $resultadoRelaciones = $this->getContactAssoc($bean, $bean_account);

                            // Cambiamos Estatus Leads tipo_registro_c    ----  subtipo_registro_c
                            // $bean->tipo_registro_c = "";
                            $bean->subtipo_registro_c = 4;
                            $bean->account_id = $bean_account->id;
                            $bean->account_name = $bean_account->name;
                            $bean->save();
                            // Re-asignamos las reuniones realizadas y planificadas de Leads a Cuentas
                            $this->re_asign_meetings($bean, $bean_account->id);

                            $msj_succes = <<<SITE
                            Conversión Completa <br>
    <b></b><a href="$url/#Accounts/$bean_account->id">$bean_account->name</a></b>
    SITE;

                            $finish = array("idCuenta" => $bean_account->id, "mensaje" => $msj_succes);
                        }

                    }

                    // return array("idCuenta" => $bean_account->id, $resultadoRelaciones);
                } else {
                    if ($requeridos != "") {
                        $msj_reunion = "Hace falta completar la siguiente información para convertir un <b>Lead: </b><br>" . $requeridos . "<br>";
                    }
                    if ($responsMeeting['status'] == "stop" || $responsMeeting['vacio'] ) {
                        $msj_reunion .= <<<SITE
                        El proceso no puede continuar. Falta al menos una <b>Reunión/Llamada Planificada o Realizada asignada a un Asesor.</b>
SITE;
                    }
                    $finish = array("idCuenta" => "", "mensaje" => $msj_reunion);
                }
            } elseif ($count > 0) {
                /** Si la cuenta existe actualizamos los asesores que se encuentre vacios o como 9 sin gestor en la cuenta encontrada */
                $id_account = $result[0]['id'];
                $responsMeeting = $this->getMeetingsUser($bean);
                if ($responsMeeting['status'] == 'continue') {
                    $beanAccountExist = BeanFactory::retrieveBean('Accounts', $id_account, array('disable_row_level_security' => true));
                    $beanAccountExist->user_id_c = (($beanAccountExist->user_id_c == "569246c7-da62-4664-ef2a-5628f649537e"
                            || $beanAccountExist->user_id_c == "") && $responsMeeting['data']['LEASING'] != "") ? $responsMeeting['data']['LEASING'] : $beanAccountExist->user_id_c;
                    $beanAccountExist->user_id1_c = (($beanAccountExist->user_id1_c == "569246c7-da62-4664-ef2a-5628f649537e"
                            || $beanAccountExist->user_id1_c == "") && $responsMeeting['data']['FACTORAJE'] != "") ? $responsMeeting['data']['FACTORAJE'] : $beanAccountExist->user_id1_c;
                    $beanAccountExist->user_id2_c = (($beanAccountExist->user_id2_c == "569246c7-da62-4664-ef2a-5628f649537e"
                            || $beanAccountExist->user_id2_c == "") && $responsMeeting['data']['CREDITO AUTOMOTRIZ'] != "") ? $responsMeeting['data']['CREDITO AUTOMOTRIZ'] : $beanAccountExist->user_id2_c;
                    $beanAccountExist->user_id6_c = (($beanAccountExist->user_id6_c == "569246c7-da62-4664-ef2a-5628f649537e"
                            || $beanAccountExist->user_id6_c == "") && $responsMeeting['data']['FLEET'] != "") ? $responsMeeting['data']['FLEET'] : $beanAccountExist->user_id6_c;
                    $beanAccountExist->save();
                }
                $bean->subtipo_registro_c = "4";
                $bean->save();
                $msj_succes_duplic = <<<SITE
                        Los Asesores han sido actualizados en la cuenta <br>
<b></b><a href="$url/#Accounts/$beanAccountExist->id">$beanAccountExist->name</a></b>
SITE;
                $finish = array("idCuenta" => $beanAccountExist->id, "mensaje" => $msj_succes_duplic);
            }
        } else {
            $finish = array("idCuenta" => "", "mensaje" => "El Lead ya ha sido convertido.");
        }
        return $finish;
    }

    public function createAccount($bean_Leads, $idMeetings, $rel)
    {
        $bean_account = BeanFactory::newBean('Accounts');
        if ($rel) {
            $bean_account->subtipo_registro_cuenta_c = "";
            $bean_account->tipo_registro_cuenta_c = "4"; // Persona - 4
            $bean_account->user_id_c = "569246c7-da62-4664-ef2a-5628f649537e";
            $bean_account->user_id1_c = "569246c7-da62-4664-ef2a-5628f649537e";
            $bean_account->user_id2_c = "569246c7-da62-4664-ef2a-5628f649537e";
            $bean_account->user_id6_c = "569246c7-da62-4664-ef2a-5628f649537e";
        } else {
            $bean_account->subtipo_registro_cuenta_c = "2"; // Contactado - 2
            $bean_account->tipo_registro_cuenta_c = "2"; //Prospecto - 2
        }

        switch ($bean_Leads->regimen_fiscal_c) {
            case 1:
                $bean_account->tipodepersona_c = "Persona Fisica";
                break;
            case 2:
                $bean_account->tipodepersona_c = "Persona Fisica con Actividad Empresarial";
                break;
            case 3:
                $bean_account->tipodepersona_c = "Persona Moral";
                break;
            default:
                $bean_account->tipodepersona_c = $bean_Leads->regimen_fiscal_c;
                break;
        }

        $bean_account->origen_cuenta_c = $bean_Leads->origen_c;
        $bean_account->detalle_origen_c = $bean_Leads->detalle_origen_c;
        $bean_account->prospeccion_propia_c = $bean_Leads->prospeccion_propia_c;
        $bean_account->user_id3_c = $bean_Leads->user_id1_c; // Agente telefonico
        $bean_account->user_id4_c = $bean_Leads->user_id_c; // ¿Que Asesor?
        $bean_account->medio_detalle_origen_c = $bean_Leads->medio_digital_c;
        $bean_account->punto_contacto_origen_c = $bean_Leads->punto_contacto_c;
        $bean_account->evento_c = $bean_Leads->evento_c;
        $bean_account->tct_origen_busqueda_txf_c = $bean_Leads->origen_busqueda_c;
        $bean_account->camara_c = $bean_Leads->camara_c;
        $bean_account->tct_que_promotor_rel_c = $bean_Leads->origen_ag_tel_c;
        $bean_account->nombre_comercial_c = $bean_Leads->nombre_empresa_c;
        $bean_account->razonsocial_c = $bean_Leads->nombre_empresa_c;
        $bean_account->primernombre_c = $bean_Leads->nombre_c;
        $bean_account->apellidomaterno_c = $bean_Leads->apellido_materno_c;
        $bean_account->apellidopaterno_c = $bean_Leads->apellido_paterno_c;
        $bean_account->tct_macro_sector_ddw_c = $bean_Leads->macrosector_c;
        $bean_account->ventas_anuales_c = $bean_Leads->ventas_anuales_c;
        $bean_account->potencial_cuenta_c = $bean_Leads->potencial_lead_c;
        $bean_account->zonageografica_c = $bean_Leads->zona_geografica_c;
        $bean_account->puesto_cuenta_c = $bean_Leads->puesto_c;
        $bean_account->email = $bean_Leads->email;
        $bean_account->clean_name = $bean_Leads->clean_name_c;

        // Asesores
        if ($idMeetings != null) {
            $bean_account->user_id_c = empty($idMeetings['data']['LEASING']) ? "569246c7-da62-4664-ef2a-5628f649537e" : $idMeetings['data']['LEASING'];
            $bean_account->user_id1_c = empty($idMeetings['data']['FACTORAJE']) ? "569246c7-da62-4664-ef2a-5628f649537e" : $idMeetings['data']['FACTORAJE'];
            $bean_account->user_id2_c = empty($idMeetings['data']['CREDITO AUTOMOTRIZ']) ? "569246c7-da62-4664-ef2a-5628f649537e" : $idMeetings['data']['CREDITO AUTOMOTRIZ'];
            $bean_account->user_id6_c = empty($idMeetings['data']['FLEET']) ? "569246c7-da62-4664-ef2a-5628f649537e" : $idMeetings['data']['FLEET'];

            if(empty($idMeetings['data']['UNICLICK']) && empty($idMeetings['data']['UNILEASE'])){

                $bean_account->user_id7_c ='569246c7-da62-4664-ef2a-5628f649537e';

            }else if(!empty($idMeetings['data']['UNICLICK'])){

                $bean_account->user_id7_c=$idMeetings['data']['UNICLICK'];

            }else if(!empty($idMeetings['data']['UNILEASE'])){

                $bean_account->user_id7_c=$idMeetings['data']['UNILEASE'];
            }

        }

        $bean_account->save();
        // creamos las relaciones en telefono
        if (!empty($bean_Leads->phone_mobile)) {
            $this->create_phone($bean_account->id, $bean_Leads->phone_mobile, 3);

        }
        if (!empty($bean_Leads->phone_home)) {
            $this->create_phone($bean_account->id, $bean_Leads->phone_home, 1);

        }
        if (!empty($bean_Leads->phone_work)) {
            $this->create_phone($bean_account->id, $bean_Leads->phone_work, 2);

        }
        return $bean_account;
    }

    public function existLeadAccount($bean_lead)
    {
        $accounts_bean = BeanFactory::getBean('Accounts');
        $accounts_bean->disable_row_level_security = true;

        $sql = new SugarQuery();
        $sql->select(array('id', 'clean_name'));
        $sql->from($accounts_bean);
        $sql->where()->equals('clean_name', $bean_lead->clean_name_c);
        $sql->where()->notEquals('id', $bean_lead->id);

        $result = $sql->execute();
        return $result;
    }

    public function getMeetingsUser($beanL)
    {
        $procede = array("status" => "stop", "data" => array());
        //Recupera reuniones
        if ($beanL->load_relationship('meetings')) {
            $relatedBeans = $beanL->meetings->getBeans();

            if (!empty($relatedBeans)) {

                foreach ($relatedBeans as $meeting) {

                    if ($meeting->status != "Not Held") {

                        $procede['status'] = "continue";
                        $sqlUser = new SugarQuery();
                        $sqlUser->select(array('id', 'puestousuario_c', 'tipodeproducto_c'));
                        $sqlUser->from(BeanFactory::newBean('Users'));
                        $sqlUser->where()->equals('id', $meeting->assigned_user_id);
                        //$sqlUser->where()->notEquals('puestousuario_c', "");
                        $sqlResult = $sqlUser->execute();

                        $productos = $sqlResult[0]['tipodeproducto_c'];
                        $puesto = $sqlResult[0]['puestousuario_c'];

                        // agregar que discrimine agente telefonico y cordinar de centro de prospeccion  27 y 31
                        if ($productos == '1' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['LEASING'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '3' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['CREDITO AUTOMOTRIZ'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '4' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['FACTORAJE'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '6' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['FLEET'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '8') {

                            $procede['data']['UNICLICK'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '9') {

                            $procede['data']['UNILEASE'] = $meeting->assigned_user_id;
                        }

                        $procede['vacio']=empty($procede['data'])?true:false;

                    }
                }
            } else {
                $procede['status'] = "stop";
                $procede['data'] = array();
                // $GLOBALS['log']->fatal("No tiene Reuniones no puede continuar aqui rompe  " . print_r($procede, true));

            }
        }
        //Recupera llamadas
        if ($beanL->load_relationship('calls')) {
            $relatedBeans = $beanL->calls->getBeans();

            if (!empty($relatedBeans)) {

                foreach ($relatedBeans as $meeting) {

                    if ($meeting->status != "Not Held") {

                        $procede['status'] = "continue";
                        $sqlUser = new SugarQuery();
                        $sqlUser->select(array('id', 'puestousuario_c', 'tipodeproducto_c'));
                        $sqlUser->from(BeanFactory::newBean('Users'));
                        $sqlUser->where()->equals('id', $meeting->assigned_user_id);
                        //$sqlUser->where()->notEquals('puestousuario_c', "");
                        $sqlResult = $sqlUser->execute();

                        $productos = $sqlResult[0]['tipodeproducto_c'];
                        $puesto = $sqlResult[0]['puestousuario_c'];

                        // agregar que discrimine agente telefonico y cordinar de centro de prospeccion  27 y 31
                        if ($productos == '1' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['LEASING'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '3' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['CREDITO AUTOMOTRIZ'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '4' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['FACTORAJE'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '6' && ($puesto != "27" && $puesto != "31")) {

                            $procede['data']['FLEET'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '8') {

                            $procede['data']['UNICLICK'] = $meeting->assigned_user_id;
                        }
                        if ($productos == '9') {

                            $procede['data']['UNILEASE'] = $meeting->assigned_user_id;
                        }

                        $procede['vacio']=empty($procede['data'])?true:false;

                    }
                }
            }
        }


        return $procede;
    }

    public function validaRequeridos($beanLEad)
    {
        $campos = "";
        $subTipoLead = $beanLEad->subtipo_registro_c;
        $tipoPersona = $beanLEad->regimen_fiscal_c;
        $campos_req = ['origen_c'];
        $response = false;
        $errors = [];

        switch ($subTipoLead) {
            /*******SUB-TIPO SIN CONTACTAR*****/
            case '1':
                if ($tipoPersona == '3') {
                    array_push($campos_req, 'nombre_empresa_c');
                } else {
                    array_push($campos_req, 'nombre_c', 'apellido_paterno_c');
                }
                break;
            /********SUB-TIPO CONTACTADO*******/
            case '2':
                if ($tipoPersona == '3') {
                    array_push($campos_req, 'nombre_empresa_c');
                } else {
                    array_push($campos_req, 'nombre_c', 'apellido_paterno_c', 'puesto_c');
                }

                array_push($campos_req, 'macrosector_c', 'ventas_anuales_c', 'zona_geografica_c', 'email');

                break;
        }

        /** Validamos que el valor no sea vacio, null o undefine */
        $flag_req = [];
        foreach ($campos_req as $req) {
            if (empty($beanLEad->$req) && isset($beanLEad->$req)) {
                array_push($flag_req, $req);
            }
        }
        $label = [];
        foreach ($flag_req as $key => $valor) {

            $str_label = translate($GLOBALS['dictionary']['Lead']['fields'][$valor]['vname'], "Leads");
            $str_label = trim($str_label, ":");
            $campos = $campos . '<b>' . $str_label . '</b><br>';

            array_push($label, $str_label);
        }


        if ($beanLEad->phone_mobile == '' && $beanLEad->phone_home == '' &&
            $beanLEad->phone_work == '' && $beanLEad->subtipo_registro_c == '2'
        ) {
            $campos = $campos . '<b>' . 'Al menos un Teléfono' . '</b><br>';
        }
        $GLOBALS['log']->fatal("Si Labels  en vista " . $campos);
        return $campos;

    }

    public function getContactAssoc($beanLead, $bean_account)
    {
        $resultado = array("data" => array());

        if ($beanLead->load_relationship('leads_leads_1')) {
            $relatedBeans = $beanLead->leads_leads_1->getBeans();

            if (!empty($relatedBeans)) {
                foreach ($relatedBeans as $lead) {

                    $result = $this->existLeadAccount($lead);
                    $count = count($result);

                    if ($count > 0) {
                        // $GLOBALS['log']->fatal("Si existe recupero el id  " . $result[0]['id'] . " y creamos la relacion");

                        $this->create_relationship($bean_account, $result[0]['id']);
                        array_push($resultado['data'], $result[0]['id']);


                    } else {
                        // $GLOBALS['log']->fatal("No existe el Contacto asociado en Cuentas hay que crearlo ");
                        $cuenta = $this->createAccount($lead, null, true);
                        if (!empty($cuenta->id)) {
                            $this->create_relationship($bean_account, $cuenta->id);
                            array_push($resultado['data'], $cuenta->id);
                            $lead->account_id = $cuenta->id;
                            $lead->account_name = $cuenta->name;
                        }
                    }

                    $lead->subtipo_registro_c = 4;

                    $lead->save();

                }
            } else {
                // no existen Asociados no se hace nada
                $resultado['data'] = null;
            }
        }
        // $GLOBALS['log']->fatal("Resultado de Relaciones " . print_r($resultado, true));

        return $resultado;
    }

    public function create_relationship($id_parent, $idAccount)
    {
        // rel_relaciones_accounts_1
        // $GLOBALS['log']->fatal("id Padre " . $id_parent->id . "  id hijo " . $idAccount);

        $bean_relacion = BeanFactory::newBean('Rel_Relaciones');
        $bean_relacion->rel_relaciones_accounts_1accounts_ida = $id_parent->id; // Cuenta padre
        $bean_relacion->rel_relaciones_accounts_1_name = $id_parent->name;
        $bean_relacion->relaciones_activas = "^Contacto^";
        $bean_relacion->account_id1_c = $idAccount; // cuenta hijo
        $bean_relacion->tipodecontacto = "Promocion";
        $bean_relacion->save();

    }

    public function create_phone($idCuenta, $phone, $tipoTel)
    {
        $bean_relacionTel = BeanFactory::newBean('Tel_Telefonos');
        $bean_relacionTel->accounts_tel_telefonos_1accounts_ida = $idCuenta;
        $bean_relacionTel->name = $phone;
        $bean_relacionTel->telefono = $phone;
        $bean_relacionTel->tipotelefono = $tipoTel;

        $bean_relacionTel->tipotelefono = $tipoTel;
        $bean_relacionTel->tipotelefono = $tipoTel;
        $bean_relacionTel->estatus = "Activo";
        $bean_relacionTel->pais = 2;
        $bean_relacionTel->save();

    }


    public function re_asign_meetings($bean_LEad, $idCuenTa)
    {
        if ($bean_LEad->load_relationship('meetings')) {
            $relatedBeans = $bean_LEad->meetings->getBeans();

            if (!empty($relatedBeans)) {
                foreach ($relatedBeans as $meeting) {
                    if ($meeting->status != "Not Held") {
                        $meeting->parent_type = "Accounts";
                        $meeting->parent_id = $idCuenTa;
                        $meeting->save();

                    }
                }
            }
        }
    }

}