<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

use PhpClient\Syncthing\Exceptions\SyncthingException;

use function array_map;

final readonly class Addresses
{
    /**
     * @throws SyncthingException
     */
    public function __construct(
        public array $items,
    ) {
        foreach ($this->items as $item) {
            if (!$item instanceof Address) {
                throw new SyncthingException(message: 'Items must be an instance of Address');
            }
        }
    }

    /**
     * @throws SyncthingException
     */
    public static function fromArray(array $array): Addresses
    {
        $items = array_map(
            callback: fn(string $value): Address => new Address(value: $value),
            array: $array,
        );

        return new Addresses(items: $items);
    }

    public function toArray(): array
    {
        return array_map(
            callback: fn(Address $item) => $item->value,
            array: $this->items,
        );
    }
}
