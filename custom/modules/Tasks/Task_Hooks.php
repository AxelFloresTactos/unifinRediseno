<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 6/26/2015
 * Time: 8:07 PM
 */
class Task_Hooks
{
    public function afterWorkflow($bean=null,$event=null,$args=null)
	{
        if($bean->parent_type == 'Accounts' && $bean->estatus_c == 'No Interesado'){
            $account = BeanFactory::getBean('Accounts', $bean->parent_id);
            $bean->name = 'Prospecto No Interesado ' . $account->name . ' - ' . $account->tipodemotivo_c;
            $bean->description = $account->motivo_c;
            $bean->date_start = $bean->date_entered;
        }
    }

    function InfoTasks($bean = null, $event = null, $args = null)
    {
        if (!$args['isUpdate']) {
            global $db ,$current_user;
            $GLOBALS['log']->fatal("InfoTasks: Inicio");
            //Realiza consulta para obtener info del usuario asignado
            $query="SELECT cstm.region_c,cstm.equipos_c,cstm.tipodeproducto_c,cstm.puestousuario_c from users as u
                INNER JOIN users_cstm as cstm
                ON u.id=cstm.id_c
                WHERE id='{$bean->assigned_user_id}'";
            $GLOBALS['log']->fatal("InfoTasks: consulta : ".$query);
            $queryResult = $db->query($query);
            $GLOBALS['log']->fatal("InfoTasks: Consulta para usuario asignado " .print_r($queryResult, true));
            while ($row = $db->fetchByAssoc($queryResult)) {
                //Setea valores usuario ASIGNADO
                $bean->asignado_region_c=$row['region_c'];
                $bean->asignado_equipo_promocion_c=$row['equipos_c'];
                $bean->asignado_producto_c=$row['tipodeproducto_c'];
                $bean->asignado_puesto_c=$row['puestousuario_c'];
            }
            $GLOBALS['log']->fatal("InfoTasks: Setea valores usuario logueado");
            //Setea valores usuario LOGUEADO/Creador del registro
            $bean->creado_region_c= $current_user->region_c;
            $bean->creado_equipo_promocion_c =$current_user->equipos_c;
            $bean->creado_producto_c= $current_user->tipodeproducto_c;
            $bean->creado_puesto_c=$current_user->puestousuario_c;
            $GLOBALS['log']->fatal("InfoTasks: Finaliza");
        }
    }

    public function sendEmail($bean=null,$event=null,$args=null)
	{
		global $app_list_strings;
        $bean->fecha_vacia_c = $bean->fecha_calificacion_c;
		if($bean->potencial_negocio_c) $bean->status = 'Completed';
		if(empty($bean->fetched_row['id']) && $bean->puesto_c == 61 && $bean->parent_type == 'Accounts') {
			$account = BeanFactory::getBean('Accounts', $bean->parent_id);
			$user = BeanFactory::getBean('Users', $account->user_id_c);
			if(!empty($user->email1)) {
				$correo = $user->email1;
				$nombre = $user->nombre_completo_c;
				$fechas = new DateTime($bean->date_due);
				$fecha = $fechas->format('d/m/Y');
				$users = BeanFactory::getBean('Users', $bean->created_by);
				$creador = $users->nombre_completo_c;
				require_once 'include/SugarPHPMailer.php';
				require_once 'modules/Administration/Administration.php';
				$linkTarea=$GLOBALS['sugar_config']['site_url'].'/#Tasks/'.$bean->id;
				$envio_usuarios_especificos=0;
				if($account->user_id_c == $bean->assigned_user_id) {
					$mailHTML = '<p align="justify"><font face="verdana" color="#635f5f">Se le informa que se le ha asignado una nueva tarea con la siguiente información:
					<br><br>Asunto: <b><a id="linkTarea" href="'.$linkTarea.'">'.$bean->name.'</a></b>
					<br><br>Asesor creador del registro: <b>'.$creador.'</b>
					<br><br>Descripción: <b>'.$bean->description.'</b>
					<br><br>Es importante que atienda esta tarea ya que representa una oportunidad de negocio para UNIFIN, la fecha de vencimiento de la tarea es <b>'.$fecha.'</b>
					<br><br>Atentamente Unifin</font></p>
					<br><p class="imagen"><img border="0" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>
					<p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
					Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
					Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
					No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
					Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/aviso-de-privacidad.php" target="_blank" rel="noopener"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a></span><u></u><u></u></p>';
					
					$envio_usuarios_especificos=1;
				} else {
					$mailHTML = '<p align="justify"><font face="verdana" color="#635f5f">Se le informa que se le ha asignado una nueva tarea con la siguiente información:
					<br><br>Asunto: <b><a id="linkTarea" href="'.$linkTarea.'">'.$bean->name.'</a></b>
					<br><br>Asesor creador del registro: <b>'.$creador.'</b>
					<br><br>Descripción: <b>'.$bean->description.'</b>
					<br><br>Atentamente Unifin</font></p>
					<br><p class="imagen"><img border="0" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>
					<p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
					Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
					Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
					No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
					Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/aviso-de-privacidad.php" target="_blank" rel="noopener"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a></span><u></u><u></u></p>';
				}
				$mailer = MailerFactory::getSystemDefaultMailer();
				$mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
				$mailer->setSubject('Nueva Tarea CAC: '.$bean->name);
				$body = trim($mailHTML);
				$mailer->setHtmlBody($body);
				$mailer->clearRecipients();
				$mailer->addRecipientsTo(new EmailIdentity($correo, $nombre));
				if($envio_usuarios_especificos==1){
					//Enviar copia a usuarios especificos solo si el asesor leasing de la cuenta es el mismo que el asignado de la Tarea
					$lista_usuarios_copia=$app_list_strings["users_copia_tareas_list"];
					foreach ($lista_usuarios_copia as $key => $value) {
						$id_usuario=$lista_usuarios_copia[$key];
						$userCopia = BeanFactory::getBean('Users', $id_usuario);
						if(!empty($userCopia)){
							$correoUserCopia = $userCopia->email1;
							$nombreUserCopia = $userCopia->nombre_completo_c;
							$mailer->addRecipientsCc(new EmailIdentity($correoUserCopia, $nombreUserCopia));
						}
					}
				}
				$result = $mailer->send();
			}
		}
	}
	
	public function sendNotificationUpdate($bean = null, $event = null, $args = null){

		//Lanzar notificación en cada actualización del registro de Tarea creado por Centro de prospección, Asesor CAC: 61
		$campos_modificados=array();
		$campos_excluidos=array('date_modified','tn_name','tn_name_2','puesto_asignado_c','subetapa_c');
		if ($args['isUpdate'] && $bean->puesto_c=='61') {
			foreach($bean->fetched_row as $key=>$val){
				if($bean->fetched_row[$key] != $bean->{$key}){
					if(!in_array($key, $campos_excluidos)){
						array_push($campos_modificados,$key);
					}
				}
			}

			//Envía notificación hacia el Asesor Leasing de la Cuenta relacionada
			if(count($campos_modificados)>0){
				$urlSugar=$GLOBALS['sugar_config']['site_url'].'/#Tasks/';
                $idTarea=$bean->id;
				$linkTarea=$urlSugar.$idTarea;
				//Obteniendo correo del asesor Leasing
				$account = BeanFactory::getBean('Accounts', $bean->parent_id);
				$user = BeanFactory::getBean('Users', $account->user_id_c);
				if(!empty($user->email1)) {
					$correo = $user->email1;
					$nombre = $user->nombre_completo_c;

					$cuerpoHTML=$this->bodyNotificacionUpdate($bean,$linkTarea,$campos_modificados);

					$this->enviaNotificaion("Actualización Tarea CAC: ".$bean->name,$cuerpoHTML,$correo,$nombre);
				}

			}

		}

	}

	public function bodyNotificacionUpdate($beanTarea,$linkTarea,$campos_modificados){
		require_once 'include/utils.php';
		global $app_list_strings;
		
		$string_modificados='';
		for ($i=0; $i < count($campos_modificados); $i++) {
			$GLOBALS['log']->fatal($beanTarea->getFieldDefinition($campos_modificados[$i]));
			$definicion_campo=$beanTarea->getFieldDefinition($campos_modificados[$i]);
			$etiqueta_sistema=$definicion_campo['vname'];
			$label = translate($etiqueta_sistema, 'Tasks');
			//Obteniendo la etiqueta del campo
			if($campos_modificados[$i]=="assigned_user_id"){
				$string_modificados.='Campo modificado <b>Usuario Asignado</b><br>';
			}else{
				$string_modificados.='Campo modificado <b>'.$label.'</b><br>';
			}
			
			if($definicion_campo['type']=='enum'){
				//Obtiene valor de la lista de valores
				$lista_valores=$app_list_strings[$definicion_campo['options']];
				$string_modificados.='<br><b>Valor anterior:</b> '.$lista_valores[$beanTarea->fetched_row[$campos_modificados[$i]]];
				$string_modificados.='<br><b>Valor actual:</b> '.$lista_valores[$beanTarea->{$campos_modificados[$i]}].'<br><br>';
			}else{
				if($campos_modificados[$i]=="assigned_user_id"){
					//Obtiene nombre de los usuarios
					$usuario_anterior=BeanFactory::getBean('Users', $beanTarea->fetched_row[$campos_modificados[$i]]);
					$nombre_usuario_anterior=$usuario_anterior->nombre_completo_c;

					$usuario_nuevo=BeanFactory::getBean('Users', $beanTarea->{$campos_modificados[$i]});
					$nombre_usuario_nuevo=$usuario_nuevo->nombre_completo_c;

					$string_modificados.='<br><b>Valor anterior:</b> '.$nombre_usuario_anterior;
					$string_modificados.='<br><b>Valor actual:</b> '.$nombre_usuario_nuevo.'<br><br>';
				}else{
					$string_modificados.='<br><b>Valor anterior:</b> '.$beanTarea->fetched_row[$campos_modificados[$i]];
					$string_modificados.='<br><b>Valor actual:</b> '.$beanTarea->{$campos_modificados[$i]}.'<br><br>';
				}
			}

		}
        
        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b></b>
	  <br>Se le informa que se ha actualizado la siguiente información en el registro de la <a id="linkTarea" href="'. $linkTarea.'">Tarea</a>:
	  <br><br>'.$string_modificados.'
      <br><br>Atentamente Unifin
      <br><p class="imagen"><img border="0" id="bannerUnifin" src="https://www.unifin.com.mx/blog/wp-content/uploads/2021/01/UNIFIN_centrado_Poder2.png"></span></p>
      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

		$GLOBALS['log']->fatal("Inicia Notificacion de actualización de registro de tarea sobre asesores CAC");
        return $mailHTML;

	}
	
	public function enviaNotificaion($asunto,$cuerpoCorreo,$email,$nombre_asesor){
		try{
            $mailer = MailerFactory::getSystemDefaultMailer();
            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
            $mailer->setSubject($asunto);
            $body = trim($cuerpoCorreo);
            $mailer->setHtmlBody($body);
            $mailer->clearRecipients();
			$mailer->addRecipientsTo(new EmailIdentity($email, $nombre_asesor));
			$result = $mailer->send();
		}catch (Exception $e){
            $GLOBALS['log']->fatal("Exception: No se ha podido enviar correo al email ".$email);
            $GLOBALS['log']->fatal("Exception ".$e);
        } 

	}

	public function relateOppLeasing($bean = null, $event = null, $args = null){
		//Relacionar solicitud Leasing de la Cuenta (No cancelada ni rechazada) cuando:
		// Tipo de tarea es: CAC Oportunidad Contratación, CAC Oportunidad Renovación,CAC Oportunidad Recuperación
		// y Usuario Asignado es un Asesor comercial(Asesor, Subdirector, Gerente, Director Leasing)
		$GLOBALS['log']->fatal("USUARIO ASIGNADO: ".$bean->assigned_user_id);
		if($bean->parent_type=='Accounts' && $bean->parent_id!=""){
			$user = BeanFactory::getBean('Users', $bean->assigned_user_id);
			if(!empty($user)) {
				//Obtiene puesto del usuario: Asesor=>5, Subdirector=>3,Gerente=>4,Director=>2
				$puestos=array('2','3','4','5');
				$tipos_tareas=array('CAC Oportunidad Contratacion','CAC Oportunidad Renovacion','CAC Oportunidad Recuperacion');
				$puesto=$user->puestousuario_c;
				$tipo_tarea=$bean->tipo_tarea_c;
				if(in_array($puesto, $puestos) && in_array($tipo_tarea, $tipos_tareas)){
					$GLOBALS['log']->fatal("ENTRA LH PARA RELACIONAR TAREA CON SOL");
					//Obteniendo solicitudes de leasing para relacionarla a la tarea Actual
					$beanCuenta=BeanFactory::getBean('Accounts', $bean->parent_id, array('disable_row_level_security' => true));
					if($beanCuenta->load_relationship('opportunities')){

						$solicitudes=$beanCuenta->opportunities->getBeans();
						if(count($solicitudes)>0){
							$relacionada=false;
							foreach ($solicitudes as $sol) {
								if(!$relacionada){
									//Solicitud Leasing: 1, Rechazado : tct_etapa_ddw_c=R,Cancelada: estatus_c=K
									if($sol->tipo_producto_c=='1' && $sol->tct_etapa_ddw_c!='R' && $sol->estatus_c !='K'){
										
										$id_solicitud=$sol->id;
										$nombre_solicitud=$sol->name;
										$GLOBALS['log']->fatal("RELACIONANDO LA SOLICITUD ".$id_solicitud."-".$nombre_solicitud);
										//$bean->tasks_opportunities_1_name=$nombre_solicitud;
										//$bean->tasks_opportunities_1opportunities_idb=$id_solicitud;
										$sol->tasks_opportunities_1_name=$bean->name;
										$sol->tasks_opportunities_1tasks_ida=$bean->id;
										$sol->save();
										$relacionada=true;//Se establece bandera para que solo se relacione la primera solicitud de Leasing encontrada
									}
								}
							}
						}
					}
				}
			}

		}
		



	}
}
