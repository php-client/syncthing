<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use DateTimeInterface;
use PhpClient\Syncthing\Requests\System\CheckUpgradePossibilityRequest;
use PhpClient\Syncthing\Requests\System\CreateErrorRequest;
use PhpClient\Syncthing\Requests\System\DeleteRecentErrorsRequest;
use PhpClient\Syncthing\Requests\System\EraseIndexRequest;
use PhpClient\Syncthing\Requests\System\GetDebugFacilitiesRequest;
use PhpClient\Syncthing\Requests\System\GetDevicesInfoRequest;
use PhpClient\Syncthing\Requests\System\GetListOfDirectoriesRequest;
use PhpClient\Syncthing\Requests\System\GetLocalDiscoveryCacheRequest;
use PhpClient\Syncthing\Requests\System\GetLogAsTextRequest;
use PhpClient\Syncthing\Requests\System\GetLogRequest;
use PhpClient\Syncthing\Requests\System\GetPathsRequest;
use PhpClient\Syncthing\Requests\System\GetRecentErrorsRequest;
use PhpClient\Syncthing\Requests\System\GetSystemStatusRequest;
use PhpClient\Syncthing\Requests\System\GetVersionRequest;
use PhpClient\Syncthing\Requests\System\PauseSyncingRequest;
use PhpClient\Syncthing\Requests\System\PingPostRequest;
use PhpClient\Syncthing\Requests\System\PingRequest;
use PhpClient\Syncthing\Requests\System\RestartRequest;
use PhpClient\Syncthing\Requests\System\ResumeSyncingRequest;
use PhpClient\Syncthing\Requests\System\ShutdownRequest;
use PhpClient\Syncthing\Requests\System\UpdateDebugFacilitiesRequest;
use PhpClient\Syncthing\Requests\System\UpgradeRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#system-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class SystemResource extends BaseResource
{
    /**
     * Returns a list of directories matching the path given by the optional parameter current.
     *
     * If the option current is not given, filesystem root paths are returned.
     *
     * @see https://docs.syncthing.net/rest/system-browse-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getListOfDirectories(?string $current = null): Response
    {
        return $this->connector->send(
            request: new GetListOfDirectoriesRequest(
                current: $current,
            ),
        );
    }

    /**
     * Returns the list of configured devices and some metadata associated with them.
     *
     * @see https://docs.syncthing.net/rest/system-connections-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDevicesInfo(): Response
    {
        return $this->connector->send(
            request: new GetDevicesInfoRequest(),
        );
    }

    /**
     * Returns the set of debug facilities and which of them are currently enabled.
     *
     * @see https://docs.syncthing.net/rest/system-debug-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDebugFacilities(): Response
    {
        return $this->connector->send(
            request: new GetDebugFacilitiesRequest(),
        );
    }

    /**
     * Enables or disables debugging for specified facilities.
     *
     * @see https://docs.syncthing.net/rest/system-debug-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateDebugFacilities(?array $enable = null, ?array $disable = null): Response
    {
        return $this->connector->send(
            request: new UpdateDebugFacilitiesRequest(
                enable: $enable,
                disable: $disable,
            ),
        );
    }

    /**
     * Returns the contents of the local discovery cache.
     *
     * @see https://docs.syncthing.net/rest/system-discovery-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getLocalDiscoverCache(): Response
    {
        return $this->connector->send(
            request: new GetLocalDiscoveryCacheRequest(),
        );
    }

    /**
     * Remove all recent errors.
     *
     * @see https://docs.syncthing.net/rest/system-error-clear-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function deleteRecentErrors(): Response
    {
        return $this->connector->send(
            request: new DeleteRecentErrorsRequest(),
        );
    }

    /**
     * Returns the list of recent errors.
     *
     * @see https://docs.syncthing.net/rest/system-error-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getRecentErrors(): Response
    {
        return $this->connector->send(
            request: new GetRecentErrorsRequest(),
        );
    }

    /**
     * Post with an error message to register a new error.
     *
     * The new error will be displayed on any active GUI clients.
     *
     * @see https://docs.syncthing.net/rest/system-error-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function createError(string $message): Response
    {
        return $this->connector->send(
            request: new CreateErrorRequest(
                message: $message,
            ),
        );
    }

    /**
     * Returns the list of recent log entries.
     *
     * @see https://docs.syncthing.net/rest/system-log-get.html#get-rest-system-log  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getLog(?DateTimeInterface $since = null): Response
    {
        return $this->connector->send(
            request: new GetLogRequest(
                since: $since,
            ),
        );
    }

    /**
     * Returns the list of recent log entries, formatted as a text log.
     *
     * @see https://docs.syncthing.net/rest/system-log-get.html#get-rest-system-log-txt  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getLogAsText(?DateTimeInterface $since = null): Response
    {
        return $this->connector->send(
            request: new GetLogAsTextRequest(
                since: $since,
            ),
        );
    }

    /**
     * Returns the path locations used internally for storing configuration, database, and others.
     *
     * @see https://docs.syncthing.net/rest/system-paths-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getPaths(): Response
    {
        return $this->connector->send(
            request: new GetPathsRequest(),
        );
    }

    /**
     * Pause the given device or all devices.
     *
     * @see https://docs.syncthing.net/rest/system-pause-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function pauseSyncing(?string $device = null): Response
    {
        return $this->connector->send(
            request: new PauseSyncingRequest(
                device: $device,
            ),
        );
    }

    /**
     * Returns a {"ping": "pong"} object.
     *
     * @see https://docs.syncthing.net/rest/system-ping-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function ping(): Response
    {
        return $this->connector->send(
            request: new PingRequest(),
        );
    }

    /**
     * Returns a {"ping": "pong"} object.
     *
     * @see https://docs.syncthing.net/rest/system-ping-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function pingPost(): Response
    {
        return $this->connector->send(
            request: new PingPostRequest(),
        );
    }

    /**
     * Erase the current index database and restart Syncthing.
     *
     * By specifying the folder parameter with a valid folder ID, only information for that folder will be erased.
     *
     * @see https://docs.syncthing.net/rest/system-reset-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function eraseIndex(?string $folder = null): Response
    {
        return $this->connector->send(
            request: new EraseIndexRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Post with empty body to immediately restart Syncthing.
     *
     * @see https://docs.syncthing.net/rest/system-restart-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function restart(): Response
    {
        return $this->connector->send(
            request: new RestartRequest(),
        );
    }

    /**
     * Resume the given device or all devices.
     *
     * @see https://docs.syncthing.net/rest/system-resume-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function resumeSyncing(?string $device = null): Response
    {
        return $this->connector->send(
            request: new ResumeSyncingRequest(
                device: $device,
            ),
        );
    }

    /**
     * Cause Syncthing to exit and not restart.
     *
     * @see https://docs.syncthing.net/rest/system-shutdown-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function shutdown(): Response
    {
        return $this->connector->send(
            request: new ShutdownRequest(),
        );
    }

    /**
     * Returns information about current system status and resource usage.
     *
     * @see https://docs.syncthing.net/rest/system-status-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getSystemStatus(): Response
    {
        return $this->connector->send(
            request: new GetSystemStatusRequest(),
        );
    }

    /**
     * Checks for a possible upgrade and returns an object describing the newest version and upgrade possibility.
     *
     * @see https://docs.syncthing.net/rest/system-upgrade-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function checkUpgradePossibility(): Response
    {
        return $this->connector->send(
            request: new CheckUpgradePossibilityRequest(),
        );
    }

    /**
     * Perform an upgrade to the newest released version and restart.
     *
     * @see https://docs.syncthing.net/rest/system-upgrade-post.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function upgrade(): Response
    {
        return $this->connector->send(
            request: new UpgradeRequest(),
        );
    }

    /**
     * Returns the current Syncthing version information.
     *
     * @see https://docs.syncthing.net/rest/system-version-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getVersion(): Response
    {
        return $this->connector->send(
            request: new GetVersionRequest(),
        );
    }
}
