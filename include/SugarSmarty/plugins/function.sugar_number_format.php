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

/*

Modification information for LGPL compliance

r56990 - 2010-06-16 13:05:36 -0700 (Wed, 16 Jun 2010) - kjing - snapshot "Mango" svn branch to a new one for GitHub sync

r56989 - 2010-06-16 13:01:33 -0700 (Wed, 16 Jun 2010) - kjing - defunt "Mango" svn dev branch before github cutover

r55980 - 2010-04-19 13:31:28 -0700 (Mon, 19 Apr 2010) - kjing - create Mango (6.1) based on windex

r53409 - 2010-01-03 19:31:15 -0800 (Sun, 03 Jan 2010) - roger - merge -r50376:HEAD from fuji_newtag_tmp


*/


/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {sugar_currency_format} function plugin
 *
 * Type:     function<br>
 * Name:     sugar_currency_format<br>
 * Purpose:  formats a number
 *
 * @param array
 * @param Smarty
 * @author Wayne Pan {wayne at sugarcrm.com}
 */
function smarty_function_sugar_number_format($params, &$smarty)
{
    global $locale;

    if (!isset($params['var']) || $params['var'] === '') {
        return '';
    }

    if (!isset($params['precision'])) {
        $params['precision'] = $locale->getPrecedentPreference('default_currency_significant_digits');
    }

    $_contents = format_number($params['var'], $params['precision'], $params['precision'], $params);

    if (!empty($params['assign'])) {
        $smarty->assign($params['assign'], $_contents);
    } else {
        return $_contents;
    }
}
