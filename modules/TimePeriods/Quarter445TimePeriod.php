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

/**
 * Implements the fiscal quarter representation of a time period where the monthly
 * leaves are split by the longest month occurring at the end of the quarter
 * @api
 */
class Quarter445TimePeriod extends TimePeriod implements TimePeriodInterface
{
    /**
     * constructor override
     *
     * @param null $start_date date string to set the start date of the quarter time period
     */
    public function __construct($start_date = null)
    {
        parent::__construct();
        //set defaults
        $this->type = 'Quarter445';
        $this->is_fiscal = true;
        $this->date_modifier = '13 week';
    }

    /**
     * build leaves for the timeperiod by creating the specified types of timeperiods
     * @param int $shownBackwardDifference
     * @param int $shownForwardDifference
     * @param $quadrantCt int value of quadrants difference between current and target dates
     * @return array|void
     * @throws Exception
     */
    public function buildLeaves($shownBackwardDifference, $shownForwardDifference, $quadrantCt)
    {
        if ($this->hasLeaves()) {
            throw new Exception('This TimePeriod already has leaves');
        }

        $this->load_relationship('related_timeperiods');

        //1st month
        $leafPeriod = BeanFactory::newBean('MonthTimePeriods');
        $leafPeriod->is_fiscal = true;
        $leafPeriod->setStartDate($this->start_date, 4);
        $leafPeriod->save();
        $this->related_timeperiods->add($leafPeriod->id);
        $leafPeriod->save();

        //create second month leaf
        $leafPeriod = $leafPeriod->createNextTimePeriod(4);
        $this->related_timeperiods->add($leafPeriod->id);
        $leafPeriod->save();

        //create third month leaf, this one gets the extra week
        $leafPeriod = $leafPeriod->createNextTimePeriod(5);
        $this->related_timeperiods->add($leafPeriod->id);
        $leafPeriod->save();

        $this->save();
    }
}
