<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Events;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;
use function implode;

/**
 * @see https://docs.syncthing.net/rest/events-get.html#get-rest-events-disk  Documentation
 */
final class EventsDiskGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?int $since = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/events/disk';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'since' => $this->since,
        ]);
    }
}
