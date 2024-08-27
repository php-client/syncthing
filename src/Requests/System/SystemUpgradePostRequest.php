<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Perform an upgrade to the newest released version and restart.
 *
 * @see https://docs.syncthing.net/rest/system-upgrade-post.html  Documentation
 */
final class SystemUpgradePostRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/rest/system/upgrade';
    }
}
