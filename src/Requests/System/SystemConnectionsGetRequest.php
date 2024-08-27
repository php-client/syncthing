<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the list of configured devices and some metadata associated with them.
 *
 * @see https://docs.syncthing.net/rest/system-connections-get.html  Documentation
 */
final class SystemConnectionsGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/connections';
    }
}
