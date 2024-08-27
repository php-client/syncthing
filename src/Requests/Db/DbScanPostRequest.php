<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Request immediate scan.
 *
 * Requesting scan of a path that no longer exists, but previously did, is valid and will result in Syncthing
 * noticing the deletion of the path in question.
 *
 * @see https://docs.syncthing.net/rest/db-scan-post.html  Documentation
 */
final class DbScanPostRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly ?string $folder = null,
        private readonly ?string $sub = null,
        private readonly ?int $next = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/scan';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'folder' => $this->folder,
            'sub' => $this->sub,
            'next' => $this->next,
        ]);
    }
}
