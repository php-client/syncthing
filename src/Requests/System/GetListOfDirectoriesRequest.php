<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;

/**
 * Returns a list of directories matching the path given by the optional parameter current.
 *
 * If the option current is not given, filesystem root paths are returned.
 *
 * @see https://docs.syncthing.net/rest/system-browse-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetListOfDirectoriesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?string $current = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/browse';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'current' => $this->current,
        ]);
    }
}
