<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Defaults
{
    public function __construct(
        public Folder $folder,
        public Device $device,
        public Ignores $ignores,
    ) {
    }
}
