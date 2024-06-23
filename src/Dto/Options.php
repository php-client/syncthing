<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Options
{
    public function __construct(
        public Addresses $listenAddresses,
        public Addresses $globalAnnounceServers,
        public bool $globalAnnounceEnabled,
        public bool $localAnnounceEnabled,
        public int $localAnnouncePort,
        public string $localAnnounceMCAddr,
        public int $maxSendKbps,
        public int $maxRecvKbps,
        public int $reconnectionIntervalsS,
        public bool $relaysEnabled,
        public int $relayReconnectIntervalM,
        public bool $startBrowser,
        public bool $natEnabled,
        public int $natLeaseMinutes,
        public int $natRenewalMinutes,
        public int $natTimeoutSeconds,
        public int $urAccepted,
        public int $urSeen,
        public string $urUniqueId,
        public string $urURL,
        public bool $urPostInsecurely,
        public int $urInitialDelayS,
        public int $autoUpgradeIntervalH,
        public bool $upgradeToPreReleases,
        public int $keepTemporariesH,
        public bool $cacheIgnoredFiles,
        public int $progressUpdateIntervalS,
        public bool $limitBandwidthInLan,
        public MinDiskFree $minDiskFree,
        public string $releasesURL,
        public array $alwaysLocalNets, //todo
        public bool $overwriteRemoteDeviceNamesOnConnect,
        public int $tempIndexMinBlocks,
        public array $unackedNotificationIDs, // todo
        public int $trafficClass,
        public bool $setLowPriority,
        public int $maxFolderConcurrency,
        public string $crURL, // todo
        public bool $crashReportingEnabled,
        public int $stunKeepaliveStartS,
        public int $stunKeepaliveMinS,
        public Addresses $stunServers, // todo
        public string $databaseTuning,
        public int $maxConcurrentIncomingRequestKib,
        public bool $announceLANAddresses,
        public bool $sendFullIndexOnUpgrade,
        public array $featureFlags, // todo
        public int $connectionLimitEnough,
        public int $connectionLimitMax,
        public bool $insecureAllowOldTLSVersions,
        public int $connectionPriorityTcpLan,
        public int $connectionPriorityQuicLan,
        public int $connectionPriorityTcpWan,
        public int $connectionPriorityQuicWan,
        public int $connectionPriorityRelay,
        public int $connectionPriorityUpgradeThreshold,
    ) {
    }
}
