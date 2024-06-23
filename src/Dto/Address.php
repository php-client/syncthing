<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Address
{

    public function __construct(
        public string $value,
    ) {
    }
}
