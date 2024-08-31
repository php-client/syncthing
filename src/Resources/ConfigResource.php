<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Config\CheckIfRestartIsRequiredRequest;
use PhpClient\Syncthing\Requests\Config\CreateOrUpdateDeviceRequest;
use PhpClient\Syncthing\Requests\Config\CreateOrUpdateFolderRequest;
use PhpClient\Syncthing\Requests\Config\CreateOrUpdateManyDevicesRequest;
use PhpClient\Syncthing\Requests\Config\CreateOrUpdateManyFoldersRequest;
use PhpClient\Syncthing\Requests\Config\DeleteDeviceRequest;
use PhpClient\Syncthing\Requests\Config\DeleteFolderRequest;
use PhpClient\Syncthing\Requests\Config\GetAllDevicesRequest;
use PhpClient\Syncthing\Requests\Config\GetAllFoldersRequest;
use PhpClient\Syncthing\Requests\Config\GetConfigOptionsRequest;
use PhpClient\Syncthing\Requests\Config\GetDefaultDeviceConfigurationRequest;
use PhpClient\Syncthing\Requests\Config\GetDefaultFolderConfigurationRequest;
use PhpClient\Syncthing\Requests\Config\GetDefaultIgnorePatternsRequest;
use PhpClient\Syncthing\Requests\Config\GetDeviceRequest;
use PhpClient\Syncthing\Requests\Config\GetFolderRequest;
use PhpClient\Syncthing\Requests\Config\GetFullConfigRequest;
use PhpClient\Syncthing\Requests\Config\GetGuiConfigRequest;
use PhpClient\Syncthing\Requests\Config\GetLdapConfigRequest;
use PhpClient\Syncthing\Requests\Config\ReplaceDefaultDeviceConfigurationRequest;
use PhpClient\Syncthing\Requests\Config\ReplaceDefaultFolderConfigurationRequest;
use PhpClient\Syncthing\Requests\Config\ReplaceDefaultIgnorePatternsRequest;
use PhpClient\Syncthing\Requests\Config\ReplacePartOfDefaultDeviceConfigurationRequest;
use PhpClient\Syncthing\Requests\Config\ReplacePartOfDefaultFolderConfigurationRequest;
use PhpClient\Syncthing\Requests\Config\UpdateConfigOptionsPartRequest;
use PhpClient\Syncthing\Requests\Config\UpdateConfigOptionsRequest;
use PhpClient\Syncthing\Requests\Config\UpdateDevicePartRequest;
use PhpClient\Syncthing\Requests\Config\UpdateDeviceRequest;
use PhpClient\Syncthing\Requests\Config\UpdateFolderPartRequest;
use PhpClient\Syncthing\Requests\Config\UpdateFolderRequest;
use PhpClient\Syncthing\Requests\Config\UpdateFullConfig;
use PhpClient\Syncthing\Requests\Config\UpdateGuiConfigPartRequest;
use PhpClient\Syncthing\Requests\Config\UpdateGuiConfigRequest;
use PhpClient\Syncthing\Requests\Config\UpdateLdapConfigPartRequest;
use PhpClient\Syncthing\Requests\Config\UpdateLdapConfigRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints  Documentation
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class ConfigResource extends BaseResource
{
    /**
     * Returns the entire config.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFullConfig(): Response
    {
        return $this->connector->send(
            request: new GetFullConfigRequest(),
        );
    }

    /**
     * Replaces the entire config.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateFullConfig(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateFullConfig(
                data: $data,
            ),
        );
    }

    /**
     * Returns whether a restart of Syncthing is required for the current config to take effect.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-restart-required  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function checkIfRestartIsRequired(): Response
    {
        return $this->connector->send(
            request: new CheckIfRestartIsRequiredRequest(),
        );
    }

    /**
     * Returns all folders as an array.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getAllFolders(): Response
    {
        return $this->connector->send(
            request: new GetAllFoldersRequest(),
        );
    }

    /**
     * Takes a single folder. If a given folder already exists, it’s replaced, otherwise a new one is added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function createOrUpdateFolder(array $data): Response
    {
        return $this->connector->send(
            request: new CreateOrUpdateFolderRequest(
                data: $data,
            ),
        );
    }

    /**
     * Takes an array of folders. If a given folders already exists, they are replaced, otherwise a new ones are added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function createOrUpdateManyFolders(array $data): Response
    {
        return $this->connector->send(
            request: new CreateOrUpdateManyFoldersRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getFolder(string $folder): Response
    {
        return $this->connector->send(
            request: new GetFolderRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Replace config of the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateFolder(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new UpdateFolderRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }

    /**
     * Replace part of config of the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateFolderPart(string $folder, array $data): Response
    {
        return $this->connector->send(
            request: new UpdateFolderPartRequest(
                folder: $folder,
                data: $data,
            ),
        );
    }

    /**
     * Removes the folder for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function deleteFolder(string $folder): Response
    {
        return $this->connector->send(
            request: new DeleteFolderRequest(
                folder: $folder,
            ),
        );
    }

    /**
     * Returns the default folder configuration object with all default values.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDefaultFolderConfiguration(): Response
    {
        return $this->connector->send(
            new GetDefaultFolderConfigurationRequest(),
        );
    }

    /**
     * Replaces the default folder configuration. Omitted values are reset to the hard-coded defaults.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function replaceDefaultFolderConfiguration(array $data): Response
    {
        return $this->connector->send(
            new ReplaceDefaultFolderConfigurationRequest(
                data: $data,
            ),
        );
    }

    /**
     * Replaces part of default folder configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function replacePartOfDefaultFolderConfiguration(array $data): Response
    {
        return $this->connector->send(
            new ReplacePartOfDefaultFolderConfigurationRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns all devices as an array.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getAllDevices(): Response
    {
        return $this->connector->send(
            request: new GetAllDevicesRequest(),
        );
    }

    /**
     * Takes a single device. If a given device already exists, it’s replaced, otherwise a new one is added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function createOrUpdateDevice(array $data): Response
    {
        return $this->connector->send(
            request: new CreateOrUpdateDeviceRequest(
                data: $data,
            ),
        );
    }

    /**
     * Takes an array of devices. If a given devices already exists, they are replaced, otherwise a new ones are added.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-rest-config-devices  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function createOrUpdateManyDevices(array $data): Response
    {
        return $this->connector->send(
            request: new CreateOrUpdateManyDevicesRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDevice(string $device): Response
    {
        return $this->connector->send(
            request: new GetDeviceRequest(
                device: $device,
            ),
        );
    }

    /**
     * Replace config of the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateDevice(string $device, array $data): Response
    {
        return $this->connector->send(
            request: new UpdateDeviceRequest(
                device: $device,
                data: $data,
            ),
        );
    }

    /**
     * Replace part of config of the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateDevicePart(string $device, array $data): Response
    {
        return $this->connector->send(
            request: new UpdateDevicePartRequest(
                device: $device,
                data: $data,
            ),
        );
    }

    /**
     * Removes the device for the given ID.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-folders-id-rest-config-devices-id  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function deleteDevice(string $device): Response
    {
        return $this->connector->send(
            request: new DeleteDeviceRequest(
                device: $device,
            ),
        );
    }

    /**
     * Returns the default device configuration object with all default values.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDefaultDeviceConfiguration(): Response
    {
        return $this->connector->send(
            new GetDefaultDeviceConfigurationRequest(),
        );
    }

    /**
     * Replaces the default device configuration. Omitted values are reset to the hard-coded defaults.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function replaceDefaultDeviceConfiguration(array $data): Response
    {
        return $this->connector->send(
            new ReplaceDefaultDeviceConfigurationRequest(
                data: $data,
            ),
        );
    }

    /**
     * Replaces part of default device configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-folder-rest-config-defaults-device  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function replacePartOfDefaultDeviceConfiguration(array $data): Response
    {
        return $this->connector->send(
            new ReplacePartOfDefaultDeviceConfigurationRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns an object with a single lines attribute listing ignore patterns to be used by default on folders,
     * as an array of single-line strings.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getDefaultIgnorePatterns(): Response
    {
        return $this->connector->send(
            new GetDefaultIgnorePatternsRequest(),
        );
    }

    /**
     * Replaces an object with a single lines attribute listing ignore patterns to be used by default on folders,
     * as an array of single-line strings.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-defaults-ignores  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function replaceDefaultIgnorePatterns(array $data): Response
    {
        return $this->connector->send(
            new ReplaceDefaultIgnorePatternsRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns configuration options.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getConfigOptions(): Response
    {
        return $this->connector->send(
            request: new GetConfigOptionsRequest(),
        );
    }

    /**
     * Replaces configuration options.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateConfigOptions(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateConfigOptionsRequest(
                data: $data,
            ),
        );
    }

    /**
     * Replaces part of configuration options.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateConfigOptionsPart(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateConfigOptionsPartRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns LDAP configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getLdapConfig(): Response
    {
        return $this->connector->send(
            request: new GetLdapConfigRequest(),
        );
    }

    /**
     * Replaces LDAP configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateLdapConfig(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateLdapConfigRequest(
                data: $data,
            ),
        );
    }

    /**
     * Replaces part of LDAP configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateLdapConfigPart(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateLdapConfigPartRequest(
                data: $data,
            ),
        );
    }

    /**
     * Returns GUI configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function getGuiConfig(): Response
    {
        return $this->connector->send(
            request: new GetGuiConfigRequest(),
        );
    }

    /**
     * Replaces GUI configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateGuiConfig(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateGuiConfigRequest(
                data: $data,
            ),
        );
    }

    /**
     * Replaces part of GUI configuration.
     *
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
     *
     * @throws FatalRequestException|RequestException
     */
    public function updateGuiConfigPart(array $data): Response
    {
        return $this->connector->send(
            request: new UpdateGuiConfigPartRequest(
                data: $data,
            ),
        );
    }
}
