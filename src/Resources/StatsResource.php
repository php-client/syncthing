<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Stats\StatsDeviceGetRequest;
use PhpClient\Syncthing\Requests\Stats\StatsFolderGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#statistics-endpoints  Documentation
 */
final class StatsResource extends BaseResource
{
    /**
     * Returns general statistics about devices.
     *
     * @see https://docs.syncthing.net/rest/stats-device-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function deviceGet(): Response
    {
        return $this->connector->send(
            request: new StatsDeviceGetRequest(),
        );
    }

    /**
     * Returns general statistics about folders.
     *
     * @see https://docs.syncthing.net/rest/stats-folder-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function folderGet(): Response
    {
        return $this->connector->send(
            request: new StatsFolderGetRequest(),
        );
    }
}
