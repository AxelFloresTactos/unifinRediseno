<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("custom/Levementum/UnifinAPI.php");

class po_direcciones_class
{
    public function po_direcciones_function($bean, $event, $args)
    {
        global $current_user, $db;
        $current_id_list = array();

        if ($_REQUEST['module'] != 'Import' && $_SESSION['platform'] != 'unifinAPI') {

            foreach ($bean->prospects_direcciones as $direccion_row) {

                $direccion = BeanFactory::getBean('dire_Direccion', $direccion_row['id']);

                if (empty($direccion_row['id'])) {
                    //generar el guid
                    $guid = create_guid();
                    $direccion->id = $guid;
                    $direccion->new_with_id = true;
                    $new = true;
                } else {
                    $new = false;
                }
                $direccion->name = $direccion_row['calle'];
                //parse array to string for multiselects
                $tipo_string = "";
                if (count($direccion_row['tipodedireccion']) > 0) {
                    $tipo_string .= '^' . $direccion_row['tipodedireccion'][0] . '^';
                    for ($i = 1; $i < count($direccion_row['tipodedireccion']); $i++) {
                        $tipo_string .= ',^' . $direccion_row['tipodedireccion'][$i] . '^';
                    }
                }
                $direccion->tipodedireccion = $tipo_string;
                $direccion->calle = $direccion_row['calle'];
                $direccion->principal = ($direccion_row['principal'] == true); // ensure boolean conversion
                $direccion->inactivo = ($direccion_row['inactivo'] == true);
                $direccion->numint = $direccion_row['numint'];
                $direccion->numext = $direccion_row['numext'];
                $direccion->indicador = $direccion_row['indicador'];
                //teams
                $direccion->team_id = $bean->team_id;
                $direccion->team_set_id = $bean->team_set_id;
                $direccion->assigned_user_id = $bean->assigned_user_id;

                // populate related prospect id
                $direccion->prospects_dire_direccion_1prospects_ida = $bean->id;

                $nombre_colonia_query = "SELECT name from dire_colonia where id ='" . $direccion_row['colonia'] . "'";
                $nombre_municipio_query = "SELECT name from dire_municipio where id ='" . $direccion_row['municipio'] . "'";
                $querycolonia = $db->query($nombre_colonia_query);
                $coloniaName = $db->fetchByAssoc($querycolonia);
                $querymunicipio = $db->query($nombre_municipio_query);
                $municipioName = $db->fetchByAssoc($querymunicipio);
                $direccion_completa = $direccion_row['calle'] . " " . $direccion_row['numext'] . " " . ($direccion_row['numint'] != "" ? "Int: " . $direccion_row['numint'] : "") . ", Colonia " . $coloniaName['name'] . ", Municipio " . $municipioName['name'];
                $direccion->name = $direccion_completa;


                // update related records
                if ($direccion->load_relationship('dire_direccion_dire_pais')) {
                    if ($direccion_row['pais'] !== $direccion->dire_direccion_dire_paisdire_pais_ida) {
                        $direccion->dire_direccion_dire_pais->delete($direccion->id);
                        $direccion->dire_direccion_dire_pais->add($direccion_row['pais']);
                    }
                }

                if ($direccion->load_relationship('dire_direccion_dire_estado')) {
                    if ($direccion_row['estado'] !== $direccion->dire_direccion_dire_estadodire_estado_ida) {
                        $direccion->dire_direccion_dire_estado->delete($direccion->id);
                        $direccion->dire_direccion_dire_estado->add($direccion_row['estado']);
                    }
                }

                if ($direccion->load_relationship('dire_direccion_dire_municipio')) {
                    if ($direccion_row['municipio'] !== $direccion->dire_direccion_dire_municipiodire_municipio_ida) {
                        $direccion->dire_direccion_dire_municipio->delete($direccion->id);
                        $direccion->dire_direccion_dire_municipio->add($direccion_row['municipio']);
                    }
                }

                if ($direccion->load_relationship('dire_direccion_dire_ciudad')) {
                    if ($direccion_row['ciudad'] !== $direccion->dire_direccion_dire_ciudaddire_ciudad_ida) {
                        $direccion->dire_direccion_dire_ciudad->delete($direccion->id);
                        $direccion->dire_direccion_dire_ciudad->add($direccion_row['ciudad']);
                    }
                }

                if ($direccion->load_relationship('dire_direccion_dire_codigopostal')) {
                    try {
                        if ($direccion_row['postal'] !== $direccion->dire_direccion_dire_codigopostal) {
                            $direccion->dire_direccion_dire_codigopostal->delete($direccion->id);
                            $direccion->dire_direccion_dire_codigopostal->add($direccion_row['postal']);
                        }
                    } catch (Exception $e) {
                        $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : Error " . $e->getMessage());
                    }
                }

                if ($direccion->load_relationship('dire_direccion_dire_colonia')) {
                    if ($direccion_row['colonia'] !== $direccion->dire_direccion_dire_coloniadire_colonia_ida) {
                        $direccion->dire_direccion_dire_colonia->delete($direccion->id);
                        $direccion->dire_direccion_dire_colonia->add($direccion_row['colonia']);
                    }
                }

                $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : DIRECCION NOMBRE" . $direccion_completa);
                $current_id_list[] = $direccion->id;
                if ($new) {
                    $direccion->save();
                } else {
                    /*$inactivo = $direccion->inactivo == 1 ? $direccion->inactivo : 0;
                    $principal = $direccion->principal == 1 ? $direccion->principal : 0;
                    $query = <<<SQL
update dire_direccion set  name = '{$direccion->name}', tipodedireccion = '{$direccion->tipodedireccion}',indicador = '{$direccion->indicador}',  calle = '{$direccion->calle}', numext = '{$direccion->numext}', numint= '{$direccion->numint}', principal=$principal, inactivo =$inactivo  where id = '{$direccion->id}';
SQL;
                    try {
                        $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : Update *784 " . $query);
                        $resultado = $db->query($query);
                        $callApi = new UnifinAPI();
                        if ($direccion->sincronizado_unics_c == '0') {
                            $direccion = $callApi->insertaDireccion($direccion);
                        } else {
                            $direccion = $callApi->actualizaDireccion($direccion);
                        }
                        $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : resultado " . $db->getAffectedRowCount($resultado));
                    } catch (Exception $e) {
                        $GLOBALS['log']->fatal(__FILE__ . " - " . __CLASS__ . "->" . __FUNCTION__ . " <" . $current_user->user_name . "> : Error " . $e->getMessage());
                    }*/
                }
                //$direccion->save();
            }
            //retrieve all related records
            $bean->load_relationship('prospects_dire_direccion_1');
            foreach ($bean->prospects_dire_direccion_1->getBeans() as $a_direccion) {
                if (!in_array($a_direccion->id, $current_id_list)) {
                    //$a_direccion->mark_deleted($a_direccion->id);
                }
            }
        }
    }
}
