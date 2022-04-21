<?php
// ECB 29/03/2022 Envía a Quantico Proveedores
class proveedor_quantico
{
    function proveedor_quantico($bean, $event, $arguments)
    {
		if(($bean->esproveedor_c || $bean->tipo_registro_cuenta_c == 5) && !$bean->proveedor_quantico_c) {
			if($bean->tipodepersona_c == "Persona Fisica") $regimen = 1;
			if($bean->tipodepersona_c == "Persona Fisica con Actividad Empresarial") $regimen = 2;
			if($bean->tipodepersona_c == "Persona Moral") $regimen = 3;
			$arreglo = array(
                "CRMId" => $bean->id,
                "Name" => $bean->name,
                "RFC" => $bean->rfc_c,
                "PersonTypeExternalId" => $regimen
            );
			global $sugar_config;
			$url = $sugar_config['quantico_url_base'].'/Suppliers_API/rest/SupplierAPI/CreateSupplierInQuantico/';
			$content = json_encode($arreglo);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_ENCODING, '');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POST, true);
          	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
          	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
			$result = curl_exec($ch);
			$response = json_decode($result, true);
			if($response['IsValid']) $bean->proveedor_quantico_c = 1;
		}
    }
}