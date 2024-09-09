<?php

declare(strict_types=1);

namespace PhpClient\Syncthing;

use PhpClient\Syncthing\Resources\Api;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

/**
 * @see https://docs.syncthing.net/dev/rest.html  Documentation
 */
final class Syncthing extends Connector
{
    public readonly Api $api;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $token,
    ) {
        $this->api = new Api(connector: $this);
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

    /**
     * @see https://docs.syncthing.net/dev/rest.html#api-key  Documentation
     */
    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator(
            token: $this->token,
        );
    }
}
