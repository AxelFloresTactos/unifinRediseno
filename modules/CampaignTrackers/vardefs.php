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
$dictionary['CampaignTracker'] = ['table' => 'campaign_trkrs', 'archive' => false,
    'comment' => 'Maintains the Tracker URLs used in campaign emails',

    'fields' => [
        'id' => [
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'required' => true,
            'reportable' => false,
            'comment' => 'Unique identifier',
        ],
        'tracker_name' => [
            'name' => 'tracker_name',
            'vname' => 'LBL_TRACKER_NAME',
            'type' => 'varchar',
            'len' => '30',
            'comment' => 'The name of the campaign tracker',
        ],
        'tracker_url' => [
            'name' => 'tracker_url',
            'vname' => 'LBL_TRACKER_URL',
            'type' => 'varchar',
            'len' => '255',
            'default' => 'http://',
            'comment' => 'The URL that represents the landing page when the tracker URL in the campaign email is clicked',
        ],
        'tracker_key' => [
            'name' => 'tracker_key',
            'vname' => 'LBL_TRACKER_KEY',
            'type' => 'int',
            'len' => '11',
            'auto_increment' => true,
            'readonly' => true,
            'required' => true,
            'studio' => ['editview' => false],
            'comment' => 'Internal key to uniquely identifier the tracker URL',
        ],
        'campaign_id' => [
            'name' => 'campaign_id',
            'vname' => 'LBL_CAMPAIGN_ID',
            'type' => 'id',
            'required' => false,
            'reportable' => false,
            'comment' => 'The ID of the campaign',
        ],
        'date_entered' => [
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'required' => true,
            'comment' => 'Date record created',
        ],
        'date_modified' => [
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'required' => true,
            'comment' => 'Date record last modified',
        ],
        'modified_user_id' => [
            'name' => 'modified_user_id',
            'vname' => 'LBL_MODIFIED_USER_ID',
            'dbType' => 'id',
            'type' => 'id',
            'comment' => 'User who last modified record',
        ],
        'created_by' => [
            'name' => 'created_by',
            'vname' => 'LBL_CREATED_BY',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => 'false',
            'dbType' => 'id',
            'comment' => 'User ID who created record',
        ],
        'is_optout' => [
            'name' => 'is_optout',
            'vname' => 'LBL_OPTOUT',
            'type' => 'bool',
            'required' => true,
            'default' => '0',
            'reportable' => false,
            'comment' => 'Indicator whether tracker URL represents an opt-out link',
        ],
        'deleted' => [
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'required' => false,
            'default' => '0',
            'reportable' => false,
            'comment' => 'Record deletion indicator',
        ],
        'campaign' => [
            'name' => 'campaign',
            'type' => 'link',
            'relationship' => 'campaign_campaigntrakers',
            'source' => 'non-db',
            'vname' => 'LBL_CAMPAIGN',
        ],
    ],

    'relationships' => [

        'campaign_campaigntrakers' => [
            'lhs_module' => 'Campaigns',
            'lhs_table' => 'campaigns',
            'lhs_key' => 'id',
            'rhs_module' => 'CampaignTrackers',
            'rhs_table' => 'campaign_trkrs',
            'rhs_key' => 'campaign_id',
            'relationship_type' => 'one-to-many',
        ],
    ]
    , 'indices' => [
        ['name' => 'campaign_trackepk', 'type' => 'primary', 'fields' => ['id']],
        ['name' => 'campaign_tracker_key_idx', 'type' => 'index', 'fields' => ['tracker_key']],
    ],
];
