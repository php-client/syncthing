# Php client for Syncthing API.

This is a PHP client for the [Syncthing API](https://docs.syncthing.net).

## Installation
Install the package via composer:

```bash
composer require php-client/syncthing
```

## Usage

Simple example:
```php
use PhpClient\Syncthing\Syncthing;

$syncthing = new Syncthing(
    baseUrl: 'http://127.0.0.1:8384',
    token: 'YOUR_API_TOKEN',
);

$response = $syncthing->api->config()->getAllDevices();

foreach ($response->json() as $device) {
    echo $device['name'];
}
```

## List of available API methods

- System
  - Get list of directories
  - Get devices info
  - Get|Update debug facilities
  - Get local discovery cache
  - Get|Create|Delete recent errors
  - Get paths
  - Pause|Resume syncing
  - Ping
  - Erase index
  - Get system version|status|log
  - Check upgrade possibility
  - Upgrade
  - Restart|Shutdown
- Config
  - Get|Update full config
  - Check if restart is required
  - Get all folders (or devices)
  - Create|Get|Update|Delete folder or device
  - Get|Replace default folder (or device) configuration
  - Get|Replace default ignore patterns
  - Get|Update config options
  - Get|Update ldap config
  - Get|Update gui config
- Cluster
  - List|Remove records about remote pending folder (or device)
- Folder
  - Get folder errors
  - Get|Restore files versions
- Database
  - Get directory tree
  - Get completion percentage
  - Get file info
  - Get|Update folder ignores
  - Get local changed files
  - Get needed files
  - Override remote folder
  - Force file download priority
  - Get remote needed files
  - Revert local changes
  - Rescan
  - Get folder status
- Events
  - Get events
  - Get disk events
- Statistics
  - Get devices|folders statistics
- Misc
  - Get formatted device ID
  - Get canonical language code
  - Get random string
  - Get usage report data
- Debug
  - Get completion summary
  - Get http metrics
  - Get CPU profile
  - Get heap memory profile
  - Collect debug info
  - Get debug info about file
- No auth
  - Get health status

## License

This package is released under the [MIT License](LICENSE.md).
