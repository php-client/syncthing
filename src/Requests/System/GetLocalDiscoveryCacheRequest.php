<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the contents of the local discovery cache.
 *
 * @see https://docs.syncthing.net/rest/system-discovery-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetLocalDiscoveryCacheRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/discovery';
    }
}
