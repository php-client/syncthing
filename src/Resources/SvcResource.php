<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Svc\SvcDeviceidGetRequest;
use PhpClient\Syncthing\Requests\Svc\SvcLangGetRequest;
use PhpClient\Syncthing\Requests\Svc\SvcRandomStringGetRequest;
use PhpClient\Syncthing\Requests\Svc\SvcReportGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#misc-services-endpoints  Documentation
 */
final class SvcResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/svc-deviceid-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function deviceidGet(string $id): Response
    {
        return $this->connector->send(
            request: new SvcDeviceidGetRequest(
                id: $id,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/svc-lang-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function langGet(string $acceptLanguage): Response
    {
        return $this->connector->send(
            request: new SvcLangGetRequest(
                acceptLanguage: $acceptLanguage,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/svc-random-string-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function randomStringGet(int $length): Response
    {
        return $this->connector->send(
            request: new SvcRandomStringGetRequest(
                length: $length,
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/svc-report-get.html  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function reportGet(): Response
    {
        return $this->connector->send(
            request: new SvcReportGetRequest(),
        );
    }
}
