<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Config\ConfigGetRequest;
use PhpClient\Syncthing\Requests\Config\ConfigGuiGetRequest;
use PhpClient\Syncthing\Requests\Config\ConfigGuiPatchRequest;
use PhpClient\Syncthing\Requests\Config\ConfigGuiPutRequest;
use PhpClient\Syncthing\Requests\Config\ConfigLdapGetRequest;
use PhpClient\Syncthing\Requests\Config\ConfigLdapPatchRequest;
use PhpClient\Syncthing\Requests\Config\ConfigLdapPutRequest;
use PhpClient\Syncthing\Requests\Config\ConfigOptionsGetRequest;
use PhpClient\Syncthing\Requests\Config\ConfigOptionsPatchRequest;
use PhpClient\Syncthing\Requests\Config\ConfigOptionsPutRequest;
use PhpClient\Syncthing\Requests\Config\ConfigPutRequest;
use PhpClient\Syncthing\Requests\Config\ConfigRestartRequiredGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

final class ConfigResource extends BaseResource
{
    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config
     */
    public function get(): Response
    {
        return $this->connector->send(
            request: new ConfigGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config
     */
    public function put(): Response
    {
        return $this->connector->send(
            request: new ConfigPutRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-restart-required
     */
    public function restartRequiredGet(): Response
    {
        return $this->connector->send(
            request: new ConfigRestartRequiredGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function optionsGet(): Response
    {
        return $this->connector->send(
            request: new ConfigOptionsGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function optionsPut(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigOptionsPutRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function optionsPatch(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigOptionsPatchRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function ldapGet(): Response
    {
        return $this->connector->send(
            request: new ConfigLdapGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function ldapPut(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigLdapPutRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function ldapPatch(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigLdapPatchRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function guiGet(): Response
    {
        return $this->connector->send(
            request: new ConfigGuiGetRequest(),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function guiPut(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigGuiPutRequest(
                data: $data,
            ),
        );
    }

    /**
     * @throws FatalRequestException|RequestException
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui
     */
    public function guiPatch(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigGuiPatchRequest(
                data: $data,
            ),
        );
    }
}
