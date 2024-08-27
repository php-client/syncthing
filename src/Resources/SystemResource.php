<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use DateTimeInterface;
use PhpClient\Syncthing\Requests\System\SystemBrowseGetRequest;
use PhpClient\Syncthing\Requests\System\SystemConnectionsGetRequest;
use PhpClient\Syncthing\Requests\System\SystemDebugGetRequest;
use PhpClient\Syncthing\Requests\System\SystemDebugPostRequest;
use PhpClient\Syncthing\Requests\System\SystemDiscoveryGetRequest;
use PhpClient\Syncthing\Requests\System\SystemErrorClearPostRequest;
use PhpClient\Syncthing\Requests\System\SystemErrorGetRequest;
use PhpClient\Syncthing\Requests\System\SystemErrorPostRequest;
use PhpClient\Syncthing\Requests\System\SystemLogGetRequest;
use PhpClient\Syncthing\Requests\System\SystemLogTxtGetRequest;
use PhpClient\Syncthing\Requests\System\SystemPathsGetRequest;
use PhpClient\Syncthing\Requests\System\SystemPausePostRequest;
use PhpClient\Syncthing\Requests\System\SystemPingGetRequest;
use PhpClient\Syncthing\Requests\System\SystemPingPostRequest;
use PhpClient\Syncthing\Requests\System\SystemResetPostRequest;
use PhpClient\Syncthing\Requests\System\SystemRestartPostRequest;
use PhpClient\Syncthing\Requests\System\SystemResumePostRequest;
use PhpClient\Syncthing\Requests\System\SystemShutdownPostRequest;
use PhpClient\Syncthing\Requests\System\SystemStatusGetRequest;
use PhpClient\Syncthing\Requests\System\SystemUpgradeGetRequest;
use PhpClient\Syncthing\Requests\System\SystemUpgradePostRequest;
use PhpClient\Syncthing\Requests\System\SystemVersionGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#system-endpoints  Documentation
 */
final class SystemResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/system-browse-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function browseGet(?string $current = null): Response
    {
        return $this->connector->send(
            request: new SystemBrowseGetRequest(
                current: $current,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-connections-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function connectionsGet(): Response
    {
        return $this->connector->send(
            request: new SystemConnectionsGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-debug-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function debugGet(): Response
    {
        return $this->connector->send(
            request: new SystemDebugGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-debug-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function debugPost(?array $enable = null, ?array $disable = null): Response
    {
        return $this->connector->send(
            request: new SystemDebugPostRequest(
                enable: $enable,
                disable: $disable,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-discovery-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function discoveryGet(): Response
    {
        return $this->connector->send(
            request: new SystemDiscoveryGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-error-clear-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function errorClearPost(): Response
    {
        return $this->connector->send(
            request: new SystemErrorClearPostRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-error-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function errorGet(): Response
    {
        return $this->connector->send(
            request: new SystemErrorGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-error-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function errorPost(string $message): Response
    {
        return $this->connector->send(
            request: new SystemErrorPostRequest(
                message: $message,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-log-get.html#get-rest-system-log  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function logGet(?DateTimeInterface $since = null): Response
    {
        return $this->connector->send(
            request: new SystemLogGetRequest(
                since: $since,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-log-get.html#get-rest-system-log-txt  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function logTxtGet(?DateTimeInterface $since = null): Response
    {
        return $this->connector->send(
            request: new SystemLogTxtGetRequest(
                since: $since,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-paths-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pathsGet(): Response
    {
        return $this->connector->send(
            request: new SystemPathsGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-pause-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pausePost(?string $device = null): Response
    {
        return $this->connector->send(
            request: new SystemPausePostRequest(
                device: $device,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-ping-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pingGet(): Response
    {
        return $this->connector->send(
            request: new SystemPingGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-ping-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pingPost(): Response
    {
        return $this->connector->send(
            request: new SystemPingPostRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-reset-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function resetPost(?string $folder = null): Response
    {
        return $this->connector->send(
            request: new SystemResetPostRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-restart-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function restartPost(): Response
    {
        return $this->connector->send(
            request: new SystemRestartPostRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-resume-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function resumePost(?string $device = null): Response
    {
        return $this->connector->send(
            request: new SystemResumePostRequest(
                device: $device,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-shutdown-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function shutdownPost(): Response
    {
        return $this->connector->send(
            request: new SystemShutdownPostRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-status-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function statusGet(): Response
    {
        return $this->connector->send(
            request: new SystemStatusGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-upgrade-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function upgradeGet(): Response
    {
        return $this->connector->send(
            request: new SystemUpgradeGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-upgrade-post.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function upgradePost(): Response
    {
        return $this->connector->send(
            request: new SystemUpgradePostRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/system-version-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function versionGet(): Response
    {
        return $this->connector->send(
            request: new SystemVersionGetRequest(),
        );
    }
}
