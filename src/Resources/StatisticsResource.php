<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Statistics\GetDevicesStatisticsRequest;
use PhpClient\Syncthing\Requests\Statistics\GetFoldersStatisticsRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#statistics-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class StatisticsResource extends BaseResource
{
    /**
     * Returns general statistics about devices.
     *
     * @see https://docs.syncthing.net/rest/stats-device-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDevicesStatistics(): Response
    {
        return $this->connector->send(
            request: new GetDevicesStatisticsRequest(),
        );
    }

    /**
     * Returns general statistics about folders.
     *
     * @see https://docs.syncthing.net/rest/stats-folder-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFoldersStatistics(): Response
    {
        return $this->connector->send(
            request: new GetFoldersStatisticsRequest(),
        );
    }
}
