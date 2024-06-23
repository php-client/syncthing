<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class FolderDevice
{
    public function __construct(
        public string $deviceID,
        public string $introducedBy,
        public string $encryptionPassword,
    ) {
    }
}
