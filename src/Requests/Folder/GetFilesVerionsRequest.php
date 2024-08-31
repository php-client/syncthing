<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Folder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the list of archived files that could be recovered.
 *
 * @see https://docs.syncthing.net/rest/folder-versions-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetFilesVerionsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/folder/versions';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
