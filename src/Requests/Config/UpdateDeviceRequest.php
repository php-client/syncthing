<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Replace config of the device for the given ID.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class UpdateDeviceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly string $device,
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/devices/$this->device";
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
