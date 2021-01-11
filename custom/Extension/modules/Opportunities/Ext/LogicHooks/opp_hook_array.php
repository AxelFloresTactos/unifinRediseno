<?php
 /**
 * @file   opp_hook_array.php
 * @author trobinson@levementum.com
 * @date   6/3/2015 1:06 PM
 * @brief  opportunity logic hook array
 */

 $hook_array['before_save'][] = Array(
    1,
    'busca presolicitudes abiertas para un mismo cliente',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic',
    'buscaDuplicados'
);
/*
 $hook_array['before_save'][] = Array(
    2,
    'evey time a new team is added to the account record, All related opportunities get the new team',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'setTeams'
);*/

 $hook_array['before_save'][] = Array(
    3,
    'evey time a new team is added to the account record, All related opportunities get the new team',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'crearFolioSolicitud'
);


 $hook_array['before_save'][] = Array(
    4,
    'evey time a new team is added to the account record, All related opportunities get the new team',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'setFechadeCierre'
);

$hook_array['before_save'][] = Array(
    6,
    'Envia los datos de ratifiacion e incremento',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'AsignaCondicionesFinancieras'
);

$hook_array['before_save'][] = Array(
    5,
    'Envia los datos de ratifiacion e incremento',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'creaRatificacion'
);

$hook_array['after_save'][] = Array(
    9,
    'Establece campo tct_estapa_subetapa_txf_c con la concatenación entre campos tct_etapa_ddw_c y estatus_c',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'setEtapaSubetapa'
);

$hook_array['after_save'][] = Array(
    4,
    'evey time a new team is added to the account record, All related opportunities get the new team',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'creaSolicitud'
);

$hook_array['after_save'][] = Array(
    5,
    'Bitacora de cambios',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'bitacora_estatus'
);

$hook_array['before_save'][] = Array(
    11,
    'Actualizar estado de los campos de tipo de producto en la cuenta al avanzar en las etapas de solicitud',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'actualizatipoprod'
);

$hook_array['before_save'][] = Array(
    12,
    'Cancela Crédito SOS cuando Línea Leasing es cancelada',
    'custom/modules/Opportunities/opp_logic_hooks.php',
    'OpportunityLogic', // name of the class
    'cancelaSOS'
);

$hook_array['after_save'][] = Array(
    13,
    'Lanza petición a Unics cuando el producto es Unilease',
    'custom/modules/Opportunities/opp_unilease.php',
    'ProductUnilease', // name of the class
    'setUnicsUnilease'
);

$hook_array['after_save'][] = Array(
    10,
    'Crea linea de credito para producto Uniclick solamente',
    'custom/modules/Opportunities/opp_mambu.php',
    'MambuLogic', // name of the class
    'create_LC'
);

$hook_array['after_save'][] = Array(
    11,
    'Envía notificación a director de la solicitud',
    'custom/modules/Opportunities/opp_notificacion_director.php',
    'NotificacionDirector', // name of the class
    'notificaDirector'
);

$hook_array['after_save'][] = Array(
    12,
    'Envía notificación a asesor asignado cuando se cancela o autoriza solicitud',
    'custom/modules/Opportunities/opp_notificacion_director.php',
    'NotificacionDirector', // name of the class
    'notificaEstatusAsesor'
);

$hook_array['after_save'][] = Array(
    14,
    'Envía integracion Quantico de Leasing, Factoraje y CA',
    'custom/modules/Opportunities/opp_quantico.php',
    'IntegracionQuantico', // name of the class
    'QuanticoIntegracion'
);

$hook_array['after_save'][] = Array(
    15,
    'Actualizacion Quantico de Leasing, Factoraje y CA',
    'custom/modules/Opportunities/opp_quantico.php',
    'IntegracionQuantico', // name of the class
    'QuanticoUpdate'
);