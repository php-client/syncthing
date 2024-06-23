<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

use PhpClient\Syncthing\Exceptions\SyncthingException;

final readonly class Folders
{
    /**
     * @throws SyncthingException
     */
    public function __construct(
        public array $items,
    )
    {
        foreach ($this->items as $item) {
            if (!$item instanceof Folder) {
                throw new SyncthingException(message: 'Items must be an instance of Folder');
            }
        }
    }
}
