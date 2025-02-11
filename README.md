# Php client for Syncthing API.

This is a PHP client for the [Syncthing API](https://docs.syncthing.net).

## Installation
Install the package via composer:

```bash
composer require php-client/syncthing
```

## Usage

Simple example:
```php
use PhpClient\Syncthing\Syncthing;

$syncthing = new Syncthing(
    baseUrl: 'http://127.0.0.1:8384',
    token: 'YOUR_API_TOKEN',
);

$response = $syncthing->api->config()->getAllDevices();

foreach ($response->json() as $device) {
    echo $device['name'];
}
```

TODO: Add more usage instructions for other endpoints...

## License

This package is released under the [MIT License](LICENSE.md).
