<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Misc\GetCanonicalLanguageCodeRequest;
use PhpClient\Syncthing\Requests\Misc\GetFormattedDeviceIdRequest;
use PhpClient\Syncthing\Requests\Misc\GetRandomString;
use PhpClient\Syncthing\Requests\Misc\GetUsageReportDataRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/dev/rest.html#misc-services-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class MiscResource extends BaseResource
{
    /**
     * Verifies and formats a device ID.
     *
     * @see https://docs.syncthing.net/rest/svc-deviceid-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFormattedDeviceId(string $id): Response
    {
        return $this->connector->send(
            request: new GetFormattedDeviceIdRequest(
                id: $id,
            ),
        );
    }

    /**
     * Returns a list of canonicalized localization codes, as picked up from the Accept-Language header
     * sent by the browser.
     *
     * @see https://docs.syncthing.net/rest/svc-lang-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getCanonicalLanguageCode(string $acceptLanguage): Response
    {
        return $this->connector->send(
            request: new GetCanonicalLanguageCodeRequest(
                acceptLanguage: $acceptLanguage,
            ),
        );
    }

    /**
     * Returns a strong random generated string (alphanumeric) of the specified length.
     *
     * @see https://docs.syncthing.net/rest/svc-random-string-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getRandomSting(int $length): Response
    {
        return $this->connector->send(
            request: new GetRandomString(
                length: $length,
            ),
        );
    }

    /**
     * Returns the data sent in the anonymous usage report.
     *
     * @see https://docs.syncthing.net/rest/svc-report-get.html  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getUsageReportData(): Response
    {
        return $this->connector->send(
            request: new GetUsageReportDataRequest(),
        );
    }
}
