<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Database;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Returns the directory tree of the global model.
 *
 * @see https://docs.syncthing.net/rest/db-browse-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetDirectoryTreeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
        private readonly ?string $prefix = null,
        private readonly ?int $levels = null,
    ) {
    }


    public function resolveEndpoint(): string
    {
        return '/rest/db/browse';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'folder' => $this->folder,
            'levels' => $this->levels,
            'prefix' => $this->prefix,
        ]);
    }
}
