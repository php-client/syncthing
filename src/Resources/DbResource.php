<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Db\DbBrowseGetRequest;
use PhpClient\Syncthing\Requests\Db\DbCompletionGetRequest;
use PhpClient\Syncthing\Requests\Db\DbFileGetRequest;
use PhpClient\Syncthing\Requests\Db\DbIgnoresGetRequest;
use PhpClient\Syncthing\Requests\Db\DbIgnoresPostRequest;
use PhpClient\Syncthing\Requests\Db\DbLocalchangedGetRequest;
use PhpClient\Syncthing\Requests\Db\DbNeedGetRequest;
use PhpClient\Syncthing\Requests\Db\DbOverridePostRequest;
use PhpClient\Syncthing\Requests\Db\DbPrioPostRequest;
use PhpClient\Syncthing\Requests\Db\DbRemoteneedGetRequest;
use PhpClient\Syncthing\Requests\Db\DbRevertPostRequest;
use PhpClient\Syncthing\Requests\Db\DbScanPostRequest;
use PhpClient\Syncthing\Requests\Db\DbStatusGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#database-endpoints
 */
final class DbResource extends BaseResource
{
    /**
     * Returns the directory tree of the global model.
     *
     * @see https://docs.syncthing.net/rest/db-browse-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function browseGet(string $folder, ?string $prefix = null, ?int $levels = null): Response
    {
        return $this->connector->send(
            request: new DbBrowseGetRequest(
                folder: $folder,
                prefix: $prefix,
                levels: $levels,
            ),
        );
    }

    /**
     * Returns the completion percentage (0 to 100) and byte / item counts.
     *
     * @see https://docs.syncthing.net/rest/db-completion-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function completionGet(?string $folder = null, ?string $device = null): Response
    {
        return $this->connector->send(
            request: new DbCompletionGetRequest(
                folder: $folder,
                device: $device,
            ),
        );
    }

    /**
     * Returns most data available about a given file, including version and availability.
     *
     * @see https://docs.syncthing.net/rest/db-file-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function fileGet(string $folder, string $file): Response
    {
        return $this->connector->send(
            request: new DbFileGetRequest(
                folder: $folder,
                file: $file,
            ),
        );
    }

    /**
     * Returns the content of the .stignore as the ignore field for folder.
     *
     * @see https://docs.syncthing.net/rest/db-ignores-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function ignoresGet(string $folder): Response
    {
        return $this->connector->send(
            request: new DbIgnoresGetRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Updates the content of the .stignore for folder.
     *
     * @see https://docs.syncthing.net/rest/db-ignores-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function ignoresPost(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new DbIgnoresPostRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }

    /**
     * Returns the list of files which were changed locally in a receive-only folder.
     *
     * @see https://docs.syncthing.net/rest/db-localchanged-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function localchangedGet(string $folder): Response
    {
        return $this->connector->send(
            request: new DbLocalchangedGetRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Returns lists of files which are needed by this device in order for it to become in sync.
     *
     * @see https://docs.syncthing.net/rest/db-need-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function needGet(string $folder): Response
    {
        return $this->connector->send(
            request: new DbNeedGetRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Request override of a send only folder.
     *
     * Override means to make the local version latest, overriding changes made on other devices.
     * This API call does nothing if the folder is not a send only folder.
     *
     * @see https://docs.syncthing.net/rest/db-override-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function overridePost(string $folder): Response
    {
        return $this->connector->send(
            request: new DbOverridePostRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Moves the file to the top of the download queue.
     *
     * @see https://docs.syncthing.net/rest/db-prio-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function prioPost(string $folder, string $file): Response
    {
        return $this->connector->send(
            request: new DbPrioPostRequest(
                folder: $folder,
                file: $file,
            ),
        );
    }

    /**
     * Returns the list of files which are needed by that remote device in order for it to become in sync
     * with the shared folder.
     *
     * @see https://docs.syncthing.net/rest/db-remoteneed-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function remoteneedGet(string $folder, string $device): Response
    {
        return $this->connector->send(
            request: new DbRemoteneedGetRequest(
                folder: $folder,
                device: $device,
            ),
        );
    }

    /**
     * Request revert of a receive only folder.
     *
     * Reverting a folder means to undo all local changes.
     * This API call does nothing if the folder is not a receive only folder.
     *
     * @see https://docs.syncthing.net/rest/db-revert-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function revertPost(string $folder): Response
    {
        return $this->connector->send(
            request: new DbRevertPostRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Request immediate scan.
     *
     * Requesting scan of a path that no longer exists, but previously did, is valid and will result in Syncthing
     * noticing the deletion of the path in question.
     *
     * @see https://docs.syncthing.net/rest/db-scan-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function scanPost(?string $folder = null, ?string $sub = null, ?int $next = null): Response
    {
        return $this->connector->send(
            request: new DbScanPostRequest(
                folder: $folder,
                sub: $sub,
                next: $next,
            ),
        );
    }

    /**
     * Returns information about the current status of a folder.
     *
     * @see https://docs.syncthing.net/rest/db-status-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function statusGet(string $folder): Response
    {
        return $this->connector->send(
            request: new DbStatusGetRequest(
                folder: $folder),
        );
    }
}
