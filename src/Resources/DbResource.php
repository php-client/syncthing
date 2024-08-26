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
