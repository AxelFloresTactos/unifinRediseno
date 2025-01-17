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


class TeamMembership extends SugarBean
{
    // Stored fields
    public $id;
    public $team_id;
    public $user_id;
    public $explicit_assign;
    public $implicit_assign;
    public $deleted;
    public $date_modified;

    public $table_name = 'team_memberships';
    public $object_name = 'TeamMembership';
    public $module_name = 'TeamMemberships';
    public $module_dir = 'Teams';
    public $disable_custom_fields = true;

    public $encodeFields = ['name', 'description'];


    // todo sort by username.

    public $new_schema = true;

    public function __construct()
    {
        parent::__construct();
        $this->disable_row_level_security = true;
    }

    public function get_list_view_data($filter_fields = [])
    {
        $team_fields = $this->get_list_view_array();
        return $team_fields;
    }

    public function list_view_parse_additional_sections(&$list_form)
    {
        return $list_form;
    }

    /**
     * Delete this team membership
     */
    public function delete()
    {
        $query = sprintf(
            'UPDATE %s set deleted = 1 where id = %s',
            $this->table_name,
            $this->db->quoted($this->id)
        );
        $result = $this->db->query($query, true, "Error deleting team membership ($this->id): ");
    }

    /**
     * This method retrieves the membership for a given user_id and team_id.
     * The membership that this is called on is destroyed if a membership is
     * found matching user_id and team_id
     * @returns boolean True if found, false if not found.
     */
    public function retrieve_by_user_and_team($user_id, $team_id)
    {
        // determine whether the user is already on the team
        $query = 'SELECT id
            FROM team_memberships
            WHERE user_id = ?
                AND team_id = ?
                AND deleted = 0';
        $stmt = $this->db->getConnection()->executeQuery($query, [$user_id, $team_id]);
        $row = $stmt->fetchAssociative();

        if ($row != null) {
            $this->retrieve($row['id']);
            return true;
        }

        return false;
    }
}
