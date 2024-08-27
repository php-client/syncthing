<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Post with empty body to immediately restart Syncthing.
 *
 * @see https://docs.syncthing.net/rest/system-restart-post.html  Documentation
 */
final class SystemRestartPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/restart';
    }
}
