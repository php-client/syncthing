<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Ignores
{
    public function __construct(
        public array $lines,
    ) {
    }
}
