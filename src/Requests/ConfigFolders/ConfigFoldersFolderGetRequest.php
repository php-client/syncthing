<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
 */
final class ConfigFoldersFolderGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/rest/config/folders/$this->folder";
    }
}
