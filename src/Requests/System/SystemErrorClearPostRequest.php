<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/system-error-clear-post.html  Documentation
 */
final class SystemErrorClearPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/error/clear';
    }
}
