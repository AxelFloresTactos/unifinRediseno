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
    //DON'T CONVERT THESE THEY ARE MAPPINGS
    'db_last_name' => 'LBL_LIST_LAST_NAME',
    'db_first_name' => 'LBL_LIST_FIRST_NAME',
    'db_title' => 'LBL_LIST_TITLE',
    'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
    'db_account_name' => 'LBL_LIST_ACCOUNT_NAME',
    'db_email2' => 'LBL_LIST_EMAIL_ADDRESS',

    //END DON'T CONVERT

    // Dashboard Names
    'LBL_LEADS_LIST_DASHBOARD' => 'Müügivihjete loendi töölaud',
    'LBL_LEADS_RECORD_DASHBOARD' => 'Müügivihjete kirjete töölaud',
    'LBL_LEADS_FOCUS_DRAWER_DASHBOARD' => 'Müügivihjete fookuse sahtel',

    'ERR_DELETE_RECORD' => 'en_us Müügivihje kustutamiseks on vaja täpsustada kirje numbrit.',
    'LBL_ACCOUNT_DESCRIPTION' => 'Ettevõtte kirjeldus',
    'LBL_ACCOUNT_ID' => 'Ettevõtte ID',
    'LBL_ACCOUNT_NAME' => 'Ettevõtte nimi:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Tegevused',
    'LBL_ADD_BUSINESSCARD' => 'Lisa visiitkaart',
    'LBL_ADDRESS_INFORMATION' => 'Aadressi info',
    'LBL_ALT_ADDRESS_CITY' => 'Alternatiivne aadress linn:',
    'LBL_ALT_ADDRESS_COUNTRY' => 'Alternatiivne aadress riik:',
    'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternatiivne aadress postiindeks:',
    'LBL_ALT_ADDRESS_STATE' => 'Alternatiivne aadress maakond:',
    'LBL_ALT_ADDRESS_STREET_2' => 'Alternatiivne aadress tänav 2:',
    'LBL_ALT_ADDRESS_STREET_3' => 'Alternatiivne aadress tänav 3:',
    'LBL_ALT_ADDRESS_STREET' => 'Alternatiivne aadress tänav:',
    'LBL_ALTERNATE_ADDRESS' => 'Teine aadress:',
    'LBL_ANY_ADDRESS' => 'Muu aadress:',
    'LBL_ANY_EMAIL' => 'Muu E-post:',
    'LBL_ANY_PHONE' => 'Muu telefon:',
    'LBL_ASSIGNED_TO_NAME' => 'Vastutaja',
    'LBL_ASSIGNED_TO_ID' => 'Määratud kasutaja:',
    'LBL_BACKTOLEADS' => 'Tagasi müügivihjetesse',
    'LBL_BUSINESSCARD' => 'Muuda müügivihjet',
    'LBL_CITY' => 'Linn:',
    'LBL_CONTACT_ID' => 'Kontakti ID',
    'LBL_CONTACT_INFORMATION' => 'Müügivihje ülevaade',
    'LBL_CONTACT_NAME' => 'Müügivihje nimi:',
    'LBL_CONTACT_OPP_FORM_TITLE' => 'Müügivihje-võimalus:',
    'LBL_CONTACT_ROLE' => 'Roll:',
    'LBL_CONTACT' => 'Müügivihje:',
    'LBL_CONVERT_BUTTON_LABEL' => 'Convert',
    'LBL_SAVE_CONVERT_BUTTON_LABEL' => 'Save and Convert',
    'LBL_CONVERT_PANEL_OPTIONAL' => '(optional)',
    'LBL_CONVERT_ACCESS_DENIED' => 'You are missing edit access to the modules required to convert a lead: {{requiredModulesMissing}}',
    'LBL_CONVERT_FINDING_DUPLICATES' => 'Searching for duplicates...',
    'LBL_CONVERT_IGNORE_DUPLICATES' => 'Ignore and create new',
    'LBL_CONVERT_BACK_TO_DUPLICATES' => 'Back to duplicates',
    'LBL_CONVERT_SWITCH_TO_CREATE' => 'Loo uus',
    'LBL_CONVERT_SWITCH_TO_SEARCH' => 'Search',
    'LBL_CONVERT_DUPLICATES_FOUND' => '{{duplicateCount}} duplicates found',
    'LBL_CONVERT_CREATE_NEW' => 'New {{moduleName}}',
    'LBL_CONVERT_SELECT_MODULE' => 'Select {{moduleName}}',
    'LBL_CONVERT_SELECTED_MODULE' => 'Selecting {{moduleName}}',
    'LBL_CONVERT_CREATE_MODULE' => 'Create {{moduleName}}',
    'LBL_CONVERT_CREATED_MODULE' => 'Creating {{moduleName}}',
    'LBL_CONVERT_RESET_PANEL' => 'Lähtesta',
    'LBL_CONVERT_COPY_RELATED_ACTIVITIES' => 'Copy related activities to',
    'LBL_CONVERT_MOVE_RELATED_ACTIVITIES' => 'Move related activities to',
    'LBL_CONVERT_MOVE_ACTIVITIES_TO_CONTACT' => 'Move related activities to the contact record',
    'LBL_CONVERTED_ACCOUNT' => 'Muudetud ettevõte:',
    'LBL_CONVERTED_CONTACT' => 'Muudetud kontakt:',
    'LBL_CONVERTED_OPP' => 'Muudetud müügivõimalus:',
    'LBL_CONVERTED' => 'Muudetud:',
    'LBL_CONVERTLEAD_BUTTON_KEY' => 'V',
    'LBL_CONVERTLEAD_TITLE' => 'Muuda müügivihjet [Alt+V]',
    'LBL_CONVERTLEAD' => 'Muuda müügivihjet',
    'LBL_CONVERTLEAD_WARNING' => 'Hoiatus: Müügivihje staatus, mida soovite muuta on juba "Muudetud". Kontakti ja/või ettevõtte kirjed võivad olla juba müügivihje jaoks loodud. Kui soovid müügivihje muutmist jätkata kliki Salvesta. Tagasi müügivihje juurde ilma seda muutmata kliki Tühista.',
    'LBL_CONVERTLEAD_WARNING_INTO_RECORD' => 'Võimalik kontakt:',
    'LBL_CONVERTLEAD_ERROR' => 'Unable to convert the lead',
    'LBL_CONVERTLEAD_FILE_WARN' => 'You successfully converted the lead {{leadName}}, but there was a problem uploading attachments on one or more records',
    'LBL_CONVERTLEAD_SUCCESS' => 'You successfully converted the lead {{leadName}}',
    'LBL_COUNTRY' => 'Riik:',
    'LBL_CREATED_NEW' => 'Loodud uus',
    'LBL_CREATED_ACCOUNT' => 'Loodud uus kontakt',
    'LBL_CREATED_CALL' => 'Loodud uus kõne',
    'LBL_CREATED_CONTACT' => 'Loodud uus kontakt',
    'LBL_CREATED_MEETING' => 'Loodud uus kohtumine',
    'LBL_CREATED_OPPORTUNITY' => 'Loodud uus müügivõimalus',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'Müügivihjed',
    'LBL_DEPARTMENT' => 'Osakond:',
    'LBL_DESCRIPTION_INFORMATION' => 'Kirjelduse info',
    'LBL_DESCRIPTION' => 'Kirjeldus:',
    'LBL_DO_NOT_CALL' => 'Mitte helistada:',
    'LBL_DUPLICATE' => 'Sarnased müügivihjed',
    'LBL_EMAIL_ADDRESS' => 'E-post:',
    'LBL_EMAIL_OPT_OUT' => 'Email Opt Out:',
    'LBL_EXISTING_ACCOUNT' => 'Kasutatud olemasolevat ettevõtet',
    'LBL_EXISTING_CONTACT' => 'Kasutatud olemasolevat kontakti',
    'LBL_EXISTING_OPPORTUNITY' => 'Kasutatud olemasolevat müügivõimalust',
    'LBL_FAX_PHONE' => 'Fax:',
    'LBL_FIRST_NAME' => 'Eesnimi:',
    'LBL_FULL_NAME' => 'Täisnimi:',
    'LBL_HISTORY_SUBPANEL_TITLE' => 'Ajalugu',
    'LBL_HOME_PHONE' => 'Telefon kodus:',
    'LBL_IMPORT_VCARD' => 'Impordi vCard',
    'LBL_IMPORT_VCARD_SUCCESS' => 'Lead from vCard created succesfully',
    'LBL_VCARD' => 'vCard',
    'LBL_IMPORT_VCARDTEXT' => 'Loo automaatselt uus müügivihje importides vCardi sinu failisüsteemist.',
    'LBL_INVALID_EMAIL' => 'Kehtetu e-post:',
    'LBL_INVITEE' => 'Otsesed aruanded',
    'LBL_LAST_NAME' => 'Perekonnanimi:',
    'LBL_LEAD_SOURCE_DESCRIPTION' => 'Müügivihje allika kirjeldus:',
    'LBL_LEAD_SOURCE' => 'Müügivihje allikas:',
    'LBL_LIST_ACCEPT_STATUS' => 'Aktsepteeri olek',
    'LBL_LIST_ACCOUNT_NAME' => 'Ettevõtte nimi',
    'LBL_LIST_CONTACT_NAME' => 'Müügivihje nimi:',
    'LBL_LIST_CONTACT_ROLE' => 'Roll',
    'LBL_LIST_DATE_ENTERED' => 'Loomiskuupäev',
    'LBL_LIST_EMAIL_ADDRESS' => 'E-post',
    'LBL_LIST_FIRST_NAME' => 'Eesnimi:',
    'LBL_VIEW_FORM_TITLE' => 'Müügivihje vaade',
    'LBL_LIST_FORM_TITLE' => 'Müügivihje loend',
    'LBL_LIST_LAST_NAME' => 'Perekonnanimi',
    'LBL_LIST_LEAD_SOURCE_DESCRIPTION' => 'Müügivihje allika kirjeldus',
    'LBL_LIST_LEAD_SOURCE' => 'Müügivihje allikas',
    'LBL_LIST_MY_LEADS' => 'Minu müügivihjed',
    'LBL_LIST_NAME' => 'Nimi',
    'LBL_LIST_PHONE' => 'Töötelefon:',
    'LBL_LIST_REFERED_BY' => 'Osutatud',
    'LBL_LIST_STATUS' => 'Olek',
    'LBL_LIST_TITLE' => 'Tiitel',
    'LBL_MARKET_INTEREST_PREDICTION' => 'Turuhuviprognoos',
    'LBL_MARKET_SCORE' => 'Turuskoor',
    'LBL_MOBILE_PHONE' => 'Mobiil:',
    'LBL_MODULE_NAME' => 'Müügivihjed',
    'LBL_MODULE_NAME_SINGULAR' => 'Müügivihje',
    'LBL_MODULE_TITLE' => 'Müügivihjed: Avaleht',
    'LBL_NAME' => 'Nimi',
    'LBL_NEW_FORM_TITLE' => 'Uus müügivihje',
    'LBL_NEW_PORTAL_PASSWORD' => 'Uus saidi salasõna:',
    'LBL_OFFICE_PHONE' => 'Töötelefon:',
    'LBL_OPP_NAME' => 'Müügivõimaluse nimi:',
    'LBL_OPPORTUNITY_AMOUNT' => 'Müügivõimaluse summa:',
    'LBL_OPPORTUNITY_ID' => 'Müügivõimaluse ID',
    'LBL_OPPORTUNITY_NAME' => 'Müügivõimaluse nimi:',
    'LBL_CONVERTED_OPPORTUNITY_NAME' => 'Muudetud müügivõimaluse nimi',
    'LBL_OTHER_EMAIL_ADDRESS' => 'Teine e-post:',
    'LBL_OTHER_PHONE' => 'Teine telefon:',
    'LBL_PHONE' => 'Tlf number',
    'LBL_PORTAL_ACTIVE' => 'Portaal aktiivne:',
    'LBL_PORTAL_APP' => 'Saidi rakendus',
    'LBL_PORTAL_INFORMATION' => 'Saidi info',
    'LBL_PORTAL_NAME' => 'Saidi nimi:',
    'LBL_PORTAL_PASSWORD_ISSET' => 'Saidi salasõna on määratud:',
    'LBL_POSTAL_CODE' => 'Postiindeks:',
    'LBL_STREET' => 'Tänav',
    'LBL_PRIMARY_ADDRESS_CITY' => 'Esmane aadress linn',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Esmane aadress maakond',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Esmane aadress postiindeks',
    'LBL_PRIMARY_ADDRESS_STATE' => 'Esmane aadress riik',
    'LBL_PRIMARY_ADDRESS_STREET_2' => 'Esmane aadress Tänav 2',
    'LBL_PRIMARY_ADDRESS_STREET_3' => 'Esmane aadress Tänav 3',
    'LBL_PRIMARY_ADDRESS_STREET' => 'Esmane aadress tänav',
    'LBL_PRIMARY_ADDRESS' => 'Esmane aadress:',
    'LBL_RECORD_SAVED_SUCCESS' => 'You successfully created the {{moduleSingularLower}} <a href="#{{buildRoute model=this}}">{{full_name}}</a>.',
    'LBL_REFERED_BY' => 'Osutaja:',
    'LBL_REPORTS_TO_ID' => 'Juhataja ID:',
    'LBL_REPORTS_TO' => 'Juhataja:',
    'LBL_REPORTS_FROM' => 'Reports From:',
    'LBL_SALUTATION' => 'Tervitus',
    'LBL_MODIFIED' => 'Muutja',
    'LBL_MODIFIED_ID' => 'Muutja Id',
    'LBL_CREATED' => 'Looja:',
    'LBL_CREATED_ID' => 'Looja Id',
    'LBL_SEARCH_FORM_TITLE' => 'Müügivihje otsing',
    'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'Vali vaadatud müügivihjed',
    'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'Vali vaadatud müügivihjed',
    'LBL_STATE' => 'Riik:',
    'LBL_STATUS_DESCRIPTION' => 'Oleku kirjeldus:',
    'LBL_STATUS' => 'Olek:',
    'LBL_TITLE' => 'Tiitel:',
    'LBL_UNCONVERTED' => 'Unconverted',
    'LNK_IMPORT_VCARD' => 'Loo müügivihje vCardist',
    'LNK_LEAD_LIST' => 'Vaata müügivihjeid',
    'LNK_NEW_ACCOUNT' => 'Loo ettevõte',
    'LNK_NEW_APPOINTMENT' => 'Loo kohtumine',
    'LNK_NEW_CONTACT' => 'Loo kontakt',
    'LNK_NEW_LEAD' => 'Loo müügivihje',
    'LNK_NEW_NOTE' => 'Loo märkus',
    'LNK_NEW_TASK' => 'Loo ülesanne',
    'LNK_NEW_CASE' => 'Loo juhtum',
    'LNK_NEW_CALL' => 'Kõne logi',
    'LNK_NEW_MEETING' => 'Planeeri kohtumine',
    'LNK_NEW_OPPORTUNITY' => 'Loo müügivõimalus',
    'LNK_SELECT_ACCOUNTS' => 'OR Select Account',
    'LNK_SELECT_CONTACTS' => ' <b>OR</b> Select Contact',
    'NTC_COPY_ALTERNATE_ADDRESS' => 'Kopeeri alternatiivne aadress esmaseks aadressiks',
    'NTC_COPY_PRIMARY_ADDRESS' => 'Kopeeri esmane aadress alternatiivseks aadressiks',
    'NTC_DELETE_CONFIRMATION' => 'Oled kindel, et soovid seda kirjet kustutada?',
    'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Müügivõimaluse loomine eeldab ettevõtte kontot. \n Palun loo kas uus või vali olemasolev.',
    'NTC_REMOVE_CONFIRMATION' => 'Oled kindel, et soovid selle müügivihje juhtumist eemaldada?',
    'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Oled kindel, et soovid selle kirje eemaldada otsese aruandena?',
    'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Kampaaniad',
    'LBL_TARGET_OF_CAMPAIGNS' => 'Edukas kampaania:',
    'LBL_TARGET_BUTTON_LABEL' => 'Eesmärgistatud',
    'LBL_TARGET_BUTTON_TITLE' => 'Eesmärgistatud',
    'LBL_TARGET_BUTTON_KEY' => 'T',
    'LBL_CAMPAIGN' => 'Kampaania:',
    'LBL_LIST_ASSIGNED_TO_NAME' => 'Määratud kasutaja',
    'LBL_PROSPECT_LIST' => 'Kuuma kontakti loend',
    'LBL_PROSPECT' => 'Target',
    'LBL_CAMPAIGN_LEAD' => 'Kampaaniad',
    'LNK_LEAD_REPORTS' => 'Vaata müügivihjete aruandeid',
    'LBL_BIRTHDATE' => 'Sünnipäev:',
    'LBL_THANKS_FOR_SUBMITTING_LEAD' => 'Täname esitamise eest.',
    'LBL_SERVER_IS_CURRENTLY_UNAVAILABLE' => 'Vabandame, see server pole hetkel saadaval, palun proovi hiljem uuesti.',
    'LBL_ASSISTANT_PHONE' => 'Assistendi telefon',
    'LBL_ASSISTANT' => 'Assistent',
    'LBL_REGISTRATION' => 'Registreerimine',
    'LBL_MESSAGE' => 'Palun sisesta oma info allpool. Info ja/või konto luuakse selle heakskiitmisel.',
    'LBL_SAVED' => 'Täname registreerimise eest.Sinu kontot luuakse ning sinuga võetakse peatselt ühendust.',
    'LBL_CLICK_TO_RETURN' => 'Tagasi portaali',
    'LBL_CREATED_USER' => 'Loodud kasutaja',
    'LBL_MODIFIED_USER' => 'Muudetud kasutaja',
    'LBL_CAMPAIGNS' => 'Kampaaniad',
    'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampaaniad',
    'LBL_CONVERT_MODULE_NAME' => 'Moodul',
    'LBL_CONVERT_MODULE_NAME_SINGULAR' => 'Moodul',
    'LBL_CONVERT_REQUIRED' => 'Kohustuslik',
    'LBL_CONVERT_SELECT' => 'Luba valik',
    'LBL_CONVERT_COPY' => 'Copy Data',
    'LBL_CONVERT_EDIT' => 'Redigeeri',
    'LBL_CONVERT_DELETE' => 'Kustuta',
    'LBL_CONVERT_ADD_MODULE' => 'Lisa moodul',
    'LBL_CONVERT_EDIT_LAYOUT' => 'Edit Convert Layout',
    'LBL_CREATE' => 'Loo',
    'LBL_SELECT' => 'VÕI vali',
    'LBL_WEBSITE' => 'Veebisait',
    'LNK_IMPORT_LEADS' => 'Impordi müügivihjed',
    'LBL_NOTICE_OLD_LEAD_CONVERT_OVERRIDE' => 'Märkus: See Convert Lead sisaldab kohandatud välju. Kui sa kohandad Convert Lead vaadet Studios esmakordselt, siis sul on vaja lisada paigutusse kohandatud väljad. Kohandatud välju ei kuvata paigutuses automaatselt nagu varem.',
//Convert lead tooltips
    'LBL_MODULE_TIP' => 'The module to create a new record in.',
    'LBL_REQUIRED_TIP' => 'Nõutud moodulid peab looma või valima enne müügivihje konverteerimist.',
    'LBL_COPY_TIP' => 'Nagu kontrollitud, siis müügivihje väljad kopeeritakse sama nimega uutesse loodud kirjetesse.',
    'LBL_SELECTION_TIP' => 'Kontaktide seotud väljade mooduleid saab müügivihje konverteerimise protsessis ennem valida kui luua.',
    'LBL_EDIT_TIP' => 'Muuda konverteerimise paigutust selle mooduli jaoks.',
    'LBL_DELETE_TIP' => 'Eemalda see moodul konverteerimise paigutusest.',

    'LBL_ACTIVITIES_MOVE' => 'Move Activities to',
    'LBL_ACTIVITIES_COPY' => 'Copy Activities to',
    'LBL_ACTIVITIES_MOVE_HELP' => "Select the record to which to move the Lead's activities. Tasks, Calls, Meetings, Notes and Emails will be moved to the selected record(s).",
    'LBL_ACTIVITIES_COPY_HELP' => "Select the record(s) for which to create copies of the Lead's activities. New Tasks, Calls, Meetings and Notes will be created for each of the selected record(s). Emails will be related to the selected record(s).",
    //For export labels
    'LBL_PHONE_HOME' => 'Phone Home',
    'LBL_PHONE_MOBILE' => 'Phone Mobile',
    'LBL_PHONE_WORK' => 'Phone Work',
    'LBL_PHONE_OTHER' => 'Phone Other',
    'LBL_PHONE_FAX' => 'Phone Fax',
    'LBL_CAMPAIGN_ID' => 'Kampaania ID',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Assigned User Name',
    'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigned User ID',
    'LBL_EXPORT_MODIFIED_USER_ID' => 'Muutja ID',
    'LBL_EXPORT_CREATED_BY' => 'Created By ID',
    'LBL_EXPORT_PHONE_MOBILE' => 'Mobile Phone',
    'LBL_EXPORT_EMAIL2' => 'Muu e-posti aadress',
    'LBL_EDITLAYOUT' => 'Edit Layout' /*for 508 compliance fix*/,
    'LBL_ENTERDATE' => 'Enter Date' /*for 508 compliance fix*/,
    'LBL_LOADING' => 'Loading' /*for 508 compliance fix*/,
    'LBL_EDIT_INLINE' => 'Redigeeri' /*for 508 compliance fix*/,
    //D&B Principal Identification
    'LBL_DNB_PRINCIPAL_ID' => 'D&B Principal Id',
    //Dashlet
    'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Müügivõimalused',

    //Document title
    'TPL_BROWSER_SUGAR7_RECORDS_TITLE' => '{{module}} &raquo; {{appId}}',
    'TPL_BROWSER_SUGAR7_RECORD_TITLE' => '{{#if last_name}}{{#if first_name}}{{first_name}} {{/if}}{{last_name}} &raquo; {{/if}}{{module}} &raquo; {{appId}}',
    'LBL_NOTES_SUBPANEL_TITLE' => 'Märkused:',

    'LBL_HELP_CONVERT_TITLE' => 'Convert a {{module_name}}',

    // Help Text
    // List View Help Text
    'LBL_HELP_RECORDS' => 'The {{plural_module_name}} module consists of individual prospects who may be interested in a product or service your organization provides. Once the {{module_name}} is qualified as a sales {{opportunities_singular_module}}, {{plural_module_name}} can be converted into {{contacts_module}}, {{opportunities_module}}, and {{accounts_module}}. There are various ways you can create {{plural_module_name}} in Sugar such as via the {{plural_module_name}} module, duplication, importing {{plural_module_name}}, etc. Once the {{module_name}} record is created, you can view and edit information pertaining to the {{module_name}} via the {{plural_module_name}} record view.',

    // Record View Help Text
    'LBL_HELP_RECORD' => 'The {{plural_module_name}} module consists of individual prospects who may be interested in a product or service your organization provides.

- Edit this record&#39;s fields by clicking an individual field or the Edit button.
- View or modify links to other records in the subpanels by toggling the bottom left pane to "Data View".
- Make and view user comments and record change history in the {{activitystream_singular_module}} by toggling the bottom left pane to "Activity Stream".
- Follow or favorite this record using the icons to the right of the record name.
- Additional actions are available in the dropdown Actions menu to the right of the Edit button.',

    // Create View Help Text
    'LBL_HELP_CREATE' => 'The {{plural_module_name}} module consists of individual prospects who may be interested in a product or service your organization provides. Once the {{module_name}} is qualified as a sales {{opportunities_singular_module}}, it can be converted into a {{contacts_singular_module}}, {{accounts_singular_module}}, {{opportunities_singular_module}}, or other record.

To create a {{module_name}}:
1. Provide values for the fields as desired.
 - Fields marked "Required" must be completed prior to saving.
 - Click "Show More" to expose additional fields if necessary.
2. Click "Save" to finalize the new record and return to the previous page.',

    // Convert View Help Text
    'LBL_HELP_CONVERT' => 'Sugar enables you to convert {{plural_module_name}} into {{contacts_module}}, {{accounts_module}}, and other modules once the {{module_name}} meets your qualification criteria.

Step through each module by modifying fields then confirming the new recordâs values by clicking each Associate button.

If Sugar detects an existing record that matches your {{module_name}}âs information, you have the option to choose a duplicate and confirm the selection with the Associate button or to click "Ignore and create new" and proceed normally.

After confirming each required and desired module, click the Save and Convert button at the top to finalize the conversion.',

    //Marketo
    'LBL_MKTO_SYNC' => 'Sync to Marketo&reg;',
    'LBL_MKTO_ID' => 'Marketo Lead ID',
    'LBL_MKTO_LEAD_SCORE' => 'Lead Score',

    'LBL_FILTER_LEADS_REPORTS' => 'Leads&#39; reports',
    'LBL_DATAPRIVACY_BUSINESS_PURPOSE' => 'Nõustutud ärieesmärgid:',
    'LBL_DATAPRIVACY_CONSENT_LAST_UPDATED' => 'Nõusoleku viimane uuendamine',

    // Leads Pipeline view
    'LBL_PIPELINE_ERR_CONVERTED' => 'Mooduli {{moduleSingular}} olekut ei saa muuta. Moodul {{moduleSingular}} on juba teisendatud.',

    // AI Predict
    'LBL_AI_LEADS_CONVERSION_PREDICTION_NAME' => 'Müügivihjete teisendamise prognoos',
    'LBL_AI_LEADS_CONVERSION_PREDICTION_DESC' => 'Kuva konkreetse müügivihje prognoosi üksikasjad',
    'LBL_AI_CONVRATE' => 'Teisendusmäär',
    'LBL_AI_CONVLEADS' => 'Teisendatud müügivihjed',
    'LBL_AI_LEADVELOCITY' => 'Teisenduse aeg (müügivihje kiirus)',
    'LBL_AI_LEADTIMESPAN' => 'Müügivihjete loomise ja teisendamise vaheline aeg',

    // Admin convert lead layout
    'LBL_ENABLE_RLIS' => 'Luba tuluartiklid',
    'LBL_REQUIRE_RLIS' => 'Muuda uue müügivõimaluse loomisel tuluartiklid nõutavaks',
    'LBL_COPY_DATA_RLIS' => 'Kopeeri uue müügivõimaluse loomisel müügivihje andmed tuluartiklitesse',

    //Filters 14.0
    'LBL_LIST_MQL_LEADS' => 'MQL müügivihjed',
    'LBL_LIST_NEW_MQL_LEADS' => 'Uued MQL müügivihjed',
    'LBL_LIST_SQL_LEADS' => 'SQL müügivihjed',
    'LBL_LIST_TODAY_LEADS' => 'Tänased uued müügivihjed',
];
