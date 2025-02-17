<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Removes the folder for the given ID.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DeleteFolderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $folder,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/folders/$this->folder";
    }
}
