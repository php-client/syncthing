<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use PhpClient\Syncthing\Dto\Device;
use PhpClient\Syncthing\Syncthing;

Dotenv::createImmutable(paths: __DIR__ . "/../..")->load();
$baseUrl = $_ENV['SYNCTHING_BASE_URL'] ?? '';
$token = $_ENV['SYNCTHING_TOKEN'] ?? '';
$deviceId = $_ENV['SYNCTHING_TEST_DEVICE_ID'] ?? '';

$syncthing = new Syncthing(baseUrl: $baseUrl, token: $token);

test('Syncthing action "Get config of device"', closure: function () use ($syncthing, $deviceId) {
    $result = $syncthing->actions->getConfigOfDevice(deviceId: $deviceId);
    expect(value: $result)->toBeInstanceOf(class: Device::class);
});

test('Syncthing action "Edit config of device"', function () use ($syncthing, $deviceId) {
    $result = $syncthing->actions->editConfigOfDevice(deviceId: $deviceId, untrusted: false);
    expect(value: $result->isTrue())->toBeTrue();
});

test('Syncthing action "Is restart required"', function () use ($syncthing) {
    $result = $syncthing->actions->isRestartRequired();
    expect(value: $result)->toBeBool();
});
