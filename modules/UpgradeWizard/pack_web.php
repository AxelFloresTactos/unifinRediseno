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

include_once __DIR__ . '/UpgradeDriver.php';

function packUpgradeWizardWeb($zip, $manifest, $installdefs, $params)
{

    $defaults = [
        'version' => '7.5.0.0',
        'build' => '998',
        'from' => ['6.5.17'],
    ];

    $params = array_merge($defaults, $params);

    file_put_contents(__DIR__ . '/version.json', json_encode($params));

    $chdir = __DIR__ . '/../..';

    $files = [
        // UW
        'UpgradeWizard.php',
        'modules/UpgradeWizard/UpgradeDriver.php',
        'modules/UpgradeWizard/WebUpgrader.php',
        'modules/UpgradeWizard/upgrade_screen.php',
        'modules/UpgradeWizard/version.json',
        'modules/UpgradeWizard/language/en_us.lang.php',
        'styleguide/assets/css/upgrader.tailwind.css',
        'styleguide/assets/css/upgrade.css', // TODO remove dependency
        'include/SugarSystemInfo/SugarSystemInfo.php',
        'include/SugarHeartbeat/SugarHeartbeatClient.php',
        'include/SugarHttpClient.php',
        'modules/HealthCheck/smarty.phar',
        'modules/HealthCheck/Scanner/Checks/Dbal.php',
        'modules/HealthCheck/Scanner/Checks/PasswordHashAlgo.php',
    ];

    if (!is_array($params['from'])) {
        $params['from'] = [$params['from']];
    }

    $manifest = array_merge($manifest, [
        'author' => 'SugarCRM, Inc.',
        'description' => 'SugarCRM Upgrader ' . $params['version'],
        'icon' => '',
        'is_uninstallable' => 'true',
        'name' => 'SugarCRM Upgrader ' . $params['version'],
        'published_date' => date('Y-m-d H:i:s'),
        'type' => 'module',
        'version' => $params['version'],
        'acceptable_sugar_versions' => $params['from'],
    ]);

    foreach ($files as $file) {
        $zip->addFile($chdir . '/' . $file, $file);
        $installdefs['copy'][] = ['from' => "<basepath>/$file", 'to' => $file];
    }

    foreach ($installdefs['copy'] as $k => $fileData) {
        if ($fileData['from'] == '<basepath>/modules/UpgradeWizard/language/en_us.lang.php') {
            $installdefs['copy'][$k]['to'] = 'custom/modules/UpgradeWizard/language/en_us.lang.php';
            break;
        }
    }

    // administration menu entry
    $installdefs['copy'][] = [
        'from' => '<basepath>/upgrader2.php',
        'to' => 'custom/Extension/modules/Administration/Ext/Administration/upgrader2.php',
    ];
    $zip->addFromString(
        'upgrader2.php',
        "<?php\n\$admin_group_header[2][3]['Administration']['upgrade_wizard']= array('Upgrade','LBL_UPGRADE_WIZARD_TITLE','LBL_UPGRADE_WIZARD','./UpgradeWizard.php');"
    );

    $cont = sprintf(
        "<?php\n\$manifest = %s;\n\$installdefs = %s;\n",
        var_export($manifest, true),
        var_export($installdefs, true)
    );
    $zip->addFromString('manifest.php', $cont);

    return [$zip, $manifest, $installdefs];
}

if (empty($argv[0]) || basename($argv[0]) != basename(__FILE__)) {
    return;
}

$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) != 'cli') {
    die('This is command-line only script');
}

if (empty($argv[1])) {
    die("Use $argv[0] name.zip [sugarVersion [buildNumber [from]]]");
}

$name = $argv[1];

$params = [];

if (isset($argv[2])) {
    $params['version'] = $argv[2];
}
if (isset($argv[3])) {
    $params['build'] = $argv[3];
}
if (isset($argv[4])) {
    $params['from'] = explode(',', $argv[4]);
}

$zip = new ZipArchive();
$zip->open($name, ZipArchive::CREATE);

packUpgradeWizardWeb(
    $zip,
    [],
    ['id' => 'upgrader' . time(), 'copy' => []],
    $params
);

$zip->close();
exit(0);
