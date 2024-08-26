<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsDeviceGetRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsDevicePatchRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsDevicePutRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsFolderGetRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsFolderPatchRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsFolderPutRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsIgnoresGetRequest;
use PhpClient\Syncthing\Requests\ConfigDefaults\ConfigDefaultsIgnoresPutRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints
 */
final class ConfigDefaultsResource extends BaseResource
{
    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
     */
    public function folderGet(): Response
    {
        return $this->connector->send(
            new ConfigDefaultsFolderGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
     */
    public function folderPut(array $data): Response
    {
        return $this->connector->send(
            new ConfigDefaultsFolderPutRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
     */
    public function folderPatch(array $data): Response
    {
        return $this->connector->send(
            new ConfigDefaultsFolderPatchRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
     */
    public function deviceGet(): Response
    {
        return $this->connector->send(
            new ConfigDefaultsDeviceGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
     */
    public function devicePut(array $data): Response
    {
        return $this->connector->send(
            new ConfigDefaultsDevicePutRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device
     */
    public function devicePatch(array $data): Response
    {
        return $this->connector->send(
            new ConfigDefaultsDevicePatchRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores
     */
    public function ignoresGet(): Response
    {
        return $this->connector->send(
            new ConfigDefaultsIgnoresGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores
     */
    public function ignoresPut(array $data): Response
    {
        return $this->connector->send(
            new ConfigDefaultsIgnoresPutRequest(
                data: $data,
            ),
        );
    }
}
