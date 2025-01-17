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
$mod_strings = [
    'DESC_MODULES_INSTALLED' => 'A következő modulok lettek telepítve:',
    'DESC_MODULES_QUEUED' => 'A következő modulok készen állnak a telepítésre:',

    'ERR_UW_CANNOT_DETERMINE_GROUP' => 'Nem meghatározható a csoport',
    'ERR_UW_CANNOT_DETERMINE_USER' => 'Nem meghatározható a tulajdonos',
    'ERR_UW_CONFIG_WRITE' => 'Hiba a config.php fájlban az új verzió információ frissítésekor.',
    'ERR_UW_CONFIG' => 'Kérem, tegye írhatóvá a config.php fájlt majd frissítse az oldalt!',
    'ERR_UW_DIR_NOT_WRITABLE' => 'A könyvtár nem írható',
    'ERR_UW_FILE_NOT_COPIED' => 'A fájl nem másolható',
    'ERR_UW_FILE_NOT_DELETED' => 'Probléma lépett fel a csomag eltávolítása közben',
    'ERR_UW_FILE_NOT_READABLE' => 'A fájl nem olvasható.',
    'ERR_UW_FILE_NOT_WRITABLE' => 'A fájl nem mozgatható és nem írható.',
    'ERR_UW_FLAVOR_2' => 'Frissítés jellemzői:',
    'ERR_UW_FLAVOR' => 'SugarCRM rendszer jellemzői:',
    'ERR_UW_LOG_FILE_UNWRITABLE' => './upgradeWizard.log fájlt nem lehetett létrehozni/írni. Kérem, javítsa az engedélyeket a SugarCRM könyvtárban!',
    'ERR_UW_MBSTRING_FUNC_OVERLOAD' => 'mbstring.func_overload beállított értéke 1-nél nagyobb. Kérem, változtassa meg ezt a php.ini-ben és indítsa újra a webszervert!',
    'ERR_UW_MYSQL_VERSION' => 'A SugarCRM a MySQL 4.1.2-es, vagy annál újabb változatát igényli. Jelenlegi verzió:',
    'ERR_UW_OCI8_VERSION' => 'Az Ön Oracle verzióját nem támogatja a Sugar. Olyan verzió telepítése szükséges, amely kompatibilis a Sugar alkalmazással. Tekintse át a kiadásokra vonatkozó Oracle kompatibilitási listát!<br />Jelenlegi verzió:',
    'ERR_UW_NO_FILE_UPLOADED' => 'Kérjük, adja meg a fájlt és próbálja újra!',
    'ERR_UW_NO_FILES' => 'Hiba történt, egyetlen fájl sem található az ellenőrzéshez.',
    'ERR_UW_NO_MANIFEST' => 'A zip fájlból hiányzik a mainfest.php. A művelet nem folytatható.',
    'ERR_UW_NO_VIEW' => 'Érvénytelen nézet lett megadva.',
    'ERR_UW_NO_VIEW2' => 'Nézet nincs definiálva. Kérem, menjen az Adminisztráció főoldalára.',
    'ERR_UW_NOT_VALID_UPLOAD' => 'Érvénytelen feltöltés.',
    'ERR_UW_NO_CREATE_TMP_DIR' => 'Nem sikerült létrehozni az ideiglenes könyvtárat. Ellenőrizze a fájl engedélyeit.',
    'ERR_UW_ONLY_PATCHES' => 'Csak javító csomagok tölthetők fel erre az oldalra.',
    'ERR_UW_PREFLIGHT_ERRORS' => 'Előkészítés alatt talált hibák',
    'ERR_UW_UPLOAD_ERR' => 'Hiba történt a fájl feltöltésekor, próbálkozzon újra!<br />\n',
    'ERR_UW_VERSION' => 'SugarCRM rendszer verziója:',
    'ERR_UW_WRONG_TYPE' => 'Ez az oldal nem fut',
    'ERR_UW_PHP_FILE_ERRORS' => [
        1 => 'A feltöltött fájl mérete meghaladja a php.ini-ben beállított upload_max_filesize-t.',
        2 => 'A feltöltött fájl mérete meghaladja a MAX_FILE_SIZE beállítást, amit a HTML formban megadott.',
        3 => 'A kiválasztott fájl csak részben töltődött fel.',
        4 => 'A feltöltés sikertelen volt.',
        5 => 'Ismeretlen hiba.',
        6 => 'Hiányzik egy ideiglenes mappa.',
        7 => 'Nem sikerült lemezre írni a fájlt.',
        8 => 'A fájl feltöltése megszakadt.',
    ],

    'ERROR_HT_NO_WRITE' => 'Az alábbi fájl nem írható: %s',
    'ERROR_MANIFEST_TYPE' => 'A manifest fájlnak meg kell határoznia a csomag típusát.',
    'ERROR_PACKAGE_TYPE' => 'A manifest fájl ismeretlen csomagot határoz meg: %s',
    'ERROR_VERSION_INCOMPATIBLE' => 'A frissítőcsomag nem kompatibilis ezzel a Sugar verzióval: %s',
    'ERROR_FLAVOR_INCOMPATIBLE' => 'A feltöltött fájl nem kompatibilis a Sugar használt verziójával (Professional, Enterprise vagy Ultimate): %s',

    'ERROR_UW_CONFIG_DB' => 'Hiba a(z) %s config var mentése során ide: db (key %s, value %s).',
    'ERR_NOT_ADMIN' => 'Nem engedélyezett hozzáférés az adminisztrációs felületen.',
    'ERR_NO_VIEW_ACCESS_REASON' => 'Önnek nincs megfelelő jogosultsága az oldal megtekintéséhez.',

    'LBL_BUTTON_BACK' => '< Vissza',
    'LBL_BUTTON_CANCEL' => 'Mégsem',
    'LBL_BUTTON_DELETE' => 'Csomag törlése',
    'LBL_BUTTON_DONE' => 'Kész',
    'LBL_BUTTON_EXIT' => 'Kilépés',
    'LBL_BUTTON_INSTALL' => 'Előkészített frissítés',
    'LBL_BUTTON_NEXT' => 'Következő >',
    'LBL_BUTTON_RECHECK' => 'Újraellenőrzés',
    'LBL_BUTTON_RESTART' => 'Újraindítás',

    'LBL_UPLOAD_UPGRADE' => 'Frissítő csomag feltöltése',
    'LBL_UPLOAD_FILE_NOT_FOUND' => 'A feltöltendő fájl nem található',
    'LBL_UW_BACKUP_FILES_EXIST_TITLE' => 'Biztonsági mentés',
    'LBL_UW_BACKUP_FILES_EXIST' => 'Ehhez a frissítéshez tartozó biztonsági másolatok megtalálhatók itt:',
    'LBL_UW_BACKUP' => 'Biztonsági MENTÉS',
    'LBL_UW_CANCEL_DESC' => 'A frissítés megszakítva. Az ideiglenes fájlokat, amelyek másolásra, valamint feltöltésre kerültek, a rendszer törölte.',
    'LBL_UW_CHARSET_SCHEMA_CHANGE' => 'A karakterbeállítás séma megváltozik',
    'LBL_UW_CHECK_ALL' => 'Összes ellenőrzése',
    'LBL_UW_CHECKLIST' => 'Frissítés lépései',
    'LBL_UW_COMMIT_ADD_TASK_DESC_1' => "A felülírt fájlok mentése a következő könyvtárban:",
    'LBL_UW_COMMIT_ADD_TASK_DESC_2' => "Manuálisan egyesíti a következő fájlokat:",
    'LBL_UW_COMMIT_ADD_TASK_NAME' => 'Frissítési folyamat: fájlok manuális egyesítése',
    'LBL_UW_COMMIT_ADD_TASK_OVERVIEW' => 'Kérjük, használjon egy megbízható módszert, hogy egyesíteni tudja ezeket a fájlokat. Amíg ez nem történt meg, a SugarCRM telepítési állapota bizonytalan és a frissítés nem teljes.',
    'LBL_UW_COMPLETE' => 'Kész',
    'LBL_UW_CONTINUE_CONFIRMATION' => 'A SugarCRM új verziója tartalmaz egy új licencszerződést. Szeretné folytatni?',
    'LBL_UW_COMPLIANCE_ALL_OK' => 'Minden rendszerbeállítási feltétel teljesült',
    'LBL_UW_COMPLIANCE_CALLTIME' => 'PHP beállítás: Call Time Pass By Reference',
    'LBL_UW_COMPLIANCE_CURL' => 'cURL Modul',
    'LBL_UW_COMPLIANCE_IMAP' => 'IMAP Modul',
    'LBL_UW_COMPLIANCE_MBSTRING' => 'MBStrings Modul',
    'LBL_UW_COMPLIANCE_MBSTRING_FUNC_OVERLOAD' => 'MBStrings mbstring.func_overload paraméter',
    'LBL_UW_COMPLIANCE_MEMORY' => 'PHP beállítás: memórialimit',
    'LBL_UW_COMPLIANCE_STREAM' => 'PHP beállítás: stream',
    'LBL_UW_COMPLIANCE_MSSQL_MAGIC_QUOTES' => 'MS SQL Szerver és PHP Magic Quotes GPC',
    'LBL_UW_COMPLIANCE_MYSQL' => 'Szükséges MySQL verzió',
    'LBL_UW_COMPLIANCE_DB' => 'Minimális adatbázis verzió',
    'LBL_UW_COMPLIANCE_PHP_INI' => 'A php.ini helye',
    'LBL_UW_COMPLIANCE_PHP_VERSION' => 'PHP verzió',
    'LBL_UW_COMPLIANCE_SAFEMODE' => 'PHP beállítás: biztonságos mód',
    'LBL_UW_COMPLIANCE_TITLE' => 'Szerver beállításainak ellenőrzése',
    'LBL_UW_COMPLIANCE_TITLE2' => 'Észlelt beállítások',
    'LBL_UW_COMPLIANCE_XML' => 'XML feldolgozás',
    'LBL_UW_COMPLIANCE_ZIPARCHIVE' => 'Zip támogatás',

    'LBL_UW_COPIED_FILES_TITLE' => 'Fájlok átmásolása sikeres',
    'LBL_UW_CUSTOM_TABLE_SCHEMA_CHANGE' => 'Egyéni táblázat kinézet módosítások',

    'LBL_UW_DB_CHOICE1' => 'A frissítés varázsló futtatja az SQL-t',
    'LBL_UW_DB_CHOICE2' => 'Manuális SQL lekérdezés',
    'LBL_UW_DB_INSERT_FAILED' => 'INSERT sikertelen - az összehasonlított eredmények eltérőek',
    'LBL_UW_DB_ISSUES_PERMS' => 'Adatbázis jogosultságok',
    'LBL_UW_DB_ISSUES' => 'Adatbázis kérdések',
    'LBL_UW_DB_METHOD' => 'Adatbázis frissítés módja',
    'LBL_UW_DB_NO_ADD_COLUMN' => '[table] TÁBLÁZAT MÓDOSÍTÁSA [column] OSZLOP HOZZÁADÁSA',
    'LBL_UW_DB_NO_CHANGE_COLUMN' => '[table] TÁBLÁZAT MÓDOSÍTÁSA [column] OSZLOP MÓDOSÍTÁSA
',
    'LBL_UW_DB_NO_CREATE' => '[table] TÁBLÁZAT LÉTREHOZÁSA',
    'LBL_UW_DB_NO_DELETE' => 'TÖRLÉS [table] TÁBLÁZATBÓL',
    'LBL_UW_DB_NO_DROP_COLUMN' => '[table] TÁBLÁZAT MÓDOSÍTÁSA, [column] OSZLOP EJTÉSE',
    'LBL_UW_DB_NO_DROP_TABLE' => '[table] TÁBLÁZAT EJTÉSE',
    'LBL_UW_DB_NO_ERRORS' => 'Minden jogosultság elérhető',
    'LBL_UW_DB_NO_INSERT' => 'BESZÚRÁS EBBE: [table]',
    'LBL_UW_DB_NO_SELECT' => '[x] KIVÁLASZTÁSA INNEN: [table]',
    'LBL_UW_DB_NO_UPDATE' => '[table] FRISSÍTÉSE',
    'LBL_UW_DB_PERMS' => 'Szükséges jogosultságok',

    'LBL_UW_DESC_MODULES_INSTALLED' => 'A következő frissítések kerültek telepítésre:',
    'LBL_UW_END_DESC' => 'A rendszer frissítve.',
    'LBL_UW_END_DESC2' => 'Amennyiben úgy döntött, kézzel futtat néhány lépést, például a fájlok egyesítését vagy az SQL lekérdezéseket, ezeket tegye meg most. A rendszer instabil állapotban lesz, amíg a lépések meg nem történtek.',
    'LBL_UW_END_LOGOUT_PRE' => 'A frissítés sikeres.',
    'LBL_UW_END_LOGOUT_PRE2' => 'Kattintson a Kész gombra a Frissítés Varázslóból való kilépéshez!',
    'LBL_UW_END_LOGOUT' => 'Ha más frissítést is szeretne telepíteni, annak megkezdése előtt lépjen ki és vissza a Frissítés Varázslóba.',
    'LBL_UW_END_LOGOUT2' => 'Kijelentkezés',
    'LBL_UW_REPAIR_INDEX' => 'Az adatbázis teljesítményének javítására futtassa a [Index újraépítés] szkriptet.',

    'LBL_UW_FILE_DELETED' => 'törölve.',
    'LBL_UW_FILE_GROUP' => 'Csoport',
    'LBL_UW_FILE_ISSUES_PERMS' => 'Fájl engedélyek',
    'LBL_UW_FILE_ISSUES' => 'Fájlproblémák',
    'LBL_UW_FILE_NEEDS_DIFF' => 'A fájl manuális beállításokat igényel',
    'LBL_UW_FILE_NO_ERRORS' => 'Minden fájl írható',
    'LBL_UW_FILE_OWNER' => 'Tulajdonos',
    'LBL_UW_FILE_PERMS' => 'Engedélyek',
    'LBL_UW_FILE_UPLOADED' => 'feltöltve',
    'LBL_UW_FILE' => 'Fájlnév',
    'LBL_UW_FILES_QUEUED' => 'A következő frissítési csomagok készen állnak a telepítésre:',
    'LBL_UW_FILES_REMOVED' => "A következő fájlok törlődnek a rendszerből:",
    'LBL_UW_NEXT_TO_UPLOAD' => 'Kattintson a Tovább gombra a frissítési csomagok feltöltéséhez.',
    'LBL_UW_FROZEN' => 'Töltsön fel egy csomagot a folytatás előtt.',
    'LBL_UW_HIDE_DETAILS' => 'Részletek elrejtése',
    'LBL_UW_IN_PROGRESS' => 'Folyamatban',
    'LBL_UW_INCLUDING' => 'Tartalmazza a(z)',
    'LBL_UW_INCOMPLETE' => 'Nem teljes',
    'LBL_UW_INSTALL' => 'Fájl INSTALL',
    'LBL_UW_MANUAL_MERGE' => 'Fájlok egyesítése',
    'LBL_UW_MODULE_READY_UNINSTALL' => "A modul készen áll a törlésre. Kattintson a Megerősítés gombra a törléshez!",
    'LBL_UW_MODULE_READY' => 'A modul készen áll a telepítésre. Kattintson a Megerősítés gombra a telepítés folytatásához!',
    'LBL_UW_NO_INSTALLED_UPGRADES' => 'Nem észlelhető frissítés.',
    'LBL_UW_NONE' => 'Nincs',
    'LBL_UW_NOT_AVAILABLE' => 'Nem érhető el',
    'LBL_UW_OVERWRITE_DESC' => 'Valamennyi módosított fájl felülírásra kerül, beleértve az Ön által módosított sablonokat és kódokat. Biztos benne, hogy folytatni szeretné?',
    'LBL_UW_OVERWRITE_FILES_CHOICE1' => 'Összes fájl felülírása',
    'LBL_UW_OVERWRITE_FILES_CHOICE2' => 'Manuális egyesítés - Mindent megőriz',
    'LBL_UW_OVERWRITE_FILES' => 'Egyesítési módja',
    'LBL_UW_PATCH_READY' => 'A javító csomag készen áll a végrehajtáshoz. Kattintson a Megerősítés gombra a frissítés folytatásához!',
    'LBL_UW_PATCH_READY2' => 'Figyelmeztetés: észlelt egyedi elrendezés<br /><br />A Studio használatával fájl(ok) mezőit vagy a képernyő elrendezését módosította. A javító csomagban lévő fájlok is tartalmaznak módosításokat.  Valamennyi fájl esetén lehetőség van:<br />[Default] megőrizni az Ön változatát, ebben az esetben hagyja üresen a jelölőnégyzetet. A javítás a módosításokat figyelmen kívül fogja hagyni<br />VAGY<br />fogadja el a frissített fájlokat a jelölőnégyzet bekapcsolásával. Ekkor Önnek idővel újra kell építenie a kívánt elrendezést a Studio segítségével.',

    'LBL_UW_PREFLIGHT_ADD_TASK' => 'Feladat létrehozása a manuális egyesítéshez?',
    'LBL_UW_PREFLIGHT_COMPLETE' => 'Előkészítés előtti ellenőrzés',
    'LBL_UW_PREFLIGHT_DIFF' => 'Differenciált',
    'LBL_UW_PREFLIGHT_EMAIL_REMINDER' => 'Küldjön email emlékeztetőt a manuális egyesítésről?',
    'LBL_UW_PREFLIGHT_FILES_DESC' => 'Az alábbiakban listázott fájlok lettek módosítva. Törölje a listából azokat a tételeket, amelyek manuális egyesítést igényelnek! Az észlelt elrendezési módosítások automatikusan lekerülnek a listáról; a kijelölés minden esetben felülírást eredményez.',
    'LBL_UW_PREFLIGHT_NO_DIFFS' => 'Nem szükséges kézi fájlegyesítés.',
    'LBL_UW_PREFLIGHT_NOT_NEEDED' => 'Nem szükséges.',
    'LBL_UW_PREFLIGHT_PRESERVE_FILES' => 'Automatikusan védett fájlok:',
    'LBL_UW_PREFLIGHT_TESTS_PASSED' => 'Az előkészítés végrehajtása sikeresen megtörtént.',
    'LBL_UW_PREFLIGHT_TESTS_PASSED2' => 'Kattintson a Tovább gombra a frissített fájlok másolásához!',
    'LBL_UW_PREFLIGHT_TESTS_PASSED3' => 'Megjegyzés: A többi frissítés elvégzése kötelező. Kattintson a Tovább gombra, a folyamat befejezéséhez! Ha nem szeretné folytatni, kattintson a Mégse gombra.',
    'LBL_UW_PREFLIGHT_TOGGLE_ALL' => 'Minden fájl kijelölése',

    'LBL_UW_REBUILD_TITLE' => 'Eredmény újjáépítése',
    'LBL_UW_SCHEMA_CHANGE' => 'Séma módosítások',

    'LBL_UW_SHOW_COMPLIANCE' => 'Az érzékelt beállítások megjelenítése',
    'LBL_UW_SHOW_DB_PERMS' => 'Hiányzó adatbázis-engedélyek megjelenítése',
    'LBL_UW_SHOW_DETAILS' => 'Részletek megjelenítése',
    'LBL_UW_SHOW_DIFFS' => 'A manuális egyesítést igénylő fájlok megjelenítése',
    'LBL_UW_SHOW_NW_FILES' => 'Hibás engedélyekkel rendelkező fájlok megjelenítése',
    'LBL_UW_SHOW_SCHEMA' => 'A sémamódosító szkript megjelenítése',
    'LBL_UW_SHOW_SQL_ERRORS' => 'Hibás lekérdezések megjelenítése',
    'LBL_UW_SHOW' => 'Mutat',

    'LBL_UW_SKIPPED_FILES_TITLE' => 'Kihagyott fájlok',
    'LBL_UW_SKIPPING_FILE_OVERWRITE' => 'Felülírás átugrása - manuális egyesítés bekapcsolva.',
    'LBL_UW_SQL_RUN' => 'Jelölje be, ha az SQL manuálisan lett elindítva',
    'LBL_UW_START_DESC' => 'Ez a varázsló végigviszi Önt a SugarCRM frissítési folyamatán.',
    'LBL_UW_START_DESC2' => 'Megjegyzés: Javasoljuk, hogy készítsen mentést a Sugar adatbázisról és a rendszerfájlokról (az összes fájl megtalálható a SugarCRM mappában) mielőtt frissíti az alkalmazást. Javasoljuk továbbá, hogy először végezzen tesztelést az Ön alkalmazásának egy klónozott példányán.',
    'LBL_UW_START_DESC3' => 'A Tovább gombra kattintva ellenőrizheti, hogy a  rendszer készen áll-e a frissítésre. Az ellenőrzés magába foglalja a fájl jogosultságok, kiváltságok és adatbázis-kiszolgáló beállítások ellenőrzését.',
    'LBL_UW_START_UPGRADED_UW_DESC' => 'A Frissítés Varázsló most folytatja a frissítést. Kérjük, folytassa a frissítést!',
    'LBL_UW_START_UPGRADED_UW_TITLE' => 'Üdvözöljük a Frissítés Varázslóban',

    'LBL_UW_SYSTEM_CHECK_CHECKING' => 'Ellenőrzés, kérem várjon. Ez eltarthat akár 30 másodpercig is.',
    'LBL_UW_SYSTEM_CHECK_FILE_CHECK_START' => 'Kapcsolódó fájlok ellenőrzésének indítása.',
    'LBL_UW_SYSTEM_CHECK_FILES' => 'Fájlok',
    'LBL_UW_SYSTEM_CHECK_FOUND' => 'Talált',

    'LBL_UW_TITLE_CANCEL' => 'Mégsem',
    'LBL_UW_TITLE_COMMIT' => 'Frissítés megerősítése',
    'LBL_UW_TITLE_END' => 'Lekérdezés',
    'LBL_UW_TITLE_PREFLIGHT' => 'Előkészítés ellenőrzése',
    'LBL_UW_TITLE_START' => 'Üdvözöljük',
    'LBL_UW_TITLE_SYSTEM_CHECK' => 'Rendszer ellenőrzése',
    'LBL_UW_TITLE_UPLOAD' => 'Csomag feltöltése',
    'LBL_UW_TITLE' => 'Frissítő varázsló',
    'LBL_UW_UNINSTALL' => 'Uninstallálás',
    //500 upgrade labels
    'LBL_UW_ACCEPT_THE_LICENSE' => 'Licenc elfogadása',
    'LBL_UW_CONVERT_THE_LICENSE' => 'Licenc konvertálása',
    'LBL_UW_CUSTOMIZED_OR_UPGRADED_MODULES' => 'Frissített/Testre szabott modulok',
    'LBL_UW_FOLLOWING_MODULES_CUSTOMIZED' => 'A következő modulokat érzékeli a rendszer testre szabottnak és védettnek',
    'LBL_UW_FOLLOWING_MODULES_UPGRADED' => 'A következő modulokat érzékeli a rendszer Studio segítségével testre szabottnak és frissítettnek',

    'LBL_START_UPGRADE_IN_PROGRESS' => 'Frissítés megkezdése folyamatban',
    'LBL_SYSTEM_CHECKS_IN_PROGRESS' => 'Rendszer ellenőrzése folyamatban',
    'LBL_LICENSE_CHECK_IN_PROGRESS' => 'Licenc ellenőrzése folyamatban',
    'LBL_PREFLIGHT_CHECK_IN_PROGRESS' => 'Előkészítés ellenőrzése folyamatban',
    'LBL_PREFLIGHT_FILE_COPYING_PROGRESS' => 'Fájl másolása folyamatban',
    'LBL_COMMIT_UPGRADE_IN_PROGRESS' => 'Frissítés folyamatban',
    'LBL_UW_COMMIT_DESC' => 'Kattintson a Tovább gombra a frissítési szkriptek futtatásához!',
    'LBL_UPGRADE_SCRIPTS_IN_PROGRESS' => 'Szkriptek frissítése folyamatban',
    'LBL_UPGRADE_SUMMARY_IN_PROGRESS' => 'Frissítés összesítő folyamatban',
    'LBL_UPGRADE_IN_PROGRESS' => 'folyamatban van',
    'LBL_UPGRADE_TIME_ELAPSED' => 'Eltelt idő',
    'LBL_UPGRADE_CANCEL_IN_PROGRESS' => 'Frissítés megszakítása és karbantartás folyamatban',
    'LBL_UPGRADE_TAKES_TIME_HAVE_PATIENCE' => 'A frissítés eltarthat egy ideig',
    'LBL_UPLOADE_UPGRADE_IN_PROGRESS' => 'Feltöltés ellenőrzése folyamatban',
    'LBL_UPLOADING_UPGRADE_PACKAGE' => 'Frissítő csomag feltöltése',
    'LBL_UW_DORP_THE_OLD_SCHMEA' => 'Elhagyja a Sugar a 451-es sémát?',
    'LBL_UW_DROP_SCHEMA_UPGRADE_WIZARD' => 'A Frissítés varázsló elhagyja a 451-es sémát',
    'LBL_UW_DROP_SCHEMA_MANUAL' => 'Frissítést követő manuális sémaelhagyás',
    'LBL_UW_DROP_SCHEMA_METHOD' => 'Régi séma elhagyásának módja',
    'LBL_UW_SHOW_OLD_SCHEMA_TO_DROP' => 'Régi séma megjelenítése, amit a rendszer képtelen volt elhagyni',
    'LBL_UW_SKIPPED_QUERIES_ALREADY_EXIST' => 'Kihagyott lekérdezések',
    'ERR_CHECKSYS_PHP_INVALID_VER' => 'Ön által használt PHP verziót nem támogatja a SugarCRM. Szüksége lesz egy frissebb verzióra, amely kompatibilis a Sugar alkalmazással. Tekintse át a kiadásokra vonatkozó PHP kompatibilitási listát! Az Ön által használt verzió',
    'LBL_BACKWARD_COMPATIBILITY_ON' => 'A PHP visszamenőleges kompatibilitási mód be van kapcsolva. Állítsa a zend.ze1_compatibility_mode -ot  off-ra.',
    //including some strings from moduleinstall that are used in Upgrade
    'LBL_ML_ACTION' => 'Feladat',
    'LBL_ML_CANCEL' => 'Mégsem',
    'LBL_ML_COMMIT' => 'Jóváhagyás',
    'LBL_ML_DESCRIPTION' => 'Leírás',
    'LBL_ML_INSTALLED' => 'Telepítés időpontja',
    'LBL_ML_NAME' => 'Név',
    'LBL_ML_PUBLISHED' => 'Közzétéve',
    'LBL_ML_TYPE' => 'Típus',
    'LBL_ML_UNINSTALLABLE' => 'Nem törölhető',
    'LBL_ML_VERSION' => 'Verzió',
    'LBL_ML_INSTALL' => 'Telepít',
    'LBL_MODULE_NAME' => 'Frissítés Varázsló',
    'LBL_MODULE_NAME_SINGULAR' => 'Frissítés Varázsló',
    'LBL_UPLOAD_SUCCESS' => 'A frissítési csomag sikeresen feltöltve. Kattintson a Tovább gombra a végső ellenőrzéshez.',
    'LBL_UW_TITLE_LAYOUTS' => 'Frissítés véglegesítése',
    'LBL_LAYOUT_MODULE_TITLE' => 'Elrendezések',
    'LBL_LAYOUT_MERGE_DESC' => 'A frissítés részeként új mezők váltak elérhetővé. Ezeket automatikusan csatolni tudja a használatban lévő modul elrendezésekhez. Ha többet szeretne megtudni az új mezőkről, kérjük, olvassa el a frissített verzió leírását!<br /><br />Ha nem kíván hozzáfűzni új mezőt, kérjük, törölje a modult, és az egyéni elrendezések változatlanok maradnak. A mezők elérhetők lesznek a Stúdióban a frissítés után.',
    'LBL_LAYOUT_MERGE_TITLE' => 'A Tovább gombra kattintva jóváhagyhatja a változtatásokat és befejezni a frissítést.',
    'LBL_LAYOUT_MERGE_TITLE2' => 'A Tovább gombra kattintva befejezi a frissítést.',
    'LBL_UW_CONFIRM_LAYOUTS' => 'Erősítse meg az elrendezést',
    'LBL_UW_CONFIRM_LAYOUT_RESULTS' => 'Erősítse meg az elrendezés eredményét',
    'LBL_UW_CONFIRM_LAYOUT_RESULTS_DESC' => 'A következő elrendezések összevonása sikeresen megtörtént:',
    'LBL_SELECT_FILE' => 'Válassza ki a fájlt:',
    'LBL_LANGPACKS' => 'Nyelvek' /*for 508 compliance fix*/,
    'LBL_MODULELOADER' => 'Modulbetöltő' /*for 508 compliance fix*/,
    'LBL_PATCHUPGRADES' => 'Javító csomag upgradek' /*for 508 compliance fix*/,
    'LBL_THEMES' => 'Témák' /*for 508 compliance fix*/,
    'LBL_WORKFLOW' => 'Munkafolyamat' /*for 508 compliance fix*/,
    'LBL_UPGRADE' => 'Frissítés' /*for 508 compliance fix*/,
    'LBL_PROCESSING' => 'Feldolgozás' /*for 508 compliance fix*/,
    'LBL_GLOBAL_TEAM_DESC' => 'Mindenhol látható',
];
