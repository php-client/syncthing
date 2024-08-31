<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Folder\GetFilesVerionsRequest;
use PhpClient\Syncthing\Requests\Folder\GetFolderErrorsRequest;
use PhpClient\Syncthing\Requests\Folder\RestoreFilesVersionsRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#folder-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class FolderResource extends BaseResource
{
    /**
     * Returns the list of errors encountered during scanning or pulling.
     *
     * @see https://docs.syncthing.net/rest/folder-errors-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFolderErrors(string $folder): Response
    {
        return $this->connector->send(
            request: new GetFolderErrorsRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Returns the list of archived files that could be recovered.
     *
     * @see https://docs.syncthing.net/rest/folder-versions-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFilesVersions(string $folder): Response
    {
        return $this->connector->send(
            request: new GetFilesVerionsRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Restore archived versions of a given set of files.
     *
     * @see https://docs.syncthing.net/rest/folder-versions-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function restoreFilesVersions(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new RestoreFilesVersionsRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }
}
