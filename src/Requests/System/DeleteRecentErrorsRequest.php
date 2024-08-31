<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Remove all recent errors.
 *
 * @see https://docs.syncthing.net/rest/system-error-clear-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DeleteRecentErrorsRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/error/clear';
    }
}
