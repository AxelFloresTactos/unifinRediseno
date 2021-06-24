<?php
    //add the job key to the list of job strings
    array_push($job_strings, 'statusReferenciaVentaCruzada');
    require_once 'include/SugarPHPMailer.php';
    require_once 'include/utils/file_utils.php';


function statusReferenciaVentaCruzada()
    {
        $urlSugar=$GLOBALS['sugar_config']['site_url'].'/#Ref_Venta_Cruzada/';
        /*------------------------Notificaciones 3 meses antes------------------------*/
        $hoy= date("Y-m-d H:i:s");
        $tres_meses=date( "Y-m-d H:i:s", strtotime( $hoy ." -3 month" ) );

        //Se obtiene un día menos a los tres meses para recuperar los registros creados en todo el día
        //y no solo casarlo con el operador (equals) ya que el campo es datetime y no solo date
        $tres_meses_un_dia_antes=date( "Y-m-d H:i:s", strtotime( $tres_meses ." -1 day" ) );

        /*
        $query = <<<SQL
select * from ref_venta_cruzada 
where date_entered between '{$tres_meses_un_dia_antes}' and '{$tres_meses}' 
order by date_entered desc
SQL;
        */
        $beanQueryRef = BeanFactory::newBean('Ref_Venta_Cruzada');
        $sugarQueryRef = new SugarQuery();
        $sugarQueryRef->select(array('id'));
        $sugarQueryRef->from($beanQueryRef);
        $sugarQueryRef->where()->gte('date_entered',$tres_meses_un_dia_antes);
        $sugarQueryRef->where()->lte('date_entered',$tres_meses);
        $resultRef = $sugarQueryRef->execute();
        $countRef = count($resultRef);

		if($countRef>0){

            for($current=0; $current < $countRef; $current++) {

                $GLOBALS['log']->fatal($resultRef[$current]['id']);
                //Obtiene valores del cliente
                $beanRef = BeanFactory::retrieveBean('Ref_Venta_Cruzada', $resultRef[$current]['id']);

                if(!empty($beanRef)){

                    $numeroAnexos=$beanRef->numero_anexos;
                    if($numeroAnexos>0){
                        $GLOBALS['log']->fatal("Actualizando Referencia con id ".$beanRef->id." - EXITOSA");
                        //Exitosa
                        $beanRef->estatus='4';
                        $beanRef->save();

                        //Sección para envío de correo a Asesores
                        $idAsesorOrigen=$beanRef->assigned_user_id;
                        $nombreAsesorOrigen=$beanRef->assigned_user_name;
                        $correo_asesor_origen="";
                        //Obteniendo correo de asesor Origen
                        $beanAsesorOrigen = BeanFactory::retrieveBean('Users', $idAsesorOrigen);
                        if(!empty($beanAsesorOrigen)){
                            $correo_asesor_origen=$beanAsesorOrigen->email1;
                        }

                        $idAsesorRM=$beanRef->user_id1_c;/*Validar que no sea null*/
                        $nombreAsesorRM=$beanRef->usuario_rm;
                        $correo_asesor_rm="";
                        if($idAsesorRM != "" && $idAsesorRM !=null){
                            $beanAsesorRM = BeanFactory::retrieveBean('Users', $idAsesorRM);
                            if(!empty($beanAsesorRM)){
                                $correo_asesor_rm=$beanAsesorRM->email1;
                            }
                        }

                        $nombreCuenta=$beanRef->accounts_ref_venta_cruzada_1_name;
                        $idReferencia=$beanRef->id;

                        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorOrigen . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha sido exitosa y ya cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        $GLOBALS['log']->fatal("ENVIANDO CORREO A ASESOR ORIGEN CON EMAIL ".$correo_asesor_origen);

                        //Enviando correo a asesor origen
                        $mailer = MailerFactory::getSystemDefaultMailer();
                        $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                        $mailer->setSubject("Referencia exitosa");
                        $body = trim($mailHTML);
                        $mailer->setHtmlBody($body);
                        $mailer->clearRecipients();
                        $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_origen, $nombreAsesorOrigen));
                        $result = $mailer->send();

                        $mailHTMLRM = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorRM . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha sido exitosa y ya cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        //Enviando correo a asesor rm
                        if($correo_asesor_rm!=""){
                            $GLOBALS['log']->fatal("ENVIANDO CORREO A ASESOR RM CON EMAIL ".$correo_asesor_rm);
                            $mailer = MailerFactory::getSystemDefaultMailer();
                            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                            $mailer->setSubject("Referencia exitosa");
                            $body = trim($mailHTMLRM);
                            $mailer->setHtmlBody($body);
                            $mailer->clearRecipients();
                            $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_rm, $nombreAsesorRM));
                            $result = $mailer->send();

                        }


                    }
                    else{
                        //Pasaron 3 meses y no tiene Anexos -> Se establece como Expirada y se notifica a los asesores
                        $beanRef->estatus='5';
                        $beanRef->save();

                        //Sección para envío de correo a Asesores
                        $idAsesorOrigen=$beanRef->assigned_user_id;
                        $nombreAsesorOrigen=$beanRef->assigned_user_name;
                        $correo_asesor_origen="";
                        //Obteniendo correo de asesor Origen
                        $beanAsesorOrigen = BeanFactory::retrieveBean('Users', $idAsesorOrigen);
                        if(!empty($beanAsesorOrigen)){
                            $correo_asesor_origen=$beanAsesorOrigen->email1;
                        }

                        $idAsesorRM=$beanRef->user_id1_c;/*Validar que no sea null*/
                        $nombreAsesorRM=$beanRef->usuario_rm;
                        $correo_asesor_rm="";
                        if($idAsesorRM != "" && $idAsesorRM !=null){
                            $beanAsesorRM = BeanFactory::retrieveBean('Users', $idAsesorRM);
                            if(!empty($beanAsesorRM)){
                                $correo_asesor_rm=$beanAsesorRM->email1;
                            }
                        }

                        $nombreCuenta=$beanRef->accounts_ref_venta_cruzada_1_name;
                        $idReferencia=$beanRef->id;

                        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorOrigen . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha expirado debido a que no se activaron anexos o contratos en los últimos 3 meses.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        $GLOBALS['log']->fatal("ENVIANDO CORREO DE REFERENCIA EXPIRADA A ASESOR ORIGEN CON EMAIL ".$correo_asesor_origen);

                        //Enviando correo a asesor origen
                        $mailer = MailerFactory::getSystemDefaultMailer();
                        $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                        $mailer->setSubject("Referencia de venta cruzada expirada");
                        $body = trim($mailHTML);
                        $mailer->setHtmlBody($body);
                        $mailer->clearRecipients();
                        $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_origen, $nombreAsesorOrigen));
                        $result = $mailer->send();

                        $mailHTMLRM = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorRM . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha expirado debido a que no se activaron anexos o contratos en los últimos 3 meses.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        //Enviando correo a asesor rm
                        if($correo_asesor_rm!=""){
                            $GLOBALS['log']->fatal("ENVIANDO CORREO DE REFERENCIA EXPIRADA A ASESOR RM CON EMAIL ".$correo_asesor_rm);
                            $mailer = MailerFactory::getSystemDefaultMailer();
                            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                            $mailer->setSubject("Referencia de venta cruzada expirada");
                            $body = trim($mailHTMLRM);
                            $mailer->setHtmlBody($body);
                            $mailer->clearRecipients();
                            $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_rm, $nombreAsesorRM));
                            $result = $mailer->send();

                        }

                    }


                }

            }
        }


        /*------------------------Notificaciones 1 mes antes------------------------*/
        $un_mes=date( "Y-m-d H:i:s", strtotime( $hoy ." -1 month" ) );
        $un_mes_un_dia_antes=date( "Y-m-d H:i:s", strtotime( $un_mes ." -1 day" ) );


        $beanQueryUnMes = BeanFactory::newBean('Ref_Venta_Cruzada');
        $sugarQueryRefUnMes = new SugarQuery();
        $sugarQueryRefUnMes->select(array('id'));
        $sugarQueryRefUnMes->from($beanQueryUnMes);
        $sugarQueryRefUnMes->where()->gte('date_entered',$un_mes_un_dia_antes);
        $sugarQueryRefUnMes->where()->lte('date_entered',$un_mes);
        $resultRefUnMes = $sugarQueryRefUnMes->execute();
        $countRefUnMes = count($resultRefUnMes);

        if($countRefUnMes>0){

            for($current=0; $current < $countRefUnMes; $current++)
            {

                $beanRef = BeanFactory::retrieveBean('Ref_Venta_Cruzada', $resultRefUnMes[$current]['id']);

                if(!empty($beanRef)){

                    $numeroAnexos=$beanRef->numero_anexos;
                    if($numeroAnexos>0){
                        $GLOBALS['log']->fatal("Actualizando Referencia con id ".$beanRef->id." - EXITOSA");
                        //Exitosa
                        $beanRef->estatus='4';
                        $beanRef->save();

                        //Sección para envío de correo a Asesores
                        $idAsesorOrigen=$beanRef->assigned_user_id;
                        $nombreAsesorOrigen=$beanRef->assigned_user_name;
                        $correo_asesor_origen="";
                        //Obteniendo correo de asesor Origen
                        $beanAsesorOrigen = BeanFactory::retrieveBean('Users', $idAsesorOrigen);
                        if(!empty($beanAsesorOrigen)){
                            $correo_asesor_origen=$beanAsesorOrigen->email1;
                        }

                        $idAsesorRM=$beanRef->user_id1_c;/*Validar que no sea null*/
                        $nombreAsesorRM=$beanRef->usuario_rm;
                        $correo_asesor_rm="";
                        if($idAsesorRM != "" && $idAsesorRM !=null){
                            $beanAsesorRM = BeanFactory::retrieveBean('Users', $idAsesorRM);
                            if(!empty($beanAsesorRM)){
                                $correo_asesor_rm=$beanAsesorRM->email1;
                            }
                        }

                        $nombreCuenta=$beanRef->accounts_ref_venta_cruzada_1_name;
                        $idReferencia=$beanRef->id;

                        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorOrigen . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha sido exitosa y ya cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        $GLOBALS['log']->fatal("ENVIANDO CORREO A ASESOR ORIGEN CON EMAIL ".$correo_asesor_origen);

                        //Enviando correo a asesor origen
                        $mailer = MailerFactory::getSystemDefaultMailer();
                        $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                        $mailer->setSubject("Referencia exitosa");
                        $body = trim($mailHTML);
                        $mailer->setHtmlBody($body);
                        $mailer->clearRecipients();
                        $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_origen, $nombreAsesorOrigen));
                        $result = $mailer->send();

                        $mailHTMLRM = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorRM . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha sido exitosa y ya cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        //Enviando correo a asesor rm
                        if($correo_asesor_rm!=""){
                            $GLOBALS['log']->fatal("ENVIANDO CORREO A ASESOR RM CON EMAIL ".$correo_asesor_rm);
                            $mailer = MailerFactory::getSystemDefaultMailer();
                            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                            $mailer->setSubject("Referencia exitosa");
                            $body = trim($mailHTMLRM);
                            $mailer->setHtmlBody($body);
                            $mailer->clearRecipients();
                            $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_rm, $nombreAsesorRM));
                            $result = $mailer->send();

                        }


                    }
                    else{
                        //Falta un mes para vencer y no tiene Anexos -> Se notifica a los asesores

                        //Sección para envío de correo a Asesores
                        $idAsesorOrigen=$beanRef->assigned_user_id;
                        $nombreAsesorOrigen=$beanRef->assigned_user_name;
                        $correo_asesor_origen="";
                        //Obteniendo correo de asesor Origen
                        $beanAsesorOrigen = BeanFactory::retrieveBean('Users', $idAsesorOrigen);
                        if(!empty($beanAsesorOrigen)){
                            $correo_asesor_origen=$beanAsesorOrigen->email1;
                        }

                        $idAsesorRM=$beanRef->user_id1_c;/*Validar que no sea null*/
                        $nombreAsesorRM=$beanRef->usuario_rm;
                        $correo_asesor_rm="";
                        if($idAsesorRM != "" && $idAsesorRM !=null){
                            $beanAsesorRM = BeanFactory::retrieveBean('Users', $idAsesorRM);
                            if(!empty($beanAsesorRM)){
                                $correo_asesor_rm=$beanAsesorRM->email1;
                            }
                        }

                        $nombreCuenta=$beanRef->accounts_ref_venta_cruzada_1_name;
                        $idReferencia=$beanRef->id;

                        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorOrigen . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', está a 30 días de expirar y aún no cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        $GLOBALS['log']->fatal("ENVIANDO CORREO DE REFERENCIA A 1 MES DE EXPIRAR A ASESOR ORIGEN CON EMAIL ".$correo_asesor_origen);

                        //Enviando correo a asesor origen
                        $mailer = MailerFactory::getSystemDefaultMailer();
                        $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                        $mailer->setSubject("Referencia de venta cruzada por expirar 30 días");
                        $body = trim($mailHTML);
                        $mailer->setHtmlBody($body);
                        $mailer->clearRecipients();
                        $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_origen, $nombreAsesorOrigen));
                        $result = $mailer->send();

                        $mailHTMLRM = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorRM . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', está a 30 días de expirar y aún no cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        //Enviando correo a asesor rm
                        if($correo_asesor_rm!=""){
                            $GLOBALS['log']->fatal("ENVIANDO CORREO DE REFERENCIA A 1 MES DE EXPIRAR A ASESOR RM CON EMAIL ".$correo_asesor_rm);
                            $mailer = MailerFactory::getSystemDefaultMailer();
                            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                            $mailer->setSubject("Referencia de venta cruzada por expirar 30 días");
                            $body = trim($mailHTMLRM);
                            $mailer->setHtmlBody($body);
                            $mailer->clearRecipients();
                            $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_rm, $nombreAsesorRM));
                            $result = $mailer->send();

                        }

                    }

                }

            }
        }


        /*------------------------Notificaciones 15 días antes------------------------*/
        $quince_dias=date( "Y-m-d H:i:s", strtotime( $hoy ." -15 day" ) );
        $quince_dias_un_dia_antes=date( "Y-m-d H:i:s", strtotime( $quince_dias ." -1 day" ) );


        $beanQueryQuince = BeanFactory::newBean('Ref_Venta_Cruzada');
        $beanQueryQuinceDias = new SugarQuery();
        $beanQueryQuinceDias->select(array('id'));
        $beanQueryQuinceDias->from($beanQueryQuince);
        $beanQueryQuinceDias->where()->gte('date_entered',$quince_dias_un_dia_antes);
        $beanQueryQuinceDias->where()->lte('date_entered',$quince_dias);
        $resultRefQuince = $beanQueryQuinceDias->execute();
        $countRefQuince = count($resultRefQuince);

        if($countRefQuince>0){

            for($current=0; $current < $countRefQuince; $current++)
            {

                $beanRef = BeanFactory::retrieveBean('Ref_Venta_Cruzada', $resultRefQuince[$current]['id']);

                if(!empty($beanRef)){

                    $numeroAnexos=$beanRef->numero_anexos;
                    if($numeroAnexos>0){
                        $GLOBALS['log']->fatal("Actualizando Referencia con id ".$beanRef->id." - EXITOSA");
                        //Exitosa
                        $beanRef->estatus='4';
                        $beanRef->save();

                        //Sección para envío de correo a Asesores
                        $idAsesorOrigen=$beanRef->assigned_user_id;
                        $nombreAsesorOrigen=$beanRef->assigned_user_name;
                        $correo_asesor_origen="";
                        //Obteniendo correo de asesor Origen
                        $beanAsesorOrigen = BeanFactory::retrieveBean('Users', $idAsesorOrigen);
                        if(!empty($beanAsesorOrigen)){
                            $correo_asesor_origen=$beanAsesorOrigen->email1;
                        }

                        $idAsesorRM=$beanRef->user_id1_c;/*Validar que no sea null*/
                        $nombreAsesorRM=$beanRef->usuario_rm;
                        $correo_asesor_rm="";
                        if($idAsesorRM != "" && $idAsesorRM !=null){
                            $beanAsesorRM = BeanFactory::retrieveBean('Users', $idAsesorRM);
                            if(!empty($beanAsesorRM)){
                                $correo_asesor_rm=$beanAsesorRM->email1;
                            }
                        }

                        $nombreCuenta=$beanRef->accounts_ref_venta_cruzada_1_name;
                        $idReferencia=$beanRef->id;

                        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorOrigen . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha sido exitosa y ya cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        $GLOBALS['log']->fatal("ENVIANDO CORREO A ASESOR ORIGEN CON EMAIL ".$correo_asesor_origen);

                        //Enviando correo a asesor origen
                        $mailer = MailerFactory::getSystemDefaultMailer();
                        $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                        $mailer->setSubject("Referencia exitosa");
                        $body = trim($mailHTML);
                        $mailer->setHtmlBody($body);
                        $mailer->clearRecipients();
                        $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_origen, $nombreAsesorOrigen));
                        $result = $mailer->send();

                        $mailHTMLRM = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorRM . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', ha sido exitosa y ya cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        //Enviando correo a asesor rm
                        if($correo_asesor_rm!=""){
                            $GLOBALS['log']->fatal("ENVIANDO CORREO A ASESOR RM CON EMAIL ".$correo_asesor_rm);
                            $mailer = MailerFactory::getSystemDefaultMailer();
                            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                            $mailer->setSubject("Referencia exitosa");
                            $body = trim($mailHTMLRM);
                            $mailer->setHtmlBody($body);
                            $mailer->clearRecipients();
                            $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_rm, $nombreAsesorRM));
                            $result = $mailer->send();

                        }


                    }
                    else{
                        //Falta un mes para vencer y no tiene Anexos -> Se notifica a los asesores

                        //Sección para envío de correo a Asesores
                        $idAsesorOrigen=$beanRef->assigned_user_id;
                        $nombreAsesorOrigen=$beanRef->assigned_user_name;
                        $correo_asesor_origen="";
                        //Obteniendo correo de asesor Origen
                        $beanAsesorOrigen = BeanFactory::retrieveBean('Users', $idAsesorOrigen);
                        if(!empty($beanAsesorOrigen)){
                            $correo_asesor_origen=$beanAsesorOrigen->email1;
                        }

                        $idAsesorRM=$beanRef->user_id1_c;/*Validar que no sea null*/
                        $nombreAsesorRM=$beanRef->usuario_rm;
                        $correo_asesor_rm="";
                        if($idAsesorRM != "" && $idAsesorRM !=null){
                            $beanAsesorRM = BeanFactory::retrieveBean('Users', $idAsesorRM);
                            if(!empty($beanAsesorRM)){
                                $correo_asesor_rm=$beanAsesorRM->email1;
                            }
                        }

                        $nombreCuenta=$beanRef->accounts_ref_venta_cruzada_1_name;
                        $idReferencia=$beanRef->id;

                        $mailHTML = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorOrigen . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', está a 15 días de expirar y aún no cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        $GLOBALS['log']->fatal("ENVIANDO CORREO DE REFERENCIA A 15 DIAS DE EXPIRAR A ASESOR ORIGEN CON EMAIL ".$correo_asesor_origen);

                        //Enviando correo a asesor origen
                        $mailer = MailerFactory::getSystemDefaultMailer();
                        $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                        $mailer->setSubject("Referencia de venta cruzada por expirar 15 días");
                        $body = trim($mailHTML);
                        $mailer->setHtmlBody($body);
                        $mailer->clearRecipients();
                        $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_origen, $nombreAsesorOrigen));
                        $result = $mailer->send();

                        $mailHTMLRM = '<p align="justify"><font face="verdana" color="#635f5f"><b>' . $nombreAsesorRM . '</b>
      <br><br>Se le informa que la referencia de venta cruzada para la cuenta: '. $nombreCuenta.', está a 15 días de expirar y aún no cuenta con anexos/contratos activos.
      <br><br>Para ver el detalle de la referencia <a id="downloadErrors" href="'. $urlSugar.$idReferencia.'">Da Click Aquí</a>
      <br><br>Atentamente Unifin</font></p>
      <br><p class="imagen"><img border="0" width="350" height="107" style="width:3.6458in;height:1.1145in" id="bannerUnifin" src="https://www.unifin.com.mx/ri/front/img/logo.png"></span></p>

      <p class="MsoNormal"><span style="font-size:8.5pt;color:#757b80">______________________________<wbr>______________<u></u><u></u></span></p>
      <p class="MsoNormal" style="text-align: justify;"><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">
       Este correo electrónico y sus anexos pueden contener información CONFIDENCIAL para uso exclusivo de su destinatario. Si ha recibido este correo por error, por favor, notifíquelo al remitente y bórrelo de su sistema.
       Las opiniones expresadas en este correo son las de su autor y no son necesariamente compartidas o apoyadas por UNIFIN, quien no asume aquí obligaciones ni se responsabiliza del contenido de este correo, a menos que dicha información sea confirmada por escrito por un representante legal autorizado.
       No se garantiza que la transmisión de este correo sea segura o libre de errores, podría haber sido viciada, perdida, destruida, haber llegado tarde, de forma incompleta o contener VIRUS.
       Asimismo, los datos personales, que en su caso UNIFIN pudiera recibir a través de este medio, mantendrán la seguridad y privacidad en los términos de la Ley Federal de Protección de Datos Personales; para más información consulte nuestro &nbsp;</span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #2f96fb;"><a href="https://www.unifin.com.mx/2019/av_menu.php" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=https://www.unifin.com.mx/2019/av_menu.php&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNHMJmAEhoNZUAyPWo2l0JoeRTWipg"><span style="color: #2f96fb; text-decoration: none;">Aviso de Privacidad</span></a></span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #212121;">&nbsp; publicado en&nbsp; <br /> </span><span style="font-size: 7.5pt; font-family: \'Arial\',sans-serif; color: #0b5195;"><a href="http://www.unifin.com.mx/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.unifin.com.mx/&amp;source=gmail&amp;ust=1582731642466000&amp;usg=AFQjCNF6DiYZ19MWEI49A8msTgXM9unJhQ"><span style="color: #0b5195; text-decoration: none;">www.unifin.com.mx</span></a> </span><u></u><u></u></p>';

                        //Enviando correo a asesor rm
                        if($correo_asesor_rm!=""){
                            $GLOBALS['log']->fatal("ENVIANDO CORREO DE REFERENCIA A 15 DIAS DE EXPIRAR A ASESOR RM CON EMAIL ".$correo_asesor_rm);
                            $mailer = MailerFactory::getSystemDefaultMailer();
                            $mailTransmissionProtocol = $mailer->getMailTransmissionProtocol();
                            $mailer->setSubject("Referencia de venta cruzada por expirar 15 días");
                            $body = trim($mailHTMLRM);
                            $mailer->setHtmlBody($body);
                            $mailer->clearRecipients();
                            $mailer->addRecipientsTo(new EmailIdentity($correo_asesor_rm, $nombreAsesorRM));
                            $result = $mailer->send();

                        }

                    }

                }

            }
        }


      return true;
    }