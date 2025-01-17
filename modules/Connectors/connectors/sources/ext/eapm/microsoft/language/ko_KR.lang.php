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

use Sugarcrm\Sugarcrm\Entitlements\SubscriptionManager;

global $current_user;

$productCodes = $current_user->getProductCodes();
$productCodes = urlencode(implode(',', $productCodes));

$url = 'https://www.sugarcrm.com/crm/product_doc.php?edition=' . $GLOBALS['sugar_flavor'] . '&version=' .
    $GLOBALS['sugar_version'] . '&lang=' . $GLOBALS['current_language'] . '&module=Connectors&route=Microsoft' .
    '&products=' . $productCodes;

$connector_strings = [
    'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">' .
        'Sugar 인스턴스를 Microsoft Azure에 등록하여 Sugar 내에서 사용할 수 있도록 Microsoft 계정 구성을 활성화합니다.' .
        '참조: <a href="https://www.sugarcrm.com/crm/product_doc.php?edition={$flavor}&version={$version}&lang={$lang}&module=Connectors&route=Microsoft" target=\'_blank\'>커넥터 문서</a>' .
        '\' target=\'_blank\'>커넥터 설명서</a>를 참조하십시오.</td></tr></table>',
    'oauth2_client_id' => '클라이언트 ID',
    'oauth2_client_secret' => '클라이언트 시크릿',
    'oauth2_single_tenant_enabled' => '단일 테넌트 애플리케이션에 연결',
    'oauth2_single_tenant_id' => '테넌트 ID',
];
