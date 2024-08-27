<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Db;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Updates the content of the .stignore for folder.
 *
 * @see https://docs.syncthing.net/rest/db-ignores-post.html  Documentation
 */
final class DbIgnoresPostRequest extends Request implements HasBody
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
