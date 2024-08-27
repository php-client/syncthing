<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests\System;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasStringBody;

/**
 * Post with an error message to register a new error.
 *
 * The new error will be displayed on any active GUI clients.
 *
 * @see https://docs.syncthing.net/rest/system-error-post.html  Documentation
 */
final class SystemErrorPostRequest extends Request implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $message,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/rest/system/error';
    }

    protected function defaultBody(): string
    {
        return $this->message;
    }
}
