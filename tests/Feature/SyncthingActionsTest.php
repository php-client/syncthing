<?php
/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Dotenv\Dotenv;
use PhpClient\Syncthing\Dto\Device;
use PhpClient\Syncthing\SyncthingClient;

Dotenv::createImmutable(paths: __DIR__ . "/../..")->load();
$baseUrl = $_ENV['SYNCTHING_BASE_URL'] ?? '';
$token = $_ENV['SYNCTHING_TOKEN'] ?? '';
$deviceId = $_ENV['SYNCTHING_TEST_DEVICE_ID'] ?? '';

$syncthing = new SyncthingClient(token: $token, baseUrl: $baseUrl);

test('Syncthing action "Get config of device"', closure: function () use ($syncthing, $deviceId) {
    $result = $syncthing->configDevicesResource()->deviceGet(deviceId: $deviceId)->dto();
    expect(value: $result)->toBeInstanceOf(class: Device::class);
});

test('Syncthing action "Edit config of device"', function () use ($syncthing, $deviceId) {
    $result = $syncthing->configDevicesResource()->devicePatch(deviceId: $deviceId, untrusted: false)->dto();
    expect(value: $result->isTrue())->toBeTrue();
});

test(description: 'Syncthing action "Is restart required"', closure: function () use ($syncthing) {
    $result = $syncthing->configResource()->restartRequiredGet()->json('requiresRestart');
    expect(value: $result)->toBeBool();
});
