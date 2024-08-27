<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Stats;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/stats-device-get.html  Documentation
 */
final class StatsDeviceGetRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/stats/device';
    }
}
