<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class XattrFilter
{
    public function __construct(
        public mixed $entries, //todo
        public int $maxSingleEntrySize,
        public int $maxTotalSize,
    ) {
    }
}
