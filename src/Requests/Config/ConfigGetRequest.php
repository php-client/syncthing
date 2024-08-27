<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the entire config.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config  Documentation
 */
final class ConfigGetRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config';
    }
}
