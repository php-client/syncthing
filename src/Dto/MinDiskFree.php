<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class MinDiskFree
{
    public function __construct(
        public int $value,
        public string $unit,
    ) {
    }
}
