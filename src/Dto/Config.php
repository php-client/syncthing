<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Config
{
    public function __construct(
        public int $version,
        public Folders $folders,
        public Devices $devices,
        public Gui $gui,
        public Ldap $ldap,
        public Options $options,
        public RemoteIgnoredDevices $remoteIgnoredDevices,
        public Defaults $defaults,
    ) {
    }
}
