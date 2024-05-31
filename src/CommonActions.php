<?php

declare(strict_types=1);

namespace PhpClient\Syncthing;

use GuzzleHttp\Exception\GuzzleException;
use PhpClient\Syncthing\Requests\GetSystemPingRequest;
use PhpClient\Syncthing\Responses\GetSystemPingResponse;

class CommonActions
{
    public function __construct(
        private SyncthingClient $client
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function ping(): bool
    {
        $request = new GetSystemPingRequest();
        $response = $this->client->send(request: $request);
        $customResponse = new GetSystemPingResponse(response: $response);

        return $customResponse->isSuccess();
    }
}
