<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Noauth\GetHealthStatusRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * Returns a health status.
 *
 * @see https://docs.syncthing.net/rest/noauth-health-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class NoauthResource extends BaseResource
{
    /**
     * Returns a health status.
     *
     * @see https://docs.syncthing.net/rest/noauth-health-get.html#get-rest-noauth-health  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getHealthStatus(): Response
    {
        return $this->connector->send(
            request: new GetHealthStatusRequest(),
        );
    }
}
