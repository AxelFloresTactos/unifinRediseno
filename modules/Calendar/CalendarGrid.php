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

class CalendarGrid
{
    protected $cal; // Calendar object
    public $style = ''; // style of calendar (basic or advanced); advanced contains time slots
    protected $today_ts; // timestamp of today
    protected $weekdays; // string array of names of week days
    protected $startday; // first day of week
    protected $scrollable; // scrolling in calendar
    protected $time_step = 30; // time step
    protected $time_format; // user time format
    protected $date_time_format; // user date time format
    protected $scroll_height; // height of scrollable div


    /**
     * constructor
     * @param CalendarBWC $cal
     */
    public function __construct(CalendarBWC $cal)
    {
        global $current_user;
        $this->cal = $cal;
        $today = $GLOBALS['timedate']->getNow(true)->get_day_begin();
        $this->today_ts = $today->format('U') + $today->getOffset();
        $this->startday = $current_user->get_first_day_of_week();

        $weekdays = [];
        for ($i = 0; $i < 7; $i++) {
            $j = $i + $this->startday;
            if ($j >= 7) {
                $j = $j - 7;
            }
            $weekdays[$i] = $GLOBALS['app_list_strings']['dom_cal_day_short'][$j + 1];
        }

        $this->weekdays = $weekdays;

        $this->scrollable = false;
        if (!($this->cal->isPrint() && $this->cal->view == 'day')) {
            if (in_array($this->cal->view, ['day', 'week', 'shared'])) {
                $this->scrollable = true;
                if ($this->cal->time_step < 30) {
                    $this->scroll_height = 480;
                } else {
                    $this->scroll_height = $this->cal->celcount * 15 + 1;
                }
            }
        }

        $this->time_step = $this->cal->time_step;
        $this->time_format = $GLOBALS['timedate']->get_time_format();
        $this->date_time_format = $GLOBALS['timedate']->get_date_time_format();

        $this->style = $this->cal->style;
    }


    /** Get html of calendar grid
     * @return string
     */
    public function display()
    {
        $action = 'display_' . strtolower($this->cal->view);
        return $this->$action();
    }

    /** Get html of time column
     * @param integer $start timestamp
     * @return string
     */
    protected function get_time_column($start)
    {
        $str = '';
        $head_content = '&nbsp;';
        if ($this->cal->view == 'month') {
            if ($this->startday == 0) {
                $wf = 1;
            } else {
                $wf = 0;
            }
            $head_content = "<a href='index.php?module=Calendar&action=index&view=week&hour=0&day="
                . $GLOBALS['timedate']->fromTimestamp($start)->format('j') . '&month='
                . $GLOBALS['timedate']->fromTimestamp($start)->format('n') . '&year='
                . $GLOBALS['timedate']->fromTimestamp($start)->format('Y') . "'>"
                . $GLOBALS['timedate']->fromTimestamp($start + $wf * 3600 * 24)->format('W') . '</a>';
        }
        $str .= "<div class='left_col'>";
        //if(!$this->scrollable)
        //	$str .= "<div class='col_head'>".$head_content."</div>";
        $cell_number = 0;
        $first_cell = $this->cal->scroll_slot;
        $last_cell = $first_cell + $this->cal->celcount - 1;
        for ($i = 0; $i < 24; $i++) {
            for ($j = 0; $j < 60; $j += $this->time_step) {
                if ($j == 0) {
                    $innerText = $GLOBALS['timedate']->fromTimestamp($start + $i * 3600)->format($this->time_format);
                } else {
                    $innerText = '&nbsp;';
                }
                if ($j == 60 - $this->time_step && $this->time_step < 60) {
                    $class = ' odd_border';
                } else {
                    $class = '';
                }
                if ($this->scrollable || ($cell_number >= $first_cell && $cell_number <= $last_cell)) {
                    $str .= "<div class='left_slot" . $class . "'>" . $innerText . '</div>';
                }
                $cell_number++;
            }
        }
        $str .= '</div>';
        return $str;
    }

    /**
     * Get html of day slots column
     * @param integer $start timestamp
     * @param integer $day number of day in week
     * @param string $suffix suffix for id of time slot used in shared view
     * @return string
     */
    protected function get_day_column($start, $day = 0, $suffix = '')
    {
        $curr_time = $start;
        $str = '';
        $str .= "<div class='col'>";
        //$str .= $this->get_day_head($start,$day);
        $cell_number = 0;
        $first_cell = $this->cal->scroll_slot;
        $last_cell = $first_cell + $this->cal->celcount - 1;
        for ($i = 0; $i < 24; $i++) {
            for ($j = 0; $j < 60; $j += $this->time_step) {
                $timestr = $GLOBALS['timedate']->fromTimestamp($curr_time)->format($this->time_format);
                if ($j == 60 - $this->time_step && $this->time_step < 60) {
                    $class = ' odd_border';
                } else {
                    $class = '';
                }
                if ($this->scrollable || ($cell_number >= $first_cell && $cell_number <= $last_cell)) {
                    $str .= "<div id='t_" . $curr_time . $suffix . "' class='slot" . $class . "' time='" . $timestr . "' datetime='" . $GLOBALS['timedate']->fromTimestamp($curr_time)->format($this->date_time_format) . "'></div>";
                }
                $cell_number++;
                $curr_time += $this->time_step * 60;
            }
        }
        $str .= '</div>';
        return $str;
    }

    /**
     * Get html of basic cell
     * @param integer $start timestamp
     * @param integer $height slot height
     * @param string $prefix prefix for id of slot used in shared view
     * @return string
     */
    protected function get_basic_cell($start, $height = 80, $suffix = '')
    {
        $str = '';
        $dt = $GLOBALS['timedate']->fromTimestamp($start)->get('+8 hours');
        $str .= "<div class='col'>";
        $str .= "<div class='basic_slot' id='b_" . $start . $suffix . "' style='height: " . $height . "px;' time='' datetime='" . $dt->format($this->date_time_format) . "'></div>";
        $str .= '</div>';
        return $str;
    }

    /**
     * Get html of basic week grid
     * @param integer $start timestamp
     * @param string $prefix prefix for id of slot used in shared view
     * @return string
     */
    protected function get_basic_row($start, $cols = 7, $suffix = '')
    {

        $height = 20;
        $str = '';
        $head_content = '&nbsp;';
        if ($this->cal->view == 'month' || $this->cal->style == 'basic') {
            $wf = 0;
            if ($this->startday == 0) {
                $wf = 1;
            }
            $head_content = $GLOBALS['timedate']->fromTimestamp($start + $wf * 3600 * 24)->format('W');
            $head_content = "<a href='index.php?module=Calendar&action=index&view=week&hour=0&day="
                . $GLOBALS['timedate']->fromTimestamp($start)->format('j') . '&month='
                . $GLOBALS['timedate']->fromTimestamp($start)->format('n') . '&year='
                . $GLOBALS['timedate']->fromTimestamp($start)->format('Y') . "'>" . $head_content . '</a>';
        }
        $left_col = ($this->style != 'basic' || $this->cal->view == 'month');

        $attr = '';
        if ($this->cal->style != 'basic') {
            $attr = " id='cal-multiday-bar'";
        }

        $str .= '<div>';
        if ($cols > 1) {
            $str .= '<div>';
            if ($left_col) {
                $str .= "<div class='left_col'>";
                $str .= "<div class='col_head'>" . $head_content . '</div>';
                $str .= '</div>';
            }

            $str .= "<div class='week'>";
            for ($d = 0; $d < $cols; $d++) {
                $curr_time = $start + $d * 86400;
                $str .= "<div class='col'>";
                $str .= $this->get_day_head($curr_time, $d, true);
                $str .= '</div>';
            }
            $str .= '</div>';
            $str .= "<br style='clear: left;'/>";
            $str .= '</div>';
        }
        $str .= "<div class='cal-basic' " . $attr . '>';
        if ($left_col) {
            $str .= "<div class='left_col'>";
            $str .= "<div class='left_basic_slot' style='height: " . $height . "px;'>&nbsp;</div>";
            $str .= '</div>';
        }
        $str .= "<div class='week'>";
        for ($d = 0; $d < $cols; $d++) {
            $curr_time = $start + $d * 86400;
            $str .= $this->get_basic_cell($curr_time, $height, $suffix);
        }
        $str .= '</div>';
        $str .= "<div style='clear: left;'></div>";
        $str .= '</div>';
        $str .= '</div>';

        return $str;
    }

    /**
     * Get html of day head
     * @param integer $start timestamp
     * @param integer $day number of day in week
     * @param bulean $force force display header
     * @return string
     */
    protected function get_day_head($start, $day = 0, $force = false)
    {
        $str = '';
        if ($force) {
            $headstyle = '';
            if ($this->today_ts == $start) {
                $headstyle = ' today';
            }
            $str .= "<div class='col_head" . $headstyle
                . "'><a href='index.php?module=Calendar&action=index&view=day&hour=0&day="
                . $GLOBALS['timedate']->fromTimestamp($start)->format('j') . '&month='
                . $GLOBALS['timedate']->fromTimestamp($start)->format('n') . '&year='
                . $GLOBALS['timedate']->fromTimestamp($start)->format('Y') . "'>" . $this->weekdays[$day] . ' '
                . $GLOBALS['timedate']->fromTimestamp($start)->format('d') . '</a></div>';
        }
        return $str;
    }

    /**
     * Get html of week calendar grid
     * @return string
     */
    protected function display_week()
    {

        $basic = $this->style == 'basic';
        $week_start_ts = $this->cal->grid_start_ts;

        $str = '';
        $str .= "<div id='cal-grid' style='visibility: hidden;'>";
        $str .= $this->get_basic_row($week_start_ts);
        if (!$basic) {
            $str .= "<div id='cal-scrollable' style='clear: both; height: " . $this->scroll_height . "px;'>";
            $str .= $this->get_time_column($week_start_ts);
            $str .= "<div class='week'>";
            for ($d = 0; $d < 7; $d++) {
                $curr_time = $week_start_ts + $d * 86400;
                $str .= $this->get_day_column($curr_time);
            }
            $str .= '</div>';
            $str .= "<div style='clear: left;'></div>";
            $str .= '</div>';
        }
        $str .= '</div>';

        return $str;
    }

    /**
     * Get html of day calendar grid
     * @return string
     */
    protected function display_day()
    {

        $basic = $this->style == 'basic';
        $day_start_ts = $this->cal->grid_start_ts;

        $str = '';
        $str .= "<div id='cal-grid' style='visibility: hidden;'>";
        $str .= $this->get_basic_row($day_start_ts, 1);
        if (!$basic) {
            $str .= "<div id='cal-scrollable' style='height: " . $this->scroll_height . "px;'>";
            $str .= $this->get_time_column($day_start_ts);
            $d = 0;
            $curr_time = $day_start_ts + $d * 86400;
            $str .= "<div class='week'>";
            $str .= $this->get_day_column($curr_time);
            $str .= '</div>';
            $str .= "<div style='clear: left;'></div>";
            $str .= '</div>';
        }
        $str .= '</div>';

        return $str;
    }

    /**
     * Get html of month calendar grid
     * @return string
     */
    protected function display_month()
    {
        $basic = $this->style == 'basic';
        $week_start_ts = $this->cal->grid_start_ts;
        $current_date = $this->cal->date_time;
        $month_start = $current_date->get_day_by_index_this_month(0);
        $month_end = $month_start->get('+' . $month_start->format('t') . ' days');
        $week_start = CalendarEventsUtils::getInstance()->get_first_day_of_week($month_start);
        $month_end_ts = $month_end->format('U') + $month_end->getOffset();

        $str = '';
        $str .= "<div id='cal-grid' style='visibility: hidden;'>";
        $curr_time_global = $week_start_ts;
        $w = 0;
        while ($curr_time_global < $month_end_ts) {
            if ($basic) {
                $str .= $this->get_basic_row($curr_time_global);
            } else {
                $str .= $this->get_time_column($curr_time_global);
                $str .= "<div class='week'>";
                for ($d = 0; $d < 7; $d++) {
                    $curr_time = $week_start_ts + $d * 86400 + $w * 60 * 60 * 24 * 7;
                    $str .= $this->get_day_column($curr_time, $d);
                }
                $str .= '</div>';
                $str .= "<div style='clear: left;'></div>";
            }
            $curr_time_global += 60 * 60 * 24 * 7;
            $w++;
        }
        $str .= '</div>';

        return $str;
    }

    /**
     * Get html of week shared grid
     * @return string
     */
    protected function display_shared()
    {

        $basic = $this->style == 'basic';
        $week_start_ts = $this->cal->grid_start_ts;

        $str = '';
        $str .= "<div id='cal-grid' style='visibility: hidden;'>";
        $user_number = 0;

        $shared_user = BeanFactory::newBean('Users');
        foreach ($this->cal->shared_ids as $member_id) {
            $user_number_str = '_' . $user_number;

            $shared_user->retrieve($member_id);
            $str .= "<div style='clear: both;'></div>";
            $str .= "<div class='monthCalBody'><h5 class='calSharedUser'>" . $shared_user->full_name . '</h5></div>';
            $str .= "<div user_id='" . $member_id . "' user_name='" . $shared_user->user_name . "' user_full_name='" . $shared_user->full_name . "'>";

            $str .= $this->get_basic_row($week_start_ts, 7, $user_number_str);
            if (!$basic) {
                $str .= "<div id='cal-scrollable' style='height: " . $this->scroll_height . "px;'>";
                $str .= $this->get_time_column($week_start_ts);
                $str .= "<div class='week'>";
                for ($d = 0; $d < 7; $d++) {
                    $curr_time = $week_start_ts + $d * 86400;
                    $str .= $this->get_day_column($curr_time, $d, $user_number_str);
                }
                $str .= '</div>';
                $str .= "<div style='clear: left;'></div>";
                $str .= '</div>';
            }
            $user_number++;
            $str .= '</div>';
        }
        $str .= '</div>';

        return $str;
    }

    /**
     * Get html of year calendar
     * @return string
     */
    protected function display_year()
    {
        $weekEnd1 = 0 - $this->startday;
        $weekEnd2 = -1 - $this->startday;
        if ($weekEnd1 < 0) {
            $weekEnd1 += 7;
        }
        if ($weekEnd2 < 0) {
            $weekEnd2 += 7;
        }

        $year_start = $GLOBALS['timedate']->fromString($this->cal->date_time->year . '-01-01');

        $str = '';
        $str .= '<table id="daily_cal_table" cellspacing="1" cellpadding="0" border="0" width="100%">';

        for ($m = 0; $m < 12; $m++) {
            $month_start = $year_start->get('+' . $m . ' months');
            $month_start_ts = $month_start->format('U') + $month_start->getOffset();
            $month_end = $month_start->get('+' . $month_start->format('t') . ' days');
            $week_start = CalendarEventsUtils::getInstance()->get_first_day_of_week($month_start);
            $week_start_ts = $week_start->format('U') + $week_start->getOffset(); // convert to timestamp, ignore tz
            $month_end_ts = $month_end->format('U') + $month_end->getOffset();
            $table_id = 'daily_cal_table' . $m; //bug 47471

            if ($m % 3 == 0) {
                $str .= '<tr>';
            }
            $str .= '<td class="yearCalBodyMonth" align="center" valign="top" scope="row">';
            $str .= '<a class="yearCalBodyMonthLink" href="index.php?module=Calendar&action=index'
                . '&view=month&&hour=0&day=1&month=' . ($m + 1) . '&year='
                . $GLOBALS['timedate']->fromTimestamp($month_start_ts)->format('Y') . '">'
                . $GLOBALS['app_list_strings']['dom_cal_month_long'][$m + 1] . '</a>';
            $str .= '<table id="' . $table_id . '" cellspacing="1" cellpadding="0" border="0" width="100%">';
            $str .= '<tr class="monthCalBodyTH">';
            for ($d = 0; $d < 7; $d++) {
                $str .= '<th width="14%">' . $this->weekdays[$d] . '</th>';
            }
            $str .= '</tr>';
            $curr_time_global = $week_start_ts;
            $w = 0;
            while ($curr_time_global < $month_end_ts) {
                $str .= '<tr class="monthViewDayHeight yearViewDayHeight">';
                for ($d = 0; $d < 7; $d++) {
                    $curr_time = $week_start_ts + $d * 86400 + $w * 60 * 60 * 24 * 7;

                    if ($curr_time < $month_start_ts || $curr_time >= $month_end_ts) {
                        $monC = '';
                    } else {
                        $monC = '<a href="index.php?module=Calendar&action=index&view=day'
                            . '&hour=0&day='
                            . $GLOBALS['timedate']->fromTimestamp($curr_time)->format('j')
                            . '&month='
                            . $GLOBALS['timedate']->fromTimestamp($curr_time)->format('n')
                            . '&year='
                            . $GLOBALS['timedate']->fromTimestamp($curr_time)->format('Y')
                            . '">'
                            . $GLOBALS['timedate']->fromTimestamp($curr_time)->format('j')
                            . '</a>';
                    }

                    if ($d == $weekEnd1 || $d == $weekEnd2) {
                        $str .= "<td class='weekEnd monthCalBodyWeekEnd'>";
                    } else {
                        $str .= "<td class='monthCalBodyWeekDay'>";
                    }

                    $str .= $monC;
                    $str .= '</td>';
                }
                $str .= '</tr>';
                $curr_time_global += 60 * 60 * 24 * 7;
                $w++;
            }
            $str .= '</table>';
            $str .= '</td>';
            if (($m - 2) % 3 == 0) {
                $str .= '</tr>';
            }
        }
        $str .= '</table>';

        return $str;
    }
}
