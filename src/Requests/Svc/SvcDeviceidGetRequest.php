<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\Svc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @see https://docs.syncthing.net/rest/svc-deviceid-get.html  Documentation
 */
final class SvcDeviceidGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/svc/deviceid';
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
