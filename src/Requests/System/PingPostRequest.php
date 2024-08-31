<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns a {"ping": "pong"} object.
 *
 * @see https://docs.syncthing.net/rest/system-ping-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class PingPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/ping';
    }
}
