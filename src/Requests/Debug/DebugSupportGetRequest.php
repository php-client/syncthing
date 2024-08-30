<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Debug;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Collects information about the running instance for troubleshooting purposes.
 *
 * Returns a “support bundle” as a zipped archive, which should be sent to the developers after verifying
 * it contains no sensitive personal information.
 *
 * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-support  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DebugSupportGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/debug/support';
    }
}
