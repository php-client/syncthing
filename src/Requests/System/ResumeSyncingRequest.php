<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Resume the given device or all devices.
 *
 * @see https://docs.syncthing.net/rest/system-resume-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ResumeSyncingRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly ?string $device = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/resume';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'device' => $this->device,
        ]);
    }
}
