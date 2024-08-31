<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Database;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the list of files which are needed by that remote device in order for it to become in sync
 * with the shared folder.
 *
 * @see https://docs.syncthing.net/rest/db-remoteneed-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetRemoteNeededFilesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
        private readonly string $device,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/remoteneed';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
            'device' => $this->device,
        ];
    }
}
