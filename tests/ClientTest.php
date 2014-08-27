<?php

namespace GuzzleHttp\Tests;

use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Adapter\TransactionInterface;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

use Brightpearl\Client;

/**
 * @covers Brightpearl\Client
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testPostRequest()
    {
        $client = new Client([
                'dev_reference' => 'sahara',
                'dev_secret'    => 'fcVGPrRapgRyT83CJb9kg8wBpgIV7tdKikdKA/7SmvY=',
                'app_reference' => 'parcelforce',
                'account_code'  => 'topfurniture',
                'account_token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                'data_center'   => 'eu1',
            ]);
        $req = null;
        $json = '{"response": 123}';

        $mockAdapter = new MockAdapter(function (TransactionInterface $trans) use (&$req, $json) {
            // You have access to the request
            $req = $trans->getRequest();
               // Return a response
            return new Response(200, [], Stream::factory($json));
        });

        $client->setClientAdapter($mockAdapter);

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

        $response = $client->postContactAddress($payload);

        $this->assertInternalType('int', $response);
        $this->assertEquals(123, $response);
        $this->assertEquals(json_encode($payload), $req->getBody()->__toString());
        $this->assertEquals('sahara', $req->getHeaders()['brightpearl-dev-ref'][0]);
        $this->assertEquals('parcelforce', $req->getHeaders()['brightpearl-app-ref'][0]);
        $this->assertEquals($accountToken, $req->getHeaders()['brightpearl-account-token'][0]);
    }

    public function testInstallCallback()
    {
        $client = new Client([
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
