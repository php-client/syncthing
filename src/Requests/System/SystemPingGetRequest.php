<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns a {"ping": "pong"} object.
 *
 * @see https://docs.syncthing.net/rest/system-ping-get.html  Documentation
 */
final class SystemPingGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/ping';
    }
}
