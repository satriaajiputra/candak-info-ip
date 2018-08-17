# candak-info-ip
CandakInfoIP is a library for grab IP Address information in any version v4 or v6

### Source Data
CandakInfoIP use the data from http://www.geoplugin.net

# Installation
This library can install using composer with this command
```
composer require satmaxt/candak-info-ip
```

# Quick Usage
This library is very easy and quick usage for your application project. As usual when we using composer, we must include our ``autoload.php`` file to your php file project.
```php
<?php

require_once "vendor/autoload.php";
```

# Grab the IP Address
Use CandakInfoIP using PHP script like this
```php
<?php

use CandakInfoIP\CandakIP;

$ipInfo = CandakIP::grab('ip-address-here')->get();
```

The example results like this if the results converted to array
```php
Array
(
    [server] => Array
        (
            [request] => 180.245.188.155
            [status] => 200
            [delay] => 2ms
        )

    [location] => Array
        (
            [city] => Pasirkaliki
            [region] => 
            [regionCode] => 
            [regionName] => 
            [areaCode] => 
            [dmaCode] => 
            [countryCode] => ID
            [europeArea] => 0
            [euVATrate] => 
            [continentCode] => AS
            [continentName] => Asia
            [latitude] => -6.25
            [longitude] => 107.3333
            [locationAccuracyRadius] => 100
            [timezone] => Asia/Jakarta
        )

    [currency] => Array
        (
            [currencyCode] => IDR
            [currencySymbol] => Rp
            [currencySymbol_UTF8] => Rp
            [currencyConverter] => 14586.49
        )

)
```

# Available Methods
CandakInfoIP has developed with some method that can use for your application project

| Methods              | Description           |
|----------------------|-------------|
| ``$ip = CandakIP::grab('ip-address-here')`` | Set the IP Address and validate that IP Address is valid or not, If the IP Address not set, the system will get your client IP Address |
| ``$ip->get()`` | Get the IP Address data as object |
| ``$ip->get(true)`` | Get the IP Address data as array |
| ``CandakIP::getClientIPAddress()`` | Get the client IP Address |
| ``CandakIP::getClientUserAgent()`` | Get the client User-Agent |
