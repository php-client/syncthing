<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests;

use JsonException;
use PhpClient\Syncthing\Dto\Result;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

final class GetSystemPingRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/ping';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): Result
    {
        return new Result(
            bool: $response->object(key: 'ping') === 'pong',
        );
    }
}
