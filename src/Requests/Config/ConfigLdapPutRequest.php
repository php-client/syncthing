<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Config;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Replaces LDAP configuration.
 *
 * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
 */
final class ConfigLdapPutRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly array $data,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/config/ldap';
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
