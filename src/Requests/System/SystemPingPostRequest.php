<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/system-ping-post.html  Documentation
 */
final class SystemPingPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/ping';
    }
}
