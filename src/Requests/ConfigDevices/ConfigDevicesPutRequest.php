<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDevices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Takes an array of devices. If a given devices already exists, they are replaced, otherwise a new ones are added.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigDevicesPutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/devices';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
