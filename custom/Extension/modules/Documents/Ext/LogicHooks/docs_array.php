<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/07/20
 * Time: 09:09 AM
 */
$hook_array['after_save'][] = Array(
    1,
    'Subir archivo a Google_drive con Id especificado',//Just a quick comment about the logic of it
    'custom/modules/Documents/Docs_hooks.php', //path to the logic hook
    'upload_documents', // name of the class
    'file_to_drive' // name of the function.
);

$hook_array['after_save'][] = array(
    2,
    'Integrar Dcoumento adjunto con Quantico',
    'custom/modules/Documents/Docs_hooks.php',
    'upload_documents',
    'upload_doc_quantico'
);
/*
$hook_array['after_save'][] = Array(
    2,
    'Establece campo check de cuenta para lanzar accion de notificación y adjuntar archivo a correo',
    'custom/modules/Documents/Docs_hooks.php', //path to the logic hook
    'upload_documents', // name of the class
    'set_field_to_notification' // name of the function.
);
*/
$hook_array['before_save'][] = Array(
    1,
    'Asociación de equipos CAC',//Just a quick comment about the logic of it
    'custom/modules/Documents/Docs_hooks.php', //path to the logic hook
    'upload_documents', // name of the class
    'set_team_cac' // name of the function.
);
