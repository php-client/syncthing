<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDefaults;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns an object with a single lines attribute listing ignore patterns to be used by default on folders,
 * as an array of single-line strings.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores  Documentation
 */
final class ConfigDefaultsIgnoresGetRequest extends Request
{
    protected Method $method  = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/config/defaults/ignores';
    }
}
