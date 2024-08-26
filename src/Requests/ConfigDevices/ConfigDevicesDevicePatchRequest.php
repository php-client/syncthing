<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\ConfigDevices;

use PhpClient\Syncthing\Dto\Addresses;
use PhpClient\Syncthing\Dto\Result;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

use function array_filter;
use function is_null;

final class ConfigDevicesDevicePatchRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly string $deviceId,
        private readonly string|null $name = null,
        private readonly bool|null $untrusted = null,
        private readonly Addresses|null $addresses = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "rest/config/devices/$this->deviceId";
    }

    protected function defaultBody(): array
    {
        return [
            'deviceId' => $this->deviceId,
            ...array_filter(
                array: [
                    'name' => $this->name,
                    'untrusted' => $this->untrusted,
                    'addresses' => $this->addresses?->toArray(),
                ],
                callback: fn($value) => !is_null(value: $value),
            )
        ];
    }

    public function createDtoFromResponse(Response $response): Result
    {
        return new Result(bool: $response->ok());
    }
}
