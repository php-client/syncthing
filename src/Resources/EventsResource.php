<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Events\GetDiskEventsRequest;
use PhpClient\Syncthing\Requests\Events\GetEvents;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/events-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class EventsResource extends BaseResource
{
    /**
     * Exposing events from the core utility.
     *
     * @see https://docs.syncthing.net/rest/events-get.html#get-rest-events  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getEvents(?array $events = null, ?int $since = null): Response
    {
        return $this->connector->send(
            request: new GetEvents(events: $events, since: $since),
        );
    }

    /**
     * Exposing events from the core utility, pre-filtered to show only LocalChangeDetected and RemoteChangeDetected
     * event types.
     *
     * @see https://docs.syncthing.net/rest/events-get.html#get-rest-events-disk  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDiskEvents(?int $since = null): Response
    {
        return $this->connector->send(
            request: new GetDiskEventsRequest(since: $since),
        );
    }
}
