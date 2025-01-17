<?php

if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
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
define('ENTRY_POINT_TYPE', 'api');
require_once 'include/entryPoint.php';
require_once 'include/utils/file_utils.php';
ob_start();

require 'soap/SoapErrorDefinitions.php';
//ignore notices
error_reporting(E_ALL ^ E_NOTICE);

checkSystemLicenseStatus();
checkSystemState();

$administrator = Administration::getSettings();
$NAMESPACE = 'http://www.sugarcrm.com/sugarcrm';
$options = [
    'soap_version' => SOAP_1_1,
    'uri' => $sugar_config['site_url'] . '/soap.php',
];

$xml = <<<EOT
<?xml version="1.0" encoding="ISO-8859-1"?>
<definitions xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="http://www.sugarcrm.com/sugarcrm" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns="http://schemas.xmlsoap.org/wsdl/" targetNamespace="http://www.sugarcrm.com/sugarcrm">
    <types>
        <xsd:schema targetNamespace="http://www.sugarcrm.com/sugarcrm">
            <xsd:import namespace="http://schemas.xmlsoap.org/soap/encoding/" schemaLocation="{$GLOBALS['sugar_config']['site_url']}/service/soap-encoding.xsd"/>
            <xsd:import namespace="http://schemas.xmlsoap.org/wsdl/" schemaLocation="{$GLOBALS['sugar_config']['site_url']}/service/wsdl.xsd"/>
            <xsd:complexType name="note_attachment">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="filename" type="xsd:string"/>
                    <xsd:element name="file" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="new_note_attachment">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="filename" type="xsd:string"/>
                    <xsd:element name="file" type="xsd:string"/>
                    <xsd:element name="related_module_id" type="xsd:string"/>
                    <xsd:element name="related_module_name" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="new_return_note_attachment">
                <xsd:all>
                    <xsd:element name="note_attachment" type="tns:new_note_attachment"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="return_note_attachment">
                <xsd:all>
                    <xsd:element name="note_attachment" type="tns:note_attachment"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="user_auth">
                <xsd:all>
                    <xsd:element name="user_name" type="xsd:string"/>
                    <xsd:element name="password" type="xsd:string"/>
                    <xsd:element name="version" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="field">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="type" type="xsd:string"/>
                    <xsd:element name="label" type="xsd:string"/>
                    <xsd:element name="required" type="xsd:int"/>
                    <xsd:element name="options" type="tns:name_value_list"/>
                    <xsd:element name="default_value" type="xsd:string" minOccurs="0"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="link_field">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="type" type="xsd:string"/>
                    <xsd:element name="relationship" type="xsd:string"/>
                    <xsd:element name="module" type="xsd:string"/>
                    <xsd:element name="bean_name" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="field_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:field[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="link_field_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:link_field[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="name_value">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="value" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="name_value_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:name_value[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="name_value_lists">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:name_value_list[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="select_fields">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="xsd:string[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="module_fields">
                <xsd:all>
                    <xsd:element name="module_name" type="xsd:string"/>
                    <xsd:element name="module_fields" type="tns:field_list"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="new_module_fields">
                <xsd:all>
                    <xsd:element name="module_name" type="xsd:string"/>
                    <xsd:element name="module_fields" type="tns:field_list"/>
                    <xsd:element name="link_fields" type="tns:link_field_list"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="module_list">
                <xsd:all>
                    <xsd:element name="modules" type="tns:select_fields"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="error_value">
                <xsd:all>
                    <xsd:element name="number" type="xsd:string"/>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="description" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="entry_value">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="module_name" type="xsd:string"/>
                    <xsd:element name="name_value_list" type="tns:name_value_list"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="entry_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:entry_value[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="get_mailmerge_document_result">
                <xsd:all>
                    <xsd:element name="html" type="xsd:string"/>
                    <xsd:element name="name_value_list" type="tns:name_value_list"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="link_name_to_fields_array">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="value" type="tns:select_fields"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="link_value">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:name_value_list[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="link_array_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:link_value[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="link_name_value">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="records" type="tns:link_array_list"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="link_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:link_name_value[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="link_lists">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:link_list[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="get_entry_result_version2">
                <xsd:all>
                    <xsd:element name="entry_list" type="tns:entry_list"/>
                    <xsd:element name="relationship_list" type="tns:link_lists"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="return_search_result">
                <xsd:all>
                    <xsd:element name="entry_list" type="tns:link_list"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_entry_list_result">
                <xsd:all>
                    <xsd:element name="result_count" type="xsd:int"/>
                    <xsd:element name="next_offset" type="xsd:int"/>
                    <xsd:element name="field_list" type="tns:field_list"/>
                    <xsd:element name="entry_list" type="tns:entry_list"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_entry_list_result_version2">
                <xsd:all>
                    <xsd:element name="result_count" type="xsd:int"/>
                    <xsd:element name="next_offset" type="xsd:int"/>
                    <xsd:element name="entry_list" type="tns:entry_list"/>
                    <xsd:element name="relationship_list" type="tns:link_lists"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_entry_result">
                <xsd:all>
                    <xsd:element name="field_list" type="tns:field_list"/>
                    <xsd:element name="entry_list" type="tns:entry_list"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_server_info_result">
                <xsd:all>
                    <xsd:element name="flavor" type="xsd:string"/>
                    <xsd:element name="version" type="xsd:string"/>
                    <xsd:element name="gmt_time" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="set_entry_result">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="new_set_entry_result">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="new_set_entries_result">
                <xsd:all>
                    <xsd:element name="ids" type="tns:select_fields"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="set_entries_result">
                <xsd:all>
                    <xsd:element name="ids" type="tns:select_fields"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="id_mod">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="date_modified" type="xsd:string"/>
                    <xsd:element name="deleted" type="xsd:int"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="ids_mods">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:id_mod[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="get_relationships_result">
                <xsd:all>
                    <xsd:element name="ids" type="tns:ids_mods"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="set_relationship_value">
                <xsd:all>
                    <xsd:element name="module1" type="xsd:string"/>
                    <xsd:element name="module1_id" type="xsd:string"/>
                    <xsd:element name="module2" type="xsd:string"/>
                    <xsd:element name="module2_id" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="set_relationship_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:set_relationship_value[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="new_set_relationhip_ids">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:select_fields[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="new_set_relationship_list_result">
                <xsd:all>
                    <xsd:element name="created" type="xsd:int"/>
                    <xsd:element name="failed" type="xsd:int"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="set_relationship_list_result">
                <xsd:all>
                    <xsd:element name="created" type="xsd:int"/>
                    <xsd:element name="failed" type="xsd:int"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="sync_set_entries_encoded">
                <xsd:all>
                    <xsd:element name="conflicts" type="xsd:string"/>
                    <xsd:element name="status" type="xsd:string"/>
                    <xsd:element name="ids" type="tns:select_fields"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="document_revision">
                <xsd:all>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="document_name" type="xsd:string"/>
                    <xsd:element name="revision" type="xsd:string"/>
                    <xsd:element name="filename" type="xsd:string"/>
                    <xsd:element name="file" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_entry_list_result_encoded">
                <xsd:all>
                    <xsd:element name="result_count" type="xsd:int"/>
                    <xsd:element name="next_offset" type="xsd:int"/>
                    <xsd:element name="total_count" type="xsd:int"/>
                    <xsd:element name="field_list" type="tns:select_fields"/>
                    <xsd:element name="entry_list" type="xsd:string"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_sync_result_encoded">
                <xsd:all>
                    <xsd:element name="result" type="xsd:string"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_quick_sync_result_encoded">
                <xsd:all>
                    <xsd:element name="result" type="xsd:string"/>
                    <xsd:element name="result_count" type="xsd:int"/>
                    <xsd:element name="next_offset" type="xsd:int"/>
                    <xsd:element name="total_count" type="xsd:int"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="return_document_revision">
                <xsd:all>
                    <xsd:element name="document_revision" type="tns:document_revision"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="new_return_document_revision">
                <xsd:all>
                    <xsd:element name="document_revision" type="tns:document_revision"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="name_value_operator">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="value" type="xsd:string"/>
                    <xsd:element name="operator" type="xsd:string"/>
                    <xsd:element name="value_array" type="tns:select_fields"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="name_value_operator_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:name_value_operator[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="newsletter">
                <xsd:all>
                    <xsd:element name="name" type="xsd:string"/>
                    <xsd:element name="prospect_list_id" type="xsd:string"/>
                    <xsd:element name="campaign_id" type="xsd:string"/>
                    <xsd:element name="description" type="xsd:string"/>
                    <xsd:element name="frequency" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="newsletter_list">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:newsletter[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="get_subscription_lists_result">
                <xsd:all>
                    <xsd:element name="unsubscribed" type="tns:newsletter_list"/>
                    <xsd:element name="subscribed" type="tns:newsletter_list"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="str_array">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="xsd:string[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="name_value_lists_error">
                <xsd:all>
                    <xsd:element name="name_value_lists" type="tns:name_value_lists"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="get_entries_count_result">
                <xsd:all>
                    <xsd:element name="result_count" type="xsd:int"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="set_entries_detail_result">
                <xsd:all>
                    <xsd:element name="name_value_lists" type="tns:name_value_lists"/>
                    <xsd:element name="error" type="tns:error_value"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="contact_detail">
                <xsd:all>
                    <xsd:element name="email_address" type="xsd:string"/>
                    <xsd:element name="name1" type="xsd:string"/>
                    <xsd:element name="name2" type="xsd:string"/>
                    <xsd:element name="association" type="xsd:string"/>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="msi_id" type="xsd:string"/>
                    <xsd:element name="type" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="contact_detail_array">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:contact_detail[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
            <xsd:complexType name="user_detail">
                <xsd:all>
                    <xsd:element name="email_address" type="xsd:string"/>
                    <xsd:element name="user_name" type="xsd:string"/>
                    <xsd:element name="first_name" type="xsd:string"/>
                    <xsd:element name="last_name" type="xsd:string"/>
                    <xsd:element name="department" type="xsd:string"/>
                    <xsd:element name="id" type="xsd:string"/>
                    <xsd:element name="title" type="xsd:string"/>
                </xsd:all>
            </xsd:complexType>
            <xsd:complexType name="user_detail_array">
                <xsd:complexContent>
                    <xsd:restriction base="SOAP-ENC:Array">
                        <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:user_detail[]"/>
                    </xsd:restriction>
                </xsd:complexContent>
            </xsd:complexType>
        </xsd:schema>
    </types>
    <message name="is_user_adminRequest">
        <part name="session" type="xsd:string" /></message>
    <message name="is_user_adminResponse">
        <part name="return" type="xsd:int" /></message>
    <message name="loginRequest">
        <part name="user_auth" type="tns:user_auth" />
        <part name="application_name" type="xsd:string" /></message>
    <message name="loginResponse">
        <part name="return" type="tns:set_entry_result" /></message>
    <message name="is_loopbackRequest"></message>
    <message name="is_loopbackResponse">
        <part name="return" type="xsd:int" /></message>
    <message name="seamless_loginRequest">
        <part name="session" type="xsd:string" /></message>
    <message name="seamless_loginResponse">
        <part name="return" type="xsd:int" /></message>
    <message name="get_entry_listRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="query" type="xsd:string" />
        <part name="order_by" type="xsd:string" />
        <part name="offset" type="xsd:int" />
        <part name="select_fields" type="tns:select_fields" />
        <part name="max_results" type="xsd:int" />
        <part name="deleted" type="xsd:int" /></message>
    <message name="get_entry_listResponse">
        <part name="return" type="tns:get_entry_list_result" /></message>
    <message name="get_entryRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="id" type="xsd:string" />
        <part name="select_fields" type="tns:select_fields" /></message>
    <message name="get_entryResponse">
        <part name="return" type="tns:get_entry_result" /></message>
    <message name="get_entriesRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="ids" type="tns:select_fields" />
        <part name="select_fields" type="tns:select_fields" /></message>
    <message name="get_entriesResponse">
        <part name="return" type="tns:get_entry_result" /></message>
    <message name="set_entryRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="name_value_list" type="tns:name_value_list" /></message>
    <message name="set_entryResponse">
        <part name="return" type="tns:set_entry_result" /></message>
    <message name="set_entriesRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="name_value_lists" type="tns:name_value_lists" /></message>
    <message name="set_entriesResponse">
        <part name="return" type="tns:set_entries_result" /></message>
    <message name="set_note_attachmentRequest">
        <part name="session" type="xsd:string" />
        <part name="note" type="tns:note_attachment" /></message>
    <message name="set_note_attachmentResponse">
        <part name="return" type="tns:set_entry_result" /></message>
    <message name="get_note_attachmentRequest">
        <part name="session" type="xsd:string" />
        <part name="id" type="xsd:string" /></message>
    <message name="get_note_attachmentResponse">
        <part name="return" type="tns:return_note_attachment" /></message>
    <message name="relate_note_to_moduleRequest">
        <part name="session" type="xsd:string" />
        <part name="note_id" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="module_id" type="xsd:string" /></message>
    <message name="relate_note_to_moduleResponse">
        <part name="return" type="tns:error_value" /></message>
    <message name="get_related_notesRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="module_id" type="xsd:string" />
        <part name="select_fields" type="tns:select_fields" /></message>
    <message name="get_related_notesResponse">
        <part name="return" type="tns:get_entry_result" /></message>
    <message name="logoutRequest">
        <part name="session" type="xsd:string" /></message>
    <message name="logoutResponse">
        <part name="return" type="tns:error_value" /></message>
    <message name="get_module_fieldsRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" /></message>
    <message name="get_module_fieldsResponse">
        <part name="return" type="tns:module_fields" /></message>
    <message name="get_available_modulesRequest">
        <part name="session" type="xsd:string" /></message>
    <message name="get_available_modulesResponse">
        <part name="return" type="tns:module_list" /></message>
    <message name="update_portal_userRequest">
        <part name="session" type="xsd:string" />
        <part name="portal_name" type="xsd:string" />
        <part name="name_value_list" type="tns:name_value_list" /></message>
    <message name="update_portal_userResponse">
        <part name="return" type="tns:error_value" /></message>
    <message name="get_user_idRequest">
        <part name="session" type="xsd:string" /></message>
    <message name="get_user_idResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="get_user_team_idRequest">
        <part name="session" type="xsd:string" /></message>
    <message name="get_user_team_idResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="get_server_timeRequest"></message>
    <message name="get_server_timeResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="get_gmt_timeRequest"></message>
    <message name="get_gmt_timeResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="get_sugar_flavorRequest"></message>
    <message name="get_sugar_flavorResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="get_server_versionRequest"></message>
    <message name="get_server_versionResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="get_relationshipsRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="module_id" type="xsd:string" />
        <part name="related_module" type="xsd:string" />
        <part name="related_module_query" type="xsd:string" />
        <part name="deleted" type="xsd:int" /></message>
    <message name="get_relationshipsResponse">
        <part name="return" type="tns:get_relationships_result" /></message>
    <message name="set_relationshipRequest">
        <part name="session" type="xsd:string" />
        <part name="set_relationship_value" type="tns:set_relationship_value" /></message>
    <message name="set_relationshipResponse">
        <part name="return" type="tns:error_value" /></message>
    <message name="set_relationshipsRequest">
        <part name="session" type="xsd:string" />
        <part name="set_relationship_list" type="tns:set_relationship_list" /></message>
    <message name="set_relationshipsResponse">
        <part name="return" type="tns:set_relationship_list_result" /></message>
    <message name="set_document_revisionRequest">
        <part name="session" type="xsd:string" />
        <part name="note" type="tns:document_revision" /></message>
    <message name="set_document_revisionResponse">
        <part name="return" type="tns:set_entry_result" /></message>
    <message name="search_by_moduleRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="search_string" type="xsd:string" />
        <part name="modules" type="tns:select_fields" />
        <part name="offset" type="xsd:int" />
        <part name="max_results" type="xsd:int" /></message>
    <message name="search_by_moduleResponse">
        <part name="return" type="tns:get_entry_list_result" /></message>
    <message name="get_mailmerge_documentRequest">
        <part name="session" type="xsd:string" />
        <part name="file_name" type="xsd:string" />
        <part name="fields" type="tns:select_fields" /></message>
    <message name="get_mailmerge_documentResponse">
        <part name="return" type="tns:get_sync_result_encoded" /></message>
    <message name="get_mailmerge_document2Request">
        <part name="session" type="xsd:string" />
        <part name="file_name" type="xsd:string" />
        <part name="fields" type="tns:select_fields" /></message>
    <message name="get_mailmerge_document2Response">
        <part name="return" type="tns:get_mailmerge_document_result" /></message>
    <message name="get_document_revisionRequest">
        <part name="session" type="xsd:string" />
        <part name="i" type="xsd:string" /></message>
    <message name="get_document_revisionResponse">
        <part name="return" type="tns:return_document_revision" /></message>
    <message name="set_campaign_mergeRequest">
        <part name="session" type="xsd:string" />
        <part name="targets" type="tns:select_fields" />
        <part name="campaign_id" type="xsd:string" /></message>
    <message name="set_campaign_mergeResponse">
        <part name="return" type="tns:error_value" /></message>
    <message name="get_entries_countRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="query" type="xsd:string" />
        <part name="deleted" type="xsd:int" /></message>
    <message name="get_entries_countResponse">
        <part name="return" type="tns:get_entries_count_result" /></message>
    <message name="set_entries_detailsRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="name_value_lists" type="tns:name_value_lists" />
        <part name="select_fields" type="tns:select_fields" /></message>
    <message name="set_entries_detailsResponse">
        <part name="return" type="tns:set_entries_detail_result" /></message>
    <message name="sync_get_modified_relationshipsRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="related_module" type="xsd:string" />
        <part name="from_date" type="xsd:string" />
        <part name="to_date" type="xsd:string" />
        <part name="offset" type="xsd:int" />
        <part name="max_results" type="xsd:int" />
        <part name="deleted" type="xsd:int" />
        <part name="module_id" type="xsd:string" />
        <part name="select_fields" type="tns:select_fields" />
        <part name="ids" type="tns:select_fields" />
        <part name="relationship_name" type="xsd:string" />
        <part name="deletion_date" type="xsd:string" />
        <part name="php_serialize" type="xsd:int" /></message>
    <message name="sync_get_modified_relationshipsResponse">
        <part name="return" type="tns:get_entry_list_result_encoded" /></message>
    <message name="get_modified_entriesRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="ids" type="tns:select_fields" />
        <part name="select_fields" type="tns:select_fields" /></message>
    <message name="get_modified_entriesResponse">
        <part name="return" type="tns:get_sync_result_encoded" /></message>
    <message name="get_attendee_listRequest">
        <part name="session" type="xsd:string" />
        <part name="module_name" type="xsd:string" />
        <part name="id" type="xsd:string" /></message>
    <message name="get_attendee_listResponse">
        <part name="return" type="tns:get_sync_result_encoded" /></message>
    <message name="create_sessionRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" /></message>
    <message name="create_sessionResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="end_sessionRequest">
        <part name="user_name" type="xsd:string" /></message>
    <message name="end_sessionResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="contact_by_emailRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="email_address" type="xsd:string" /></message>
    <message name="contact_by_emailResponse">
        <part name="return" type="tns:contact_detail_array" /></message>
    <message name="get_contact_relationshipsRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="id" type="xsd:string" /></message>
    <message name="get_contact_relationshipsResponse">
        <part name="return" type="tns:contact_detail_array" /></message>
    <message name="user_listRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" /></message>
    <message name="user_listResponse">
        <part name="return" type="tns:user_detail_array" /></message>
    <message name="searchRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="name" type="xsd:string" /></message>
    <message name="searchResponse">
        <part name="return" type="tns:contact_detail_array" /></message>
    <message name="track_emailRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="parent_id" type="xsd:string" />
        <part name="contact_ids" type="xsd:string" />
        <part name="date_sent" type="xsd:date" />
        <part name="email_subject" type="xsd:string" />
        <part name="email_body" type="xsd:string" /></message>
    <message name="track_emailResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="create_contactRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="first_name" type="xsd:string" />
        <part name="last_name" type="xsd:string" />
        <part name="email_address" type="xsd:string" /></message>
    <message name="create_contactResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="create_leadRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="first_name" type="xsd:string" />
        <part name="last_name" type="xsd:string" />
        <part name="email_address" type="xsd:string" /></message>
    <message name="create_leadResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="create_accountRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="name" type="xsd:string" />
        <part name="phone" type="xsd:string" />
        <part name="website" type="xsd:string" /></message>
    <message name="create_accountResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="create_opportunityRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="name" type="xsd:string" />
        <part name="amount" type="xsd:string" /></message>
    <message name="create_opportunityResponse">
        <part name="return" type="xsd:string" /></message>
    <message name="create_caseRequest">
        <part name="user_name" type="xsd:string" />
        <part name="password" type="xsd:string" />
        <part name="name" type="xsd:string" /></message>
    <message name="create_caseResponse">
        <part name="return" type="xsd:string" /></message>
    <portType name="sugarsoapPortType">
        <operation name="is_user_admin">
            <input message="tns:is_user_adminRequest"/>
            <output message="tns:is_user_adminResponse"/>
        </operation>
        <operation name="login">
            <input message="tns:loginRequest"/>
            <output message="tns:loginResponse"/>
        </operation>
        <operation name="is_loopback">
            <input message="tns:is_loopbackRequest"/>
            <output message="tns:is_loopbackResponse"/>
        </operation>
        <operation name="seamless_login">
            <input message="tns:seamless_loginRequest"/>
            <output message="tns:seamless_loginResponse"/>
        </operation>
        <operation name="get_entry_list">
            <input message="tns:get_entry_listRequest"/>
            <output message="tns:get_entry_listResponse"/>
        </operation>
        <operation name="get_entry">
            <input message="tns:get_entryRequest"/>
            <output message="tns:get_entryResponse"/>
        </operation>
        <operation name="get_entries">
            <input message="tns:get_entriesRequest"/>
            <output message="tns:get_entriesResponse"/>
        </operation>
        <operation name="set_entry">
            <input message="tns:set_entryRequest"/>
            <output message="tns:set_entryResponse"/>
        </operation>
        <operation name="set_entries">
            <input message="tns:set_entriesRequest"/>
            <output message="tns:set_entriesResponse"/>
        </operation>
        <operation name="set_note_attachment">
            <input message="tns:set_note_attachmentRequest"/>
            <output message="tns:set_note_attachmentResponse"/>
        </operation>
        <operation name="get_note_attachment">
            <input message="tns:get_note_attachmentRequest"/>
            <output message="tns:get_note_attachmentResponse"/>
        </operation>
        <operation name="relate_note_to_module">
            <input message="tns:relate_note_to_moduleRequest"/>
            <output message="tns:relate_note_to_moduleResponse"/>
        </operation>
        <operation name="get_related_notes">
            <input message="tns:get_related_notesRequest"/>
            <output message="tns:get_related_notesResponse"/>
        </operation>
        <operation name="logout">
            <input message="tns:logoutRequest"/>
            <output message="tns:logoutResponse"/>
        </operation>
        <operation name="get_module_fields">
            <input message="tns:get_module_fieldsRequest"/>
            <output message="tns:get_module_fieldsResponse"/>
        </operation>
        <operation name="get_available_modules">
            <input message="tns:get_available_modulesRequest"/>
            <output message="tns:get_available_modulesResponse"/>
        </operation>
        <operation name="update_portal_user">
            <input message="tns:update_portal_userRequest"/>
            <output message="tns:update_portal_userResponse"/>
        </operation>
        <operation name="get_user_id">
            <input message="tns:get_user_idRequest"/>
            <output message="tns:get_user_idResponse"/>
        </operation>
        <operation name="get_user_team_id">
            <input message="tns:get_user_team_idRequest"/>
            <output message="tns:get_user_team_idResponse"/>
        </operation>
        <operation name="get_server_time">
            <input message="tns:get_server_timeRequest"/>
            <output message="tns:get_server_timeResponse"/>
        </operation>
        <operation name="get_gmt_time">
            <input message="tns:get_gmt_timeRequest"/>
            <output message="tns:get_gmt_timeResponse"/>
        </operation>
        <operation name="get_sugar_flavor">
            <input message="tns:get_sugar_flavorRequest"/>
            <output message="tns:get_sugar_flavorResponse"/>
        </operation>
        <operation name="get_server_version">
            <input message="tns:get_server_versionRequest"/>
            <output message="tns:get_server_versionResponse"/>
        </operation>
        <operation name="get_relationships">
            <input message="tns:get_relationshipsRequest"/>
            <output message="tns:get_relationshipsResponse"/>
        </operation>
        <operation name="set_relationship">
            <input message="tns:set_relationshipRequest"/>
            <output message="tns:set_relationshipResponse"/>
        </operation>
        <operation name="set_relationships">
            <input message="tns:set_relationshipsRequest"/>
            <output message="tns:set_relationshipsResponse"/>
        </operation>
        <operation name="set_document_revision">
            <input message="tns:set_document_revisionRequest"/>
            <output message="tns:set_document_revisionResponse"/>
        </operation>
        <operation name="search_by_module">
            <input message="tns:search_by_moduleRequest"/>
            <output message="tns:search_by_moduleResponse"/>
        </operation>
        <operation name="get_mailmerge_document">
            <input message="tns:get_mailmerge_documentRequest"/>
            <output message="tns:get_mailmerge_documentResponse"/>
        </operation>
        <operation name="get_mailmerge_document2">
            <input message="tns:get_mailmerge_document2Request"/>
            <output message="tns:get_mailmerge_document2Response"/>
        </operation>
        <operation name="get_document_revision">
            <input message="tns:get_document_revisionRequest"/>
            <output message="tns:get_document_revisionResponse"/>
        </operation>
        <operation name="set_campaign_merge">
            <input message="tns:set_campaign_mergeRequest"/>
            <output message="tns:set_campaign_mergeResponse"/>
        </operation>
        <operation name="get_entries_count">
            <input message="tns:get_entries_countRequest"/>
            <output message="tns:get_entries_countResponse"/>
        </operation>
        <operation name="set_entries_details">
            <input message="tns:set_entries_detailsRequest"/>
            <output message="tns:set_entries_detailsResponse"/>
        </operation>
        <operation name="sync_get_modified_relationships">
            <input message="tns:sync_get_modified_relationshipsRequest"/>
            <output message="tns:sync_get_modified_relationshipsResponse"/>
        </operation>
        <operation name="get_modified_entries">
            <input message="tns:get_modified_entriesRequest"/>
            <output message="tns:get_modified_entriesResponse"/>
        </operation>
        <operation name="get_attendee_list">
            <input message="tns:get_attendee_listRequest"/>
            <output message="tns:get_attendee_listResponse"/>
        </operation>
        <operation name="create_session">
            <input message="tns:create_sessionRequest"/>
            <output message="tns:create_sessionResponse"/>
        </operation>
        <operation name="end_session">
            <input message="tns:end_sessionRequest"/>
            <output message="tns:end_sessionResponse"/>
        </operation>
        <operation name="contact_by_email">
            <input message="tns:contact_by_emailRequest"/>
            <output message="tns:contact_by_emailResponse"/>
        </operation>
        <operation name="get_contact_relationships">
            <input message="tns:get_contact_relationshipsRequest"/>
            <output message="tns:get_contact_relationshipsResponse"/>
        </operation>
        <operation name="user_list">
            <input message="tns:user_listRequest"/>
            <output message="tns:user_listResponse"/>
        </operation>
        <operation name="search">
            <input message="tns:searchRequest"/>
            <output message="tns:searchResponse"/>
        </operation>
        <operation name="track_email">
            <input message="tns:track_emailRequest"/>
            <output message="tns:track_emailResponse"/>
        </operation>
        <operation name="create_contact">
            <input message="tns:create_contactRequest"/>
            <output message="tns:create_contactResponse"/>
        </operation>
        <operation name="create_lead">
            <input message="tns:create_leadRequest"/>
            <output message="tns:create_leadResponse"/>
        </operation>
        <operation name="create_account">
            <input message="tns:create_accountRequest"/>
            <output message="tns:create_accountResponse"/>
        </operation>
        <operation name="create_opportunity">
            <input message="tns:create_opportunityRequest"/>
            <output message="tns:create_opportunityResponse"/>
        </operation>
        <operation name="create_case">
            <input message="tns:create_caseRequest"/>
            <output message="tns:create_caseResponse"/>
        </operation>
    </portType>
    <binding name="sugarsoapBinding" type="tns:sugarsoapPortType">
        <soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/>
        <operation name="is_user_admin">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/is_user_admin" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="login">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/login" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="is_loopback">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/is_loopback" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="seamless_login">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/seamless_login" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_entry_list">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_entry_list" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_entry">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_entry" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_entries">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_entries" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_entry">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_entry" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_entries">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_entries" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_note_attachment">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_note_attachment" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_note_attachment">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_note_attachment" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="relate_note_to_module">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/relate_note_to_module" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_related_notes">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_related_notes" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="logout">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/logout" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_module_fields">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_module_fields" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_available_modules">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_available_modules" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="update_portal_user">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/update_portal_user" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_user_id">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_user_id" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_user_team_id">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_user_team_id" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_server_time">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_server_time" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_gmt_time">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_gmt_time" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_sugar_flavor">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_sugar_flavor" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_server_version">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_server_version" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_relationships">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_relationships" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_relationship">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_relationship" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_relationships">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_relationships" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_document_revision">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_document_revision" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="search_by_module">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/search_by_module" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_mailmerge_document">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_mailmerge_document" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_mailmerge_document2">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_mailmerge_document2" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_document_revision">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_document_revision" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_campaign_merge">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_campaign_merge" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_entries_count">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_entries_count" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="set_entries_details">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/set_entries_details" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="sync_get_modified_relationships">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/sync_get_modified_relationships" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_modified_entries">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_modified_entries" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_attendee_list">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_attendee_list" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="create_session">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/create_session" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="end_session">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/end_session" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="contact_by_email">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/contact_by_email" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="get_contact_relationships">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/get_contact_relationships" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="user_list">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/user_list" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="search">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/search" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="track_email">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/track_email" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="create_contact">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/create_contact" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="create_lead">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/create_lead" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="create_account">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/create_account" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="create_opportunity">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/create_opportunity" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
        <operation name="create_case">
            <soap:operation soapAction="{$sugar_config['site_url']}/soap.php/create_case" style="rpc"/>
            <input><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
            <output><soap:body use="encoded" namespace="http://www.sugarcrm.com/sugarcrm" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
        </operation>
    </binding>
    <service name="sugarsoap">
        <port name="sugarsoapPort" binding="tns:sugarsoapBinding">
            <soap:address location="{$sugar_config['site_url']}/soap.php"/>
        </port>
    </service>
</definitions>
EOT;
$file = 'data://text/plain;base64,' . base64_encode($xml);
$server = new \SoapServer($file, $options);
global $soap_server_object;
$soap_server_object = $server;

require_once 'soap/SoapSugarUsers.php';
//require_once('soap/SoapSugarUsers_version2.php');
require_once 'soap/SoapData.php';
require_once 'soap/SoapDeprecated.php';

$body = file_get_contents('php://input');

$resourceManager = ResourceManager::getInstance();
$resourceManager->setup('Soap');
$observers = $resourceManager->getObservers();
//Call set_soap_server for SoapResourceObserver instance(s)
foreach ($observers as $observer) {
    if (method_exists($observer, 'set_soap_server')) {
        $observer->set_soap_server($server);
    }
}

$soapAction = '';

if (isset($_SERVER['soapaction'])) {
    // get SOAPAction header
    $v = $_SERVER['soapaction'];
    $v = str_replace('"', '', $v);
    $v = str_replace('\\', '', $v);
    $soapAction = $v;
}

SugarMetric_Manager::getInstance()->setTransactionName('soap_' . $soapAction);

/* Begin the HTTP listener service and exit. */
$server->handle($body);
