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

class CallsController extends SugarController
{
    protected function action_editView()
    {
        $this->view = 'edit';

        $editAllRecurrences = $_REQUEST['edit_all_recurrences'] ?? false;
        $this->view_object_map['repeatData'] = $this->bean->getRepeatData($editAllRecurrences);

        return true;
    }

    protected function action_editAllRecurrences()
    {
        if (!empty($this->bean->repeat_parent_id)) {
            $id = $this->bean->repeat_parent_id;
        } else {
            $id = $this->bean->id;
        }
        header("Location: index.php?module=Calls&action=EditView&record={$id}&edit_all_recurrences=true");
    }

    protected function action_removeAllRecurrences()
    {
        if (!empty($this->bean->repeat_parent_id)) {
            $id = $this->bean->repeat_parent_id;
            $this->bean->retrieve($id);
        } else {
            $id = $this->bean->id;
        }

        if (!$this->bean->ACLAccess('Delete')) {
            ACLController::displayNoAccess(true);
            sugar_cleanup(true);
        }

        $this->bean->markRepeatDeleted();
        $this->bean->mark_deleted($id);

        header('Location: index.php?module=Calls');
    }
}
