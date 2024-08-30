<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigFolders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Takes a single folder. If a given folder already exists, it’s replaced, otherwise a new one is added.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigFoldersPostRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
