<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Moves the file to the top of the download queue.
 *
 * @see https://docs.syncthing.net/rest/db-prio-post.html  Documentation
 */
final class DbPrioPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $folder,
        private readonly string $file,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/prio';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
            'file' => $this->file,
        ];
    }
}
