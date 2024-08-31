<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the list of recent errors.
 *
 * @see https://docs.syncthing.net/rest/system-error-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetRecentErrorsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/error';
    }
}
