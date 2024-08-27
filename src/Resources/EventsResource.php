<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Events\EventsDiskGetRequest;
use PhpClient\Syncthing\Requests\Events\EventsGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/events-get.html
 */
final class EventsResource extends BaseResource
{
    /**
     * Exposing events from the core utility.
     *
     * @see https://docs.syncthing.net/rest/events-get.html#get-rest-events
     *
     * @throws FatalRequestException|RequestException
     */
    public function get(?array $events = null, ?int $since = null): Response
    {
        return $this->connector->send(
            request: new EventsGetRequest(events: $events, since: $since),
        );
    }

    /**
     * Exposing events from the core utility, pre-filtered to show only LocalChangeDetected and RemoteChangeDetected
     * event types.
     *
     * @see https://docs.syncthing.net/rest/events-get.html#get-rest-events-disk
     *
     * @throws FatalRequestException|RequestException
     */
    public function diskGet(?int $since = null): Response
    {
        return $this->connector->send(
            request: new EventsDiskGetRequest(since: $since),
        );
    }
}
