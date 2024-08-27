<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Request revert of a receive only folder.
 *
 * Reverting a folder means to undo all local changes.
 * This API call does nothing if the folder is not a receive only folder.
 *
 * @see https://docs.syncthing.net/rest/db-revert-post.html  Documentation
 */
final class DbRevertPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/revert';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }
}
