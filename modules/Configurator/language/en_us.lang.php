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
/*********************************************************************************
 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = [
    /*'ADMIN_EXPORT_ONLY'=>'Admin export only',*/
    'ADVANCED' => 'Advanced',
    'DEFAULT_CURRENCY_ISO4217' => 'ISO 4217 currency code',
    'DEFAULT_CURRENCY_NAME' => 'Currency name',
    'DEFAULT_CURRENCY_SYMBOL' => 'Currency symbol',
    'DEFAULT_CURRENCY' => 'Default Currency',
    'DEFAULT_DATE_FORMAT' => 'Default date format',
    'DEFAULT_DECIMAL_SEP' => 'Decimal symbol',
    'DEFAULT_LANGUAGE' => 'Default language',
    'DEFAULT_NUMBER_GROUPING_SEP' => '1000s separator',
    'DEFAULT_SYSTEM_SETTINGS' => 'User Interface',
    'DEFAULT_THEME' => 'Default theme',
    'DEFAULT_TIME_FORMAT' => 'Default time format',
    /*	'DISABLE_EXPORT'=>'Disable export',*/
    'DISPLAY_RESPONSE_TIME' => 'Display server response times',
    'FREEZE_FIRST_COLUMN' => 'Allow Column Freezing',
    'FREEZE_FIRST_COLUMN_HELP' => 'Enable this setting to allow users to freeze the first column in a variety of ' .
        'list views, including module list views, subpanels, dashlets, and consoles.',
    /*'EXPORT'=>'Export',
    'EXPORT_CHARSET' => 'Default Export Character Set',
    'EXPORT_DELIMITER' => 'Export Delimiter',*/
    'IMAGES' => 'Logos',
    'LBL_ADMIN_WIZARD' => 'Admin Wizard',
    'LBL_CONFIGURE_SETTINGS_TITLE' => 'System Settings',
    'LBL_ENABLE_MAILMERGE' => 'Enable mail merge?',
    'LBL_LOGVIEW' => 'View Log',
    'LBL_MAIL_SMTPAUTH_REQ' => 'Use SMTP Authentication?',
    'LBL_MAIL_SMTPPASS' => 'SMTP Password:',
    'LBL_MAIL_SMTPPORT' => 'SMTP Port:',
    'LBL_MAIL_SMTPSERVER' => 'SMTP Server:',
    'LBL_MAIL_SMTPUSER' => 'SMTP Username:',
    'LBL_MAIL_SMTPTYPE' => 'SMTP Server Type:',
    'LBL_MAIL_SMTP_SETTINGS' => 'SMTP Server Specification',
    'LBL_CHOOSE_EMAIL_PROVIDER' => 'Choose your Email provider:',
    'LBL_YAHOOMAIL_SMTPPASS' => 'Yahoo! Mail Password:',
    'LBL_YAHOOMAIL_SMTPUSER' => 'Yahoo! Mail ID:',
    'LBL_GMAIL_SMTPPASS' => 'Gmail Password:',
    'LBL_GMAIL_SMTPUSER' => 'Gmail Email Address:',
    'LBL_EXCHANGE_SMTPPASS' => 'Exchange Password:',
    'LBL_EXCHANGE_SMTPUSER' => 'Exchange Username:',
    'LBL_EXCHANGE_SMTPPORT' => 'Exchange Server Port:',
    'LBL_EXCHANGE_SMTPSERVER' => 'Exchange Server:',
    'LBL_ALLOW_DEFAULT_SELECTION' => 'Allow users to use this account for outgoing email:',
    'LBL_ALLOW_DEFAULT_SELECTION_HELP' => 'When this option is selected, all users will be able to send emails using the same outgoing mail account used to send system notifications and alerts.  If the option is not selected, users can still use the outgoing mail server after providing their own account information.',
    'LBL_MAILMERGE_DESC' => 'This flag should be checked only if you have the Sugar Plug-in for Microsoft&reg; Word&reg;.',
    'LBL_MAILMERGE' => 'Mail Merge',
    'LBL_MIN_AUTO_REFRESH_INTERVAL' => 'Minimum Dashlet Auto-Refresh Interval',
    'LBL_MIN_AUTO_REFRESH_INTERVAL_HELP' => 'This is the minimum value one can choose to have dashlets auto-refresh. Setting to \'Never\' disables auto-refreshing of dashlets entirely.',
    'LBL_MODULE_FAVICON' => 'Display module icon as favicon',
    'LBL_MODULE_FAVICON_HELP' => 'If you are in a module with an icon, use the module\'s icon as the favicon, instead of the theme\'s favicon, in the browser tab.',
    'LBL_MODULE_NAME' => 'System Settings',
    'LBL_MODULE_NAME_SINGULAR' => 'System Setting',
    'LBL_MODULE_ID' => 'Configurator',
    'LBL_MODULE_TITLE' => 'User Interface',
    'LBL_NOTIFY_FROMADDRESS' => '"From" Address:',
    'LBL_NOTIFY_SUBJECT' => 'Email subject:',
    'LBL_PORTAL_ON_DESC' => 'Allows users to manage portal user information within contact records. Portal users can access Cases, Bugs, Knowledge Base articles and other data through the Sugar Portal application.',
    'LBL_PORTAL_ON' => 'Enable Portal User Management',
    'LBL_PORTAL_TITLE' => 'Customer Self-Service Portal',
    'LBL_PROXY_AUTH' => 'Authentication?',
    'LBL_PROXY_HOST' => 'Proxy Host',
    'LBL_PROXY_ON_DESC' => 'Configure proxy server address and authentication settings',
    'LBL_PROXY_ON' => 'Use proxy server?',
    'LBL_PROXY_PASSWORD' => 'Password',
    'LBL_PROXY_PORT' => 'Port',
    'LBL_PROXY_TITLE' => 'Proxy Settings',
    'LBL_PROXY_USERNAME' => 'User Name',
    'LBL_RESTORE_BUTTON_LABEL' => 'Restore',
    'LBL_SYSTEM_SETTINGS' => 'System Settings',
    'LBL_DIALOUT_ON_DESC' => 'Allows users to click on phone numbers to call them using their default computer telephony integration (CTI) software.',
    'LBL_DIALOUT_ON' => 'Enable Click-to-Call',
    'LBL_DIALOUT_TITLE' => 'Outbound Calling',
    'LBL_TWEETTOCASE_ON_DESC' => 'Allows users to create cases from Tweets',
    'LBL_TWEETTOCASE_ON' => 'Enable Tweet&reg; to case integration',
    'LBL_TWEETTOCASE_TITLE' => 'Tweet&reg; to case',
    'LBL_PREVIEW_SETTINGS' => 'Preview Pane Settings',
    'LBL_PREVIEW_EDIT' => 'Enable edit in Preview pane',
    'LBL_PREVIEW_EDIT_HELP' => 'Allows users to edit fields in the Preview pane',
    'LBL_USE_REAL_NAMES' => 'Show Full Names',
    'LBL_USE_REAL_NAMES_DESC' => 'Display users\' full names instead of their User Names in assignment fields.',
    'LBL_DISALBE_CONVERT_LEAD' => 'Disable convert lead action for converted leads',
    'LBL_DISALBE_CONVERT_LEAD_DESC' => 'If a lead has already been converted, enabling this option will remove the convert lead action.',
    'LBL_ENABLE_ACTION_MENU' => 'Display actions within menus',
    'LBL_ENABLE_ACTION_MENU_DESC' => 'Select to display DetailView and subpanel actions within a dropdown menu. If un-selected, the actions will display as separate buttons. This setting applies to modules in legacy mode.',
    'LBL_LOCK_SUBPANELS_DESC' => 'This setting applies to modules in legacy mode.',
    'LBL_COLLAPSE_SUBPANELS_DESC' => 'When selected, all subpanels in the record view will be collapsed by default to improve performance. Users wishing to view subpanel data will need to expand the subpanel each time they access the record. Note: this setting does not apply to Legacy modules.',
    'LIST_ENTRIES_PER_LISTVIEW' => 'Listview items per page',
    'TPL_LIST_ENTRIES_PER_LISTVIEW_HELP' => 'Recommended setting is below {{listEntriesNum}} for acceptable performance levels. As additional fields are added to the listview, this number should be at the lower end of the recommended setting.',
    'LBL_LIST_ENTRIES_PER_SEARCH_HELP' => 'This setting is also used for the number of search results that display on the global search page.',
    'LIST_ENTRIES_PER_SUBPANEL' => 'Subpanel items per page',
    'TPL_LIST_ENTRIES_PER_SUBPANEL_HELP' => 'Recommended setting is below {{subpanelEntriesNum}} for acceptable performance levels. As additional fields are added to the listview, this number should be at the lower end of the recommended setting.',
    'LBL_WIRELESS_LIST_ENTRIES' => 'Listview items per page',
    'LBL_WIRELESS_SERVER_URL' => 'Sugar Mobile Plus server',
    'LBL_WIRELESS_SUBPANEL_LIST_ENTRIES' => 'Subpanel items per page',
    'LOG_MEMORY_USAGE' => 'Log memory usage',
    'LOG_SLOW_QUERIES' => 'Log slow queries',
    'LOCK_HOMEPAGE_HELP' => 'This setting is to prevent<BR> 1) the addition of new home pages and dashlets in the Home module, <BR>2) customization of dashlet placement in the home pages by dragging and dropping.',
    'CURRENT_LOGO' => 'Current Logo:',
    'CURRENT_LOGO_DARK' => 'Current Dark Mode Logo:',
    'CURRENT_LOGO_HELP' => 'This logo is displayed in the corner of the header bar across the top of Sugar.',
    'CURRENT_LOGO_DARK_HELP' => 'This is the dark mode version of the logo displayed in the corner of the header bar across the top of Sugar.',
    'NEW_LOGO' => 'Select Logo:',
    'NEW_LOGO_HELP' => 'The image file format can be either .png or .jpg. The maximum height is 24px, and the maximum width is 180px. Any image uploaded that is larger in any direction will be scaled to these max dimensions.',
    'NEW_LOGO_DARK' => 'Select Dark Mode Logo:',
    'NEW_LOGO_HELP_NO_SPACE' => 'Upload a PNG or JPG file with max dimensions of 28x200 px. If a larger file is selected, the image will be scaled down to 28x200 px. <BR><b>Note</b>: File names must not contain a space character.',
    'NEW_QUOTE_LOGO' => 'Upload new Quotes logo',
    'NEW_QUOTE_LOGO_HELP' => 'The required image file format is .jpg.<BR>The recommended size is 867x74 px.',
    'QUOTES_CURRENT_LOGO' => 'Quotes logo',
    'SLOW_QUERY_TIME_MSEC' => 'Slow query time threshold (msec)',
    'STACK_TRACE_ERRORS' => 'Display stack trace of errors',
    'UPLOAD_MAX_SIZE' => 'Maximum upload size',
    'VERIFY_CLIENT_IP' => 'Validate user IP address',
    'LOCK_HOMEPAGE' => 'Prevent user customizable Homepage layout',
    'LOCK_SUBPANELS' => 'Prevent user customizable subpanel layout',
    'COLLAPSE_SUBPANELS' => 'Collapse all subpanels and disable sticky feature',
    'MAX_DASHLETS' => 'Maximum number of Sugar Dashlets on Homepage',
    'SYSTEM_NAME' => 'System Name:',
    'SYSTEM_NAME_WIZARD' => 'Name:',
    'SYSTEM_NAME_HELP' => 'This is the name that displays in the title bar of your browser.',
    'LBL_ENABLE_HISTORY_CONTACTS_EMAILS' => 'Enable/Disable emails from related (or linked) contacts to show in Email Subpanel.',

    'SESSION_TIMEOUT' => 'Portal Session Timeout',
    'LBL_SESSION_TIMEOUT_TOOLTIP' => 'The Portal Session Timeout is for legacy versions of Sugar Portal available in 6.5 and older.',
    'UPLOAD_MAXSIZE_UNITS' => 'bytes',
    'SESSION_TIMEOUT_UNITS' => 'seconds',
    'LBL_LDAP_TITLE' => 'LDAP Authentication Support',
    'LBL_LDAP_ENABLE' => 'Enable LDAP',
    'LBL_LDAP_SERVER_HOSTNAME' => 'Server:',
    'LBL_LDAP_SERVER_PORT' => 'Port Number:',
    'LBL_LDAP_ADMIN_USER' => 'User Name:',
    'LBL_LDAP_ADMIN_USER_DESC' => 'Used to search for the Sugar user. [May need to be fully qualified] It will bind anonymously if not provided.',
    'LBL_LDAP_ADMIN_PASSWORD' => 'Password:',
    'LBL_LDAP_AUTHENTICATION' => 'Authentication:',
    'LBL_LDAP_AUTHENTICATION_DESC' => 'Bind to the LDAP server using a specific users credentials',
    'LBL_LDAP_AUTO_CREATE_USERS' => 'Auto Create Users:',
    'LBL_LDAP_USER_DN' => 'User DN:',
    'LBL_LDAP_GROUP_DN' => 'Group DN:',
    'LBL_LDAP_GROUP_DN_DESC' => 'Example: <em>ou=groups,dc=example,dc=com</em>',
    'LBL_LDAP_USER_FILTER' => 'User Filter:',
    'LBL_LDAP_GROUP_MEMBERSHIP' => 'Group Membership:',
    'LBL_LDAP_GROUP_MEMBERSHIP_DESC' => 'Users must be a member of a specific group',
    'LBL_LDAP_GROUP_USER_ATTR' => 'User Attribute:',
    'LBL_LDAP_GROUP_USER_ATTR_DESC' => 'The unique identifier of the person that will be used to check if they are a member of the group Example: <em>uid</em>',
    'LBL_LDAP_GROUP_ATTR_DESC' => 'The attribute of the Group that will be used to filter against the User Attribute Example: <em>memberUid</em>',
    'LBL_LDAP_GROUP_ATTR' => 'Group Attribute:',
    'LBL_LDAP_USER_FILTER_DESC' => 'Any additional filter params to apply when authenticating users e.g.<em>is_sugar_user=1 or (is_sugar_user=1)(is_sales=1)</em>',
    'LBL_LDAP_LOGIN_ATTRIBUTE' => 'Login Attribute:',
    'LBL_LDAP_BIND_ATTRIBUTE' => 'Bind Attribute:',
    'LBL_LDAP_BIND_ATTRIBUTE_DESC' => 'For Binding the LDAP User Examples:[<b>AD:</b>&nbsp;userPrincipalName] [<b>openLDAP:</b>&nbsp;userPrincipalName] [<b>Mac&nbsp;OS&nbsp;X:</b>&nbsp;uid] ',
    'LBL_LDAP_LOGIN_ATTRIBUTE_DESC' => 'For searching for the LDAP User Examples:[<b>AD:</b>&nbsp;userPrincipalName] [<b>openLDAP:</b>&nbsp;dn] [<b>Mac&nbsp;OS&nbsp;X:</b>&nbsp;dn] ',
    'LBL_LDAP_SERVER_HOSTNAME_DESC' => 'Example: ldap.example.com or ldaps://ldap.example.com for SSL',
    'LBL_LDAP_SERVER_PORT_DESC' => 'Example: <em>389 or 636 for SSL</em>',
    'LBL_LDAP_GROUP_NAME' => 'Group Name:',
    'LBL_LDAP_GROUP_NAME_DESC' => 'Example <em>cn=sugarcrm</em>',
    'LBL_LDAP_USER_DN_DESC' => 'Example: <em>ou=people,dc=example,dc=com</eM>',
    'LBL_LDAP_AUTO_CREATE_USERS_DESC' => 'If an authenticated user does not exist one will be created in Sugar.',
    'LBL_LDAP_ENC_KEY' => 'Encryption Key:',
    'DEVELOPER_MODE' => 'Developer Mode',

    'SHOW_DOWNLOADS_TAB' => 'Display Downloads Tab',
    'SHOW_DOWNLOADS_TAB_HELP' => 'When selected, the Download tab will appear in the User settings and provide users with access to Sugar plug-ins and other available files',
    'LBL_LDAP_ENC_KEY_DESC' => 'For SOAP authentication when using LDAP.',
    'LBL_ALL' => 'All',
    'LBL_MARK_POINT' => 'Mark Point',
    'LBL_NEXT_' => 'Next>>',
    'LBL_REFRESH_FROM_MARK' => 'Refresh From Mark',
    'LBL_SEARCH' => 'Search:',
    'LBL_REG_EXP' => 'Reg Exp:',
    'LBL_IGNORE_SELF' => 'Ignore Self:',
    'LBL_MARKING_WHERE_START_LOGGING' => 'Marking Where To Start Logging From',
    'LBL_DISPLAYING_LOG' => 'Displaying Log',
    'LBL_YOUR_PROCESS_ID' => 'Your process ID',
    'LBL_YOUR_IP_ADDRESS' => 'Your IP Address is',
    'LBL_IT_WILL_BE_IGNORED' => ' It will be ignored ',
    'LBL_LOG_NOT_CHANGED' => 'Log has not changed',
    'LBL_ALERT_JPG_IMAGE' => 'The file format of the image must be JPEG.  Upload a new file with the file extension .jpg.',
    'LBL_ALERT_TYPE_IMAGE' => 'The file format of the image must be JPEG or PNG.  Upload a new file with the file extension .jpg or .png.',
    'LBL_ALERT_SIZE_RATIO' => 'The aspect ratio of the image should be between 1:1 and 10:1.  The image will be resized.',
    'LBL_ALERT_SIZE_RATIO_QUOTES' => 'The aspect ratio of the image must be between 3:1 and 20:1.  Upload a new file with this ratio.',
    'ERR_ALERT_FILE_UPLOAD' => 'Error during the upload of the image.',
    'ERR_ALERT_CUSTOM_IMAGES_PATH' => 'Unable to create directory for images',
    'LBL_LOGGER' => 'Logger Settings',
    'LBL_LOGGER_FILENAME' => 'Log File Name',
    'LBL_LOGGER_MAX_LOG_SIZE' => 'Maximum log size',
    'LBL_LOGGER_DEFAULT_DATE_FORMAT' => 'Default date format',
    'LBL_LOGGER_LOG_LEVEL' => 'Log Level',
    'LBL_LEAD_CONV_OPTION' => 'Lead Conversion Options',
    'LEAD_CONV_OPT_HELP' => "<b>Move</b> - Moves all of the Lead's activities to the Contact created during conversion.<br><br><b>Do Nothing</b> - Does nothing with the Lead's activities during conversion. The activities remain related to the Lead only.",
    'LBL_LOGGER_MAX_LOGS' => 'Maximum number of logs (before rolling)',
    'LBL_LOGGER_FILENAME_SUFFIX' => 'Append after filename',
    'LBL_VCAL_PERIOD' => 'vCal Updates Time Period:',
    'LBL_NO_PRIVATE_TEAM_UPDATE' => 'Prevent private team names from inheriting the user\'s name fields',
    'LBL_IMPORT_MAX_RECORDS' => 'Import - Maximum Number of Rows:',
    'LBL_IMPORT_MAX_RECORDS_HELP' => 'Specify how many rows are allowed within import files. If the number of rows <br>in an import file exceeds this number, the user will be alerted. If no number<br> is entered, an unlimited number of rows are allowed.',
    'vCAL_HELP' => 'Use this setting to determine the number of months in advance of the current date that Free/Busy information for calls and meetings is published.<BR>To turn Free/Busy publishing off, enter "0".  The minimum is 1 month; the maximum is 12 months.',
    'LBL_PDFMODULE_NAME' => 'Report PDF Template',
    'SUGARPDF_BASIC_SETTINGS' => 'Document Properties',
    'SUGARPDF_LOGO_SETTINGS' => 'Images',

    'PDF_AUTHOR' => 'Author',
    'PDF_AUTHOR_INFO' => 'The Author appears in the document properties.',

    'PDF_HEADER_LOGO' => 'For Quotes PDF Documents',
    'PDF_HEADER_LOGO_INFO' => 'This image appears in the default Header in Quotes PDF Documents.',

    'PDF_NEW_HEADER_LOGO' => 'Select New Image for Quotes',
    'PDF_NEW_HEADER_LOGO_INFO' => 'The file format can be either .jpg or .png. (Only .jpg for EZPDF)<BR>The recommended size is 867x60 px.',

    'PDF_TITLE' => 'Title',
    'PDF_TITLE_INFO' => 'The Title appears in the document properties.',

    'PDF_SUBJECT' => 'Subject',
    'PDF_SUBJECT_INFO' => 'The Subject appears in the document properties.',

    'PDF_SMALL_HEADER_LOGO' => 'Current Image',
    'PDF_SMALL_HEADER_LOGO_INFO' => 'This image appears in the Header of the PDF document pages.',

    'PDF_NEW_SMALL_HEADER_LOGO' => 'Select New Image',
    'PDF_NEW_SMALL_HEADER_LOGO_INFO' => 'Select an image to replace the current image. The file format can be either .jpg or .png. (Only .jpg for EZPDF.) The recommended size is 212x40 px.',

    'PDF_KEYWORDS' => 'Keyword(s)',
    'PDF_KEYWORDS_INFO' => 'Associate Keywords with the document, generally in the form "keyword1 keyword2..."',

    'PDF_GD_WARNING' => 'You do not have the GD library installed for PHP. Without the GD library installed, only JPEG logos can be displayed in PDF documents.',
    'ERR_EZPDF_DISABLE' => 'Warning : The EZPDF class is disabled from the config table and it set as the PDF class. Please "Save" this form to set TCPDF as the PDF Class and return in a stable state.',
    'LBL_IMG_RESIZED' => '(resized for display)',


    'LBL_FONTMANAGER_BUTTON' => 'PDF Font Manager',
    'LBL_FONTMANAGER_TITLE' => 'PDF Font Manager',
    'LBL_FONT_BOLD' => 'Bold',
    'LBL_FONT_ITALIC' => 'Italic',
    'LBL_FONT_BOLDITALIC' => 'Bold/Italic',
    'LBL_FONT_REGULAR' => 'Regular',

    'LBL_FONT_TYPE_CID0' => 'CID-0',
    'LBL_FONT_TYPE_CORE' => 'Core',
    'LBL_FONT_TYPE_TRUETYPE' => 'TrueType',
    'LBL_FONT_TYPE_TYPE1' => 'Type1',
    'LBL_FONT_TYPE_TRUETYPEU' => 'TrueTypeUnicode',

    'LBL_FONT_LIST_NAME' => 'Name',
    'LBL_FONT_LIST_FILENAME' => 'Filename',
    'LBL_FONT_LIST_TYPE' => 'Type',
    'LBL_FONT_LIST_STYLE' => 'Style',
    'LBL_FONT_LIST_STYLE_INFO' => 'Style of the font',
    'LBL_FONT_LIST_ENC' => 'Encoding',
    'LBL_FONT_LIST_EMBEDDED' => 'Embedded',
    'LBL_FONT_LIST_EMBEDDED_INFO' => 'Check to embed the font into the PDF file',
    'LBL_FONT_LIST_CIDINFO' => 'CID Information',
    'LBL_FONT_LIST_CIDINFO_INFO' => 'Examples :' .
        '<ul><li>' .
        'Chinese Traditional :<br>' .
        "<pre>\$enc=\'UniCNS-UTF16-H\';<br>" .
        "\$cidinfo=array(\'Registry\'=>\'Adobe\', \'Ordering\'=>\'CNS1\',\'Supplement\'=>0);<br>" .
        "include(\'vendor/tcpdf/fonts/uni2cid_ac15.php\');</pre>" .
        '</li><li>' .
        'Chinese Simplified :<br>' .
        "<pre>\$enc=\'UniGB-UTF16-H\';<br>" .
        "\$cidinfo=array(\'Registry\'=>\'Adobe\', \'Ordering\'=>\'GB1\',\'Supplement\'=>2);<br>" .
        "include(\'vendor/tcpdf/fonts/uni2cid_ag15.php\');</pre>" .
        '</li><li>' .
        'Korean :<br>' .
        "<pre>\$enc=\'UniKS-UTF16-H\';<br>" .
        "\$cidinfo=array(\'Registry\'=>\'Adobe\', \'Ordering\'=>\'Korea1\',\'Supplement\'=>0);<br>" .
        "include(\'vendor/tcpdf/fonts/uni2cid_ak12.php\');</pre>" .
        '</li><li>' .
        'Japanese :<br>' .
        "<pre>\$enc=\'UniJIS-UTF16-H\';<br>" .
        "\$cidinfo=array(\'Registry\'=>\'Adobe\', \'Ordering\'=>\'Japan1\',\'Supplement\'=>5);<br>" .
        "include(\'vendor/tcpdf/fonts/uni2cid_aj16.php\');</pre>" .
        '</li></ul>' .
        'More help : www.tcpdf.org',
    'LBL_FONT_LIST_FILESIZE' => 'Font Size (KB)',
    'LBL_ADD_FONT' => 'Add a font',
    'LBL_BACK' => 'Back',
    'LBL_REMOVE' => 'rem',
    'LBL_JS_CONFIRM_DELETE_FONT' => 'Are you sure that you want to delete this font?',

    'LBL_ADDFONT_TITLE' => 'Add a PDF Font',
    'LBL_PDF_PATCH' => 'Patch',
    'LBL_PDF_ENCODING_TABLE' => 'Encoding Table',
    'LBL_PDF_ENCODING_TABLE_INFO' => 'Name of the encoding table.<br>This option is ignored for TrueType Unicode, OpenType Unicode and symbolic fonts.<br>The encoding defines the association between a code (from 0 to 255) and a character contained in the font.<br>The first 128 are fixed and correspond to ASCII.',
    'LBL_PDF_FONT_FILE' => 'Font File',
    'LBL_PDF_FONT_FILE_INFO' => '.ttf or .otf or .pfb file',
    'LBL_PDF_METRIC_FILE' => 'Metric File',
    'LBL_PDF_METRIC_FILE_INFO' => '.afm or .ufm file',
    'LBL_ADD_FONT_BUTTON' => 'Add',
    'JS_ALERT_PDF_WRONG_EXTENSION' => 'This file do not have a good file extension.',
    'LBL_PDF_INSTRUCTIONS' => 'Instructions',
    'PDF_INSTRUCTIONS_ADD_FONT' => <<<BSOFR
Fonts supported by SugarPDF :
<ul>
<li>TrueTypeUnicode (UTF-8 Unicode)</li>
<li>OpenTypeUnicode</li>
<li>TrueType</li>
<li>OpenType</li>
<li>Type1</li>
<li>CID-0</li>
</ul>
<br>
If you choose to not embed your font in the PDF, the generated PDF file will be lighter but a substitution will be use if the font is not available in the system of your reader.
<br><br>
Adding a PDF font to SugarCRM requires to follow steps 1 and 2 of the TCPDF Fonts documentation available in the "DOCS" section of the <a href="http://www.tcpdf.org" target="_blank" rel="nofollow noopener noreferrer">TCPDF website</a>.
<br><br>The pfm2afm and ttf2ufm utils are available in fonts/utils in the TCPDF package that you can download on the "DOWNLOAD" section of the <a href="http://www.tcpdf.org" target="_blank" rel="nofollow noopener noreferrer">TCPDF website</a>.
<br><br>Load the metric file generated in step 2 and your font file below.
BSOFR
    ,
    'ERR_MISSING_CIDINFO' => 'The field CID Information cannot be empty.',
    'LBL_ADDFONTRESULT_TITLE' => 'Result of the add font process',
    'LBL_STATUS_FONT_SUCCESS' => 'SUCCESS : The font has been added to SugarCRM.',
    'LBL_STATUS_FONT_ERROR' => 'ERROR : The font has not been added. Look at the log below.',
    'LBL_FONT_MOVE_DEFFILE' => 'Font definition file move to : ',
    'LBL_FONT_MOVE_FILE' => 'Font file move to : ',

// Font manager
    'ERR_LOADFONTFILE' => 'ERROR: LoadFontFile error!',
    'ERR_FONT_EMPTYFILE' => 'ERROR: Empty filename!',
    'ERR_FONT_UNKNOW_TYPE' => 'ERROR: Unknow font type:',
    'ERR_DELETE_CORE_FILE' => 'ERROR: It is not possible to delete a core font.',
    'ERR_NO_FONT_PATH' => 'ERROR: No font path available!',
    'ERR_NO_CUSTOM_FONT_PATH' => 'ERROR: No custom font path available!',
    'ERR_FONT_NOT_WRITABLE' => 'is not writable.',
    'ERR_FONT_FILE_DO_NOT_EXIST' => 'doesn\'t exist or is not a directory.',
    'ERR_FONT_MAKEFONT' => 'ERROR: MakeFont error',
    'ERR_FONT_ALREADY_EXIST' => 'ERROR : This font already exist. Rollback...',
    'ERR_PDF_NO_UPLOAD' => 'Error during the upload of the font or metric file.',

// Wizard
    'LBL_WIZARD_TITLE' => 'Admin Wizard',
    'LBL_WIZARD_WELCOME_TAB' => 'Welcome',
    'LBL_WIZARD_WELCOME_TITLE' => 'Welcome to Sugar!',
    'LBL_WIZARD_WELCOME' => 'Click <b>Next</b> to brand, localize and configure Sugar now. If you wish to configure Sugar later, click <b>Skip</b>.',
    'LBL_WIZARD_NEXT_BUTTON' => 'Next >',
    'LBL_WIZARD_BACK_BUTTON' => '< Back',
    'LBL_WIZARD_SKIP_BUTTON' => 'Skip',
    'LBL_WIZARD_FINISH_BUTTON' => 'Finish',
    'LBL_WIZARD_CONTINUE_BUTTON' => 'Continue',
    'LBL_WIZARD_FINISH_TAB' => 'Finish',
    'LBL_WIZARD_FINISH_TITLE' => 'Basic system configuration is complete',
    'LBL_WIZARD_FINISH' => 'Click <b>Continue</b> to configure your user settings.<br/><br />
To configure additional system settings, click <a href="#Administration" target="_blank">here</a>.',
    'LBL_WIZARD_SYSTEM_TITLE' => 'Branding',
    'LBL_WIZARD_SYSTEM_DESC' => 'Provide your organization\'s name and logo in order to brand your Sugar.',
    'LBL_WIZARD_LOCALE_DESC' => 'Specify how you would like data in Sugar to be displayed, based on your geographical location. The settings you provide here will be the default settings. Users will be able set their own preferences.',
    'LBL_WIZARD_SMTP_DESC' => 'Provide the email account that will be used to send emails, such as the assignment notifications and new user passwords. Users will receive emails from Sugar, as sent from the specified email account.',
    'LBL_GMAIL_LOGO' => 'Gmail Logo' /*for 508 compliance fix*/,
    'LBL_YAHOO_MAIL' => 'Yahoo Mail' /*for 508 compliance fix*/,
    'LBL_EXCHANGE_LOGO' => 'Exchange' /*for 508 compliance fix*/,
    'LBL_LOADING' => 'Loading...' /*for 508 compliance fix*/,
    'LBL_DELETE' => 'Delete' /*for 508 compliance fix*/,
    'LBL_WELCOME' => 'Welcome' /*for 508 compliance fix*/,
    'LBL_LOGO' => 'Logo' /*for 508 compliance fix*/,
    'LBL_LOGO_DARK' => 'Dark Mode Logo',
    'LBL_MOBILE_MOD_REPORTS_RESTRICTION' => '* The Reports module is only available for the SugarCRM and Sugar Mobile native clients',
    'LBL_MOBILE_MOD_REPORTS_RESTRICTION2' => '* The Reports module is not available for the browser-based mobile view.',

// Password settings
    'ERR_MIN_LENGTH_GREATER_THAN_MAX' => 'Maximum Length should be greater than Minimum Length',
    'ERR_MIN_LENGTH_NEGATIVE' => 'Minimum Length should be positive value',
    'ERR_MAX_LENGTH_NEGATIVE' => 'Maximum Length should be positive value',
    'ERR_EMPTY_SAML_LOGIN' => 'SAML Login URL can not be empty',
    'ERR_EMPTY_SAML_CERT' => 'SAML certificate can not be empty',
    'ERR_EMPTY_SAML_IDP_ENTITY_ID' => 'SAML Entity ID cannot be empty',
    'ERR_SAML_LOGIN_URL' => 'SAML Login URL is not valid',
    'ERR_SAML_SLO_URL' => 'SAML SLO URL is not valid',
    'ERR_SAML_REQUEST_SIGNING_CERT_NO_PRIVATE_KEY' => 'PEM file should contain private key',
    'ERR_SAML_REQUEST_SIGNING_CERT_NO_X509_CERTIFICATE' => 'PEM file should contain x.509 certificate',
    'ERR_SAML_REQUEST_SIGNING_CERT_X509_DOESNT_MATCH' => 'Provided x.509 certificate doesn\'t match private key',

    //Activity Stream Settings
    'LBL_ACTIVITY_STREAMS_SETTINGS_TITLE' => 'Activity Streams',
    'LBL_ACTIVITY_STREAMS_SETTINGS_EDIT' => 'Enable Activity Streams',
    'LBL_ACTIVITY_STREAMS_SETTINGS_EDIT_HELP' => 'Turns on Activity Streams for the application',

    // SugarBPM settings
    'LBL_ADVANCED_WORKFLOW_SETTINGS_AUTO_SAVE_INTERVAL' => 'Auto-save process definitions',
    'LBL_ADVANCED_WORKFLOW_SETTINGS_AUTO_SAVE_INTERVAL_HELP' => 'Determines how often process definitions are auto-saved when using the designer',
    'LBL_ADVANCED_WORKFLOW_SETTINGS_SAVE' => 'Auto-validate process definitions on auto-save',
    'LBL_ADVANCED_WORKFLOW_SETTINGS_SAVE_HELP' => 'Toggles whether process definitions are automatically validated when auto-saved. This will only take effect if "Auto-save process definitions" is set to a time interval',
    'LBL_ADVANCED_WORKFLOW_SETTINGS_IMPORT' => 'Auto-validate process definitions on import',
    'LBL_ADVANCED_WORKFLOW_SETTINGS_IMPORT_HELP' => 'Toggles whether process definitions are automatically validated when first imported',
    'LBL_ADVANCED_WORKFLOW_SETTINGS_CYCLES' => 'Error number of cycles',

    //Comment log settings
    'LBL_COMMENT_LOG_SETTINGS' => 'Comment Log Settings',
    'LBL_COMMENT_LOG_MAX_CHARS' => 'Maximum characters to show per comment entry',

    'LBL_SUGAR_CATALOG_SETTINGS' => 'Sugar Catalog Settings',
    'LBL_SUGAR_CATALOG_ENABLED' => 'Sugar Catalog Enabled',
    'LBL_SUGAR_CATALOG_URL' => 'Sugar Catalog URL',

    //Doc Merge Region Configuration
    'LBL_DOC_MERGE_REGION_CONFIG' => 'Doc Merge Region Configuration',
    'LBL_DOC_MERGE_REGION' => 'Region',
];
