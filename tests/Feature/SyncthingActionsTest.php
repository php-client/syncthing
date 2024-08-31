<?php
/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Dotenv\Dotenv;
use PhpClient\Syncthing\Syncthing;

Dotenv::createImmutable(paths: __DIR__ . "/../..")->load();
$baseUrl = $_ENV['SYNCTHING_BASE_URL'] ?? '';
$token = $_ENV['SYNCTHING_TOKEN'] ?? '';
$deviceId = $_ENV['SYNCTHING_TEST_DEVICE_ID'] ?? '';

$syncthing = new Syncthing(token: $token, baseUrl: $baseUrl);

test('Syncthing action "Get config of device"', closure: function () use ($syncthing, $deviceId) {
    $response = $syncthing->api->config()->getDevice(
        device: $deviceId,
    );
    expect(value: $response);
});

test('Syncthing action "Edit config of device"', function () use ($syncthing, $deviceId) {
    $response = $syncthing->api->config()->updateDevicePart(
        device: $deviceId,
        data: ['untrusted' => false],
    );
    expect(value: $response->json())->toBeTrue();
});

test(description: 'Syncthing action "Is restart required"', closure: function () use ($syncthing) {
    $result = $syncthing->api->config()->checkIfRestartIsRequired()->json('requiresRestart');
    expect(value: $result)->toBeBool();
});
