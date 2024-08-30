<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the list of files which were changed locally in a receive-only folder.
 *
 * @see https://docs.syncthing.net/rest/db-localchanged-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DbLocalchangedGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/localchanged';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
