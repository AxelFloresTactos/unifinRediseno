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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once 'modules/Configurator/Forms.php';
require_once 'modules/Administration/Forms.php';

class ViewAdminwizard extends SugarView
{
    public function __construct()
    {
        parent::__construct();

        $this->options['show_header'] = false;
        $this->options['show_javascript'] = false;
    }

    /**
     * @see SugarView::display()
     */
    public function display()
    {
        global $current_user, $mod_strings, $app_list_strings, $sugar_config, $locale, $sugar_version;

        if (!is_admin($current_user)) {
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
        }

        $themeObject = SugarThemeRegistry::current();

        $configurator = new Configurator();
        $sugarConfig = SugarConfig::getInstance();
        $focus = Administration::getSettings();

        $ut = $GLOBALS['current_user']->getPreference('ut');
        if (empty($ut)) {
            $this->ss->assign('SKIP_URL', 'index.php?module=Users&action=Wizard&skipwelcome=1');
        } else {
            $this->ss->assign('SKIP_URL', 'index.php?module=Home&action=index');
        }

        // Always mark that we have got past this point
        $focus->saveSetting('system', 'adminwizard', 1);
        $css = $themeObject->getCSS();
        $favicon = $themeObject->getImageURL('sugar-favicon.png', false);
        $this->ss->assign('FAVICON_URL', getJSPath($favicon));
        $this->ss->assign('SUGAR_CSS', $css);
        $this->ss->assign('MOD_USERS', return_module_language($GLOBALS['current_language'], 'Users'));
        $this->ss->assign('CSS', '<link rel="stylesheet" type="text/css" href="' . SugarThemeRegistry::current()->getCSSURL('wizard.css') . '" />');
        $this->ss->assign('LANGUAGES', get_languages());
        $this->ss->assign('config', $sugar_config);
        $this->ss->assign('SUGAR_VERSION', $sugar_version);
        $this->ss->assign('settings', $focus->settings);
        $this->ss->assign('exportCharsets', get_select_options_with_id($locale->getCharsetSelect(), $sugar_config['default_export_charset']));
        $this->ss->assign('getNameJs', $locale->getNameJs());
        $this->ss->assign('NAMEFORMATS', $locale->getUsableLocaleNameOptions($sugar_config['name_formats']));
        $this->ss->assign('JAVASCRIPT', get_set_focus_js() . get_configsettings_js());
        $this->ss->assign('company_logo', SugarThemeRegistry::current()->getImageURL('company_logo.png', true, true));
        $this->ss->assign('mail_smtptype', $focus->settings['mail_smtptype']);
        $this->ss->assign('mail_smtpserver', $focus->settings['mail_smtpserver']);
        $this->ss->assign('mail_smtpport', $focus->settings['mail_smtpport']);
        $this->ss->assign('mail_smtpuser', $focus->settings['mail_smtpuser']);
        $this->ss->assign('mail_smtppass', $focus->settings['mail_smtppass']);
        $this->ss->assign('mail_smtpauth_req', ($focus->settings['mail_smtpauth_req']) ? "checked='checked'" : '');
        $this->ss->assign('MAIL_SSL_OPTIONS', get_select_options_with_id($app_list_strings['email_settings_for_ssl'], $focus->settings['mail_smtpssl']));
        $this->ss->assign('notify_allow_default_outbound_on', (!empty($focus->settings['notify_allow_default_outbound']) && $focus->settings['notify_allow_default_outbound'] == 2) ? 'CHECKED' : '');
        $this->ss->assign('THEME', SugarThemeRegistry::current()->__toString());

        // get javascript
        ob_start();
        $this->options['show_javascript'] = true;
        $this->renderJavascript();
        $this->options['show_javascript'] = false;
        $this->ss->assign('SUGAR_JS', ob_get_contents() . $themeObject->getJS());
        ob_end_clean();

        $this->ss->assign('langHeader', get_language_header());

        $page = $this->request->getValidInputRequest('page', null, 'welcome');
        $this->ss->assign('START_PAGE', $page);

        $this->ss->display('modules/Configurator/tpls/adminwizard.tpl');
    }
}
