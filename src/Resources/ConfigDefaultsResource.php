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
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints  Documentation
 */
final class ConfigDefaultsResource extends BaseResource
{
    /**
     * Returns a template folder configuration object with all default values.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function folderGet(): Response
    {
        return $this->connector->send(
            new ConfigDefaultsFolderGetRequest(),
        );
    }

    /**
     * Replaces the default folder configuration. Omitted values are reset to the hard-coded defaults.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * Replaces part of default folder configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * Returns a template device configuration object with all default values.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function deviceGet(): Response
    {
        return $this->connector->send(
            new ConfigDefaultsDeviceGetRequest(),
        );
    }

    /**
     * Replaces the default device configuration. Omitted values are reset to the hard-coded defaults.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * Replaces part of default device configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * Returns an object with a single lines attribute listing ignore patterns to be used by default on folders,
     * as an array of single-line strings.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function ignoresGet(): Response
    {
        return $this->connector->send(
            new ConfigDefaultsIgnoresGetRequest(),
        );
    }

    /**
     * Replaces an object with a single lines attribute listing ignore patterns to be used by default on folders,
     * as an array of single-line strings.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores  Documentation
     *
     * @throws FatalRequestException|RequestException
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
