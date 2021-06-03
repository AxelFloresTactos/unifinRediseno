<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class GetAgenteCP extends SugarApi
{

    /**
     * Registro de todas las rutas para consumir los servicios del API
     *
     */
    public function registerApiRest()
    {
        return array(
            //GET
            'retrieve' => array(
                //request type
                'reqType' => 'GET',
                'noLoginRequired' => true,
                //endpoint path
                'path' => array('GetAgenteCP', '?'),
                //endpoint variables
                'pathVars' => array('method', 'idAgente'),
                //method to call
                'method' => 'getAgenteTelCP',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Método que regresa el id del asesor disponible para asignar un registro en Centro de Prospección',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),


        );
    }

    public function getAgenteTelCP($api, $args)
    {
        try {
            global $db;
            $idAgente = $args['idAgente'];

            $query = "SELECT value FROM config WHERE name = 'last_assigned_user'";
            $result = $db->query($query);
            $row = $db->fetchByAssoc($result);
            $last_indice = $row['value'];

            $new_assigned_user = "";

            $query_agente_oa = "SELECT equipo_c from users u INNER JOIN users_cstm uc ON uc.id_c = u.id
            where id = '{$idAgente}' AND puestousuario_c='27' AND subpuesto_c='3' AND u.status='Active'";

            $resultAgenteOA = $db->query($query_agente_oa);

            while ($row = $db->fetchByAssoc($resultAgenteOA)) {
                //Obtiene Equipo UNICS
                $equipoUNICS = $row['equipo_c'];
            }

            $query_asesores = "SELECT id,date_entered from users u INNER JOIN users_cstm uc ON uc.id_c=u.id
            where equipos_c like '%{$equipoUNICS}%'
            AND puestousuario_c='27' AND subpuesto_c='3' AND u.status='Active' ORDER BY date_entered ASC ";

            $result_usr = $db->query($query_asesores);
            //$usuarios=;
            while ($row = $db->fetchByAssoc($result_usr)) {
                //Obtiene fecha de inicio de reunión
                $users[] = $row['id'];
            }

            $new_indice = $last_indice >= count($users) - 1 ? 0 : $last_indice + 1;
            $new_assigned_user = $users[$new_indice];

            return $new_assigned_user;

        } catch (Exception $e) {

            $GLOBALS['log']->fatal("Error: " . $e->getMessage());
        }
    }
}
