<?php

declare(strict_types=1);

namespace PhpClient\Syncthing;

use PhpClient\Syncthing\Resources\ClusterResource;
use PhpClient\Syncthing\Resources\ConfigDefaultsResource;
use PhpClient\Syncthing\Resources\ConfigDevicesResource;
use PhpClient\Syncthing\Resources\ConfigFoldersResource;
use PhpClient\Syncthing\Resources\ConfigResource;
use PhpClient\Syncthing\Resources\DbResource;
use PhpClient\Syncthing\Resources\DebugResource;
use PhpClient\Syncthing\Resources\EventsResource;
use PhpClient\Syncthing\Resources\FolderResource;
use PhpClient\Syncthing\Resources\NoauthResource;
use PhpClient\Syncthing\Resources\StatsResource;
use PhpClient\Syncthing\Resources\SvcResource;
use PhpClient\Syncthing\Resources\SystemResource;
use Saloon\Http\BaseResource;

final class Api extends BaseResource
{
    public function config(): ConfigResource
    {
        return new ConfigResource(
            connector: $this,
        );
    }

    public function configFolders(): ConfigFoldersResource
    {
        return new ConfigFoldersResource(
            connector: $this,
        );
    }

    public function configDevices(): ConfigDevicesResource
    {
        return new ConfigDevicesResource(
            connector: $this,
        );
    }

    public function configDefaults(): ConfigDefaultsResource
    {
        return new ConfigDefaultsResource(
            connector: $this,
        );
    }

    public function system(): SystemResource
    {
        return new SystemResource(
            connector: $this,
        );
    }

    public function cluster(): ClusterResource
    {
        return new ClusterResource(
            connector: $this,
        );
    }

    public function folder(): FolderResource
    {
        return new FolderResource(
            connector: $this,
        );
    }

    public function db(): DbResource
    {
        return new DbResource(
            connector: $this,
        );
    }

    public function events(): EventsResource
    {
        return new EventsResource(
            connector: $this,
        );
    }

    public function stats(): StatsResource
    {
        return new StatsResource(
            connector: $this,
        );
    }

    public function svc(): SvcResource
    {
        return new SvcResource(
            connector: $this,
        );
    }

    public function debug(): DebugResource
    {
        return new DebugResource(
            connector: $this,
        );
    }

    public function noauth(): NoauthResource
    {
        return new NoauthResource(
            connector: $this,
        );
    }
}
