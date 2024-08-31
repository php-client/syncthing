<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Lists folders which remote devices have offered to us, but are not yet shared from our instance to them.
 *
 * @see https://docs.syncthing.net/rest/cluster-pending-folders-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ListRemotePendingFoldersRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $device,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/folders';
    }

    protected function defaultQuery(): array
    {
        return [
            'device' => $this->device,
        ];
    }
}
