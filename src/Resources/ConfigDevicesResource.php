<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Dto\Addresses;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesDeviceGetRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesDevicePatchRequest;
use PhpClient\Syncthing\Requests\ConfigDevices\ConfigDevicesGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

final class ConfigDevicesResource extends BaseResource
{
    /**
     * @throws FatalRequestException|RequestException
     */
    public function get(): Response
    {
        return $this->connector->send(
            request: new ConfigDevicesGetRequest(),
        );
    }

    // todo: PUT /rest/config/devices
    // todo: POST /rest/config/devices

    /**
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

    // todo: PUT /rest/config/devices/*id*

    /**
     * @throws FatalRequestException|RequestException
     */
    public function devicePatch(
        string $deviceId,
        ?string $name = null,
        ?bool $untrusted = null,
        ?Addresses $addresses = null,
    ): Response {
        return $this->connector->send(
            request: new ConfigDevicesDevicePatchRequest(
                deviceId: $deviceId,
                name: $name ?? null,
                untrusted: $untrusted ?? null,
                addresses: $addresses ?? null,
            // todo: other config options
            ),
        );
    }

    // todo: DELETE /rest/config/devices/*id*
}
