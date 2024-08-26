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
use PhpClient\Syncthing\Responses\SyncthingResponse;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

final class SyncthingClient extends Connector
{
    protected ?string $response = SyncthingResponse::class;

    public function __construct(
        private readonly string $token,
        private readonly string $baseUrl,
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator(
            token: $this->token,
        );
    }

    public function configResource(): ConfigResource
    {
        return new ConfigResource(
            connector: $this,
        );
    }

    public function configFoldersResource(): ConfigFoldersResource
    {
        return new ConfigFoldersResource(
            connector: $this,
        );
    }

    public function configDevicesResource(): ConfigDevicesResource
    {
        return new ConfigDevicesResource(
            connector: $this,
        );
    }

    public function configDefaultsResource(): ConfigDefaultsResource
    {
        return new ConfigDefaultsResource(
            connector: $this,
        );
    }

    public function systemResource(): SystemResource
    {
        return new SystemResource(
            connector: $this,
        );
    }

    public function clusterResource(): ClusterResource
    {
        return new ClusterResource(
            connector: $this,
        );
    }

    public function folderResource(): FolderResource
    {
        return new FolderResource(
            connector: $this,
        );
    }

    public function dbResource(): DbResource
    {
        return new DbResource(
            connector: $this,
        );
    }

    public function eventsResource(): EventsResource
    {
        return new EventsResource(
            connector: $this,
        );
    }

    public function statsResource(): StatsResource
    {
        return new StatsResource(
            connector: $this,
        );
    }

    public function svcResource(): svcResource
    {
        return new svcResource(
            connector: $this,
        );
    }

    public function debugResource(): DebugResource
    {
        return new DebugResource(
            connector: $this,
        );
    }

    public function noauthResource(): NoauthResource
    {
        return new NoauthResource(
            connector: $this,
        );
    }
}
