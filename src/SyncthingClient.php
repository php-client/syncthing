<?php

declare(strict_types=1);

namespace PhpClient\Syncthing;

use Saloon\Http\Connector;

final class SyncthingClient extends Connector
{
    public readonly CommonActions $actions;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $token
    ) {
        $this->actions = new CommonActions(client: $this);
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
            'Authorization' => "Bearer $this->token",
        ];
    }
}
