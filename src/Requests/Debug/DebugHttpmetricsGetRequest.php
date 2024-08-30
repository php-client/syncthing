<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Debug;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns statistics about each served REST API endpoint, to diagnose how much time was spent generating the responses.
 *
 * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-httpmetrics  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DebugHttpmetricsGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/debug/httpmetrics';
    }
}
