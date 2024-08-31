<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Database\ForceFileDownloadPriority;
use PhpClient\Syncthing\Requests\Database\GetCompletionPercentageRequest;
use PhpClient\Syncthing\Requests\Database\GetDirectoryTreeRequest;
use PhpClient\Syncthing\Requests\Database\GetFileInfoRequest;
use PhpClient\Syncthing\Requests\Database\GetFolderIgnoresRequest;
use PhpClient\Syncthing\Requests\Database\GetFolderStatusRequest;
use PhpClient\Syncthing\Requests\Database\GetLocalChangedFilesRequest;
use PhpClient\Syncthing\Requests\Database\GetNeededFilesRequest;
use PhpClient\Syncthing\Requests\Database\GetRemoteNeededFilesRequest;
use PhpClient\Syncthing\Requests\Database\OverrideRemoteFolderRequest;
use PhpClient\Syncthing\Requests\Database\RescanRequest;
use PhpClient\Syncthing\Requests\Database\RevertLocalChangesRequest;
use PhpClient\Syncthing\Requests\Database\UpdateFolderIgnoresRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#database-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DatabaseResource extends BaseResource
{
    /**
     * Returns the directory tree of the global model.
     *
     * @see https://docs.syncthing.net/rest/db-browse-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDirectoryTree(string $folder, ?string $prefix = null, ?int $levels = null): Response
    {
        return $this->connector->send(
            request: new GetDirectoryTreeRequest(
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
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getCompletionPercentage(?string $folder = null, ?string $device = null): Response
    {
        return $this->connector->send(
            request: new GetCompletionPercentageRequest(
                folder: $folder,
                device: $device,
            ),
        );
    }

    /**
     * Returns most data available about a given file, including version and availability.
     *
     * @see https://docs.syncthing.net/rest/db-file-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFileInfo(string $folder, string $file): Response
    {
        return $this->connector->send(
            request: new GetFileInfoRequest(
                folder: $folder,
                file: $file,
            ),
        );
    }

    /**
     * Returns the content of the .stignore as the ignore field for folder.
     *
     * @see https://docs.syncthing.net/rest/db-ignores-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFolderIgnores(string $folder): Response
    {
        return $this->connector->send(
            request: new GetFolderIgnoresRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Updates the content of the .stignore for folder.
     *
     * @see https://docs.syncthing.net/rest/db-ignores-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateFolderIgnores(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new UpdateFolderIgnoresRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }

    /**
     * Returns the list of files which were changed locally in a receive-only folder.
     *
     * @see https://docs.syncthing.net/rest/db-localchanged-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getLocalChangedFiles(string $folder): Response
    {
        return $this->connector->send(
            request: new GetLocalChangedFilesRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Returns lists of files which are needed by this device in order for it to become in sync.
     *
     * @see https://docs.syncthing.net/rest/db-need-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getNeededFiles(string $folder): Response
    {
        return $this->connector->send(
            request: new GetNeededFilesRequest(
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
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function overrideRemoteFolder(string $folder): Response
    {
        return $this->connector->send(
            request: new OverrideRemoteFolderRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Moves the file to the top of the download queue.
     *
     * @see https://docs.syncthing.net/rest/db-prio-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function forceFileDownloadPriority(string $folder, string $file): Response
    {
        return $this->connector->send(
            request: new ForceFileDownloadPriority(
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
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getRemoteNeededFiles(string $folder, string $device): Response
    {
        return $this->connector->send(
            request: new GetRemoteNeededFilesRequest(
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
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function revertLocalChanges(string $folder): Response
    {
        return $this->connector->send(
            request: new RevertLocalChangesRequest(
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
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function rescan(?string $folder = null, ?string $sub = null, ?int $next = null): Response
    {
        return $this->connector->send(
            request: new RescanRequest(
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
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFolderStatus(string $folder): Response
    {
        return $this->connector->send(
            request: new GetFolderStatusRequest(
                folder: $folder,
            ),
        );
    }
}
