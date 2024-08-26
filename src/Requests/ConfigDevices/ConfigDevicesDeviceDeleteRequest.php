<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDevices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id
 */
final class ConfigDevicesDeviceDeleteRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $deviceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/devices/$this->deviceId";
    }
}
