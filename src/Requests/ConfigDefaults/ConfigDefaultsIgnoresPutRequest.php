<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDefaults;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores  Documentation
 */
final class ConfigDefaultsIgnoresPutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/defaults/ignores';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
