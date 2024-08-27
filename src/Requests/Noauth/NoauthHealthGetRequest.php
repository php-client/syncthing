<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Noauth;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/noauth-health-get.html#get-rest-noauth-health  Documentation
 */
final class NoauthHealthGetRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/noauth/health';
    }
}
