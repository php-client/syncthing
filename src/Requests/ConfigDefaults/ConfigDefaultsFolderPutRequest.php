<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDefaults;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Replaces the default folder configuration. Omitted values are reset to the hard-coded defaults.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigDefaultsFolderPutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

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
