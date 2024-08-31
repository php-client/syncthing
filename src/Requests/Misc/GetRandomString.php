<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns a strong random generated string (alphanumeric) of the specified length.
 *
 * @see https://docs.syncthing.net/rest/svc-random-string-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetRandomString extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $length,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/svc/random/string';
    }

    protected function defaultQuery(): array
    {
        return [
            'length' => $this->length,
        ];
    }
}
