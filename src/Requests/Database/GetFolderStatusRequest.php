<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Database;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns information about the current status of a folder.
 *
 * @see https://docs.syncthing.net/rest/db-status-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetFolderStatusRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/status';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
