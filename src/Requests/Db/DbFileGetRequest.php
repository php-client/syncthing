<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns most data available about a given file, including version and availability.
 *
 * @see https://docs.syncthing.net/rest/db-file-get.html  Documentation
 */
final class DbFileGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
        private readonly string $file,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/file';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
            'file' => $this->file,
        ];
    }
}
