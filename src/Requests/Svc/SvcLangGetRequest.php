<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Svc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/svc-lang-get.html  Documentation
 */
final class SvcLangGetRequest extends Request
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
