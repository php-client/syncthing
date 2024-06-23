<?php

declare(strict_types=1);

namespace PhpClient\Syncthing;

use PhpClient\Syncthing\Dto\Addresses;
use PhpClient\Syncthing\Dto\Device;
use PhpClient\Syncthing\Dto\Result;
use PhpClient\Syncthing\Requests\GetConfigDevicesIdRequest;
use PhpClient\Syncthing\Requests\GetConfigRestartRequiredRequest;
use PhpClient\Syncthing\Requests\GetSystemPingRequest;
use PhpClient\Syncthing\Requests\PatchConfigDevicesIdRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

final readonly class CommonActions
{
    public function __construct(
        private Syncthing $syncthing,
    ) {
    }

    /**
     * @throws FatalRequestException|RequestException
     */
    public function ping(): bool
    {
        $request = new GetSystemPingRequest();
        $response = $this->syncthing->send(request: $request);

        /** @var Result $result */
        $result = $response->dto();

        return $result->bool;
    }

    /**
     * @throws FatalRequestException|RequestException
     */
    public function isRestartRequired(): bool
    {
        $request = new GetConfigRestartRequiredRequest();
        $response = $this->syncthing->send(request: $request);
        /** @var Result $result */
        $result = $response->dtoOrFail();

        return $result->bool;
    }

    public function restart(): void
    {
        // todo; POST /rest/system/restart
    }

    /**
     * @throws FatalRequestException|RequestException
     */
    public function getConfigOfDevice(string $deviceId): Device
    {
        $request = new GetConfigDevicesIdRequest($deviceId);
        $response = $this->syncthing->send($request);
        /** @var Device $result */
        $result = $response->dtoOrFail();

        return $result;
    }

    /**
     * @throws FatalRequestException|RequestException
     */
    public function editConfigOfDevice(
        string $deviceId,
        ?string $name = null,
        ?bool $untrusted = null,
        ?Addresses $addresses = null,
    ): Result {
        $request = new PatchConfigDevicesIdRequest(
            deviceId: $deviceId,
            name: $name ?? null,
            untrusted: $untrusted ?? null,
            addresses: $addresses ?? null,
        // todo: other config options
        );

        $response = $this->syncthing->send($request);

        return $response->dtoOrFail();
    }

    public function getConfigs(): void
    {
        /* todo:
        $request = new GetConfigRequest();
        $response = $this->client->send(request: $request);
        $customResponse = new GetConfigResponse(response: $response);

        return $customResponse->config();
        */
        // todo: $request = new GetConfigRequest();
    }

    public function editSelf($config): void
    {
    }

    public function putDevices(array $configs): void
    {
    }

    public function patchDevice(string $id, array $config): void
    {
    }

    public function deleteDevice(string $id): void
    {
    }

    public function putFolders(array $configs): void
    {
    }

    public function patchFolder(string $id, array $config): void
    {
    }

    public function deleteFolder(string $id): void
    {
    }
}
