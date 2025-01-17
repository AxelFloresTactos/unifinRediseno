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
* Class for constructing the iCal response string for the current user.
*
* @see vCal
*/
class iCal extends vCal {

    const UTC_FORMAT = 'Ymd\THi00\Z';

    /**
    * Constructor for the iCal class.
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Gets a UTC formatted string from the given dateTime
    *
    * @param SugarDateTime $dateTime the dateTime to format
    * @return string the UTC formatted dateTime
    */
    protected function getUtcDateTime($dateTime)
    {
        return $dateTime->format(self::UTC_FORMAT);
    }

    /**
    * Gets the UTC formatted dateTime from the given timestamp.
    *
    * Checks the version of Sugar to see if user timezone adjustments are needed.
    *
    * @param integer $ts the timestamp to format
    * @return string the UTC formatted dateTime
    */
    protected function getUtcTime($ts)
    {
        global $timedate, $sugar_version;
        $timestamp = ($ts+(date('Z')-$timedate->adjustmentForUserTimeZone()*60));
        return $this->getUtcDateTime(new SugarDateTime("@" . $ts));
    }

    /**
    * Converts the given number of minutes to formatted number of hours and remaining minutes.
    *
    * @param integer $minutes the number of minutes to format
    * @return string the formatted hours and minutes
    */
    protected function convertMinsToHoursAndMins($minutes)
    {
        $hrs = floor(abs($minutes) / 60);
        $remainderMinutes = abs($minutes) - ($hrs * 60);
        $sign = (($minutes < 0) ? "-" : "+");
        return $sign . str_pad(strval($hrs), 2, "0", STR_PAD_LEFT) . str_pad(strval($remainderMinutes), 2, "0", STR_PAD_LEFT);
    }

    /**
    * Create a todo entry for the given task.
    *
    * @param UserBean $user_bean the current UserBean
    * @param Task $task the task for the todo entry
    * @param string $moduleName the name of the task module
    * @param string $dtstamp the current timestamp
    * @return string the todo entry for the task
    */
    protected function createSugarIcalTodo($user_bean, $task, $moduleName, $dtstamp)
    {
        global $sugar_config;
        $ical_array = array();
        $ical_array[] = array("BEGIN", "VTODO");
        $validDueDate = (isset($task->date_due) && $task->date_due != "" && $task->date_due != "0000-00-00");
        $validDueTime = (isset($task->time_due) && $task->time_due != "");
        $dueYear = 1970;
        $dueMonth = 1;
        $dueDay = 1;
        $dueHour = 0;
        $dueMin = 0;
        if ($validDueDate) {
            $dateDueArr = explode("-", $task->date_due);
            $dueYear = (int)$dateDueArr[0];
            $dueMonth = (int)$dateDueArr[1];
            $dueDay = (int)$dateDueArr[2];

            if ($validDueTime) {
                $timeDueArr = explode(":", $task->time_due);
                $dueHour = (int)$timeDueArr[0];
                $dueMin = (int)$timeDueArr[1];
            }
        }
        $date_arr = array(
             'day'=>$dueDay,
             'month'=>$dueMonth,
             'hour'=>$dueHour,
             'min'=>$dueMin,
             'year'=>$dueYear);
        $due_date_time = new SugarDateTime();
        $due_date_time->setDate($dueYear, $dueMonth, $dueDay);
        $due_date_time->setTime($dueHour, $dueMin);
        $ical_array[] = array(
            "DTSTART;TZID=" . $user_bean->getPreference('timezone'),
            str_replace("Z", "", $this->getUtcDateTime($due_date_time))
        );
        $ical_array[] = array("DTSTAMP", $dtstamp);
        $ical_array[] = array("SUMMARY", $task->name);
        $ical_array[] = array("UID", $task->id);
        if ($validDueDate) {
            $iCalDueDate = str_replace("-", "", $task->date_due);
            if (strlen($iCalDueDate) > 8) {
                $iCalDueDate = substr($iCalDueDate, 0, 8);
            }
            $ical_array[] = array("DUE;VALUE=DATE", $iCalDueDate);
        }
        if ($moduleName == "ProjectTask") {
            $ical_array[] = array(
                "DESCRIPTION:Project",
                $task->project_name . vCal::EOL . vCal::EOL . $task->description
            );
        } else {
            $ical_array[] = array("DESCRIPTION", $task->description);
        }
        $ical_array[] = array(
            "URL;VALUE=URI",
            $sugar_config['site_url']."/index.php?module=".$moduleName."&action=DetailView&record=".$task->id
        );
        if ($task->status == 'Completed') {
            $ical_array[] = array("STATUS", "COMPLETED");
            $ical_array[] = array("PERCENT-COMPLETE", "100");
            $ical_array[] = array("COMPLETED", $this->getUtcDateTime($due_date_time));
        } else if (!empty($task->percent_complete)) {
            $ical_array[] = array("PERCENT-COMPLETE", $task->percent_complete);
        }
        if ($task->priority == "Low") {
            $ical_array[] = array("PRIORITY", "9");
        } else if ($task->priority == "Medium") {
                $ical_array[] = array("PRIORITY", "5");
        } else if ($task->priority == "High") {
                $ical_array[] = array("PRIORITY", "1");
        }
        $ical_array[] = array("END", "VTODO");
        return vCal::create_ical_string_from_array($ical_array);
    }

    /**
    * Creates the string for the user's events and todos between the given start
    * and end times
    *
    * @param UserBean $user_bean the current UserBean
    * @param DateTime $start_date_time the start date to search from
    * @param DateTime $end_date_time the end date to search to
    * @param string $dtstamp the current timestamp
    * @return string the entries for events and todos
    */
    protected function createSugarIcal(&$user_bean,&$start_date_time,&$end_date_time, $dtstamp)
    {
        $ical_array = array();
        global $DO_USER_TIME_OFFSET, $sugar_config, $current_user, $timedate;

        $hide_calls = false;
        if (!empty($_REQUEST['hide_calls']) && $_REQUEST['hide_calls'] == "true")
        {
            $hide_calls = true;
        }

        $taskAsVTODO = true;
        if (!empty($_REQUEST['show_tasks_as_events']) && ($_REQUEST['show_tasks_as_events'] == "1"  || $_REQUEST['show_tasks_as_events'] == "true"))
        {
            $taskAsVTODO = false;
        }

        $acts_arr = CalendarActivity::get_activities($user_bean->id,
            !$taskAsVTODO,
            $start_date_time,
            $end_date_time,
            'month',
            !$hide_calls);


        // loop thru each activity, get start/end time in UTC, and return iCal strings
        foreach($acts_arr as $act)
        {

            $event = $act->sugar_bean;
            if (!$hide_calls || ($hide_calls && $event->object_name != "Call"))
            {
                $ical_array[] = array("BEGIN", "VEVENT");
                $ical_array[] = array("SUMMARY", $event->name);
                $ical_array[] = array(
                    "DTSTART;TZID=" . $user_bean->getPreference('timezone'),
                    str_replace(
                        "Z",
                        "",
                        $timedate->tzUser($act->start_time, $current_user)->format(self::UTC_FORMAT)
                    )
                );
                $ical_array[] = array(
                    "DTEND;TZID=" . $user_bean->getPreference('timezone'),
                    str_replace(
                        "Z",
                        "",
                        $timedate->tzUser($act->end_time, $current_user)->format(self::UTC_FORMAT)
                    )
                );
                $ical_array[] = array("DTSTAMP", $dtstamp);
                $ical_array[] = array("DESCRIPTION", $event->description);
                $ical_array[] = array(
                    "URL;VALUE=URI",
                    $sugar_config['site_url']."/index.php?module=".
                    $event->module_dir."&action=DetailView&record=". $event->id
                );
                $ical_array[] = array("UID", $event->id);
                if ($event->object_name == "Meeting")
                {
                    $ical_array[] = array("LOCATION", $event->location);
                    $eventUsers = $event->get_meeting_users();
                    $query = "SELECT contact_id as id from meetings_contacts where meeting_id='$event->id' AND deleted=0";
                    $eventContacts = $event->build_related_list($query, BeanFactory::newBean('Contacts'));
                    $eventAttendees = array_merge($eventUsers, $eventContacts);
                    if (is_array($eventAttendees))
                    {
                        foreach($eventAttendees as $attendee)
                        {
                            if ($attendee->id != $user_bean->id && !empty($attendee->email1))
                            {
                                // Define the participant status
                                $participant_status = '';
                                if (!empty($attendee->accept_status)) {
                                    switch ($attendee->accept_status) {
                                        case 'accept':
                                            $participant_status = ';PARTSTAT=ACCEPTED';
                                            break;
                                        case 'decline':
                                            $participant_status = ';PARTSTAT=DECLINED';
                                            break;
                                        case 'tentative':
                                            $participant_status = ';PARTSTAT=TENTATIVE';
                                            break;
                                    }
                                }
                                $ical_array[] = array(
                                    'ATTENDEE'.$participant_status.';CN="'.$attendee->get_summary_text().'"',
                                    'mailto:'.(!empty($attendee->email1) ? $attendee->email1:'none@none.tld')
                                );
                            }
                        }
                    }
                }
                if ($event->object_name == "Call")
                {
                    $eventUsers = $event->get_call_users();
                    $eventContacts = $event->get_contacts();
                    $eventAttendees = array_merge($eventUsers, $eventContacts);
                    if (is_array($eventAttendees))
                    {
                        foreach($eventAttendees as $attendee)
                        {
                            if ($attendee->id != $user_bean->id && !empty($attendee->email1))
                            {
                                // Define the participant status
                                $participant_status = '';
                                if (!empty($attendee->accept_status)) {
                                    switch ($attendee->accept_status) {
                                        case 'accept':
                                            $participant_status = ';PARTSTAT=ACCEPTED';
                                            break;
                                        case 'decline':
                                            $participant_status = ';PARTSTAT=DECLINED';
                                            break;
                                        case 'tentative':
                                            $participant_status = ';PARTSTAT=TENTATIVE';
                                            break;
                                    }
                                }
                                $ical_array[] = array(
                                    'ATTENDEE'.$participant_status.';CN="'.$attendee->get_summary_text().'"',
                                    'mailto:'.(!empty($attendee->email1) ? $attendee->email1:'none@none.tld')
                                );
                            }
                        }
                    }
                }
                if (isset($event->reminder_time) && $event->reminder_time > 0 && $event->status != "Held")
                {
                    $ical_array[] = array("BEGIN", "VALARM");
                    $ical_array[] = array("TRIGGER", "-PT");
                    $ical_array[] = array("ACTION", "DISPLAY");
                    $ical_array[] = array("DESCRIPTION", $event->name);
                    $ical_array[] = array("END", "VALARM");
                }
                $ical_array[] = array("END", "VEVENT");
            }

        }

        $str = vCal::create_ical_string_from_array($ical_array);

        $timedate = new TimeDate();
        $today = gmdate("Y-m-d");
        $today = $timedate->handle_offset($today, $timedate->dbDayFormat, false);

        require_once('modules/ProjectTask/ProjectTask.php');
        $where = "project_task.assigned_user_id='{$user_bean->id}' ".
            "AND (project_task.status IS NULL OR (project_task.status!='Deferred')) ".
            "AND (project_task.date_start IS NULL OR " . CalendarActivity::get_occurs_within_where_clause('project_task', '', $start_date_time, $end_date_time, 'date_start', 'month') . ")";
        $seedProjectTask = BeanFactory::newBean('ProjectTask');
        $projectTaskList = $seedProjectTask->get_full_list("", $where);
        if (is_array($projectTaskList))
        {
            foreach($projectTaskList as $projectTask)
            {
                $str .= $this->createSugarIcalTodo($user_bean, $projectTask, "ProjectTask", $dtstamp);
            }
        }

        if ($taskAsVTODO) {
            $where = "tasks.assigned_user_id='{$user_bean->id}' ".
                "AND (tasks.status IS NULL OR (tasks.status!='Deferred')) ".
                "AND (tasks.date_start IS NULL OR " . CalendarActivity::get_occurs_within_where_clause('tasks', '', $start_date_time, $end_date_time, 'date_start', 'month') . ")";
            $seedTask = BeanFactory::newBean('Tasks');
            $taskList = $seedTask->get_full_list("", $where);
            if (is_array($taskList))
            {
                foreach($taskList as $task)
                {
                    $str .= $this->createSugarIcalTodo($user_bean, $task, "Tasks", $dtstamp);
                }
            }
        }

        return $str;
    }

    /**
    * Gets the daylight savings range for the given user.
    *
    * @param User $current_user the user
    * @param integer $year the year
    * @return array the start and end transitions of daylight savings
    */
    protected function getDSTRange($current_user, $year)
    {
        $tz = $current_user->getTimezone();
        $idx = 0;
        $result = array();

        $year_date = SugarDateTime::createFromFormat("Y", $year, new DateTimeZone("UTC"));
        $year_end = clone $year_date;
        $year_end->setDate((int) $year, 12, 31);
        $year_end->setTime(23, 59, 59);
        $year_date->setDate((int) $year, 1, 1);
        $year_date->setTime(0, 0, 0);

        $transitions = $tz->getTransitions($year_date->getTimestamp(), $year_end->getTimestamp());
        foreach (safeIsIterable($transitions) ? $transitions : [] as $transition) {
            if ($transition['isdst']) {
                    break;
                }
                $idx++;
        }

        if (empty($transitions[$idx]["isdst"])) {
            // No DST transitions found
            return $result;
        }
        $result["start"] = $transitions[$idx]; // DST begins here
        // scan till DST ends
        while (isset($transitions[$idx]) && $transitions[$idx]["isdst"]) $idx++;
        if(isset($transitions[$idx])) {
            $result["end"] = $transitions[$idx];
        }
        return $result;
    }

    /**
    * Gets the timezone string for the current user.
    *
    * @return array the full timezone definition including daylight savings for the iCal
    */
    protected function getTimezoneArray()
    {
        global $current_user, $timedate;
        $timezoneName = $current_user->getPreference('timezone');

        $gmtTZ = new DateTimeZone("UTC");
        $dstRange = $this->getDSTRange($current_user, date('Y'));

        $dstOffset = 0;
        $gmtOffset = 0;

        $ical_array = array();
        $ical_array[] = array("BEGIN", "VTIMEZONE");
        $ical_array[] = array("TZID", $timezoneName);
        $ical_array[] = array("X-LIC-LOCATION", $timezoneName);

        if (array_key_exists('start', $dstRange))
        {
            $dstOffset = ($dstRange['start']['offset'] / 60);
            $startDate = new DateTime("@" . $dstRange["start"]["ts"], $gmtTZ);
            $startstamp = strtotime($timedate->asDb($startDate));
            $ical_array[] = array("BEGIN", "DAYLIGHT");
            $ical_array[] = array("TZOFFSETFROM", $this->convertMinsToHoursAndMins($gmtOffset));
            $ical_array[] = array("TZOFFSETTO", $this->convertMinsToHoursAndMins($dstOffset));
            $ical_array[] = array("DTSTART", str_replace("Z", "", $this->getUtcTime($startstamp)));
            $ical_array[] = array("END", "DAYLIGHT");
        }

        if (array_key_exists('end', $dstRange))
        {
            $gmtOffset = ($dstRange['end']['offset'] / 60);
            $endDate = new DateTime("@" . $dstRange["end"]["ts"], $gmtTZ);
            $endstamp = strtotime($timedate->asDb($endDate));
            $ical_array[] = array("BEGIN", "STANDARD");
            $ical_array[] = array("TZOFFSETFROM", $this->convertMinsToHoursAndMins($dstOffset));
            $ical_array[] = array("TZOFFSETTO", $this->convertMinsToHoursAndMins($gmtOffset));
            $ical_array[] = array("DTSTART", str_replace("Z", "", $this->getUtcTime($endstamp)));
            $ical_array[] = array("END", "STANDARD");
        }

        $ical_array[] = array("END", "VTIMEZONE");

        return $ical_array;
    }

    /**
    * Generates the complete string for the calendar
    *
    * @param User $user_focus the user
    * @param integer $num_months the number of months to search before and after today
    * @return string the iCal calenar string
    */
    function getVcalIcal(&$user_focus, $num_months)
    {
        global $current_user, $timedate;
        $current_user = $user_focus;

        $cal_name = $user_focus->first_name. " ". $user_focus->last_name;

        $ical_array = array();
        $ical_array[] = array("BEGIN", "VCALENDAR");
        $ical_array[] = array("VERSION", "2.0");
        $ical_array[] = array("METHOD", "PUBLISH");
        $ical_array[] = array("X-WR-CALNAME", "$cal_name (SugarCRM)");
        $ical_array[] = array("PRODID", "-//SugarCRM//SugarCRM Calendar//EN");
        $tz_array = $this->getTimezoneArray();
        foreach ($tz_array as $value) {
            $ical_array[] = array($value[0], $value[1]);
        }
        $ical_array[] = array("CALSCALE", "GREGORIAN");

        $now_date_time = $timedate->getNow(true);

        global $sugar_config;
        $timeOffset = 2;
        if (isset($sugar_config['vcal_time']) && $sugar_config['vcal_time'] != 0 && $sugar_config['vcal_time'] < 13)
        {
            $timeOffset = $sugar_config['vcal_time'];
        }
        if (!empty($num_months))
        {
            $timeOffset = $num_months;
        }
        $start_date_time = $now_date_time->get("-$timeOffset months");
        $end_date_time = $now_date_time->get("+$timeOffset months");

        $utc_now_time = $this->getUtcDateTime($now_date_time);

        $str = vCal::create_ical_string_from_array($ical_array);

        $str .= $this->createSugarIcal($user_focus,$start_date_time,$end_date_time,$utc_now_time);

        $ical_array = array(
            array("DTSTAMP", $utc_now_time)
        );
        $ical_array[] = array("END", "VCALENDAR");

        $str .= vCal::create_ical_string_from_array($ical_array);

        return $str;
    }

}
