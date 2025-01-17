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
 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 * *******************************************************************************/

$mod_strings = [
    'LBL_BASIC_SEARCH' => 'Basis zoeken',
    'LBL_ADVANCED_SEARCH' => 'Geavanceerd zoeken',
    'LBL_BASIC_TYPE' => 'Basaal Type',
    'LBL_ADVANCED_TYPE' => 'Geavanceerd Type',
    'LBL_SYSOPTS_1' => 'Selecteer uit de volgende systeemconfiguratie mogelijkheden hieronder.',
    'LBL_SYSOPTS_2' => 'Welk type database gaat deze Sugar-instantie gebruiken ?',
    'LBL_SYSOPTS_CONFIG' => 'Systeem Configuratie',
    'LBL_SYSOPTS_DB_TYPE' => '',
    'LBL_SYSOPTS_DB' => 'Specificeer Database Type',
    'LBL_SYSOPTS_DB_TITLE' => 'Type database',
    'LBL_SYSOPTS_ERRS_TITLE' => 'Verhelp de volgende fouten a.u.b. voordat u verder gaat:',
    'LBL_MAKE_DIRECTORY_WRITABLE' => 'Geef aub de volgende directory schrijfrechten',


    'ERR_DB_LOGIN_FAILURE_IBM_DB2' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_IBM_DB2_CONNECT' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_IBM_DB2_VERSION' => 'Uw versie van DB2 (%s) wordt niet ondersteund door Sugar.  U dient een compatibele versie te installeren met de Sugar applicatie. Raadpleeg aub de Compatibility Matrix in de Release Notes voor de DB2 Versies welke worden ondersteund.',

    'LBL_SYSOPTS_DB_DIRECTIONS' => 'U dient een Oracle client geïnstalleerd en geconfigureerd te hebben wanneer u Oracle kiest',
    'ERR_DB_LOGIN_FAILURE_OCI8' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_OCI8_CONNECT' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_OCI8_VERSION' => 'Uw versie van Oracle (%s) wordt niet ondersteund door Sugar.  U dient een compatibele versie te installeren met de Sugar applicatie. Raadpleeg aub de Compatibility Matrix in de Release Notes voor de Oracle-versies welke worden ondersteund.',
    'LBL_DBCONFIG_ORACLE' => 'Voer aub de naam van uw database in. Dit wordt de standaard (default) table space welke zal zijn toegewezen aan uw gebruiker ((SID from tnsnames.ora).',
    // seed Ent Reports
    'LBL_Q' => 'Opportunity Query',
    'LBL_Q1_DESC' => 'Opportunities per Type',
    'LBL_Q2_DESC' => 'Opportunities per Organisatie',
    'LBL_R1' => '6 maanden Salesfunnel Rapportage',
    'LBL_R1_DESC' => 'Opportunities van de komende 6 maanden per maand en type',
    'LBL_OPP' => 'Opportunity Gegevens Set',
    'LBL_OPP1_DESC' => 'Hier kunt u de "look and feel" wijzigen van de aangepaste query',
    'LBL_OPP2_DESC' => 'Deze query zal worden gestapeld onder de eerste query in het rapport',
    'ERR_DB_VERSION_FAILURE' => 'Versie database controleren mislukt.',

    'DEFAULT_CHARSET' => 'UTF-8',
    'ERR_ADMIN_USER_NAME_BLANK' => 'Geef de gebruikersnaam van de Sugar admin gebruiker',
    'ERR_ADMIN_PASS_BLANK' => 'Vul het wachtwoord in van de Sugar Admin gebruiker.',

    'ERR_CHECKSYS' => 'Er zijn fouten ontdekt tijdens de compatibiliteitscheck. Om uw SugarCRM installatie goed te laten functioneren, dienen onderstaande issues te worden opgelost, druk daarna op de recheck-button of probeer opnieuw te installeren.',
    'ERR_CHECKSYS_CALL_TIME' => 'Parameter &#39;Allow Call Time Pass Reference&#39; heeft de waarde &#39;On&#39;  en deze moet &#39;Off&#39; zijn de php.ini',

    'ERR_CHECKSYS_CURL' => 'Niet gevonden: Sugar Scheduler wordt beperkt uitgevoerd. De e-mailarchiveringsdienst wordt niet uitgevoerd.',
    'ERR_CHECKSYS_IMAP' => 'Niet gevonden: Inkomende E-mail en Campagnes (E-mail) vereisen de IMAP-bibliotheken. Geen van beiden zullen functioneel zijn.',
    'ERR_CHECKSYS_MSSQL_MQGPC' => 'Magic Quotes GPC kan niet  "On" zijn als  MS SQL Server wordt gebruikt.',
    'ERR_CHECKSYS_MEM_LIMIT_0' => 'Waarschuwing:',
    'ERR_CHECKSYS_MEM_LIMIT_1' => '(Zet dit op',
    'ERR_CHECKSYS_MEM_LIMIT_2' => 'M of hoge in uw php.ini bestand)',
    'ERR_CHECKSYS_MYSQL_VERSION' => 'Minimum Versie 4.1.2 - Gevonden:',
    'ERR_CHECKSYS_NO_SESSIONS' => 'Schrijven en Lezen van sessie variabelen is mislukt. Onmogelijk verder te gaan met de installatie.',
    'ERR_CHECKSYS_NOT_VALID_DIR' => 'Geen geldige directory',
    'ERR_CHECKSYS_NOT_WRITABLE' => 'Waarschuwing: Niet Schrijfbaar',
    'ERR_CHECKSYS_PHP_INVALID_VER' => 'Uw versie van PHP wordt niet ondersteund door Sugar. U moet een versie hebben die compatibel is. Raadpleeg de Compatibility Matrix in de Release Notes voor de ondersteunde PHP-versies. Uw versie is',
    'ERR_CHECKSYS_IIS_INVALID_VER' => 'Uw versie van IIS wordt niet ondersteund door Sugar. Het moet een versie zijn die compatibel is met het te installeren Sugar programma. Raadpleeg de Compatibility Matrix in de Release Notes voor de ondersteunde IIS-versies. Uw versie is',
    'ERR_CHECKSYS_FASTCGI' => 'We hebben gedetecteerd dat u geen FastCGI handler mapping gebruikt voor PHP. U moet een versie installeren/configureren die compatible is met de Sugar applicatie. Raadpleeg de Compatibility Matrix in de Release Notes voor de ondersteunde versies. Zie <a href="http://www.iis.net/php/" target="_blank" rel="nofollow noopener noreferrer">http://www.iis.net/php/</a> voor informatie ',
    'ERR_CHECKSYS_FASTCGI_LOGGING' => 'Voor een optimale ervaring met IIS / FastCGI sapi, stel fastcgi.logging op 0 in je php.ini bestand.',
    'ERR_CHECKSYS_PHP_UNSUPPORTED' => 'Niet ondersteunde PHP versie geinstalleerd: ( ver',
    'LBL_DB_UNAVAILABLE' => 'Database niet beschikbaar',
    'LBL_CHECKSYS_DB_SUPPORT_NOT_AVAILABLE' => 'Database-ondersteuning is niet gevonden.  Zorg ervoor dat u over de benodigde stuurprogramma\'s beschikt voor een van de volgende ondersteunde databasetypen: MySQL, MS SQLServer, Oracle of DB2.  Mogelijk moet u de extensie in het php.ini bestand verwijderen of opnieuw compileren met het juiste binaire bestand, afhankelijk van uw versie van PHP.  Raadpleeg de PHP-handleiding voor meer informatie over het inschakelen van databaseondersteuning.',
    'LBL_CHECKSYS_XML_NOT_AVAILABLE' => 'Functies behorende bij "XML Parser Libraries" benodigd door SugarCRM zijn niet gevonden. Controleer php.ini of de regels nog als commentaar zijn opgevoerd of hercompileer de binary file, afhankelijk van uw PHP versie. Raadpleeg de PHP handleiding voor meer informatie.',
    'LBL_CHECKSYS_CSPRNG' => 'Willekeurige nummergenerator',
    'ERR_CHECKSYS_MBSTRING' => 'Functies behorende bij "Multibyte Strings PHP Extension" benodigd door SugarCRM zijn niet gevonden. N.B. Standaard wordt de module niet geinstalleerd in PHP, om deze alsnog te activeren dient deze met "--enable-mbstring" te worden meegegeven als de PHP Binary wordt opgebouwd. Raadpleeg de PHP handleiding voor meer informatie.',
    'ERR_CHECKSYS_SESSION_SAVE_PATH_NOT_SET' => 'De "session.save_path" setting in de php.ini bestaat niet of staat ingesteld op een map die niet bestaat.',
    'ERR_CHECKSYS_SESSION_SAVE_PATH_NOT_WRITABLE' => 'De "session.save_path" setting in de php.ini staat ingesteld op een niet schrijfbare map.  Maak deze map aub schrijfbaar door chmod 766 of via de rechtmuisknop afhankelijk van uw besturingssysteem.',
    'ERR_CHECKSYS_CONFIG_NOT_WRITABLE' => 'Het config bestand bestaat wel, maar is niet schrijfbaar.  Maak dit bestand schrijfbaar door chmod 766 of via de rechtermuisknop, afhankelijk van uw besturingssysteem.',
    'ERR_CHECKSYS_CONFIG_OVERRIDE_NOT_WRITABLE' => 'Het config overschrijven bestand bestaat wel, maar kan niet worden geschreven. Onderneem de nodige stappen om het bestand te kunnen schrijven. Afhankelijk van uw besturingssysteem kan het voorkomen dat u de rechten moet wijzigen door chmod 766 uit te voeren of u kunt met de rechter muisknop op de bestandsnaam klikken om de eigenschappen te openen en de optie alleen-lezen te deselecteren.',
    'ERR_CHECKSYS_CUSTOM_NOT_WRITABLE' => 'De Custom Directory bestaat wel, maar is niet schrijfbaar.  Maak deze map schrijfbaar door chmod 766 of via de rechtermuisknop, afhankelijk van uw besturingssysteem.',
    'ERR_CHECKSYS_FILES_NOT_WRITABLE' => "Onderstaande bestanden of mappen zijn niet schrijfbaar cq aanwezig. afhankelijk van uw besturingssysteem dient u de permissie te wijzigen van het bestand of de bovenliggende map, middels chmod 766 of via de rechtermuisknop (read-only optie uitvinken) en dit ook toepassen op alle subfolders",
    'ERR_CHECKSYS_SAFE_MODE' => 'Safe Mode staat aan. Het kan wenselijk zijn dit uit te schakelen in de php.ini',
    'ERR_CHECKSYS_ZLIB' => 'Niet gevonden: SugarCRM heeft veel betere performance indien zlib compressie is ingeschakeld.',
    'ERR_CHECKSYS_ZIP' => 'ZIP support niet gevonden: SugarCRM heeft ZIP ondersteuning nodig voor gecomprimeerde bestanden',
    'ERR_CHECKSYS_BCMATH' => 'BCMATH-ondersteuning niet gevonden: SugarCRM heeft BCMATH-ondersteuning nodig voor een willekeurige precisieberekening.',
    'ERR_CHECKSYS_HTACCESS' => 'Test voor .htaccess rewrites mislukt. Dit betekent doorgaand dat je niet AllowOverride hebt ingesteld voor de Sugar directory.',
    'ERR_CHECKSYS_CSPRNG' => 'CSPRNG uitzondering',
    'ERR_DB_ADMIN' => 'Gebruikersnaam en/of wachtwoord van de opgegeven database administrator zijn ongeldig. Hierdoor kan er geen koppeling met de database gemaakt worden. Voer een geldige gebruikersnaam en wachtwoord op.(Error:',
    'ERR_DB_ADMIN_MSSQL' => 'Gebruikersnaam en/of wachtwoord van de opgegeven database administrator zijn ongeldig. Hierdoor kan er geen koppeling met de database gemaakt worden.  Voer een geldige gebruikersnaam en wachtwoord op.',
    'ERR_DB_EXISTS_NOT' => 'Gespecificeerde database bestaat niet',
    'ERR_DB_EXISTS_WITH_CONFIG' => 'Deze database bestaat al. Om toch een installatie te doen met de gekozen database, dient u de installatie opnieuw uit te voeren en "Verwijder en Opnieuw aanmaken bestaande SugarCRM tabellen?"  te kiezen. Om een upgrade te doen, kies dan de Upgrade Wizard in de Admin Console. Leest u de upgrade documentatie die u  <a href="http://www.sugarforge.org/content/downloads/" target="_new">hier</a> kunt vinden.',
    'ERR_DB_EXISTS' => 'Deze database bestaat al, het is niet mogelijk nog een met dezelfde naam aan te maken',
    'ERR_DB_EXISTS_PROCEED' => 'Deze database bestaat al. U kunt middels de "terug"-knop een andere databasenaam kiezen, of op volgende drukken en alle bestanden in de bestaande database vernietigen. Al uw gegevens zijn daarna verdwenen.',
    'ERR_DB_HOSTNAME' => 'Host naam mag niet leeg zijn.',
    'ERR_DB_INVALID' => 'Ongeldige database type gekozen.',
    'ERR_DB_LOGIN_FAILURE' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_LOGIN_FAILURE_MYSQL' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_LOGIN_FAILURE_MSSQL' => 'De aangegeven database host, gebruikersnaam en/of wachtwoord is ongeldig. Een verbinding met de database kan niet tot stand worden gebracht. Voer aub een geldige host, gebruikersnaam en wachtwoord in.',
    'ERR_DB_MYSQL_VERSION' => 'Uw MySQL versie (%s) wordt niet ondersteund door Sugar.  U dient een compatibele versie te installeren. Raadpleeg aub de Compatibility Matrix in de Release Notes voor de ondersteunde MySQL versies.',
    'ERR_DB_NAME' => 'Database naam mag niet leeg zijn',
    'ERR_DB_NAME2' => "Database naam mag geen &#39;\\&#39;, &#39;/&#39;, or &#39;.&#39; bevatten",
    'ERR_DB_MYSQL_DB_NAME_INVALID' => "Database naam mag geen &#39;\\&#39;, &#39;/&#39;, or &#39;.&#39; bevatten",
    'ERR_DB_MSSQL_DB_NAME_INVALID' => "Database naam mag geen &#39;\"&#39;, \"&#39;\", &#39;*&#39;, &#39;/&#39;, &#39;\\&#39;, &#39;?&#39;, &#39;:&#39;, &#39;<&#39;, &#39;>&#39;, or &#39;-&#39; bevatten",
    'ERR_DB_OCI8_DB_NAME_INVALID' => "Naam database mag slechts uit alfanumerieke tekens en de volgende symbolen bestaan: '#', '_', '-', ':', '.', '/' or '$'",
    'ERR_DB_PASSWORD' => 'De wachtwoorden voor de Sugar Database Administrator komen niet overeen. Voer a.u.b. het wachtwoord opnieuw in',
    'ERR_DB_PRIV_USER' => 'Voer de Database Administrator Gebruikersnaam in. Dit is benodigd voor de koppeling met de database',
    'ERR_DB_USER_EXISTS' => 'De gebruikersnaam voor de Sugar Database bestaat reeds. Voer een andere op.',
    'ERR_DB_USER' => 'Voer een gebruikersnaam in voor Sugar database administrator.',
    'ERR_DBCONF_VALIDATION' => 'Verhelp de volgende fouten a.u.b. voordat u verder gaat:',
    'ERR_DBCONF_PASSWORD_MISMATCH' => 'De wachtwoorden komen niet overeen. Vul de wachtwoorden a.u.b. opnieuw in',
    'ERR_ERROR_GENERAL' => 'De volgende fouten zijn geconstateerd:',
    'ERR_LANG_CANNOT_DELETE_FILE' => 'Kan bestand niet verwijderen:',
    'ERR_LANG_MISSING_FILE' => 'Kan bestand niet vinden:',
    'ERR_LANG_NO_LANG_FILE' => 'Er is geen taalpakket gevonden in include/language:',
    'ERR_LANG_UPLOAD_1' => 'Er is een fout opgetreden bij het uploaden. Probeer het a.u.b. opnieuw.',
    'ERR_LANG_UPLOAD_2' => 'Taalpakket moet een ZIP-bestand zijn',
    'ERR_LANG_UPLOAD_3' => 'PHP kon de temp niet verplaatsen naar de upgrade directory',
    'ERR_LICENSE_MISSING' => 'Verplichte velden ontbreken',
    'ERR_LICENSE_NOT_FOUND' => 'Licentie bestand niet gevonden!',
    'ERR_LOG_DIRECTORY_NOT_EXISTS' => 'Log directory is niet geldig.',
    'ERR_LOG_DIRECTORY_NOT_WRITABLE' => 'Log directory is niet schrijfbaar.',
    'ERR_LOG_DIRECTORY_REQUIRED' => 'Log directory is verplicht indien u uw eigen wil maken',
    'ERR_NO_DIRECT_SCRIPT' => 'Kan script niet uitvoeren.',
    'ERR_NO_SINGLE_QUOTE' => 'Kan het enkele aanhalingsteken niet gebruiken voor',
    'ERR_PASSWORD_MISMATCH' => 'De wachtwoorden voor de Sugar Admin Gebruiker komen niet overeen. Voer a.u.b. het wachtwoord opnieuw in',
    'ERR_PERFORM_CONFIG_PHP_1' => 'Kan niet schrijven naar de <span class=stop>config.php</span> file.',
    'ERR_PERFORM_CONFIG_PHP_2' => 'U kunt verder gaan door de config.php handmatig aan te maken en de onderstaande regels erin te plakken. Hoe dan ook, u MOET de config.php eerst aanmaken alvorens verder te gaan met de volgende stap.',
    'ERR_PERFORM_CONFIG_PHP_3' => 'Heeft u de config.php file aangemaakt?',
    'ERR_PERFORM_CONFIG_PHP_4' => 'Waarschuwing: Kon de config.php file niet schrijven. Controleer of het bestaat.',
    'ERR_PERFORM_HTACCESS_1' => 'kan niet schrijven naar',
    'ERR_PERFORM_HTACCESS_2' => 'file.',
    'ERR_PERFORM_HTACCESS_3' => 'Als uw logfile niet benaderbaar mag zijn via een browser, maak dan een .htaccess file aan in uw log directory met daarin de volgende regel:',
    'ERR_PERFORM_NO_TCPIP' => '<b>Geen internetverbinding opgemerkt</b> Als u wel een internetconnectie heeft, bezoek dan a.u.b. <a href="http://www.sugarcrm.com/home/index.php?option=com_extended_registration&task=register">http://www.sugarcrm.com/home/index.php?option=com_extended_registration&task=register</a> om u te registeren bij SugarCRM. Door ons een beetje informatie te geven over uw organisatie en de wijze waarop u CRM wil gaan inzetten, kunnen wij ervoor zorgen dat u de juiste applicatie heeft voor uw bedoelingen.',
    'ERR_SESSION_DIRECTORY_NOT_EXISTS' => 'Session directory is niet geldig.',
    'ERR_SESSION_DIRECTORY' => 'Session directory provided is niet schrijfbaar.',
    'ERR_SESSION_PATH' => 'Session path is verplicht indien u een eigen wil.',
    'ERR_SI_NO_CONFIG' => 'Er is geen config_si.php in de document root, OF er is geen $sugar_config_si gedefinieerd in de config.php',
    'ERR_SITE_GUID' => 'Application ID is verplicht indien u een eigen wil.',
    'ERROR_SPRITE_SUPPORT' => 'Momenteel kunnen we de GD-bibliotheek niet vinden. Hierdoor kunt u de CSS Sprite functie niet gebruiken.',
    'ERR_UPLOAD_MAX_FILESIZE' => 'Waarschuwing: Uw PHP installatie moet worden aangepast zodat bestanden van minimaal 6MB kunnen worden geupload.',
    'LBL_UPLOAD_MAX_FILESIZE_TITLE' => 'Afmetingen uploadbestand',
    'ERR_URL_BLANK' => 'Geef de standaard URL in voor deze Sugar instantie.',
    'ERR_UW_NO_UPDATE_RECORD' => 'Kan het installatierecord niet vinden',
    'ERROR_FLAVOR_INCOMPATIBLE' => 'Het geüploade bestand is niet compatibel met deze versie (Professional, Enterprise of Ultimate editie) van Sugar: ',
    'ERROR_LICENSE_EXPIRED' => 'Waarschuwing: Je licentie is verlopen.',
    'ERROR_LICENSE_EXPIRED2' => "dag(en) geleden. Ga naar <a href=\"index.php?action=LicenseSettings&module=Administration\">\"License Management\"</a>  in het Admin-scherm om een nieuwe liceniesleutel op te voeren. U dient binnen 30 dagen na het verlopen van de licentie een nieuwe op te voeren anders kunt u niet meer inloggen.",
    'ERROR_MANIFEST_TYPE' => 'Het Manifest bestand moet het type van dit package aangeven',
    'ERROR_PACKAGE_TYPE' => 'Het manifest bestand geeft een onbekend package type aan',
    'ERROR_VALIDATION_EXPIRED' => 'Waarschuwing: Je validatiesleutel is verlopen.',
    'ERROR_VALIDATION_EXPIRED2' => "dag(en) geleden. Ga naar <a href=\"index.php?action=LicenseSettings&module=Administration\">\"License Management\"</a>  in het Admin-scherm om een nieuwe validatiesleutel op te voeren. U dient binnen 30 dagen na het verlopen van de validatie een nieuwe op te voeren anders kunt u niet meer inloggen.",
    'ERROR_VERSION_INCOMPATIBLE' => 'Dit bestand is niet compatible met deze versie van de Sugar Suite:',

    'LBL_BACK' => 'Terug',
    'LBL_CANCEL' => 'Annuleren',
    'LBL_ACCEPT' => 'Ik ga akkoord',
    'LBL_CHECKSYS_1' => 'Om uw Sugar installatie correct te laten functioneren dienen alle systeemchecks hier beneden groen te zijn. Als er rode bij zijn, onderneem dan de noodzakelijke stappen om ze op te lossen. <BR><BR> Hulp nodig? <a href="http://www.sugarcrm.com/crm/installation" target="_blank">Sugar Wiki</a>.',
    'LBL_CHECKSYS_CACHE' => 'S§chrijfbare Cache Sub-Directories',
    'LBL_DROP_DB_CONFIRM' => 'Deze database bestaat al. U kunt middels de "terug"-knop een andere databasenaam kiezen, of op volgende drukken en alle bestanden in de bestaande database vernietigen. Al uw gegevens zijn daarna verdwenen.',
    'LBL_CHECKSYS_CALL_TIME' => 'PHP Allow Call Time Pass Reference staat uitgeschakeld',
    'LBL_CHECKSYS_COMPONENT' => 'Component',
    'LBL_CHECKSYS_COMPONENT_OPTIONAL' => 'Optionele Componenten',
    'LBL_CHECKSYS_CONFIG' => 'Schrijfbare SugarCRM Configuration File (config.php)',
    'LBL_CHECKSYS_CONFIG_OVERRIDE' => 'SugarCRM configuratiebestand dat kan worden geschreven (config_override.php)',
    'LBL_CHECKSYS_CURL' => 'cURL module',
    'LBL_CHECKSYS_SESSION_SAVE_PATH' => 'Instelling pad opslaan sessie',
    'LBL_CHECKSYS_CUSTOM' => 'Schrijfbare Custom Directory',
    'LBL_CHECKSYS_DATA' => 'Schrijfbare Data Sub-Directories',
    'LBL_CHECKSYS_IMAP' => 'IMAP module',
    'LBL_CHECKSYS_MQGPC' => 'Magic Quotes GPC',
    'LBL_CHECKSYS_MBSTRING' => 'MB Strings Module',
    'LBL_CHECKSYS_MEM_OK' => 'OK (Geen Limiet)',
    'LBL_CHECKSYS_MEM_UNLIMITED' => 'OK (Ongelimiteerd)',
    'LBL_CHECKSYS_MEM' => 'PHP Memory Limiet',
    'LBL_CHECKSYS_MODULE' => 'Schrijfbare Modules Sub-Directories en Files',
    'LBL_CHECKSYS_MYSQL_VERSION' => 'MySQL Versie',
    'LBL_CHECKSYS_NOT_AVAILABLE' => 'Niet beschikbaar',
    'LBL_CHECKSYS_OK' => 'OK',
    'LBL_CHECKSYS_PHP_INI' => '<b>Opmerking:</b> Uw PHP configuratiebestand (php.ini) staat hier:',
    'LBL_CHECKSYS_PHP_OK' => 'OK (ver',
    'LBL_CHECKSYS_PHPVER' => 'PHP Versie',
    'LBL_CHECKSYS_IISVER' => 'IIS Versie',
    'LBL_CHECKSYS_FASTCGI' => 'FastCGI',
    'LBL_CHECKSYS_RECHECK' => 'Opnieuw controleren',
    'LBL_CHECKSYS_SAFE_MODE' => 'PHP Safe Mode staat uitgeschakeld',
    'LBL_CHECKSYS_SESSION' => 'Schrijfbare Session Save Path (',
    'LBL_CHECKSYS_STATUS' => 'Status',
    'LBL_CHECKSYS_TITLE' => 'System Check Aanvaarding',
    'LBL_CHECKSYS_VER' => 'Gevonden: ( ver',
    'LBL_CHECKSYS_XML' => 'XML parseren',
    'LBL_CHECKSYS_ZLIB' => 'ZLIB compressiemodule',
    'LBL_CHECKSYS_ZIP' => 'ZIP verwerpkingsmodule',
    'LBL_CHECKSYS_BCMATH' => 'Willekeurige nauwkeurige berekeningsmodule',
    'LBL_CHECKSYS_HTACCESS' => 'AllowOverride setup voor .htaccess',
    'LBL_CHECKSYS_FIX_FILES' => 'Bevestig de volgende bestanden en directories voor verder te gaan:',
    'LBL_CHECKSYS_FIX_MODULE_FILES' => 'Bevestig de volgende module directories en de bestanden in deze directories voor verder te gaan:',
    'LBL_CHECKSYS_UPLOAD' => 'Schrijfbare uploadmap',
    'LBL_CLOSE' => 'Sluiten',
    'LBL_THREE' => '3',
    'LBL_CONFIRM_BE_CREATED' => 'wordt gemaakt',
    'LBL_CONFIRM_DB_TYPE' => 'Type database',
    'LBL_CONFIRM_DIRECTIONS' => 'Bevestig onderstaande instellingen.  Mocht u toch een van de waarden willen aanpassen, klik dan op -terug-.  anders klik op -volgende- om de installatie te starten',
    'LBL_CONFIRM_LICENSE_TITLE' => 'Licentie Informatie',
    'LBL_CONFIRM_NOT' => 'niet',
    'LBL_CONFIRM_TITLE' => 'Bevestig Instellingen',
    'LBL_CONFIRM_WILL' => 'zal',
    'LBL_DBCONF_CREATE_DB' => 'Nieuwe Database',
    'LBL_DBCONF_CREATE_USER' => 'Maak gebruiker aan [ALT+N]',
    'LBL_DBCONF_DB_DROP_CREATE_WARN' => 'Voorzichting: Alle Sugar gegevens zullen worden verwijderd<br>als deze checkbox is aangevinked.',
    'LBL_DBCONF_DB_DROP_CREATE' => 'Verwijder en Opnieuw aanmaken Bestaande Sugar tabellen?',
    'LBL_DBCONF_DB_DROP' => 'Verwijder Tabellen',
    'LBL_DBCONF_DB_NAME' => 'Database Naam',
    'LBL_DBCONF_DB_PASSWORD' => 'Sugar Database User Wachtwoord',
    'LBL_DBCONF_DB_PASSWORD2' => 'Bevestig Sugar Database User Wachtwoord',
    'LBL_DBCONF_DB_USER' => 'Sugar Database Gebruikersnaam',
    'LBL_DBCONF_SUGAR_DB_USER' => 'Sugar Database Gebruikersnaam',
    'LBL_DBCONF_DB_ADMIN_USER' => 'Database Administrator Gebruikersnaam',
    'LBL_DBCONF_DB_ADMIN_PASSWORD' => 'Database Admin Wachtwoord',
    'LBL_DBCONF_DEMO_DATA' => 'Vul Database met Demo Data?',
    'LBL_DBCONF_DEMO_DATA_TITLE' => 'Kies Demo Data',
    'LBL_DBCONF_HOST_NAME' => 'Host Naam',
    'LBL_DBCONF_HOST_INSTANCE' => 'Host exemplaar',
    'LBL_DBCONF_HOST_PORT' => 'Poort',
    'LBL_DBCONF_SSL_ENABLED' => 'SSL-verbinding inschakelen',
    'LBL_DBCONF_INSTRUCTIONS' => 'Vul uw database configuratie informatie hierbeneden in. Weet u niet zeker wat u moet invullen gebruik dan de standaard waarden.',
    'LBL_DBCONF_MB_DEMO_DATA' => 'Gebruik van multi-byte tekst in de demo-gegevens?',
    'LBL_DBCONFIG_MSG2' => 'Naam van de webserver of de machine (host) waar de database staat.',
    'LBL_DBCONFIG_MSG3' => 'Naam van de database die de gegevens van uw Sugar instantie zal bevatten:',
    'LBL_DBCONFIG_B_MSG1' => 'De gebruikersnaam en het wachtwoord van de database-administrator, die tabellen en gebruikers mag aanmaken en wijzigen, is noodzakelijk voor het opzetten van de database',
    'LBL_DBCONFIG_SECURITY' => 'Voor beveiligingsdoeleinden kunt u ervoor kiezen een exclusieve database gebruiker op te geven om de verbinding te maken met de Sugar Database. Deze gebruiker moet dan wel dezelfde rechten hebben als de database administrator.',
    'LBL_DBCONFIG_AUTO_DD' => 'Doe het voor mij',
    'LBL_DBCONFIG_PROVIDE_DD' => 'Verstrek een bestaande gebruiker',
    'LBL_DBCONFIG_CREATE_DD' => 'Definieer een gebruiker om aan te maken',
    'LBL_DBCONFIG_SAME_DD' => 'Zelfde als Admin Gebruiker',
    //'LBL_DBCONF_I18NFIX'              => 'Apply database column expansion for varchar and char types (up to 255) for multi-byte data?',
    'LBL_FTS' => 'Volledige tekst zoeken',
    'LBL_FTS_INSTALLED' => 'Geïnstalleerd',
    'LBL_FTS_INSTALLED_ERR1' => 'De functie volledige tekst zoeken is niet geïnstalleerd.',
    'LBL_FTS_INSTALLED_ERR2' => 'U kunt wel installeren, maar u kunt de functie Volledige tekst zoeken niet gebruiken. Raadpleeg de installatiegids van uw databaseserver om te lezen hoe u dit kunt doen. Ook kunt u contact opnemen met uw beheerder.',
    'LBL_DBCONF_PRIV_PASS' => 'Privilege Database Gebruiker Wachtwoord',
    'LBL_DBCONF_PRIV_USER_2' => '`Bovenstaande Database Account is een Privileged Gebruiker?',
    'LBL_DBCONF_PRIV_USER_DIRECTIONS' => 'Deze bevoorrechte database gebruiker moet de juiste permissies hebben om een database te kunnen aanleggen, verwijderen/maken van tabellen, en gebruikers kunnen aanmaken.  Deze gebruiker wordt alleen gebruikt tijdens het installatieproces.  U kunt ook dezelfde gebruiker als hierboven nemen als die gebruiker de juiste rechten heeft.',
    'LBL_DBCONF_PRIV_USER' => 'Bevoorrechte Database Gebruiker Naam',
    'LBL_DBCONF_TITLE' => 'Database Configuratie',
    'LBL_DBCONF_TITLE_NAME' => 'Verstrek Database Naam',
    'LBL_DBCONF_TITLE_USER_INFO' => 'Verstrek Database Gebruiker Informatie',
    'LBL_DISABLED_DESCRIPTION_2' => 'Nadat deze wijziging is gedaan, kunt u op de "Start" button klikken om te beginnen met de installatie.  <i>Nadat de installatie compleet is uitgevoerd, is het misschien wenselijk de waarde van &#39;installer_locked&#39; op &#39;true&#39; te zetten.</i>',
    'LBL_DISABLED_DESCRIPTION' => 'De installatieprocedure is reeds uitgevoerd. Voor veiligheidsdoeleinden is het onmogelijk gemaakt het proces een tweede keer op te starten. Mocht u absoluut zeker weten dat u toch opnieuw wil installeren. Ga dan naar de config.php en zet de variabele "installer_locked" op false. De regel moet er zo uitzien:',
    'LBL_DISABLED_HELP_1' => 'Voor hulp bij de installatie bezoek SugarCRM',
    'LBL_DISABLED_HELP_LNK' => 'http://www.sugarcrm.com/forums/',
    'LBL_DISABLED_HELP_2' => 'supportfora',
    'LBL_DISABLED_TITLE_2' => 'SugarCRM Installatie is uitgezet',
    'LBL_DISABLED_TITLE' => 'SugarCRM Installatie Uitgezet',
    'LBL_EMAIL_CHARSET_DESC' => 'Karakter Set die het meeste wordt gebruikt in uw locale',
    'LBL_EMAIL_CHARSET_TITLE' => 'Uitgaande e-mail instellingen',
    'LBL_EMAIL_CHARSET_CONF' => 'Karakter Set voor Uitgaande E-mail',
    'LBL_HELP' => 'Help',
    'LBL_INSTALL' => 'Installeren',
    'LBL_INSTALL_TYPE_TITLE' => 'Installatie Opties',
    'LBL_INSTALL_TYPE_SUBTITLE' => 'Kies Installeer Type',
    'LBL_INSTALL_TYPE_TYPICAL' => '<b>Typische Installatie</b>',
    'LBL_INSTALL_TYPE_CUSTOM' => '<b>Aangepaste Installatie</b>',
    'LBL_INSTALL_TYPE_MSG1' => 'Deze sleutel is niet vereist voor de installatie, maar is wel nodig voor de standaard applicatie functionaliteit. U hoeft deze sleutel dus nu niet in te vullen, maar u moet de sleutel wel invoeren nadat de installatie klaar is.',
    'LBL_INSTALL_TYPE_MSG2' => 'Vereist minimale informatie voor de installatie. Aanbevolen voor nieuwe gebruikers.',
    'LBL_INSTALL_TYPE_MSG3' => 'Biedt extra opties om in te stellen tijdens de installatie. De meeste van deze opties zijn ook beschikbaar na de installatie in de admin-schermen. Aanbevolen voor gevorderde gebruikers.',
    'LBL_LANG_1' => 'Voor het gebruik van een andere taal dan de standaard taal (US-Engels), kunt u nu het taalpakket uploaden en installeren. Dit kan trouwens ook later vanuit SugarCRM. Als u deze stap wilt overslaan, druk op -volgende-',
    'LBL_LANG_BUTTON_COMMIT' => 'Installeren',
    'LBL_LANG_BUTTON_REMOVE' => 'Verwijder',
    'LBL_LANG_BUTTON_UNINSTALL' => 'De-installeer',
    'LBL_LANG_BUTTON_UPLOAD' => 'Uploaden',
    'LBL_LANG_NO_PACKS' => 'geen',
    'LBL_LANG_PACK_INSTALLED' => 'De volgende taalpakketten zijn geïnstalleerd:',
    'LBL_LANG_PACK_READY' => 'De volgende taalpakketten staan klaar om te worden geinstalleerd:',
    'LBL_LANG_SUCCESS' => 'Het taalpakket is succesvol geinstalleerd.',
    'LBL_LANG_TITLE' => 'Talenpakket',
    'LBL_LAUNCHING_SILENT_INSTALL' => 'Bezig met het installeren van Sugar.  Dit kan een paar minuten duren.',
    'LBL_LANG_UPLOAD' => 'Upload een taalpakket',
    'LBL_LICENSE_ACCEPTANCE' => 'Licentie Acceptatie',
    'LBL_LICENSE_CHECKING' => 'Controle systeem voor de compatibiliteit.',
    'LBL_LICENSE_CHKENV_HEADER' => 'Omgeving controleren',
    'LBL_LICENSE_CHKDB_HEADER' => 'DB, FTS credentials verifiëren.',
    'LBL_LICENSE_CHECK_PASSED' => 'Compatibiliteitscheck is gelukt.',
    'LBL_LICENSE_REDIRECT' => 'U wordt omgeleid naar',
    'LBL_LICENSE_DIRECTIONS' => 'Wilt u uw licentie-informatie (indien aanwezig) invullen in onderstaande velden.',
    'LBL_LICENSE_DOWNLOAD_KEY' => 'Geef Download Sleutel in',
    'LBL_LICENSE_EXPIRY' => 'Expiratiedatum',
    'LBL_LICENSE_I_ACCEPT' => 'Ik ga akkoord',
    'LBL_LICENSE_NUM_USERS' => 'Aantal gebruikers',
    'LBL_LICENSE_PRINTABLE' => 'Afdrukvoorbeeld',
    'LBL_PRINT_SUMM' => 'Samenvatting afdrukken',
    'LBL_LICENSE_TITLE_2' => 'SugarCRM Licentie',
    'LBL_LICENSE_TITLE' => 'Licentie Informatie',
    'LBL_LICENSE_USERS' => 'Aantal gebruikers met een Licentie',

    'LBL_LOCALE_CURRENCY' => 'Valuta Settings',
    'LBL_LOCALE_CURR_DEFAULT' => 'Standaard Valuta',
    'LBL_LOCALE_CURR_SYMBOL' => 'Valutasymbool',
    'LBL_LOCALE_CURR_ISO' => 'Valuta Code (ISO 4217)',
    'LBL_LOCALE_CURR_1000S' => 'Scheidingsteken duizendtal',
    'LBL_LOCALE_CURR_DECIMAL' => 'Scheidingsteken decimaal',
    'LBL_LOCALE_CURR_EXAMPLE' => 'Voorbeeld',
    'LBL_LOCALE_CURR_SIG_DIGITS' => 'Decimalen',
    'LBL_LOCALE_DATEF' => 'Standaard Datumformaat',
    'LBL_LOCALE_DESC' => 'De opgegeven instellingen zullen door heel SugarCRM worden gehanteerd.',
    'LBL_LOCALE_EXPORT' => 'Karaketer Set voor Import/Export <br> <i>(E-mail, .csv, vCard, PDF, data import)</i>',
    'LBL_LOCALE_EXPORT_DELIMITER' => 'Export (.csv) scheidingsteken',
    'LBL_LOCALE_EXPORT_TITLE' => 'Import/Export Instellingen',
    'LBL_LOCALE_LANG' => 'Standaard Taal',
    'LBL_LOCALE_NAMEF' => 'Standaard Naam-formaat',
    'LBL_LOCALE_NAMEF_DESC' => 's = aanhef (salutation) <br />f = voornaam (first name) <br />l = achternaam (last name)',
    'LBL_LOCALE_NAME_FIRST' => 'David',
    'LBL_LOCALE_NAME_LAST' => 'Livingstone',
    'LBL_LOCALE_NAME_SALUTATION' => 'Dr.',
    'LBL_LOCALE_TIMEF' => 'Standaard Tijd-formaat',
    'LBL_LOCALE_TITLE' => 'Lokale Instellingen',
    'LBL_CUSTOMIZE_LOCALE' => 'Locale Settings Aanpassen',
    'LBL_LOCALE_UI' => 'Gebruikers Interface',

    'LBL_ML_ACTION' => 'Actie',
    'LBL_ML_DESCRIPTION' => 'Beschrijving',
    'LBL_ML_INSTALLED' => 'Installatiedatum',
    'LBL_ML_NAME' => 'Naam',
    'LBL_ML_PUBLISHED' => 'Publiceerdatum',
    'LBL_ML_TYPE' => 'Type e-mailsjabloon',
    'LBL_ML_UNINSTALLABLE' => 'Niet installeerbaar',
    'LBL_ML_VERSION' => 'Versie',
    'LBL_MSSQL' => 'SQL Server',
    'LBL_MSSQL_SQLSRV' => 'SQL Server (Microsoft SQL Server Driver voor PHP)',
    'LBL_MYSQL' => 'MySQL',
    'LBL_MYSQLI' => 'MySQL (mysqli extensie)',
    'LBL_IBM_DB2' => 'IBM DB2',
    'LBL_NEXT' => 'Volgende',
    'LBL_NO' => 'Nee',
    'LBL_ORACLE' => 'Oracle',
    'LBL_PERFORM_ADMIN_PASSWORD' => 'Setting site admin wachtwoord',
    'LBL_PERFORM_AUDIT_TABLE' => 'audit tabel /',
    'LBL_PERFORM_CONFIG_PHP' => 'Aanmaken Sugar configuratie bestand',
    'LBL_PERFORM_CREATE_DB_1' => '<b>Aanmaken van de database</b>',
    'LBL_PERFORM_CREATE_DB_2' => '<b>van</b>',
    'LBL_PERFORM_CREATE_DB_USER' => 'Aanmaken van de database gebruikersnaam en wachtwoord...',
    'LBL_PERFORM_CREATE_DEFAULT' => 'Het creëren van standaard Sugar gegevens',
    'LBL_PERFORM_CREATE_LOCALHOST' => 'Aanmaken van de database gebruikersnaam en wachtwoord voor localhost...',
    'LBL_PERFORM_CREATE_RELATIONSHIPS' => 'Het creëren van Sugar relatie tabellen',
    'LBL_PERFORM_CREATING' => 'aanmaken /',
    'LBL_PERFORM_DEFAULT_REPORTS' => 'Het creëren van standaard rapporten',
    'LBL_PERFORM_DEFAULT_SCHEDULER' => 'Het creëren van standaard taken planner',
    'LBL_PERFORM_DEFAULT_SETTINGS' => 'Standaard instellingen toepassen',
    'LBL_PERFORM_DEFAULT_USERS' => 'Standaard gebruikers aanmaken',
    'LBL_PERFORM_DEMO_DATA' => 'Het vullen van de database met demo-gegevens (dit kan even duren)',
    'LBL_PERFORM_DONE' => 'klaar<br>',
    'LBL_PERFORM_DROPPING' => 'verwijderen /',
    'LBL_PERFORM_FINISH' => 'Afronden',
    'LBL_PERFORM_LICENSE_SETTINGS' => 'Licentie informatie bijwerken',
    'LBL_PERFORM_OUTRO_1' => 'De setup van Sugar',
    'LBL_PERFORM_OUTRO_2' => 'is nu compleet!',
    'LBL_PERFORM_OUTRO_3' => 'Totale tijd:',
    'LBL_PERFORM_OUTRO_4' => 'seconden.',
    'LBL_PERFORM_OUTRO_5' => 'Geschat geheugen gebruik:',
    'LBL_PERFORM_OUTRO_6' => 'bytes.',
    'LBL_PERFORM_OUTRO_7' => 'Uw systeem is nu geïnstalleerd en geconfigureerd voor gebruik.',
    'LBL_PERFORM_REL_META' => 'relaties meta ...',
    'LBL_PERFORM_SUCCESS' => 'Succes!',
    'LBL_PERFORM_TABLES' => 'Het creëren van Sugar bestanden, audit bestanden en relatie metadata',
    'LBL_PERFORM_TITLE' => 'Setup Uitvoeren',
    'LBL_PRINT' => 'Afdrukken',
    'LBL_REG_CONF_1' => 'Vul het onderstaande formulier in om product aankondigingen, training nieuws, speciale aanbiedingen en speciale uitnodigingen te ontvangen van SugarCRM. Sugarcrm zal de verzamelde informatie niet verkopen, verhuren of op andere wijze distribueren aan derden.',
    'LBL_REG_CONF_2' => 'Uw naam en e-mailadres zijn de enige verplichte velden voor registratie. Alle andere velden zijn optioneel, maar zeer nuttig. Sugarcrm zal de verzamelde informatie niet verkopen, verhuren of op andere wijze distribueren aan derden.',
    'LBL_REG_CONF_3' => 'Bedankt voor het registreren. Klik op de knop Voltooien om in te loggen in SugarCRM. U moet de eerste keer inloggen met gebruikersnaam "admin" en het wachtwoord die u hebt ingevoerd in stap 2.',
    'LBL_REG_TITLE' => 'Registratie',
    'LBL_REG_NO_THANKS' => 'Nee bedankt,',
    'LBL_REG_SKIP_THIS_STEP' => 'Deze stap overslaan',
    'LBL_REQUIRED' => '* Verplicht veld',

    'LBL_SITECFG_ADMIN_Name' => 'Sugar Admin Naam',
    'LBL_SITECFG_ADMIN_PASS_2' => 'Geef wachtwoord opnieuw in',
    'LBL_SITECFG_ADMIN_PASS_WARN' => 'Let op: Dit zal het admin wachtwoord van een eerdere installatie overschrijven',
    'LBL_SITECFG_ADMIN_PASS' => 'Wachtwoord',
    'LBL_SITECFG_APP_ID' => 'Applicatie ID',
    'LBL_SITECFG_CUSTOM_ID_DIRECTIONS' => 'Indien geselecteerd, moet u een applicatie-ID invoeren om de automatisch gegenereerde ID te overschrijven. Deze ID zorgt ervoor dat de sessies van 1 Sugar instance niet worden gebruikt bij andere instances. Indien er sprake is van een cluster van installaties, dan dienen deze dezelfde ID te gebruiken.',
    'LBL_SITECFG_CUSTOM_ID' => 'Verstrek uw eigen Applicatie-ID',
    'LBL_SITECFG_CUSTOM_LOG_DIRECTIONS' => 'Indien geselecteerd, moet u een log directory specificeren die de standaard directory voor de Sugar log zal overschrijven. Ongeacht waar het log-bestand zich bevindt, de toegang tot dit bestand via een webbrowser zal worden beperkt middels een .htaccess redirect.',
    'LBL_SITECFG_CUSTOM_LOG' => 'Gebruik een Eigen Log Directory',
    'LBL_SITECFG_CUSTOM_SESSION_DIRECTIONS' => 'Indien geselecteerd, moet u een beveiligde map voor het opslaan van Sugar sessie informatie opgeven. Dit om te voorkomen dat deze data kwetsbaar is op gedeelde servers.',
    'LBL_SITECFG_CUSTOM_SESSION' => 'Gebruik een Eigen Sessie directory voor Sugar.',
    'LBL_SITECFG_DIRECTIONS' => 'Gelieve uw site configuratie-informatie hieronder in te vullen. Als u niet zeker bent van de velden, raden wij u aan de standaardwaarden te gebruiken.',
    'LBL_SITECFG_FIX_ERRORS' => '<b>Los a.u.b. eerst de volgende fouten op alvorens verder te gaan:</b>',
    'LBL_SITECFG_LOG_DIR' => 'Logmap',
    'LBL_SITECFG_SESSION_PATH' => 'Pad naar Session Directory<br>(dient schrijfbaar te zijn)',
    'LBL_SITECFG_SITE_SECURITY' => 'Selecteer Beveiliging Opties',
    'LBL_SITECFG_SUGAR_UP_DIRECTIONS' => 'Indien geselecteerd, zal het systeem regelmatig controleren of er nieuwere versies van de applicatie zijn.',
    'LBL_SITECFG_SUGAR_UP' => 'Automatisch controleren op updates?',
    'LBL_SITECFG_SUGAR_UPDATES' => 'Sugar Actualiseert Config',
    'LBL_SITECFG_TITLE' => 'Site-Configuratie',
    'LBL_SITECFG_TITLE2' => 'Identificeer uw Sugar instance',
    'LBL_SITECFG_SECURITY_TITLE' => 'Site Beveiliging',
    'LBL_SITECFG_URL' => 'URL van de Sugar Instance',
    'LBL_SITECFG_USE_DEFAULTS' => 'Standaardwaarden gebruiken?',
    'LBL_SITECFG_ANONSTATS' => 'Verzend de Anonieme Gebruiks-Statistieken?',
    'LBL_SITECFG_ANONSTATS_DIRECTIONS' => 'Indien geselecteerd, zal Sugar <b> anonieme </ b> statistieken over uw installatie naar SugarCRM Inc sturen (bij elke controle op nieuwere versies). Deze informatie geeft ons inzicht hoe de applicatie wordt gebruikt en dient als gids voor verbeteringen aan het product.',
    'LBL_SITECFG_URL_MSG' => 'Geef de URL op die zal worden gebruikt om toegang tot Sugar te krijgen na de installatie. Deze URL zal ook worden gebruikt als basis-URL in de Sugarpagina&#39;s. De URL moet de webserver of machine naam of IP-adres bevatten.',
    'LBL_SITECFG_SYS_NAME_MSG' => 'Voer een naam in voor uw systeem. Deze naam wordt weergegeven in de titelbalk van de browser wanneer gebruikers toegang tot Sugar zoeken.',
    'LBL_SITECFG_PASSWORD_MSG' => 'Na de installatie moet u met de Sugar admin gebruiker (gebruikersnaam = admin) inloggen. Voer een wachtwoord in voor deze gebruiker. Dit wachtwoord kan gewijzigd worden na de eerste login. U kunt ook een andere admin-gebruikersnaam gebruiken naast de standaard-admin.',
    'LBL_SITECFG_COLLATION_MSG' => 'Select collation (sorting) settings for your system. This settings will create the tables with the specific language you use. In case your language doesn&#39;t require special settings please use default value.',
    'LBL_SPRITE_SUPPORT' => 'Sprite ondersteuning',
    'LBL_SYSTEM_CREDS' => 'Systeem Identiteit',
    'LBL_SYSTEM_ENV' => 'Systeem Omgeving',
    'LBL_START' => 'Startdatum',
    'LBL_SHOW_PASS' => 'Toon Wachtwoorden',
    'LBL_HIDE_PASS' => 'Verberg Wachtwoorden',
    'LBL_HIDDEN' => '<i>(verborgen)</i>',
//	'LBL_NO_THANKS'						=> 'Continue to installer',
    'LBL_CHOOSE_LANG' => '<b>Taalkeuze</b>',
    'LBL_STEP' => 'Stap',
    'LBL_TITLE_WELCOME' => 'Welkom bij SugarCRM',
    'LBL_WELCOME_1' => 'Dit installatieprogramma creëert de SugarCRM database tabellen en stelt de configuratie variabelen die je nodig hebt om te beginnen in. Het hele proces duurt ongeveer tien minuten.',
    //welcome page variables
    'LBL_TITLE_ARE_YOU_READY' => 'Klaar voor installatie?',
    'REQUIRED_SYS_COMP' => 'Vereiste Systeemcomponenten',
    'REQUIRED_SYS_COMP_MSG' =>
        'Controleer of de versies van de volgende systeemcomponenten worden ondersteunt door SugarCRM, voordat u begint:<br><br />                      <ul><br />                      <li> Database/Database Management System (Voorbeelden: MySQL, SQL Server, Oracle)</li><br />                      <li> Web Server (Apache, IIS)</li><br />                      </ul><br />                      Raadpleeg de compatibiliteit Matrix in de Release Notes voor de versies van de <br />                      systeemcomponenten die voor deze Sugar-versie ondersteund worden.<br>',
    'REQUIRED_SYS_CHK' => 'Initiële Systeem Check',
    'REQUIRED_SYS_CHK_MSG' =>
        'Wanneer u met het installatieproces begint, zal een systeemcontrole worden uitgevoerd van de Webserver (waarop SugarCRM staat) om ervoor te zorgen dat het systeem goed is geconfigureerd en alle noodzakelijke componenten aanwezig zijn om de installatie met succes te voltooien. <br><br><br />                      De volgende componenten worden gecontroleerd:<br><br />                      <ul><br />                      <li><b>PHP version</b> &#8211; versie moet ondersteund worden door de applicatie</li><br />                                        <li><b>Session Variables</b> &#8211; moeten naar behoren werken </li><br />                                            <li> <b>MB Strings</b> &#8211; moeten zijn geïnstalleerd en ingeschakeld in de php.ini</li><br /><br />                      <li> <b>Database Support</b> &#8211; moet bestaan voor MySQL, SQL<br />                      Server of Oracle</li><br /><br />                      <li> <b>Config.php</b> &#8211; moet bestaan en moet de juiste (schrijf)rechten hebben</li><br />					  <li>De volgende Sugarbestanden moet schrijfrechten hebben:<ul><li><b>/custom</li><br /><li>/cache</li><br /><li>/modules</b></li></ul></li></ul><br />                                 Als de controle mislukt, zal de installatie stoppen. Een foutmelding wordt weergegeven en er wordt uitgelegd waarom uw systeem<br />                                  niet voorbij de controle is gekomen.<br />                                  Na de benodigde wijzigingen, moet u de systeem-controle nogmaals uitvoeren om daarna de installatie voort te zetten.<br>',
    'REQUIRED_INSTALLTYPE' => 'Standaard of Aangepaste installatie',
    'REQUIRED_INSTALLTYPE_MSG' =>
        "Nadat de systeemcontrole is uitgevoerd, kunt u kiezen voor de Standaard of de Aangepaste installatie.<br><br><br />                      Voor zowel de <b>Standaard</b> als <b>Aangepast</b> installatie, gelden de volgende zaken:<br><br />                      <ul><br />                      <li> <b>Type database</b> dat de Sugar data zal bevatten <ul><li>Ondersteunde database<br />                      types: MySQL, MS SQL Server, Oracle.<br><br></li></ul></li><br />                      <li> <b>Naam van de web server</b> of machine (host) waar de database staat.<br />                      <ul><li>Dat kan <i>localhost</i> zijn wanneer de database op uw eigen computer of op dezelfde webserver/machine staat waar ook de Sugarbestanden staan.<br><br></li></ul></li><br />                      <li><b>Naam van de database</b> dat de SugarData zal bevatten</li><br />                        <ul><br />                          <li> Misschien heeft u al een bestaande database die u wil (her)gebruiken. Vult u de naam in van een bestaande database, dan zullen de tabellen<br />                          in deze bestaande database worden verwijderd en opnieuw aangemaakt bij het aanmaken van het Sugarcrm schema.</li><br />                          <li> Heeft u nog geen database, dan zal die naam worden gebruikt om een nieuwe database aan te maken voor deze installatie..<br><br></li><br />                        </ul><br />                      <li><b>Database administrator gebruikersnaam en wachtwoord</b> <ul><li>De database administrator moet in staat zijn tabellen en gebruikers aan te maken en schrijfrechten <br />                      hebben op de database.</li><li>Misschien is het nodig uw systeemadministrator te contacteren voor deze informatie indien de database<br />                      niet op uw locale computer staat en/of u niet de database administrator bent.<br><br></ul></li></li><br />                      <li> <b>Sugar database gebruikersnaam en wachtwoord</b><br />                      </li><br />                        <ul><br />                          <li> Deze gebruiker kan de database administrator zijn, of u kunt de naam van geven van  een andere bestaande database gebruiker. </li><br />                          <li> Wilt u een nieuwe database gebruiker voor dit doel maken, dan kan die gebruikersnaam en wachtwoord tijdens het installatieproces worden opgegeven,<br />                          en de gebruiker zal worden aangemaakt tijdens de installatie.</li><br />                        </ul></ul><p><br /><br />                      Voor de <b>Aangepaste</b> setup, moet u ook nog het volgende weten:<br><br />                      <ul><br />                      <li> <b>De URL die zal worden gebruikt</b> na de installatie.<br />                      Deze URL dient de webserver, de machinenaam of het IP-adres te bevatten.<br><br></li><br />                                  <li> [Optioneel] <b>Pad naar de sessie directory</b> als u een eigen<br />                                  sessie directory wil voor Sugar informatie om te voorkomen dat deze informatie kwetsbaar is op een gedeelde server.<br><br></li><br />                                  <li> [Optioneel] <b>Pad naar een aangepaste log directory</b> Als u wil afwijken van de standaard directory voor de Sugar log.<br><br></li><br />                                  <li> [Optioneel] <b>Applicatie ID</b> Als u de automatische aangemaakte ID wil overschrijven om ervoor te zorgen dat<br />                                  sessies van 1 Sugar instance niet worden gebruikt door andere instances.<br><br></li><br />                                  <li><b>Karakter Set</b> die het meest wordt gebruikt.<br><br></li></ul><br />                                Voor meer gedetailleerde informatie kunt u de Installatie Guide raadplegen.",
    'LBL_WELCOME_PLEASE_READ_BELOW' => 'Lees de volgende belangrijke informatie voordat u verder gaat met de installatie. De informatie zal u helpen bepalen of u klaar bent om nu te installeren.',


    'LBL_WELCOME_2' => 'Ga voor installatiedocumenten naar de <a href="http://www.sugarcrm.com/crm/installation" target="_blank">Sugar Wiki</a>.  <BR><BR> Log in op het <a target="_blank" href="http://support.sugarcrm.com">SugarCRM Support Portaal</a> om contact op te nemen met een SugarCRM support engineer voor hulp bij de installatie en verzend een supper case.',
    'LBL_WELCOME_CHOOSE_LANGUAGE' => '<b>Taalkeuze</b>',
    'LBL_WELCOME_SETUP_WIZARD' => 'Installatiewizard',
    'LBL_WELCOME_TITLE_WELCOME' => 'Welkom bij SugarCRM',
    'LBL_WELCOME_TITLE' => 'SugarCRM installatiewizard',
    'LBL_WIZARD_TITLE' => 'Sugar Setup Wizard:',
    'LBL_YES' => 'Ja',
    'LBL_YES_MULTI' => 'Ja - Multibyte',
    // OOTB Scheduler Job Names:
    'LBL_OOTB_WORKFLOW' => 'Uitvoeren Workflow Taken',
    'LBL_OOTB_REPORTS' => 'Geplande taken voor het generen van rapporten uitvoeren',
    'LBL_OOTB_IE' => 'Inkomende mailboxen controleren',
    'LBL_OOTB_BOUNCE' => 'Teruggestuurde campagne-e-mails van het proces \'s nachts uitvoeren',
    'LBL_OOTB_CAMPAIGN' => 'Massa e-mailcampagnes \'s nachts uitvoeren',
    'LBL_OOTB_PRUNE' => 'Database weghalen op elke 1ste van de maand',
    'LBL_OOTB_TRACKER' => 'Opschoon trackter tabellen',
    'LBL_OOTB_SEND_EMAIL_REMINDERS' => 'Herinneringsberichten per e-mail uitvoeren',
    'LBL_UPDATE_TRACKER_SESSIONS' => 'Update tracker_sessions tabel',
    'LBL_OOTB_CLEANUP_QUEUE' => 'Gooi de wachtrij voor taken leeg',


    'LBL_FTS_TABLE_TITLE' => 'Instellingen volledige tekst zoeken aanleveren',
    'LBL_FTS_HOST' => 'Host',
    'LBL_FTS_PORT' => 'Poort',
    'LBL_FTS_TYPE' => 'Type zoekmachine',
    'LBL_FTS_HELP' => 'To enable full-text searching, select the search engine type and enter the Host and Port where the search engine is hosted. Sugar includes built-in support for the elasticsearch engine.',
    'LBL_FTS_REQUIRED' => 'Elastic Search is vereist.',
    'LBL_FTS_CONN_ERROR' => 'Kan geen verbinding maken met Full Text Search server, controleer uw instellingen.',
    'LBL_FTS_NO_VERSION_AVAILABLE' => 'Geen versie van de server voor volledige tekst zoeken beschikbaar, controleer uw instellingen.',
    'LBL_FTS_UNSUPPORTED_VERSION' => 'Niet-ondersteunde versie van elastisch zoeken gedetecteerd. Gebruik versies: %s',

    'LBL_PATCHES_TITLE' => 'Nieuwste Patches installeren',
    'LBL_MODULE_TITLE' => 'Installeer taalpakket',
    'LBL_PATCH_1' => 'Klik op <b>Volgende</b> om deze stap over te slaan.',
    'LBL_PATCH_TITLE' => 'Systeem Patch',
    'LBL_PATCH_READY' => 'De volgende patch(es) staan klaar om te worden geinstalleerd:',
    'LBL_SESSION_ERR_DESCRIPTION' => "SugarCRM vertrouwt op PHP-sessies om belangrijke informatie op te slaan tijdens contact met de webserver. Uw PHP-installatie beschikt niet correct geconfigureerde Session Information.<br />											<br>  Een gebruikelijke fout in de configuratie is dat de <b> &#39;session.save_path&#39; </ b>  niet verwijst naar een geldige map. <br><br />											<br> Corrigeer uw <a target=_new href=\"http://us2.php.net/manual/en/ref.session.php\">PHP configuratie</a> in de php.ini die u hieronder ziet.",
    'LBL_SESSION_ERR_TITLE' => 'PHP Sessions configuratie fout',
    'LBL_SYSTEM_NAME' => 'Systeem Naam',
    'LBL_COLLATION' => 'Sorteringsinstellingen',
    'LBL_REQUIRED_SYSTEM_NAME' => 'Geef een naam op voor de Sugar instance.',
    'LBL_PATCH_UPLOAD' => 'Selecteer een patch bestand (op uw eigen computer)',
    'LBL_BACKWARD_COMPATIBILITY_ON' => 'Php Backward Compatibility modus is ingeschakeld. Zet zend.ze1_compatibility_mode op uitgeschakeld alvorens verder te gaan',

    'meeting_notification_email' => [
        'name' => 'Voldoet aan meldingse-mails',
        'subject' => 'SugarCRM vergadering - $event_name ',
        'description' => 'Dit sjabloon wordt gebruikt als het systeem een vergaderingsmelding aan een gebruiker stuurt.',
        'body' => '<div>
	<p>To: $assigned_user</p>

	<p>$assigned_by_user has invited you to a Meeting</p>

	<p>Onderwerp: $event_name<br/>
	Startdatum: $start_date<br/>
	Einddatum: $end_date</p>

	<p>Beschrijving: $description</p>

	<p>Accepteer deze vergadering:<br/>
	<<a href="$accept_link">$accept_link</a>></p>
	<p>Deze vergadering onder voorbehoud accepteren:<br/>
	<<a href="$tentative_link">$tentative_link</a>></p>
	<p>Deze vergadering weigeren:<br/>
	<<a href="$decline_link">$decline_link</a>></p>
</div>',
        'txt_body' =>
            'Aan: $assigned_user

$assigned_by_user heeft u uitgenodigd voor een vergadering

Onderwerp: $event_name
Startdatum: $start_date
Einddatum: $end_date

Beschrijving: $description

Accepteer deze vergadering:
<$accept_link>

Deze vergadering onder voorbehoud accepteren
<$tentative_link>

Deze vergadering weigeren
<$decline_link>',
    ],

    'call_notification_email' => [
        'name' => 'Meldingse-mails bellen',
        'subject' => 'SugarCRM oproep - $event_name ',
        'description' => 'Dit sjabloon wordt gebruikt als het systeem een oproepmelding stuurt naar een gebruiker.',
        'body' => '<div>
	<p>Aan: $assigned_user</p>

	<p>$assigned_by_user heeft u uitgenodigd voor een oproep</p>

	<p>Onderwerp: $event_name<br/>
	Startdatum: $start_date<br/>
	Duur: $hoursh, $minutesm</p>

	<p>Beschrijving: $description</p>

	<p>Accepteer deze oproep:<br/>
	<<a href="$accept_link">$accept_link</a>></p>
	<p>Accepteer deze oproep onder voorbehoud:<br/>
	<<a href="$tentative_link">$tentative_link</a>></p>
	<p>Weiger deze oproep:<br/>
	<<a href="$decline_link">$decline_link</a>></p>
</div>',
        'txt_body' =>
            'Aan: $assigned_user

$assigned_by_user heeft u uitgenodigd voor een oproep

Onderwerp: $event_name
Startdatum: $start_date
Duur: $hoursh, $minutesm

Beschrijving: $description

Accepteer deze oproep:
<$accept_link>

Deze oproep onder voorbehoud accepteren
<$tentative_link>

Deze oproep weigeren
<$decline_link>',
    ],

    'scheduled_report_email' => [
        'name' => 'Geplande rapporte-mails',
        'subject' => 'Gepland rapport: $report_name vanaf $report_time',
        'description' => 'Dit sjabloon wordt gebruikt als het systeem een gepland rapport naar een gebruiker stuurt.',
        'body' => '<div>
<p>Hallo $assigned_user,<br></p>
<p>Bijgevoegd is een automatisch gegenereerd rapport dat voor u is gepland.<br></p>
<p>Naam rapport: <a href="$site_url/#Reports/$report_id">$report_name</a><br></p>
<p>Uitvoerdatum en -tijd rapport: $report_time<br></p>
</div>',
        'txt_body' =>
            'Hallo, $assigned_user,

Bijgevoegd is een automatisch gegenereerd rapport dat voor u is gepland.

Naam rapport: $report_name

Uitvoerdatum en -tijd rapport: $report_time',
    ],

    'comment_log_mention_email' => [
        'name' => 'Melding systeemopmerking logboek e-mail',
        'subject' => 'SugarCRM - $initiator_full_name heeft u vermeld in een $singular_module_name',
        'description' => 'Dit sjabloon wordt gebruikt om een e-mailmelding te sturen aan gebruikers die zijn getagd in het deel opmerking logboek.',
        'body' =>
            '<div>
                <p>U bent vermeld in het volgende opmerkingenlogboek van de record:  <a href="$record_url">$record_name</a></p>
                <p>Meld aan om de opmerking te bekijken.</p>
            </div>',
        'txt_body' =>
            'U bent vermeld in het opmerkingenlogboek van de volgende record: $record_name

U kunt deze record bekijken op: <$record_url>

Log in bij Sugar om de reactie te bekijken.',
    ],

    'advanced_password_forgot_password_email' => [
        'subject' => 'Stel wachtwoord opnieuw in',
        'description' => "This template is used to send a user a link to click to reset the user&#39;s account password.",
        'body' => '<div><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width="550" align=\"\&quot;\&quot;center\&quot;\&quot;\"><tbody><tr><td colspan=\"2\"><p>U heeft onlangs gevraagd $contact_user_pwd_last_changed het wachtwoord van uw account te resetten: </p><p>Klik op de onderstaande link om uw wachtwoord te resetten:</p><p> <a href="$contact_user_link_guid">$contact_user_link_guid</a> </p> </td> </tr><tr><td colspan=\"2\"></td> </tr> </tbody></table> </div>',
        'txt_body' =>
            'U heeft recentelijk aangevraagd op $contact_user_pwd_last_changed om uw wachtwoord opnieuw te kunnen instellen.<br /><br />Klik op de link om uw wachtwoord te kunnen wijzigen:<br /><br />$contact_user_link_guid',
        'name' => 'Vergeten wachtwoord e-mail',
    ],

    'portal_forgot_password_email_link' => [
        'name' => 'Vergeten portaalwachtwoord e-mail',
        'subject' => 'Stel wachtwoord opnieuw in',
        'description' => 'Dit sjabloon wordt gebruikt om de gebruiker een link te sturen voor het resetten van het wachtwoord van het portaalgebruikersaccount.',
        'body' => '<div><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width="550" align=\"\&quot;\&quot;center\&quot;\&quot;\"><tbody><tr><td colspan=\"2\"><p>U hebt onlangs gevraagd het wachtwoord van uw account te resetten:</p><p> <a href="$portal_user_link_guid">$portal_user_link_guid</a> </p> </td> </tr><tr><td colspan=\"2\"></td> </tr> </tbody></table> </div>',
        'txt_body' =>
            '
U hebt onlangs gevraagd het wachtwoord van uw account te resetten.

    Klik op de onderstaande link om uw wachtwoord te resetten:

    $portal_user_link_guid',
    ],

    'portal_password_reset_confirmation_email' => [
        'name' => 'Bevestigingse-mail portaalwachtwoord resetten',
        'subject' => 'Het wachtwoord van uw account is gereset',
        'description' => 'Dit sjabloon wordt gebruikt om een bevestiging aan een portaalgebruiker te sturen waarvan het accountwachtwoord is gereset.',
        'body' => '<div><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width="550" align=\"\&quot;\&quot;center\&quot;\&quot;\"><tbody><tr><td colspan=\"2\"><p>Deze e-mail is ter bevestiging dat het wachtwoord van uw portaalaccount is gereset. </p><p>Gebruik de onderstaande link om aan te melden bij het portaal:</p><p> <a href="$portal_login_url">$portal_login_url</a> </p> </td> </tr><tr><td colspan=\"2\"></td> </tr> </tbody></table> </div>',
        'txt_body' =>
            '
    Deze e-mail is ter bevestiging dat het wachtwoord van uw portaalaccount is gereset.

    Gebruik de onderstaande link om aan te melden bij het portaal:

    $portal_login_url',
    ],
];
