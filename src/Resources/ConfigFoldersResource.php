<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersFolderDeleteRequest;
use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersFolderGetRequest;
use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersFolderPatchRequest;
use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersFolderPutRequest;
use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersGetRequest;
use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersPostRequest;
use PhpClient\Syncthing\Requests\ConfigFolders\ConfigFoldersPutRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints  Documentation
 */
final class ConfigFoldersResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function get(): Response
    {
        return $this->connector->send(
            request: new ConfigFoldersGetRequest(),
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
            request: new ConfigFoldersPostRequest(
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
            request: new ConfigFoldersPutRequest(
                data: $data,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function folderGet(string $folder): Response
    {
        return $this->connector->send(
            request: new ConfigFoldersFolderGetRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function folderPut(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new ConfigFoldersFolderPutRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function folderPatch(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new ConfigFoldersFolderPatchRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function folderDelete(string $folder): Response
    {
        return $this->connector->send(
            request: new ConfigFoldersFolderDeleteRequest(
                folder: $folder,
            ),
        );
    }
}
