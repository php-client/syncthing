<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Stats;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns general statistics about devices.
 *
 * @see https://docs.syncthing.net/rest/stats-device-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class StatsDeviceGetRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/stats/device';
    }
}
