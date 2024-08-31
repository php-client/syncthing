<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Cluster\ListRemotePendingDevicesRequest;
use PhpClient\Syncthing\Requests\Cluster\ListRemotePendingFoldersRequest;
use PhpClient\Syncthing\Requests\Cluster\RemoveRecordsAboutRemotePendingDeviceRequest;
use PhpClient\Syncthing\Requests\Cluster\RemoveRecordsAboutRemotePendingFolderRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#cluster-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ClusterResource extends BaseResource
{
    /**
     * Lists remote devices which have tried to connect, but are not yet configured in our instance.
     *
     * @see https://docs.syncthing.net/rest/cluster-pending-devices-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function listRemotePendingDevices(): Response
    {
        return $this->connector->send(
            request: new ListRemotePendingDevicesRequest(),
        );
    }

    /**
     * Remove records about a pending remote device which tried to connect.
     *
     * @see https://docs.syncthing.net/rest/cluster-pending-devices-delete.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function removeRecordsAboutRemotePendingDevice(string $device): Response
    {
        return $this->connector->send(
            request: new RemoveRecordsAboutRemotePendingDeviceRequest(
                device: $device,
            ),
        );
    }

    /**
     * Lists folders which remote devices have offered to us, but are not yet shared from our instance to them.
     *
     * @see https://docs.syncthing.net/rest/cluster-pending-folders-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function listRemotePendingFolders(?string $device = null): Response
    {
        return $this->connector->send(
            request: new ListRemotePendingFoldersRequest(
                device: $device,
            ),
        );
    }

    /**
     * Remove records about a pending folder announced from a remote device.
     *
     * @see https://docs.syncthing.net/rest/cluster-pending-folders-delete.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function removeRecordsAboutRemotePendingFolder(string $folder): Response
    {
        return $this->connector->send(
            request: new RemoveRecordsAboutRemotePendingFolderRequest(
                folder: $folder,
            ),
        );
    }
}
