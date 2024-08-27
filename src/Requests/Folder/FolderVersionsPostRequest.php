<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Folder;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Restore archived versions of a given set of files.
 *
 * @see https://docs.syncthing.net/rest/folder-versions-post.html  Documentation
 */
final class FolderVersionsPostRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $folder,
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/folder/versions';
    }

    protected function defaultQuery(): array
    {
        return [
            'folder' => $this->folder,
        ];
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
