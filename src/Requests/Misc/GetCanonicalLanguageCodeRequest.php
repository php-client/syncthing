<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns a list of canonicalized localization codes, as picked up from the Accept-Language header sent by the browser.
 *
 * @see https://docs.syncthing.net/rest/svc-lang-get.html  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class GetCanonicalLanguageCodeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $acceptLanguage,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/svc/lang';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept-Language' => $this->acceptLanguage,
        ];
    }
}
