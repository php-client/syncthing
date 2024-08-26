<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\System\SystemPingGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

final class SystemResource extends BaseResource
{
    // todo: GET /rest/system/browse
    // todo: GET /rest/system/connections
    // todo: GET /rest/system/debug
    // todo: POST /rest/system/debug
    // todo: GET /rest/system/discovery
    // todo: POST /rest/system/discovery
    // todo: POST /rest/system/error/clear
    // todo: GET /rest/system/error
    // todo: POST /rest/system/error
    // todo: GET /rest/system/log
    // todo: GET /rest/system/log.txt
    // todo: GET /rest/system/paths
    // todo: POST /rest/system/pause

    /**
     * @see https://docs.syncthing.net/rest/system-ping-get.html#get-rest-system-ping  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pingGet(): Response
    {
        return $this->connector->send(
            request: new SystemPingGetRequest(),
        );
    }

    // todo: POST /rest/system/ping
    // todo: POST /rest/system/reset
    // todo: POST /rest/system/restart
    // todo: POST /rest/system/resume
    // todo: POST /rest/system/shutdown
    // todo: GET /rest/system/status
    // todo: GET /rest/system/upgrade
    // todo: POST /rest/system/upgrade
    // todo: GET /rest/system/version
}
