<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Debug;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Summarizes the completion percentage for each remote device.
 *
 * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-peercompletion  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DebugPeercompletionGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/debug/peerCompletion';
    }
}
