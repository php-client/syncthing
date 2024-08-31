<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns configuration options.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetConfigOptionsRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/options';
    }
}
