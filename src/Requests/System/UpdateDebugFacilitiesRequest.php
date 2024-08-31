<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;
use function implode;

/**
 * Enables or disables debugging for specified facilities.
 *
 * @see https://docs.syncthing.net/rest/system-debug-post.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class UpdateDebugFacilitiesRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly ?array $enable = null,
        private readonly ?array $disable = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/debug';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'enable' => empty($this->enable) ? null : implode(
                separator: ',',
                array: $this->enable,
            ),
            'disable' => empty($this->disable) ? null : implode(
                separator: ',',
                array: $this->disable,
            ),
        ]);
    }
}
