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

    'LBL_ASSIGN_TEAM' => 'Priskirti komandoms',

    'LBL_RE' => 'RE:',

    'ERR_BAD_LOGIN_PASSWORD' => 'Vartotojo vardas arba slaptažodis neteisingas',
    'ERR_BODY_TOO_LONG' => '\rTurinio tekstas per didelis, kad nuskaityti laišką. Sutrumpinama.',
    'ERR_INI_ZLIB' => 'Nepavyko trumpam išjungti Zlib kompresijos.  "Bandyti nustatymai" gali nepavykti.',
    'ERR_MAILBOX_FAIL' => 'Nepavyko ištraukti jokių pašto dėžučių.',
    'ERR_NO_IMAP' => 'Nerastos IMAP bibliotekos. Prašome išspręsti tai, prieš pradedant dirbti su įeinančiu paštu',
    'ERR_NO_OPTS_SAVED' => 'Nebuvo išsaugota su Jūsų įeinančiu pašto dėžute. Prašome peržiūrėti nustatymus',
    'ERR_TEST_MAILBOX' => 'Prašome patikrinti nustatymus ir bandyti dar kartą',
    'ERR_DELETE_FOLDER' => 'Could not delete folder.',
    'ERR_UNSUBSCRIBE_FROM_FOLDER' => 'Could not unsubscribe from folder before deletion.',

    'LBL_APPLY_OPTIMUMS' => 'Pritaikyti optimalius',
    'LBL_ASSIGN_TO_USER' => 'Priskirti vartotojui',
    'LBL_AUTOREPLY_OPTIONS' => 'Auto-atsakymo pasirinkimai',
    'LBL_AUTOREPLY' => 'Auto-atsakymo šablonas',
    'LBL_AUTOREPLY_HELP' => 'Pasirinkite laiško šabloną, kurį norėsite automatiškai išsiųsti, kiekvieną gausite laišką iš siuntėjo.',
    'LBL_BASIC' => 'Pašto dėžutės informacija',
    'LBL_CASE_MACRO' => 'Aptarnavimo makro komanda',
    'LBL_CASE_MACRO_DESC' => 'Nustatykite makro komandą, kuri bus naudojama susieti importuotus laiškus su aptarnavimu.',
    'LBL_CASE_MACRO_DESC2' => 'Nustatyti tai į bet kokią reikšmę, tik išlaikykite šią frazę  <b>"%1"</b>.',
    'LBL_CERT_DESC' => 'Priversti patvirtinti pašto sertifikatą - nenaudoti jeigu patys pasirašinėjat.',
    'LBL_CERT' => 'Patvirtinti sertifikatą',
    'LBL_CLOSE_POPUP' => 'Uždaryti langą',
    'LBL_CREATE_NEW_GROUP' => '--Sukurti grupę saugojimo metu--',
    'LBL_CREATE_TEMPLATE' => 'Sukurti',
    'LBL_SUBSCRIBE_FOLDERS' => 'Užsisakyti aplankai',
    'LBL_DEFAULT_FROM_ADDR' => 'Numatytas:',
    'LBL_DEFAULT_FROM_NAME' => 'Numatytas:',
    'LBL_DELETE_SEEN' => 'Ištrinti perskaitytus laiškus po importavimo',
    'LBL_EDIT_TEMPLATE' => 'Redaguoti',
    'LBL_EMAIL_OPTIONS' => 'Pašto tvarkymo pasirinkimas',
    'LBL_EMAIL_BOUNCE_OPTIONS' => 'Nepasiekusių laiškų valdymas',
    'LBL_FILTER_DOMAINS_DESC' => 'Kableliais atskirtas domenų, į kuriuos nebus siunčiami automatinio atsakymo el. laiškai, sąrašas.',
    'LBL_ASSIGN_TO_GROUP_FOLDER_DESC' => 'Nurodykite, kad automatiškai sukurti pašto įrašus visiems gautiems laiškams.',
    'LBL_POSSIBLE_ACTION_DESC' => 'Tam būtų galima įjungti Sukurti aptarnavimo funkciją, Jūs turite pasirinkti Grupinis aplanką.',
    'LBL_FILTER_DOMAINS' => 'Nesiųsti auto-atsakymo į šį domeną',
    'LBL_FIND_OPTIMUM_KEY' => 'f',
    'LBL_FIND_OPTIMUM_MSG' => '<br>Ieškoma optimalių sujungimo kintamųjų.',
    'LBL_FIND_OPTIMUM_TITLE' => 'Ieškoma optimalios konfigūracijos',
    'LBL_FIND_SSL_WARN' => '<br>Testuojant SSL gali ilgai užtrukti. Prašome būti kantriems.<br>',
    'LBL_FORCE_DESC' => 'Kai kurie IMAP/POP3 serveriai reikalauja specialių perjungimų Pažymėk priverstini neigiamą perjungimą kai jungiamasi(pvz.., /notls)',
    'LBL_FORCE' => 'Priversti neigiamą',
    'LBL_FOUND_MAILBOXES' => 'Rasti šie naudojamas aplankai.<br>Pasirinkite kurį naudoti',
    'LBL_FOUND_OPTIMUM_MSG' => '<br>Rasti optimalūs nustatymai. Paspauskite mygtuką pritaikyti jūsų pašto klientui.',
    'LBL_FROM_ADDR' => 'Siuntėjo adresas',
    // as long as XTemplate doesn't support output escaping, transform
    // quotes to html-entities right here (bug #48913)
    'LBL_FROM_ADDR_DESC' => 'Jūsų nurodytas el. pašto adresas gali nesimatyti išsiųstų laiškų siuntėjo skiltyje, dėl el. pašto tiekėjo uždėtų apribojimų. Tokiu atveju išsiųstuose laiškuose siuntėjo adresas bus panaudotas toks, koks nurodytas Administratorius->El. pašto nustatymai.',
    'LBL_FROM_NAME_ADDR' => 'Siuntėjo vardas/el. paštas',
    'LBL_FROM_NAME' => 'Siuntėjo vardas',
    'LBL_GROUP_QUEUE' => 'Priskirti grupei',
    'LBL_HOME' => 'Pradžia',
    'LBL_LIST_MAILBOX_TYPE' => 'Pašo dėžutės naudojimas',
    'LBL_LIST_NAME' => 'Pavadinimas:',
    'LBL_LIST_GLOBAL_PERSONAL' => 'Tipas',
    'LBL_LIST_SERVER_URL' => 'Pašto serveris:',
    'LBL_LIST_STATUS' => 'Statusas:',
    'LBL_LOGIN' => 'Vartotojo vardas',
    'LBL_MAILBOX_DEFAULT' => 'Gauti laiškai',
    'LBL_MAILBOX_SSL_DESC' => 'Jungiantis naudokite SSL. Jei neveikia patikrinkite ar jūsų PHP instaliacija turi nustatymuose  "--with-imap-ssl".',
    'LBL_MAILBOX_SSL' => 'Naudoti SSL',
    'LBL_MAILBOX_TYPE' => 'Galimi veiksmai',
    'LBL_DISTRIBUTION_METHOD' => 'Paskirstymo metodas',
    'LBL_CREATE_CASE_REPLY_TEMPLATE' => 'Naujas auto-aptarnavimo šablonas',
    'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => 'Pasirinkite laiško šabloną, kurį norėsite automatiškai išsiųsti, kiekvieną kartą kai naujas aptarnavimas bus sukurtas.',
    'LBL_MAILBOX' => 'Stebimi aplankai',
    'LBL_TRASH_FOLDER' => 'Šiukšlių aplankas',
    'LBL_GET_TRASH_FOLDER' => 'Gautas šiukšlių aplankas',
    'LBL_SENT_FOLDER' => 'Siuntimo aplankas',
    'LBL_GET_SENT_FOLDER' => 'Gauti siuntimo aplanką',
    'LBL_SELECT' => 'Pasirinkite',
    'LBL_MARK_READ_DESC' => 'Žymėti laiškus kaip perskaitytus pašto serveryje; jų netrinti.',
    'LBL_MARK_READ_NO' => 'Laiškas pažymėtas ištrynimui po importavimo',
    'LBL_MARK_READ_YES' => 'Laiškas paliktas serveryje po importavimo',
    'LBL_MARK_READ' => 'Palikti laišką serveryje',
    'LBL_MAX_AUTO_REPLIES' => 'Auto-atsakymų skaičius',
    'LBL_MAX_AUTO_REPLIES_DESC' => 'Nustatyti maksimalų auto-atsakymų skaičių per 24 valandų periodą.',
    'LBL_PERSONAL_MODULE_NAME' => 'Asmeninė pašto dėžutė',
    'LBL_PERSONAL_MODULE_NAME_SINGULAR' => 'Asmeninė pašto dėžutė',
    'LBL_CREATE_CASE' => 'Sukurti aptarnavimą iš laiško',
    'LBL_CREATE_CASE_HELP' => 'Pažymėkite, jei norite kiekvienam gautam laiškui automatiškai susikurtų po aptarnavimą.',
    'LBL_MODULE_NAME' => 'Grupės pašto dėžutė',
    'LBL_MODULE_NAME_SINGULAR' => 'Grupės pašto dėžutė',
    'LBL_BOUNCE_MODULE_NAME' => 'Nepasiekusių laiškų pašto dėžutė',
    'LBL_MODULE_TITLE' => 'Įeinantis paštas',
    'LBL_NAME' => 'Pavadinimas',
    'LBL_NONE' => 'Joks',
    'LBL_NO_OPTIMUMS' => 'Neranda optimums. Prašome patikrinti nustatymus ir bandyti dar kartą.',
    'LBL_ONLY_SINCE_DESC' => 'Naudojant POP3, PHP negali filtruoti naujų/neskaitytų žinučių. Ši vėliavėlė leidžia užklausti patikrinimui žinutes, kai paskutinį syki el. paštas buvo žiūrėta. tai žymiai padidiną našumą jeigu serveris nepalaiko IMAP.',
    'LBL_ONLY_SINCE_NO' => 'Ne. Patikrinkite visus pašto serveryje laiškus.',
    'LBL_ONLY_SINCE_YES' => 'Taip.',
    'LBL_ONLY_SINCE' => 'Importuoti tik nuo paskutinio patikrinimo:',
    'LBL_OUTBOUND_SERVER' => 'Išeinančio pašto serveris',
    'LBL_PASSWORD_CHECK' => 'Slaptažodžio tikrinimas',
    'LBL_PASSWORD' => 'Slaptažodis',
    'LBL_POP3_SUCCESS' => 'Jūsų POP3 prisijungimo testas sėkmingas.',
    'LBL_POPUP_FAILURE' => 'Testinis prisijungimas nepavyko. Klaida parodyta čia.',
    'LBL_POPUP_SUCCESS' => 'Testinis prisijungimas sėkmingas. Jūsų nustatymai veikia.',
    'LBL_POPUP_TITLE' => 'Testuoti nustatymus',
    'LBL_GETTING_FOLDERS_LIST' => 'Gaunamas aplankų sąrašas',
    'LBL_SELECT_SUBSCRIBED_FOLDERS' => 'Pasirinkite prenumeruotus aplankus',
    'LBL_SELECT_TRASH_FOLDERS' => 'Pasirinkite šiukšlių katalogą',
    'LBL_SELECT_SENT_FOLDERS' => 'Pasirinkite siuntimo katalogą',
    'LBL_DELETED_FOLDERS_LIST' => 'Šis (-ie) aplankas (-ai): %s arba neegzistuoja, arba buvo ištrintas iš serverio',
    'LBL_PORT' => 'Pašto serverio portas',
    'LBL_QUEUE' => 'Pašto dėžutės eilė',
    'LBL_REPLY_NAME_ADDR' => 'Atsakyti vardas/el. paštas',
    'LBL_REPLY_TO_NAME' => '"Atsakyti-kam" vardas',
    'LBL_REPLY_TO_ADDR' => '"Atsakyti-kam" adresas',
    'LBL_SAME_AS_ABOVE' => 'Naudojant vardas/adresas',
    'LBL_SAVE_RAW' => 'Išsaugoti originalų formatą',
    'LBL_SAVE_RAW_DESC_1' => 'Pasirinkite "Taip" jeigu norite išsaugoti kiekvieno importuoto laiško originalų formatą.',
    'LBL_SAVE_RAW_DESC_2' => 'Dideli prisegtukai gali sukelti problemų su neteisingai sukonfigūruotomis duomenų bazėmis.',
    'LBL_SERVER_OPTIONS' => 'Detalesni nustatymai',
    'LBL_SERVER_TYPE' => 'Pašto serverio protokolas',
    'LBL_SERVER_URL' => 'Pašto Serverio adresas',
    'LBL_SSL_DESC' => 'Jeigu jūsų pašto serveris palaiko saugius prisijungimus, tai bus prisijungta per SSL prisijungimą laiškų importavimo metu',
    'LBL_ASSIGN_TO_TEAM_DESC' => 'Pažymėta komanda turi priėjimą prie pašto dėžutės.',
    'LBL_SSL' => 'Naudoti SSL',
    'LBL_STATUS' => 'Statusas',
    'LBL_SYSTEM_DEFAULT' => 'Sistemos numatytas',
    'LBL_TEST_BUTTON_KEY' => 't',
    'LBL_TEST_BUTTON_TITLE' => 'Testuoti [Alt+T]',
    'LBL_TEST_SETTINGS' => 'Testuoti nustatymus',
    'LBL_TEST_SUCCESSFUL' => 'Prisijungimas baigtas sėkmingai.',
    'LBL_TEST_WAIT_MESSAGE' => 'Prašome palaukti...',
    'LBL_TLS_DESC' => 'Naudoti Transport Layer Security, kai jungiamasi prie pašto serverio.',
    'LBL_TLS' => 'Naudoti TLS',
    'LBL_WARN_IMAP_TITLE' => 'Įeinantis paštas išjungtas',
    'LBL_WARN_IMAP' => 'Perspėjimai:',
    'LBL_WARN_NO_IMAP' => 'Įeinantis paštas <b>negali</b> funkcionuoti be IMAP c-kliento bibliotekų įjungtų/sukompiliuotų su PHP moduliu. Prašome susisiekti su administratoriumi, kad išspręsti šią problemą.',

    'LNK_CREATE_GROUP' => 'Sukurti naują grupę',
    'LNK_LIST_CREATE_NEW_GROUP' => 'Nauja grupės pašto dėžutė',
    'LNK_LIST_CREATE_NEW_BOUNCE' => 'Nauja nepasiekusių laiškų pašto dėžutė',
    'LNK_LIST_MAILBOXES' => 'Visi pašto klientai',
    'LNK_LIST_QUEUES' => 'Visos eilės',
    'LNK_LIST_SCHEDULER' => 'Planuotojai',
    'LNK_LIST_TEST_IMPORT' => 'Testuoti laiškų importavimą',
    'LNK_NEW_QUEUES' => 'Sukurti naują eilę',
    'LNK_SEED_QUEUES' => 'Platinti eiles nuo komandų',
    'LBL_GROUPFOLDER_ID' => 'Grupės aplanko Id',
    'LBL_ASSIGN_TO_GROUP_FOLDER' => 'Priskirti grupės aplankui',
    'LBL_STATUS_ACTIVE' => 'Aktyvus',
    'LBL_STATUS_INACTIVE' => 'Neaktyvus',
    'LBL_IS_PERSONAL' => 'asmeninis',
    'LBL_IS_GROUP' => 'grupės',
    'LBL_ENABLE_AUTO_IMPORT' => 'Importuoti laiškus automatiškai',
    'LBL_WARNING_CHANGING_AUTO_IMPORT' => 'Perspėjimas: Jūs modifikuojate auto importavimo nustatymus, o tai gali sukelti duomenų praradimą.',
    'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => 'Perspėjimas: Auto importavimas turi būti įjungtas, jei norite automatiškai kurti aptarnavimus.',
    'LBL_EDIT_LAYOUT' => 'Redaguoti išdėstymą' /*for 508 compliance fix*/,
    'LBL_AUTHORIZED_ACCOUNT' => 'El. pašto adresas:',
    'LBL_EMAIL_PROVIDER' => 'El. pašto teikėjas',
    'LBL_AUTH_STATUS' => 'Nepavyko suteikti leidimo',
];
