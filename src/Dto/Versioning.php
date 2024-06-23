<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Versioning
{
    public function __construct(
        public string $type,
        public mixed $params, // todo
        public int $cleanupIntervalS,
        public string $fsPath,
        public string $fsType,
    ) {
    }
}
