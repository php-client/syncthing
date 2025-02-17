<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Database;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns lists of files which are needed by this device in order for it to become in sync.
 *
 * @see https://docs.syncthing.net/rest/db-need-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetNeededFilesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/need';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
