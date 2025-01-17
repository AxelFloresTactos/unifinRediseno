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
    //DON'T CONVERT THESE THEY ARE MAPPINGS
    'db_last_name' => 'LBL_LIST_LAST_NAME',
    'db_first_name' => 'LBL_LIST_FIRST_NAME',
    'db_title' => 'LBL_LIST_TITLE',
    'db_email1' => 'LBL_LIST_EMAIL_ADDRESS',
    'db_account_name' => 'LBL_LIST_ACCOUNT_NAME',
    'db_email2' => 'LBL_LIST_EMAIL_ADDRESS',

    //END DON'T CONVERT

    // Dashboard Names
    'LBL_LEADS_LIST_DASHBOARD' => 'Potansiyeller Listesi Panosu',
    'LBL_LEADS_RECORD_DASHBOARD' => 'Potansiyeller Kaydı Panosu',
    'LBL_LEADS_FOCUS_DRAWER_DASHBOARD' => 'Potansiyeller Odak Bölmesi',

    'ERR_DELETE_RECORD' => 'Potansiyeli silmek için bir kayıt numarası belirtilmelidir.',
    'LBL_ACCOUNT_DESCRIPTION' => 'Müşteri Tanımı',
    'LBL_ACCOUNT_ID' => 'Müşteri ID',
    'LBL_ACCOUNT_NAME' => 'Müşteri İsmi:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteler',
    'LBL_ADD_BUSINESSCARD' => 'Kartvizit Ekle',
    'LBL_ADDRESS_INFORMATION' => 'Adres Bilgisi',
    'LBL_ALT_ADDRESS_CITY' => 'Alternatif Adres Şehir',
    'LBL_ALT_ADDRESS_COUNTRY' => 'Alternatif Adres Ülke',
    'LBL_ALT_ADDRESS_POSTALCODE' => 'Alternatif Adres Posta Kodu',
    'LBL_ALT_ADDRESS_STATE' => 'Alternatif Adres Eyalet',
    'LBL_ALT_ADDRESS_STREET_2' => 'Alternatif Adres Sokak 2',
    'LBL_ALT_ADDRESS_STREET_3' => 'Alternatif Adres Sokak 3',
    'LBL_ALT_ADDRESS_STREET' => 'Alternatif Adres Sokak',
    'LBL_ALTERNATE_ADDRESS' => 'Diğer Adres:',
    'LBL_ANY_ADDRESS' => 'Adres:',
    'LBL_ANY_EMAIL' => 'E-Posta:',
    'LBL_ANY_PHONE' => 'Telefon:',
    'LBL_ASSIGNED_TO_NAME' => 'Atanan Kişi',
    'LBL_ASSIGNED_TO_ID' => 'Atanan Kullanıcı ID:',
    'LBL_BACKTOLEADS' => 'Potansiyellere Geri Dön',
    'LBL_BUSINESSCARD' => 'Potansiyeli Dönüştür',
    'LBL_CITY' => 'Şehir:',
    'LBL_CONTACT_ID' => 'Kontak ID',
    'LBL_CONTACT_INFORMATION' => 'Genel Bilgi',
    'LBL_CONTACT_NAME' => 'Potansiyel İsmi:',
    'LBL_CONTACT_OPP_FORM_TITLE' => 'Potansiyel-Fırsat:',
    'LBL_CONTACT_ROLE' => 'Rol:',
    'LBL_CONTACT' => 'Potansiyel:',
    'LBL_CONVERT_BUTTON_LABEL' => 'Dönüştür',
    'LBL_SAVE_CONVERT_BUTTON_LABEL' => 'Kaydet ve Dönüştür',
    'LBL_CONVERT_PANEL_OPTIONAL' => '(isteğe bağlı)',
    'LBL_CONVERT_ACCESS_DENIED' => 'Potansiyeli dönüştürmek için gerekli olan modüllerde değişiklik yapabilme hakkınız yok: {{requiredModulesMissing}}',
    'LBL_CONVERT_FINDING_DUPLICATES' => 'Çift kayıtlar aranıyor...',
    'LBL_CONVERT_IGNORE_DUPLICATES' => 'Yoksay ve yeni oluştur',
    'LBL_CONVERT_BACK_TO_DUPLICATES' => 'Çiftler kayıtlara dön',
    'LBL_CONVERT_SWITCH_TO_CREATE' => 'Yeni Oluştur',
    'LBL_CONVERT_SWITCH_TO_SEARCH' => 'Ara',
    'LBL_CONVERT_DUPLICATES_FOUND' => '{{duplicateCount}} çift kayıt bulundu',
    'LBL_CONVERT_CREATE_NEW' => 'Yeni {{moduleName}}',
    'LBL_CONVERT_SELECT_MODULE' => 'Seç {{moduleName}}',
    'LBL_CONVERT_SELECTED_MODULE' => 'Seçiliyor {{moduleName}}',
    'LBL_CONVERT_CREATE_MODULE' => 'Oluştur {{moduleName}}',
    'LBL_CONVERT_CREATED_MODULE' => 'Oluşturuluyor {{moduleName}}',
    'LBL_CONVERT_RESET_PANEL' => 'Sıfırla',
    'LBL_CONVERT_COPY_RELATED_ACTIVITIES' => 'İlgili aktiviteleri şuraya kopyala:',
    'LBL_CONVERT_MOVE_RELATED_ACTIVITIES' => 'İlgili aktiviteleri şuraya taşı:',
    'LBL_CONVERT_MOVE_ACTIVITIES_TO_CONTACT' => 'İlgili aktiviteleri kişi kayıtlarına taşı',
    'LBL_CONVERTED_ACCOUNT' => 'Dönüştürülen Müşteri:',
    'LBL_CONVERTED_CONTACT' => 'Dönüştürülen Kontak:',
    'LBL_CONVERTED_OPP' => 'Dönüştürülen Fırsat:',
    'LBL_CONVERTED' => 'Dönüştü',
    'LBL_CONVERTLEAD_BUTTON_KEY' => 'V',
    'LBL_CONVERTLEAD_TITLE' => 'Potansiyeli Dönüştür',
    'LBL_CONVERTLEAD' => 'Potansiyeli Dönüştür',
    'LBL_CONVERTLEAD_WARNING' => 'Uyarı: Değiştirmek istediğiniz Potansiyelin statüsü "Değiştirilmiş". Potansiyelden halihazırda Kontak ve/veya Hesap kayıtları oluşturulmuş olabilir. Eğer Potansiyeli değiştirmek istiyorsanız Kaydet butonuna tıklayın. Değişiklik yapmadan geri dönmek için İptal butonuna tıklayın.',
    'LBL_CONVERTLEAD_WARNING_INTO_RECORD' => 'Olası Kontak:',
    'LBL_CONVERTLEAD_ERROR' => 'Potansiyeli dönüştüremedi',
    'LBL_CONVERTLEAD_FILE_WARN' => 'Potansiyel {{leadName}} başarılı şekilde dönüştürüldü, ancak bir veya birkaç kayıt için eklerin yüklenmesinde hata oluştu',
    'LBL_CONVERTLEAD_SUCCESS' => 'Potansiyel {{leadName}} başarılı şekilde dönüştürüldü',
    'LBL_COUNTRY' => 'Ülke:',
    'LBL_CREATED_NEW' => 'Yeni oluşturuldu',
    'LBL_CREATED_ACCOUNT' => 'Yeni müşteri Oluşturuldu',
    'LBL_CREATED_CALL' => 'Yeni bir tel.Araması oluşturuldu',
    'LBL_CREATED_CONTACT' => 'Yeni bir kontak oluşturuldu',
    'LBL_CREATED_MEETING' => 'Yeni bir toplantı oluşturuldu',
    'LBL_CREATED_OPPORTUNITY' => 'Yeni bir fırsat oluşturuldu',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'Potansiyeller',
    'LBL_DEPARTMENT' => 'Departman:',
    'LBL_DESCRIPTION_INFORMATION' => 'Tanım Bilgisi',
    'LBL_DESCRIPTION' => 'Tanım:',
    'LBL_DO_NOT_CALL' => 'Tel. İle Aramayın:',
    'LBL_DUPLICATE' => 'Benzer Potansiyeller',
    'LBL_EMAIL_ADDRESS' => 'E-Posta Adresi:',
    'LBL_EMAIL_OPT_OUT' => 'Liste Dışı E-Posta:',
    'LBL_EXISTING_ACCOUNT' => 'Var olan müşteri kullanıldı',
    'LBL_EXISTING_CONTACT' => 'Var olan kontak kullanıldı',
    'LBL_EXISTING_OPPORTUNITY' => 'Var olan fırsat Kullanıldı',
    'LBL_FAX_PHONE' => 'Faks:',
    'LBL_FIRST_NAME' => 'İsim:',
    'LBL_FULL_NAME' => 'Tam İsmi:',
    'LBL_HISTORY_SUBPANEL_TITLE' => 'Tarihçe',
    'LBL_HOME_PHONE' => 'Ev Telefonu:',
    'LBL_IMPORT_VCARD' => 'vCard Verisini Yükle',
    'LBL_IMPORT_VCARD_SUCCESS' => 'VCard bilgisinden Potansiyel başarıyla oluşturuldu',
    'LBL_VCARD' => 'vCard',
    'LBL_IMPORT_VCARDTEXT' => 'Dosya Sisteminden vCard yüklenerek, yeni bir Potansiyel otomatik olarak oluşturuldu.',
    'LBL_INVALID_EMAIL' => 'Geçersiz E-Posta:',
    'LBL_INVITEE' => 'Doğrudan Raporlar',
    'LBL_LAST_NAME' => 'Soyisim:',
    'LBL_LEAD_SOURCE_DESCRIPTION' => 'Potansiyel Kaynak Tanımı:',
    'LBL_LEAD_SOURCE' => 'Potansiyel Kaynağı:',
    'LBL_LIST_ACCEPT_STATUS' => 'Kabul Durumu',
    'LBL_LIST_ACCOUNT_NAME' => 'Müşteri İsmi',
    'LBL_LIST_CONTACT_NAME' => 'Potansiyel İsmi',
    'LBL_LIST_CONTACT_ROLE' => 'Rol',
    'LBL_LIST_DATE_ENTERED' => 'Oluşturulma Tarihi',
    'LBL_LIST_EMAIL_ADDRESS' => 'E-Posta',
    'LBL_LIST_FIRST_NAME' => 'İsim',
    'LBL_VIEW_FORM_TITLE' => 'Potansiyel Görüntüsü',
    'LBL_LIST_FORM_TITLE' => 'Potansiyel Listesi',
    'LBL_LIST_LAST_NAME' => 'Soyisim',
    'LBL_LIST_LEAD_SOURCE_DESCRIPTION' => 'Potansiyel Kaynak Tanımı',
    'LBL_LIST_LEAD_SOURCE' => 'Potansiyel Kaynağı',
    'LBL_LIST_MY_LEADS' => 'Potansiyellerim',
    'LBL_LIST_NAME' => 'İsim',
    'LBL_LIST_PHONE' => 'Ofis Telefonu',
    'LBL_LIST_REFERED_BY' => 'Tavsiye Eden',
    'LBL_LIST_STATUS' => 'Durum',
    'LBL_LIST_TITLE' => 'Başlık',
    'LBL_MARKET_INTEREST_PREDICTION' => 'Piyasa Faiz Tahmini',
    'LBL_MARKET_SCORE' => 'Piyasa Puanı',
    'LBL_MOBILE_PHONE' => 'Cep Telefonu:',
    'LBL_MODULE_NAME' => 'Potansiyeller',
    'LBL_MODULE_NAME_SINGULAR' => 'Potansiyel',
    'LBL_MODULE_TITLE' => 'Potansiyeller: Ana Sayfa',
    'LBL_NAME' => 'İsim:',
    'LBL_NEW_FORM_TITLE' => 'Yeni Potansiyel',
    'LBL_NEW_PORTAL_PASSWORD' => 'Yeni Portal Şifresi:',
    'LBL_OFFICE_PHONE' => 'Ofis Telefonu:',
    'LBL_OPP_NAME' => 'Fırsat İsmi:',
    'LBL_OPPORTUNITY_AMOUNT' => 'Fırsat Miktarı:',
    'LBL_OPPORTUNITY_ID' => 'Fırsat ID',
    'LBL_OPPORTUNITY_NAME' => 'Fırsat İsmi:',
    'LBL_CONVERTED_OPPORTUNITY_NAME' => 'Dönüştürülen Fırsat Adı',
    'LBL_OTHER_EMAIL_ADDRESS' => 'Diğer E-Posta:',
    'LBL_OTHER_PHONE' => 'Diğer Telefon:',
    'LBL_PHONE' => 'Telefon:',
    'LBL_PORTAL_ACTIVE' => 'Portal Etkinleştir:',
    'LBL_PORTAL_APP' => 'Portal Uygulaması',
    'LBL_PORTAL_INFORMATION' => 'Portal Bilgisi',
    'LBL_PORTAL_NAME' => 'Portal İsmi:',
    'LBL_PORTAL_PASSWORD_ISSET' => 'Portal Şifresi Belirlendi:',
    'LBL_POSTAL_CODE' => 'Posta Kodu:',
    'LBL_STREET' => 'Sokak',
    'LBL_PRIMARY_ADDRESS_CITY' => 'Birincil Adres Şehir',
    'LBL_PRIMARY_ADDRESS_COUNTRY' => 'Birincil Adres Ülke',
    'LBL_PRIMARY_ADDRESS_POSTALCODE' => 'Birincil Adres Posta Kodu',
    'LBL_PRIMARY_ADDRESS_STATE' => 'Birincil Adres Eyalet',
    'LBL_PRIMARY_ADDRESS_STREET_2' => 'Birincil Adres Sokak 2',
    'LBL_PRIMARY_ADDRESS_STREET_3' => 'Birincil Adres Sokak 3',
    'LBL_PRIMARY_ADDRESS_STREET' => 'Birincil Adres Sokak',
    'LBL_PRIMARY_ADDRESS' => 'Birincil Adres:',
    'LBL_RECORD_SAVED_SUCCESS' => 'Başarılı şekilde {{moduleSingularLower}} oluşturdunuz: <a href="#{{buildRoute model=this}}">{{full_name}}</a>.',
    'LBL_REFERED_BY' => 'Tavsiye Eden:',
    'LBL_REPORTS_TO_ID' => 'Rapor Edilen Kişi ID',
    'LBL_REPORTS_TO' => 'Rapor Edilen Kişi:',
    'LBL_REPORTS_FROM' => 'Rapor Kaynağı::',
    'LBL_SALUTATION' => 'Hitap',
    'LBL_MODIFIED' => 'Değiştiren',
    'LBL_MODIFIED_ID' => 'Değiştiren ID',
    'LBL_CREATED' => 'Oluşturan',
    'LBL_CREATED_ID' => 'Oluşturan ID',
    'LBL_SEARCH_FORM_TITLE' => 'Potansiyel Arama',
    'LBL_SELECT_CHECKED_BUTTON_LABEL' => 'İşaretli Potansiyelleri Seç',
    'LBL_SELECT_CHECKED_BUTTON_TITLE' => 'İşaretli Potansiyelleri Seç',
    'LBL_STATE' => 'Eyalet:',
    'LBL_STATUS_DESCRIPTION' => 'Durum Tanımı:',
    'LBL_STATUS' => 'Durum:',
    'LBL_TITLE' => 'Unvan:',
    'LBL_UNCONVERTED' => 'Dönüştürülmemiş',
    'LNK_IMPORT_VCARD' => 'vCard tan Potansiyel Oluştur',
    'LNK_LEAD_LIST' => 'Potansiyelleri Görüntüle',
    'LNK_NEW_ACCOUNT' => 'Müşteri Oluştur',
    'LNK_NEW_APPOINTMENT' => 'Randevu Oluştur',
    'LNK_NEW_CONTACT' => 'Kontak Oluştur',
    'LNK_NEW_LEAD' => 'Potansiyel Oluştur',
    'LNK_NEW_NOTE' => 'Not Oluştur',
    'LNK_NEW_TASK' => 'Görev Oluştur',
    'LNK_NEW_CASE' => 'Talep Oluştur',
    'LNK_NEW_CALL' => 'Tel. Araması Planla',
    'LNK_NEW_MEETING' => 'Toplantı Planla',
    'LNK_NEW_OPPORTUNITY' => 'Fırsat Oluştur',
    'LNK_SELECT_ACCOUNTS' => '<b>VEYA</b> Müşteri Seç',
    'LNK_SELECT_CONTACTS' => 'VEYA Kontak Seçin',
    'NTC_COPY_ALTERNATE_ADDRESS' => 'Alternatif adresi birincil adrese kopyala',
    'NTC_COPY_PRIMARY_ADDRESS' => 'Birincil adresi alternatif adrese kopyala',
    'NTC_DELETE_CONFIRMATION' => 'Bu kaydı silmek istediğinizden emin misiniz?',
    'NTC_OPPORTUNITY_REQUIRES_ACCOUNT' => 'Bir Fırsat oluşturulabilmesi için Müşteri kaydı olması gerekir.\nLütfen yeni bir Müşteri oluşturun veya var olan Müşteri kaydını seçin.',
    'NTC_REMOVE_CONFIRMATION' => 'Bu talepten bu potansiyeli silmek istediğinize emin misiniz?',
    'NTC_REMOVE_DIRECT_REPORT_CONFIRMATION' => 'Doğrudan raporlanan kişi olarak bu kaydı silmek istediğinizden emin misiniz?',
    'LBL_CAMPAIGN_LIST_SUBPANEL_TITLE' => 'Kampanyalar',
    'LBL_TARGET_OF_CAMPAIGNS' => 'Başarılı Kampanya:',
    'LBL_TARGET_BUTTON_LABEL' => 'Hedeflenen',
    'LBL_TARGET_BUTTON_TITLE' => 'Hedeflenen',
    'LBL_TARGET_BUTTON_KEY' => 'T',
    'LBL_CAMPAIGN' => 'Kampanya:',
    'LBL_LIST_ASSIGNED_TO_NAME' => 'Atanan Kullanıcı',
    'LBL_PROSPECT_LIST' => 'Aday Müşteri Listesi',
    'LBL_PROSPECT' => 'Hedef',
    'LBL_CAMPAIGN_LEAD' => 'Kampanyalar',
    'LNK_LEAD_REPORTS' => 'Potansiyel Raporlarını Görüntüle',
    'LBL_BIRTHDATE' => 'Doğum Tarihi:',
    'LBL_THANKS_FOR_SUBMITTING_LEAD' => 'Potansiyel Oluşturulması için verdiğiniz bilgiye Teşekkürler.',
    'LBL_SERVER_IS_CURRENTLY_UNAVAILABLE' => 'Üzgünüz, sunucu şu anda erişilebilir değil, daha sonra tekrar deneyin.',
    'LBL_ASSISTANT_PHONE' => 'Asistan Telefonu',
    'LBL_ASSISTANT' => 'Asistan',
    'LBL_REGISTRATION' => 'Kayıt',
    'LBL_MESSAGE' => 'Bilgilerinizi lütfen aşağıya girin. Sizin için bilgi ve/veya bir müşteri kaydı oluşturulacak, onay beklenecek.',
    'LBL_SAVED' => 'Kayıt için teşekkürler. Müşteri kaydınız oluşturulacak ve en kısa sürede size geri dönüş yapılacaktır.',
    'LBL_CLICK_TO_RETURN' => 'Portal&#39;a Geri Dön',
    'LBL_CREATED_USER' => 'Oluşturan Kullanıcı',
    'LBL_MODIFIED_USER' => 'Değiştiren Kullanıcı',
    'LBL_CAMPAIGNS' => 'Kampanyalar',
    'LBL_CAMPAIGNS_SUBPANEL_TITLE' => 'Kampanyalar',
    'LBL_CONVERT_MODULE_NAME' => 'Modül',
    'LBL_CONVERT_MODULE_NAME_SINGULAR' => 'Modül',
    'LBL_CONVERT_REQUIRED' => 'Gerekli',
    'LBL_CONVERT_SELECT' => 'Seçime İzin Ver',
    'LBL_CONVERT_COPY' => 'Veri Kopyala',
    'LBL_CONVERT_EDIT' => 'Değiştir',
    'LBL_CONVERT_DELETE' => 'Sil',
    'LBL_CONVERT_ADD_MODULE' => 'Modül Ekle',
    'LBL_CONVERT_EDIT_LAYOUT' => 'Dönüştürme Yerleşimini Değiştir',
    'LBL_CREATE' => 'Oluştur',
    'LBL_SELECT' => '<b>VEYA</b> Seç',
    'LBL_WEBSITE' => 'Web Sitesi',
    'LNK_IMPORT_LEADS' => 'Potansiyel Verilerini Yükle',
    'LBL_NOTICE_OLD_LEAD_CONVERT_OVERRIDE' => 'Bilgi: Mevcut Potansiyel Değiştirme ekranı, özel alanlar içermekte. Stüdyoda Potansiyel Değiştirme ekranını ilk kez özelleştirirken, yerleşime gereken şekilde özel alanları eklemeniz gerekecektir. Daha önce olduğu gibi özel alanlar yerleşimde otomatik olarak gözükmeyecektir.',
//Convert lead tooltips
    'LBL_MODULE_TIP' => 'Yeni bir kayıt oluşturmak için modül.',
    'LBL_REQUIRED_TIP' => 'Potansiyel değiştirilmeden önce gerekli modüllerin oluşturulmuş veya seçilmiş olması gerekmektedir.',
    'LBL_COPY_TIP' => 'Eğer seçiliyse, Potansiyeldeki alanlar, yeni kayıtlardaki aynı isimli alanlara kopyalanacak.',
    'LBL_SELECTION_TIP' => 'Potansiyel değiştirme süreci yerine Kontaklardaki ilişki alanı bulunan modüller seçilebilir.',
    'LBL_EDIT_TIP' => 'Bu modül için dönüştürme yerleşimini biçimlendir.',
    'LBL_DELETE_TIP' => 'Bu modülü dönüştürülen yerleşimden çıkar.',

    'LBL_ACTIVITIES_MOVE' => 'Aktiviteleri Taşı:',
    'LBL_ACTIVITIES_COPY' => 'Aktiviteleri Kopyala:',
    'LBL_ACTIVITIES_MOVE_HELP' => "Potansiyelin aktivitelerini taşımak için kayıt seçin. Görevler, Çağrılar, Toplantılar, Notlar ve E-Postalar seçilen kayıt(lara) taşınacaktır.",
    'LBL_ACTIVITIES_COPY_HELP' => "Potansiyel aktivitelerinden kopyaları oluşturulacak kayıtları seçiniz. Yeni Görevler, Çağrılar, Toplantı ve Notlar seçilen kayıtların her biri için oluşturulur. E-postalar seçilen kayıtlar ile ilişkili olacaktır.",
    //For export labels
    'LBL_PHONE_HOME' => 'Ev Telefonu',
    'LBL_PHONE_MOBILE' => 'Cep Telefonu',
    'LBL_PHONE_WORK' => 'İş Telefonu',
    'LBL_PHONE_OTHER' => 'Diğer Telefon',
    'LBL_PHONE_FAX' => 'Fax',
    'LBL_CAMPAIGN_ID' => 'Kampanya ID',
    'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Atanmış Kullanıcı İsmi',
    'LBL_EXPORT_ASSIGNED_USER_ID' => 'Atanmış Kullanıcı ID',
    'LBL_EXPORT_MODIFIED_USER_ID' => 'Değiştiren ID',
    'LBL_EXPORT_CREATED_BY' => 'Oluşturan ID',
    'LBL_EXPORT_PHONE_MOBILE' => 'Cep Telefonu',
    'LBL_EXPORT_EMAIL2' => 'Diğer E-Posta Adresi',
    'LBL_EDITLAYOUT' => 'Yerleşimi Değiştir' /*for 508 compliance fix*/,
    'LBL_ENTERDATE' => 'Oluşturulma Tarihi' /*for 508 compliance fix*/,
    'LBL_LOADING' => 'Yükleniyor' /*for 508 compliance fix*/,
    'LBL_EDIT_INLINE' => 'Değiştir' /*for 508 compliance fix*/,
    //D&B Principal Identification
    'LBL_DNB_PRINCIPAL_ID' => 'D&B Asıl Id',
    //Dashlet
    'LBL_OPPORTUNITIES_SUBPANEL_TITLE' => 'Fırsatlar',

    //Document title
    'TPL_BROWSER_SUGAR7_RECORDS_TITLE' => '{{module}} &raquo; {{appId}}',
    'TPL_BROWSER_SUGAR7_RECORD_TITLE' => '{{#if last_name}}{{#if first_name}}{{first_name}} {{/if}}{{last_name}} &raquo; {{/if}}{{module}} &raquo; {{appId}}',
    'LBL_NOTES_SUBPANEL_TITLE' => 'Notlar',

    'LBL_HELP_CONVERT_TITLE' => '{{module_name}} kaydını dönüştür',

    // Help Text
    // List View Help Text
    'LBL_HELP_RECORDS' => '{{plural_module_name}} modülü, organizasyonunuzun sağladığı ürün ve hizmetler ile ilgilenen birey potansiyelleri içerir. {{module_name}}, satış {{opportunities_singular_module}} adayı olarak belirlendiğinde, {{plural_module_name}} kaydı {{contacts_module}}, {{opportunities_module}}, ve {{accounts_module}} kayıtlarına dönüştürülebilir. {{plural_module_name}} kayıdı oluşturmak için Sugar içinde farklı yöntemler bulunmaktadır, örneğin {{plural_module_name}} modülü ile, aynı kayıttan oluşturarak, dışarıdan {{plural_module_name}} içeri yükleyerek, vb. {{module_name}} kaydı oluşturulduğunda, {{module_name}} modülündeki eksik bilgileri {{plural_module_name}} kayıt izleme ekranından görebilir ve düzeltebilirsiniz.',

    // Record View Help Text
    'LBL_HELP_RECORD' => '{{plural_module_name}} modülü, organizasyonunuz tarafından sunulan ürün ve servisler ile ilgilenebilecek potansiyel bireylerden oluştur.

- Kaydın alanlarını, herhangi bir alana veya "Değiştir" tuşuna tıklayarak değiştirin.
- Alt solda yer alan paneli "Kayıt Görünümü" olarak değiştirerek, diğer kayıtlar ile olan bağlantıları görün veya değiştirin.
- Kaydın isminin sağındaki ikonlara tıklayarak kaydı izleyiniz veya favori olarak işaretleyiniz.
- Alt solda yer alan paneli "Aktivite Akışı" olarak değiştirerek, kullanıcı yorumları görün, oluşturun ve {{activitystream_singular_module}} kayıtındaki değişiklik tarihçesini görün.
- Daha fazla aksiyon, Değiştir tuşunun sağındaki Aksiyonlar seçimli menüde yer almaktadır.',

    // Create View Help Text
    'LBL_HELP_CREATE' => '{{plural_module_name}} modülü, organizasyonunuzun sağladığı ürün ve hizmetler ile ilgilenen birey potansiyelleri içerir. {{module_name}}, satış {{opportunities_singular_module}} adayı olarak belirlendiğinde {{contacts_singular_module}}, {{accounts_singular_module}} ve {{opportunities_singular_module}} kayıtlarına dönüştürülebilir.

{{module_name}} kaydı oluşturmak için:
1. Alanlar için değerleri istendiği gibi girin.
- "Zorunlu" olarak işaretlenmiş alanların kayıt öncesinde girilmesi gerekmektedir. 
- "Daha fazlasını göster" seçeneği ile, gerektiğinde ek alanları görünür kılın. 
2. "Kaydet" tuşuna basarak kayıt işlemini tamamlayın ve önceki sayfaya dönün.',

    // Convert View Help Text
    'LBL_HELP_CONVERT' => 'Sugar, {{module_name}} kalifikasyon kriterlerinizi sağlandığında, {{plural_module_name}} kaydının {{contacts_module}}, {{accounts_module}} ve diğer modüllere dönüştürülmesine izin verir.

Her İlişkilendir düğmesine basıp alanları değiştirerek ardından yeni kayıt değerlerini onaylayarak her modülde ilerleyin.

Sugar, {{module_name}} bilgilerinizle eşleşen mevcut bir kayıt bulursa İlişkilendir düğmesiyle bir çift kaydı seçme ve onaylama veya "Dikkate alma ve yeni oluştur" düğmesine tıklayıp normal şekilde devam etme seçeneklerine sahipsiniz. 

Her zorunlu ve istenen modülü onayladıktan sonra, üstteki Kaydet ve Dönüştür tuşuna basarak dönüşümü sonlandırın.',

    //Marketo
    'LBL_MKTO_SYNC' => 'Marketo&reg; ile senkronize et',
    'LBL_MKTO_ID' => 'Marketo Potansyel ID',
    'LBL_MKTO_LEAD_SCORE' => 'Potansiyel Skoru',

    'LBL_FILTER_LEADS_REPORTS' => 'Potansiyel Raporları',
    'LBL_DATAPRIVACY_BUSINESS_PURPOSE' => 'Şunun İçin İç Amaçlı Onaylı:',
    'LBL_DATAPRIVACY_CONSENT_LAST_UPDATED' => 'Son Güncellemeye Onay Verin',

    // Leads Pipeline view
    'LBL_PIPELINE_ERR_CONVERTED' => '{{moduleSingular}} durumu değiştirilemiyor. Bu {{moduleSingular}} önceden değiştirilmiş.',

    // AI Predict
    'LBL_AI_LEADS_CONVERSION_PREDICTION_NAME' => 'Potansiyelleri Dönüştürme Tahmini',
    'LBL_AI_LEADS_CONVERSION_PREDICTION_DESC' => 'Belirli bir Potansiyelin tahmin ayrıntılarını görüntüleyin',
    'LBL_AI_CONVRATE' => 'Dönüştürme Oranı',
    'LBL_AI_CONVLEADS' => 'Dönüştürülen Potansiyeller',
    'LBL_AI_LEADVELOCITY' => 'Dönüştürme süresi (Potansiyel hızı)',
    'LBL_AI_LEADTIMESPAN' => 'Potansiyel Oluşturma ile Dönüştürme Arasındaki Süre',

    // Admin convert lead layout
    'LBL_ENABLE_RLIS' => 'Gelir Kalemlerini Etkinleştir',
    'LBL_REQUIRE_RLIS' => 'Yeni Fırsat oluşturulurken Gelir Kalemi Ögeleri gereklidir',
    'LBL_COPY_DATA_RLIS' => 'Yeni Fırsat oluşturulurken Potansiyel verilerini Gelir Kalemi Ögelerine kopyalayın',

    //Filters 14.0
    'LBL_LIST_MQL_LEADS' => 'MQL Potansiyel Müşterileri',
    'LBL_LIST_NEW_MQL_LEADS' => 'Yeni MQL potansiyel müşterileri',
    'LBL_LIST_SQL_LEADS' => 'SQL Potansiyel Müşterileri',
    'LBL_LIST_TODAY_LEADS' => 'Bugünün Yeni Potansiyel Müşterileri',
];
