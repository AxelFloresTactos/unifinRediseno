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
$dictionary['OAuthKey'] = ['table' => 'oauth_consumer',
    'favorites' => false,
    'comment' => 'OAuth consumer keys',
    'audited' => false,
    'fields' => [
        'c_key' => [
            'name' => 'c_key',
            'vname' => 'LBL_CONSKEY',
            'type' => 'varchar',
            'required' => true,
            'comment' => 'Consumer public key',
            'importable' => 'required',
            'massupdate' => 0,
            'reportable' => false,
            'studio' => 'hidden',
        ],
        'c_secret' => [
            'name' => 'c_secret',
            'vname' => 'LBL_CONSSECRET',
            'type' => 'varchar',
            'required' => true,
            'comment' => 'Consumer secret key',
            'importable' => 'required',
            'massupdate' => 0,
            'reportable' => false,
            'studio' => 'hidden',
        ],
        'tokens' => [
            'name' => 'tokens',
            'type' => 'link',
            'relationship' => 'consumer_tokens',
            'module' => 'OAuthTokens',
            'bean_name' => 'OAuthToken',
            'source' => 'non-db',
            'vname' => 'LBL_TOKENS',
        ],
        'oauth_type' => [
            'name' => 'oauth_type',
            'type' => 'enum',
            'options' => 'oauth_type_dom',
            'len' => 50,
            'comment' => 'Is this client an OAuth1 or OAuth2 client',
            'default' => 'oauth1',
            'vname' => 'LBL_OAUTH_TYPE',
        ],
        'client_type' => [
            'name' => 'client_type',
            'type' => 'enum',
            'options' => 'oauth_client_type_dom',
            'len' => 50,
            'comment' => 'What type of client does this key belong to, mobile, portal, UI or other.',
            'default' => 'user',
            'vname' => 'LBL_CLIENT_TYPE',
            'dependency' => 'equal($oauth_type,"oauth2")',
        ],
    ],
    'acls' => ['SugarACLAdminOnly' => true, 'SugarACLOAuthKeys' => true],
    'indices' => [
        ['name' => 'ckey', 'type' => 'unique', 'fields' => ['c_key']],
        ['name' => 'idx_oauthkey_client_type', 'type' => 'index', 'fields' => ['client_type']],
    ],
];
if (!class_exists('VardefManager')) {
}
VardefManager::createVardef('OAuthKeys', 'OAuthKey', ['basic', 'assignable']);
