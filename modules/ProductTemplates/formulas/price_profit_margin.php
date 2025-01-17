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
 ********************************************************************************/
class ProfitMargin
{
    public function is_readonly()
    {
        return 'readonly';
    }

    public function get_edit_html($pricing_factor)
    {
        global $current_language;
        $template_mod_strings = return_module_language($current_language, 'ProductTemplates');
        return "{$template_mod_strings['LBL_POINTS']} <input language='javascript' onkeyup='set_discount_price(this.form)' id='pricing_factor_ProfitMargin' type='text' tabindex='1' size='4' maxlength='4' value='" . $pricing_factor . "'>";
    }

    public function get_detail_html($formula, $factor)
    {
        global $current_language, $app_list_strings;
        $template_mod_strings = return_module_language($current_language, 'ProductTemplates');
        return $app_list_strings['pricing_formula_dom'][$formula] . ' [' . $template_mod_strings['LBL_POINTS'] . ' = ' . $factor . ']';
    }

    public function get_formula_js()
    {
        //ProfitMargin: $discount_price = $cost_price * 100 /(100 - $factor)
        global $current_user, $sugar_config;
        $precision = null;

        if ($precision == null) {
            $precision_val = $current_user->getPreference('default_currency_significant_digits');
            $precision = (empty($precision_val) ? $sugar_config['default_currency_significant_digits'] : $precision_val);
        }

        $the_script = "form.discount_price.readOnly = true;\n";
        $the_script .= "this.document.getElementById('discount_price').value = unformatNumber(this.document.getElementById('cost_price').value, num_grp_sep, dec_sep) * 100 / (100 - unformatNumber(this.document.getElementById('pricing_factor_ProfitMargin').value, num_grp_sep, dec_sep));\n";
        $the_script .= "this.document.getElementById('discount_price').value = formatNumber(this.document.getElementById('discount_price').value, num_grp_sep, dec_sep, $precision, $precision);\n";
        return $the_script;
    }

    public function calculate_price($cost_price = 1.00, $list_price = 1.00, $discount_price = 1.00, $factor = 1)
    {
        //ProfitMargin: $discount_price = $cost_price * 100 /(100 - $factor)
        $discount_price = $cost_price * 100 / (100 - $factor);
        return $discount_price;
    }
}
