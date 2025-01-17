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
require_once 'include/formbase.php';


$focus = BeanFactory::getBean('ContractTypes', $_POST['record']);
if (!$focus->ACLAccess('Save')) {
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}

$check_notify = false;
foreach ($focus->column_fields as $field) {
    if (isset($_POST[$field])) {
        $value = $_POST[$field];
        $focus->$field = $value;
    }
}

foreach ($focus->additional_column_fields as $field) {
    if (isset($_POST[$field])) {
        $value = $_POST[$field];
        $focus->$field = $value;
    }
}
$return_id = $focus->save($check_notify);
$GLOBALS['log']->debug('Saved record with id of ' . $return_id);
$url = buildRedirectURL($return_id, 'ContractTypes');
if (isset($_REQUEST['edit'])) {
    $url .= '&edit=' . $_REQUEST['edit'];
}
if (isset($_REQUEST['isDuplicate'])) {
    $url .= '&isDuplicate=' . $_REQUEST['isDuplicate'];
}
SugarApplication::redirect($url);
