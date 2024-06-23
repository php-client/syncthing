<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

use PhpClient\Syncthing\Exceptions\SyncthingException;

final readonly class Device
{
    public function __construct(
        public string $deviceID,
        public string $name,
        public Addresses $addresses,
        public string $compression,
        public string $certName,
        public bool $introducer,
        public bool $skipIntroductionRemovals,
        public string $introducedBy,
        public bool $paused,
        public array $allowedNetworks, // todo:
        public bool $autoAcceptFolders,
        public int $maxSendKbps,
        public int $maxRecvKbps,
        public array $ignoredFolders, // todo:
        public int $maxRequestKiB,
        public bool $untrusted,
        public int $remoteGUIPort,
        public int $numConnections,
    ) {
    }

    /**
     * @throws SyncthingException
     */
    public static function fromArray(array $array): Device
    {
//        dd($array['addresses']);
        return new self(
            deviceID: $array['deviceID'],
            name: $array['name'],
            addresses: Addresses::fromArray(array: $array['addresses']),
            compression: $array['compression'],
            certName: $array['certName'],
            introducer: $array['introducer'],
            skipIntroductionRemovals: $array['skipIntroductionRemovals'],
            introducedBy: $array['introducedBy'],
            paused: $array['paused'],
            allowedNetworks: $array['allowedNetworks'],
            autoAcceptFolders: $array['autoAcceptFolders'],
            maxSendKbps: $array['maxSendKbps'],
            maxRecvKbps: $array['maxRecvKbps'],
            ignoredFolders: $array['ignoredFolders'],
            maxRequestKiB: $array['maxRequestKiB'],
            untrusted: $array['untrusted'],
            remoteGUIPort: $array['remoteGUIPort'],
            numConnections: $array['numConnections'],
        );
    }
}
