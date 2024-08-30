<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Pause the given device or all devices.
 *
 * @see https://docs.syncthing.net/rest/system-pause-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class SystemPausePostRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly ?string $device = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/pause';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'device' => $this->device,
        ]);
    }
}
