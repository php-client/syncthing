<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Ldap
{
    public function __construct(
        public Address $address, // todo
        public string $bindOn, // todo
        public string $transport,
        public bool $insecureSkipVerify,
        public string $searchBaseDN, // todo,
        public string $searchFilter, //todo,
    ) {
    }
}
