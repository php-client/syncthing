<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the set of debug facilities and which of them are currently enabled.
 *
 * @see https://docs.syncthing.net/rest/system-debug-get.html  Documentation
 */
final class SystemDebugGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/debug';
    }
}
