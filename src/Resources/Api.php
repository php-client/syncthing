<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use Saloon\Http\BaseResource;

final class Api extends BaseResource
{
    public function system(): SystemResource
    {
        return new SystemResource(
            connector: $this->connector,
        );
    }

    public function config(): ConfigResource
    {
        return new ConfigResource(
            connector: $this->connector,
        );
    }

    public function cluster(): ClusterResource
    {
        return new ClusterResource(
            connector: $this->connector,
        );
    }

    public function folder(): FolderResource
    {
        return new FolderResource(
            connector: $this->connector,
        );
    }

    public function database(): DatabaseResource
    {
        return new DatabaseResource(
            connector: $this->connector,
        );
    }

    public function events(): EventsResource
    {
        return new EventsResource(
            connector: $this->connector,
        );
    }

    public function statistics(): StatisticsResource
    {
        return new StatisticsResource(
            connector: $this->connector,
        );
    }

    public function misc(): MiscResource
    {
        return new MiscResource(
            connector: $this->connector,
        );
    }

    public function debug(): DebugResource
    {
        return new DebugResource(
            connector: $this->connector,
        );
    }

    public function noauth(): NoauthResource
    {
        return new NoauthResource(
            connector: $this->connector,
        );
    }
}
