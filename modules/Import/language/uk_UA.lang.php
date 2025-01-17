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
 * Description:    Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/
global $timedate;

$mod_strings = [
    'LBL_GOOD_FILE' => 'Файл імпорту успішно прочитаний',
    'LBL_RECORD_CONTAIN_LOCK_FIELD' => 'Імпортований запис бере участь у процесі. Його не можна редагувати, оскільки деякі поля заблоковані для редагування процесом.',
    'LBL_RECORDS_SKIPPED_DUE_TO_ERROR' => 'Записи пропущені через помилки',
    'LBL_UPDATE_SUCCESSFULLY' => 'Записи успішно оновлено',
    'LBL_SUCCESSFULLY_IMPORTED' => 'Записи успішно створено',
    'LBL_STEP_4_TITLE' => 'Крок 4: Імпорт файла',
    'LBL_STEP_5_TITLE' => 'Крок 5: Перегляд результатів',
    'LBL_CUSTOM_ENCLOSURE' => 'Роздільник:',
    'LBL_ERROR_UNABLE_TO_PUBLISH' => 'Не можна опублікувати схему. Вже існує інша схема імпорту з аналогічною назвою.',
    'LBL_ERROR_UNABLE_TO_UNPUBLISH' => 'Не можна скасувати публікацію схеми імпорту, що належить іншому користувачеві. Необхідно щоб схема імпорту з аналогічною назвою належала Вам.',
    'LBL_ERROR_IMPORTS_NOT_SET_UP' => 'Імпорт не налаштований для даного типу модуля',
    'LBL_IMPORT_TYPE' => 'Що Ви хочете зробити з імпортованими даними?',
    'LBL_IDM_IMPORT_TYPE_CREATE' => 'Create New Records',
    'LBL_IDM_IMPORT_TYPE_UPDATE' => 'Update Existing Records',
    'LBL_IMPORT_BUTTON' => 'Створити тільки нові записи',
    'LBL_UPDATE_BUTTON' => 'Створити нові записи і оновити існуючі записи',
    'LBL_CREATE_BUTTON_HELP' => 'Використовуйте цю опцію для створення нових записів. Увага: Рядки у файлі імпорту, які містять значення, що збігаються з ID існуючих записів, не буде імпортовані, якщо значення співпадають по полю ID.',
    'LBL_UPDATE_BUTTON_HELP' => 'Використовуйте цю опцію для оновлення існуючих записів. Дані у файлі імпорту будуть співвіднесені з існуючими записами на основі ID записів у файлі імпорту.',
    'LBL_NO_ID' => 'Вимагається код',
    'LBL_PRE_CHECK_SKIPPED' => 'Попередня перевірка пропущена',
    'LBL_NOLOCALE_NEEDED' => 'Перекодування не вимагається',
    'LBL_FIELD_NAME' => 'Назва поля',
    'LBL_VALUE' => 'Значення',
    'LBL_ROW_NUMBER' => 'Номер рядка',
    'LBL_NONE' => 'Не визначено',
    'LBL_REQUIRED_VALUE' => 'Необхідне значення відсутнє',
    'LBL_ERROR_SYNC_USERS' => 'Недійсне значення для синхронізація з Outlook:',
    'LBL_ID_EXISTS_ALREADY' => 'ID  вже присутній в даній таблиці',
    'LBL_SYNC_KEY_EXISTS_ALREADY' => 'Ця таблиця вже містить SYNC_KEY',
    'LBL_ASSIGNED_USER' => 'Якщо користувач не існує - використовуйте поточного користувача',
    'LBL_SHOW_HIDDEN' => 'Показати поля, які не можуть бути коректно імпортовані',
    'LBL_UPDATE_RECORDS' => 'Оновлення існуючих записів (операцію не можна скасувати)',
    'LBL_TEST' => 'Тестування імпорту (не додавайте дані і не вносьте зміни)',
    'LBL_TRUNCATE_TABLE' => 'Очистити таблицю перед імпортом (видалення всіх записів)',
    'LBL_RELATED_ACCOUNTS' => 'Не створювати пов&#39;язаних контрагентів',
    'LBL_NO_DATECHECK' => 'Пропустити перевірку дати (це прискорить виконання операції, але призведе до помилки, якщо буде виявлена хоча б одна невірна дата)',
    'LBL_NO_WORKFLOW' => 'Не запускати робочий процес протягом цього імпорту',
    'LBL_NO_EMAILS' => 'Не відправляти повідомлення по електронній пошті під час цього імпорту',
    'LBL_NO_PRECHECK' => 'Режим початкового формату',
    'LBL_STRICT_CHECKS' => 'Використовуйте строгий набір правил (Перевірте адреси електронної пошти, а також номери телефонів)',
    'LBL_ERROR_SELECTING_RECORD' => 'Помилка при виборі запису:',
    'LBL_ERROR_DELETING_RECORD' => 'Помилка при видаленні запису:',
    'LBL_NOT_SET_UP' => 'Імпорт не налаштований для даного типу модуля',
    'LBL_ARE_YOU_SURE' => 'Ви впевнені? Це видалить всі дані в даному модулі.',
    'LBL_NO_RECORD' => 'Немає запису з таким ID для оновлення',
    'LBL_NOT_SET_UP_FOR_IMPORTS' => 'Імпорт не налаштований для даного типу модуля',
    'LBL_DEBUG_MODE' => 'Ввімкнути режим відладки',
    'LBL_ERROR_INVALID_ID' => 'Даний для ID занадто довгий, щоб поміститися в поле (максимальна довжина - 36 символів)',
    'LBL_ERROR_INVALID_PHONE' => 'Неправильний номер телефону',
    'LBL_ERROR_INVALID_NAME' => 'Занадто довгий рядок, щоб поміститися в поле',
    'LBL_ERROR_INVALID_VARCHAR' => 'Занадто довгий рядок, щоб поміститися в поле',
    'LBL_ERROR_INVALID_DATETIME' => 'Неправильна дата і час',
    'LBL_ERROR_INVALID_DATETIMECOMBO' => 'Неправильна дата і час',
    'LBL_ERROR_INVALID_INT' => 'Неправильне ціле значення',
    'LBL_ERROR_INVALID_NUM' => 'Неправильне числове значення',
    'LBL_ERROR_INVALID_TIME' => 'Неправильний час',
    'LBL_ERROR_INVALID_EMAIL' => 'Неправильна адреса електронної пошти',
    'LBL_ERROR_INVALID_BOOL' => 'Неправильне логічне значення',
    'LBL_ERROR_INVALID_DATE' => 'Неправильна дата',
    'LBL_ERROR_INVALID_USER' => 'Неправильне ім&#39;я користувача або ID',
    'LBL_ERROR_INVALID_TEAM' => 'Неправильна назва команди або ID',
    'LBL_ERROR_INVALID_ACCOUNT' => 'Неправильна назва Контрагента або ID',
    'LBL_ERROR_INVALID_RELATE' => 'Неправильне реляційне поле',
    'LBL_ERROR_INVALID_CURRENCY' => 'Невірно вказана валюта',
    'LBL_ERROR_INVALID_FLOAT' => 'Неправильне значення з дробовою частиною',
    'LBL_ERROR_NOT_IN_ENUM' => 'Значення знаходиться не в випадаючому списку. Допустимі значення:',
    'LBL_ERROR_ENUM_EMPTY' => 'Value not in dropDown list. dropDown list is empty',
    'LBL_NOT_MULTIENUM' => 'Не є елементом списку множинних значень',
    'LBL_IMPORT_MODULE_NO_TYPE' => 'Імпорт не налаштований для даного типу модуля',
    'LBL_IMPORT_MODULE_NO_USERS' => 'ПОПЕРЕДЖЕННЯ: У системі не вказані користувачі. Якщо при імпорті даних не вказані відповідальні користувачі, всі записи будуть прив&#39;язані до Адміністратора.',
    'LBL_IMPORT_MODULE_MAP_ERROR' => 'Не вдалося опублікувати. Є ще одне опубліковане зіставлення імпорту з тією ж назвою.',
    'LBL_IMPORT_MODULE_MAP_ERROR2' => 'Не вдалося зняти з публікації зіставлення, що належить іншому користувачеві. Ваше зіставлення імпорту носить таку ж назву.',
    'LBL_IMPORT_MODULE_NO_DIRECTORY' => 'Директорія',
    'LBL_IMPORT_MODULE_NO_DIRECTORY_END' => 'не існує або недоступний для запису',
    'LBL_IMPORT_MODULE_ERROR_NO_UPLOAD' => 'Файл не був завантажений успішно. Можливо, що задано замале число в параметрі "upload_max_filesize" у файлі php.ini',
    'LBL_IMPORT_MODULE_ERROR_LARGE_FILE' => 'Занадто великий файл. Макс:',
    'LBL_IMPORT_MODULE_ERROR_LARGE_FILE_END' => 'Байти. Змініть $sugar_config[&#39;upload_maxsize&#39;] у config.php',
    'LBL_MODULE_NAME' => 'Імпорт',
    'LBL_MODULE_NAME_SINGULAR' => 'Імпорт',
    'LBL_TRY_AGAIN' => 'Спробуйте ще раз',
    'LBL_START_OVER' => 'Почати спочатку',
    'LBL_ERROR' => 'Помилка:',
    'LBL_IMPORT_ERROR_MAX_REC_LIMIT_REACHED' => 'Файл для імпорту містить {0} строк.Оптимальна кількість рядків - {1}. Більша кількість рядків може уповільнити процес імпорту. Натисніть OK для продовження імпорту. Натисніть Скасування для зміни і повторної завантаження файлу для імпорту.',
    'ERR_IMPORT_SYSTEM_ADMININSTRATOR' => 'Ви не можете імпортувати системного адміністратора',
    'ERR_REPORT_LOOP' => 'Виявлена помилка в звітах. Користувач не може звітувати перед самим собою, а його керівники не можуть звітувати перед ним.',
    'ERR_MULTIPLE' => 'Декілька колонок мають одну і ту ж назву поля.',
    'ERR_MISSING_REQUIRED_FIELDS' => 'Відсутні необхідні поля:',
    'ERR_MISSING_MAP_NAME' => 'Відсутня назва кастомізованого співставлення',
    'ERR_USERS_IMPORT_DISABLED_TO_IDM_MODE' => 'Функція імпорту користувачів недоступна в режимі IDM.',
    'ERR_SELECT_FULL_NAME' => 'Ви не можете вибрати "Повне ім&#39;я" коли обрані "Ім&#39;я" та "Прізвище"',
    'ERR_SELECT_FILE' => 'Вибрати файл для завантаження.',
    'LBL_SELECT_FILE' => 'Вибрати файл:',
    'LBL_CUSTOM' => 'Користувацький',
    'LBL_CUSTOM_CSV' => 'Кастомізований файл із розділювачами-комами',
    'LBL_CSV' => 'файл на моєму комп&#39;ютері',
    'LBL_EXTERNAL_SOURCE' => 'зовнішній додаток або зовнішні послуги',
    'LBL_TAB' => 'Файл даних із розділювачами на основі табуляції',
    'LBL_CUSTOM_DELIMITED' => 'Файл користувача із розділювачами',
    'LBL_CUSTOM_DELIMITER' => 'Поля, розділені:',
    'LBL_FILE_OPTIONS' => 'Опції файлу',
    'LBL_CUSTOM_TAB' => 'Файл користувача із розділювачами табуляції',
    'LBL_DONT_MAP' => '--Не відображати дане поле -',
    'LBL_STEP_MODULE' => 'В якій модуль Ви хочете імпортувати дані?',
    'LBL_STEP_1_TITLE' => 'Крок 1: Вибрати джерело даних',
    'LBL_CONFIRM_TITLE' => 'Крок {0}: Підтвердити налаштування файлу для імпорту',
    'LBL_CONFIRM_EXT_TITLE' => 'Крок {0}: Підтвердити налаштування зовнішнього джерела',
    'LBL_WHAT_IS' => 'Мої дані знаходяться в:',
    'LBL_MICROSOFT_OUTLOOK' => 'Microsoft Outlook',
    'LBL_MICROSOFT_OUTLOOK_HELP' => 'Кастомізовані зіставлення для Microsoft Outlook грунтуються на файлі для імпорту, який є файлом типу .csv. Якщо файл для імпорту - розділений табуляцією файл, - зіставлення не буде використовуватися відповідно до очікуваним.',
    'LBL_ACT' => 'Act!',
    'LBL_SALESFORCE' => 'Salesforce.com',
    'LBL_MY_SAVED' => 'Для використання збережених налаштувань, виберіть нижче:',
    'LBL_PUBLISH' => 'Опублікувати',
    'LBL_DELETE' => 'Видалити',
    'LBL_PUBLISHED_SOURCES' => 'Для використання попередньо встановлених параметрів настроювання імпорту, виберіть нижче:',
    'LBL_UNPUBLISH' => 'Скасувати публікацію',
    'LBL_NEXT' => 'Наступний',
    'LBL_BACK' => '< Назад',
    'LBL_STEP_2_TITLE' => 'Крок {0}: Завантажити файл для імпорту',
    'LBL_HAS_HEADER' => 'Рядок заголовка:',
    'LBL_NUM_1' => '1.',
    'LBL_NUM_2' => '2.',
    'LBL_NUM_3' => '3.',
    'LBL_NUM_4' => '4.',
    'LBL_NUM_5' => '5.',
    'LBL_NUM_6' => '6.',
    'LBL_NUM_7' => '7.',
    'LBL_NUM_8' => '8.',
    'LBL_NUM_9' => '9.',
    'LBL_NUM_10' => '10.',
    'LBL_NUM_11' => '11.',
    'LBL_NUM_12' => '12.',
    'LBL_NOTES' => 'Примітки:',
    'LBL_NOW_CHOOSE' => 'Тепер виберіть файл для імпорту:',
    'LBL_IMPORT_OUTLOOK_TITLE' => 'Microsoft Outlook 98 і 2000 може експортувати дані у форматі <b>CSV</b>, який може бути використаний при імпорті даних в систему. При експорті даних з Outlook, виконайте такі дії:',
    'LBL_OUTLOOK_NUM_1' => 'Запустити <b>Outlook</b>',
    'LBL_OUTLOOK_NUM_2' => 'Виберіть меню <b> Файл </b>, потім опцію меню <b> Імпорт та Експорт ... </b>',
    'LBL_OUTLOOK_NUM_3' => 'Виберіть <b> Експорт до файлу </b> та натисніть кнопку Далі',
    'LBL_OUTLOOK_NUM_4' => 'Виберіть <b> CSV (Windows) </b> та натисніть <b> Далі </b>. <br> Примітка: Вам може бути запропоновано встановити компонент для експорту',
    'LBL_OUTLOOK_NUM_5' => 'Виберіть папку <b> Контакти </b> та натисніть кнопку <b> Далі </b>. Ви можете вибрати різні папки контактів, якщо контакти зберігаються в кількох папках',
    'LBL_OUTLOOK_NUM_6' => 'Виберіть назву файлу і натисніть кнопку <b> Далі </b>',
    'LBL_OUTLOOK_NUM_7' => 'Натисніть <b> Готово </b>',
    'LBL_IMPORT_SF_TITLE' => 'Salesforce.com може експортувати дані у форматі <b> CSV </b>, який може бути використаний при імпорті даних в систему. При експорті даних з Salesforce.com, виконайте такі дії:',
    'LBL_SF_NUM_1' => 'Відкрийте Ваш браузер, перейдіть на http://www.salesforce.com, і увійдіть під Вашим електронною адресою та паролем',
    'LBL_SF_NUM_2' => 'Натисніть на вкладку <b> Звіти </b> у верхньому меню',
    'LBL_SF_NUM_3' => '<b> Для експорту Контрагентів: </b> Натисніть на посилання <b> Active Accounts </b> <br> <b> Для експорту Контактів: </b> Натисніть на посилання <b> Список для розсилки </b>',
    'LBL_SF_NUM_4' => '<b> Крок 1: Оберіть тип звіту </b>, виберіть <b> Табличний звіт </b> натисніть <b> Далі </b>',
    'LBL_SF_NUM_5' => '<b> Крок 2: Виберіть колонки звіту </b>, виберіть колонки, які Ви хочете експортувати та натисніть <b> Далі </b>',
    'LBL_SF_NUM_6' => '<b> Крок 3: Виберіть інформацію для узагальнення </b>, просто натисніть <b> Далі </b>',
    'LBL_SF_NUM_7' => '<b> Крок 4: Розташуйте по порядку колонки звіту </b>, просто натисніть <b> Далі </b>',
    'LBL_SF_NUM_8' => '<b> Крок 5: Виберіть критерії звіту </b>, під <b> Дата початку </b>, виберіть досить давню дату, щоб включити всіх Контрагентів. Ви також можете експортувати ряд характеристик Контрагентів, використовуючи більш розширені критерії. Після завершення, натисніть <b> Запустити звіт </b>',
    'LBL_SF_NUM_9' => 'Звіт буде сформований і на сторінці буде відображений <b> Статус формування звіту: Завершено. </B> Тепер натисніть <b> Експорт до Excel </b>',
    'LBL_SF_NUM_10' => 'При <b> Експорті звіту: </b>, для <b> Формату файлу для експорту: </b>, виберіть <b> .csv </b>. Натисніть <b> Експортувати </b>.',
    'LBL_SF_NUM_11' => 'З&#39;явиться діалогове вікно для збереження експортованого файлу на Ваш комп&#39;ютер.',
    'LBL_IMPORT_ACT_TITLE' => 'Act! може експортувати дані у форматі <b> CSV </b>, який може бути використаний при імпорті даних в систему. При експорті даних з Act!, виконаєте наступні дії:',
    'LBL_ACT_NUM_1' => 'Запустити <b> ACT! </b>',
    'LBL_ACT_NUM_2' => 'Виберіть меню <b> Файл </b>, опцію меню <b> Обмін даними </b>, потім опцію меню <b> Експорт ... </b>',
    'LBL_ACT_NUM_3' => 'Виберіть тип файлу <b> Text-Delimited </b>',
    'LBL_ACT_NUM_4' => 'Виберіть назву файлу і місце збереження для експортованих даних і натисніть <b> Далі </b>',
    'LBL_ACT_NUM_5' => 'Виберіть <b> Тільки записи Контактів </b>',
    'LBL_ACT_NUM_6' => 'Натисніть на кнопку <b> Опції ... </b>',
    'LBL_ACT_NUM_7' => 'Виберіть <b> коми </b> як символ поділу полів',
    'LBL_ACT_NUM_8' => 'Перевірте, відзначений прапорець <b> Так, експортувати назви полів </b> та натисніть <b> OK </b>',
    'LBL_ACT_NUM_9' => 'Натисніть <b> Далі </b>',
    'LBL_ACT_NUM_10' => 'Виберіть <b> Все записи </b> і натисніть кнопку <b> Готово </b>',
    'LBL_IMPORT_CUSTOM_TITLE' => 'Багато додатків дозволяють експортувати дані в текстовому файлі <b> (. Csv) </b>, виконуючи наступні кроки:',
    'LBL_CUSTOM_NUM_1' => 'Запустити додаток і відкрити файл даних',
    'LBL_CUSTOM_NUM_2' => 'Виберіть опцію меню <b> Зберегти як ... </b> або <b> Експорт ... </b>',
    'LBL_CUSTOM_NUM_3' => 'Зберегти файл у форматі <b> CSV </b>',
    'LBL_IMPORT_TAB_TITLE' => 'Багато додатків дозволяють експортувати дані в текстовому файлі <b> (. Tsv або .tab) </b>, виконуючи наступні кроки:',
    'LBL_TAB_NUM_1' => 'Запустити додаток і відкрити файл даних',
    'LBL_TAB_NUM_2' => 'Виберіть опцію меню <b> Зберегти як ... </b> або <b> Експорт ... </b>',
    'LBL_TAB_NUM_3' => 'Зберегти файл у форматі <b> TSV </b>',
    'LBL_STEP_3_TITLE' => 'Крок {0}: Підтвердити зіставлення полів...',
    'LBL_STEP_DUP_TITLE' => 'Крок {0}: Перевірити наявність можливих дублів',
    'LBL_SELECT_FIELDS_TO_MAP' => 'З представленого нижче списку, виберіть поля у файлі для імпорту, які повинні бути імпортовані в кожне поле системи. По завершенні, натисніть <b> Далі </ b>:',
    'LBL_DATABASE_FIELD' => 'Поле модуля',
    'LBL_HEADER_ROW' => 'Рядок заголовка:',
    'LBL_HEADER_ROW_OPTION_HELP' => 'Виберіть, якщо верхній рядок файлу для імпорту є заголовком рядка, що містить назви полів.',
    'LBL_ROW' => 'Рядок',
    'LBL_SAVE_AS_CUSTOM' => 'Зберегти як зіставлення користувача:',
    'LBL_SAVE_AS_CUSTOM_NAME' => 'Назва зіставлення користувача:',
    'LBL_CONTACTS_NOTE_1' => 'Або прізвище, або повне ім&#39;я повинні бути відображені.',
    'LBL_CONTACTS_NOTE_2' => 'Якщо повне ім&#39;я відображено, то ім&#39;я та прізвище ігноруються.',
    'LBL_CONTACTS_NOTE_3' => 'Якщо відображено повне ім&#39;я, то дані у повному імені будуть розділені на ім&#39;я та прізвище при внесенні в базу даних.',
    'LBL_CONTACTS_NOTE_4' => 'Поля, що закінчуються на Вулиця 2 і Вулиця 3, об&#39;єднані разом з полем Основна вулиця при перенесенні в базу даних.',
    'LBL_ACCOUNTS_NOTE_1' => 'Поля, що закінчуються на Вулиця 2 і Вулиця 3, об&#39;єднані разом з полем Основна вулиця при перенесенні в базу даних.',
    'LBL_REQUIRED_NOTE' => 'Обов&#39;язкове поле (я):',
    'LBL_IMPORT_NOW' => 'Імпортувати зараз',
    'LBL_' => '',
    'LBL_CANNOT_OPEN' => 'Неможливо відрити для читання імпортований файл',
    'LBL_NOT_SAME_NUMBER' => 'У файлі було представлено іншу  кількість полів у рядку',
    'LBL_NO_LINES' => 'У файлі для імпорту не були виявлені рядків. Будь ласка, переконайтеся, що немає ніяких порожніх рядків у файлі і повторіть спробу.',
    'LBL_FILE_ALREADY_BEEN_OR' => 'Файл для імпорту вже був оброблений або не існує',
    'LBL_SUCCESS' => 'Успішно виконано',
    'LBL_FAILURE' => 'Помилка імпорту:',
    'LBL_SUCCESSFULLY' => 'Успішно імпортовано',
    'LBL_LAST_IMPORT_UNDONE' => 'Файл не було імпортовано',
    'LBL_NO_IMPORT_TO_UNDO' => 'Не було імпорту для відміни',
    'LBL_FAIL' => 'Помилка:',
    'LBL_RECORDS_SKIPPED' => 'Записи пропущені, оскільки у них відсутня одна або більше необхідних полів',
    'LBL_IDS_EXISTED_OR_LONGER' => 'Записи пропущені, оскільки ID або вже існує, або довше 36 символів',
    'LBL_RESULTS' => 'Результати',
    'LBL_CREATED_TAB' => 'Створені записи',
    'LBL_DUPLICATE_TAB' => 'Дублікати',
    'LBL_ERROR_TAB' => 'Помилки',
    'LBL_IMPORT_MORE' => 'Імпортувати знову',
    'LBL_FINISHED' => 'Завершено',
    'LBL_UNDO_LAST_IMPORT' => 'Скасувати імпорт',
    'LBL_LAST_IMPORTED' => 'Створено',
    'ERR_MULTIPLE_PARENTS' => 'Тільки один батьківський ID може бути визначений',
    'LBL_DUPLICATES' => 'Знайдено дублікати',
    'LNK_DUPLICATE_LIST' => 'Завантажити список дублікатів',
    'LNK_ERROR_LIST' => 'Завантажити список помилок',
    'LNK_RECORDS_SKIPPED_DUE_TO_ERROR' => 'Завантажити список рядків які не було іспортовано',
    'LBL_UNIQUE_INDEX' => 'Обрати показник для порівняння дублікатів',
    'LBL_VERIFY_DUPS' => 'Для перевірки відповідних даних існуючих записів у файлі для імпорту, виберіть поля для перевірки.',
    'LBL_INDEX_USED' => 'Поля перевірки:',
    'LBL_INDEX_NOT_USED' => 'Доступні поля:',
    'LBL_IMPORT_MODULE_ERROR_NO_MOVE' => 'Файл не був успішно завантажений. Перевірте доступ до файлу в кеш директорії установки  Sugar.',
    'LBL_IMPORT_FIELDDEF_ID' => 'Унікальний  ID номер',
    'LBL_IMPORT_FIELDDEF_RELATE' => 'Назва чи ID',
    'LBL_IMPORT_FIELDDEF_PHONE' => 'Номер телефону',
    'LBL_IMPORT_FIELDDEF_TEAM_LIST' => 'Назва команди чи ID',
    'LBL_IMPORT_FIELDDEF_NAME' => 'Текс',
    'LBL_IMPORT_FIELDDEF_VARCHAR' => 'Текс',
    'LBL_IMPORT_FIELDDEF_TEXT' => 'Текс',
    'LBL_IMPORT_FIELDDEF_TIME' => 'Час',
    'LBL_IMPORT_FIELDDEF_DATE' => 'Дата',
    'LBL_IMPORT_FIELDDEF_DATETIME' => 'Дата й час',
    'LBL_IMPORT_FIELDDEF_ASSIGNED_USER_NAME' => 'Ім&#39;я користувача або ID',
    'LBL_IMPORT_FIELDDEF_BOOL' => '&#39;0&#39; чи &#39;1&#39;',
    'LBL_IMPORT_FIELDDEF_ENUM' => 'Список',
    'LBL_IMPORT_FIELDDEF_EMAIL' => 'EMail',
    'LBL_IMPORT_FIELDDEF_INT' => 'Число (без десятих)',
    'LBL_IMPORT_FIELDDEF_DOUBLE' => 'Число (без десятих)',
    'LBL_IMPORT_FIELDDEF_NUM' => 'Число (без десятих)',
    'LBL_IMPORT_FIELDDEF_CURRENCY' => 'Число (без десятих)',
    'LBL_IMPORT_FIELDDEF_FLOAT' => 'Число (без десятих)',
    'LBL_DATE_FORMAT' => 'Формат дати',
    'LBL_TIME_FORMAT' => 'Формат часу',
    'LBL_TIMEZONE' => 'Часовий пояс',
    'LBL_ADD_ROW' => 'Додати поле',
    'LBL_REMOVE_ROW' => 'Видалити поле',
    'LBL_DEFAULT_VALUE' => 'Значення за умовчанням',
    'LBL_SHOW_ADVANCED_OPTIONS' => 'Показати додаткові налаштування імпорту файлів',
    'LBL_HIDE_ADVANCED_OPTIONS' => 'Приховати додаткові опції імпорту файлів',
    'LBL_SHOW_NOTES' => 'Переглянути примітки',
    'LBL_HIDE_NOTES' => 'Приховати примітки',
    'LBL_SHOW_PREVIEW_COLUMNS' => 'Показати колонки попереднього перегляду',
    'LBL_HIDE_PREVIEW_COLUMNS' => 'Приховати колонки попереднього перегляду',
    'LBL_DUPLICATE_CHECK_OPERATOR' => 'Перевірити наявність дублікатів за допомогою оператора:',
    'LBL_SAVE_MAPPING_AS' => 'Щоб зберегти настройки імпорту, вкажіть назву для збережених налаштувань:',
    'LBL_OPTION_ENCLOSURE_QUOTE' => 'Одинарні лапки (&#39;)',
    'LBL_OPTION_ENCLOSURE_DOUBLEQUOTE' => 'Подвійні лапки (")',
    'LBL_OPTION_ENCLOSURE_NONE' => 'Не визначено',
    'LBL_OPTION_ENCLOSURE_OTHER' => 'Інше',
    'LBL_IMPORT_COMPLETE' => 'Вихід',
    'LBL_IMPORT_COMPLETED' => 'Імпорт завершено',
    'LBL_IMPORT_ERROR' => 'Виникла помилка імпорту',
    'LBL_IMPORT_RECORDS' => 'Записи імпорту',
    'LBL_IMPORT_RECORDS_OF' => 'з',
    'LBL_IMPORT_RECORDS_TO' => 'кому',
    'LBL_CURRENCY' => 'Валюта:',
    'LBL_SYSTEM_SIG_DIGITS' => 'Значущі цифри системи',
    'LBL_NUMBER_GROUPING_SEP' => 'роздільник десяткових',
    'LBL_DECIMAL_SEP' => 'Десятковий символ',
    'LBL_LOCALE_DEFAULT_NAME_FORMAT' => 'Формат відображення імені',
    'LBL_LOCALE_EXAMPLE_NAME_FORMAT' => 'Приклад',
    'LBL_LOCALE_NAME_FORMAT_DESC' => '"s" Привітання <br> "f" Ім&#39;я <br> "l" Прізвище',
    'LBL_CHARSET' => 'Кодування файлу:',
    'LBL_MY_SAVED_HELP' => 'Використовуйте цю опцію, щоб застосувати попередньо встановлені параметри імпорту, в тому числі властивості імпорту, зіставлення, а також будь-які властивості перевірки записів на наявність дублікатів для даного імпорту. <br> <br> Натисніть <b> Видалити </b> для видалення зіставлення для всіх користувачів.',
    'LBL_MY_SAVED_ADMIN_HELP' => 'Використовуйте цю опцію, щоб застосувати попередньо встановлені параметри імпорту, в тому числі властивості імпорту, зіставлення, а також будь-які властивості перевірки записів на наявність дублів для даного імпорту. <br> <br> Натисніть <b> Опублікувати </b> для того, щоб зробити зіставлення доступним для інших користувачів. <br> Натисніть <b> Скасувати публікацію </b> для того, щоб зробити зіставлення недоступним для інших користувачів. <br> Натисніть <b> Видалити </b> для видалення зіставлення для всіх користувачів .',
    'LBL_MY_PUBLISHED_HELP' => 'Використовуйте цю опцію, щоб застосувати попередньо встановлені параметри імпорту, в тому числі властивості імпорту, зіставлення, а також будь-які властивості перевірки записів на наявність дублікатів для даного імпорту.',
    'LBL_ENCLOSURE_HELP' => '<P> <b> Визначник символу </b> використовується для заключення передбачуваного вмісту поля, включаючи будь-які символи, які використовуються як роздільники. <br> <br> Приклад: Якщо роздільником є ​​кома (,) і визначником є ​​знак лапок (" ), <br> <b> "Купертіно, Каліфорнія" </b> імпортується в одне поле в додатку і представляється як <b> Купертіно, Каліфорнія </b>. <br> Якщо немає визначальних символів, або якщо інший символ є визначником, <br> <b> "Купертіно, Каліфорнія" </b> імпортується в два суміжних поля, як <b> "Купертіно </b> і <b>" Каліфорнія </b>. <br> <br> Примітка: Файл для імпорту не може містити визначальних символів. <br> Визначник символу за замовчуванням для файлів у форматі, розділені комами і файлів, розділених знаком табуляції, створених в Excel - знак лапок. </p>',
    'LBL_DELIMITER_COMMA_HELP' => 'Використовуйте дану опцію для вибору файлу у форматі електронної таблиці, що містить дані, які Ви хотіли б імпортувати. Приклади: файл .csv або файл для експорту з Microsoft Outlook.',
    'LBL_DELIMITER_TAB_HELP' => 'Виберіть цю опцію, якщо символ, що розділяє поля у файлі для імпорту - <b> TAB </b>, і розширення файлу - .txt.',
    'LBL_DELIMITER_CUSTOM_HELP' => 'Виберіть цю опцію, якщо символ, що розділяє поля у файлі для імпорту - не кома, не TAB, і введіть символ в суміжне поле.',
    'LBL_DATABASE_FIELD_HELP' => 'Дана колонка відображає всі поля в модулі. Виберіть поле для відображення даних у рядках файлу для імпорту.',
    'LBL_HEADER_ROW_HELP' => 'Ця колонка відображає написи в рядку заголовка файлу для імпорту.',
    'LBL_DEFAULT_VALUE_HELP' => 'Вкажіть значення для поля у створеному або оновленому записі, якщо поле у файлі для імпорту не містить даних.',
    'LBL_ROW_HELP' => 'Ця колонка відображає дані в першому рядку без заголовка файлу для імпорту. Якщо написи рядка заголовка з&#39;являються в цій колонці, натисніть Назад, щоб задати рядок заголовка у властивостях файлу для імпорту.',
    'LBL_SAVE_MAPPING_HELP' => 'Введіть назву для збереження налаштувань імпорту, включаючи зіставлення полів і показників, використовуваних при перевірці записів на наявність дублікатів. Збережені налаштування імпорту можуть бути використані для майбутнього імпорту.',
    'LBL_IMPORT_FILE_SETTINGS_HELP' => 'Під час завантаження файлу для імпорту, деякі властивості файлу могли бути автоматично визначені. При необхідності, Ви можете переглядати і управляти цими властивостями. Примітка: Ці налаштування відносяться до даного імпорту та не замінять всі налаштування користувача.',
    'LBL_VERIFY_DUPLCATES_HELP' => 'Знайти існуючі записи в системі, які можуть вважатися дублями записів, готових до імпорту, перевіряючи записи на наявність дублів відповідних даних. Поля, які потрапили в колонку "Перевірка даних", будуть використовуватися для перевірки записів на наявність дублів. Рядки у файлі для імпорту, що містять відповідні дані, будуть вказані на наступній сторінці, і Ви зможете вибрати, які рядки імпортувати',
    'LBL_IMPORT_STARTED' => 'Імпорт розпочато:',
    'LBL_IMPORT_FILE_SETTINGS' => 'Налаштування імпорту',
    'LBL_IDM_RECORD_CANNOT_BE_CREATED' => 'Запис не додано. Нових користувачів потрібно додавати в Налаштуваннях SugarCloud.',
    'LBL_RECORD_CANNOT_BE_UPDATED' => 'Запис не може бути оновлено через проблеми доступу',
    'LBL_DELETE_MAP_CONFIRMATION' => 'Ви дійсно хочете видалити цей збережений набір параметрів імпорту?',
    'LBL_THIRD_PARTY_CSV_SOURCES' => 'Якщо дані файлу для імпорту були експортовані з будь-якого з таких джерел, виберіть, з якого саме.',
    'LBL_THIRD_PARTY_CSV_SOURCES_HELP' => 'Виберіть джерело для автоматичного застосування кастомизировать зіставлення, щоб спростити процес зіставлення (наступний крок).',
    'LBL_EXTERNAL_SOURCE_HELP' => 'Використовуйте цю опцію для імпорту даних безпосередньо з зовнішнього додатки або сервісу, наприклад, Gmail.',
    'LBL_EXAMPLE_FILE' => 'Завантажити шаблон файлу для імпорту',
    'LBL_CONFIRM_IMPORT' => 'Ви вибрали оновлення записів в процесі імпорту. Оновлення, внесені до існуючих записах не можуть бути скасовані. Тим не менш, записи, створені в процесі імпорту можуть бути скасовані (видалені), якщо це необхідно. Натисніть кнопку Скасування для створення тільки нових записів, або натисніть кнопку OK, щоб продовжити.',
    'LBL_IDM_CONFIRM_IMPORT' => 'Updates made to existing records during the import process cannot be undone. Click Cancel to create new records, or click OK to continue.',
    'LBL_CONFIRM_MAP_OVERRIDE' => 'Попередження: Ви вже вибрали співставлення користувача для даного імпорту, хочете продовжити?',
    'LBL_EXTERNAL_FIELD' => 'Зовнішнє поле',
    'LBL_SAMPLE_URL_HELP' => 'Завантажте зразок файлу для імпорту, який містить рядок заголовка полів модуля. Файл може використовуватися як шаблон для створення файлу для імпорту, що містить дані, які Ви б хотіли імпортувати.',
    'LBL_AUTO_DETECT_ERROR' => 'Не вдалося виявити роздільник полів і класифікатор у файлі для імпорту. Будь ласка, перевірте налаштування у властивостях файлу для імпорту.',
    'LBL_MIME_TYPE_ERROR_1' => 'Обраний файл, мабуть, не містить список, розділених комами. Будь ласка, перевірте тип файлу. Ми рекомендуємо файли .csv.',
    'LBL_MIME_TYPE_ERROR_2' => 'Щоб продовжити імпорт вибраного файлу, натисніть кнопку OK. Щоб завантажити новий файл, натисніть, натисніть Спробуйте ще раз',
    'LBL_FIELD_DELIMETED_HELP' => 'Роздільник полів визначає символ, який використовується для розділення колонок полів.',
    'LBL_FILE_UPLOAD_WIDGET_HELP' => 'Виберіть файл, який містить дані з роздільником, як наприклад, розділений комою або табуляцією файл. Рекомендуються файли типу .csv.',
    'LBL_EXTERNAL_ERROR_NO_SOURCE' => 'Неможливо відновити адаптер джерела даних, будь ласка, спробуйте пізніше.',
    'LBL_EXTERNAL_ERROR_FEED_CORRUPTED' => 'Зовнішній ресурс не доступний, спробуйте ще раз пізніше.',
    'LBL_ERROR_IMPORT_CACHE_NOT_WRITABLE' => 'Директорія кеша імпорту не доступна для запису.',
    'LBL_ADD_FIELD_HELP' => 'Використовуйте цю опцію, щоб додати значення в поле всіх створених або оновлених записів. Виберіть поле та введіть або виберіть значення для цього поля в колонці Значення за умовчанням.',
    'LBL_MISSING_HEADER_ROW' => 'Рядок заголовка не знайдено',
    'LBL_CANCEL' => 'Скасувати',
    'LBL_SELECT_DS_INSTRUCTION' => 'Готові почати імпорт? Виберіть джерело даних, які Ви хотіли б імпортувати.',
    'LBL_SELECT_UPLOAD_INSTRUCTION' => 'Виберіть файл на Вашому комп&#39;ютері, що містить дані, які Ви хотіли б імпортувати або завантажте шаблон для початку створення файлу для імпорту.',
    'LBL_SELECT_IDM_CREATE_INSTRUCTION' => 'Щоб створити нові записи, перейдіть у <a href="{0}" target="_blank">Налаштування SugarCloud</a>.',
    'LBL_SELECT_IDM_UPLOAD_INSTRUCTION' => 'Щоб оновити наявні записи, виберіть на комп’ютері файл із даними, які потрібно імпортувати.',
    'LBL_SELECT_PROPERTY_INSTRUCTION' => 'Так представлені кілька перших рядків файлу для імпорту з певними властивостями файлу. Якщо було визначена рядок заголовка, він відображається у верхньому рядку таблиці. Перегляньте властивості файлу для імпорту, щоб внести зміни в певні властивості і для встановлення додаткових властивостей. Оновлення параметрів оновить дані, вказані в таблиці.',
    'LBL_SELECT_MAPPING_INSTRUCTION' => 'У таблиці нижче представлені всі поля в модулі, які можуть бути зіставлені з даними файлу для імпорту. Якщо файл містить рядок заголовка, колонки у файлі були зіставлені з відповідними полями. Якщо дані для імпорту містять дати, рік повинен бути у форматі РРРР. Перевірте зіставлення, щоб переконатися, що вони є тим, що Ви очікуєте, і внесіть зміни, якщо це необхідно. Щоб допомогти Вам перевірити зіставлення, Рядок 1 відображає дані у файлі. Обов&#39;язково зіставте з усіма обов&#39;язковими полями (відзначеними зірочкою).',
    'LBL_IDM_SELECT_MAPPING_INSTRUCTION' => 'The table below contains all of the editable fields in the module that can be mapped to the data in the import file. If the file contains a header row, the columns in the file have been mapped to matching fields. If the import data contain dates, the year must be in YYYY format. Check the mappings to make sure that they are what you expect, and make changes, as necessary. To help you check the mappings, Row 1 displays the data in the file. Be sure to map to all of the required fields (noted by an asterisk).',
    'LBL_IDM_SELECT_MAPPING_FIELDS_INSTRUCTION' => '<a href="{0}" target="_blank">Fields</a> that are only editable in SugarIdentity via the SugarCloud Settings console will not be available to map.',
    'LBL_SELECT_DUPLICATE_INSTRUCTION' => 'Щоб уникнути створення дублів записів, виберіть, яке з зіставлених полів Ви б хотіли використовувати для перевірки записів на наявність дублів в процесі імпорту даних. Значення існуючих записів в обраних файлах будуть перевірені на відповідності з даними файлу для імпорту. Якщо знайдені співпадаючі дані, будуть відображені рядки у файлі для імпорту, що містять ці дані поряд з результатами імпорту (наступна сторінка). Потім Ви зможете вибрати, які з цих рядків підлягають подальшому імпорту.',
    'LBL_EXT_SOURCE_SIGN_IN' => 'Зайти',
    'LBL_EXT_SOURCE_SIGN_OUT' => 'Вийти',
    'LBL_DUP_HELP' => 'Ось рядки у файлі імпорту, що не були імпортовані, оскільки вони містять дані, які відповідають значення в існуючих записах на основі дубльованої перевірки. Дані, які співпадають, виділяється. Щоб ще раз імпортувати ці рядки, завантажте список, внесіть зміни та натисніть "Імпорт знову".',
    'LBL_DESELECT' => 'відмінити вибір',
    'LBL_SUMMARY' => 'Резюме',
    'LBL_OK' => 'OK',
    'LBL_ERROR_HELP' => 'Тут представлені рядки у файлі для імпорту, що не були імпортовані внаслідок помилок. Для повторного імпорту рядків, завантажте список, внесіть правки і натисніть <b> Імпортувати ще раз </b>',
    'LBL_EXTERNAL_MAP_HELP' => 'Таблиця нижче містить поля в зовнішньому джерелі і поля модуля, якому вони зіставляються. Перевірте зіставлення, щоб переконатися, що вони є тим, що Ви очікуєте, і, при необхідності, внесіть зміни. Обов&#39;язково зіставте з усіма обов&#39;язковими полями (відзначеними зірочкою).',
    'LBL_EXTERNAL_MAP_NOTE' => 'Імпорт буде проведений для контактів всіх груп контактів Google.',
    'LBL_EXTERNAL_MAP_NOTE_SUB' => 'Імена користувачів недавно створених користувачів за замовчуванням будуть Повними іменами контактів Google. Імена користувачів можуть бути змінені після того, як будуть створені записи користувачів.',
    'LBL_EXTERNAL_MAP_SUB_HELP' => 'Натисніть <b> Імпортувати зараз </b> для початку імпорту. Записи будуть створені тільки для даних, що містять прізвища. Записи не будуть створені для даних, встановлених як дублі на основі імен та / або адрес електронної пошти, відповідні існуючим записам.',
    'LBL_EXTERNAL_FIELD_TOOLTIP' => 'Дана колонка відображає поля в зовнішньому джерелі, що містить дані для створення нових записів.',
    'LBL_EXTERNAL_DEFAULT_TOOPLTIP' => 'Вкажіть значення для поля у створеному записі, якщо поле в зовнішньому джерелі не містить ніяких даних.',
    'LBL_EXTERNAL_ASSIGNED_TOOLTIP' => 'Щоб призначити користувача, іншу особа, відповідальною за нові записи, використовуйте колонку Значення за замовчуванням для вибору іншого користувача.',
    'LBL_EXTERNAL_TEAM_TOOLTIP' => 'Щоб призначити команди, які не є командою (-ами) за замовчуванням, відповідальними за нові записи, використовуйте колонку Значення за замовчуванням для вибору інших команд.',
    'LBL_SIGN_IN_HELP' => 'Для активації даної послуги, будь ласка, увійдіть в систему під вкладкою Зовнішні Контрагенти зі сторінки користувача налаштувань.',
    'LBL_NO_EMAIL_DEFS_IN_MODULE' => "Намається  обробити електронні адрес в Bean, який це не підтримує.",
];
