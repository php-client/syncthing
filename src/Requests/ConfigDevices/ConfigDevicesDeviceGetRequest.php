<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDevices;

use PhpClient\Syncthing\Dto\Device;
use PhpClient\Syncthing\Exceptions\SyncthingException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Returns the device for the given ID.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
 */
final class ConfigDevicesDeviceGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $device,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/devices/$this->device";
    }

    /**
     * @throws SyncthingException
     */
    public function createDtoFromResponse(Response $response): Device
    {
        return Device::fromArray(array:$response->array());
    }
}
