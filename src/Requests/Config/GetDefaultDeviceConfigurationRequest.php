<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns a template device configuration object with all default values.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetDefaultDeviceConfigurationRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/defaults/device';
    }
}
