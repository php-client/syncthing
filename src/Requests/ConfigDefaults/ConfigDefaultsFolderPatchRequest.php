<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDefaults;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
 */
final class ConfigDefaultsFolderPatchRequest extends Request
{
    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/defaults/folder';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
