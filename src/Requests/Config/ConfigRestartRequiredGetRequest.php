<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use JsonException;
use PhpClient\Keenetic\Exceptions\KeeneticException;
use PhpClient\Syncthing\Dto\Result;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Returns whether a restart of Syncthing is required for the current config to take effect.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-restart-required  Documentation
 */
final class ConfigRestartRequiredGetRequest extends Request
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
            ?? throw KeeneticException::unexpectedResponse();

        return new Result(bool: $requiresRestart);
    }
}
