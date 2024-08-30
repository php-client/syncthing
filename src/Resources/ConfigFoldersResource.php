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
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigFoldersResource extends BaseResource
{
    /**
     * Returns all folders as an array.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Takes an array of folders. If a given folders already exists, they are replaced, otherwise a new ones are added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Returns the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Replace config of the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Replace part of config of the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Removes the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
