<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use DateTimeInterface;
use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * @see https://docs.syncthing.net/rest/system-log-get.html#get-rest-system-log-txt  Documentation
 */
final class SystemLogTxtGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?DateTimeInterface $since = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/log.txt';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'since' => $this->since?->format(DateTimeInterface::RFC3339_EXTENDED),
        ]);
    }
}
