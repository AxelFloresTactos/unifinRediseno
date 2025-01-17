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
 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$mod_strings = [

    'LBL_ASSIGN_TEAM' => 'Takıma Ata',

    'LBL_RE' => 'YNT:',

    'ERR_BAD_LOGIN_PASSWORD' => 'Kullanıcı Adı veya Şifre Hatalı',
    'ERR_BODY_TOO_LONG' => '\rBÜTÜN e-postanın alınması için, İçerik metni çok uzun. Kesildi.',
    'ERR_INI_ZLIB' => 'Zlib sıkıştırması geçici süre durdurulamadı.  "Test Ayarları" çalışmayabilir.',
    'ERR_MAILBOX_FAIL' => 'Herhangi bir posta hesabı getirilemedi.',
    'ERR_NO_IMAP' => 'IMAP kütüphanesi bulunamadı.  Gelen Posta ile devam etmeden önce, bu problemi çözün',
    'ERR_NO_OPTS_SAVED' => 'Gelen E-Posta hesabınız için optimum değerler kaydedilmedi.  Lütfen ayarlarınızı gözden geçirin',
    'ERR_TEST_MAILBOX' => 'Lütfen ayarlarınızı kontrol edip, tekrar deneyiniz.',
    'ERR_DELETE_FOLDER' => 'Klasör silinemedi.',
    'ERR_UNSUBSCRIBE_FROM_FOLDER' => 'Silmeden önce klasörden abonelik kaldırılamadı.',

    'LBL_APPLY_OPTIMUMS' => 'Optimum Değerleri Uygula',
    'LBL_ASSIGN_TO_USER' => 'Kullanıcıya Ata',
    'LBL_AUTOREPLY_OPTIONS' => 'Otomatik Yanıt Opsiyonları',
    'LBL_AUTOREPLY' => 'Otomatik Yanıt Şablonu',
    'LBL_AUTOREPLY_HELP' => 'E-Posta gönderen kişilerin mesajlarının ulaştığını bildirmek için otomatik bir yanıt seçin.',
    'LBL_BASIC' => 'Posta Hesap Bilgisi',
    'LBL_CASE_MACRO' => 'Talep Makrosu',
    'LBL_CASE_MACRO_DESC' => 'Yüklenen e-postanın Talep ile ilişkilendirilmesi için yorumlanacak ve kullanılacak makroyu belirtin.',
    'LBL_CASE_MACRO_DESC2' => 'Herhangi bir değer belirtin, fakat <b>"%1"</b> değerini koruyun.',
    'LBL_CERT_DESC' => 'Posta sunucusunun Güvenlik Sertifikasının denetlenmesini şart koş  - self-signing ise kullanmayınız.',
    'LBL_CERT' => 'Sertifikayı Denetleyin',
    'LBL_CLOSE_POPUP' => 'Pencereyi Kapat',
    'LBL_CREATE_NEW_GROUP' => '--Kaydetme Sırasında Grup Oluştur--',
    'LBL_CREATE_TEMPLATE' => 'Oluştur',
    'LBL_SUBSCRIBE_FOLDERS' => 'Abonelik Dosyaları',
    'LBL_DEFAULT_FROM_ADDR' => 'Varsayılan:',
    'LBL_DEFAULT_FROM_NAME' => 'Varsayılan:',
    'LBL_DELETE_SEEN' => 'Veri Yükleme sonrasında, okunan E-Postaları Sil',
    'LBL_EDIT_TEMPLATE' => 'Değiştir',
    'LBL_EMAIL_OPTIONS' => 'E-Posta Yönetim Seçenekleri',
    'LBL_EMAIL_BOUNCE_OPTIONS' => 'Ulaşmayan E-Posta Yönetim Posta Kutusu',
    'LBL_FILTER_DOMAINS_DESC' => 'Otomatik yanıt e-postalarının gönderilmeyeceği etki alanlarının virgülle ayrılmış listesi.',
    'LBL_ASSIGN_TO_GROUP_FOLDER_DESC' => 'Sugar da gelen E-Postalardan otomatik olarak E-Posta kayıtları oluşturmak için seçin.',
    'LBL_POSSIBLE_ACTION_DESC' => 'Talep Oluştur opsiyonu için, bir Grup Dizini seçilmelidir',
    'LBL_FILTER_DOMAINS' => 'Domaine Otomatik Yanıtlama Yok',
    'LBL_FIND_OPTIMUM_KEY' => 'f',
    'LBL_FIND_OPTIMUM_MSG' => '<br>Optimum bağlantı değişkenlerini buluyor.',
    'LBL_FIND_OPTIMUM_TITLE' => 'Optimum Konfigürasyonu Bul',
    'LBL_FIND_SSL_WARN' => '<br>SSL Testi uzun sürebilir.  Lütfen sabırlı olun.<br>',
    'LBL_FORCE_DESC' => 'Bazı IMAP/POP3 sunucular için özel opsiyon ihtiyacı bulunmaktadır. Bağlanırken opsiyonun tersine zorlayın (örneğin, /notls)',
    'LBL_FORCE' => 'Tersine Zorla',
    'LBL_FOUND_MAILBOXES' => 'Aşağıdaki kullanılabilir dizinler bulundu.<br>Seçmek için birine tıklayınız:',
    'LBL_FOUND_OPTIMUM_MSG' => '<br>Optimum ayarlar bulundu.  Lütfen aşağıdaki butona basarak, posta hesabınıza uygulayınız.',
    'LBL_FROM_ADDR' => '"Kimden" Adresi',
    // as long as XTemplate doesn't support output escaping, transform
    // quotes to html-entities right here (bug #48913)
    'LBL_FROM_ADDR_DESC' => 'Burada sağlanan e-posta adresi, e-postanın &#39;Kimden&#39; bölümünde, posta servis sağlayıcısı tarafından getirilen kısıtlamalar nedeniyle görünmeyebilir. Bu durumda, giden posta sunucusunda tanımlanan e-posta adresi kullanılacaktır.',
    'LBL_FROM_NAME_ADDR' => 'Kimden İsim/E-Posta',
    'LBL_FROM_NAME' => '"Kimden" İsmi',
    'LBL_GROUP_QUEUE' => 'Gruba ata',
    'LBL_HOME' => 'Ana Sayfa',
    'LBL_LIST_MAILBOX_TYPE' => 'E-Posta Hesabı Kullanımı',
    'LBL_LIST_NAME' => 'İsim:',
    'LBL_LIST_GLOBAL_PERSONAL' => 'Tipi',
    'LBL_LIST_SERVER_URL' => 'E-Posta Sunucusu',
    'LBL_LIST_STATUS' => 'Durum',
    'LBL_LOGIN' => 'Kullanıcı İsmi',
    'LBL_MAILBOX_DEFAULT' => 'Gelen Kutusu',
    'LBL_MAILBOX_SSL_DESC' => 'Bağlanırken SSL kullan. Eğer bu yöntem çalışmazsa, PHP kurulumu konfigürasyonunda "--with-imap-ssl" seçeneğinin olduğunu kontrol edin.',
    'LBL_MAILBOX_SSL' => 'SSL Kullan',
    'LBL_MAILBOX_TYPE' => 'Olası Aksiyonlar',
    'LBL_DISTRIBUTION_METHOD' => 'Dağıtım Metodu',
    'LBL_CREATE_CASE_REPLY_TEMPLATE' => 'Talep Yanıtı Şablonu Oluştur',
    'LBL_CREATE_CASE_REPLY_TEMPLATE_HELP' => 'E-Posta Gönderen kişilere, bir Talebin Oluşturulduğunu bildirmek için otomatik bir yanıt seçin. E-Postanın Konu kısmı Talep Numarası içerir ve bu Talep Makro ayarlarına yapıştırılır. Bu cevap sadece ilk mesaj alıcı tarafından gönderilmiş ise geçerlidir.',
    'LBL_MAILBOX' => 'İzlenen Dosyalar',
    'LBL_TRASH_FOLDER' => 'Silinen Dosya',
    'LBL_GET_TRASH_FOLDER' => 'Silinen Dosyayı Al',
    'LBL_SENT_FOLDER' => 'Gönderilen Dosya',
    'LBL_GET_SENT_FOLDER' => 'Gönderilen Dosyayı al',
    'LBL_SELECT' => 'Seç',
    'LBL_MARK_READ_DESC' => 'Yükleme sırasında E-Posta sunucusundaki mesajları okundu olarak işaretle; silme.',
    'LBL_MARK_READ_NO' => 'E-Posta içeri aktarmadan sonra silindi olarak işaretlendi',
    'LBL_MARK_READ_YES' => 'İçeri aktarmadan sonra sunucuda kalan E-Posta',
    'LBL_MARK_READ' => 'Mesajları Sunucuda Bırak',
    'LBL_MAX_AUTO_REPLIES' => 'Otomatik Yanıtlama Sayısı',
    'LBL_MAX_AUTO_REPLIES_DESC' => '24 saatlik zaman diliminde, bir E-Posta adresine gönderilen otomatik yanıtların maksimum adedini belirtin.',
    'LBL_PERSONAL_MODULE_NAME' => 'Kişisel Posta Hesabı',
    'LBL_PERSONAL_MODULE_NAME_SINGULAR' => 'Kişisel Posta Hesabı',
    'LBL_CREATE_CASE' => 'E-Postadan Talep Oluştur',
    'LBL_CREATE_CASE_HELP' => 'Sugar&#39;da gelen E-Postalardan otomatik olarak Talep oluşturmak için seçin.',
    'LBL_MODULE_NAME' => 'Grup Posta Hesapları',
    'LBL_MODULE_NAME_SINGULAR' => 'Grup Posta Hesabı',
    'LBL_BOUNCE_MODULE_NAME' => 'Ulaşmayan E-Posta Yönetim Posta Kutusu',
    'LBL_MODULE_TITLE' => 'Gelen E-Posta',
    'LBL_NAME' => 'İsim',
    'LBL_NONE' => 'Yok',
    'LBL_NO_OPTIMUMS' => 'Optimum değerleri bulamıyor.  Lütfen ayarlarınızı kontrol edip tekrar deneyiniz.',
    'LBL_ONLY_SINCE_DESC' => 'POP3 kullanırken, PHP Yeni/Okunmamış mesajları filtreleyemez.  Bu seçenek posta hesabına son bağlantıdan sonra oluşan mesajların kontrolüne izin verir.  Bu sunucunuz IMAP kullanmıyorsa, performansın önemli ölçüde artmasını sağlayacaktır.',
    'LBL_ONLY_SINCE_NO' => 'Hayır. Posta sunucusundaki tüm E-Postaları kontrol et.',
    'LBL_ONLY_SINCE_YES' => 'Evet.',
    'LBL_ONLY_SINCE' => 'Yalnızca Son Kontrolden sonraki Verileri Yükle:',
    'LBL_OUTBOUND_SERVER' => 'Giden E-Posta Sunucusu',
    'LBL_PASSWORD_CHECK' => 'Şifre Kontrol',
    'LBL_PASSWORD' => 'Şifre',
    'LBL_POP3_SUCCESS' => 'POP3 test bağlantınız başarılı.',
    'LBL_POPUP_FAILURE' => 'Test bağlantısı başarısız. Hata aşağıda gösterilmiştir.',
    'LBL_POPUP_SUCCESS' => 'Test bağlantısı başarılı. Ayarlarınız çalışıyor.',
    'LBL_POPUP_TITLE' => 'Ayarları Test Et',
    'LBL_GETTING_FOLDERS_LIST' => 'Dizin Listesini Alıyor',
    'LBL_SELECT_SUBSCRIBED_FOLDERS' => 'Üye Olunan Dizin(leri) seçiniz',
    'LBL_SELECT_TRASH_FOLDERS' => 'Silinen Dosyasını Seçin',
    'LBL_SELECT_SENT_FOLDERS' => 'Gönderilen Dosyayı Seçin',
    'LBL_DELETED_FOLDERS_LIST' => 'Şu dizinler mevcut değil veya sunucudan silindi: %s',
    'LBL_PORT' => 'E-Posta Sunucu Port u',
    'LBL_QUEUE' => 'Posta Hesabı Kuyruğu',
    'LBL_REPLY_NAME_ADDR' => 'Yanıt İsim/E-Posta',
    'LBL_REPLY_TO_NAME' => '"Kime" İsmi',
    'LBL_REPLY_TO_ADDR' => '"Kime" Adresi',
    'LBL_SAME_AS_ABOVE' => 'Kimden İsim/Adres bilgisini Kullanıyor',
    'LBL_SAVE_RAW' => 'İşlenmemiş Kaynağı Sakla',
    'LBL_SAVE_RAW_DESC_1' => 'Her yüklenen e-posta için işlenmemiş halini tutmak istiyorsanız "Evet" seçin.',
    'LBL_SAVE_RAW_DESC_2' => 'Büyük Dosya Ekleri, yanlış veya az kaynak kullanan veri tabanlarında hataya neden olabilir.',
    'LBL_SERVER_OPTIONS' => 'Gelişmiş Kurulum',
    'LBL_SERVER_TYPE' => 'E-Posta Sunucu Protokolü',
    'LBL_SERVER_URL' => 'E-Posta Sunucu Adresi',
    'LBL_SSL_DESC' => 'Eğer E-Posta sunucusu güvenli soket bağlantısını destekliyorsa, bunun etkinleştirilmesi E-Postaların yüklenmesi sırasında SSL bağlantısına zorlayacaktır.',
    'LBL_ASSIGN_TO_TEAM_DESC' => 'Seçilen takımın posta hesabına ulaşımı var.',
    'LBL_SSL' => 'SSL Kullan',
    'LBL_STATUS' => 'Durum',
    'LBL_SYSTEM_DEFAULT' => 'Sistem Varsayılan Değerleri',
    'LBL_TEST_BUTTON_KEY' => 't',
    'LBL_TEST_BUTTON_TITLE' => 'Test',
    'LBL_TEST_SETTINGS' => 'Ayarları Test Et',
    'LBL_TEST_SUCCESSFUL' => 'Bağlantı başarıyla tamamlandı.',
    'LBL_TEST_WAIT_MESSAGE' => 'Bir dakika lütfen...',
    'LBL_TLS_DESC' => 'E-Posta sunucusuna bağlanırken Transport Layer Security kullanın - yalnızca E-Posta sunucunuz bu protokol desteğini sağlıyorsa kullanılabilir.',
    'LBL_TLS' => 'TLS Kullan',
    'LBL_WARN_IMAP_TITLE' => 'Gelen E-Posta Etkin Değil',
    'LBL_WARN_IMAP' => 'Uyarılar:',
    'LBL_WARN_NO_IMAP' => 'IMAP c-client kütüphaneleri PHP modülü ile aktive edilmiş/compile edilmiş değilse, Gelen E-Posta fonksiyonları <b>çalışamaz</b> .  Lütfen bu problemin çözümü için sistem yöneticiniz ile görüşünüz.',

    'LNK_CREATE_GROUP' => 'Yeni Grup Oluştur',
    'LNK_LIST_CREATE_NEW_GROUP' => 'Yeni Grup E-Posta Hesabı',
    'LNK_LIST_CREATE_NEW_BOUNCE' => 'Yeni Ulaşmayan E-Posta Yönetim Hesabı',
    'LNK_LIST_MAILBOXES' => 'Tüm E-Posta Hesapları',
    'LNK_LIST_QUEUES' => 'Tüm Kuyruklar',
    'LNK_LIST_SCHEDULER' => 'Planlayıcılar',
    'LNK_LIST_TEST_IMPORT' => 'E-Posta Verilerini Yükleme Testi',
    'LNK_NEW_QUEUES' => 'Yeni Kuyruk Oluştur',
    'LNK_SEED_QUEUES' => 'Takımlardan Seed Kuyrukları',
    'LBL_GROUPFOLDER_ID' => 'Grup Dizini ID',
    'LBL_ASSIGN_TO_GROUP_FOLDER' => 'Grup Dizinine Ata',
    'LBL_STATUS_ACTIVE' => 'Aktif',
    'LBL_STATUS_INACTIVE' => 'İnaktif',
    'LBL_IS_PERSONAL' => 'kişisel',
    'LBL_IS_GROUP' => 'grup',
    'LBL_ENABLE_AUTO_IMPORT' => 'E-Postaları Otomatik Yükle',
    'LBL_WARNING_CHANGING_AUTO_IMPORT' => 'Uyarı: Otomatik al ayarlarını değiştiriyorsunuz, bu işlem veri kaybına sebep olabilir.',
    'LBL_WARNING_CHANGING_AUTO_IMPORT_WITH_CREATE_CASE' => 'Uyarı: Otomatik talep oluştururken otomatik al ayarı seçili olmalı.',
    'LBL_EDIT_LAYOUT' => 'Yerleşimi Değiştir' /*for 508 compliance fix*/,
    'LBL_AUTHORIZED_ACCOUNT' => 'E-Posta Adresi',
    'LBL_EMAIL_PROVIDER' => 'E-Posta Sağlayıcısı',
    'LBL_AUTH_STATUS' => 'Yeki Durumu',
];
