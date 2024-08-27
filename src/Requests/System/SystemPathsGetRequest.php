<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the path locations used internally for storing configuration, database, and others.
 *
 * @see https://docs.syncthing.net/rest/system-paths-get.html  Documentation
 */
final class SystemPathsGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/paths';
    }
}
