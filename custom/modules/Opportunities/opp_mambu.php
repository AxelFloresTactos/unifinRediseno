<?php
/**
 * Created by Adrian Arauz
 * User: root
 * Date: 23/04/2020
 *
 *
 * 1.-Validar que encodedkey_mambu_c de accounts no esté vacío
 * 2.-Validar que la solicitud recibida sea 8 (Uniclick), tenga estatus Autorizada y el tct_id_mambu_c este vacio
 * 3.-Crear body para peticion a UnifinApi (curl)
 * 4.-Hacer update al campo tct_id_mambu_c con el encodedKey recibido
 *
 */

class MambuLogic
{
    function create_LC($bean = null, $event = null, $args = null)
    {
        global $sugar_config,$db;
        //traer el bean de la cuenta para obtener el encodedkey_mambu_c
        $available_financiero=array("39","41","50","49","48","51");
        $beanCuenta = BeanFactory::retrieveBean('Accounts', $bean->account_id, array('disable_row_level_security' => true));
        if(in_array($bean->producto_financiero_c ,$available_financiero) && $bean->estatus_c=="N" && $beanCuenta->encodedkey_mambu_c!="" && $bean->tct_id_mambu_c=="") {
            $GLOBALS['log']->fatal("Inicia MambuLogic para creacion de Linea de credito Mambu");
            //Declara variables globales para la peticion del servicio Mambu
            $url=$sugar_config['url_mambu_gral'].'creditarrangements';
            $user=$sugar_config['user_mambu'];
            $pwd=$sugar_config['pwd_mambu'];
            $auth_encode=base64_encode( $user.':'.$pwd );
            //Transformacion campo date_entered (añade horas y -05:00)
            $timedate2 = new TimeDate();
            $datetime_startDate = $timedate2->fromDb($bean->date_entered);
            $fecha_creacion = date("c", strtotime($datetime_startDate));
            //$GLOBALS['log']->fatal("Fecha de creacion " .$fecha_creacion);
            //Corta los ultimos 6 caracteres del date_entered para añadirlos a la vigencia de linea
            $timezoneExp=substr($fecha_creacion, -6);
            //Para dar formato a la fecha necesario, ejemplo 2022-12-31T00:00:00-06:00
            //Concatena vigencia y añade terminacion 05:00
            $fechaexp=$bean->vigencialinea_c."T12:00:00".$timezoneExp;
            //$GLOBALS['log']->fatal("Fecha linea de expiracion ".$fechaexp);
            $producto_financiero_c = $bean->producto_financiero_c;
            $body = array(
                    "amount"=> $bean->monto_c,
                    "notes"=> $bean->name,
                    "holderKey"=> $beanCuenta->encodedkey_mambu_c,
                    "exposureLimitType"=> "APPROVED_AMOUNT",
                    "expireDate"=> $fechaexp,
                    "holderType"=> "GROUP",
                    "startDate"=> $fecha_creacion,
                    "_datos_linea_credito"=>array (
                    "id_linea_credito"=> $bean->id_linea_credito_c,
                    "monto_autorizado"=> $bean->amount
                    ),
                    "_productos"=> array(
                     $producto_financiero_c=>"TRUE"
                    )
            );
            $GLOBALS['log']->fatal('Petición: Mambu interacion '. json_encode($body));
            //Llama a UnifinAPI para que realice el consumo de servicio a Mambu
            $callApi = new UnifinAPI();
            $resultado = $callApi->postMambu($url,$body,$auth_encode);
            $GLOBALS['log']->fatal('Resultado: PEticion mambu integracion '. json_encode($resultado));
           if(!empty($resultado['encodedKey'])){
               $GLOBALS['log']->fatal('Ha realizado correctamente la linea de crédito a Mambu con la cuenta ' .$bean->name);
               $bean->tct_id_mambu_c=$resultado['encodedKey'];
               //Realiza update al campo tct_id_mambu_c con el valor del encodedKey
               $query = "UPDATE opportunities_cstm
                              SET tct_id_mambu_c ='".$resultado['encodedKey']."'
                              WHERE id_c = '".$bean->id."'";
               $queryResult = $db->query($query);
               //$GLOBALS['log']->fatal($query);
               //$GLOBALS['log']->fatal("Realiza actualizacion al campo id_mambu_c");
           }else{
               $GLOBALS['log']->fatal("Error al procesar la solicitud, verifique información");
           }
        }
    }
}
