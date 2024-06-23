<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetConfigDevicesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/devices';
    }
}
