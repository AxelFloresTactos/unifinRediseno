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


use Sugarcrm\Sugarcrm\AccessControl\AdminWork;

require_once( 'include/utils/progress_bar_utils.php' );
require_once( 'include/utils/zip_utils.php' );

global $current_user;


if (!is_admin($current_user)) sugar_die("Unauthorized access to administration.");
if (isset($GLOBALS['sugar_config']['hide_admin_diagnostics']) && $GLOBALS['sugar_config']['hide_admin_diagnostics'])
{
    sugar_die("Unauthorized access to diagnostic tool.");
}


global $skip_md5_diff;
$skip_md5_diff = false;

set_time_limit(3600);
// get all needed globals
global $app_strings;
global $app_list_strings;
global $mod_strings;



global $db;
if(empty($db)) {

	$db = DBManagerFactory::getInstance();
}

global $current_user;
if(!is_admin($current_user)){
	die($mod_strings['LBL_DIAGNOSTIC_ACCESS']);
}
global $sugar_config;
global $beanFiles;



//get sugar version and flavor
global $sugar_version;
global $sugar_flavor;


//guid used for directory path
global $sod_guid;
$sod_guid = create_guid();

//GET CURRENT DATETIME STAMP TO USE IN FILENAME
global $curdatetime;
$curdatetime = date("Ymd-His");


global $progress_bar_percent;
$progress_bar_percent = 0;
global $totalweight;
$totalweight = 0;
global $totalitems;
$totalitems = 0;
global $currentitems;
$currentitems = 0;
define("CONFIG_WEIGHT", 1);
define("CUSTOM_DIR_WEIGHT", 1);
define("PHPINFO_WEIGHT", 1);
define("SQL_DUMPS_WEIGHT", 2);
define("SQL_SCHEMA_WEIGHT", 3);
define("SQL_INFO_WEIGHT", 1);
define("MD5_WEIGHT", 5);
define("BEANLISTBEANFILES_WEIGHT", 1);
define("SUGARLOG_WEIGHT", 2);
define("MLPLOG_WEIGHT", 2);
define("VARDEFS_WEIGHT", 2);

//THIS MUST CHANGE IF THE NUMBER OF DIRECTORIES TRAVERSED TO GET TO
//   THE DIAGNOSTIC CACHE DIR CHANGES
define("RETURN_FROM_DIAG_DIR", "../../../..");

global $getDumpsFrom;
$getDumpsFrom = Array();

global $cacheDir;
$cacheDir = "";

function sodUpdateProgressBar($itemweight){
    global $progress_bar_percent;
    global $totalweight;
    global $totalitems;
    global $currentitems;

    $currentitems++;
    if($currentitems == $totalitems)
      update_progress_bar("diagnostic", 100, 100);
    else
    {
      $progress_bar_percent += ($itemweight / $GLOBALS['totalweight'] * 100);
      update_progress_bar("diagnostic", $progress_bar_percent, 100);
    }
}


/**
 * Dump table as array
 * @param  $header string table header
 * @param  $values array list of values
 * @return string
 */
function array_as_table($header, $values)
{
    $contents = "<table border=\"0\" cellpadding=\"0\" class=\"tabDetailView\">";
    $keys = array();
    foreach($values as $field) {
        $keys = array_unique($keys + array_keys($field));
    }
    $cols = count($keys);

    $contents .= "<tr colspan=\"$cols\">$header</tr><tr>";
    foreach($keys as $key) {
       $contents .= "<th class=\"tabDetailViewDL\"><b>$key</b></th>";
    }
    $contents .= "</tr>";
    foreach($values as $field) {
        $contents .= "<tr>";
        foreach($field as $item) {
            if(is_array($item)) {
                $item = join(",", $item);
            }
            $contents .= "<td class=\"tabDetailViewDF\">$item</td>";
        }
        $contents .= "</tr>";
    }
    $contents .= "</table>";
    return $contents;
}

// expects a string containing the name of the table you would like to get the dump of
// expects there to already be a connection to the db and the 'use database_name' to be done
// returns a string containing (in html) the dump of all rows
function getFullTableDump($tableName){

	global $db, $mod_strings;

    $cols = $db->get_columns($tableName);
    $indexes = $db->get_indices($tableName);
    $returnString = "";
    //setting up table header for each file
    $returnString .= array_as_table("{$db->dbName} $tableName " . $mod_strings['LBL_DIAGNOSTICS_FULLTABLEDUMP_DEFINITIONS'] . ":", $cols);
    $returnString .= array_as_table("{$db->dbName} $tableName " . $mod_strings['LBL_DIAGNOSTICS_FULLTABLEDUMP_KEYS'] . ":", $indexes);
    $returnString .= "<BR><BR>";

    $def_count = is_countable($cols) ? count($cols) : 0;

	$td_result = $db->query("select * from ".$tableName);
    if(!$td_result) {
        return $db->lastError();
    }
    $returnString .= "<table border=\"0\" cellpadding=\"0\" class=\"tabDetailView\"><tr><th class=\"tabDetailViewDL\">#</th>";
    $fields = $db->getFieldsArray($td_result);
    foreach($fields as $field) {
        $returnString .= "<th class=\"tabDetailViewDL\">$field</th>";

    }
    $returnString .= "</tr>";
    $row_counter = 1;
	while($row = $db->fetchByAssoc($td_result))
	{
		$row = array_values($row);
		$returnString .= "<tr>";
		$returnString .= "<td class=\"tabDetailViewDL\">".$row_counter."</td>";
		for($counter = 0; $counter < $def_count; $counter++) {
            $replace_val = false;
			//perform this check when counter is set to two, which means it is on the 'value' column
			if($counter == 2) {
				//if the previous "name" column value was set to smtppass, set replace_val to true
				if(strcmp($row[$counter - 1], "smtppass") == 0  )
					$replace_val = true;

				//if the previous "name" column value was set to smtppass,
				//and the "category" value set to ldap, set replace_val to true
				if (strcmp($row[$counter - 2], "ldap") == 0 && strcmp($row[$counter - 1], "admin_password") == 0)
					$replace_val = true;

				//if the previous "name" column value was set to password,
				//and the "category" value set to proxy, set replace_val to true
				if(strcmp($row[$counter - 2], "proxy") == 0 && strcmp($row[$counter - 1], "password") == 0 )
					$replace_val = true;
			}

			if($replace_val) {
					$returnString .= "<td class=\"tabDetailViewDF\">********</td>";
            } else {
					$returnString .= "<td class=\"tabDetailViewDF\">".($row[$counter] == "" ? "&nbsp;" : $row[$counter])."</td>";
			}
	    }
        $row_counter++;
        $returnString .= "</tr>";
    }
	$returnString .= "</table>";

	return $returnString;
}

// Deletes the directory recursively
function deleteDir($dir)
{
   if (substr($dir, strlen($dir)-1, 1) != '/')
       $dir .= '/';

   if ($handle = opendir($dir))
   {
       while ($obj = readdir($handle))
       {
           if ($obj != '.' && $obj != '..')
           {
               if (is_dir($dir.$obj))
               {
                   if (!deleteDir($dir.$obj))
                       return false;
               }
               elseif (is_file($dir.$obj))
               {
                   if (!unlink($dir.$obj))
                       return false;
               }
           }
       }

       closedir($handle);

       if (!@rmdir($dir))
           return false;
       return true;
   }
   return false;
}


function prepareDiag()
{
	global $getDumpsFrom;
	global $cacheDir;
	global $curdatetime;
	global $progress_bar_percent;
	global $skip_md5_diff;
	global $sod_guid;
	global $mod_strings;

	echo getClassicModuleTitle(
        "Administration",
        array(
            "<a href='#Administration'>{$mod_strings['LBL_MODULE_NAME']}</a>",
           translate('LBL_DIAGNOSTIC_TITLE')
           ),
        false
        );
	echo "<BR>";
	echo $mod_strings['LBL_DIAGNOSTIC_EXECUTING'];
	echo "<BR>";


	//determine if files.md5 exists or not
	if(file_exists('files.md5'))
		$skip_md5_diff = false;
	else
		$skip_md5_diff = true;

	// array of all tables that we need to pull rows from below
	$getDumpsFrom = array('config' => 'config',
	                      'fields_meta_data' => 'fields_meta_data',
	                      'upgrade_history' => 'upgrade_history',
	                      'versions' => 'versions',
	                      );


	//Creates the diagnostic directory in the cache directory
    $cacheDir = create_cache_directory("diagnostic/");
    $cacheDir = create_cache_directory("diagnostic/".$sod_guid);
    $cacheDir = create_cache_directory("diagnostic/".$sod_guid."/diagnostic".$curdatetime."/");

	display_progress_bar("diagnostic", $progress_bar_percent, 100);

	ob_flush();
}

function executesugarlog()
{
    //BEGIN COPY SUGARCRM.LOG
    //Copies the Sugarcrm log to our diagnostic directory
    global $cacheDir, $mod_strings;
	$logger = new SugarLogger();
    if(!copy($logger->getLogFileNameWithPath(), $cacheDir.'/'.$logger->getLogFileName())) {
        $data = array($cacheDir);
        echo string_format($mod_strings['LBL_DIAGNOSTICS_ERROR_SUGARLOG'], $data);
    }
    //END COPY SUGARCRM.LOG

    //UPDATING PROGRESS BAR
    sodUpdateProgressBar(SUGARLOG_WEIGHT);
}

function executemlplog()
{
    global $cacheDir, $mod_strings;
    $logger = new SugarLogger();
    $logPath = dirname($logger->getLogFileNameWithPath()) . '/package_install.log';
    if (!copy($logPath, $cacheDir . '/package_install.log')) {
        $data = array($cacheDir);
        echo string_format($mod_strings['LBL_DIAGNOSTICS_ERROR_MLPLOG'], $data);
    }
    sodUpdateProgressBar(MLPLOG_WEIGHT);
}
function executephpinfo()
{
    //BEGIN GETPHPINFO
    //This gets phpinfo, writes to a buffer, then I write to phpinfo.html
    global $cacheDir, $mod_strings;

    ob_start();
    phpinfo();
    $phpinfo = ob_get_contents();
    ob_clean();

    $handle = sugar_fopen($cacheDir."phpinfo.html", "w");
    if(fwrite($handle, $phpinfo) === FALSE){
        $data = array($cacheDir);
        echo string_format($mod_strings['LBL_DIAGNOSTICS_ERROR_PHPINFO'], $data);
    }
    fclose($handle);
    //END GETPHPINFO

    //UPDATING PROGRESS BAR
    sodUpdateProgressBar(PHPINFO_WEIGHT);
}

function executeconfigphp()
{
    //BEGIN COPY CONFIG.PHP
    //store db_password in temp var so we can get config.php w/o making anyone angry
    global $cacheDir;    global $sugar_config;

    $maskedConfig = getConfigWithMaskedPasswords($sugar_config);
    //write config.php to a file
    write_array_to_file("Diagnostic", $maskedConfig, $cacheDir."config.php");
    //END COPY CONFIG.PHP

    //UPDATING PROGRESS BAR
    sodUpdateProgressBar(CONFIG_WEIGHT);
}

function execute_sql($getinfo, $getdumps, $getschema)
{
    //BEGIN GET DB INFO
    global $getDumpsFrom;
    global $curdatetime;
    global $sod_guid;
    global $db;

    $sqlInfoDir = create_cache_directory("diagnostic/".$sod_guid."/diagnostic".$curdatetime."/{$db->dbName}/");


    //create directory for table definitions
    if($getschema)
      $tablesSchemaDir = create_cache_directory("diagnostic/".$sod_guid."/diagnostic".$curdatetime."/{$db->dbName}/TableSchema/");

    //make sure they checked the box to get basic info
    if($getinfo)
    {
        $info = $db->getDbInfo();
        $content = '';
        if(!empty($info)) {
            foreach($info as $name => $value) {
                $content .= "$name: $value<BR>";
            }
        }
        if(!empty($content)) {
            file_put_contents($sqlInfoDir."{$db->dbName}-General-info.html", $content);
            sodUpdateProgressBar(SQL_INFO_WEIGHT);
        }
    }

    $style = '<style>
.tabDetailView
{
    border-bottom:2px solid;
    border-top:2px solid;
    margin-bottom:10px;
    margin-top:2px;
    border-bottom-color:#ABC3D7;
    border-top-color:#4E8CCF;
}

.tabDetailView td table td
{
    border: 0;
    background: white;
}

.tabDetailView tr.pagination td
{
    padding-top: 4px;
    padding-bottom: 4px;
    border-bottom:1px solid #CBDAE6;
}

.tabDetailView tr.pagination td table td
{
    border: none;
}

.tabDetailViewDL
{
    background-color:#F6F6F6;
    color:#000000;
    border-bottom:1px solid #CBDAE6;
    font-size:12px;
    padding:5px 6px;
    text-align:left;
    vertical-align:top;
}

.tabDetailViewDF
{
    background-color:#FFFFFF;
    color:#444444;
    border-bottom:1px solid #CBDAE6;
    font-size:12px;
    padding:5px 10px 5px 8px;
    vertical-align:top;
}

.listViewThS1
{
    background:#EBEBED none repeat scroll 0 0;
    border-color:#CCCCCC -moz-use-text-color;
    border-style:solid none;
    border-width:1px medium;
    font-size:11px;
    font-weight:bold;
    padding:4px 5px;
    text-align:left;
}
    </style>';
    if($getschema)
    {
        //BEGIN GET ALL TABLES SCHEMAS
        $all_tables = $db->getTablesArray();

        $contents = $style;

        foreach($all_tables as $tablename){
            $cols = $db->get_columns($tablename);
            $indexes = $db->get_indices($tablename);
			//setting up table header for each file
            $contents .= array_as_table("{$db->dbName} $tablename Definitions:", $cols);
            $contents .= array_as_table("{$db->dbName} $tablename Keys:", $indexes);
			$contents .= "<BR><BR>";
		}

        file_put_contents($tablesSchemaDir."{$db->dbName}TablesSchema.html", $contents);
		//END GET ALL TABLES SCHEMAS
		//BEGIN UPDATING PROGRESS BAR
		sodUpdateProgressBar(SQL_SCHEMA_WEIGHT);
		//END UPDATING PROGRESS BAR
    }

    if($getdumps)
    {
		//BEGIN GET TABLEDUMPS
		$tableDumpsDir = create_cache_directory("diagnostic/".$sod_guid."/diagnostic".$curdatetime."/{$db->dbName}/TableDumps/");


		foreach ($getDumpsFrom as $table)
		{
			//calling function defined above to get the string for dump
			$contents = $style .getFullTableDump($table);
            file_put_contents($tableDumpsDir.$table.".html", $contents);
		}
		//END GET TABLEDUMPS
		//BEGIN UPDATING PROGRESS BAR
		sodUpdateProgressBar(SQL_DUMPS_WEIGHT);
		//END UPDATING PROGRESS BAR
	}
    //END GET DB INFO
}


function executebeanlistbeanfiles()
{
    //BEGIN CHECK BEANLIST FILES ARE AVAILABLE
    global $cacheDir;
    global $beanList;
    global $beanFiles;
    global $mod_strings;

    ob_start();

    echo $mod_strings['LBL_DIAGNOSTIC_BEANLIST_DESC'];
    echo "<BR>";
    echo "<font color=green>";
    echo $mod_strings['LBL_DIAGNOSTIC_BEANLIST_GREEN'];
    echo "</font>";
    echo "<BR>";
    echo "<font color=orange>";
    echo $mod_strings['LBL_DIAGNOSTIC_BEANLIST_ORANGE'];
    echo "</font>";
    echo "<BR>";
    echo "<font color=red>";
    echo $mod_strings['LBL_DIAGNOSTIC_BEANLIST_RED'];
    echo "</font>";
    echo "<BR><BR>";

	foreach ($beanList as $beanz)
	{
		if(!isset($beanFiles[$beanz]))
		{
            $data = array($beanz);
			echo "<font color=orange>" . string_format($mod_strings['LBL_DIAGNOSTICS_LISTBEANFILES_NOT_INDEX'], $data) . "</font><br>";
		}
		else
		{
            $data = array($beanz, $beanFiles[$beanz]);
			if(file_exists($beanFiles[$beanz]))
            {
				echo "<font color=green>" . string_format($mod_strings['LBL_DIAGNOSTICS_LISTBEANFILES_EXISTS'], $data) . "</font><br>";
            }
			else
            {
				echo "<font color=red>" . string_format($mod_strings['LBL_DIAGNOSTICS_LISTBEANFILES_NOT_EXISTS'], $data) . "</font><br>";
            }
		}
	}

	$content = ob_get_contents();
	ob_clean();
	$handle = sugar_fopen($cacheDir."beanFiles.html", "w");
	if(fwrite($handle, $content) === FALSE){
        $data = array($cacheDir);
        echo string_format($mod_strings['LBL_DIAGNOSTICS_ERROR_LISTBEANFILES'], $data);
    }
    fclose($handle);
    //END CHECK BEANLIST FILES ARE AVAILABLE
    //BEGIN UPDATING PROGRESS BAR
    sodUpdateProgressBar(BEANLISTBEANFILES_WEIGHT);
    //END UPDATING PROGRESS BAR
}

function executecustom_dir()
{
    //BEGIN ZIP AND SAVE CUSTOM DIRECTORY
    global $cacheDir;

    zip_dir("custom", $cacheDir."custom_directory.zip");
    //END ZIP AND SAVE CUSTOM DIRECTORY
    //BEGIN UPDATING PROGRESS BAR
    sodUpdateProgressBar(CUSTOM_DIR_WEIGHT);
    //END UPDATING PROGRESS BAR
}

function executemd5($filesmd5, $md5calculated)
{
    $md5_string = null;
	//BEGIN ALL MD5 CHECKS
	global $curdatetime, $skip_md5_diff, $sod_guid, $mod_strings;

	if(file_exists('files.md5'))
        include( 'files.md5');
	//create dir for md5s
	$md5_directory = create_cache_directory("diagnostic/".$sod_guid."/diagnostic".$curdatetime."/md5/");

	//skip this if the files.md5 didn't exist
	if(!$skip_md5_diff)
	{
		//make sure the files.md5
		if($filesmd5)
			if(!copy('files.md5', $md5_directory."files.md5"))
            {
                $data = array($md5_directory);
				echo string_format($mod_strings['LBL_DIAGNOSTICS_ERROR_MD5'], $data);
            }
	}

	$md5_string_calculated = generateMD5array('./');

	if($md5calculated)
		write_array_to_file('md5_string_calculated', $md5_string_calculated, $md5_directory."md5_array_calculated.php");


	//if the files.md5 didn't exist, we can't do this
	if(!$skip_md5_diff)
	{
		$md5_string_diff = array_diff($md5_string_calculated, $md5_string);

		write_array_to_file('md5_string_diff', $md5_string_diff, $md5_directory."md5_array_diff.php");
	}
	//END ALL MD5 CHECKS
    //BEGIN UPDATING PROGRESS BAR
    sodUpdateProgressBar(MD5_WEIGHT);
    //END UPDATING PROGRESS BAR
}

function executevardefs()
{
    // enable full access control
    $adminWork = new AdminWork();
    $adminWork->startAdminWork();
    //BEGIN DUMP OF SUGAR SCHEMA (VARDEFS)

    //END DUMP OF SUGAR SCHEMA (VARDEFS)
    //BEGIN UPDATING PROGRESS BAR
    //This gets the vardefs, writes to a buffer, then I write to vardefschema.html
    global $cacheDir;
    global $beanList;
    global $beanFiles;
    global $dictionary;
    global $sugar_version;
    global $sugar_db_version;
    global $sugar_flavor;
    global $mod_strings;

    ob_start();
    foreach ( $beanList as $beanz ) {
      // echo "Module: ".$beanz."<br>";

	$path_parts = pathinfo( $beanFiles[ $beanz ] );
	$vardefFileName = $path_parts[ 'dirname' ]."/vardefs.php";
	  if( file_exists( $vardefFileName )) {
	    // echo "<br>".$vardefFileName."<br>";
      }
      include_once( $vardefFileName );
    }

    echo "<html lang='en'>";
    echo "<BODY>";
    echo $mod_strings['LBL_DIAGNOSTICS_VARDEFS_SCHEMA_LISTING'];
    $versionData = array($sugar_version, $sugar_db_version, $sugar_flavor);
    echo string_format($mod_strings['LBL_DIAGNOSTICS_VARDEFS_VERSIONS'], $versionData);
    echo "</P>";

    echo "<style> th { text-align: left; } </style>";

    $tables = array();
    foreach ($dictionary as $vardef)
    {
        $tables[] = $vardef['table'];
        $fields[$vardef['table']] = $vardef['fields'];
        $comments[$vardef['table']] = empty($vardef['comment']) ? '' : $vardef['comment'];
    }

    asort($tables);

    foreach($tables as $t) {
	$name = $t;
	if ( $name == "does_not_exist" )
	  continue;
	$comment = $comments[$t];
	echo "<h2>" . $mod_strings['LBL_DIAGNOSTICS_VARDEFS_TABLE'] . ": $t</h2>
		<p><i>{$comment}</i></p>";
	echo "<table border=\"0\" cellpadding=\"3\" class=\"tabDetailView\">";
	echo '<TR BGCOLOR="#DFDFDF">
		<TD NOWRAP ALIGN=left class=\"tabDetailViewDL\">' . $mod_strings['LBL_DIAGNOSTICS_VARDEFS_COLUMN'] . '</TD>
		<TD NOWRAP class=\"tabDetailViewDL\">' . $mod_strings['LBL_DIAGNOSTICS_VARDEFS_TYPE'] . '</TD>
		<TD NOWRAP class=\"tabDetailViewDL\">' . $mod_strings['LBL_DIAGNOSTICS_VARDEFS_LENGTH'] . '</TD>
		<TD NOWRAP class=\"tabDetailViewDL\">' . $mod_strings['LBL_DIAGNOSTICS_VARDEFS_REQUIRED'] . '</TD>
		<TD NOWRAP class=\"tabDetailViewDL\">' . $mod_strings['LBL_DIAGNOSTICS_VARDEFS_COMMENT'] . '</TD>
	</TR>';

	ksort( $fields[ $t ] );

	foreach($fields[$t] as $k => $v) {
	  // we only care about physical tables ('source' can be 'non-db' or 'nondb' or 'function' )
	  if ( isset( $v[ 'source' ] ))
	    continue;

	  $columnname = empty($v[ 'name' ]) ? '<i>n/a</i>' : $v[ 'name' ];
	  $columntype = $v[ 'type' ];
	  $columndbtype = empty($v[ 'dbType' ]) ? '' : $v[ 'dbType' ];
	  $columnlen = empty($v[ 'len' ]) ? '' : $v[ 'len' ];
	  $columncomment = empty($v[ 'comment' ]) ? '<i>(none)</i>' : $v[ 'comment' ];
      $columndisplayrequired = empty($v[ 'required' ]) ? 'no' : 'yes';

	  if ( !empty( $columndbtype ) ) $columntype = $columndbtype;


	  echo '<TR BGCOLOR="#FFFFFF" ALIGN=left>
			<TD ALIGN=left class=\"tabDetailViewDF\">'.$columnname.'</TD>
	  		<TD NOWRAP class=\"tabDetailViewDF\">'.$columntype.'</TD>
			<TD NOWRAP class=\"tabDetailViewDF\">'.$columnlen.'</TD>
			<TD NOWRAP class=\"tabDetailViewDF"\">'.$columndisplayrequired.'</TD>
			<TD WRAP class=\"tabDetailViewDF\">'.$columncomment.'</TD></TR>';
	}

	echo "</table></p>";
    }

    echo "</body></html>";

    $vardefFormattedOutput = ob_get_contents();
    ob_clean();

    $handle = sugar_fopen($cacheDir."vardefschema.html", "w");
    if(fwrite($handle, $vardefFormattedOutput) === FALSE){
      echo "Cannot write to file ".$cacheDir."vardefschema.html<br>";
    }
    fclose($handle);
    sodUpdateProgressBar(VARDEFS_WEIGHT);
    //END UPDATING PROGRESS BAR
}

function finishDiag(){
	//BEGIN ZIP ALL FILES AND EXTRACT IN CACHE ROOT
	global $cacheDir;
	global $curdatetime;
	global $sod_guid;
	global $mod_strings;

	chdir($cacheDir);
	zip_dir(".", "../diagnostic".$curdatetime.".zip");
	//END ZIP ALL FILES AND EXTRACT IN CACHE ROOT
	chdir(RETURN_FROM_DIAG_DIR);

	deleteDir($cacheDir);
	
	
	print "<a href=\"index.php?module=Administration&action=DiagnosticDownload&guid=$sod_guid&time=$curdatetime&to_pdf=1\">".$mod_strings['LBL_DIAGNOSTIC_DOWNLOADLINK']."</a><BR>";

	print "<a href=\"index.php?module=Administration&action=DiagnosticDelete&file=diagnostic".$curdatetime."&guid=".$sod_guid."\">".$mod_strings['LBL_DIAGNOSTIC_DELETELINK']."</a><br>";

}

//BEGIN check for what we are executing
$doconfigphp = ((empty($_POST['configphp']) || $_POST['configphp'] == 'off') ? false : true);
$docustom_dir = ((empty($_POST['custom_dir']) || $_POST['custom_dir'] == 'off') ? false : true);
$dophpinfo = ((empty($_POST['phpinfo']) || $_POST['phpinfo'] == 'off') ? false : true);
$domysql_dumps = ((empty($_POST['mysql_dumps']) || $_POST['mysql_dumps'] == 'off') ? false : true);
$domysql_schema = ((empty($_POST['mysql_schema']) || $_POST['mysql_schema'] == 'off') ? false : true);
$domysql_info = ((empty($_POST['mysql_info']) || $_POST['mysql_info'] == 'off') ? false : true);
$domd5 = ((empty($_POST['md5']) || $_POST['md5'] == 'off') ? false : true);
$domd5filesmd5 = ((empty($_POST['md5filesmd5']) || $_POST['md5filesmd5'] == 'off') ? false : true);
$domd5calculated = ((empty($_POST['md5calculated']) || $_POST['md5calculated'] == 'off') ? false : true);
$dobeanlistbeanfiles = ((empty($_POST['beanlistbeanfiles']) || $_POST['beanlistbeanfiles'] == 'off') ? false : true);
$dosugarlog = ((empty($_POST['sugarlog']) || $_POST['sugarlog'] == 'off') ? false : true);
$domlplog = ((empty($_POST['mlplog']) || $_POST['mlplog'] == 'off') ? false : true);
$dovardefs = ((empty($_POST['vardefs']) || $_POST['vardefs'] == 'off') ? false : true);
//END check for what we are executing


//BEGIN items to calculate progress bar
$totalitems = 0;
$totalweight = 0;
if($doconfigphp) {$totalweight += CONFIG_WEIGHT; $totalitems++;}
if($docustom_dir) {$totalweight += CUSTOM_DIR_WEIGHT; $totalitems++;}
if($dophpinfo) {$totalweight += PHPINFO_WEIGHT; $totalitems++;}
if($domysql_dumps) {$totalweight += SQL_DUMPS_WEIGHT; $totalitems++;}
if($domysql_schema) {$totalweight += SQL_SCHEMA_WEIGHT; $totalitems++;}
if($domysql_info) {$totalweight += SQL_INFO_WEIGHT; $totalitems++;}
if($domd5) {$totalweight += MD5_WEIGHT; $totalitems++;}
if($dobeanlistbeanfiles) {$totalweight += BEANLISTBEANFILES_WEIGHT; $totalitems++;}
if($dosugarlog) {$totalweight += SUGARLOG_WEIGHT; $totalitems++;}
if ($domlplog) {
    $totalweight += MLPLOG_WEIGHT;
    $totalitems++;
}
if($dovardefs) {$totalweight += VARDEFS_WEIGHT; $totalitems++;}
//END items to calculate progress bar

//prepare initial steps
prepareDiag();


if($doconfigphp)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETCONFPHP']."<BR>";
  executeconfigphp();
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if($docustom_dir)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETCUSTDIR']."<BR>";
  executecustom_dir();
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if($dophpinfo)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETPHPINFO']."<BR>";
  executephpinfo();
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if($domysql_info || $domysql_dumps || $domysql_schema)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETTING'].
                 ($domysql_info ? "... ".$mod_strings['LBL_DIAGNOSTIC_GETMYSQLINFO'] : " ").
                 ($domysql_dumps ? "... ".$mod_strings['LBL_DIAGNOSTIC_GETMYSQLTD'] : " ").
                 ($domysql_schema ? "... ".$mod_strings['LBL_DIAGNOSTIC_GETMYSQLTS'] : "...").
                 "<BR>";
  execute_sql($domysql_info, $domysql_dumps, $domysql_schema);
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if($domd5)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETMD5INFO']."<BR>";
  executemd5($domd5filesmd5, $domd5calculated);
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if($dobeanlistbeanfiles)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETBEANFILES']."<BR>";
  executebeanlistbeanfiles();
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if($dosugarlog)
{
  echo $mod_strings['LBL_DIAGNOSTIC_GETSUGARLOG']."<BR>";
  executesugarlog();
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}
if ($domlplog) {
    echo $mod_strings['LBL_DIAGNOSTIC_GETMLPLOG'] . "<BR>";
    executemlplog();
    echo $mod_strings['LBL_DIAGNOSTIC_DONE'] . "<BR><BR>";
}
if($dovardefs)
{
  echo $mod_strings['LBL_DIAGNOSTIC_VARDEFS']."<BR>";
  executevardefs();
  echo $mod_strings['LBL_DIAGNOSTIC_DONE']."<BR><BR>";
}

//finish up the last steps
finishDiag();

?>
