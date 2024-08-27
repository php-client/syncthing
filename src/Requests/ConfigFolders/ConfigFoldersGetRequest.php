<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns all folders as an array.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
 */
final class ConfigFoldersGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/folders';
    }
}
