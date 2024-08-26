<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Cluster\ClusterPendingDevicesDeleteRequest;
use PhpClient\Syncthing\Requests\Cluster\ClusterPendingDevicesGetRequest;
use PhpClient\Syncthing\Requests\Cluster\ClusterPendingFoldersDeleteRequest;
use PhpClient\Syncthing\Requests\Cluster\ClusterPendingFoldersGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#cluster-endpoints  Documentation
 */
final class ClusterResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/cluster-pending-devices-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pendingDevicesGet(): Response
    {
        return $this->connector->send(
            request: new ClusterPendingDevicesGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/cluster-pending-devices-delete.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pendingDevicesDelete(string $device): Response
    {
        return $this->connector->send(
            request: new ClusterPendingDevicesDeleteRequest(
                device: $device,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/cluster-pending-folders-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pendingFoldersGet(): Response
    {
        return $this->connector->send(
            request: new ClusterPendingFoldersGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/cluster-pending-folders-delete.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function pendingFoldersDelete(string $folder): Response
    {
        return $this->connector->send(
            request: new ClusterPendingFoldersDeleteRequest(
                folder: $folder,
            ),
        );
    }
}
