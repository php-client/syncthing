<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Gui
{
    public function __construct(
        public bool $enabled,
        public Address $address,
        public string $unixSocketPermissions,
        public string $user,
        public string $password,
        public string $authMode,
        public bool $useTLS,
        public string $apiKey,
        public bool $insecureAdminAccess,
        public string $theme,
        public bool $debugging,
        public bool $insecureSkipHostcheck,
        public bool $insecureAllowFrameLoading,
        public bool $sendBasicAuthPrompt,
    ) {
    }
}
