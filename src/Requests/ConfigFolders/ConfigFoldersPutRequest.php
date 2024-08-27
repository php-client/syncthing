<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigFolders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Takes an array of folders. If a given folders already exists, they are replaced, otherwise a new ones are added.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
 */
final class ConfigFoldersPutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/folders';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
