<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Remove records about a pending remote device which tried to connect.
 *
 * @see https://docs.syncthing.net/rest/cluster-pending-devices-delete.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class RemoveRecordsAboutRemotePendingDeviceRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $device,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/devices';
    }

    protected function defaultQuery(): array
    {
        return [
            'device' => $this->device,
        ];
    }
}
