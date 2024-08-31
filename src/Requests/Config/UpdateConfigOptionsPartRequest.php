<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Replaces part of configuration options.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class UpdateConfigOptionsPartRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/options';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
