<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns information about current system status and resource usage.
 *
 * @see https://docs.syncthing.net/rest/system-status-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class SystemStatusGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/status';
    }
}
