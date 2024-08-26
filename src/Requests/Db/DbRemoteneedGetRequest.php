<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/db-remoteneed-get.html  Documentation
 */
final class DbRemoteneedGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
        private readonly string $device,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/db/remoteneed';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
            'device' => $this->device,
        ];
    }
}
