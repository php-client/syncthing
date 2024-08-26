<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/cluster-pending-folders-delete.html
 */
final class ClusterPendingFoldersDeleteRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $folderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/folder';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folderId,
        ];
    }
}
