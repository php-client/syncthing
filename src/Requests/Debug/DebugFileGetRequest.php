<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Debug;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-file  Documentation
 */
final class DebugFileGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
        private readonly string $file,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/debug/file';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
            'file' => $this->file,
        ];
    }
}
