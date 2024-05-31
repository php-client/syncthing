<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Responses;

class GetSystemPingResponse extends Response
{
    public function isSuccess(): bool
    {
        return parent::isSuccess() && $this->decodedContent()->ping === 'pong';
    }
}
