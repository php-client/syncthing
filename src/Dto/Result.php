<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Result
{
    public function __construct(
        public bool $bool,
    ) {
    }

    public function isTrue(): bool
    {
        return $this->bool === true;
    }
    public function isFalse(): bool
    {
        return $this->bool === false;
    }
}
