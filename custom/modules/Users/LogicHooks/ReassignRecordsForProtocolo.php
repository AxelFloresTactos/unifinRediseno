<?php
/**
 * User: salvadorlopez
 * Date: 23/02/21
 */
class ReassignRecordsForProtocolo
{
    function reassignRecordsForUserInactive($bean = null, $event = null, $args = null){

        global $app_list_strings;
        global $current_user;
        global $db;

        $status=$bean->status;
        $status_anterior=$bean->fetched_row['status'];
        $GLOBALS['log']->fatal('VALOR LISTA');
        $GLOBALS['log']->fatal($app_list_strings['nombre_archivo_protocolo_leads_list']['1']);
        if($status != $status_anterior && $status=='Inactive'){
            $valor_doc_carga=$app_list_strings['nombre_archivo_protocolo_leads_list']['1'];

            //Obtiene información del usuario Inactivo
            $oficina=$bean->equipo_c;
            $id_usuario=$bean->id;

            //Obtiene todos los Leads del usuario Inactivo del tipo “Lead sin Contactar” y “Lead Contactado”
            $query = "SELECT l.id,lc.name_c FROM leads l INNER JOIN leads_cstm lc
            ON l.id=lc.id_c
            WHERE lc.tipo_registro_c='1' 
            AND lc.subtipo_registro_c IN ('1','2')
            AND l.assigned_user_id='{$id_usuario}'
            AND l.deleted='0'";
            
            $queryResult = $db->query($query);

            if($queryResult->num_rows > 0){
                $numero_leads=0;
                while ($row = $db->fetchByAssoc($queryResult)) {
                    $id_lead=$row['id'];
                    $beanLead = BeanFactory::getBean('Leads', $id_lead, array('disable_row_level_security' => true));
                    if(!empty($beanLead)){
                        //Todo: ¿A qué usuario se asigna provisionalmente?
                        $beanLead->oficina_c=$oficina;
                        $beanLead->nombre_de_cargar_c=$valor_doc_carga;
                        $beanLead->assigned_user_id="569246c7-da62-4664-ef2a-5628f649537e";//Usuario 9 - Sin Gestor
                        $beanLead->assigned_user_name="9 - Sin Gestor";//Usuario 9 - Sin Gestor
                        $beanLead->save();
                        $GLOBALS['log']->fatal("LEAD REGRESADO A LA BASE DE REASIGNACION AUTOMÁTICA: [".$beanLead->id."] Nombre: ".$beanLead->name_c);
                        $numero_leads+=1;
                    }                    
                }
                $GLOBALS['log']->fatal("NUMERO DE REGISTROS REGRESADOS A LA BASE DE REASIGNACIÓN AUTOMÁTICA PARA LEAD MANAGEMENT: ".$numero_leads);
            }
        }
    }

}