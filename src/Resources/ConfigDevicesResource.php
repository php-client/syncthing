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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
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
