<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDevices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices
 */
final class ConfigDevicesGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/devices';
    }
}
