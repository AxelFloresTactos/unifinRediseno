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
$viewdefs['Calls']['base']['view']['panel-top'] = array(
  'buttons' => array(
      array(
          'type' => 'actiondropdown',
          'name' => 'panel_dropdown',
          'css_class' => 'pull-right',
          'buttons' => array(
              array(
                  'type' => 'sticky-rowaction',
                  'icon' => 'sicon-plus',
                  'name' => 'create_button',
                  'label' => ' ',
                  'acl_action' => 'create',
                  'tooltip' => 'LBL_CREATE_BUTTON_LABEL',
              ),
              array(
                  'type' => 'link-action',
                  'name' => 'select_button',
                  'label' => 'LBL_ASSOC_RELATED_RECORD',
                  'css_class' => 'disabled',
              ),
          ),
      ),
  ),
  'fields' => array(
      array(
          'name' => 'collection-count',
          'type' => 'collection-count',
      ),
  ),
);
