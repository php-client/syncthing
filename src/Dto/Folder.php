<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Dto;

final readonly class Folder
{
    public function __construct(
        public string $id,
        public string $label,
        public string $filesystemType,
        public string $path,
        public string $type,
        public FolderDevices $devices,
        public int $rescanIntervalS,
        public bool $fsWatcherEnabled,
        public int $fsWatcherDelayS,
        public bool $ignorePerms,
        public bool $authNormalize,
        public MinDiskFree $diskFree,
        public Versioning $versioning,
        public int $copiers,
        public int $pullerMaxPendingKiB,
        public int $hashers,
        public string $order,
        public bool $ignoreDelete,
        public int $scanProgressIntervalS,
        public int $pullerPauseS,
        public int $maxConflicts,
        public bool $disableSparseFiles,
        public bool $disableTempIndexes,
        public bool $paused,
        public int $weakHashThresholdPct,
        public string $markerName,
        public bool $copyOwnershipFromParent,
        public int $modTimeWindowsS,
        public int $maxConcurrentWrites,
        public bool $disableFsync,
        public string $blockPullOrder,
        public string $copyRangerMethod,
        public bool $caseSensitiveFS,
        public bool $junctionsAsDirs,
        public bool $syncOwnership,
        public bool $sendOwnership,
        public bool $syncXattrs,
        public XattrFilter $xattrFilter,
    )
    {
    }
}
