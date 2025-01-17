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

$mod_strings = [

    'LBL_ADD_MODULE' => '添加',
    'LBL_ADDRCITY' => '城市',
    'LBL_ADDRCOUNTRY' => '国家',
    'LBL_ADDRCOUNTRY_ID' => '国家 ID',
    'LBL_ADDRSTATEPROV' => '州/省',
    'LBL_ADMINISTRATION' => '连接器管理员',
    'LBL_ADMINISTRATION_MAIN' => '连接器配置',
    'LBL_AVAILABLE' => '可用',
    'LBL_BACK' => '< 返回',
    'LBL_COMPANY_ID' => '公司 ID',
    'LBL_CONFIRM_CONTINUE_SAVE' => '某些必填字段为空。保存更改？',
    'LBL_CONNECTOR' => '连接器',
    'LBL_CONNECTOR_FIELDS' => '连接器字段',
    'LBL_DATA' => '数据',
    'LBL_DEFAULT' => '默认',
    'LBL_DELETE_MAPPING_ENTRY' => '你确定要删除这个入口吗？',
    'LBL_DISABLED' => '禁用',
    'LBL_DUNS' => 'DUNS',
    'LBL_EMPTY_BEANS' => '未找到符合查询条件的记录。',
    'LBL_ENABLED' => '启用',
    'LBL_EXTERNAL' => '使用户能够创造连接器的对外账户记录。',
    'LBL_EXTERNAL_SET_PROPERTIES' => ' 为了使用该连接器，应当在属性设置页面上设置连接器属性。',
    'LBL_FINSALES' => 'Finsales',
    'LBL_MARKET_CAP' => '市值',
    'LBL_MODIFY_DISPLAY_TITLE' => '启用连接器',
    'LBL_MODIFY_DISPLAY_DESC' => '为每个连接器选择启用模块。',
    'LBL_MODIFY_DISPLAY_PAGE_TITLE' => '连接器配置：启用连接器',
    'LBL_MODULE_FIELDS' => '模块字段',
    'LBL_MODIFY_MAPPING_TITLE' => '映射连接器字段',
    'LBL_MODIFY_MAPPING_DESC' => '映射连接器字段到模块字段，以此来决定哪个连接器数据能够被察看且被合并到模块记录中。',
    'LBL_MODIFY_MAPPING_PAGE_TITLE' => '连接器设置：映射连接器字段',
    'LBL_MODIFY_PROPERTIES_TITLE' => '设置连接器属性',
    'LBL_MODIFY_PROPERTIES_DESC' => '为每个连接器设置属性，包括 URL 和 API 密匙。',
    'LBL_MODIFY_PROPERTIES_PAGE_TITLE' => '连接器设置：设置连接器属性',
    'LBL_MODIFY_SEARCH_TITLE' => '管理连接器查询',
    'LBL_MODIFY_SEARCH' => '查找',
    'LBL_MODIFY_SEARCH_DESC' => '为每个模块的数据查询选择连接器字段。',
    'LBL_MODIFY_SEARCH_PAGE_TITLE' => '连接器配置：管理连接器查询',
    'LBL_MODULE_NAME' => '连接器',
    'LBL_MODULE_NAME_SINGULAR' => '连接器',
    'LBL_NO_PROPERTIES' => '这个连接器没有配置属性。',
    'LBL_PARENT_DUNS' => '父商业实体标识符（DUNS）',
    'LBL_PREVIOUS' => '< 返回',
    'LBL_QUOTE' => '报价',
    'LBL_RECNAME' => '公司名称',
    'LBL_RESET_TO_DEFAULT' => '恢复到默认设置',
    'LBL_RESET_TO_DEFAULT_CONFIRM' => '你确定要恢复到默认设置吗？',
    'LBL_RESET_BUTTON_TITLE' => '重置',
    'LBL_RUN_WIZARD' => '运行向导',
    'LBL_SAVE' => '保存',
    'LBL_SHOW_IN_LISTVIEW' => '在合并列表视图中显示',
    'LBL_SMART_COPY' => '智能拷贝',
    'LBL_SUMMARY' => '摘要',
    'LBL_STEP1' => '查找和查看数据',
    'LBL_STEP2' => '合并记录与',
    'LBL_TEST_SOURCE' => '测试连接器',
    'LBL_TEST_SOURCE_FAILED' => '测试失败',
    'LBL_TEST_SOURCE_RUNNING' => '执行测试中...',
    'LBL_TEST_SOURCE_SUCCESS' => '测试成功',
    'LBL_TITLE' => '数据合并',
    'LBL_ULTIMATE_PARENT_DUNS' => '最终父商业实体标识符（DUNS）',
    'ERROR_RECORD_NOT_SELECTED' => '错误：在执行之前，请从列表中选择一条记录。',
    'ERROR_EMPTY_WRAPPER' => '错误：不能为资源获取包装器实例 [{$source_id}]',
    'ERROR_EMPTY_SOURCE_ID' => '错误：源 ID 没有指定或为空值。',
    'ERROR_EMPTY_RECORD_ID' => '错误：记录 ID 没有指定或为空值。',
    'ERROR_NO_ADDITIONAL_DETAIL' => '错误：未找到该记录的额外信息。',
    'ERROR_NO_SEARCHDEFS_DEFINED' => '这个连接器无法启用任何模块。请在启用连接器页面为该连接器选择一个模块。',
    'ERROR_NO_SEARCHDEFS_MAPPED' => '没有启用具有搜索字段定义的连接器。',
    'ERROR_NO_SOURCEDEFS_FILE' => '错误：找不到sourcedefs.php 文件。',
    'ERROR_NO_SOURCEDEFS_SPECIFIED' => '错误：没有指定获取数据的来源。',
    'ERROR_NO_SEARCHDEFS_MAPPING' => '错误：没有为该模块和连接器定义查询字段。请联系系统管理员。',
    'ERROR_NO_FIELDS_MAPPED' => '错误： 您必须为每个模块入口提供至少一个从连接器字段到模块字段的映射。',
    'ERROR_NO_DISPLAYABLE_MAPPED_FIELDS' => '错误：在结果中没有映射好的模块字段以供显示。请联系系统管理员。',
    'LBL_INFO_INLINE' => '信息' /*for 508 compliance fix*/,
    'LBL_CLOSE' => '关闭' /*for 508 compliance fix*/,
    'ERROR_NO_CONNECTOR' => '未发现给定的资源编号的连接器。',
];
