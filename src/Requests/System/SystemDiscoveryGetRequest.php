<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the contents of the local discovery cache.
 *
 * @see https://docs.syncthing.net/rest/system-discovery-get.html  Documentation
 */
final class SystemDiscoveryGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/discovery';
    }
}
