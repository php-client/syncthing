<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigFolders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id
 */
final class ConfigFoldersFolderPutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly string $folderId,
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/folders/$this->folderId";
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
