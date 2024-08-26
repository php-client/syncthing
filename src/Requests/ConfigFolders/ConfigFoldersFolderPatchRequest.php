<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigFolders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
 */
final class ConfigFoldersFolderPatchRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly string $folder,
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/folders/$this->folder";
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
