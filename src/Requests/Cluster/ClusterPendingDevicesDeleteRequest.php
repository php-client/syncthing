<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/cluster-pending-devices-delete.html
 */
final class ClusterPendingDevicesDeleteRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $deviceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/devices';
    }

    protected function defaultQuery(): array
    {
        return [
            'device' => $this->deviceId,
        ];
    }
}
