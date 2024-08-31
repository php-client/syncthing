<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns the data sent in the anonymous usage report.
 *
 * @see https://docs.syncthing.net/rest/svc-report-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetUsageReportDataRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/svc/report';
    }
}
