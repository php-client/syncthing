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
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints
 */
final class ConfigDevicesResource extends BaseResource
{
    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices
     */
    public function get(): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices
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
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices
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
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id
     */
    public function deviceGet(string $deviceId): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDeviceGetRequest(
                deviceId: $deviceId,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id
     */
    public function devicePut(string $deviceId, array $data): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDevicePutRequest(
                deviceId: $deviceId,
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id
     */
    public function devicePatch(string $deviceId, array $data): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDevicePatchRequest(
                deviceId: $deviceId,
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id
     */
    public function deviceDelete(string $deviceId): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesDeviceDeleteRequest(
                deviceId: $deviceId,
            ),
        );
    }
}
