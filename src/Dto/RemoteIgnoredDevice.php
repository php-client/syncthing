<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

use DateTimeImmutable;

final readonly class RemoteIgnoredDevice
{
    public function __construct(
        public DateTimeImmutable $time,
        public string $deviceID,
        public string $name,
        public Address $address, // todo
    ) {
    }
}
