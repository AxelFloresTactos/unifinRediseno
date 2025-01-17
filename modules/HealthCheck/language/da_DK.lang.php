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
    'LBL_MODULE_NAME' => 'Sundhedstjek',
    'LBL_MODULE_NAME_SINGULAR' => 'Sundhedstjek',
    'LBL_MODULE_TITLE' => 'Sundhedstjek',
    'LBL_LOGFILE' => 'Logfil',
    'LBL_BUCKET' => 'Spand',
    'LBL_FLAG' => 'Flag',
    'LBL_LOGMETA' => 'Log meta',
    'LBL_ERROR' => 'Fejl',

    // Failure handling in SugarBPM upgraders
    'LBL_PA_UNSERIALIZE_DATA_FAILURE' => 'Serialiserede data kunne ikke fjernes fra serie',
    'LBL_PA_UNSERIALIZE_OBJECT_FAILURE' => 'Serialiserede data kunne ikke fjernes fra serie, fordi de indeholder referencer til objekter eller klasser',

    'LBL_SCAN_101_LOG' => '%s har studio historie',
    'LBL_SCAN_102_LOG' => '%s har forlængelser: %s',
    'LBL_SCAN_103_LOG' => '%s har brugerdefinerede værdier',
    'LBL_SCAN_104_LOG' => '%s har brugerdefinerede layout definitioner',
    'LBL_SCAN_105_LOG' => '%s har tilpasset visnings definitioner',

    'LBL_SCAN_201_LOG' => '%s er ikke en bestand modul',

    'LBL_SCAN_301_LOG' => '%s skal køres som BWC',
    'LBL_SCAN_302_LOG' => 'Ukendt filvisninger foreliggende -%s er ikke MB modul',
    'LBL_SCAN_303_LOG' => 'Ikke-tom formular fil %s - %s er ikke MB modul',
    'LBL_SCAN_304_LOG' => 'Ukendt fil %s%s - %s er ikke MB modul',
    'LBL_SCAN_305_LOG' => 'Dårlige værdier - centrale %s, navn %s i modul %s',
    'LBL_SCAN_306_LOG' => 'Dårlige vardefs - relaterer felt %s i modul %s har tomme `moduler',
    'LBL_SCAN_307_LOG' => 'Dårlige vardefs - link%s i modul %s refererer til ugyldig relation',
    'LBL_SCAN_308_LOG' => 'Vardef HTML funktion i %s',
    'LBL_SCAN_309_LOG' => 'Dårlig md5 for %s',
    'LBL_SCAN_310_LOG' => 'Ukendt fil %s/%s',
    'LBL_SCAN_311_LOG' => 'Vardef HTML funktionen %s i $module modul for felt %s',
    'LBL_SCAN_312_LOG' => 'Dårlige vardefs - &#39;navn&#39; feltet er ugyldigt &#39;%s&#39;, modul - &#39;%s&#39;',
    'LBL_SCAN_313_LOG' => 'Forlængelse dir %s opdaget - %s er ikke MB modul',
    'LBL_SCAN_314_LOG' => "Dårlige vardefs - multienum felt %s' med optionsliste '%s' nøgler indeholder uforenelige karakterer - '{%s}' i modul %s",

    'LBL_SCAN_401_LOG' => 'Forhandlerintegration fundet i filer, der skal flyttes til forhandler:' . PHP_EOL . '%s',
    'LBL_SCAN_402_LOG' => 'Dårligt modul %s er - ikke i beanList og ikke i filsystem',
    'LBL_SCAN_403_LOG' => 'Særlige integrerede Sugar-filer fundet til:' . PHP_EOL . '%s',
    'LBL_SCAN_520_LOG' => 'Logic hook after_ui_frame påvist i %s',
    'LBL_SCAN_521_LOG' => 'Logic hook after_ui_footer påvist i %s',
//    'LBL_SCAN_405_LOG' => 'Incompatible Integration - %s %s',
    'LBL_SCAN_406_LOG' => '%s har ikke understøttede brugerdefinerede visninger. Disse tilpassede visningsfiler vil blive flyttet til et inaktivt bibliotek',
    'LBL_SCAN_407_LOG' => '%s har ikke understøttede brugerdefinerede visninger. Disse tilpassede visningsfiler vil blive flyttet til et inaktivt bibliotek',
    'LBL_SCAN_408_LOG' => 'Brugertilpassede komponenter til oprettelse af handlinger blev fundet i %s. Disse komponenter vil blive kopieret og ændret for i stedet, at udvide oprettelse af komponent under opgraderingen',
    'LBL_SCAN_409_LOG' => 'Ugyldige vardefs - "link_file" er forældet. Tilknytningsklasse, der er specificeret i "link_class", skal kunne indlæses automatisk',
    'LBL_SCAN_519_LOG' => 'Forlængelse dir %s opdaget',
    'LBL_SCAN_518_LOG' => 'Fundet customCode %s i %s, fil %s',
    'LBL_SCAN_410_LOG' => 'Maks. felter - Fundet mere end %s felter (%s) i %s',
    'LBL_SCAN_522_LOG' => 'Fundet &#39;get_subpanel_data&#39; med &#39;funktion:&#39; værdi i %s',
    'LBL_SCAN_412_LOG' => 'Dårligt underpanel link %s i %s',
    'LBL_SCAN_413_LOG' => 'Ukendt widget klasse opdaget: %s for %s, modul %s i fil %s',
    'LBL_SCAN_414_LOG' => 'Ukendte områder håndteres af CRYS-36, så ingen flere kontroller her',
    'LBL_SCAN_415_LOG' => 'Dårlig hook fil i %s: %s',
    'LBL_SCAN_523_LOG' => 'By-ref parameter i hook filen %s funktion %s',
    'LBL_SCAN_417_LOG' => 'Inkompatibel modul %s',
    'LBL_SCAN_418_LOG' => 'Fundet underpanel med link til ikke-eksisterende modul: %s i fil %s',
    'LBL_SCAN_419_LOG' => 'Dårlige værdier - centrale %s, navn %s i modul %s',
    'LBL_SCAN_420_LOG' => 'Dårlige vardefs - relaterer felt %s i modul %s har tomme `moduler',
    'LBL_SCAN_421_LOG' => 'Dårlige vardefs - link%s i modul %s refererer til ugyldig relation',
    'LBL_SCAN_422_LOG' => 'Modul %s har definitioner på et andet modul %s i fil %s',
    'LBL_SCAN_525_LOG' => 'Vardef HTML funktion i %s',
    'LBL_SCAN_423_LOG' => 'Dårlig vardefs underfelter -%s refererer til dårlig underfelt %s. Placeret i modul %s',
    'LBL_SCAN_424_LOG' => 'Inline HTML fundet i %s på linje %s',
    'LBL_SCAN_425_LOG' => 'Fundet "echo" i %s på linje %s',
    'LBL_SCAN_426_LOG' => 'Fundet "print" i %s på linje %s',
    'LBL_SCAN_427_LOG' => 'Fundet "die/exit" i %s på linje %s',
    'LBL_SCAN_428_LOG' => 'Fundet "print_r" i %s på linje %s',
    'LBL_SCAN_429_LOG' => 'Fundet "var_dump" i %s på linje %s',
    'LBL_SCAN_430_LOG' => 'Fundet output buffering (%s) i %s på linje %s',
    'LBL_SCAN_431_LOG' => 'Fandt brugerdefineret Smarty-skabelon: "%s"',
    'LBL_SCAN_436_LOG' => 'Fandt brugerdefineret PDF-skabelon: "%s"',
    'LBL_SCAN_437_LOG' => 'Smarty-skabelon uforenelig med Smarty3-syntaks: "%s"',
    'LBL_SCAN_438_LOG' => 'Fandt brugerdefineret PDF-skabelon, der ikke automatisk kan konverteres til Smarty3-syntaks: "%s"',
    'LBL_SCAN_439_LOG' => 'Skabelon er uforenelig med Smarty3-syntaks, springes over: "%s".',
    'LBL_SCAN_451_LOG' => 'AuthN-kode er blevet slettet, brug \\IdMSugarAuthenticate, \\IdMSAMLAuthenticate, \\IdMLDAPAuthenticate i stedet for. Filer med sletningskode: ' . PHP_EOL . '%s',
    'LBL_SCAN_524_LOG' => 'Vardef HTML funktion %s i %s modul for felt %s',
    'LBL_SCAN_432_LOG' => 'Dårlige vardefs - &#39;navn&#39; feltet er ugyldigt &#39;%s&#39;, modul - &#39;%s&#39;',
    'LBL_SCAN_526_LOG' => "Dårlig vardefs - multienum felt '%s' med optionsliste '%s' nøgler indeholder uforenelige karakterer - '%s' i modul %s",
    'LBL_SCAN_527_LOG' => 'Tabelnavn i bean %s matcher ikke tabellen attribut i %s/vardefs.php',
    'LBL_SCAN_528_LOG' => 'Felt %s i %s modul har forkert display_default værdi',
    'LBL_SCAN_529_LOG' => '%s: %s i fil %s på linje %s',
    'LBL_SCAN_530_LOG' => 'Mangler brugerdefineret fil: %s',
    'LBL_SCAN_531_LOG' => 'Afvist databasedriver: %s',
    'LBL_SCAN_532_LOG' => 'En klasse i %s kalder sin stock parent&#39;s constructor som %s::%s()',
    'LBL_SCAN_533_LOG' => 'En klasse i %s kalder sin custom parent&#39;s constructor as %s::%s()',
    'LBL_SCAN_534_LOG' => 'Databasedriver ikke understøttet: %s',
    'LBL_SCAN_535_LOG' => 'Unsupported method call: %s() in %s on line %s',
    'LBL_SCAN_536_LOG' => 'Unsupported property access: $%s in %s on line %s',
    'LBL_SCAN_433_LOG' => 'Fundet brugerdefinerede Elastic søgefiler %s',
    'LBL_SCAN_434_LOG' => 'Fandt anvendelse af rækkefunktioner på $_SESSION i filer: %s',
    'LBL_SCAN_435_LOG' => 'Klasse SugarSession blev fjernet fra API, brug i stedet Sugarcrm\\Sugarcrm\\Session\\SessionStorage. Filer med frarådet kode: ' . PHP_EOL . '%s',
    'LBL_SCAN_550_LOG' => 'Use of removed Sidecar app.date APIs in %s',
    'LBL_SCAN_551_LOG' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_560_LOG' => 'custom/modules/Quotes/quotes.js KAN indeholde tilpasninger, der ikke er kompatible med nye tilbud.',
    'LBL_SCAN_561_LOG' => 'custom/modules/Quotes/quotes.js KAN indeholde tilpasninger, der ikke er kompatible med nye tilbud.',
    'LBL_SCAN_562_LOG' => 'Use of removed Sidecar app.view.invokeParent method in %s',
    'LBL_SCAN_563_LOG' => 'Brug af inkompatibel Monolog-tilpasning: %s',
    'LBL_SCAN_564_LOG' => 'Brug af forældet DBAL-funktionalitet: %s',
    'LBL_SCAN_565_LOG' => 'Brug af udfaset konfigurationsegenskab $sugar_config[&#39;passwordHash&#39;]. Fra version 13.3 vil den ikke være understøttet: %s',
    'LBL_SCAN_566_LOG' => 'Brug af ikke-understøttet konfigurationsegenskab $sugar_config[&#39;passwordHash&#39;]: %s',
    'LBL_SCAN_567_LOG' => 'Brug af en fjernet komponent i Zend Framework: %s',
    'LBL_SCAN_568_LOG' => 'Brug af en forældet komponent i Zend Framework: %s',
    'LBL_SCAN_570_LOG' => 'Ugyldig status og type for e-mails: status=%s, type=%s',
    'LBL_SCAN_571_LOG' => 'Frarådet fil has tilpasninger: %s',
    'LBL_SCAN_572_LOG' => 'Tilpasset fil har navnekonflikt: %s',
    'LBL_SCAN_573_LOG' => 'Tilpasset hjælpefil har navnekonflikt: %s',
    'LBL_SCAN_574_LOG' => 'Underpanel til e-mails eksisterer Brugerdefineret register: %s',
    'LBL_SCAN_575_LOG' => 'Underpanel til kontakters e-mails skal ændres til at bruge underpanel-til-kontakters-arkiverede-e-mails: %s',
    'LBL_SCAN_576_LOG' => 'Hudtilpasninger blev opdaget i: &#39;%s&#39;. Endeligt hudresultat fungerer muligvis ikke som forventet, husk at tjekke dine hudtilpasninger.',
    'LBL_SCAN_580_LOG' => 'Removed jQuery function(s) detected in: `%s`.',
    'LBL_SCAN_585_LOG' => 'Registreret forbudt sætning i "%s": %s',
    'LBL_SCAN_586_LOG' => 'FontAwesome er udfaset pr. 11.2 og understøttes ikke i 12.0. Brug af FontAwesome registreret i: %s',
    'LBL_SCAN_587_LOG' => 'Et undersæt med LESS-variabler frarådes fra 13.1 og understøttes ikke i 14.0. Brugen af frarådede LESS-variabler blev registreret i: %s',

    'LBL_SCAN_501_LOG' => 'Mangler fil: %s',
    'LBL_SCAN_502_LOG' => 'md5 mismatch for %s, forventet %s',
    'LBL_SCAN_503_LOG' => 'Brugerdefineret modul med samme navn som ny Sugar 7 modul: %s',
    'LBL_SCAN_504_LOG' => 'Felttype mangler i modul %s: %s',
    'LBL_SCAN_505_LOG' => 'Type ændring i %s for felt %s: fra %s til %s',
    'LBL_SCAN_506_LOG' => '$this brug i %s',
    'LBL_SCAN_507_LOG' => 'Dårlig vardefs underfelter -%s refererer til dårlig underfelt %s. Placeret i modul %s',
    'LBL_SCAN_508_LOG' => 'Inline HTML fundet i %s på linje %s',
    'LBL_SCAN_509_LOG' => 'Fundet "echo" i %s på linje %s',
    'LBL_SCAN_510_LOG' => 'Fundet "print" i %s på linje %s',
    'LBL_SCAN_511_LOG' => 'Fundet "die/exit" i %s på linje %s',
    'LBL_SCAN_512_LOG' => 'Fundet "print_r" i %s på linje %s',
    'LBL_SCAN_513_LOG' => 'Fundet "var_dump" i %s på linje %s',
    'LBL_SCAN_514_LOG' => 'Fundet output buffering (%s) i %s på linje %s',
    'LBL_SCAN_515_LOG' => 'Script fejl: %s',
    'LBL_SCAN_516_LOG' => 'Tidligere fjernede filer, der findes refereret i: %s',
    'LBL_SCAN_517_LOG' => 'Inkompatibel integration - %s %s',
    'LBL_SCAN_540_LOG' => 'Inkompatible integration data nulstilling - %s %s',
    'LBL_SCAN_541_LOG' => 'Ugyldig SugarBPM-serialisering - %s ugyldige serialisering(er) i %s kolonnen i %s tabellen:  %s.',
    'LBL_SCAN_542_LOG' => 'Ugyldig SugarBPM-feltbrug - %s ugyldig(e) felt(er) brugt i %s.',
    'LBL_SCAN_545_LOG' => 'SugarBPM delvist låst feltgruppe - Felt %4$s låst i gruppe %s i Procesdefinition %s for %s modulet.',
    'LBL_SCAN_546_LOG' => 'Brugerdefineret TinyMCE vidensbasekonfigurering',
    'LBL_SCAN_547_LOG' => 'Brug af fjernet `resetLoadFlag` signatur i %s',
    'LBL_SCAN_548_LOG' => 'Brug af forældet `initButtons` metode in %s',
    'LBL_SCAN_549_LOG' => 'Brug af fjernet &#39;getField&#39; signatur i %s',
    'LBL_SCAN_552_LOG' => 'Use of removed Underscore APIs in %s',
    'LBL_SCAN_553_LOG' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_554_LOG' => 'Sidecar controller %s extends from removed Sidecar controller',

    'LBL_SCAN_901_LOG' => 'Eksempel allerede opgraderet til Sugar 7',
    'LBL_SCAN_903_LOG' => 'Ikke understøttet opgraderingsversion. Installér venligst den korrekte SugarUpgradeWizardPrereq pakke',
    'LBL_SCAN_904_LOG' => 'Fundet NUL værdier i strengene i moduleList. Fil: %s, Modulerne: %s',
    'LBL_SCAN_999_LOG' => 'Ukendt fejl, kontakt venligst support',

    'LBL_SCAN_101_TITLE' => '%s har studio historie',
    'LBL_SCAN_102_TITLE' => '%s har forlængelser: %s',
    'LBL_SCAN_103_TITLE' => '%s har brugerdefinerede værdier',
    'LBL_SCAN_104_TITLE' => '%s har brugerdefinerede layout definitioner',
    'LBL_SCAN_105_TITLE' => '%s har tilpasset visnings definitioner',

    'LBL_SCAN_201_TITLE' => '%s er ikke en bestand modul',

    'LBL_SCAN_301_TITLE' => '%s skal køres som BWC',
    'LBL_SCAN_302_TITLE' => 'Ukendt filvisninger foreliggende -%s er ikke MB modul',
    'LBL_SCAN_303_TITLE' => 'Ikke-tom formular fil %s - %s er ikke MB modul',
    'LBL_SCAN_304_TITLE' => 'Ukendt fil %s%s - %s er ikke MB modul',
    'LBL_SCAN_305_TITLE' => 'Dårlige værdier - centrale %s, navn %s i modul %s',
    'LBL_SCAN_306_TITLE' => 'Dårlige vardefs - relaterer felt %s i modul %s har tomme `moduler',
    'LBL_SCAN_307_TITLE' => 'Dårlige vardefs - link%s i modul %s refererer til ugyldig relation',
    'LBL_SCAN_308_TITLE' => 'Vardef HTML funktion i %s',
    'LBL_SCAN_309_TITLE' => 'Dårlig md5 for %s',
    'LBL_SCAN_310_TITLE' => 'Ukendt fil %s/%s',
    'LBL_SCAN_311_TITLE' => 'Vardef HTML funktionen %s i $module modul for felt %s',
    'LBL_SCAN_312_TITLE' => 'Dårlige vardefs - &#39;navn&#39; feltet er ugyldigt &#39;%s&#39;, modul - &#39;%s&#39;',
    'LBL_SCAN_313_TITLE' => 'Forlængelse dir %s opdaget - %s er ikke MB modul',

    'LBL_SCAN_401_TITLE' => 'Forhandlerintegration fundet i filer, der skal flyttes til forhandler:' . PHP_EOL . '%s',
    'LBL_SCAN_402_TITLE' => 'Dårligt modul %s er - ikke i beanList og ikke i filsystem',
    'LBL_SCAN_403_TITLE' => 'Særlige integrerede Sugar-filer fundet til:' . PHP_EOL . '%s',
    'LBL_SCAN_520_TITLE' => 'Logic hook after_ui_frame påvist i %s',
    'LBL_SCAN_521_TITLE' => 'Logic hook after_ui_footer påvist i %s',
//    'LBL_SCAN_405_TITLE' => 'Incompatible Integration - %s %s',
    'LBL_SCAN_406_TITLE' => '%s har ikke understøttede brugerdefinerede visninger. Disse tilpassede visningsfiler vil blive flyttet til et inaktivt bibliotek',
    'LBL_SCAN_407_TITLE' => '%s har ikke understøttede brugerdefinerede visninger. Disse tilpassede visningsfiler vil blive flyttet til et inaktivt bibliotek',
    'LBL_SCAN_408_TITLE' => 'Brugertilpassede komponenter for opret handlinger blev fundet, som ikke længere understøttes.',
    'LBL_SCAN_409_TITLE' => 'Ugyldige vardefs - modulet %s har ugyldige vardefs for feltet %s.',
    'LBL_SCAN_519_TITLE' => 'Forlængelse dir %s opdaget',
    'LBL_SCAN_518_TITLE' => 'Fundet customCode %s i %s, fil %s',
    'LBL_SCAN_410_TITLE' => 'Maks. felter - Fundet mere end %s felter (%s) i %s',
    'LBL_SCAN_522_TITLE' => 'Fundet &#39;get_subpanel_data&#39; med &#39;funktion:&#39; værdi i %s',
    'LBL_SCAN_412_TITLE' => 'Dårligt underpanel link %s i %s',
    'LBL_SCAN_413_TITLE' => 'Ukendt widget klasse opdaget: %s for %s, modul %s i fil %s',
    'LBL_SCAN_414_TITLE' => 'Ukendte områder håndteres af CRYS-36, så ingen flere kontroller her',
    'LBL_SCAN_415_TITLE' => 'Dårlig hook fil i %s: %s',
    'LBL_SCAN_523_TITLE' => 'By-ref parameter i hook filen %s funktion %s',
    'LBL_SCAN_417_TITLE' => 'Inkompatibel modul %s',
    'LBL_SCAN_418_TITLE' => 'Fundet underpanel med link til ikke-eksisterende modul: %s i fil %s',
    'LBL_SCAN_419_TITLE' => 'Dårlige værdier - centrale %s, navn %s i modul %s',
    'LBL_SCAN_420_TITLE' => 'Dårlige vardefs - relaterer felt %s i modul %s har tomme `moduler',
    'LBL_SCAN_421_TITLE' => 'Dårlige vardefs - link%s i modul %s refererer til ugyldig relation',
    'LBL_SCAN_422_TITLE' => 'Modul %s har definition af et andet modul',
    'LBL_SCAN_525_TITLE' => 'Vardef HTML funktion i %s',
    'LBL_SCAN_423_TITLE' => 'Dårlig vardefs underfelter -%s refererer til dårlig underfelt %s. Placeret i modul %s',
    'LBL_SCAN_424_TITLE' => 'Inline HTML fundet i %s på linje %s',
    'LBL_SCAN_425_TITLE' => 'Fundet "echo" i %s på linje %s',
    'LBL_SCAN_426_TITLE' => 'Fundet "print" i %s på linje %s',
    'LBL_SCAN_427_TITLE' => 'Fundet "die/exit" i %s på linje %s',
    'LBL_SCAN_428_TITLE' => 'Fundet "print_r" i %s på linje %s',
    'LBL_SCAN_429_TITLE' => 'Fundet "var_dump" i %s på linje %s',
    'LBL_SCAN_430_TITLE' => 'Fundet output buffering (%s) i %s på linje %s',
    'LBL_SCAN_431_TITLE' => 'Fandt brugerdefineret Smarty-skabelon: "%s"',
    'LBL_SCAN_436_TITLE' => 'Fandt brugerdefineret PDF-skabelon: "%s"',
    'LBL_SCAN_437_TITLE' => 'Smarty-skabelon uforenelig med Smarty3-syntaks: "%s"',
    'LBL_SCAN_438_TITLE' => 'Fandt brugerdefineret PDF-skabelon, der ikke automatisk kan konverteres til Smarty3-syntaks: "%s"',
    'LBL_SCAN_439_TITLE' => 'Skabelon er uforenelig med Smarty3-syntaks, springes over: "%s"',
    'LBL_SCAN_451_TITLE' => 'AuthN-kode er blevet slettet, brug \\IdMSugarAuthenticate, \\IdMSAMLAuthenticate, \\IdMLDAPAuthenticate i stedet for. Filer med sletningskode: ' . PHP_EOL . '%s',
    'LBL_SCAN_524_TITLE' => 'Vardef HTML funktion %s i %s modul for felt %s',
    'LBL_SCAN_432_TITLE' => 'Dårlige vardefs - &#39;navn&#39; feltet er ugyldigt &#39;%s&#39;, modul - &#39;%s&#39;',
    'LBL_SCAN_433_TITLE' => 'Fundet brugerdefinerede Elastic søgefiler %s',
    'LBL_SCAN_434_TITLE' => 'Fandt anvendelse af rækkefunktioner på $_SESSION i filer: %s',
    'LBL_SCAN_435_TITLE' => 'Der blev fundet brug af fjernet SugarSession klasse',
    'LBL_SCAN_550_TITLE' => 'Use of removed Sidecar app.date APIs in %s',
    'LBL_SCAN_551_TITLE' => 'Use of removed Sidecar Bean APIs in %s',

    'LBL_SCAN_501_TITLE' => 'Mangler fil: %s',
    'LBL_SCAN_502_TITLE' => 'md5 mismatch for %s, forventet %s',
    'LBL_SCAN_503_TITLE' => 'Brugerdefineret modul med samme navn som ny Sugar 7 modul: %s',
    'LBL_SCAN_504_TITLE' => 'Felttype mangler i modul %s: %s',
    'LBL_SCAN_505_TITLE' => 'Type ændring i %s for felt %s: fra %s til %s',
    'LBL_SCAN_506_TITLE' => '$this brug i %s',
    'LBL_SCAN_507_TITLE' => 'Dårlig vardefs underfelter – %s refererer til dårlig underfelt %s i modulet %s',
    'LBL_SCAN_508_TITLE' => 'Inline HTML fundet i %s på linje %s',
    'LBL_SCAN_509_TITLE' => 'Fundet "echo" i %s på linje %s',
    'LBL_SCAN_510_TITLE' => 'Fundet "print" i %s på linje %s',
    'LBL_SCAN_511_TITLE' => 'Fundet "die/exit" i %s på linje %s',
    'LBL_SCAN_512_TITLE' => 'Fundet "print_r" i %s på linje %s',
    'LBL_SCAN_513_TITLE' => 'Fundet "var_dump" i %s på linje %s',
    'LBL_SCAN_514_TITLE' => 'Fundet output buffering (%s) i %s på linje %s',
    'LBL_SCAN_515_TITLE' => 'Script fejl: %s',
    'LBL_SCAN_517_TITLE' => 'Inkompatibel integration - %s %s',
    'LBL_SCAN_526_TITLE' => "Dårlig vardefs - multienum felt '%s' med optionsliste '%s' nøgler indeholder uforenelige karakterer - '%s' i modul %s",
    'LBL_SCAN_528_TITLE' => 'Felt %s i %s modul har forkert display_default værdi',
    'LBL_SCAN_529_TITLE' => '%s: %s i fil %s på linje %s',
    'LBL_SCAN_530_TITLE' => 'Mangler brugerdefineret fil: %s',
    'LBL_SCAN_531_TITLE' => 'Afvist databasedriver: %s',
    'LBL_SCAN_532_TITLE' => 'Stock parent PHP4 constructor-kald i %s',
    'LBL_SCAN_533_TITLE' => 'Custom parent PHP4 constructor-kald i %s',
    'LBL_SCAN_534_TITLE' => 'Databasedriver ikke understøttet: %s',
    'LBL_SCAN_535_TITLE' => 'Unsupported method call: %s()',
    'LBL_SCAN_536_TITLE' => 'Unsupported property access: $%s',
    'LBL_SCAN_540_TITLE' => 'Inkompatible integration data nulstilling - %s %s',
    'LBL_SCAN_541_TITLE' => 'Ugyldig SugarBPM-serialisering - %s ugyldige serialisering(er) i %s kolonnen i %s tabellen: %s',
    'LBL_SCAN_542_TITLE' => 'Ugyldig SugarBPM-feltbrug - %s ugyldig(e) felt(er) brugt i %s.',
    'LBL_SCAN_545_TITLE' => 'SugarBPM delvist låst feltgruppe - %3$s modul: Gruppe %s er delvist låst i procesdefinition %s.',
    'LBL_SCAN_546_TITLE' => 'Brugerdefineret TinyMCE vidensbasekonfigurering',
    'LBL_SCAN_547_TITLE' => 'Brug af fjernet `resetLoadFlag` signatur i %s',
    'LBL_SCAN_548_TITLE' => 'Brug af forældet `initButtons` metode in %s',
    'LBL_SCAN_549_TITLE' => 'Brug af fjernet &#39;getField&#39; signatur i %s',
    'LBL_SCAN_552_TITLE' => 'Use of removed Underscore APIs in %s',
    'LBL_SCAN_553_TITLE' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_554_TITLE' => 'Sidecar controller %s extends from removed Sidecar controller',
    'LBL_SCAN_567_TITLE' => 'Brug af en fjernet komponent i Zend Framework',
    'LBL_SCAN_568_TITLE' => 'Brug af en forældet komponent i Zend Framework',
    'LBL_SCAN_570_TITLE' => 'Uventede værdier fundet i e-mails',
    'LBL_SCAN_571_TITLE' => 'Tilpasset fil indeholder kode, der er frarådet',
    'LBL_SCAN_572_TITLE' => 'Der er en navnekonflikt med en tilpasset fil',
    'LBL_SCAN_573_TITLE' => 'Der er en navnekonflikt med en tilpasset hjælpefil',
    'LBL_SCAN_574_TITLE' => 'Der er tilpasninger til underpanelet e-mails',
    'LBL_SCAN_575_TITLE' => 'Der er tilpasninger til underpanelet Kontakter i e-mails',
    'LBL_SCAN_576_TITLE' => 'Hudtilpasninger blev sporet',
    'LBL_SCAN_580_TITLE' => 'Removed jQuery function(s) detected',
    'LBL_SCAN_585_TITLE' => 'Forbudte sætninger er registreret',
    'LBL_SCAN_586_TITLE' => 'Udfaset brug af FontAwesome registreret',
    'LBL_SCAN_587_TITLE' => 'Der er registreret frarådede LESS-farvevariabler.',

    'LBL_SCAN_901_TITLE' => 'Eksempel allerede opgraderet til Sugar 7',
    'LBL_SCAN_903_TITLE' => 'Ikke understøttet opgraderingsversion',
    'LBL_SCAN_904_TITLE' => 'Fundet NUL værdier i strengene moduleList',
    'LBL_SCAN_999_TITLE' => 'Ukendt fejl, kontakt venligst support',

    'LBL_SCAN_101_DESCR' => 'Studio tilpasninger blev opdaget på din instans. Vi forventer ikke nogen problemer med disse tilpasningsmuligheder og dine tilpasninger kan opgraderes til Sugar 7.',
    'LBL_SCAN_102_DESCR' => 'Studio tilpasninger blev opdaget på din instans. Vi forventer ikke nogen problemer med disse tilpasningsmuligheder og dine tilpasninger kan opgraderes til Sugar 7.',
    'LBL_SCAN_103_DESCR' => 'Studio tilpasninger blev opdaget på din instans. Vi forventer ikke nogen problemer med disse tilpasningsmuligheder og dine tilpasninger kan opgraderes til Sugar 7.',
    'LBL_SCAN_104_DESCR' => 'Studio tilpasninger blev opdaget på din instans. Vi forventer ikke nogen problemer med disse tilpasningsmuligheder og dine tilpasninger kan opgraderes til Sugar 7.',
    'LBL_SCAN_105_DESCR' => 'Studio tilpasninger blev opdaget på din instans. Vi forventer ikke nogen problemer med disse tilpasningsmuligheder og dine tilpasninger kan opgraderes til Sugar 7.',

    'LBL_SCAN_201_DESCR' => 'Studio tilpasninger blev opdaget på din instans. Vi forventer ikke nogen problemer med disse tilpasningsmuligheder og dine tilpasninger kan opgraderes til Sugar 7.',

    'LBL_SCAN_301_DESCR' => 'Visse tilpasninger blev opdaget og blev ikke overført til Sugar7. Dette modul (%s), vil fortsat være tilgængelig, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar7.',
    'LBL_SCAN_302_DESCR' => 'Ukendte filvisninger blev påvist og blev ikke migreret til Sugar7.  Dette modul (%s) vil fortsat være tilgængeligt, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar7. ',
    'LBL_SCAN_303_DESCR' => 'Ikke-tomme formularfiler blev opdaget og blev ikke migreret til Sugar7.  Dette modul (%s) vil fortsat være tilgængeligt, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar7. ',
    'LBL_SCAN_304_DESCR' => 'Ukendte filer (%s%s) blev påvist og blev ikke overflyttet til Sugar 7. Dette modul (%s) vil fortsat være tilgængeligt, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_305_DESCR' => 'Dårlig vardefs (%s: %s) blev påvist i modul %s og blev ikke overflyttet til Sugar 7. Denne tilpasning vil fortsat være til rådighed, men den vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_306_DESCR' => 'Dårlig vardefs blev opdaget og blev ikke overført til Sugar 7. Relateret felt (%s) i modul %s har et tomt &#39;modul&#39;). Denne tilpasning vil fortsat være til rådighed, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_307_DESCR' => 'Dårlig vardefs blev opdaget og blev ikke overført til Sugar 7. Linket (%s) i modul %s henviser til ugyldig relation. Denne tilpasning vil fortsat være til rådighed, men den vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_308_DESCR' => 'Visse tilpasninger blev opdaget og blev ikke overført til Sugar 7. Dette modul (%s), vil fortsat være tilgængelig, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_309_DESCR' => 'En md5 hash for %s matcher ikke ud af boks-filen. Denne fil kan være blevet ændret og vil ikke blive opgraderet til Sugar 7',
    'LBL_SCAN_310_DESCR' => 'Ukendt filvisninger (%s) blev påvist og blev ikke overflyttet til Sugar 7. Dette modul (%s) vil fortsat være tilgængelige, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7.',
    'LBL_SCAN_311_DESCR' => 'Visse tilpasninger blev opdaget og blev ikke overført til Sugar 7. Dette modul (%s), vil fortsat være tilgængelig, men det vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_312_DESCR' => 'Dårlig vardefs blev opdaget og blev ikke overført til Sugar 7. Dårlig vardefs: &#39;navn&#39; felttype er ugyldig &#39;%s&#39; for modul &#39;%s&#39;. Denne tilpasning vil fortsat være til rådighed, men den vil blive kørt i Backwards kompatibilitetstilstand på Sugar 7. ',
    'LBL_SCAN_313_DESCR' => 'Extensions Directory blev registreret - %s er ikke et Module Builder modul. Dette modul vil fortsat være tilgængelig, men kun i Backwards kompatibilitetstilstand.',

    'LBL_SCAN_401_DESCR' => 'Tilpasset fil indeholder en fil, der er blevet flyttet til vendor biblioteket. Vi har forsøgt at tage korrigerende foranstaltninger og der er ikke behov for yderligere foranstaltninger. ',
    'LBL_SCAN_402_DESCR' => 'Dårligt modul %s er - ikke i beanList og ikke i filsystem',
    'LBL_SCAN_403_DESCR' => 'Nogle af Sugar-filer har ændret deres placering i Sugar 7. Vi er nødt til at korrigere deres inkluderer stier.',
    'LBL_SCAN_520_DESCR' => 'Denne logic hook understøttes ikke længere i Sugar 7',
    'LBL_SCAN_521_DESCR' => 'Denne logic hook understøttes ikke længere i Sugar 7',
//    'LBL_SCAN_405_DESCR' => 'Package detected which has been blacklisted as not supported in Sugar 7',
    'LBL_SCAN_406_DESCR' => 'Stock Sugar-modulet har ikke-understøttede brugerdefinerede visninger i custom/modules/%s/views. Disse brugerdefinerede visningsfiler flyttes til en deaktiveret mappe under opgraderingen',
    'LBL_SCAN_407_DESCR' => 'Stock Sugar-modulet har ikke-understøttede brugerdefinerede visninger i modules/%s/views. Disse brugerdefinerede visningsfiler flyttes til en deaktiveret mappe under opgraderingen',
    'LBL_SCAN_408_DESCR' => 'Brugertilpassede komponenter til oprettelse af handlinger blev fundet i %s. Disse komponenter vil blive kopieret og ændret for i stedet, at udvide oprettelse af komponent under opgraderingen',
    'LBL_SCAN_409_DESCR' => 'Attributtet "link_file" i vardefs er blevet forældet. Tilknytningsklasse skal kunne indlæses automatisk',
    'LBL_SCAN_519_DESCR' => 'Stock Sugar modul har en af ​​de udvidelser, som vi ikke støtter til opgradering, såsom tilpassede routing, adgangskontrol, JavaScript etc.',
    'LBL_SCAN_518_DESCR' => 'De vardefs omfatter bruger customCode definitioner, som vi ikke ved, hvordan man konverterer',
    'LBL_SCAN_410_DESCR' => 'Alt for mange felter i visningen',
    'LBL_SCAN_522_DESCR' => 'Underpanel data hentet af en funktion, men vi støtter ikke opgradering endnu.',
    'LBL_SCAN_412_DESCR' => 'Underpanel henviser til et link, der ikke eksisterer eller ikke er ordentligt defineret',
    'LBL_SCAN_413_DESCR' => 'Felt refererer til et widget klasse navn, der ikke har matchende widget klasse fil',
    'LBL_SCAN_414_DESCR' => 'Ukendte områder håndteres af CRYS-36, så ingen flere kontroller her',
    'LBL_SCAN_415_DESCR' => 'Logic hook henviser til en fil, der ikke findes',
    'LBL_SCAN_523_DESCR' => 'Gammel logic hook fil bruger side-referenceparameter når den passerer, hvilket kan føre til fejlmeddelelser, der vises (og dermed ødelægger REST)',
    'LBL_SCAN_417_DESCR' => 'Modul Feeds eller iFrames opdaget, hvilke ikke bør eksisterer længere',
    'LBL_SCAN_418_DESCR' => 'Underpanel refererer til et modul, der ikke findes',
    'LBL_SCAN_419_DESCR' => 'Vardef nøgle passer ikke vardef navn',
    'LBL_SCAN_420_DESCR' => 'Vardef indeholder relatere felter der henviser til en relation, som ikke kan indlæses korrekt',
    'LBL_SCAN_421_DESCR' => 'Vardef indeholder et link felt, der ikke kan indlæses korrekt',
    'LBL_SCAN_422_DESCR' => 'Modul %s har definitioner på et andet modul %s i fil %s',
    'LBL_SCAN_525_DESCR' => 'Vardef definerer enum der er et resultat af HTML-funktion, der ikke understøttes for Sugar 7',
    'LBL_SCAN_423_DESCR' => 'Vardef defineres som sammensatte felter, der indeholder underfelter, og en af disse underfelter findes faktisk ikke',
    'LBL_SCAN_424_DESCR' => 'Fil indeholder inline HTML',
    'LBL_SCAN_425_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_426_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_427_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_428_DESCR' => 'Koden indeholder denne output-producerende funktion. Bemærk, at print_r (..., sand) er tilladt.',
    'LBL_SCAN_429_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_430_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_431_DESCR' => 'Det vil blive konverteret til Smarty3-syntaks i overensstemmelse',
    'LBL_SCAN_436_DESCR' => 'Det vil blive konverteret til Smarty3-syntaks i overensstemmelse',
    'LBL_SCAN_437_DESCR' => 'Der er syntaks til stede i .tpl -filen, der ikke kan konverteres til at være kompatibel med Smarty3. Ret det manuelt for at opgradere forekomsten.',
    'LBL_SCAN_438_DESCR' => 'Kan ikke konvertere brugerdefineret PDF-skabelon til at passe til Smarty 3 syntaks. Ret det manuelt for at opgradere forekomsten.',
    'LBL_SCAN_439_DESCR' => 'Der er syntaks til stede i .tpl-filen, der ikke kan konverteres til at være kompatibel med Smarty3. Det blev sprunget over. Hvis det er en gyldig Smarty-skabelon, skal du rette den manuelt.',
    'LBL_SCAN_451_DESCR' => 'AuthN-kode er blevet slettet, brug \\IdMSugarAuthenticate, \\IdMSAMLAuthenticate, \\IdMLDAPAuthenticate i stedet for',
    'LBL_SCAN_524_DESCR' => 'Feltet er defineret som funktion producerer af HTML og kan ikke automatisk konverteres (vi ved, hvordan man konvertere nogle stock områder som e-mails og valuta)',
    'LBL_SCAN_432_DESCR' => 'Feltet &#39;navn&#39; er en type anderledes end navn, fulde navn, varchar eller id',
    'LBL_SCAN_433_DESCR' => 'Fundet brugerdefinerede Elastic søgefiler %s',
    'LBL_SCAN_434_DESCR' => 'Fandt anvendelse af rækkefunktioner på $_SESSION i filer: %s',
    'LBL_SCAN_550_DESCR' => 'Use of removed Sidecar app.date APIs in %s, this code will be migrated by upgrade scripts',
    'LBL_SCAN_551_DESCR' => 'Use of removed Sidecar Bean APIs in %s, this code will be migrated by upgrade scripts',

    'LBL_SCAN_501_DESCR' => 'En af de centrale filer er ikke til stede i instansen',
    'LBL_SCAN_502_DESCR' => 'En af de centrale filer er blevet ændret i denne installation',
    'LBL_SCAN_503_DESCR' => 'Brugerdefineret modul har samme navn som en af ​​de nye Sugar moduler',
    'LBL_SCAN_504_DESCR' => 'Vardef feltdefinition udelader typen',
    'LBL_SCAN_505_DESCR' => 'Ikke-blob felttype ændres til blob felttype. Dette er ikke tilladt, fordi blob typer, der ikke kan indekseres, og vi kan have filtre der er afhængige af at dette felt bliver indekseret.',
    'LBL_SCAN_506_DESCR' => '$this bruges i metadata. Eftersom metadatafilen er lastet i anden sammenhæng i Sugar 7, ville det mislykkes.',
    'LBL_SCAN_507_DESCR' => 'Vardef defineres som sammensatte felter, der indeholder underfelter, og en af disse underfelter findes faktisk ikke',
    'LBL_SCAN_508_DESCR' => 'Fil indeholder inline HTML',
    'LBL_SCAN_509_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_510_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_511_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_512_DESCR' => 'Koden indeholder denne output-producerende funktion. Bemærk, at print_r (..., sand) er tilladt.',
    'LBL_SCAN_513_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_514_DESCR' => 'Koden indeholder denne output-producerende funktion',
    'LBL_SCAN_515_DESCR' => 'Script kontrol mislykkedes, hvilket betyder instaScannerMeta.phpnce indeholder sandsynligvis dårlig PHP kode som scriptet forsøgte at indlæse.',
    'LBL_SCAN_517_DESCR' => 'Pakke registreret, som er blevet sortlistet som ikke værende understøttet i Sugar 7',
    'LBL_SCAN_526_DESCR' => 'Listen indeholder varenavn værdier, der forhindrer opgraderingen.',
    'LBL_SCAN_528_DESCR' => 'Dato/Datotid/Tid felt med ukorrekt display_default værdi som -none-',
    'LBL_SCAN_529_DESCR' => 'PHP fejl kan være udløst af fortolkeren når forkert php-syntaks eller nogle run-time-kode-problemer findes.',
    'LBL_SCAN_530_DESCR' => 'En af de brugerdefinerede filer er ikke til stede I tilfældet, men bruges af brugerdefineret kode.',
    'LBL_SCAN_531_DESCR' => '%s databasedriveren er forældet. Overvej at bruge %s i stedet.',
    'LBL_SCAN_532_DESCR' => 'En klasse erklæret i %s kalder sin stock parent&#39;s constructor som %s::%s()',
    'LBL_SCAN_533_DESCR' => 'En klasse erklæret i %s kalder sin custom parent&#39;s constructor som %s::%s()',
    'LBL_SCAN_534_DESCR' => '%s databasedriveren understøttes ikke længere. Overvej at bruge %s i stedet.',
    'LBL_SCAN_535_DESCR' => 'A call to unsupported method %s() found in %s on line %d',
    'LBL_SCAN_536_DESCR' => 'Access to an unsupported property $%s found in %s on line %d',
    'LBL_SCAN_540_DESCR' => 'Pakke detekteret, der er black-listet som ikke understøttet i målversionen af Sugar. Disse pakker skal afinstalleres OG slettes før opgradering. Bemærk venligst, at afinstallation af disse pakker vil fjerne tabeller og data genereret af pakken samt brugen af pakkernes moduler.',
    'LBL_SCAN_541_DESCR' => 'Der er fundet data i dine procesadministrationstabeller, som ikke kan serialiseres eller konverteres',
    'LBL_SCAN_542_DESCR' => 'Der er fundet ugyldige felter i dine procesadministrations forretningsregler og/eller handlinger. Disse felter skal fjernes fra forretningsregler og/eller handlinger for at opgradere.',
    'LBL_SCAN_545_DESCR' => 'Et grupperingsfelt er delvist låst i en procesdefinition. Disse felter skal låses op i procesdefinitionen for at opgraderingen kan fortsætte.',
    'LBL_SCAN_546_DESCR' => 'Kan ikke overføre brugerdefineret TinyMCE konfigurering i vidensbase-modul. '
        . 'Parameteren "tinyConfig" i %s fil vil blive tømt. '
        . 'Hvis du har nogen TinyMCE tilpasninger bør der du gemme dem før opgraderingen '
        . 'og tilføje dem manuelt efter opgraderingen.',
    'LBL_SCAN_547_DESCR' => 'Brug af fjernet `resetLoadFlag` signatur i %s',
    'LBL_SCAN_548_DESCR' => 'Brug af forældet `initButtons` metode in %s',
    'LBL_SCAN_549_DESCR' => 'Brug af fjernet &#39;getField&#39; signatur i %s',
    'LBL_SCAN_552_DESCR' => 'Use of removed Underscore APIs in %s',
    'LBL_SCAN_553_DESCR' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_554_DESCR' => 'Sidecar controller %s extends from removed Sidecar controller',

    'LBL_SCAN_901_DESCR' => 'Eksempel allerede opgraderet til Sugar 7',
    'LBL_SCAN_903_DESCR' => 'Ikke understøttet opgraderingsversion. Installér venligst den korrekte SugarUpgradeWizardPrereq pakke',
    'LBL_SCAN_904_DESCR' => 'Fil: %s, Moduler: %s',
    'LBL_SCAN_999_DESCR' => 'Ukendt fejl, kontakt venligst support',

    'LBL_SCAN_577_TITLE' => 'Uforenelig databasesortering',
    'LBL_SCAN_577_LOG' => "Sortering '%s' er uforenelig med '%s' charset",
    'LBL_SCAN_577_DESCR' => "Vælge en anden sortering i dine lokalitetsindstillinger eller fjern 'dbconfigoption.collation' konfigurationen for at bruge standardsorteringen.",

    'LBL_SCAN_578_TITLE' => 'Ude af stand til at fjerne midlertidig databasetabel: %s',
    'LBL_SCAN_578_LOG' => 'Ude af stand til at fjerne midlertidig databasetabel: %s',
    'LBL_SCAN_578_DESCR' => 'En midlertidig tabel, der blev oprettest med henblik på sikkerhedstjek af tegnkonverteringsindstillingen mislykkedes slettes under opgraderingen, og den skal derfor slettes manuelt',

    'LBL_SCAN_579_TITLE' => 'Ude af stand til at udføre tegnindstillings-/sorteringskonvertering: (%s) på tabel: %s',
    'LBL_SCAN_579_LOG' => 'Ude af stand til at udføre tegnindstillings-/sorteringskonvertering: (%s) på tabel: %s',
];
