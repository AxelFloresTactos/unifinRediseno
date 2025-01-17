<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
/*********************************************************************************
 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = [

    'LBL_ASSIGN_TEAM' => 'Tildel til team',

    'LBL_RE' => 'SV:',

    'ERR_BAD_LOGIN_PASSWORD' => 'Brugernavn eller adgangskode er forkert',
    'ERR_BODY_TOO_LONG' => '\rBrødteksten er for lang til at fange hele e-mailen. Trimmes.',
    'ERR_INI_ZLIB' => '"Zlib-komprimeringen kunne ikke slukkes midlertidigt. ""Testindstillinger"" kan fejle."',
    'ERR_MAILBOX_FAIL' => 'Ingen e-mail-konti kunne hentes.',
    'ERR_NO_IMAP' => 'Ingen IMAP-biblioteker blev fundet. Løs dette problem, før du fortsætter med Indgående e-mail',
    'ERR_NO_OPTS_SAVED' => 'Ingen optimale blev gemt med din konto Indgående e-mail. Gennemgå indstillingerne.',
    'ERR_TEST_MAILBOX' => 'Kontrollér dine indstillinger, og prøv igen.',
    'ERR_DELETE_FOLDER' => 'Kunne ikke slette mappe.',
    'ERR_UNSUBSCRIBE_FROM_FOLDER' => 'Kunne ikke framelde mappe, før sletning.',

    'LBL_APPLY_OPTIMUMS' => 'Anvend optimale',
    'LBL_ASSIGN_TO_USER' => 'Tildel til bruger',
    'LBL_AUTOREPLY_OPTIONS' => 'Indstillinger for automatiske svar',
    'LBL_AUTOREPLY' => 'Skabelon til automatiske svar',
    'LBL_AUTOREPLY_HELP' => 'Vælg et automatisk svar for at give e-mail-afsendere besked om, at deres svar er modtaget.',
    'LBL_BASIC' => 'Oplysninger om e-mail-konto',
    'LBL_CASE_MACRO' => 'Sagsmakro',
    'LBL_CASE_MACRO_DESC' => 'Indstil den makro, der skal analyseres og bruges til at oprette link til importeret e-mail til en sag.',
    'LBL_CASE_MACRO_DESC2' => '"Angiv dette til en værdi, men bevar <b>""%1""</b>."',
    'LBL_CERT_DESC' => 'Gennemtving validering af e-mail-serverens sikkerhedscertifikat - må ikke anvendes ved egensignering.',
    'LBL_CERT' => 'Valider certifikat',
    'LBL_CLOSE_POPUP' => 'Luk vindue',
    'LBL_CREATE_NEW_GROUP' => '- Opret gruppe ved Gem -',
    'LBL_CREATE_TEMPLATE' => 'Opret',
    'LBL_SUBSCRIBE_FOLDERS' => 'Abonner på mapper',
    'LBL_DEFAULT_FROM_ADDR' => 'Standard:',
    'LBL_DEFAULT_FROM_NAME' => 'Standard:',
    'LBL_DELETE_SEEN' => 'Slet læste e-mails efter import',
    'LBL_EDIT_TEMPLATE' => 'Rediger',
    'LBL_EMAIL_OPTIONS' => 'Indstillinger for e-mail-håndtering',
    'LBL_EMAIL_BOUNCE_OPTIONS' => 'CalDAV afvisningshåndtering',
    'LBL_FILTER_DOMAINS_DESC' => 'Kommasepareret liste over de domæner, som automatisk besvarelse af e-mails ikke sendes til.',
    'LBL_ASSIGN_TO_GROUP_FOLDER_DESC' => 'Markér dette felt for automatisk at oprette e-mail-poster i Sugar til alle indgående e-mails.',
    'LBL_POSSIBLE_ACTION_DESC' => 'Til indstillingen Opret sag skal der vælges en gruppemappe',
    'LBL_FILTER_DOMAINS' => 'Ingen automatiske svar til dette domæne',
    'LBL_FIND_OPTIMUM_KEY' => 'f',
    'LBL_FIND_OPTIMUM_MSG' => '<br>Finder optimale forbindelsesvariabler.',
    'LBL_FIND_OPTIMUM_TITLE' => 'Find den optimale konfiguration',
    'LBL_FIND_SSL_WARN' => '<br>Test af SSL kan tage lang tid. Vær tålmodig.<br>',
    'LBL_FORCE_DESC' => 'Nogle IMAP/POP3-servere kræver særlige parametre. Kontrollér for at gennemtvinge en negativ parameter ved tilslutning "dvs. /notls"',
    'LBL_FORCE' => 'Gennemvving negativ',
    'LBL_FOUND_MAILBOXES' => 'Følgende anvendelige mapper blev fundet. <br>Klik på en for at vælge den:',
    'LBL_FOUND_OPTIMUM_MSG' => '<br>Optimale indstillinger blev fundet. Tryk på knappen nedenfor for at anvende dem til din mail-konto.',
    'LBL_FROM_ADDR' => 'Fra adresse',
    // as long as XTemplate doesn't support output escaping, transform
    // quotes to html-entities right here (bug #48913)
    'LBL_FROM_ADDR_DESC' => 'Den indtastede e-mail adresse vises muligvis ikke i &quot;From&quot adressesektionen for den sendte mail pga. restriktioner fra e-mail-service-udbyderen. Under disse omstændigheder benyttes e-mail adressen defineret på den udgående mail server.',
    'LBL_FROM_NAME_ADDR' => 'Fra navn/e-mail',
    'LBL_FROM_NAME' => '"Fra" navn',
    'LBL_GROUP_QUEUE' => 'Tildel til gruppe',
    'LBL_HOME' => 'Startside',
    'LBL_LIST_MAILBOX_TYPE' => 'Brug af e-mail-konto',
    'LBL_LIST_NAME' => 'Navn:',
    'LBL_LIST_GLOBAL_PERSONAL' => 'Type',
    'LBL_LIST_SERVER_URL' => 'E-mail-server:',
    'LBL_LIST_STATUS' => 'Status:',
    'LBL_LOGIN' => 'Brugernavn',
    'LBL_MAILBOX_DEFAULT' => 'INDBAKKE',
    'LBL_MAILBOX_SSL_DESC' => 'Brug SSL til at oprette forbindelse. Hvis dette ikke virker, skal du kontrollere, at din PHP-installation har medtaget "--med-imap-ssl" i konfigurationen.',
    'LBL_MAILBOX_SSL' => 'Brug SSL',
    'LBL_MAILBOX_TYPE' => 'Mulige handlinger',
    'LBL_DISTRIBUTION_METHOD' => 'Distributionsmetode',
    'LBL_CREATE_CASE_REPLY_TEMPLATE' => 'Skabelon til automatiske svar på ny sag',
    'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => 'Vælg et automatisk svar for at give e-mail-afsendere besked om, at en sag er oprettet. E-mailen indeholder sagsnummeret i emnelinjen, hvilket er i overensstemmelse med indstillingen Sagsmakro. Dette svar sendes først, når den første e-mail er modtaget fra modtageren.',
    'LBL_MAILBOX' => 'Overvågede mapper',
    'LBL_TRASH_FOLDER' => 'Mappen Papirkurv',
    'LBL_GET_TRASH_FOLDER' => 'Hent mappen Papirkurv',
    'LBL_SENT_FOLDER' => 'Mappen Sendt',
    'LBL_GET_SENT_FOLDER' => 'Hent mappen Sendt',
    'LBL_SELECT' => 'Vælg',
    'LBL_MARK_READ_DESC' => 'Markér meddelelser som læst på e-mail-serveren ved import. Undlad at slette.',
    'LBL_MARK_READ_NO' => 'E-mail markeret som slettet efter import',
    'LBL_MARK_READ_YES' => 'E-mail tilbage på serveren efter import',
    'LBL_MARK_READ' => 'Lad meddelelser forblive på serveren',
    'LBL_MAX_AUTO_REPLIES' => 'Antal automatiske svar',
    'LBL_MAX_AUTO_REPLIES_DESC' => 'Angiv det maksimale antal automatiske svar, der skal sendes til en entydig e-mail-adresse i løbet af 24 timer.',
    'LBL_PERSONAL_MODULE_NAME' => 'Personlig e-mail-konto',
    'LBL_PERSONAL_MODULE_NAME_SINGULAR' => 'Personlig e-mail-konto',
    'LBL_CREATE_CASE' => 'Opret sag fra e-mail',
    'LBL_CREATE_CASE_HELP' => 'Markér dette felt for automatisk at oprette sagsposter i Sugar fra indgående e-mails.',
    'LBL_MODULE_NAME' => 'Indgående e-mail',
    'LBL_MODULE_NAME_SINGULAR' => 'Indgående e-mail',
    'LBL_BOUNCE_MODULE_NAME' => 'Postkasse til afvisningshåndtering',
    'LBL_MODULE_TITLE' => 'Indgående e-mail',
    'LBL_NAME' => 'Navn',
    'LBL_NONE' => 'Ingen',
    'LBL_NO_OPTIMUMS' => 'Kunne ikke finde optimale. Kontrollér dine indstillinger, og prøv igen.',
    'LBL_ONLY_SINCE_DESC' => 'Når du bruger POP3, kan PHP ikke filtrere for nye/ulæste meddelelser. Dette flag giver mulighed for at anmode om, at der tjekkes for meddelelser, siden e-mail-kontoen sidst blev adspurgt. Dette vil i høj grad forbedre ydeevnen, hvis din e-mail-server ikke understøtter IMAP.',
    'LBL_ONLY_SINCE_NO' => 'Nej. Kontrollér i forhold til alle e-mails på e-mail-serveren.',
    'LBL_ONLY_SINCE_YES' => 'Ja',
    'LBL_ONLY_SINCE' => 'Importér kun siden sidste tjek:',
    'LBL_OUTBOUND_SERVER' => 'Udgående e-mail-server',
    'LBL_PASSWORD_CHECK' => 'Tjek adgangskode',
    'LBL_PASSWORD' => 'Adgangskode',
    'LBL_POP3_SUCCESS' => 'Din POP3-testforbindelse virkede.',
    'LBL_POPUP_FAILURE' => 'Testforbindelsen fejlede. Fejlen er vist nedenfor.',
    'LBL_POPUP_SUCCESS' => 'Testforbindelsen virkede. Dine indstillinger fungerer.',
    'LBL_POPUP_TITLE' => 'Testindstillinger',
    'LBL_GETTING_FOLDERS_LIST' => 'Henter mappeliste',
    'LBL_SELECT_SUBSCRIBED_FOLDERS' => 'Vælg abonnerede mapper',
    'LBL_SELECT_TRASH_FOLDERS' => 'Vælg mappen Papirkurv',
    'LBL_SELECT_SENT_FOLDERS' => 'Vælg mappen Sendt',
    'LBL_DELETED_FOLDERS_LIST' => 'Følgende mapper %s findes enten ikke eller er blevet slettet fra serveren',
    'LBL_PORT' => 'E-mail-serverport',
    'LBL_QUEUE' => 'Kø på e-mail-konto',
    'LBL_REPLY_NAME_ADDR' => 'Besvar navn/e-mail',
    'LBL_REPLY_TO_NAME' => 'Svar til-navn',
    'LBL_REPLY_TO_ADDR' => 'Svar til-adresse',
    'LBL_SAME_AS_ABOVE' => 'Bruger fra navn/adresse',
    'LBL_SAVE_RAW' => 'Gem rå kilde',
    'LBL_SAVE_RAW_DESC_1' => '"Vælg ""Ja"", hvis du vil bevare den rå kilde til hver importeret e-mail."',
    'LBL_SAVE_RAW_DESC_2' => 'Store vedhæftede filer kan forårsage fejl med konservativt eller forkert konfigurerede databaser.',
    'LBL_SERVER_OPTIONS' => 'Avanceret konfiguration',
    'LBL_SERVER_TYPE' => 'E-mail-server-protokol',
    'LBL_SERVER_URL' => 'E-mail-server-adresse',
    'LBL_SSL_DESC' => 'Hvis din e-mail-server understøtter Secure Socket-forbindelser, vil en aktivering af dette gennemtvinge SSL-forbindelser, når du importerer e-mail.',
    'LBL_ASSIGN_TO_TEAM_DESC' => 'Det valgte team har adgang til e-mail-kontoen.',
    'LBL_SSL' => 'Brug SSL',
    'LBL_STATUS' => 'Status',
    'LBL_SYSTEM_DEFAULT' => 'Systemstandard',
    'LBL_TEST_BUTTON_KEY' => 't',
    'LBL_TEST_BUTTON_TITLE' => 'Test',
    'LBL_TEST_SETTINGS' => 'Testindstillinger',
    'LBL_TEST_SUCCESSFUL' => 'Forbindelsen blev oprettet.',
    'LBL_TEST_WAIT_MESSAGE' => 'Et øjeblik...',
    'LBL_TLS_DESC' => 'Brug Transport Layer Security, når du opretter forbindelse til e-mail-serveren - brug det kun, hvis din e-mail-server understøtter denne protokol.',
    'LBL_TLS' => 'Brug TLS',
    'LBL_WARN_IMAP_TITLE' => 'Indgående e-mail deaktiveret',
    'LBL_WARN_IMAP' => 'Advarsler:',
    'LBL_WARN_NO_IMAP' => 'Indgående e-mail <b>kan ikke</b> fungere, uden at IMAP c-client-biblioteker er aktiveret/kompileret med PHP-modulet. Kontakt administratoren for at løse problemet.',

    'LNK_CREATE_GROUP' => 'Opret en ny gruppe',
    'LNK_LIST_CREATE_NEW_GROUP' => 'Ny gruppe-e-mail-konto',
    'LNK_LIST_CREATE_NEW_BOUNCE' => 'Ny konto til afvisningshåndtering',
    'LNK_LIST_MAILBOXES' => 'Alle e-mail-konti',
    'LNK_LIST_QUEUES' => 'Alle køer',
    'LNK_LIST_SCHEDULER' => 'Planlæggere',
    'LNK_LIST_TEST_IMPORT' => 'Test e-mail-import',
    'LNK_NEW_QUEUES' => 'Opret en ny kø',
    'LNK_SEED_QUEUES' => 'Startkøer fra team',
    'LBL_GROUPFOLDER_ID' => 'Gruppemappe-id',
    'LBL_ASSIGN_TO_GROUP_FOLDER' => 'Tildel til gruppemappe',
    'LBL_STATUS_ACTIVE' => 'Aktiv',
    'LBL_STATUS_INACTIVE' => 'Inaktiv',
    'LBL_IS_PERSONAL' => 'personlig',
    'LBL_IS_GROUP' => 'gruppe',
    'LBL_ENABLE_AUTO_IMPORT' => 'Importér e-mails automatisk',
    'LBL_WARNING_CHANGING_AUTO_IMPORT' => 'Advarsel: Du er i færd med at redigere indstillingen for automatisk import, hvilket kan resultere i tab af data.',
    'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => 'Advarsel: Automatisk import skal aktiveres, når sager oprettes automatisk.',
    'LBL_EDIT_LAYOUT' => 'Rediger layout' /*for 508 compliance fix*/,
    'LBL_AUTHORIZED_ACCOUNT' => 'E-mailadresse',
    'LBL_EMAIL_PROVIDER' => 'E-mailudbyder',
    'LBL_AUTH_STATUS' => 'Godkendelsesstatus',
];
