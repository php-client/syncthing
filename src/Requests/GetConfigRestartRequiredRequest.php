<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests;

use JsonException;
use PhpClient\Keenetic\Exceptions\KeeneticException;
use PhpClient\Syncthing\Dto\Result;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

final class GetConfigRestartRequiredRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/restart-required';
    }

    /**
     * @throws JsonException|KeeneticException
     */
    public function createDtoFromResponse(Response $response): Result
    {
        $requiresRestart = $response->object('requiresRestart')
            ?? throw new KeeneticException('Unexpected response');

        return new Result(bool: $requiresRestart);
    }
}
