<?php
    /**
     * Created by CVV
     * User: carmen.velasco@unifin.com.mx
     * Date: 19/10/2016
     * Modified: AF. 2019/05/06
     */

//Llena campos para el Centro de Prospección
$hook_array['before_save'][] = Array(
    1,
    'Llena campos para el Centro de Prospección',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'llenaCCP' // name of the function
);

//Crea nuevas reuniones para los invitados
$hook_array['after_relationship_add'][] = Array(
    1,
    'Create a new Meeting for companion',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'RelationAdd' // name of the function
);

//Guarda y actualiza objetivos específicos
$hook_array['after_save'][] = Array(
    2,
    'Apply Meeting/Objectives into Minuta',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'saveObjetivos' // name of the function
);

//Actualiza estado de reunión
$hook_array['after_save'][]=Array(
    1,
    'No se agrega a centro de prospección',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', //name of the class
    'modificaReunion' //name of the fuction
);

//Insertar valores a tabla custom de meetings_audit, la cual se creó pegándole directo a la base de datos
$hook_array['before_save'][] = Array(
    2,
    'Insertar registros a tabla de auditoría meetings_audit',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'insertAuditFields' // name of the function
);

//Insertar nuevo registro en tabla custom meetings_audit, manteniendo los valores de cuando se desvincula una cuenta de una reunión
$hook_array['after_relationship_delete'][] = Array(
    1,
    'Crea nuevo registro de auditoría para conocer desvinculación entre cuenta y reunión ',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'insertAuditUnlink' // name of the function
);

//Genera envío de correo para encuesta: CITA NO REALIZADA
/*$hook_array['before_save'][] = Array(
    3,
    'Envía correo para cita no realizada',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'surveyNotHeld' // name of the function
);*/

$hook_array['after_save'][] = Array(
    4,
    'Guarda valores del producto del usuario e invitados de la reunión',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks', // name of the class
    'guardaproductos' // name of the function
);

$hook_array['after_save'][] = Array(
    3,
    'cambiar estatus Cuenta',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks',
    'ProspectoContactado'
);

$hook_array['after_save'][] = Array(
    5,
    'Crea y actualiza reuniones en el calendario Outlook desde CRM mobile',
    'custom/modules/Meetings/integracion_outlook.php',
    'Integration_Mobile',
    'envia_graph'
);

$hook_array['after_save'][] = Array(
    6,
    'Convierte Lead',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks',
    'ConvierteLead'
);

$hook_array['before_save'][] = Array(
    4,
    'Funcion para guardar informacion del usuario logueado asi como asignado a la reunion CREADA.',
    'custom/modules/Meetings/meetings_hooks.php',
    'Meetings_Hooks',
    'InfoMeet'
);
