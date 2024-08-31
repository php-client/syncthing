<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Removes the device for the given ID.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DeleteDeviceRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string $device,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/devices/$this->device";
    }
}
