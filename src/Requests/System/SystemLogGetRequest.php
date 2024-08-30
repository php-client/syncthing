<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use DateTimeInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Returns the list of recent log entries.
 *
 * @see https://docs.syncthing.net/rest/system-log-get.html#get-rest-system-log  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class SystemLogGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?DateTimeInterface $since = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/log';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'since' => $this->since?->format(DateTimeInterface::RFC3339_EXTENDED),
        ]);
    }
}
