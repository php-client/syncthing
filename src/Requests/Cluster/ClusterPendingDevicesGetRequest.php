<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Lists remote devices which have tried to connect, but are not yet configured in our instance.
 *
 * @see https://docs.syncthing.net/rest/cluster-pending-devices-get.html  Documentation
 */
final class ClusterPendingDevicesGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/devices';
    }
}
