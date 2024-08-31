<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Lists remote devices which have tried to connect, but are not yet configured in our instance.
 *
 * @see https://docs.syncthing.net/rest/cluster-pending-devices-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ListRemotePendingDevicesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/devices';
    }
}
