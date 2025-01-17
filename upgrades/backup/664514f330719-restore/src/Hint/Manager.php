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
namespace Sugarcrm\Sugarcrm\Hint;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Sugarcrm\Sugarcrm\Hint\Http\Client;
use Sugarcrm\Sugarcrm\Hint\Logger\Logger as HintLogger;
use Sugarcrm\Sugarcrm\Hint\Queue\Event\AccountsetAddEvent;
use Sugarcrm\Sugarcrm\Hint\Queue\Event\TargetAddEvent;
use Sugarcrm\Sugarcrm\Hint\Queue\Queue;
use Sugarcrm\Sugarcrm\Entitlements\SubscriptionManager;

/**
 * Class Manager - this is singleton used to access all Hint services
 */
class Manager implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    //
    //  Class constants
    //
    /**
     * @var string Configuration key for endpoint.
     */
    const CONFIG_KEY_SERVICE_URL = 'service-url';

    /**
     * @var string ISS service URL
     */
    const ISS_SERVICE_URL = 'hint-iss-service-url';
    /**
     * @var string notifications service URL
     */
    const NOTIFICATIONS_SERVICE_URL = 'hint-notifications-service-url';

    /**
     * @var string US geo region prefix
     */
    const US_GEO = 'US';

    /**
     * @var string EU geo region prefix
     */
    const EU_GEO = 'EU';

    /**
     * @var string APSE geo region prefix
     */
    const APSE_GEO = 'APSE';

    /**
     * @var string Configuration key for Stage2 obfuscation salt. This salt value is used whenever
     * there is a need to uniquelly (accross all SugarCRM client instances) obfuscate a datum
     * (e.g. user's analytic's ID) It is both random and unknown to Stage2 service to prevent
     * reversing obfuscation.
     */
    const CONFIG_KEY_OBFUSCATION_SALT = 'obfuscation-salt';

    /**
     * @var string IS module name.
     */
    const MODULE = 'Stage2';

    /**
     * @var string IS platform.
     */
    const PLATFORM = 'base';

    /**
     * @var string Key for access token in Stage2 and Notifications Service authentication response.
     */
    const KEY_ACCESS_TOKEN = 'token';

    const KEY_PRIVILEGE_TOKEN = 'privToken';

    const KEY_TIME_TO_LIVE_MILLISECONDS = 'ttlMs';

    const KEY_MAX_REQUESTS_PER_SECOND = 'maxReqPerSec';

    /**
     * @var string Key for subscription type in Stage2 authentication response.
     */
    const SUBSCRIPTION_TYPE = 'subscriptionType';


    public $obfuscationSalt;

    /**
     * Get instance.
     */
    public static function instance()
    {
        //  Singleton instance.
        static $instance = null;

        if (is_null($instance)) {
            $instance = new static();
        }

        $instance->setLogger(new HintLogger());
        $instance->initialize();

        return $instance;
    }

    /**
     * Initialize internal variables.
     */
    public function initialize()
    {
        $this->logger->info('Initializing shared instance of Hint Manager.');

        //  Load configuration from the database.
        $dbConfig = static::loadConfig();

        // Get Hint Host geo from the SugarConfig
        $geo = $this->getHintHostGeoInfo();

        // load hint buildConfig object
        $this->buildConfig = HintConstants::hintConfig();

        //  Salt is not included in the optional client config file as it has to be both unique
        //  accross all SugarCRM client instances *and* remain unknown to our service (otherwise
        //  obfuscation could be reversed). Thus the salt is always generated by the SugarCRM
        //  instance itself.
        //  Always initialize the salt as it may be even used without the rest of the config.
        if (array_key_exists(static::CONFIG_KEY_OBFUSCATION_SALT, $dbConfig)) {
            $this->obfuscationSalt = $dbConfig[static::CONFIG_KEY_OBFUSCATION_SALT];
        } else {
            $this->obfuscationSalt = uniqid();
            \BeanFactory::getBean('Administration')->saveSetting(
                static::MODULE,
                static::CONFIG_KEY_OBFUSCATION_SALT,
                $this->obfuscationSalt,
                static::PLATFORM
            );
        }

        //  Read client options and create the client.
        $serviceUrl = static::readOptionFromConfigurations($this->buildConfig, $geo, static::CONFIG_KEY_SERVICE_URL);
        if (is_null($serviceUrl) || empty($serviceUrl)) {
            $this->logger->alert('Missing ' . static::CONFIG_KEY_SERVICE_URL . ' Stage2 config param.');
            return;
        }

        $this->serviceUrl = $serviceUrl;

        $issServiceUrl = static::readOptionFromConfigurations($this->buildConfig, $geo, static::ISS_SERVICE_URL);
        if (empty($issServiceUrl)) {
            $this->logger->alert('Missing ' . static::ISS_SERVICE_URL . ' Stage2 config param.');
            return;
        }

        $this->issServiceUrl = $issServiceUrl;

        $notificationsServiceUrl = static::readOptionFromConfigurations($this->buildConfig, $geo, static::NOTIFICATIONS_SERVICE_URL);
        if (empty($notificationsServiceUrl)) {
            $this->logger->alert('Missing ' . static::NOTIFICATIONS_SERVICE_URL . ' Stage2 config param.');
            return;
        }

        $this->notificationsServiceUrl = $notificationsServiceUrl;

        // Read instance ID and license key from system info.
        $systemInfo = \SugarSystemInfo::getInstance();
        $this->instanceId = $systemInfo->getApplicationKeyInfo()['application_key'];
        $this->licenseKey = $systemInfo->getLicenseKey();
        $this->sugarVersion = $systemInfo->getAppInfo()['sugar_version'];

        $this->logger->info('Shared instance of Hint Manager initialized.');
    }

    /**
     * Get instance info body
     *
     * @return array
     */
    public function getInstanceInfoBody()
    {
        $config = \SugarConfig::getInstance();
        $systemInfo = \SugarSystemInfo::getInstance();

        $instanceInfoBody = [
            'companyId' => $this->licenseKey,
            'siteURL' => $config->get('site_url'),
            'uniqueKey' => $config->get('unique_key'),
            'sugarVersion' => $systemInfo->getAppInfo()['sugar_version'],
            'hintVersion' => $this->buildConfig['hint_version'],
        ];

        return $instanceInfoBody;
    }

    /**
     * Get a new access token.
     *
     * @return array (string indexed)
     * @throws \SugarApiException
     * @throws \SugarApiExceptionError
     * @throws \SugarApiExceptionInvalidGrant
     * @throws \SugarApiExceptionNotAuthorized
     * @throws \SugarApiExceptionNotFound
     */
    public function getNewAccessToken()
    {
        $stage2client = new Client($this->serviceUrl);
        $body = $this->getInstanceInfoBody();
        //  Obtain access token for Stage2.
        $response = $stage2client->newToken($body);
        if (empty($response[static::KEY_ACCESS_TOKEN])) {
            $this->logger->fatal('Missing access token from data enrichment');
            throw new \SugarApiException('Bad response from data enrichment /authorize');
        }

        $tokenResponse = [
            'accessToken' => $response[static::KEY_ACCESS_TOKEN],
            'privilegeToken' => $response[static::KEY_PRIVILEGE_TOKEN],
        ];
        // older servers won't send the subscription type, so be check before using
        if (isset($response[static::SUBSCRIPTION_TYPE])) {
            $tokenResponse['subscriptionType'] = $response[static::SUBSCRIPTION_TYPE];
        }
        return $tokenResponse;
    }

    /**
     * Get a new notifications service access token.
     *
     * @return array (string indexed)
     * @throws \SugarApiException
     * @throws \SugarApiExceptionError
     * @throws \SugarApiExceptionInvalidGrant
     * @throws \SugarApiExceptionNotAuthorized
     * @throws \SugarApiExceptionNotFound
     */
    public function createNotificationsServiceAccessToken()
    {
        global $current_user;

        $config = \SugarConfig::getInstance();
        $systemInfo = \SugarSystemInfo::getInstance();

        if (empty($this->instanceId) || empty($this->licenseKey)) {
            $this->logger->alert('Missing Notifications Service client ID/secret');
            throw new \SugarApiExceptionNotAuthorized('Bad configuration for Notifications Service');
        }

        $stage2client = new Client($this->notificationsServiceUrl);
        $body = [
            'userId' => $current_user->id,
            'companyId' => $this->licenseKey,
            'sugarVersion' => $systemInfo->getAppInfo()['sugar_version'],
            'siteURL' => $config->get('site_url', ''),
            'uniqueKey' => $config->get('unique_key', ''),
        ];

        //  Obtain access token for Stage2.
        $response = $stage2client->createNotificationsServiceToken($body);
        if (empty($response[static::KEY_ACCESS_TOKEN])) {
            $this->logger->fatal('Missing Notifications Service access token');
            throw new \SugarApiException('Bad response from Notifications Service authorize');
        }

        $tokenResponse = [
            'accessToken' => $response[static::KEY_ACCESS_TOKEN],
            'ttlMs' => $response[static::KEY_TIME_TO_LIVE_MILLISECONDS],
            'maxReqPerSec' => $response[static::KEY_MAX_REQUESTS_PER_SECOND],
        ];
        return $tokenResponse;
    }

    /**
     * Register company ID to DE
     *
     * @return array
     */
    public function registerCompanyIDToDE()
    {
        if (empty($this->instanceId) || empty($this->licenseKey)) {
            $this->logger->alert('Missing instanceId or licenseKey');
            throw new \SugarApiExceptionNotAuthorized('Bad configuration for registerToCompanyID Service');
        }

        $stage2client = new Client($this->serviceUrl);
        $body = $this->getInstanceInfoBody();
        // Obtain access token for Stage2.
        $response = $stage2client->registerCompanyIdentityToDE($body);

        $tokenResponse = [
            'status' => $response,
        ];

        return $tokenResponse;
    }

    /**
     * Update data enrichment config bean
     *
     * @param array $configToUpdate
     * @return array
     */
    public function updateDataEnrichmentConfigBean($configToUpdate)
    {

        $stage2client = new Client($this->serviceUrl);
        $response = $stage2client->updateConfigFields($configToUpdate);

        $statusResponse = [
            'status' => $response,
        ];

        return $statusResponse;
    }

    /**
     * Register to config bean
     *
     * @param string $privilegeToken
     * @param array $configDataBeanData
     * @return array
     */
    public function registerToConfigBean($privilegeToken, $configDataBeanData)
    {
        $stage2client = new Client($this->serviceUrl);
        $body = [
            'data' => $configDataBeanData,
        ];

        $response = $stage2client->registerConfigToDE($privilegeToken, $body);

        $tokenResponse = [
            'status' => $response,
        ];

        return $tokenResponse;
    }

    /**
     * Load config
     *
     * Return persisted configuration options for the given key.
     * If there are none, empty array is returned.
     *
     * @return array Options loaded from the configuration.
     */
    public static function loadConfig()
    {
        /*Always get clean copy to avoid dirty reads*/
        return \BeanFactory::getBean('Administration')->getConfigForModule(static::MODULE, static::PLATFORM, true);
    }

    /**
     * Is being upgraded
     *
     * @return bool
     */
    public function isBeingUpgraded()
    {
        $upgradeHistoryBean = \BeanFactory::newBean('UpgradeHistory');
        $query = new \SugarQuery();
        $query->select(['*']);
        $query->from($upgradeHistoryBean);
        $query->where()
            ->equals('id_name', 'hint-package');
        $response = $query->execute();
        return count($response) > 1;
    }

    /**
     * Get hint host geo info
     *
     * @return string
     */
    public function getHintHostGeoInfo()
    {
        // Obtain the Hint backend hosted region.
        $client = new Client(null);
        $geo = $client->getHintBackendHostGeo();

        // Once we have determined the region for the backend services.
        ConfigurationManager::updateHintConfigEntry(HintConstants::HINT_CONFIG_GEO, $geo);

        return $geo;
    }

    /**
     * Get current user analytics id
     *
     * @return string
     */
    public function getCurrentUserAnalyticsId()
    {
        return sha1($this->obfuscationSalt . $GLOBALS['current_user']->id);
    }

    /**
     * Get ISPs
     *
     * @return array
     */
    public function getISPs()
    {
        $uploadFile = new \UploadFile();
        $uploadFile->temp_file_location = 'src/Hint/Stage2/isp-list.js';
        $content = $uploadFile->get_file_contents();
        return $content;
    }

    /**
     * Get VAPID Public Key
     *
     * @return string
     */
    public static function getVAPIDPublicKey()
    {
        return 'BCoRPLoIDJTOwAJNbAtdhuScQfJMCveFRv-f-9G6kXtW5BXNEc2DJJmIcCCQq70MnGZFiUCqjYH39Ub-XE4ayMY';
    }

    /**
     * CSP Register hint
     */
    public function cspRegisterHint()
    {
        $packageType = $this->buildConfig['package_type'];
        include 'ContentSecurityPolicyWrapper.php';
        switch ($packageType) {
            case 'dev':
                ContentSecurityPolicyWrapper::addToDefaultCsp('*.sugar.build');
                break;
            case 'local':
                ContentSecurityPolicyWrapper::addToDefaultCsp('*');
                break;
            default:
                break;
        }
    }

    /*
     * Read option from configurations
     *
     * Returns the specified service URL based on an aws region.
     *
     * @param mixed $buildConfig
     * @param string $geo
     * @param string $option
     * @return string URL from provided geo build configuration.
     * @throws \Exception
     */
    // TODO: select US geo by default, since we are not specifying which GEO we want when we
    // build the MLP (meaning, we would specify the GEO we want somewhere as admin?)
    private static function readOptionFromConfigurations($buildConfig, $geo, $option)
    {
        if (!is_null($buildConfig) && array_key_exists($geo, $buildConfig)) {
            $services = $buildConfig[$geo];
            if (array_key_exists($option, $services)) {
                return $services[$option];
            }
            $missingServiceMessage = sprintf("Provided service option %s missing", $option);
            throw new \Exception($missingServiceMessage . vsprintf(" from config %s", $buildConfig));
        }
        throw new \Exception(vsprintf('Missing geo key in provided buildConfig: %s', $buildConfig));
    }

    /**
     * Has hint license
     *
     * @param string $licenses
     * @return bool
     */
    private static function hasHintLicense($licenses): bool
    {
        return strpos($licenses, '"HINT"') !== false;
    }

    /*
     * Check sugar hint versions
     *
     * Compares current sugar and hint versions with desired version numbers.
     *
     * @param string $desiredSugarVersion: sugar version provided in 'X.Y.Z' format
     * @param string $desiredHintVersion: hint version provided in 'X.Y.Z' format
     * @return boolean
     */
    public function checkSugarHintVersions($desiredSugarVersion, $desiredHintVersion): bool
    {
        $isValidSugarVersion = version_compare($GLOBALS['sugar_version'], $desiredSugarVersion, '>=');
        $isValidHintVersion = (!is_null($this->buildConfig) &&
            version_compare($this->buildConfig['hint_version'], $desiredHintVersion, '>='));
        return $isValidSugarVersion && $isValidHintVersion;
    }

    /**
     * Revive Accountsets and Targets
     *
     * If user is becoming licensed again (and they were previously licensed), revive their
     * old accountsets & targets.
     *
     * @param string $userId
     */
    public function reviveAccountsetsAndTargets($userId)
    {
        $eventQueue = Queue::getInstance();

        $userTargetRows = $this->retrieveUserData('HintNotificationTargets', $userId);
        $targetData = [];
        foreach ($userTargetRows as $row) {
            $row = array_change_key_case($row, CASE_LOWER);
            $targetData[] = array_merge($row, [
                'credentials' => json_decode($row['credentials'], true),
            ]);
        }

        $userTargetIds = [];
        $userTargetIds[$userId] = [];
        foreach ($targetData as $eventData) {
            $userTargetIds[$userId][] = $eventData['id'];
            $eventData = array_merge(['targetId' => $eventData['id']], $eventData);
            $context = ['user_id' => $eventData['assigned_user_id']];
            $eventQueue->recordEvent(new TargetAddEvent($eventData), $context);
        }

        $userAccountsetsRows = $this->retrieveUserData('HintAccountsets', $userId);
        $accountsetData = [];
        foreach ($userAccountsetsRows as $row) {
            $accountsetData[] = array_change_key_case($row, CASE_LOWER);
        }

        foreach ($accountsetData as $eventData) {
            $eventData = array_merge(['accountsetId' => $eventData['id']], $eventData);
            $context = ['user_id' => $eventData['assigned_user_id']];
            $eventData['targetIds'] = $userTargetIds[$userId];
            $eventQueue->recordEvent(new AccountsetAddEvent($eventData), $context);
        }

        // Reset the user's `previously_licensed` column to false. This is done to prevent
        // an issue that can occur from multiple instances of licensing/unlicensing a user, where
        // the deleteTargets and deleteAccountsets do not send due. Also -- since this is ONLY used
        // to "revive" the old sugar accountset and target ids, there's no penalty for setting this as
        // false. If the user is to become unlicensed again, then this column simply becomes marked as
        // true again, and the next relicensing will revive the old notification objects and set this
        // column back to false.
        $userBean = \BeanFactory::retrieveBean('Users', $userId);
        $userBean->previously_licensed = false;
        $userBean->save();
    }

    /**
     * Retrieve user data
     *
     * Both accountsets and targets have a 'assigned_user_id' column, so bean retrieval
     * is nearly identical.
     *
     * @param string $beanName
     * @param string $userId
     * @return array
     */
    public function retrieveUserData($beanName, $userId)
    {
        $data = \BeanFactory::retrieveBean($beanName);
        $query = new \SugarQuery();
        $query->select(['*']);
        $query
            ->from($data)
            ->where()
            ->equals('assigned_user_id', $userId);
        return $query->execute();
    }
}
