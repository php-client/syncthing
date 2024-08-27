<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Checks for a possible upgrade and returns an object describing the newest version and upgrade possibility.
 *
 * @see https://docs.syncthing.net/rest/system-upgrade-get.html  Documentation
 */
final class SystemUpgradeGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/upgrade';
    }
}
