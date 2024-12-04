<?php
/**
 * User: salvadorlopez
 * Date: 24/08/2023
 */
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class SendEmailPO extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'sendEmailPo' => array(
                'reqType' => 'GET',
                'noLoginRequired' => true,
                'path' => array('SendEmailPO','?'),
                'pathVars' => array('method','id_po'),
                'method' => 'sendEmailProspect',
                'shortHelp' => 'Envía notificación por email a respectivos usuarios en proceso de Público Objetivo',
            ),
            'autorizacionPO' => array(
                'reqType' => 'GET',
                'noLoginRequired' => true,
                'path' => array('AutorizaEnvioPO','?'),
                'pathVars' => array('method','id_po'),
                'method' => 'autorizaEnvioCorreo',
                'shortHelp' => 'Envía correo a través de la aprobación del director del PO',
            ),
            'rechazoPO' => array(
                'reqType' => 'GET',
                'noLoginRequired' => true,
                'path' => array('RechazaEnvioPO','?'),
                'pathVars' => array('method','id_po'),
                'method' => 'rechazaEnvioCorreo',
                'shortHelp' => 'Envía correo a través del rechazo del director del PO',
            ),
        );
    }


    public function sendEmailProspect($api, $args)
    {
        global $sugar_config;
        $url_unileasing = $sugar_config['url_unileasing_email'];
        $id_prospecto = $args['id_po'];
        $response = "";
        $beanPO = BeanFactory::retrieveBean('Prospects', $id_prospecto, array('disable_row_level_security' => true));
        $linkPO=$GLOBALS['sugar_config']['site_url'].'/#Prospects/'.$id_prospecto;
        $nombreEmpresa = $beanPO->empresa_po_c;
        $email_po = $beanPO->email1;

        $envio_previo = $beanPO->envio_correo_po_c;
        $id_asesor = $beanPO->assigned_user_id;
        $beanAsesor = BeanFactory::retrieveBean('Users', $id_asesor, array('disable_row_level_security' => true));
        $asesorName = $beanAsesor->first_name . " " . $beanAsesor->last_name;
        $telefono_asesor = $beanAsesor->phone_mobile;
        $email_asesor = $beanAsesor->email1;


        $id_director_regional = $this->getIdDirectorRegional($beanAsesor);
        $id_director_comercial = $this->getIdDirectorComercial($beanAsesor);

        $name_regional = "";
        $email_regional = "";

        $name_comercial = "";
        $email_comercial = "";
        
        if($id_director_regional != ""){
            $info_regional = $this->getInfoUser($id_director_regional);
            $name_regional = $info_regional['name'];
            $email_regional = $info_regional['email'];
        }

        if($id_director_comercial != ""){
            $info_comercial = $this->getInfoUser($id_director_comercial);
            $name_comercial = $info_comercial['name'];
            $email_comercial = $info_comercial['email'];
        }

        if( $envio_previo ){

            //$response = "SI HAY ENVIO PREVIO: Enviar correo al director de asesor comercial y cc: director regional. Contenido: Email VoBo Director PO";
            $body_mail = $this->buildBodyEmailVoBo( $name_comercial, $asesorName, $beanPO->name, $linkPO  );
            //Enviando correo
            //ToDO: Antes de enviar, validar que si se haya encontrado un director para enviar notificación y no se intenta mandar correo a una dirección vacía
            if( $email_comercial != "" || $email_regional != ""){
                $this->sendEmailNotificationPO( $nombre_empresa, $email_comercial, $name_comercial, $email_regional, $name_regional, $body_mail );
                $response = "Se envió notificación a: ". $name_comercial. " y " .$name_regional; 
            }else{
                $response = "No existe Director Comercial al que se le pueda enviar notificación"; 
            }
            $beanPO->id_director_vobo_c = $id_director_comercial;
            $beanPO->save();

        }else{
            //No hay envío previo
            $link_unileasing = $url_unileasing . "/api/crm/contact/create?crm_id=".$id_prospecto."&assessor_id=".$id_asesor;

            $body_mail = $this->buildBodyPO( $beanPO->name, $link_unileasing, $asesorName, $telefono_asesor, $email_asesor );

            $GLOBALS['log']->fatal("El correo del PO es: ".$email_po);
            $GLOBALS['log']->fatal("El correo del Asesor es: ".$email_asesor);

            if( !empty($email_po) ){
                $this->sendEmailNotificationToProspect( $body_mail, $email_po, $beanPO->name );
                $response = "<br>Se envió notificación al Público Objetivo: ". $beanPO->name; 
            }

            //Enviando correo al asesor cc a Director Comercial y Director Regional
            $body_mail_asesor = $this->buildBodyNotificationAsesor( $asesorName, $beanPO->name );

            if( !empty($email_asesor) ){
                $this->sendEmailAsesorPO( $body_mail_asesor, $nombreEmpresa ,$email_asesor, $asesorName, $email_comercial, $name_comercial, $email_regional, $name_regional );
                $response .= "<br>Se envió notificación a: ". $asesorName. " , " .$name_comercial. " , ".$name_regional; 
            }

            //Se establece bandera para indicar que ya se ha enviado el correo previamente
            //Se establece id del director al que se le envió la notificación para que éste tenga la facultad de dar el VoBo o Rechazar
            $beanPO->envio_correo_po_c = 1;
            $beanPO->id_director_vobo_c = $id_director_comercial;
            $beanPO->save();
            
        }
        
        return $response;

    }

    public function autorizaEnvioCorreo($api, $args){
        
        global $sugar_config;
        $url_unileasing = $sugar_config['url_unileasing_email'];
        $id_prospecto = $args['id_po'];
        $response = '';

        $beanPO = BeanFactory::retrieveBean('Prospects', $id_prospecto, array('disable_row_level_security' => true));
        $email_po = $beanPO->email1;

        $id_asesor = $beanPO->assigned_user_id;
        $beanAsesor = BeanFactory::retrieveBean('Users', $id_asesor, array('disable_row_level_security' => true));
        $asesorName = $beanAsesor->first_name . " " . $beanAsesor->last_name;
        $telefono_asesor = $beanAsesor->phone_mobile;
        $email_asesor = $beanAsesor->email1;

        $id_director_regional = $this->getIdDirectorRegional($beanAsesor);
        $id_director_comercial = $this->getIdDirectorComercial($beanAsesor);

        $name_regional = "";
        $email_regional = "";

        $name_comercial = "";
        $email_comercial = "";
        
        if($id_director_regional != ""){
            $info_regional = $this->getInfoUser($id_director_regional);
            $name_regional = $info_regional['name'];
            $email_regional = $info_regional['email'];
        }

        if($id_director_comercial != ""){
            $info_comercial = $this->getInfoUser($id_director_comercial);
            $name_comercial = $info_comercial['name'];
            $email_comercial = $info_comercial['email'];
        }

        $link_unileasing = $url_unileasing . "/api/crm/contact/create?crm_id=".$id_prospecto."&assessor_id=".$id_asesor;

        $body_mail = $this->buildBodyPO( $beanPO->name, $link_unileasing, $asesorName, $telefono_asesor, $email_asesor );

        $GLOBALS['log']->fatal("El correo del PO es: ".$email_po);
        $GLOBALS['log']->fatal("El correo del Asesor es: ".$email_asesor);

        if( !empty($email_po) ){
            $this->sendEmailNotificationToProspect( $body_mail, $email_po, $beanPO->name );
            $response = "<br>Se envió notificación al Público Objetivo: ". $beanPO->name; 
        }

        //Enviando correo al asesor cc a Director Comercial y Director Regional
        $body_mail_asesor = $this->buildBodyNotificationAsesor( $asesorName, $beanPO->name );

        if( !empty($email_asesor) ){
            $this->sendEmailAsesorPO( $body_mail_asesor, $nombreEmpresa ,$email_asesor, $asesorName, $email_comercial, $name_comercial, $email_regional, $name_regional );
            $response .= "<br>Se envió notificación a: ". $asesorName. " , " .$name_comercial. " , ".$name_regional; 
        }

        //Resetea banderas
        $GLOBALS['log']->fatal('Reestableciendo banderas');
        //$beanPO->envio_correo_po_c = 0;
        $beanPO->id_director_vobo_c = "";
        $beanPO->save();
        $GLOBALS['log']->fatal('Banderas reestablecidas');
        
        return $response;
    }

    public function rechazaEnvioCorreo($api, $args){
        $id_prospecto = $args['id_po'];
        $response = '';

        $beanPO = BeanFactory::retrieveBean('Prospects', $id_prospecto, array('disable_row_level_security' => true));
        $nombreEmpresa = $beanPO->empresa_po_c;
        $email_po = $beanPO->email1;

        $id_asesor = $beanPO->assigned_user_id;
        $beanAsesor = BeanFactory::retrieveBean('Users', $id_asesor, array('disable_row_level_security' => true));
        $asesorName = $beanAsesor->first_name . " " . $beanAsesor->last_name;
        $telefono_asesor = $beanAsesor->phone_mobile;
        $email_asesor = $beanAsesor->email1;

        $id_director_regional = $this->getIdDirectorRegional($beanAsesor);
        $id_director_comercial = $this->getIdDirectorComercial($beanAsesor);

        $name_regional = "";
        $email_regional = "";

        $name_comercial = "";
        $email_comercial = "";
        
        if($id_director_regional != ""){
            $info_regional = $this->getInfoUser($id_director_regional);
            $name_regional = $info_regional['name'];
            $email_regional = $info_regional['email'];
        }

        if($id_director_comercial != ""){
            $info_comercial = $this->getInfoUser($id_director_comercial);
            $name_comercial = $info_comercial['name'];
            $email_comercial = $info_comercial['email'];
        }

        $body_correo_rechazo = $this->buildBodyRechazo( $asesorName, $beanPO->name );

        if( !empty($email_asesor) ){
            $this->sendEmailNotificationRechazo( $body_correo_rechazo, $nombreEmpresa ,$email_asesor, $asesorName, $email_comercial, $name_comercial, $email_regional, $name_regional );
            $response = "<br>Se envió notificación de rechazo a: ". $asesorName; 
        }

        //Resetea banderas
        $GLOBALS['log']->fatal('Reestablece id de director y permanece bandera de envío previo');
        //$beanPO->envio_correo_po_c = 0;
        $beanPO->id_director_vobo_c = "";
        $beanPO->save();
        $GLOBALS['log']->fatal('Banderas reestablecidas');

        return $response;
        //buildBodyRechazo( $nombre_asesor, $nombre_po )
    }

    public function getIdDirectorRegional( $beanAsesor ){

        $equipo_principal_asesor = $beanAsesor->equipo_c;
        $id_regional = "";
        $qGetDirectorRegional = "SELECT id_c,posicion_operativa_c,uc.equipos_c FROM users u 
        INNER JOIN users_cstm uc 
        ON u.id = uc.id_c
        AND uc.posicion_operativa_c LIKE '%^2^%' AND uc.equipos_c LIKE '%^{$equipo_principal_asesor}^%'
        WHERE u.status = 'Active' AND u.deleted=0";

        $GLOBALS['log']->fatal("Query DIRECTOR REGIONAL");
        $GLOBALS['log']->fatal($qGetDirectorRegional);

        $resultadoRegional = $GLOBALS['db']->query($qGetDirectorRegional);

        if ($resultadoRegional->num_rows > 0) {

            while ($row = $GLOBALS['db']->fetchByAssoc($resultadoRegional)) {
                $id_regional = $row['id_c'];
            }

        }

        return $id_regional;

    }

    public function getIdDirectorComercial( $beanAsesor ){

        $equipo_principal_asesor = $beanAsesor->equipo_c;
        $id_comercial = "";
        $qGetDirectorComercial = "SELECT id_c,posicion_operativa_c,uc.equipos_c FROM users u 
        INNER JOIN users_cstm uc 
        ON u.id = uc.id_c
        AND uc.posicion_operativa_c LIKE '%^1^%' AND uc.equipos_c LIKE '%^{$equipo_principal_asesor}^%'
        WHERE u.status = 'Active' AND u.deleted=0";

        $GLOBALS['log']->fatal("Query DIRECTOR COMERCIAL (Director Equipo)");
        $GLOBALS['log']->fatal($qGetDirectorComercial);

        $resultadoComercial = $GLOBALS['db']->query($qGetDirectorComercial);

        if ($resultadoComercial->num_rows > 0) {

            while ($row = $GLOBALS['db']->fetchByAssoc($resultadoComercial)) {
                $id_comercial = $row['id_c'];
            }

        }

        return $id_comercial;

    }

    public function getInfoUser( $id_user ){

        $beanUser = BeanFactory::retrieveBean('Users', $id_user, array('disable_row_level_security' => true));
        $emailUser = $beanUser->email1;
        $first_name = $beanUser->first_name;
        $last_name = $beanUser->last_name;
        $user = [];
        $user['name'] =  $first_name." ".$last_name;
        $user['email'] = $emailUser;

        return $user;
    }

    public function buildBodyEmailVoBo( $nombre_director, $nombre_asesor,$nombre_po, $link_po ){

        $mailHTML = '<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            .desktop_hide,
            .desktop_hide table {
                mso-hide: all;
                display: none;
                max-height: 0px;
                overflow: hidden;
            }

            .image_block img+div {
                display: none;
            }

            @media (max-width:620px) {
                .mobile_hide {
                    display: none;
                }

                .row-content {
                    width: 100% !important;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }

                .mobile_hide {
                    min-height: 0;
                    max-height: 0;
                    max-width: 0;
                    overflow: hidden;
                    font-size: 0px;
                }

                .desktop_hide,
                .desktop_hide table {
                    display: table !important;
                    max-height: none !important;
                }

                .row-1 .column-1 .block-1.paragraph_block td.pad>div,
                .row-3 .column-1 .block-1.paragraph_block td.pad>div,
                .row-5 .column-1 .block-1.paragraph_block td.pad>div,
                .row-7 .column-1 .block-1.paragraph_block td.pad>div {
                    text-align: center !important;
                    font-size: 14px !important;
                }

                .row-1 .column-1 .block-1.paragraph_block td.pad,
                .row-3 .column-1 .block-1.paragraph_block td.pad,
                .row-5 .column-1 .block-1.paragraph_block td.pad,
                .row-7 .column-1 .block-1.paragraph_block td.pad {
                    padding: 20px 35px !important;
                }

                .row-1 .column-1,
                .row-3 .column-1,
                .row-4 .column-1,
                .row-5 .column-1,
                .row-6 .column-1,
                .row-7 .column-1 {
                    padding: 0 !important;
                }
            }
        </style>
    </head>
    <body style="background-color: #e4e7e7; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e4e7e7;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #56adff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad">
                                                                    <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:6px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:9px;"> </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:15px;padding-left:50px;padding-top:40px;width:100%;padding-right:0px;">
                                                                    <div align="left" class="alignment" style="line-height:10px"><img src="cid:Recurso-1unileasingazul" style="display: block; height: auto; border: 0; max-width: 240px; width: 100%;" width="240"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:25px;padding-left:50px;padding-right:50px;padding-top:25px;">
                                                                    <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:24px;">
                                                                        <p style="margin: 0; margin-bottom: 16px;">Hola, <strong>' . $nombre_director . '</strong></p>
                                                                        <p style="margin: 0; margin-bottom: 16px;">El asesor a tu cargo, <strong>' . $nombre_asesor . ',</strong> necesita tu visto bueno para enviar una vez más el correo de registro en la plataforma a su prospecto: <strong>' . $nombre_po . '.</strong></p>
                                                                        <p style="margin: 0;">En la siguiente liga podrás autorizar o rechazar el envío:</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="10" cellspacing="0" class="button_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td class="pad">
                                                                    <div align="center" class="alignment"><!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" style="height:42px;width:115px;v-text-anchor:middle;" arcsize="65%" stroke="false" fillcolor="#56adff"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
                                                                        <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#56adff;border-radius:27px;width:auto;border-top:0px solid transparent;font-weight:400;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="word-break: break-word; line-height: 32px;"><a id="linkPO" href="' . $link_po . '"><strong>Click aquí</strong></a></span></span></div><!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                <tr>
                                                                    <td class="pad" style="padding-bottom:25px;padding-left:50px;padding-right:50px;padding-top:25px;">
                                                                        <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:24px;">
                                                                            <p style="margin: 0;">Atentamente, UNIFIN.</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 15px; padding-right: 15px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                <tr>
                                                                    <td class="pad" style="padding-bottom:20px;width:100%;">
                                                                        <div align="center" class="alignment" style="line-height:10px"><img src="cid:Copia_de_Recurso-2unileasingazulLOW" style="display: block; height: auto; border: 0; max-width: 102px; width: 100%;" width="102"/></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #dde1e9; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                <tr>
                                                                    <td class="pad" style="padding-bottom:25px;padding-left:30px;padding-right:30px;padding-top:25px;">
                                                                        <div style="color:#000000;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:14.399999999999999px;">
                                                                            <p style="margin: 0;"><em>Información confidencial y exclusiva para uso interno de Unifin.</em></p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table><!-- End -->
        </body>';


        return $mailHTML;

    }

    public function buildBodyPO( $nombre_po, $link_unileasing, $nombre_asesor, $telefono, $correo_asesor ){

        $mailHTML = '<head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
            <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0;
                    padding: 0;
                }

                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: inherit !important;
                }

                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                }

                p {
                    line-height: inherit
                }

                .desktop_hide,
                .desktop_hide table {
                    mso-hide: all;
                    display: none;
                    max-height: 0px;
                    overflow: hidden;
                }

                .image_block img+div {
                    display: none;
                }

                @media (max-width:620px) {
                    .social_block.desktop_hide .social-table {
                        display: inline-block !important;
                    }

                    .mobile_hide {
                        display: none;
                    }

                    .row-content {
                        width: 100% !important;
                    }

                    .stack .column {
                        width: 100%;
                        display: block;
                    }

                    .mobile_hide {
                        min-height: 0;
                        max-height: 0;
                        max-width: 0;
                        overflow: hidden;
                        font-size: 0px;
                    }

                    .desktop_hide,
                    .desktop_hide table {
                        display: table !important;
                        max-height: none !important;
                    }

                    .row-1 .column-1 .block-1.paragraph_block td.pad>div,
                    .row-3 .column-1 .block-1.paragraph_block td.pad>div,
                    .row-3 .column-1 .block-2.paragraph_block td.pad>div,
                    .row-3 .column-1 .block-4.paragraph_block td.pad>div,
                    .row-4 .column-1 .block-1.paragraph_block td.pad>div,
                    .row-7 .column-1 .block-1.paragraph_block td.pad>div {
                        text-align: center !important;
                        font-size: 14px !important;
                    }

                    .row-1 .column-1 .block-1.paragraph_block td.pad,
                    .row-3 .column-1 .block-1.paragraph_block td.pad,
                    .row-3 .column-1 .block-2.paragraph_block td.pad,
                    .row-3 .column-1 .block-4.paragraph_block td.pad,
                    .row-4 .column-1 .block-1.paragraph_block td.pad,
                    .row-7 .column-1 .block-1.paragraph_block td.pad {
                        padding: 20px 35px !important;
                    }

                    .row-1 .column-1,
                    .row-3 .column-1,
                    .row-4 .column-1,
                    .row-5 .column-1,
                    .row-6 .column-1,
                    .row-7 .column-1 {
                        padding: 0 !important;
                    }
                }
            </style>
        </head>
        <body style="background-color: #e4e7e7; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
            <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e4e7e7;" width="100%">
                <tbody>
                    <tr>
                        <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #56adff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                <tr>
                                                                    <td class="pad">
                                                                        <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:6px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:center;mso-line-height-alt:9px;"> </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #083566; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                <tr>
                                                                    <td class="pad" style="padding-bottom:15px;padding-left:50px;padding-top:40px;width:100%;padding-right:0px;">
                                                                        <div align="left" class="alignment" style="line-height:10px"><img src="cid:Recurso_1unileasingbco" style="display: block; height: auto; border: 0; max-width: 240px; width: 100%;" width="240"/></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #083566; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                <tbody>
                                                    <tr>
                                                        <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                <tr>
                                                                    <td class="pad" style="padding-bottom:10px;padding-left:50px;padding-right:50px;padding-top:25px;">
                                                                        <div style="color:#fff;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:left;mso-line-height-alt:24px;">
                                                                            <p style="margin: 0;">Hola <strong>'. $nombre_po.'</strong></p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                <tr>
                                                                    <td class="pad" style="padding-bottom:20px;padding-left:50px;padding-right:50px;padding-top:15px;">
                                                                        <div style="color:#fff;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:24px;">
                                                                            <p style="margin: 0;">Para continuar con tu solicitud es necesario que te <strong>registres</strong> en el sitio de UniLeasing® haciendo click en el siguiente enlace:<br>
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table border="0" cellpadding="10" cellspacing="0" class="button_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                <tr>
                                                                    <td class="pad">
                                                                        <div align="center" class="alignment"><!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" style="height:43px;width:136px;v-text-anchor:middle;" arcsize="63%" stroke="false" fillcolor="#56adff"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
                                                                            <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#56adff;border-radius:27px;width:auto;border-top:0px solid transparent;font-weight:400;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;">
                                                                            <span style="word-break: break-word; line-height: 32px;">
                                                                                <a id="linkPO" href="' . $link_unileasing . '"><strong>UniLeasing®<br></strong></a>
                                                                            </span>
                                                                            </span></div><!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </table>
                                                                <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:20px;padding-left:50px;padding-right:50px;padding-top:15px;">
                                                                            <div style="color:#fff;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:24px;">
                                                                                <p style="margin: 0;">Si tienes alguna duda contacta a tu Asesor:</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #083566; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:15px;padding-left:50px;padding-right:40px;padding-top:10px;">
                                                                            <div style="color:#fff;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:center;mso-line-height-alt:24px;">
                                                                                <p style="margin: 0; margin-bottom: 12px;"><strong>'. $nombre_asesor.'</strong></p>
                                                                                <p style="margin: 0; margin-bottom: 12px;"><strong>Teléfono celular: '. $telefono.'</strong></p>
                                                                                <p style="margin: 0;"><strong>Correo electrónico: '.$correo_asesor.'</strong></p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #083566; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 15px; padding-right: 15px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="social_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="text-align:center;padding-right:0px;padding-left:0px;">
                                                                            <div align="center" class="alignment">
                                                                                <table border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;" width="156px">
                                                                                    <tr>
                                                                                        <td style="padding:0 10px 0 10px;"><a href="tel:800 211 9000" target="_blank"><img alt="Teléfono" height="32" src="cid:46854_1" style="display: block; height: auto; border: 0;" title="Teléfono" width="32"/></a></td>
                                                                                        <td style="padding:0 10px 0 10px;"><a href="mailto:atencionaclientes@unifin.com.mx" target="_blank"><img alt="E-mail" height="32" src="cid:2989993" style="display: block; height: auto; border: 0;" title="E-mail" width="32"/></a></td>
                                                                                        <td style="padding:0 10px 0 10px;"><a href="https://mx.linkedin.com/company/unifin-financiera" target="_blank"><img alt="Linkedin" height="32" src="cid:linkedin" style="display: block; height: auto; border: 0;" title="Linkedin" width="32"/></a></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #083566; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:40px;padding-top:15px;width:100%;">
                                                                            <div align="center" class="alignment" style="line-height:10px"><img src="cid:Recurso_2unileasingbcoLOW" style="display: block; height: auto; border: 0; max-width: 102px; width: 100%;" width="102"/></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #dde1e9; color: #000; width: 600px; margin: 0 auto;" width="600">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:25px;padding-left:30px;padding-right:30px;padding-top:25px;">
                                                                            <div style="color:#000000;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:9px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:justify;mso-line-height-alt:10.799999999999999px;">
                                                                                
                                                                                <p style="margin: 0;">&nbsp;</p>
                                                                                <p style="margin: 0;"><em>Este documento contiene información privilegiada y es para el uso exclusivo del (os) destinatario(s) previsto(s). El usuario acepta y reconoce que es responsable de resguardar sus claves, contraseñas y códigos de autenticación para el acceso al Portal UniLeasing, por lo que será de su entera responsabilidad tomar las medidas de seguridad necesarias para evitar el acceso indebido de terceras personas a estos, liberando a Unifin Financiera, S.A.B. de C.V y/o sus subsidiarias (“Unifin”) de cualquier responsabilidad relacionada con el mal uso de los mismos. No se permite la reproducción total o parcial, ni su almacenamiento en un sistema informático, ni su transmisión en cualquier forma o por cualquier medio electrónico, mecánico, fotocopia u otros métodos, sin el permiso del editor. Queda prohibida la divulgación o distribución y revisión o uso no autorizado, comunicación pública y transformación de esta información sin contar con la autorización expresa de Unifin. El uso de imágenes, fragmentos de videos y demás material que sea objeto de protección de los derechos de autor, así como la reproducción, edición, mutilación, modificación, o transformación será perseguido y sancionado por el respectivo titular de los Derechos de Autor, sin menoscabo del ejercicio de los derechos patrimoniales del titular. Las marcas, logotipos, leyendas, denominaciones, modelos, diseños, dibujos y/o gráficos y los derechos de autor correspondientes son propiedad de Unifin con Domicilio en: Av. Presidente Masaryk 111-5, Colonia Polanco V sección, Alcaldía Miguel Hidalgo, Ciudad de México. Todos los Derechos Reservados UNIFIN © 2023.</em></p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table><!-- End -->
            </body>';


        return $mailHTML;
    }

    public function buildBodyNotificationAsesor( $nombre_asesor, $nombre_po ){
        
        $mailHTML = '<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            .desktop_hide,
            .desktop_hide table {
                mso-hide: all;
                display: none;
                max-height: 0px;
                overflow: hidden;
            }

            .image_block img+div {
                display: none;
            }

            @media (max-width:620px) {
                .mobile_hide {
                    display: none;
                }

                .row-content {
                    width: 100% !important;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }

                .mobile_hide {
                    min-height: 0;
                    max-height: 0;
                    max-width: 0;
                    overflow: hidden;
                    font-size: 0px;
                }

                .desktop_hide,
                .desktop_hide table {
                    display: table !important;
                    max-height: none !important;
                }

                .row-1 .column-1 .block-1.paragraph_block td.pad>div,
                .row-3 .column-1 .block-1.paragraph_block td.pad>div,
                .row-5 .column-1 .block-1.paragraph_block td.pad>div {
                    text-align: center !important;
                    font-size: 14px !important;
                }

                .row-1 .column-1 .block-1.paragraph_block td.pad,
                .row-3 .column-1 .block-1.paragraph_block td.pad,
                .row-5 .column-1 .block-1.paragraph_block td.pad {
                    padding: 20px 35px !important;
                }

                .row-1 .column-1,
                .row-3 .column-1,
                .row-4 .column-1,
                .row-5 .column-1 {
                    padding: 0 !important;
                }
            }
        </style>
    </head>
    <body style="background-color: #e4e7e7; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e4e7e7;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #56adff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad">
                                                                    <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:6px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:9px;"> </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:15px;padding-left:50px;padding-top:40px;width:100%;padding-right:0px;">
                                                                    <div align="left" class="alignment" style="line-height:10px"><img src="cid:Recurso-1unileasingazul" style="display: block; height: auto; border: 0; max-width: 240px; width: 100%;" width="240"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:25px;padding-left:50px;padding-right:50px;padding-top:25px;">
                                                                    <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:24px;">
                                                                        <p style="margin: 0; margin-bottom: 16px;">Hola, <strong>'.$nombre_asesor.'</strong></p>
                                                                        <p style="margin: 0; margin-bottom: 16px;">Te informamos que a tu prospecto: <strong>'.$nombre_po.'</strong> le fue enviado el enlace para su registro en la plataforma UniLeasing®.</p>
                                                                        <p style="margin: 0; margin-bottom: 16px;">Es importante que lo contactes a la brevedad para dar seguimiento a su solicitud.</p>
                                                                        <p style="margin: 0;">Atentamente, UNIFIN.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 15px; padding-right: 15px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:20px;width:100%;">
                                                                    <div align="center" class="alignment" style="line-height:10px"><img src="cid:Copia_de_Recurso-2unileasingazulLOW" style="display: block; height: auto; border: 0; max-width: 102px; width: 100%;" width="102"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #dde1e9; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:25px;padding-left:30px;padding-right:30px;padding-top:25px;">
                                                                    <div style="color:#000000;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:14.399999999999999px;">
                                                                        <p style="margin: 0;"><em>Información confidencial y exclusiva para uso interno de Unifin.</em></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>';


        return $mailHTML;
    }

    public function buildBodyRechazo( $nombre_asesor, $nombre_po ){

        $mailHTML = '<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            .desktop_hide,
            .desktop_hide table {
                mso-hide: all;
                display: none;
                max-height: 0px;
                overflow: hidden;
            }

            .image_block img+div {
                display: none;
            }

            @media (max-width:620px) {
                .mobile_hide {
                    display: none;
                }

                .row-content {
                    width: 100% !important;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }

                .mobile_hide {
                    min-height: 0;
                    max-height: 0;
                    max-width: 0;
                    overflow: hidden;
                    font-size: 0px;
                }

                .desktop_hide,
                .desktop_hide table {
                    display: table !important;
                    max-height: none !important;
                }

                .row-1 .column-1 .block-1.paragraph_block td.pad>div,
                .row-3 .column-1 .block-1.paragraph_block td.pad>div,
                .row-5 .column-1 .block-1.paragraph_block td.pad>div {
                    text-align: center !important;
                    font-size: 14px !important;
                }

                .row-1 .column-1 .block-1.paragraph_block td.pad,
                .row-3 .column-1 .block-1.paragraph_block td.pad,
                .row-5 .column-1 .block-1.paragraph_block td.pad {
                    padding: 20px 35px !important;
                }

                .row-1 .column-1,
                .row-3 .column-1,
                .row-4 .column-1,
                .row-5 .column-1 {
                    padding: 0 !important;
                }
            }
        </style>
    </head>
    <body style="background-color: #e4e7e7; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e4e7e7;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #56adff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad">
                                                                    <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:6px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:9px;"> </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:15px;padding-left:50px;padding-top:40px;width:100%;padding-right:0px;">
                                                                    <div align="left" class="alignment" style="line-height:10px"><img src="cid:Recurso-1unileasingazul" style="display: block; height: auto; border: 0; max-width: 240px; width: 100%;" width="240"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:25px;padding-left:50px;padding-right:50px;padding-top:25px;">
                                                                    <div style="color:#041e41;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:justify;mso-line-height-alt:24px;">
                                                                        <p style="margin: 0; margin-bottom: 16px;">Hola, <strong>' . $nombre_asesor . '</strong></p>
                                                                        <p style="margin: 0; margin-bottom: 16px;">Te informamos que tu Director rechazó el reenvío del correo de Onboarding a tu prospecto: <strong>' . $nombre_po . '.</strong></p>
                                                                        <p style="margin: 0; margin-bottom: 16px;">Contáctalo para revisar el detalle.</p>
                                                                        <p style="margin: 0;">Atentamente, UNIFIN.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 15px; padding-left: 15px; padding-right: 15px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:20px;width:100%;">
                                                                    <div align="center" class="alignment" style="line-height:10px"><img src="cid:Copia_de_Recurso-2unileasingazulLOW" style="display: block; height: auto; border: 0; max-width: 102px; width: 100%;" width="102"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cdd2d9;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #dde1e9; color: #000; width: 600px; margin: 0 auto;" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td class="pad" style="padding-bottom:25px;padding-left:30px;padding-right:30px;padding-top:25px;">
                                                                    <div style="color:#000000;direction:ltr;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:12px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:14.399999999999999px;">
                                                                        <p style="margin: 0;"><em>Información confidencial y exclusiva para uso interno de Unifin.</em></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>';


        return $mailHTML;

    }

    public function sendEmailNotificationPO( $nombre_empresa, $email, $name_email, $email_cc, $name_email_cc, $body_correo ){

        try{
            $mailer = MailerFactory::getSystemDefaultMailer();
            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
            $mailer->setSubject('Reenvio Onboarding '.$nombre_empresa);
            $mailer->addAttachment(new \EmbeddedImage('Recurso-1unileasingazul', 'custom/images_email/Recurso-1unileasingazul.png', 'Recurso-1unileasingazul'), "Recurso-1unileasingazul");
            $mailer->addAttachment(new \EmbeddedImage('Copia_de_Recurso-2unileasingazulLOW', 'custom/images_email/Copia_de_Recurso-2unileasingazulLOW.png', 'Copia_de_Recurso-2unileasingazulLOW'), "Copia_de_Recurso-2unileasingazulLOW");
            $body = trim($body_correo);
            $mailer->setHtmlBody($body);
            $mailer->clearRecipients();
            
            //SI EXISTE EMAIL COMERCIAL 
            if ($email != "") {
                //DIRECCION PRINCIPAL A EMAIL COMERCIAL
                $mailer->addRecipientsTo(new EmailIdentity($email, $name_email));
                //CON COPIA A EMAIL REGIONAL
                if($email_cc != "") {
                    $mailer->addRecipientsCc(new EmailIdentity($email_cc, $name_email_cc));
                }

            } elseif ($email_cc != "") {
                //DIRECCION PRINCIPAL A EMAIL REGIONAL
                $mailer->addRecipientsTo(new EmailIdentity($email_cc, $name_email_cc));
            }
            
            $GLOBALS['log']->fatal("ENVIANDO CORREO A: ".$email." / ".$email_cc );
            $result = $mailer->send();

        } catch (Exception $e){
            $GLOBALS['log']->fatal("Exception: No se ha podido enviar el correo electrónico");
            $GLOBALS['log']->fatal(print_r($e,true));

        }

    }

    public function sendEmailNotificationToProspect( $body_correo, $email_prospect, $name_prospect ){

        try{
            global $app_list_strings;

            $lista_emails = $app_list_strings['emails_cc_prospects_list'];
            $arr_emails = array();
            foreach ($lista_emails as $key => $email) {
                array_push($arr_emails,$email);
            }


            $mailer = MailerFactory::getSystemDefaultMailer();
            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
            $mailer->setSubject('Continúa tu registro en Unileasing');
            $mailer->addAttachment(new \EmbeddedImage('Recurso_1unileasingbco', 'custom/images_email/Recurso_1unileasingbco.png', 'Recurso_1unileasingbco'), "Recurso_1unileasingbco");
            $mailer->addAttachment(new \EmbeddedImage('46854_1', 'custom/images_email/46854_1.png', '46854_1'), "46854_1");
            $mailer->addAttachment(new \EmbeddedImage('2989993', 'custom/images_email/2989993.png', '2989993'), "2989993");
            $mailer->addAttachment(new \EmbeddedImage('linkedin', 'custom/images_email/linkedin.png', 'linkedin'), "linkedin");
            $mailer->addAttachment(new \EmbeddedImage('Recurso_2unileasingbcoLOW', 'custom/images_email/Recurso_2unileasingbcoLOW.png', 'Recurso_2unileasingbcoLOW'), "Recurso_2unileasingbcoLOW");
            $body = trim($body_correo);
            $mailer->setHtmlBody($body);
            $mailer->clearRecipients();
            
            $mailer->addRecipientsTo(new EmailIdentity($email_prospect, $name_prospect));
            if( count($arr_emails) > 0 ){

                for ($i = 0; $i < count($arr_emails); $i++) {
                    $GLOBALS['log']->fatal("AGREGANDO CORREOS CC: " . $arr_emails[$i]);
                    $mailer->addRecipientsCc(new EmailIdentity($arr_emails[$i], $arr_emails[$i]));
                }
            }
                
            $GLOBALS['log']->fatal("ENVIANDO CORREO A: ".$email_prospect );
            $result = $mailer->send();

        } catch (Exception $e){
            $GLOBALS['log']->fatal("Exception: No se ha podido enviar el correo electrónico");
            $GLOBALS['log']->fatal(print_r($e,true));

        }

    }

    public function sendEmailAsesorPO( $body_correo, $nombre_empresa ,$email_asesor, $name_asesor, $email_comercial, $name_comercial, $email_regional, $name_regional ){

        try{
            $mailer = MailerFactory::getSystemDefaultMailer();
            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
            $mailer->setSubject('Seguimiento Unileasing / '.$nombre_empresa);
            $mailer->addAttachment(new \EmbeddedImage('Recurso-1unileasingazul', 'custom/images_email/Recurso-1unileasingazul.png', 'Recurso-1unileasingazul'), "Recurso-1unileasingazul");
            $mailer->addAttachment(new \EmbeddedImage('Copia_de_Recurso-2unileasingazulLOW', 'custom/images_email/Copia_de_Recurso-2unileasingazulLOW.png', 'Copia_de_Recurso-2unileasingazulLOW'), "Copia_de_Recurso-2unileasingazulLOW");
            $body = trim($body_correo);
            $mailer->setHtmlBody($body);
            $mailer->clearRecipients();
            
            $mailer->addRecipientsTo(new EmailIdentity($email_asesor, $name_asesor));

            if($email_comercial !="" ){
                $mailer->addRecipientsCc(new EmailIdentity($email_comercial, $name_comercial));
            }
            if($email_regional !="" ){
                $mailer->addRecipientsCc(new EmailIdentity($email_regional, $name_regional));
            }
            
            $GLOBALS['log']->fatal("ENVIANDO CORREO ASESOR: ".$email_asesor );
            $GLOBALS['log']->fatal("ENVIANDO CORREO COMERCIAL: ".$email_comercial );
            $GLOBALS['log']->fatal("ENVIANDO CORREO REGIONAL: ".$email_regional );
            $result = $mailer->send();

        } catch (Exception $e){
            $GLOBALS['log']->fatal("Exception: No se ha podido enviar el correo electrónico");
            $GLOBALS['log']->fatal(print_r($e,true));

        }

    }

    public function sendEmailNotificationRechazo( $body_correo, $nombre_empresa ,$email_asesor, $name_asesor, $email_comercial, $name_comercial, $email_regional, $name_regional ){

        try{
            $mailer = MailerFactory::getSystemDefaultMailer();
            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
            $mailer->setSubject('Rechazo Reenvío Unileasing / '.$nombre_empresa);
            $mailer->addAttachment(new \EmbeddedImage('Recurso-1unileasingazul', 'custom/images_email/Recurso-1unileasingazul.png', 'Recurso-1unileasingazul'), "Recurso-1unileasingazul");
            $mailer->addAttachment(new \EmbeddedImage('Copia_de_Recurso-2unileasingazulLOW', 'custom/images_email/Copia_de_Recurso-2unileasingazulLOW.png', 'Copia_de_Recurso-2unileasingazulLOW'), "Copia_de_Recurso-2unileasingazulLOW");
            $body = trim($body_correo);
            $mailer->setHtmlBody($body);
            $mailer->clearRecipients();
            
            $mailer->addRecipientsTo(new EmailIdentity($email_asesor, $name_asesor));

            if ($email_comercial != "") {
                $mailer->addRecipientsCc(new EmailIdentity($email_comercial, $name_comercial));
            }

            if ($email_regional != "") {
                $mailer->addRecipientsCc(new EmailIdentity($email_regional, $name_regional));
            }
            
            $GLOBALS['log']->fatal("ENVIANDO CORREO DE RECHAZO ASESOR: ".$email_asesor );
            $GLOBALS['log']->fatal("ENVIANDO CORREO DE RECHAZO COMERCIAL: ".$email_comercial );
            $GLOBALS['log']->fatal("ENVIANDO CORREO DE RECHAZO REGIONAL: ".$email_regional );
            $result = $mailer->send();

        } catch (Exception $e){
            $GLOBALS['log']->fatal("Exception: No se ha podido enviar el correo electrónico");
            $GLOBALS['log']->fatal(print_r($e,true));

        }

    }

}

