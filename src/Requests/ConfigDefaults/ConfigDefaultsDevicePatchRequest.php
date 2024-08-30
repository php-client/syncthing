<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDefaults;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Replaces part of default device configuration.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigDefaultsDevicePatchRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/defaults/device';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
