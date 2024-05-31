<?php

declare(strict_types=1);

namespace PhpClient\Syncthing;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

final readonly class SyncthingClient
{
    private Client $http;

    public CommonActions $commonActions;

    public function __construct(
        private string $uri,
        private string $token
    ) {
        $this->http = new Client(
            config: [
                'base_uri' => $this->uri,
                'headers' => [
                    'Authorization' => "Bearer $this->token",
                ],
            ],
        );

        $this->commonActions = new CommonActions(client: $this);
    }

    /**
     * @throws GuzzleException
     */
    public function send(Request $request, array $options = []): Response
    {
        return $this->http->send(
            request: $request,
            options: $options,
        );
    }
}
