<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Folder\FolderErrorsGetRequest;
use PhpClient\Syncthing\Requests\Folder\FolderVersionsGetRequest;
use PhpClient\Syncthing\Requests\Folder\FolderVersionsPostRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#folder-endpoints  Documentaion
 */
final class FolderResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/folder-errors-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function errorsGet(string $folder): Response
    {
        return $this->connector->send(
            request: new FolderErrorsGetRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/folder-versions-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function versionsGet(string $folder): Response
    {
        return $this->connector->send(
            request: new FolderVersionsGetRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/folder-versions-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function versionsPost(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new FolderVersionsPostRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }
}
