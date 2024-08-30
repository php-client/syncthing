<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Returns the completion percentage (0 to 100) and byte / item counts.
 *
 * https://docs.syncthing.net/rest/db-completion-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DbCompletionGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?string $folder = null,
        private readonly ?string $device = null,
    )
    {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/completion';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'folderId' => $this->folder,
            'deviceId' => $this->device,
        ]);
    }
}
