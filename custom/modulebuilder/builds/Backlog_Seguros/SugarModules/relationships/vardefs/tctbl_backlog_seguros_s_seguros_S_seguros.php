<?php
// created: 2024-01-24 12:47:17
$dictionary["S_seguros"]["fields"]["tctbl_backlog_seguros_s_seguros"] = array (
  'name' => 'tctbl_backlog_seguros_s_seguros',
  'type' => 'link',
  'relationship' => 'tctbl_backlog_seguros_s_seguros',
  'source' => 'non-db',
  'module' => 'TCTBL_Backlog_Seguros',
  'bean_name' => 'TCTBL_Backlog_Seguros',
  'side' => 'right',
  'vname' => 'LBL_TCTBL_BACKLOG_SEGUROS_S_SEGUROS_FROM_S_SEGUROS_TITLE',
  'id_name' => 'tctbl_backlog_seguros_s_segurostctbl_backlog_seguros_ida',
  'link-type' => 'one',
);
$dictionary["S_seguros"]["fields"]["tctbl_backlog_seguros_s_seguros_name"] = array (
  'name' => 'tctbl_backlog_seguros_s_seguros_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TCTBL_BACKLOG_SEGUROS_S_SEGUROS_FROM_TCTBL_BACKLOG_SEGUROS_TITLE',
  'save' => true,
  'id_name' => 'tctbl_backlog_seguros_s_segurostctbl_backlog_seguros_ida',
  'link' => 'tctbl_backlog_seguros_s_seguros',
  'table' => 'tctbl_backlog_seguros',
  'module' => 'TCTBL_Backlog_Seguros',
  'rname' => 'name',
);
$dictionary["S_seguros"]["fields"]["tctbl_backlog_seguros_s_segurostctbl_backlog_seguros_ida"] = array (
  'name' => 'tctbl_backlog_seguros_s_segurostctbl_backlog_seguros_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_TCTBL_BACKLOG_SEGUROS_S_SEGUROS_FROM_S_SEGUROS_TITLE_ID',
  'id_name' => 'tctbl_backlog_seguros_s_segurostctbl_backlog_seguros_ida',
  'link' => 'tctbl_backlog_seguros_s_seguros',
  'table' => 'tctbl_backlog_seguros',
  'module' => 'TCTBL_Backlog_Seguros',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
