<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns whether a restart of Syncthing is required for the current config to take effect.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-restart-required  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class CheckIfRestartIsRequiredRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/restart-required';
    }
}
