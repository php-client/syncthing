<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

use PhpClient\Syncthing\Exceptions\SyncthingException;

final readonly class Devices
{
    /**
     * @throws SyncthingException
     */
    public function __construct(
        public array $items,
    ) {
        foreach ($this->items as $item) {
            if (!$item instanceof Device) {
                throw new SyncthingException(message: 'Items must be an instance of Device');
            }
        }
    }
}
