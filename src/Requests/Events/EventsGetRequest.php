<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Events;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function array_filter;
use function implode;

/**
 * Exposing events from the core utility.
 *
 * @see https://docs.syncthing.net/rest/events-get.html#get-rest-events  Documentation
 */
final class EventsGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?array $events = null,
        private readonly ?int $since = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/events';
    }

    protected function defaultQuery(): array
    {
        return array_filter(array: [
            'events' => empty($this->events) ? null : implode(
                separator: ',',
                array: $this->events,
            ),
            'since' => $this->since,
        ]);
    }
}
