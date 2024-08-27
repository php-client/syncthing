<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Cause Syncthing to exit and not restart.
 *
 * @see https://docs.syncthing.net/rest/system-shutdown-post.html  Documentation
 */
final class SystemShutdownPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/shutdown';
    }
}
