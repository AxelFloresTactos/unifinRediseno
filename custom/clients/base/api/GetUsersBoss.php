<?php
/**
 * @author F. Javier G. Solar
 * Date: 31/07/2018
 * Time: 09:16 AM
 */

require_once('modules/ACLRoles/ACLRole.php');

class GetUsersBoss extends SugarApi
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
                'path' => array('GetUsersBoss', '?'),
                //endpoint variables
                'pathVars' => array('module', 'id_cuenta'),
                //method to call
                'method' => 'GetUserHeadByTeam',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Método GET para validar que cumpla con los datos necesarios para crear la solicitud',
                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),

        );

    }

    /**
     * Obtiene los Jefes y usuarios relacionados con la Cuenta
     *
     * Método que obtiene los jefes y usuarios relacionados con una Cuenta y compara
     * con el usuario firmado para otorgar permisos de visibilidad sonbre el campo correo y teléfonos
     *
     * @param array $api
     * @param array $args Array con los parámetros enviados para su procesamiento
     * @return bander true o false
     * @throws SugarApiExceptionInvalidParameter
     */
    public function GetUserHeadByTeam($api, $args)
    {
        $GLOBALS['log']->fatal("GetUserBoss");

        $flag = false;
        $idCuenta = $args['id_cuenta'];
        $beanAccounts = BeanFactory::getBean("Accounts", $idCuenta);
        global $current_user;
        global $app_list_strings;

        $usrLeasing = $beanAccounts->user_id_c;
        $usrFactoraje = $beanAccounts->user_id1_c;
        $usrCredito = $beanAccounts->user_id2_c;
        $usuarioLog = $current_user->id;
        $queryR = "Select R.id, R.name
 from acl_roles R
 left join acl_roles_users RU
 on  RU.role_id=R.id
 Where RU.user_id='{$usuarioLog}' and RU.deleted=0";


        /*
         * Validamos si el usuario Firmado es igual a credito, factoraje y leasing.
         * Modificación para obtener padres e hijos del usuario logueado. Adrian Arauz 3/10/2018
        **/

        if ($usuarioLog == $usrLeasing || $usuarioLog == $usrFactoraje || $usuarioLog == $usrCredito) {
            $flag = true;
        }


        if ($flag == false)  {
            $query = "select id from (select * from users order by reports_to_id,id) users_sorted,
                (select @pv :='{$usuarioLog}') iniatialisation
                where find_in_set(reports_to_id, @pv)
                and length(@pv := concat(@pv,',',id));";

            $result = $GLOBALS['db']->query($query);
            while ($row = $GLOBALS['db']->fetchByAssoc($result)){
                if (  $row['id'] == $usrLeasing ||  $row['id'] == $usrFactoraje ||  $row['id'] ==$usrCredito) {
                    $flag = true;
                }
            }
        }
            $GLOBALS['log']->fatal("GetUserBoss-3");
        if ($app_list_strings['full_access_accounts_list'] != "" && $flag == false) {

            $list = $app_list_strings['full_access_accounts_list'];
            $result = $GLOBALS['db']->query($queryR);

            while ($row = $GLOBALS['db']->fetchByAssoc($result)) {

                $temp = $row['name'];

                foreach ($list as $newList) {

                    if ($row['name'] == $newList) {
                        $flag = true;
                        //  $GLOBALS['log']->fatal("coincide: " . $row['name']);
                    }

                }
            }
        }
        $GLOBALS['log']->fatal("GetUserBoss-4");
        if ($current_user->is_admin == true) {
          $flag = true;
        }
        return $flag;

    }


}
