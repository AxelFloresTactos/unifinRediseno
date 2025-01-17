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


class LocalizationsLink extends Link2
{
    /**
     * {@inheritdoc}
     */
    public function buildJoinSugarQuery($sugar_query, $options = [])
    {
        $sugar_query->where()
            ->notEquals('id', $this->focus->id)
            ->notEquals('kbarticle_id', $this->focus->kbarticle_id)
            ->equals('active_rev', 1);

        return $this->relationship->buildJoinSugarQuery($this, $sugar_query, $options);
    }
}
