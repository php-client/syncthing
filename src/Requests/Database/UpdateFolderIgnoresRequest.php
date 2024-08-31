<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Database;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Updates the content of the .stignore for folder.
 *
 * @see https://docs.syncthing.net/rest/db-ignores-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class UpdateFolderIgnoresRequest extends Request implements HasBody
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
        return '/rest/db/ignores';
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
