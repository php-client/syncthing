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

/**
 * @see https://docs.syncthing.net/rest/config.html#config-endpoints  Documentation
 */
final class ConfigResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function get(): Response
    {
        return $this->connector->send(
            request: new ConfigGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function put(array $data): Response
    {
        return $this->connector->send(
            request: new ConfigPutRequest(
                data: $data
            ),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-restart-required  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function restartRequiredGet(): Response
    {
        return $this->connector->send(
            request: new ConfigRestartRequiredGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function optionsGet(): Response
    {
        return $this->connector->send(
            request: new ConfigOptionsGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function ldapGet(): Response
    {
        return $this->connector->send(
            request: new ConfigLdapGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function guiGet(): Response
    {
        return $this->connector->send(
            request: new ConfigGuiGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
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
     * @see https://docs.syncthing.net/rest/config.html#rest-config-options-rest-config-ldap-rest-config-gui  Documentation
     *
     * @throws FatalRequestException|RequestException
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
