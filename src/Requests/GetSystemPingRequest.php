<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Requests;

use PhpClient\Support\Enums\HttpMethod;

class GetSystemPingRequest extends Request
{

    public function __construct()
    {
        parent::__construct(
            method: HttpMethod::GET,
            uri: 'rest/system/ping',
        );
    }
}
