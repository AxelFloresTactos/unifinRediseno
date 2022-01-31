<?php
// ECB 07/01/2022 Valida RFC en Cuentas y Leads
class acct_valida_rfc
{
    function acct_valida_rfc($bean, $event, $arguments)
    {
		if($bean->rfc_c != '' && $bean->rfc_c != 'XXX010101XXX' && $bean->rfc_c != 'XXXX010101XXX') {
			global $db;
			require_once 'include/api/SugarApiException.php';
			$query = "select a.id from leads a, leads_cstm b where a.id = b.id_c and a.deleted = 0 and (a.account_id is null or a.account_id <> '{$bean->id}') and b.rfc_c = '{$bean->rfc_c}'";
			$queryResult = $db->query($query);
			if($db->getRowCount($queryResult) > 0) throw new SugarApiExceptionInvalidParameter('No se puede gurdar el registro. El RFC '.$bean->rfc_c.' ya exite en Leads, favor de corregir');
			$query = "select a.id from accounts a, accounts_cstm b where a.id = b.id_c and a.deleted = 0 and a.id <> '{$bean->id}' and b.rfc_c = '{$bean->rfc_c}'";
			$queryResult = $db->query($query);
			if($db->getRowCount($queryResult) > 0) throw new SugarApiExceptionInvalidParameter('No se puede gurdar el registro. El RFC '.$bean->rfc_c.' ya exite en Cuentas, favor de corregir');
		}
    }
}