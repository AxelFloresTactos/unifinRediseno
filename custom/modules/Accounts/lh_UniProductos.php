<?php

class clase_UniProducto
{
    public function func_UniProducto($bean = null, $event = null, $args = null)
    {
        $GLOBALS['log']->fatal("ACTUALIZA UNI PRODUCTOS CUSTOM ---- " );

        //Campo custom Uni Productos
        if ($GLOBALS['service']->platform != 'mobile') {
            $uniProducto = $bean->account_uni_productos;

            if (!empty($uniProducto)) {
                foreach ($uniProducto as $key) {
                    if ($key['id'] != '') {
                        // $GLOBALS['log']->fatal("Inserta Producto");
                        $beanUP = BeanFactory::retrieveBean('uni_Productos', $key['id'], array('disable_row_level_security' => true));
                        $beanUP->no_viable = $key['no_viable'];
                        $beanUP->no_viable_razon = $key['no_viable_razon'];
                        $beanUP->no_viable_razon_fp = $key['no_viable_razon_fp'];
                        $beanUP->no_viable_quien = $key['no_viable_quien'];
                        $beanUP->no_viable_porque = $key['no_viable_porque'];
                        $beanUP->no_viable_producto = $key['no_viable_producto'];
                        $beanUP->no_viable_razon_cf = $key['no_viable_razon_cf'];
                        $beanUP->no_viable_razon_ni = $key['no_viable_razon_ni'];
                        $beanUP->no_viable_otro_c = $key['no_viable_otro_c'];
                        $beanUP->assigned_user_id = $key['assigned_user_id'];
                        $beanUP->canal_c = $key['canal_c'] != "" ? $key['canal_c'] : "";
                        $beanUP->multilinea_c = $key['multilinea_c'];

                        $beanUP->save();
                    }

                    if (!$args['isUpdate']) {
                        // $GLOBALS['log']->fatal("bean id cuenta" . $bean->id);

                        if ($bean->load_relationship('accounts_uni_productos_1')) {
                            $listProductos = $bean->accounts_uni_productos_1->getBeans($bean->id, array('disable_row_level_security' => true));
                            foreach ($listProductos as $beanProducto) {

                                switch ($beanProducto->tipo_producto) {
                                    case 1:
                                        if ($key['producto'] == '1') {
                                            $beanProducto->multilinea_c = $key['multilinea_c'] == true ? 1 : 0;
                                        }
                                        break;
                                    case 3:
                                        if ($key['producto'] == '3') {
                                            $beanProducto->multilinea_c = $key['multilinea_c'] == true ? 1 : 0;
                                        }
                                        break;
                                    case 4:
                                        if ($key['producto'] == '4') {
                                            $beanProducto->multilinea_c = $key['multilinea_c'] == true ? 1 : 0;
                                        }
                                        break;
                                    case 6:
                                        if ($key['producto'] == '6') {
                                            $beanProducto->multilinea_c = $key['multilinea_c'] == true ? 1 : 0;
                                        }
                                        break;
                                    case 8:
                                        if ($key['producto'] == '8') {
                                            $beanProducto->multilinea_c = $key['multilinea_c'] == true ? 1 : 0;
                                            $beanProducto->canal_c = $key['canal_c'] != "" ? $key['canal_c'] : "0";
                                        }
                                        break;
                                    case 9:
                                        break;
                                }
                                $beanProducto->save();
                            }
                        }
                    }
                }
            }


        } else {
            $uniProducto = $bean->no_viable;

            if (!empty($uniProducto)) {

                foreach ($uniProducto as $key) {
                    // $GLOBALS['log']->fatal("ID_PRODUCTO", $key['id']);
                    if ($key['id'] != '') {
                        // $GLOBALS['log']->fatal("Inserta Producto");
                        $beanUP = BeanFactory::retrieveBean('uni_Productos', $key['id'], array('disable_row_level_security' => true));
                        $beanUP->no_viable = $key['no_viable'];
                        $beanUP->no_viable_razon = $key['no_viable_razon'];
                        $beanUP->no_viable_razon_fp = $key['no_viable_razon_fp'];
                        $beanUP->no_viable_quien = $key['no_viable_quien'];
                        $beanUP->no_viable_porque = $key['no_viable_porque'];
                        $beanUP->no_viable_producto = $key['no_viable_producto'];
                        $beanUP->no_viable_razon_cf = $key['no_viable_razon_cf'];
                        $beanUP->no_viable_razon_ni = $key['no_viable_razon_ni'];
                        $beanUP->no_viable_otro_c = $key['no_viable_otro_c'];
                        $beanUP->assigned_user_id = $key['assigned_user_id'];
                        $beanUP->canal_c = $key['canal_c'] != "" ? $key['canal_c'] : "";
                        $beanUP->multilinea_c = $key['multilinea_c'] != "" ? $key['multilinea_c'] : "";
                        $beanUP->save();
                        // $GLOBALS['log']->fatal("Termina de guardar datos de NV a UP");
                    }

                    if (!$args['isUpdate'] && $key['producto'] == '8') {
                        // $GLOBALS['log']->fatal("Esta creando producto uniclick");

                        if ($bean->load_relationship('accounts_uni_productos_1')) {
                            $listProductos = $bean->accounts_uni_productos_1->getBeans($bean->id, array('disable_row_level_security' => true));


                            foreach ($listProductos as $beanProducto) {
                                if ($beanProducto->tipo_producto == '8') {
                                    $beanProducto->canal_c = $key['canal_c'] != "" ? $key['canal_c'] : "0";
                                    $beanProducto->save();
                                }

                            }
                        }
                    }
                }

            }
        }

    }
}
