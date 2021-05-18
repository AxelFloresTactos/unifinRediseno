<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 6/16/2015
 * Time: 4:26 PM
 */
class Lead_Hooks{
    public function crearProspecto($bean = null, $event = null, $args = null){
        global $db, $current_user;
        try
        {
            if($bean->status == 'PasaraProspecto' && $bean->prospectocreado_c == false){

                $acct = BeanFactory::getBean('Accounts');
                $acct->tipo_registro_c = 'Prospecto';
                //mapear Primer, Segundo nombres y los dos apellidos
                $acct->primernombre_c = $bean->primernombre_c;
                $acct->segundonombre_c = $bean->segundonombre_c;
                $acct->apellidopaterno_c = $bean->apellidopaterno_c;
                $acct->apellidomaterno_c = $bean->apellidomaterno_c;
                $acct->save();
                //pasar el telefono
                $telefono = BeanFactory::getBean('Tel_Telefonos');
                $telefono->name = $bean->phone_work;
                $telefono->telefono = $bean->phone_work;
                $telefono->accounts_tel_telefonos_1accounts_ida = $acct->id;
                $telefono->save();

                 $query = <<<SQL
SELECT calls.id FROM calls
INNER JOIN calls_leads ON calls_leads.call_id = calls.id AND calls_leads.deleted = 0
INNER JOIN leads ON leads.id = calls_leads.lead_id AND leads.deleted = 0
WHERE leads.id = '{$bean->id}'
SQL;

                 $queryResult = $db->query($query);
                 while($row = $db->fetchByAssoc($queryResult))
                 {
                     $call = BeanFactory::getBean('Calls');
                     $call->retrieve($row['id']);
                     $call->parent_type = 'Accounts';
                     $call->parent_id = $acct->id;
                     $call->save();
                 }


                 $query = <<<SQL
SELECT meetings.id FROM meetings
INNER JOIN meetings_leads ON meetings_leads.meeting_id = meetings.id AND meetings_leads.deleted = 0
INNER JOIN leads ON leads.id = meetings_leads.lead_id AND leads.deleted = 0
WHERE leads.id = '{$bean->id}'
SQL;

                 $queryResult = $db->query($query);
                 while($row = $db->fetchByAssoc($queryResult))
                 {
                     $meeting = BeanFactory::getBean('Meetings');
                     $meeting->retrieve($row['id']);
                     $meeting->parent_type = 'Accounts';
                     $meeting->parent_id = $acct->id;
                     $meeting->save();;
                 }

                 $query = <<<SQL
SELECT id FROM tasks
WHERE parent_id = '{$bean->id}'
SQL;

                 $queryResult = $db->query($query);
                 while($row = $db->fetchByAssoc($queryResult))
                 {
                     $task = BeanFactory::getBean('Tasks');
                     $task->retrieve($row['id']);
                     $task->parent_type = 'Accounts';
                     $task->parent_id = $acct->id;
                     $task->save();
                 }

                $bean->prospectocreado_c = true;
                 $query = <<<SQL
update leads_cstm set prospectocreado_c = '{$bean->prospectocreado_c}' where id_c='{$bean->id}'
SQL;
                 $queryResult = $db->query($query);
            }

        }catch (Exception $e){
            error_log(__FILE__." - ".__CLASS__."->".__FUNCTION__." <".$current_user->user_name."> : Error: ".$e->getMessage());
            $GLOBALS['log']->fatal(__FILE__." - ".__CLASS__."->".__FUNCTION__." <".$current_user->user_name."> : Error ".$e->getMessage());
        }

    }

    public function cambiaPuesto($bean=null, $event= null, $args= null){
        //Cambia el puesto a Otro si viene vacio.
        if($bean->puesto_c == ''){
          $bean->puesto_c = '11';
        }
    }

    public function crearURLOriginacion($bean = null, $event = null, $args = null)
    {
        $GLOBALS['log']->fatal("Realiza proceso UniON " );
        global $db, $sugar_config, $current_user;
        $id_assigned = $bean->assigned_user_id;
        $beanU = BeanFactory::retrieveBean('Users', $id_assigned, array('disable_row_level_security' => true));
        $correo_del_empleado = $beanU->email1;

        if ($beanU->puestousuario_c == 53 && empty($bean->url_originacion_c) && !empty($correo_del_empleado)) {
            $url = $sugar_config['site_UniOn'] . "/api/employee/?email={$correo_del_empleado}";
            //$url = $sugar_config['site_UniOn'] . "/api/employee/?email=jne@uniclick.mx";
            $token = $sugar_config['token_UniOn'];
            $Union = $sugar_config['UniOn'];

            try {
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER,
                    array("Authorization: Token $token",
                        "Content-type: application/json"));
                $json_response = curl_exec($curl);
                curl_close($curl);
                $response = json_decode($json_response, true);
                //$GLOBALS['log']->fatal("Respuesta Union " . print_r($response, true));
                if ($response) {
                    foreach ($response as $key => $value) {
                        //$GLOBALS['log']->fatal("Key  " . $key);
                        //$GLOBALS['log']->fatal("Value " . $value);
                        if ($key == "code" && $value != "") {
                            $url_originacion = "{$Union}/{$value}/?id_lead={$bean->id}";
                            $update = "UPDATE leads_cstm SET url_originacion_c='$url_originacion' WHERE id_c='{$bean->id}'";
                            $queryResult = $db->query($update);
                        } else {
                            $GLOBALS['log']->fatal("Error al solicitar código de originación  " . $value);
                        }
                    }
                }
            } catch (Exception $e) {
                error_log(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : Error: " . $e->getMessage());
                $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : Error " . $e->getMessage());
            }
        }
    }

    public function llenaMacro($bean=null, $event= null, $args= null){
        //Llena el campo de Macro Sector
		global $db;
		if(!empty($bean->pb_grupo_c) && empty($bean->actividad_economica_c)){
			$query = <<<SQL
SELECT DISTINCT id_cnbv_macrosector FROM catalogo_clasificacion_sectorial_pb WHERE id_pb_grupo = '{$bean->pb_grupo_c}'
SQL;
			$queryResult = $db->query($query);
            $row = $db->fetchByAssoc($queryResult);
			$bean->macrosector_c = $row['id_cnbv_macrosector'];
        }
        //Manda a llamar función para llenar Subsector
        $this->llenaSubsector($bean,$event,$args);
		if(!empty($bean->actividad_economica_c) && empty($bean->sector_economico_c)) $this->llenaSectorial($bean,$event,$args);
		if(!empty($bean->fetched_row['id']) && $bean->fetched_row['actividad_economica_c'] != $bean->actividad_economica_c && !empty($bean->actividad_economica_c)) $this->llenaSectorial($bean,$event,$args);
    }

    public function llenaSubsector($bean, $event, $args){
        //Llena el campo de Subsector
		global $db;
		if(!empty($bean->pb_grupo_c) && empty($bean->actividad_economica_c)){
			$query = <<<SQL
SELECT DISTINCT id_cnbv_subsector FROM catalogo_clasificacion_sectorial_pb WHERE id_pb_grupo = '{$bean->pb_grupo_c}'
SQL;
            $queryResult = $db->query($query);
            $row = $db->fetchByAssoc($queryResult);
            $bean->subsector_c = $row['id_cnbv_subsector'];
        }
    }

    public function llenaSectorial($bean, $event, $args){
        //Llena el campos de clasificación sectorial
		global $db;
		$query = <<<SQL
SELECT * FROM catalogo_clasificacion_sectorial WHERE id_actividad_economica_cnbv = '{$bean->actividad_economica_c}'
SQL;
        $queryResult = $db->query($query);
        $row = $db->fetchByAssoc($queryResult);
        $bean->subsector_c = $row['id_subsector_economico_cnbv'];
		$bean->sector_economico_c = $row['id_sector_economico_cnbv'];
		$bean->macrosector_c = $row['id_macro_sector_cnbv'];
		$bean->inegi_clase_c = $row['id_clase_inegi'];
		$bean->inegi_subrama_c = $row['id_subrama_inegi'];
		$bean->inegi_rama_c = $row['id_rama_inegi'];
		$bean->inegi_subsector_c = $row['id_subsector_inegi'];
		$bean->inegi_sector_c = $row['id_sector_inegi'];
		$bean->inegi_macro_c = $row['id_macro_inegi'];
    }

    public function validaCampos($bean = null, $event = null, $args = null){
		//Valida campos requeridos en la importación
        if($_REQUEST['module'] == 'Import') {
		  if($bean->regimen_fiscal_c == '') sugar_die('El campo Régimen Fiscal es requerido');
		  if($bean->nombre_de_cargar_c == '') sugar_die('El campo Nombre de la Carga es requerido');
		  if($bean->origen_c == '') sugar_die('El campo Origen es requerido');
		  if($bean->oficina_c == '') sugar_die('El campo Oficina es requerido');
		  if($bean->actividad_economica_c == '') sugar_die('El campo Actividad Económica es requerido');
		  if($bean->detalle_origen_c == '' && $bean->origen_c != '3') sugar_die('El campo Detalle Origen es requerido');
		  if($bean->prospeccion_propia_c == '' && $bean->origen_c == '3') sugar_die('El campo Prospección propia es requerido');
          if($bean->nombre_empresa_c == '' && $bean->regimen_fiscal_c == '3') sugar_die('El campo Nombre Empresa es requerido');
		  if($bean->nombre_c == '' && $bean->regimen_fiscal_c != '3') sugar_die('El campo Nombre(s) es requerido');
		  if($bean->apellido_paterno_c == '' && $bean->regimen_fiscal_c != '3') sugar_die('El campo Apellido Paterno es requerido');
		  if($bean->apellido_materno_c == '' && $bean->regimen_fiscal_c != '3') sugar_die('El campo Apellido Materno es requerido');
		  if($bean->phone_mobile == '' && $bean->phone_home == '' && $bean->phone_work == '' && $bean->regimen_fiscal_c != '3') sugar_die('Al menos un teléfono es requerido');
		  if($bean->origen_busqueda_c == '' && $bean->detalle_origen_c == '1') sugar_die('El campo Base es requerido');
		  if($bean->phone_work == '' && $bean->regimen_fiscal_c == '3') sugar_die('El campo Teléfono de Oficina es requerido');
		  if($bean->leads_leads_1leads_ida == '' && $bean->regimen_fiscal_c == '3') sugar_die('El campo Contacto Asociado es requerido');
		  if($bean->contacto_telefono_c == '' && $bean->regimen_fiscal_c == '3') sugar_die('El campo Teléfono Contacto es requerido');
		  if($bean->oficina_c != '') $bean->assigned_user_id = '569246c7-da62-4664-ef2a-5628f649537e';
        }
    }

    public function re_asign_meetings($bean, $event, $args)
    {
		if($bean->account_id) {
			$idCuenTa = $bean->account_id;
			//Reasigna Llamadas
			if ($bean->load_relationship('calls')) {
				$relatedBeans = $bean->calls->getBeans();
				if (!empty($relatedBeans)) {
					foreach ($relatedBeans as $call) {
						global $db;
						$meetUpdate = "update calls set parent_type = 'Accounts', parent_id = '{$idCuenTa}' where id = '{$call->id}'";
						$updateResult = $db->query($meetUpdate);
					}
				}
			}
			//Reasigna Reuniones
			if ($bean->load_relationship('meetings')) {
				$relatedBeans = $bean->meetings->getBeans();
				if (!empty($relatedBeans)) {
					foreach ($relatedBeans as $meeting) {
						global $db;
						$meetUpdate = "update meetings set parent_type = 'Accounts', parent_id = '{$idCuenTa}' where id = '{$meeting->id}'";
						$updateResult = $db->query($meetUpdate);
					}
				}
			}
			//Reasigna Tareas
			if ($bean->load_relationship('tasks')) {
				$relatedBeans = $bean->tasks->getBeans();
				if (!empty($relatedBeans)) {
					foreach ($relatedBeans as $task) {
						global $db;
						$meetUpdate = "update tasks set parent_type = 'Accounts', parent_id = '{$idCuenTa}' where id = '{$task->id}'";
						$updateResult = $db->query($meetUpdate);
						$bean->load_relationship('tasks_leads_1');
						$bean->tasks_leads_1->add($task->id);
					}
				}
			}
			//Reasigna Notas
			if ($bean->load_relationship('notes')) {
				$relatedBeans = $bean->notes->getBeans();
				if (!empty($relatedBeans)) {
					foreach ($relatedBeans as $note) {
						global $db;
						$meetUpdate = "update notes set parent_type = 'Accounts', parent_id = '{$idCuenTa}' where id = '{$note->id}'";
						$updateResult = $db->query($meetUpdate);
						$bean->load_relationship('notes_leads_1');
						$bean->notes_leads_1->add($note->id);					
					}
				}
			}
		}
    }
}