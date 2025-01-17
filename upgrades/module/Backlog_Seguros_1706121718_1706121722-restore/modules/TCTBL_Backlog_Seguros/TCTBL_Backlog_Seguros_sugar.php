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
 * THIS CLASS IS GENERATED BY MODULE BUILDER
 * PLEASE DO NOT CHANGE THIS CLASS
 * PLACE ANY CUSTOMIZATIONS IN TCTBL_Backlog_Seguros
 */


class TCTBL_Backlog_Seguros_sugar extends Basic {
    public $new_schema = true;
    public $module_dir = 'TCTBL_Backlog_Seguros';
    public $object_name = 'TCTBL_Backlog_Seguros';
    public $table_name = 'tctbl_backlog_seguros';
    public $importable = true;
    public $team_id;
    public $team_set_id;
    public $acl_team_set_id;
    public $team_count;
    public $team_name;
    public $acl_team_names;
    public $team_link;
    public $team_count_link;
    public $teams;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $tag;
    public $tag_link;
    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $activities;
    public $following;
    public $following_link;
    public $my_favorite;
    public $favorite_link;
    public $commentlog;
    public $commentlog_link;
    public $locked_fields;
    public $locked_fields_link;
    public $sync_key;
    public $no_backlog;
    public $producto;
    public $tipo_negocio;
    public $subramo;
    public $tipo_poliza;
    public $anio;
    public $mes;
    public $tipo_operacion;
    public $user_id_c;
    public $referenciador;
    public $user_id1_c;
    public $director_equipo;
    public $estimado_prima_neta_objetivo;
    public $currency_id;
    public $base_rate;
    public $estimado_prima_total_objetivo;
    public $fecha_entrega_cliente;
    public $etapa;
    
    public function bean_implements($interface){
        switch($interface){
            case 'ACL': return true;
        }
        return false;
    }
    
}
