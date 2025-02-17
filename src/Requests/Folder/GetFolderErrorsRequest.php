<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Folder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the list of errors encountered during scanning or pulling.
 *
 * @see https://docs.syncthing.net/rest/folder-errors-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetFolderErrorsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/folder/errors';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
