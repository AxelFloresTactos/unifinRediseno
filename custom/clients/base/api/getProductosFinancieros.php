<?php

/**
 * Created by JG.
 * User: tactos
 * Date: 24/11/20
 * Time: 02:17 PM
 */
class getProductosFinancieros extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'GETActivoAPI' => array(
                'reqType' => 'GET',
                'noLoginRequired' => false,
                'path' => array('GetProductosFinancieros', '?'),
                'pathVars' => array('module', 'tipoProd'),
                'method' => 'getcstmProdFinan',
                'shortHelp' => 'Obtiene los productos financieros por Tipo de Producto',
            ),
        );
    }

    public function getcstmProdFinan($api, $args)
    {
        $producto = empty($args['tipoProd']) ? '' : $args['tipoProd'];
        $arrayTProductos = preg_split("/\,/", $producto);
        $records_in = [];
        $TipoProductos = "";

        for ($i = 0; $i < count($arrayTProductos); $i++) {

            if ($i == 0) {
                $TipoProductos .= "tipo_producto = '{$arrayTProductos[$i]}'";
            } else {
                $TipoProductos .= "OR tipo_producto = '{$arrayTProductos[$i]}'";
            }
        }

        $selectProductos = "SELECT tipo_producto, producto_financiero,disponible_seleccion 
        FROM prod_estructura_productos WHERE {$TipoProductos}";

        $result = $GLOBALS['db']->query($selectProductos);

        while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
            $records_in[] = $row;
        }

        return $records_in;
    }
}
