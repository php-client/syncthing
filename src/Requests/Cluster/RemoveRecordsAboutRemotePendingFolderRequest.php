<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Cluster;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Remove records about a pending folder announced from a remote device.
 *
 * @see https://docs.syncthing.net/rest/cluster-pending-folders-delete.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class RemoveRecordsAboutRemotePendingFolderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/cluster/pending/folder';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
