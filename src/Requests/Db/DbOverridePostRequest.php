<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Request override of a send only folder.
 *
 * Override means to make the local version latest, overriding changes made on other devices.
 * This API call does nothing if the folder is not a send only folder.
 *
 * @see https://docs.syncthing.net/rest/db-override-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DbOverridePostRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/override';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
