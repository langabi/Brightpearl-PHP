Brightpearl API wrapper using GuzzleHttp (4.1)
==============================================
[![Build Status](https://travis-ci.org/TheGenieLab/Brightpearl-PHP.svg)](https://travis-ci.org/TheGenieLab/Brightpearl-PHP)

Installation
------------

### Composer

```json
    "require": {
        "thegenielab/brightpearl": "*@dev"
    }
```

### Laravel (optional)

Service Provider (config/app.php)
```php
'Brightpearl\Laravel\ServiceProvider'
```

Facade (config/app.php)
```php
'Brightpearl'     => 'Brightpearl\Laravel\Facade'
```

Services (config/services.php) - global package settings (not required - can be overrided by you later, use this for defaults)
```php
    'brightpearl' => array(
        'dev_reference' => 'sahara',
        'dev_secret'    => 'fcVGPrRapgRyT83CJb9kg8wBpgIV7tdKikdKA/7SmvY=',
        'app_reference' => 'parcelforce',
        'account_code'  => '',
        'account_token' => '',
        'data_center'   => '',
        'staff_token'   => '',
    ),
```

Usage
-----

### Basic (any php app)

```php
use \Brightpearl\Client;

$client = new Client([
                'dev_reference' => 'sahara',
                'dev_secret'    => 'fcVGPrRapgRyT83CJb9kg8wBpgIV7tdKikdKA/7SmvY=',
                'app_reference' => 'parcelforce',
                'account_code'  => 'topfurniture',
                'account_token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                'data_center'   => 'eu1',
            ]);

$response = $client->getOrder(['id' => '1']);
```

### Laravel

```php
$client = Brightpearl::settings([
                'account_code'  => 'topfurniture',
                'account_token' => 'c72a9373-86f5-4138-a41f-c26cd9abfe4e',
                'data_center'   => 'eu1',
            ]);

$response = $client->getOrder(['id' => '1']);
```

Services
--------

### Contact

Retrieve contact info
```php
$client->getContact(['id' => '1']);
```

Create new contact (bare minimum, requires contact address)

```php
$address = array(
        "addressLine1" => "100 Something St",
        "postalCode" => "33000",
        "countryIsoCode" => "USA",
    );

$addressId = $client->postContactAddress($address);

$contact = array(
        "firstName" => "Jane",
        "lastName" => "Smith",
        "postAddressIds" => (
            "DEF" => $addressId,
            "BIL" => $addressId,
            "DEL" => $addressId,
        ),
    );

$contactId = $client->postContact($contact);
```

Contributing
------------

Currently API coverage only represents a portion of the Brightpearl API. If you want to contribute send bug fixes, additional resource services and features in a pull request at the develop branch. Thanks!
