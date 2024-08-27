<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesDeviceDeleteRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesDeviceGetRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesDevicePatchRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesDevicePutRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesGetRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesPostRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesPutRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints  Documentation
 */
final class ConfigDevicesResource extends BaseResource
{
    /**
     * Returns all devices as an array.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function get(): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesGetRequest(),
        );
    }

    /**
     * Takes a single device. If a given device already exists, it’s replaced, otherwise a new one is added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function post(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesPostRequest(
                data: $data,
            ),
        );
    }

    /**
     * Takes an array of devices. If a given devices already exists, they are replaced, otherwise a new ones are added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function put(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesPutRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function deviceGet(string $device): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDeviceGetRequest(
                device: $device,
            ),
        );
    }

    /**
     * Replace config of the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function devicePut(string $device, array $data): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDevicePutRequest(
                device: $device,
                data: $data,
            ),
        );
    }

    /**
     * Replace part of config of the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function devicePatch(string $device, array $data): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDevicePatchRequest(
                device: $device,
                data: $data,
            ),
        );
    }

    /**
     * Removes the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function deviceDelete(string $device): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDeviceDeleteRequest(
                device: $device,
            ),
        );
    }
}
