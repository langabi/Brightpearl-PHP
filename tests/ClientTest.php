<?php namespace Brightpearl\Tests;

use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Adapter\TransactionInterface;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

use Brightpearl\Client;

/**
 * @covers Brightpearl\Client
 */
class ClientTest extends TestCase
{
    /**
     * Create Client and use in reflection
     */
    public function setUp()
    {
        $this->testClass = new Client([
                'dev_reference' => 'sahara',
                'dev_secret'    => 'fcVGPrRapgRyT83CJb9kg8wBpgIV7tdKikdKA/7SmvY=',
                'app_reference' => 'parcelforce',
            ]);

        parent::setup();
    }

    /**
     * Configure a mock response on the client
     *
     * @param  string  $response default is empty JSON
     * @param  integer $code     default is 200 (OK)
     * @param  [type]  $request  use to access request
     * @return void
     */
    public function mockResponse($response = '{}', $code = 200, &$request = null)
    {
        $mockAdapter = new MockAdapter(function (TransactionInterface $trans) use ($response, $code, &$request) {
            // Access to the request
            $request = $trans->getRequest();
            // Return a response
            return new Response($code, [], Stream::factory($response));
        });

        // Place new adapter on client class
        $this->testClass->setClientAdapter($mockAdapter);
    }

    public function testApiDomain()
    {
        // generate basic mock response
        $this->mockResponse();

        // client needs these additional settings to do a basic call
        $this->testClass->settings([
                'account_code'  => 'topfurniture',
                'account_token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
            ]);

        // assert that we are missing api domain
        $this->assertFalse(isset($this->getProperty("settings")['api_domain']));

        // force a call without api domain to test defaulting to master datacenter
        $this->testClass->getWebhook();

        // assert we are pointing to master datacenter api domain within client and description
        $this->assertClassHasStaticAttribute('description', 'Brightpearl\Client');
        $this->assertInstanceOf('Brightpearl\Description', $this->getProperty("description"));
        $this->assertEquals('ws-eu1.brightpearl.com', $this->getProperty("settings")['api_domain']);
        $this->assertEquals('ws-eu1.brightpearl.com', $this->getProperty("description")->getBaseUrl()->getHost());

        // change api domain via settings method
        $this->testClass->settings([ 'api_domain' => 'ws-usw.brightpearl.com',]);

        // assert change successful
        $this->assertEquals('ws-usw.brightpearl.com', $this->getProperty("settings")['api_domain']);
        $this->assertEquals('ws-usw.brightpearl.com', $this->getProperty("description")->getBaseUrl()->getHost());

        // change api domain via setApiDomain method
        $this->testClass->setApiDomain('ws-eu2.brightpearl.com');

        // assert change successful
        $this->assertEquals('ws-eu2.brightpearl.com', $this->getProperty("settings")['api_domain']);
        $this->assertEquals('ws-eu2.brightpearl.com', $this->getProperty("description")->getBaseUrl()->getHost());
    }

    public function testPostRequest()
    {
        $req = null;

        $this->testClass->settings([
                'account_code'  => 'topfurniture',
                'account_token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                'api_domain'    => 'ws-use.brightpearl.com',
            ]);

        $this->mockResponse('{"response": 123}', 200, $req);

        $payload = array(
                "addressLine1" => "100 Something St",
                "postalCode" => "33000",
                "countryIsoCode" => "USA",
            );

        $accountToken = base64_encode(hash_hmac(
                "sha256",
                'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                'fcVGPrRapgRyT83CJb9kg8wBpgIV7tdKikdKA/7SmvY=',
                TRUE));

        $response = $this->testClass->postContactAddress($payload);

        $this->assertInternalType('int', $response);
        $this->assertEquals(123, $response);
        $this->assertEquals(json_encode($payload), $req->getBody()->__toString());
        $this->assertEquals('sahara', $req->getHeaders()['brightpearl-dev-ref'][0]);
        $this->assertEquals('parcelforce', $req->getHeaders()['brightpearl-app-ref'][0]);
        $this->assertEquals($accountToken, $req->getHeaders()['brightpearl-account-token'][0]);
    }

    public function testInstallCallback()
    {
        $client = $this->testClass->settings([
                'dev_secret'    => 'fcVGPrRapgRyT83CJb9kg8wBpgIV7tdKikdKA/7SmvY=',
            ]);

        $result1 = $client->installCallback([
                'app' => 'parcelforce',
                'token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                'timestamp' => 112287235486,
                'accountCode' => 'topfurniture',
                'signature' => '927082e6151ecfd57ead5dddb9ef571e08e4969a00d2639a0222d2211e67180a'
            ]);

        $result2 = $client->installCallback([
                    'token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                    'timestamp' => 112287235486,
                    'accountCode' => 'topfurniture',
                ],
                '927082e6151ecfd57ead5dddb9ef571e08e4969a00d2639a0222d2211e67180a'
            );

        $this->assertInternalType('array', $result1);
        $this->assertEquals($result1, $result2);
        $this->assertCount(3, $result1);
        $this->assertNotContains('parcelforce', $result1);
        $this->assertEquals('topfurniture', $result1['account_code']);
        $this->assertEquals('c72a9373-86f5-4138-a41f-c26cd9abfe4e', $result1['account_token']);
    }
}
