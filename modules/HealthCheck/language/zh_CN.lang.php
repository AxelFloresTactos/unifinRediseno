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
    'LBL_MODULE_NAME' => '健康检查',
    'LBL_MODULE_NAME_SINGULAR' => '健康检查',
    'LBL_MODULE_TITLE' => '健康检查',
    'LBL_LOGFILE' => '日志文件',
    'LBL_BUCKET' => '桶',
    'LBL_FLAG' => '标记',
    'LBL_LOGMETA' => '日志元',
    'LBL_ERROR' => '错误',

    // Failure handling in SugarBPM upgraders
    'LBL_PA_UNSERIALIZE_DATA_FAILURE' => '已序列化的数据无法进行反序列化',
    'LBL_PA_UNSERIALIZE_OBJECT_FAILURE' => '已序列化的数据无法进行反序列化，因为其中包含对象或类别的引用',

    'LBL_SCAN_101_LOG' => '%s 有工作室历史',
    'LBL_SCAN_102_LOG' => '%s 具有扩展：%s',
    'LBL_SCAN_103_LOG' => '%s 具有自定义 vardefs',
    'LBL_SCAN_104_LOG' => '%s 具有自定义 layoutdefs',
    'LBL_SCAN_105_LOG' => '%s 具有自定义 viewdefs',

    'LBL_SCAN_201_LOG' => '%s 不是备用模块',

    'LBL_SCAN_301_LOG' => '%s 将以 BWC 运行',
    'LBL_SCAN_302_LOG' => '未知的文件视图存在 - %s 不是 MB 模块',
    'LBL_SCAN_303_LOG' => '非空表单文件 %s - %s 不是 MB 模块',
    'LBL_SCAN_304_LOG' => '未知文件：%s%s - %s 不是 MB 模块',
    'LBL_SCAN_305_LOG' => '错误 vardefs - 模块 %s 中的 key %s, name %s',
    'LBL_SCAN_306_LOG' => '错误 vardefs - 模块 %s 中的关联字段 %s 有空 `module`',
    'LBL_SCAN_307_LOG' => '错误 vardefs - 模块 %s 中的链接 %s 指的是无效关系',
    'LBL_SCAN_308_LOG' => '%s 内的 Vardef HTML 功能',
    'LBL_SCAN_309_LOG' => '%s 的错误 md5',
    'LBL_SCAN_310_LOG' => '未知文件 %s/%s',
    'LBL_SCAN_311_LOG' => '字段 %s 的 $module 模块内的 Vardef HTML 功能 %s',
    'LBL_SCAN_312_LOG' => '错误 vardefs - &#39;name&#39; 字段类型无效 &#39;%s&#39;, module - &#39;%s&#39;',
    'LBL_SCAN_313_LOG' => '检测到扩展目录 %s - %s 不是 MB 模块',
    'LBL_SCAN_314_LOG' => "错误 vardefs - 带有选项列表 '%s' 键的 multienum 字段 '%s' 包含不兼容字符 - 模块 %s 中的'{%s}'",

    'LBL_SCAN_401_LOG' => '找到包含供应商文件，因为文件已移交给供应商：' . PHP_EOL . '%s',
    'LBL_SCAN_402_LOG' => '错误模块 %s - 不在 beanList 及不在 filesystem',
    'LBL_SCAN_403_LOG' => '发现指定 Sugar 文件包含：' . PHP_EOL . '%s',
    'LBL_SCAN_520_LOG' => '在 %s 检测到的逻辑钩 after_ui_frame',
    'LBL_SCAN_521_LOG' => '在 %s 中检测到的逻辑钩 after_ui_footer',
//    'LBL_SCAN_405_LOG' => 'Incompatible Integration - %s %s',
    'LBL_SCAN_406_LOG' => '%s 有不支持的自定义视图。在升级时，这些自定义视图文件将被移至一个禁用的目录',
    'LBL_SCAN_407_LOG' => '%s 有不支持的自定义视图。在升级时，这些自定义视图文件将被移至一个禁用的目录',
    'LBL_SCAN_408_LOG' => '%s 中发现了自定义创建动作组件。这些组件在升级期间将被复制和修改为创建组件。',
    'LBL_SCAN_409_LOG' => '已弃用错误的 vardefs - “link_file” 。“Link_class” 中指定的链接类必须可自动加载',
    'LBL_SCAN_519_LOG' => '检测扩展目录 %s',
    'LBL_SCAN_518_LOG' => '在 %s, file %s 发现 customCode %s',
    'LBL_SCAN_410_LOG' => '最大字段 - 在 %s 找到超过 %s 的字段 (%s)',
    'LBL_SCAN_522_LOG' => '发现带有 &#39;function:&#39; 的 &#39;get_subpanel_data&#39; %s 中的值',
    'LBL_SCAN_412_LOG' => '错误子面板链接 %s in %s',
    'LBL_SCAN_413_LOG' => '检测到未知小组件 widget class：%s for %s, module %s in file %s',
    'LBL_SCAN_414_LOG' => '未知字段被 CRYS-36 处理，无需进一步检查',
    'LBL_SCAN_415_LOG' => '%s: %s 中的错误钩文件',
    'LBL_SCAN_523_LOG' => '钩文件 %s function %s 中的 By-ref 参数',
    'LBL_SCAN_417_LOG' => '不兼容模块 %s',
    'LBL_SCAN_418_LOG' => '发现连接到不存在模块的子面板：%s 文件中的 %s',
    'LBL_SCAN_419_LOG' => '错误 vardefs - 模块 %s 中的 key %s, name %s',
    'LBL_SCAN_420_LOG' => '错误 vardefs - 模块 %s 中的关联字段 %s 有空 `module`',
    'LBL_SCAN_421_LOG' => '错误 vardefs - 模块 %s 中的链接 %s 指的是无效关系',
    'LBL_SCAN_422_LOG' => '模块 %s 有文件 %s 中的另一个模块 %s 的定义。',
    'LBL_SCAN_525_LOG' => '%s 内的 Vardef HTML 功能',
    'LBL_SCAN_423_LOG' => '错误 vardefs 子域 - %s 指的是错误子域 %s。位于模块 %s',
    'LBL_SCAN_424_LOG' => '发现 Inline HTML 在 %s on line %s',
    'LBL_SCAN_425_LOG' => '发现 "echo" in %s on line %s',
    'LBL_SCAN_426_LOG' => '发现 "print" in %s on line %s',
    'LBL_SCAN_427_LOG' => '发现 "die/exit" in %s on line %s',
    'LBL_SCAN_428_LOG' => '发现 "print_r" in %s on line %s',
    'LBL_SCAN_429_LOG' => '发现 "var_dump" in %s on line %s',
    'LBL_SCAN_430_LOG' => '发现 output buffering (%s) in %s on line %s',
    'LBL_SCAN_431_LOG' => '发现自定义 Smarty 模板："%s"',
    'LBL_SCAN_436_LOG' => '发现自定义 PDF 模板："%s"',
    'LBL_SCAN_437_LOG' => 'Smarty 模板与 Smarty3 语法："%s" 不兼容',
    'LBL_SCAN_438_LOG' => '发现无法自动转换为 Smarty3 语法的自定义 PDF 模板："%s"',
    'LBL_SCAN_439_LOG' => '模板与 Smarty3 语法不兼容，已跳过："%s"。',
    'LBL_SCAN_451_LOG' => 'AuthN 代码已删除，请改为使用 \\IdMSugarAuthenticate、\\IdMSAMLAuthenticate、\\IdMLDAPAuthenticate。使用已删除代码的文件有：' . PHP_EOL . '%s',
    'LBL_SCAN_524_LOG' => '字段 %s 的 %s 模块中的 Vardef HTML 函数 %s',
    'LBL_SCAN_432_LOG' => '错误 vardefs - &#39;name&#39; 字段类型无效 &#39;%s&#39;, module - &#39;%s&#39;',
    'LBL_SCAN_526_LOG' => "错误 vardefs - 带有选项列 '%s' 键的 multienum 字段 '%s' 包含不兼容字符 - 在模块 %s 中的 '%s'",
    'LBL_SCAN_527_LOG' => '表名称 in bean %s 不匹配 %s/vardefs.php 中的表属性',
    'LBL_SCAN_528_LOG' => '字段 %s of %s 模块有不正确的 display_default 值',
    'LBL_SCAN_529_LOG' => '%s: %s in file %s on line %s',
    'LBL_SCAN_530_LOG' => '遗失自定义文件：%s',
    'LBL_SCAN_531_LOG' => '已废弃的数据库驱动程序：%s',
    'LBL_SCAN_532_LOG' => 'A class in %s calls its stock parent&#39;s constructor as %s::%s()',
    'LBL_SCAN_533_LOG' => 'A class in %s calls its custom parent&#39;s constructor as %s::%s()',
    'LBL_SCAN_534_LOG' => '不支持的数据库驱动程序：%s',
    'LBL_SCAN_535_LOG' => 'Unsupported method call: %s() in %s on line %s',
    'LBL_SCAN_536_LOG' => 'Unsupported property access: $%s in %s on line %s',
    'LBL_SCAN_433_LOG' => '已找到自定义弹性搜索文件 %s',
    'LBL_SCAN_434_LOG' => '在文件的 $_SESSION 上找到数组函数的用法：%s',
    'LBL_SCAN_435_LOG' => '类别 SugarSession 已从 API 中删除，使用 Sugarcrm\\Sugarcrm\\Session\\SessionStorage 替代。包含已废弃代码的文件： ' . PHP_EOL . '%s',
    'LBL_SCAN_550_LOG' => 'Use of removed Sidecar app.date APIs in %s',
    'LBL_SCAN_551_LOG' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_560_LOG' => 'custom/modules/Quotes/quotes.js 可能包含与新报价不符的自定义内容。',
    'LBL_SCAN_561_LOG' => 'custom/modules/Quotes/EditView.js 可能包含与新报价不符的自定义内容。',
    'LBL_SCAN_562_LOG' => 'Use of removed Sidecar app.view.invokeParent method in %s',
    'LBL_SCAN_563_LOG' => '使用不兼容的 Monolog 自定义：%s',
    'LBL_SCAN_564_LOG' => '使用过时的 DBAL 功能： %s',
    'LBL_SCAN_565_LOG' => '使用弃用的配置属性 $sugar_config[&#39;passwordHash&#39;]。从第 13.3 版开始，它将不受支持：%s',
    'LBL_SCAN_566_LOG' => '使用不受支持的配置属性 $sugar_config[&#39;passwordHash&#39;]：%s',
    'LBL_SCAN_567_LOG' => '使用已删除的 Zend Framework 组件：%s',
    'LBL_SCAN_568_LOG' => '使用过时的 Zend Framework 组件：%s',
    'LBL_SCAN_570_LOG' => '电子邮件的状态和类型无效：状态=%s，类型=%s',
    'LBL_SCAN_571_LOG' => '已废弃的文件有自定义：%s',
    'LBL_SCAN_572_LOG' => '自定义文件有名称冲突：%s',
    'LBL_SCAN_573_LOG' => '自定义帮助文件有名称冲突：%s',
    'LBL_SCAN_574_LOG' => '电子邮件子面板存在自定义目录：%s',
    'LBL_SCAN_575_LOG' => '电子邮件的联系人子面板需要更改才能使用联系人已存档电子邮件子面板：%s',
    'LBL_SCAN_576_LOG' => '已在以下位置检测到皮肤自定义：‘%s’。最终皮肤结果可能不会按照预期的方式工作，请检查您的皮肤自定义。',
    'LBL_SCAN_580_LOG' => 'Removed jQuery function(s) detected in: `%s`.',
    'LBL_SCAN_585_LOG' => '在 `%s`: %s 中检测到禁止语句',
    'LBL_SCAN_586_LOG' => 'FontAwesome 自 11.2 起已被弃用，在 12.0 中将不受支持。检测到 FontAwome 的使用：在 %s 中',
    'LBL_SCAN_587_LOG' => '从 13.1 开始，LESS 变量的子集将被弃用，并且在 14.0 中将不受支持。在以下位置检测到已弃用的 LESS 变量的使用： %s',

    'LBL_SCAN_501_LOG' => '缺失文件：%s',
    'LBL_SCAN_502_LOG' => 'md5 不匹配 %s, expected %s',
    'LBL_SCAN_503_LOG' => '自定义模块 和新 Sugar7 模块名字一样: %s',
    'LBL_SCAN_504_LOG' => '在模块 %s 中文件类型缺失：%s',
    'LBL_SCAN_505_LOG' => '%s for field %s 中类型更改：从 %s 改为 %s',
    'LBL_SCAN_506_LOG' => '$this 在 %s 中的应用',
    'LBL_SCAN_507_LOG' => '错误 vardefs 子域 - %s 指的是错误子域 %s。位于模块 %s',
    'LBL_SCAN_508_LOG' => '发现 Inline HTML 在 %s on line %s',
    'LBL_SCAN_509_LOG' => '发现 "echo" in %s on line %s',
    'LBL_SCAN_510_LOG' => '发现 "print" in %s on line %s',
    'LBL_SCAN_511_LOG' => '发现 "die/exit" in %s on line %s',
    'LBL_SCAN_512_LOG' => '发现 "print_r" in %s on line %s',
    'LBL_SCAN_513_LOG' => '发现 "var_dump" in %s on line %s',
    'LBL_SCAN_514_LOG' => '发现 output buffering (%s) in %s on line %s',
    'LBL_SCAN_515_LOG' => '脚本失败：%s',
    'LBL_SCAN_516_LOG' => '之前删除的文件中发现参考：%s',
    'LBL_SCAN_517_LOG' => '不兼容的集成 - %s %s',
    'LBL_SCAN_540_LOG' => '不兼容的整合数据重置 - %s %s',
    'LBL_SCAN_541_LOG' => '无效的 SugarBPM 序列化 - %s 表格第 %s 列中的 %s 无效的序列化：%s。',
    'LBL_SCAN_542_LOG' => '无效的 SugarBPM 字段使用 - 在 %s 中使用了 %s 无效的字段。',
    'LBL_SCAN_545_LOG' => 'SugarBPM 部分锁定字段组 - %s 模块的 %s 流程定义中，%s 字段组中的 %4$s 字段被锁定。',
    'LBL_SCAN_546_LOG' => 'Custom Knowledge Base TinyMCE config',
    'LBL_SCAN_547_LOG' => '%s中已移除的“resetLoadFlag”签名的用途',
    'LBL_SCAN_548_LOG' => '%s中已废弃的“initButtons”方法的用途',
    'LBL_SCAN_549_LOG' => '%s中已移除的“getField”签名的用途',
    'LBL_SCAN_552_LOG' => 'Use of removed Underscore APIs in %s',
    'LBL_SCAN_553_LOG' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_554_LOG' => 'Sidecar controller %s extends from removed Sidecar controller',

    'LBL_SCAN_901_LOG' => '实例已经升级到 Sugar 7',
    'LBL_SCAN_903_LOG' => '不支持的升级程序版本。请安装合适的 SugarUpgradeWizardPrereq 程序包',
    'LBL_SCAN_904_LOG' => '在 moduleList 字符串中找到空值。文件：%s，模块：%s',
    'LBL_SCAN_999_LOG' => '未知的故障，请咨询支持部门',

    'LBL_SCAN_101_TITLE' => '%s 有工作室历史',
    'LBL_SCAN_102_TITLE' => '%s 具有扩展：%s',
    'LBL_SCAN_103_TITLE' => '%s 具有自定义 vardefs',
    'LBL_SCAN_104_TITLE' => '%s 具有自定义 layoutdefs',
    'LBL_SCAN_105_TITLE' => '%s 具有自定义 viewdefs',

    'LBL_SCAN_201_TITLE' => '%s 不是备用模块',

    'LBL_SCAN_301_TITLE' => '%s 将以 BWC 运行',
    'LBL_SCAN_302_TITLE' => '未知的文件视图存在 - %s 不是 MB 模块',
    'LBL_SCAN_303_TITLE' => '非空表单文件 %s - %s 不是 MB 模块',
    'LBL_SCAN_304_TITLE' => '未知文件：%s%s - %s 不是 MB 模块',
    'LBL_SCAN_305_TITLE' => '错误 vardefs - 模块 %s 中的 key %s, name %s',
    'LBL_SCAN_306_TITLE' => '错误 vardefs - 模块 %s 中的关联字段 %s 有空 `module`',
    'LBL_SCAN_307_TITLE' => '错误 vardefs - 模块 %s 中的链接 %s 指的是无效关系',
    'LBL_SCAN_308_TITLE' => '%s 内的 Vardef HTML 功能',
    'LBL_SCAN_309_TITLE' => '%s 的错误 md5',
    'LBL_SCAN_310_TITLE' => '未知文件 %s/%s',
    'LBL_SCAN_311_TITLE' => '字段 %s 的 $module 模块内的 Vardef HTML 功能 %s',
    'LBL_SCAN_312_TITLE' => '错误 vardefs - &#39;name&#39; 字段类型无效 &#39;%s&#39;, module - &#39;%s&#39;',
    'LBL_SCAN_313_TITLE' => '检测到扩展目录 %s - %s 不是 MB 模块',

    'LBL_SCAN_401_TITLE' => '找到包含供应商文件，因为文件已移交给供应商：' . PHP_EOL . '%s',
    'LBL_SCAN_402_TITLE' => '错误模块 %s - 不在 beanList 及不在 filesystem',
    'LBL_SCAN_403_TITLE' => '发现指定 Sugar 文件包含：' . PHP_EOL . '%s',
    'LBL_SCAN_520_TITLE' => '在 %s 检测到的逻辑钩 after_ui_frame',
    'LBL_SCAN_521_TITLE' => '在 %s 中检测到的逻辑钩 after_ui_footer',
//    'LBL_SCAN_405_TITLE' => 'Incompatible Integration - %s %s',
    'LBL_SCAN_406_TITLE' => '%s 有不支持的自定义视图。在升级时，这些自定义视图文件将被移至一个禁用的目录',
    'LBL_SCAN_407_TITLE' => '%s 有不支持的自定义视图。在升级时，这些自定义视图文件将被移至一个禁用的目录',
    'LBL_SCAN_408_TITLE' => '已找到自定义的创建动作组建，但已不再受支持。',
    'LBL_SCAN_409_TITLE' => '错误的 vardefs-%s 模块对 %s 字段具有无效的 vardefs。',
    'LBL_SCAN_519_TITLE' => '检测扩展目录 %s',
    'LBL_SCAN_518_TITLE' => '在 %s, file %s 发现 customCode %s',
    'LBL_SCAN_410_TITLE' => '最大字段 - 在 %s 找到超过 %s 的字段 (%s)',
    'LBL_SCAN_522_TITLE' => '发现带有 &#39;function:&#39; 的 &#39;get_subpanel_data&#39; %s 中的值',
    'LBL_SCAN_412_TITLE' => '错误子面板链接 %s in %s',
    'LBL_SCAN_413_TITLE' => '检测到未知小组件 widget class：%s for %s, module %s in file %s',
    'LBL_SCAN_414_TITLE' => '未知字段被 CRYS-36 处理，无需进一步检查',
    'LBL_SCAN_415_TITLE' => '%s: %s 中的错误钩文件',
    'LBL_SCAN_523_TITLE' => '钩文件 %s function %s 中的 By-ref 参数',
    'LBL_SCAN_417_TITLE' => '不兼容模块 %s',
    'LBL_SCAN_418_TITLE' => '发现连接到不存在模块的子面板：%s 文件中的 %s',
    'LBL_SCAN_419_TITLE' => '错误 vardefs - 模块 %s 中的 key %s, name %s',
    'LBL_SCAN_420_TITLE' => '错误 vardefs - 模块 %s 中的关联字段 %s 有空 `module`',
    'LBL_SCAN_421_TITLE' => '错误 vardefs - 模块 %s 中的链接 %s 指的是无效关系',
    'LBL_SCAN_422_TITLE' => '模块 %s 具有另一个模块的定义',
    'LBL_SCAN_525_TITLE' => '%s 内的 Vardef HTML 功能',
    'LBL_SCAN_423_TITLE' => '错误 vardefs 子域 - %s 指的是错误子域 %s。位于模块 %s',
    'LBL_SCAN_424_TITLE' => '发现 Inline HTML 在 %s on line %s',
    'LBL_SCAN_425_TITLE' => '发现 "echo" in %s on line %s',
    'LBL_SCAN_426_TITLE' => '发现 "print" in %s on line %s',
    'LBL_SCAN_427_TITLE' => '发现 "die/exit" in %s on line %s',
    'LBL_SCAN_428_TITLE' => '发现 "print_r" in %s on line %s',
    'LBL_SCAN_429_TITLE' => '发现 "var_dump" in %s on line %s',
    'LBL_SCAN_430_TITLE' => '发现 output buffering (%s) in %s on line %s',
    'LBL_SCAN_431_TITLE' => '发现自定义 Smarty 模板："%s"',
    'LBL_SCAN_436_TITLE' => '发现自定义 PDF 模板："%s"',
    'LBL_SCAN_437_TITLE' => 'Smarty 模板与 Smarty3 语法："%s" 不兼容',
    'LBL_SCAN_438_TITLE' => '发现无法自动转换为 Smarty3 语法的自定义 PDF 模板："%s"',
    'LBL_SCAN_439_TITLE' => '模板与 Smarty3 语法不兼容，已跳过："%s"。',
    'LBL_SCAN_451_TITLE' => 'AuthN 代码已删除，请改为使用 \\IdMSugarAuthenticate、\\IdMSAMLAuthenticate、\\IdMLDAPAuthenticate。使用已删除代码的文件有：' . PHP_EOL . '%s',
    'LBL_SCAN_524_TITLE' => '字段 %s 的 %s 模块中的 Vardef HTML 函数 %s',
    'LBL_SCAN_432_TITLE' => '错误 vardefs - &#39;name&#39; 字段类型无效 &#39;%s&#39;, module - &#39;%s&#39;',
    'LBL_SCAN_433_TITLE' => '已找到自定义弹性搜索文件 %s',
    'LBL_SCAN_434_TITLE' => '在文件的 $_SESSION 上找到数组函数的用法：%s',
    'LBL_SCAN_435_TITLE' => '找到已删除的 SugarSession 类型的使用',
    'LBL_SCAN_550_TITLE' => 'Use of removed Sidecar app.date APIs in %s',
    'LBL_SCAN_551_TITLE' => 'Use of removed Sidecar Bean APIs in %s',

    'LBL_SCAN_501_TITLE' => '缺失文件：%s',
    'LBL_SCAN_502_TITLE' => 'md5 不匹配 %s, expected %s',
    'LBL_SCAN_503_TITLE' => '自定义模块 和新 Sugar7 模块名字一样: %s',
    'LBL_SCAN_504_TITLE' => '在模块 %s 中文件类型缺失：%s',
    'LBL_SCAN_505_TITLE' => '%s for field %s 中类型更改：从 %s 改为 %s',
    'LBL_SCAN_506_TITLE' => '$this 在 %s 中的应用',
    'LBL_SCAN_507_TITLE' => '错误的 vardefs 子字段 - %s 指向模块 %s 中错误的子字段 %s',
    'LBL_SCAN_508_TITLE' => '发现 Inline HTML 在 %s on line %s',
    'LBL_SCAN_509_TITLE' => '发现 "echo" in %s on line %s',
    'LBL_SCAN_510_TITLE' => '发现 "print" in %s on line %s',
    'LBL_SCAN_511_TITLE' => '发现 "die/exit" in %s on line %s',
    'LBL_SCAN_512_TITLE' => '发现 "print_r" in %s on line %s',
    'LBL_SCAN_513_TITLE' => '发现 "var_dump" in %s on line %s',
    'LBL_SCAN_514_TITLE' => '发现 output buffering (%s) in %s on line %s',
    'LBL_SCAN_515_TITLE' => '脚本失败：%s',
    'LBL_SCAN_517_TITLE' => '不兼容的集成 - %s %s',
    'LBL_SCAN_526_TITLE' => "错误 vardefs - 带有选项列 '%s' 键的 multienum 字段 '%s' 包含不兼容字符 - 在模块 %s 中的 '%s'",
    'LBL_SCAN_528_TITLE' => '字段 %s of %s 模块有不正确的 display_default 值',
    'LBL_SCAN_529_TITLE' => '%s: %s in file %s on line %s',
    'LBL_SCAN_530_TITLE' => '遗失自定义文件：%s',
    'LBL_SCAN_531_TITLE' => '已废弃的数据库驱动程序：%s',
    'LBL_SCAN_532_TITLE' => 'Stock parent PHP4 constructor call in %s',
    'LBL_SCAN_533_TITLE' => 'Custom parent PHP4 constructor call in %s',
    'LBL_SCAN_534_TITLE' => '不支持的数据库驱动程序：%s',
    'LBL_SCAN_535_TITLE' => 'Unsupported method call: %s()',
    'LBL_SCAN_536_TITLE' => 'Unsupported property access: $%s',
    'LBL_SCAN_540_TITLE' => '不兼容的整合数据重置 - %s %s',
    'LBL_SCAN_541_TITLE' => '无效的 SugarBPM 序列化 - %s 表格第 %s 列中的 %s 无效的序列化：%s',
    'LBL_SCAN_542_TITLE' => '无效的 SugarBPM 字段使用 - 在 %s 中使用了 %s 无效的字段。',
    'LBL_SCAN_545_TITLE' => 'SugarBPM 部分锁定字段组 - %3$s 模块：%s 流程定义中的 %s 字段组被部分锁定。',
    'LBL_SCAN_546_TITLE' => 'Custom Knowledge Base TinyMCE config',
    'LBL_SCAN_547_TITLE' => '%s中已移除的“resetLoadFlag”签名的用途',
    'LBL_SCAN_548_TITLE' => '%s中已废弃的“initButtons”方法的用途',
    'LBL_SCAN_549_TITLE' => '%s中已移除的“getField”签名的用途',
    'LBL_SCAN_552_TITLE' => 'Use of removed Underscore APIs in %s',
    'LBL_SCAN_553_TITLE' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_554_TITLE' => 'Sidecar controller %s extends from removed Sidecar controller',
    'LBL_SCAN_567_TITLE' => '使用已删除的 Zend Framework 组件',
    'LBL_SCAN_568_TITLE' => '使用过时的 Zend Framework 组件',
    'LBL_SCAN_570_TITLE' => '在电子邮件中发现意外值',
    'LBL_SCAN_571_TITLE' => '自定义文件含有已被废弃的代码',
    'LBL_SCAN_572_TITLE' => '自定义文件存在名称冲突',
    'LBL_SCAN_573_TITLE' => '自定义帮助文件存在名称冲突',
    'LBL_SCAN_574_TITLE' => '电子邮件子面板有自定义',
    'LBL_SCAN_575_TITLE' => '电子邮件的联系人子面板有自定义',
    'LBL_SCAN_576_TITLE' => '已检测到皮肤自定义',
    'LBL_SCAN_580_TITLE' => 'Removed jQuery function(s) detected',
    'LBL_SCAN_585_TITLE' => '检测到禁止语句',
    'LBL_SCAN_586_TITLE' => '检测到 FontAwesome 的废弃使用',
    'LBL_SCAN_587_TITLE' => '检测到的已弃用的 LESS 颜色变量。',

    'LBL_SCAN_901_TITLE' => '实例已经升级到 Sugar 7',
    'LBL_SCAN_903_TITLE' => '不支持的升级程序版本',
    'LBL_SCAN_904_TITLE' => '在 moduleList 字符串中发现空值',
    'LBL_SCAN_999_TITLE' => '未知的故障，请咨询支持部门',

    'LBL_SCAN_101_DESCR' => '检测到您实例中的工作室定制。我们没有预期这些定制有任何问题，您可以升级到Sugar7。',
    'LBL_SCAN_102_DESCR' => '检测到您实例中的工作室定制。我们没有预期这些定制有任何问题，您可以升级到Sugar7。',
    'LBL_SCAN_103_DESCR' => '检测到您实例中的工作室定制。我们没有预期这些定制有任何问题，您可以升级到Sugar7。',
    'LBL_SCAN_104_DESCR' => '检测到您实例中的工作室定制。我们没有预期这些定制有任何问题，您可以升级到Sugar7。',
    'LBL_SCAN_105_DESCR' => '检测到您实例中的工作室定制。我们没有预期这些定制有任何问题，您可以升级到Sugar7。',

    'LBL_SCAN_201_DESCR' => '检测到您实例中的工作室定制。我们没有预期这些定制有任何问题，您可以升级到Sugar7。',

    'LBL_SCAN_301_DESCR' => '检测到某些自定义项，并没有迁移到 Sugar7。这个模块 (%s) 将继续是可用的，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_302_DESCR' => '检测到未知文件视图，且没有迁移到 Sugar7。这个模块(%s)将继续可用，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_303_DESCR' => '检测到非空表格文件，且没有迁移到 Sugar7。这个模块(%s)将继续可用，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_304_DESCR' => '检测到未知文件 (%s%s)，且没有迁移到 Sugar7。这个模块(%s)将继续可用，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_305_DESCR' => '在模块 %s 中检测到错误 vardefs(%s: %s) ，且没有迁移到 Sugar7。这个定制将继续可用，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_306_DESCR' => '检测到错误 vardefs，且没有迁移到 Sugar7。模块 %s 中的相关字段 (%s) 有一个空`module`)。这个定制将继续可用，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_307_DESCR' => '检测到错误 vardefs，且没有迁移到 Sugar7。模块 %s 中的链接 (%s) 指的是无效关系。这个定制将继续可用，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_308_DESCR' => '检测到某些自定义项，并没有迁移到 Sugar7。这个模块 (%s) 将继续是可用的，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_309_DESCR' => 'An md5 hash for %s 不匹配 box 文件。此文件已经被修改且不能升级到 Sugar7',
    'LBL_SCAN_310_DESCR' => '检测到未知视图文件 (%s) 并无法迁移到 Sugar7。这个模块 (%s) 还将存在，但会在 Sugar 7 中以向后里兼容模式下运行。',
    'LBL_SCAN_311_DESCR' => '检测到某些自定义项，并没有迁移到 Sugar7。这个模块 (%s) 将继续是可用的，但它将在 Sugar7 中以向后兼容方式运行。',
    'LBL_SCAN_312_DESCR' => '检测到错误 vardefs 并无法迁移到 Sugar7。错误 vardefs: 模块 &#39;%s&#39; 中的 &#39;name&#39; 字段类型无效 &#39;%s&#39; 。这个自定义操作还继续可运行，但要在 Sugar7 中以向后兼容模式下运行。',
    'LBL_SCAN_313_DESCR' => '检测到扩展目录 - %s 不是一个 Module Builder 模块。这个模块还将继续存在，但仅以向后兼容模式运行。',

    'LBL_SCAN_401_DESCR' => '自定义文件包含已被移到供应商文件夹的一个文件。我们已经试图采取纠正行为，无需采取下一步动作。',
    'LBL_SCAN_402_DESCR' => '错误模块 %s - 不在 beanList 及不在 filesystem',
    'LBL_SCAN_403_DESCR' => 'Sugar 7 内某些 Sugar 文件已变更位置。我们需要纠正这些文件的包含路径。',
    'LBL_SCAN_520_DESCR' => '在 Sugar 7 中不再支持逻辑勾',
    'LBL_SCAN_521_DESCR' => '在 Sugar 7 中不再支持逻辑勾',
//    'LBL_SCAN_405_DESCR' => 'Package detected which has been blacklisted as not supported in Sugar 7',
    'LBL_SCAN_406_DESCR' => '库存的 Sugar 具有在 custom/modules/%s/views 中不被支持的自定义视图。这些自定义视图文件将在升级的时候移至一个禁用的目录',
    'LBL_SCAN_407_DESCR' => '库存的 Sugar 具有在 modules/%s/views 中不被支持的自定义视图。这些自定义视图文件将在升级的时候移至一个禁用的目录',
    'LBL_SCAN_408_DESCR' => '%s 中发现了自定义创建动作组件。这些组件在升级期间将被复制和修改为创建组件。',
    'LBL_SCAN_409_DESCR' => '已弃用 vardefs 中的 “link_file” 属性。链接类必须可自动加载',
    'LBL_SCAN_519_DESCR' => '库存的 Sugar 具有一个我们不支持升级的扩展，例如自定义路由、访问控制、javascript 等等',
    'LBL_SCAN_518_DESCR' => 'Vardefs 包含我们无法转换的用户自定义代码定义',
    'LBL_SCAN_410_DESCR' => '在视图中的字段太多',
    'LBL_SCAN_522_DESCR' => '通过一个函数获取子面板数据，我们目前还不支持升级。',
    'LBL_SCAN_412_DESCR' => '子面板指向不存在或定义不正确的链接',
    'LBL_SCAN_413_DESCR' => '字段是指不具有匹配小部件类文件的小部件类名称',
    'LBL_SCAN_414_DESCR' => '未知字段被 CRYS-36 处理，无需进一步检查',
    'LBL_SCAN_415_DESCR' => '逻辑钩指不存在的文件',
    'LBL_SCAN_523_DESCR' => '旧逻辑勾文件采用按资料传递参数，可能导致显示出错信息（进而搞乱 REST）',
    'LBL_SCAN_417_DESCR' => '检测到应该不存在的模块 Feeds 或 iFrames',
    'LBL_SCAN_418_DESCR' => '子面板指一个不存在的模块',
    'LBL_SCAN_419_DESCR' => 'Vardef 关键值不匹配 Vardef 名称',
    'LBL_SCAN_420_DESCR' => 'Vardef 包含指不能正确加载关系的关联字段',
    'LBL_SCAN_421_DESCR' => 'Vardef 包含不能正确加载的链接字段',
    'LBL_SCAN_422_DESCR' => '模块 %s 有文件 %s 中的另一个模块 %s 的定义。',
    'LBL_SCAN_525_DESCR' => 'Vardef 定义 enum，这是 HTML 功能的结果，不是支持Sugar7 的结果',
    'LBL_SCAN_423_DESCR' => 'Vardef 被定义为包含子字段的复合字段，其中有的子字段实际并不存在',
    'LBL_SCAN_424_DESCR' => '文件包含内联 HTML',
    'LBL_SCAN_425_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_426_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_427_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_428_DESCR' => '代码包含这个 output-producing 功能。注意 print_r(..., true) 是允许的。',
    'LBL_SCAN_429_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_430_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_431_DESCR' => '它将被转换以符合 Smarty3 语法',
    'LBL_SCAN_436_DESCR' => '它将被转换以符合 Smarty3 语法',
    'LBL_SCAN_437_DESCR' => '无法转换 .tpl 文件中存在的语法以兼容 Smarty3。为了升级实例，请手动修复它。',
    'LBL_SCAN_438_DESCR' => '无法转换自定义 PDF 模板以符合 Smarty 3 语法。为了升级实例，请手动修复它。',
    'LBL_SCAN_439_DESCR' => '无法转换 .tpl 文件中存在的语法以兼容 Smarty3。它已被跳过。如果它是一个有效的 Smarty 模板，请手动修复它。',
    'LBL_SCAN_451_DESCR' => 'AuthN 代码已删除，请改为使用 \\IdMSugarAuthenticate、\\IdMSAMLAuthenticate、\\IdMLDAPAuthenticate',
    'LBL_SCAN_524_DESCR' => '字段被定义为产生 HTML 的功能并且不可自动转换（我们知道如何转换如电子邮件和货币之类的内有字段）',
    'LBL_SCAN_432_DESCR' => '字段 &#39;name&#39; 有一个不同于名字，全名，varchar 或 id 的类型',
    'LBL_SCAN_433_DESCR' => '已找到自定义弹性搜索文件 %s',
    'LBL_SCAN_434_DESCR' => '在文件的 $_SESSION 上找到数组函数的用法：%s',
    'LBL_SCAN_550_DESCR' => 'Use of removed Sidecar app.date APIs in %s, this code will be migrated by upgrade scripts',
    'LBL_SCAN_551_DESCR' => 'Use of removed Sidecar Bean APIs in %s, this code will be migrated by upgrade scripts',

    'LBL_SCAN_501_DESCR' => '实例中不存在的其中一个核心文件',
    'LBL_SCAN_502_DESCR' => '在此次安装中已被修改的一个核心文件',
    'LBL_SCAN_503_DESCR' => '自定义模块和一个新 Sugar 模块中具有相同的名称',
    'LBL_SCAN_504_DESCR' => 'Vardef 字段定义省略类型',
    'LBL_SCAN_505_DESCR' => '非 blob 字段类型更改为 blob 字段类型。这是不允许的，因为 blob 类型不可以被索引，我们可能拥有依托此被索引的字段的筛选器。',
    'LBL_SCAN_506_DESCR' => '$this 用于元数据文件。因为在不同的语境，在 Sugar7 中加载元数据文件时，它就会失败。',
    'LBL_SCAN_507_DESCR' => 'Vardef 被定义为包含子字段的复合字段，其中有的子字段实际并不存在',
    'LBL_SCAN_508_DESCR' => '文件包含内联 HTML',
    'LBL_SCAN_509_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_510_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_511_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_512_DESCR' => '代码包含这个 output-producing 功能。注意 print_r(..., true) 是允许的。',
    'LBL_SCAN_513_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_514_DESCR' => '代码包含这个 output-producing 功能',
    'LBL_SCAN_515_DESCR' => '检查脚本失败，这意味着 instaScannerMeta.phpnce 可能含有脚本尝试加载的坏 PHP 码。',
    'LBL_SCAN_517_DESCR' => '由于不支持 Sugar 7，检测到拒绝名单中的程序包',
    'LBL_SCAN_526_DESCR' => '此列表包含不能升级的项目名称值',
    'LBL_SCAN_528_DESCR' => '日期/日期时间/时间字段中含有不正确的 display_default 值，例如 -none-',
    'LBL_SCAN_529_DESCR' => 'PHP 出错可能是因传译器发现不正确的 php-syntax 或一些run-time 代码问题而被触发。',
    'LBL_SCAN_530_DESCR' => '其中一个定制文件不存在实例中，取而代之的是自定义代码。',
    'LBL_SCAN_531_DESCR' => '%s 数据库驱动程序已废弃。请考虑使用 %s 作为代替。',
    'LBL_SCAN_532_DESCR' => 'A class declared in %s calls its stock parent&#39;s constructor as %s::%s()',
    'LBL_SCAN_533_DESCR' => 'A class declared in %s calls its custom parent&#39;s constructor as %s::%s()',
    'LBL_SCAN_534_DESCR' => '不再支持 %s 数据库驱动程序。请考虑使用 %s 作为代替。',
    'LBL_SCAN_535_DESCR' => 'A call to unsupported method %s() found in %s on line %d',
    'LBL_SCAN_536_DESCR' => 'Access to an unsupported property $%s found in %s on line %d',
    'LBL_SCAN_540_DESCR' => '检测到列入目标Sugar版本不支持的拒绝名单上的软件包。这些软件包必需在升级前卸载并删除。请注意：这些软件包的卸载也包括删除软件包所生成的表单和数据以及软件包各模块的应用。',
    'LBL_SCAN_541_DESCR' => '在未序列化或未转换的流程管理表中发现了数据',
    'LBL_SCAN_542_DESCR' => '在您的流程管理商务规则和/或操作中找到了无效的字段。必须从商务规则和/或操作中删除这些字段才能升级。',
    'LBL_SCAN_545_DESCR' => '流程定义中的一组字段被部分锁定。流程定义中的这些字段必须解锁，以便升级和继续。',
    'LBL_SCAN_546_DESCR' => 'Cannot migrate custom TinyMCE config in Knowledge Base module. '
        . 'The "tinyConfig" parameter in %s file will be emptied. '
        . 'If you have any TinyMCE customizations there you should save them before upgrade '
        . 'and add after upgrade manually.',
    'LBL_SCAN_547_DESCR' => '%s中已移除的“resetLoadFlag”签名的用途',
    'LBL_SCAN_548_DESCR' => '%s中已废弃的“initButtons”方法的用途',
    'LBL_SCAN_549_DESCR' => '%s中“getField”签名的用途',
    'LBL_SCAN_552_DESCR' => 'Use of removed Underscore APIs in %s',
    'LBL_SCAN_553_DESCR' => 'Use of removed Sidecar Bean APIs in %s',
    'LBL_SCAN_554_DESCR' => 'Sidecar controller %s extends from removed Sidecar controller',

    'LBL_SCAN_901_DESCR' => '实例已经升级到 Sugar 7',
    'LBL_SCAN_903_DESCR' => '不支持的升级程序版本。请安装合适的 SugarUpgradeWizardPrereq 程序包',
    'LBL_SCAN_904_DESCR' => '文件：%s，模块：%s',
    'LBL_SCAN_999_DESCR' => '未知的故障，请咨询支持部门',

    'LBL_SCAN_577_TITLE' => ' 不兼容的数据库校对',
    'LBL_SCAN_577_LOG' => "校对 '%s' 与 '%s' 字符集不兼容",
    'LBL_SCAN_577_DESCR' => "请在您的区域设置中选择不同的校对，或者移除 'dbconfigoption.collation' 配置以使用默认校对。",

    'LBL_SCAN_578_TITLE' => '无法移除临时数据库表：%s',
    'LBL_SCAN_578_LOG' => '无法移除临时数据库表：%s',
    'LBL_SCAN_578_DESCR' => '升级期间未能删除临时创建以对字符集转换进行安全检查的表格，需要手动删除。',

    'LBL_SCAN_579_TITLE' => '无法执行字符集/校对转换：以下表格上的 (%s)：%s',
    'LBL_SCAN_579_LOG' => '无法执行字符集/校对转换：以下表格上的 (%s)：%s',
];
