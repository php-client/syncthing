<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Takes a single device. If a given device already exists, it’s replaced, otherwise a new one is added.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class CreateOrUpdateDeviceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
