<?php
// created: 2024-05-21 12:49:42
$viewdefs['Meetings']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'SHARE',
        2 => 'DUPLICATE',
        3 => 'DELETE',
        4 => 
        array (
          'customCode' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")} <input type="hidden" name="isSaveAndNew" value="false">  <input type="hidden" name="status" value="">  <input type="hidden" name="isSaveFromDetailView" value="true">  <input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"   class="button"  onclick="this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Meetings\';this.form.isDuplicate.value=true;this.form.isSaveAndNew.value=true;this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true;this.form.return_id.value=\'{$fields.id.value}\';" id="close_create_button" name="button"  value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"  type="submit">{/if}',
          'sugar_html' => 
          array (
            'type' => 'submit',
            'value' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
            'htmlOptions' => 
            array (
              'title' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
              'name' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
              'class' => 'button',
              'id' => 'close_create_button',
              'onclick' => 'this.form.isSaveFromDetailView.value=true; this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Meetings\';this.form.isDuplicate.value=true;this.form.isSaveAndNew.value=true;this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true;this.form.return_id.value=\'{$fields.id.value}\';',
            ),
            'template' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")}[CONTENT]{/if}',
          ),
        ),
        5 => 
        array (
          'customCode' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")} <input type="hidden" name="isSave" value="false">  <input title="{$APP.LBL_CLOSE_BUTTON_TITLE}"  accesskey="{$APP.LBL_CLOSE_BUTTON_KEY}"  class="button"  onclick="this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Meetings\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'"  id="close_button" name="button1"  value="{$APP.LBL_CLOSE_BUTTON_TITLE}"  type="submit">{/if}',
          'sugar_html' => 
          array (
            'type' => 'submit',
            'value' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
            'htmlOptions' => 
            array (
              'title' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
              'accesskey' => '{$APP.LBL_CLOSE_BUTTON_KEY}',
              'class' => 'button',
              'onclick' => 'this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Meetings\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\';',
              'name' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
              'id' => 'close_button',
            ),
            'template' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")}[CONTENT]{/if}',
          ),
        ),
      ),
      'hidden' => 
      array (
        0 => '<input type="hidden" name="isSaveAndNew">',
        1 => '<input type="hidden" name="status">',
        2 => '<input type="hidden" name="isSaveFromDetailView">',
        3 => '<input type="hidden" name="isSave">',
      ),
      'headerTpl' => 'modules/Meetings/tpls/detailHeader.tpl',
    ),
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'useTabs' => false,
    'tabDefs' => 
    array (
      'LBL_MEETING_INFORMATION' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'lbl_meeting_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'label' => 'LBL_SUBJECT',
        ),
        1 => 'status',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'objetivo_c',
          'studio' => 'visible',
          'label' => 'LBL_OBJETIVO_C',
        ),
        1 => 
        array (
          'name' => 'resultado_c',
          'studio' => 'visible',
          'label' => 'LBL_RESULTADO_C',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'date_start',
          'label' => 'LBL_DATE_TIME',
        ),
        1 => 
        array (
          'name' => 'parent_name',
          'customLabel' => '{sugar_translate label=\'LBL_MODULE_NAME\' module=$fields.parent_type.value}',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'date_end',
          'comment' => 'Date meeting ends',
          'studio' => 
          array (
            'wirelesseditview' => false,
          ),
          'label' => 'LBL_DATE_END',
        ),
        1 => 'location',
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'duration',
          'customCode' => '{$fields.duration_hours.value}{$MOD.LBL_HOURS_ABBREV} {$fields.duration_minutes.value}{$MOD.LBL_MINSS_ABBREV} ',
          'label' => 'LBL_DURATION',
        ),
        1 => 
        array (
          'name' => 'acompaniante_c',
          'studio' => 'visible',
          'label' => 'LBL_ACOMPANIANTE_C',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'referenciada_c',
          'label' => 'LBL_REFERENCIADA_C',
        ),
        1 => '',
      ),
      6 => 
      array (
        0 => 'description',
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO',
        ),
      ),
      8 => 
      array (
        0 => 
        array (
          'name' => 'date_entered',
          'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
        ),
        1 => 
        array (
          'name' => 'date_modified',
          'label' => 'LBL_DATE_MODIFIED',
          'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
        ),
      ),
      9 => 
      array (
        0 => 
        array (
          'name' => 'reminder_time',
          'customCode' => '{include file="modules/Meetings/tpls/reminders.tpl"}',
          'label' => 'LBL_REMINDER',
        ),
        1 => '',
      ),
    ),
  ),
);