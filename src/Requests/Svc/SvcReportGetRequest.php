<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Svc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/svc-report-get.html  Documentation
 */
final class SvcReportGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/rest/svc/report';
    }
}
