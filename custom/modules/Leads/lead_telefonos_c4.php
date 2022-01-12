<?php
// ECB 07/01/2022 Consulta teléfonos en c4
class lead_telefonos_c4
{
    function lead_telefonos_c4($bean, $event, $arguments)
    {
		$telefonos = array();
		if($bean->phone_home) array_push($telefonos, $bean->phone_home);
		if($bean->phone_mobile) array_push($telefonos, $bean->phone_mobile);
		if($bean->phone_work) array_push($telefonos, $bean->phone_work);
		if($telefonos) {
			global $sugar_config;
			$url = $sugar_config['c4'].'/C4/list/';
			$content = json_encode(array("telefonos" => $telefonos));
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
			foreach($response['data'] as $telefono) {
				if(!empty($telefono['Telefono'])) {
					if($bean->phone_home == $telefono['Telefono']) $bean->c_estatus_telefono_c = '['.json_encode($telefono).']';
					if($bean->phone_mobile == $telefono['Telefono']) $bean->m_estatus_telefono_c = '['.json_encode($telefono).']';
					if($bean->phone_work == $telefono['Telefono']) $bean->o_estatus_telefono_c = '['.json_encode($telefono).']';
				}
			}
		}
    }
}