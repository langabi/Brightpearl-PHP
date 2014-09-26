<?php namespace Brightpearl;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use GuzzleHttp\Client as BaseClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Client
{
    /**
     * Brightpearl API Version this client currently uses.
     *
     * @var string
     */
    const API_VERSION = '2.0.0';

    /**
     * Guzzle service description
     *
     * @var array
     */
    private static $description;

    /**
     * Guzzle base client
     *
     * @var \GuzzleHttp\Client
     */
    protected $baseClient;

    /**
     * Adapter for Guzzle base client
     *
     * @var \GuzzleHttp\Adapter\AdapterInterface
     */
    protected $baseClientAdapter;

    /**
     * Api client services
     *
     * @var \GuzzleHttp\Command\Guzzle\GuzzleClient
     */
    protected $serviceClient;

    /**
     * Staff auth credentials to acquire staff token (user email and password)
     *
     * @var array
     */
    protected $installCredentials;

    /**
     * Brightpearl client config settings
     *
     * @var array
     */
    protected $settings;

    /**
     * Request header items
     *
     * @var array
     */
    protected $globalParams = [
            "apiVersion" => [
                "type" => "string",
                "location" => "uri",
                "required" => false,
            ],
            "account_code" => [
                "type" => "string",
                "location" => "uri",
                "required" => false,
            ],
            "dev_reference" => [
                "type" => "string",
                "location" => "header",
                "required" => false,
                "sentAs" => "brightpearl-dev-ref",
            ],
            "app_reference" => [
                "type" => "string",
                "location" => "header",
                "required" => false,
                "sentAs" => "brightpearl-app-ref",
            ],
            "account_token" => [
                "type" => "string",
                "location" => "header",
                "required" => false,
                "sentAs" => "brightpearl-account-token",
            ],
            "staff_token" => [
                "type" => "string",
                "location" => "header",
                "required" => false,
                "sentAs" => "brightpearl-staff-token",
            ],
        ];

    /**
     * Create a new GuzzleClient Service, ability to use the client
     * without setting properties on instantiation.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $settings = array())
    {
        $this->settings = $settings;
    }

    /**
     * Merge additional settings with existing and save. Overrides
     * existing settings as well.
     *
     * @param  array  $settings
     * @return static
     */
    public function settings(array $settings)
    {
        $this->settings = array_merge($this->settings, $settings);

        if ($this->serviceClient) $this->buildClient();

        return $this;
    }

    /**
     * Build new service client from descriptions.
     *
     * @return void
     */
    private function buildClient()
    {
        $client = $this->getBaseClient();

        // default to master datacenter, used primarily
        // for "developer-tools" api requests.
        if (!isset($this->settings['data_center']))
            $this->settings['data_center'] = 'eu1';

        if (!static::$description)
            static::$description = new Description($this->loadConfig());

        // sync data center code across client and description
        else $this->setDataCenter($this->settings['data_center']);

        $this->serviceClient = new GuzzleClient(
                $client,
                static::$description,
                ['emitter' => $this->baseClient->getEmitter()]
            );
    }

    /**
     * Retrieve Guzzle base client.
     *
     * @return \GuzzleHttp\Client
     */
    private function getBaseClient()
    {
        return $this->baseClient ?: $this->baseClient = $this->loadBaseClient();
    }

    /**
     * Set adapter and create Guzzle base client.
     *
     * @return \GuzzleHttp\Client
     */
    private function loadBaseClient(array $settings = [])
    {
        if ($this->baseClientAdapter)
            $settings['adapter'] = $this->baseClientAdapter;

        return $this->baseClient = new BaseClient($settings);
    }

    /**
     * Load configuration file and parse resources.
     *
     * @return array
     */
    private function loadConfig()
    {
        $description = $this->loadResource('service-config');

        // initial description building, use api info and build base url
        $description = $description + [
                'baseUrl' => 'https://ws-'.$this->settings['data_center'].'.brightpearl.com',
                'operations' => [],
                'models' => []
            ];

        // process each of the service description resources defined
        foreach ($description['services'] as $serviceName) {

            $service = $this->loadResource($serviceName);

            $description = $this->loadServiceDescription($service, $description);

        }

        // dead weight now, clean it up
        unset($description['services']);

        return $description;
    }

    /**
     * Load service description from resource, add global
     * parameters to operations. Operations and models
     * added to full description.
     *
     * @param  array $service
     * @param  array $description
     * @return array
     */
    private function loadServiceDescription(array $service, array $description)
    {
        foreach ($service as $section => $set) {

            if ($section == 'operations') {

                // add global parameters to the operation parameters
                foreach ($set as &$op)
                    $op['parameters'] = isset($op['parameters'])
                                    ? $op['parameters'] + $this->globalParams
                                    : $this->globalParams;
            }

            $description[$section] = $description[$section] + $set;
        }

        return $description;
    }

    /**
     * Load resource configuration file and return array.
     *
     * @param  string  $name
     * @return array
     */
    private function loadResource($name)
    {
        return require __DIR__.'/resources/'.$name.'.php';
    }

    /**
     * Set data center.
     *
     * @param  string $dataCenter
     * @return void
     */
    private function setDataCenter($dataCenter)
    {
        if (static::$description) static::$description
            ->setBaseUrl('https://ws-'.$dataCenter.'.brightpearl.com');
    }

    /**
     * Public application install callback handler
     *
     * @param  array  $query
     * @param  string $signature
     * @return array
     */
    public function installCallback(array $query, $signature = null)
    {
        extract($query);

        $this->validateRequest(compact('accountCode', 'timestamp', 'token'), $signature);

        $timestamp = $this->callbackDatetime($timestamp);

        return ['account_code' => $accountCode, 'account_token' => $token] + compact('timestamp');
    }

    /**
     * Public application regular callback handler
     *
     * @param  array  $query
     * @param  string $signature
     * @return array
     */
    public function simpleCallback(array $query, $signature = null)
    {
        extract($query);

        $this->validateRequest(compact('accountCode', 'timestamp'), $signature);

        $timestamp = $this->callbackDatetime($timestamp);

        return ['account_code' => $accountCode, 'timestamp' => $timestamp];
    }

    /**
     * Brightpearl signature validator
     *
     * @param  array  $query
     * @param  string $signature
     * @return void
     */
    private function validateRequest(array $query, $signature)
    {
        $string = $this->settings['dev_secret'];

        ksort($query);

        foreach ($query as $key => $val)
            $string = $string.$key.'='.$val;

        if ($signature !== hash('sha256', $string))
            throw new Exception\UnauthorizedException('Error signature "'.$signature.'"does not match!');
    }

    /**
     * Process timestamps for callbacks, for some
     * reason they are returned in milliseconds so
     * we are reducing times to seconds first.
     *
     * @param  string|int $timestamp
     * @return \DateTime
     */
    private function callbackDatetime($timestamp)
    {
        $epoch = floor(((int)$timestamp)/1000);

        return $this->getDatetimeTimestamp($epoch);
    }

    /**
     * Process timestamps to DateTime or Carbon if
     * available. (Carbon extends DateTime php class)
     *
     * @param  string|int $timestamp
     * @return \DateTime
     */
    private function getDatetimeTimestamp($timestamp)
    {
        if (class_exists('Carbon\Carbon'))
            return new \Carbon\Carbon("@$timestamp");

        return new \DateTime("@$timestamp");
    }

    /**
     * Set custom guzzle adapter (Mock and others)
     *
     * @param AdapterInterface $adapter
     * @return static
     */
    public function setClientAdapter(\GuzzleHttp\Adapter\AdapterInterface $adapter)
    {
        $this->baseClientAdapter = $adapter;

        return $this;
    }

    /**
     * Set custom guzzle subscriber (ie. History, mock, etc)
     *
     * @param SubscriberInterface $subscriber
     * @return static
     */
    public function setClientSubscriber(\GuzzleHttp\Event\SubscriberInterface $subscriber)
    {
        if (!$this->serviceClient) $this->baseClient->getEmitter()->attach($subscriber);

        else $this->serviceClient->getEmitter()->attach($subscriber);

        return $this;
    }

    /**
     * Sign account token with Developer Secret.
     * (Only used for public system applications,
     * ie Brightpearl app store apps.)
     *
     * @param  array $settings
     * @return void
     */
    private function signAccountToken(array &$settings)
    {
        if (isset($settings['dev_secret']) && isset($settings['account_token']))

        $settings['account_token'] = $this->signToken($settings['account_token'], $settings['dev_secret']);
    }

    /**
     * Sign account token with Developer Secret.
     * (Only used for public system applications,
     * ie Brightpearl app store apps.)
     *
     * @param  array $settings
     * @return void
     */
    private function signDevToken(array &$settings)
    {
        if (isset($settings['dev_secret']) && isset($settings['dev_token']))

        $settings['account_token'] = $this->signToken($settings['dev_token'], $settings['dev_secret']);
    }

    /**
     * Sign a token with Developer Secret.
     *
     * @param  string $token
     * @param  string $secret
     * @return string
     */
    private function signToken($token, $secret)
    {
        $string = hash_hmac("sha256", $token, $secret, TRUE);

        return base64_encode($string);
    }

    /**
     * Handle dynamic method calls into the method.
     * Build client on first api call and compile
     * settings and parameters.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        // In cases of Facade using Client->__call() make
        // sure methods are handled by Client if they exist
        if (method_exists($this, $method))
            call_user_func_array([$this, $method], $parameters);

        // build the client on the first call
        if (!$this->serviceClient) $this->buildClient();

        // gather parameters to pass to service definitions
        $settings = ['apiVersion' => self::API_VERSION] +
                    $this->settings;

        // Sign tokens if they are signable
        // Signed account tokens used for public system Apps
        // Signed dev tokens used for developer-tools api
        $this->signAccountToken($settings);
        $this->signDevToken($settings);

        // merge client settings/parameters and method parameters
        $parameters[0] = isset($parameters[0])
                             ? $parameters[0] + $settings
                             : $settings;

        // pass off to Guzzle-services client
        $response = call_user_func_array([$this->serviceClient, $method], $parameters);

        return isset($response['response']) ? $response['response'] : $response;
    }
}
