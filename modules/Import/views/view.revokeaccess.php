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

class ImportViewRevokeAccess extends SugarView
{
    /**
     * {@inheritDoc}
     *
     * @param array $params Ignored
     */
    public function process($params = [])
    {
        if (isset($_REQUEST['application'])) {
            $response = [
                'result' => $this->revokeAccess($_REQUEST['application']),
                'sources' => $this->getAuthenticatedImportableExternalEAPMs(),
            ];
        } else {
            $response = [
                'result' => false,
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function revokeAccess($application)
    {
        if ($application == 'Google') {
            $api = new ExtAPIGoogle();
            return $api->revokeToken();
        }

        return false;
    }

    private function getAuthenticatedImportableExternalEAPMs()
    {
        return ExternalAPIFactory::getModuleDropDown('Import', false, false);
    }
}
