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
 * Description:
 ********************************************************************************/
 // hack to allow "&", "%" and "+" through a $_GET var
// set by ie_test_open_popup() javascript call
foreach($_REQUEST as $k => $v) {
	$v = str_replace('::amp::', '&', $v);
	$v = str_replace('::plus::', '+', $v);
	$v = str_replace('::percent::', '%', $v);
	$_REQUEST[$k] = $v;
}

require_once('modules/InboundEmail/language/en_us.lang.php');
global $theme;




// GLOBALS
global $mod_strings;
global $app_strings;
global $app_list_strings;
global $current_user;
global $sugar_config;

if (SugarConfig::getInstance()->get("disable_user_email_config", false)
        && !$current_user->isAdminForModule("Emails")
) {
	ACLController::displayNoAccess(false);
    sugar_cleanup(true);
}

$title				= '';
$msg				= '';
$tls				= '';
$cert				= '';
$ssl				= '';
$notls				= '';
$novalidate_cert	= '';
$useSsl				= false;
$deletedFoldersList = "";

///////////////////////////////////////////////////////////////////////////////
////	TITLES

$popupBoolean = false;
if (isset($_REQUEST['target']) && $_REQUEST['target'] == 'Popup') {
	$popupBoolean = true;
}
if (isset($_REQUEST['target1']) && $_REQUEST['target1'] == 'Popup') {
	$popupBoolean = true;
}

if($popupBoolean) {
	$title = $mod_strings['LBL_SELECT_SUBSCRIBED_FOLDERS'];
	$msg = $mod_strings['LBL_TEST_WAIT_MESSAGE'];
}

$subdcriptionFolderHelp = $app_strings['LBL_EMAIL_SUBSCRIPTION_FOLDER_HELP'];

if(isset($_REQUEST['ssl']) && ($_REQUEST['ssl'] == "true" || $_REQUEST['ssl'] == 1)) {
	$useSsl = true;
}

$searchField = !empty($_REQUEST['searchField']) ? $_REQUEST['searchField'] : "";
$multipleString = "multiple=\"true\"";
if (!empty($searchField)) {
	$subdcriptionFolderHelp = "";
	$multipleString = "";
	if ($searchField == 'trash') {
		$title = $mod_strings['LBL_SELECT_TRASH_FOLDERS'];
	} else {
		$title = $mod_strings['LBL_SELECT_SENT_FOLDERS'];
	} // else

} // else


$ie = BeanFactory::newBean('InboundEmail');
if(!empty($_REQUEST['ie_id'])) {
    $ie->disable_row_level_security = true;
    $ie->retrieve($_REQUEST['ie_id']);
}
$ie->email_user     = $_REQUEST['email_user'];
$ie->server_url     = $_REQUEST['server_url'];
$ie->port           = $_REQUEST['port'];
$ie->protocol       = $_REQUEST['protocol'];
$ie->eapm_id        = $_REQUEST['eapm_id'];
//Bug 23083.Special characters in email password results in IMAP authentication failure
if(!empty($_REQUEST['email_password'])) {
    $ie->email_password = html_entity_decode($_REQUEST['email_password'], ENT_QUOTES);
    $ie->email_password = str_rot13($ie->email_password);
}
//$ie->mailbox      = $_REQUEST['mailbox'];

$ie->mailbox        = 'INBOX';

if($popupBoolean) {
    $returnArray = $ie->getFoldersListForMailBox();
    $foldersList = $returnArray['foldersList'] ?? '';
    if ($returnArray['status']) {
        $msg = $returnArray['statusMessage'];
        $requestMailBox = explode(",", $_REQUEST['mailbox']);
        $foldersListArray = explode(",", $foldersList);
        $deletedFoldersString = "";
        $count = 0;
        if (!empty($requestMailBox) && !empty($foldersListArray)) {
            foreach($requestMailBox as $mailbox) {
                if (!in_array($mailbox, $foldersListArray)) {
                    if ($count != 0) {
                        $deletedFoldersString = $deletedFoldersString . " ,";
                    }
                    $deletedFoldersString = $deletedFoldersString . $mailbox;
                    $count++;
                }
            } // foreach
        } // if
        if (!empty($deletedFoldersString)) {
            $deletedFoldersList = $mod_strings['LBL_DELETED_FOLDERS_LIST'];
            $deletedFoldersList = sprintf($deletedFoldersList, $deletedFoldersString);
        }
    } else {
        $msg = $returnArray['statusMessage'];
    }
}

////	END TITLES
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	COMMON CODE
echo '<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td>&nbsp;
				</td>
				<td valign="top">
					<div id="sf_msg">
					'.$msg.'
					</div>
				</td>
			</tr>';
if (!empty($subdcriptionFolderHelp)) {
echo '<tr>
				<td>&nbsp;
				</td>
				<td>&nbsp;
				</td>
			</tr>
			<tr align="center">
				<td>&nbsp;
				</td>
				<td>'.$subdcriptionFolderHelp.'
				</td>
			</tr>';
} // if
echo '<tr>
				<td>&nbsp;
				</td>
				<td valign="top">
					<div id="sf_deletedFoldersList" style="display:none;">
					' . htmlspecialchars($deletedFoldersList).'
					</div>
				</td>
			</tr>
			<tr align="center">
				<td>&nbsp;
				</td>
				<td  valign="top">
					<select '.$multipleString.' size="12" name="inboundmailboxes" id="sf_inboundmailboxes">
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;
				</td>
				<td>&nbsp;
				</td>
			</tr>
			<tr align="center">
				<td>&nbsp;
				</td>
				<td>
					<input type="button" style="" class="button" value="'.$app_strings['LBL_DONE_BUTTON_LABEL'].'" onclick="setMailbox();">
					<input type="button" class="button" value="'.$app_strings['LBL_EMAIL_CANCEL'].'" onclick="SUGAR.inboundEmail.listDlg.hide()">
				</td>
			</tr>
			<tr>
				<td>&nbsp;
				</td>
				<td>&nbsp;
				</td>
			</tr>';
echo '	</table>';

////	END COMMON CODE
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
////	COMPLETE RENDERING OF THE POPUP
printf('<input type="hidden" id="sf_returnstatus" name="returnstatus" value="%s">', $returnArray['status']);
printf('<input type="hidden" id="sf_foldersList" name="foldersList" value="%s">', htmlspecialchars($foldersList));
printf(
    '<input type="hidden" id="sf_selectedfoldersList" name="selectedfoldersList" value="%s">',
    htmlspecialchars(implode(',', $requestMailBox ?? []), ENT_QUOTES, 'UTF-8')
);
printf(
    '<input type="hidden" id="sf_searchField" name="searchField" value="%s">',
    htmlspecialchars($searchField, ENT_QUOTES, 'UTF-8')
);

echo '
<script type="text/javascript">
    SUGAR.inboundEmail.listDlg.setHeader("'.$title.'");
    function setMailbox(box) {
        var inboundmailboxes = document.getElementById("sf_inboundmailboxes");
        var selectedmbox = "";
        var j = 0;
        for (var i = 0 ; i < inboundmailboxes.options.length ; i++) {
            if (inboundmailboxes.options[i].selected) {
                if (j != 0) {
                    selectedmbox = selectedmbox + ",";
                } // if
                selectedmbox = selectedmbox + inboundmailboxes.options[i].value;
                j++;
            } // if
        } // for
        var searchFieldValue = document.getElementById("sf_searchField").value;
        if (searchFieldValue.length > 0) {
            if (searchFieldValue == "trash") {
                var tf = document.getElementById("trashFolder");
                tf.value = selectedmbox;
            } else if(searchFieldValue == "sent") {
                var sf = document.getElementById("sentFolder");
                sf.value = selectedmbox;
            } // else
        } else {
            var mb = document.getElementById("mailbox");
            mb.value = selectedmbox;
        }
        SUGAR.inboundEmail.listDlg.hide();
     }
	function switchMsg() {
		if(typeof(document.getElementById("sf_msg")) != "undefined") {
			document.getElementById("sf_msg").innerHTML = "'.$msg.'";
			var deletedFoldersList = document.getElementById("sf_deletedFoldersList");
			deletedFoldersList.textContent = "'. $deletedFoldersList .'";
			if (deletedFoldersList.innerHTML.length > 0) {
				deletedFoldersList.style.display = "";
			} // if
			var selectedFoldersListObject = new Object();
			var selectedFoldersListArray = document.getElementById("sf_selectedfoldersList").value.split(",");
			for (var j = 0 ; j < selectedFoldersListArray.length ; j++) {
				selectedFoldersListObject[selectedFoldersListArray[j]] = selectedFoldersListArray[j];
			} // for
			if (document.getElementById("sf_returnstatus").value == "1") {
				var foldersList = document.getElementById("sf_foldersList").value;
				var foldersArray = foldersList.split(",");
				var inboundmailboxes = document.getElementById("sf_inboundmailboxes");
				for (var i = 0 ; i < foldersArray.length ; i++) {
					var opt = new Option(foldersArray[i], foldersArray[i]);
					if (selectedFoldersListObject[foldersArray[i]] != null) {
						opt.selected = true;
					}
					inboundmailboxes.options.add(opt);
				} // for
			} // if
			var selectdFoldersValue = document.getElementById("sf_selectedfoldersList").value;
			var searchFieldValue = document.getElementById("sf_searchField").value;
			if (selectdFoldersValue.length <= 0) {
				if (searchFieldValue.length > 0) {
					if (searchFieldValue == "trash") {
						var inboundmailboxes = document.getElementById("sf_inboundmailboxes");
						for (var i = 0 ; i < inboundmailboxes.options.length ; i++) {
							if ((inboundmailboxes.options[i].text.search(/trash/i) != -1) ||
								(inboundmailboxes.options[i].text.search(/delete/i) != -1)) {

								inboundmailboxes.options[i].selected = true;
								break;
							}
						} // for
					} // if
					if (searchFieldValue == "sent") {
						var inboundmailboxes = document.getElementById("sf_inboundmailboxes");
						for (var i = 0 ; i < inboundmailboxes.options.length ; i++) {
							if (inboundmailboxes.options[i].text.search(/sent/i) != -1) {

								inboundmailboxes.options[i].selected = true;
								break;
							}
						} // for
					} // if
				} // if
			} // if
		}
	}
	switchMsg();
</script>'
?>
