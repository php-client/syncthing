<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Checks for a possible upgrade and returns an object describing the newest version and upgrade possibility.
 *
 * @see https://docs.syncthing.net/rest/system-upgrade-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class CheckUpgradePossibilityRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/system/upgrade';
    }
}
