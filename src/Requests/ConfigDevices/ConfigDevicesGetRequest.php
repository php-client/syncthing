<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDevices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns all devices as an array.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigDevicesGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/devices';
    }
}
