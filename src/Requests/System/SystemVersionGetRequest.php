<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/system-version-get.html  Documentation
 */
final class SystemVersionGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/version';
    }
}
