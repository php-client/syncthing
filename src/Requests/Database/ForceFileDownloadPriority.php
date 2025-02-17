<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Database;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Moves the file to the top of the download queue.
 *
 * @see https://docs.syncthing.net/rest/db-prio-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ForceFileDownloadPriority extends Request
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
