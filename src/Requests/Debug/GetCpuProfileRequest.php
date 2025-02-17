<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Debug;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Used to capture a profile of what Syncthing is doing on the CPU.
 *
 * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-cpuprof  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetCpuProfileRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/debug/cpuprof';
    }
}
