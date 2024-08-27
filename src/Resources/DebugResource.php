<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Debug\DebugCpuprofGetRequest;
use PhpClient\Syncthing\Requests\Debug\DebugFileGetRequest;
use PhpClient\Syncthing\Requests\Debug\DebugHeapprofGetRequest;
use PhpClient\Syncthing\Requests\Debug\DebugHttpmetricsGetRequest;
use PhpClient\Syncthing\Requests\Debug\DebugPeercompletionGetRequest;
use PhpClient\Syncthing\Requests\Debug\DebugSupportGetRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

/**
 * @see https://docs.syncthing.net/rest/debug.html#debug-endpoints  Documentation
 */
final class DebugResource extends BaseResource
{
    /**
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-peercompletion  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function peercompletionGet(): Response
    {
        return $this->connector->send(
            request: new DebugPeercompletionGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-httpmetrics  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function httpmetricsGet(): Response
    {
        return $this->connector->send(
            request: new DebugHttpmetricsGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-cpuprof  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function cpuprofGet(): Response
    {
        return $this->connector->send(
            request: new DebugCpuprofGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-heapprof  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function heapprofGet(): Response
    {
        return $this->connector->send(
            request: new DebugHeapprofGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-support  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function supportGet(): Response
    {
        return $this->connector->send(
            request: new DebugSupportGetRequest(),
        );
    }

    /**
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-file  Documentation
     *
     * @throws FatalRequestException|RequestException
     */
    public function fileGet(string $folder, string $file): Response
    {
        return $this->connector->send(
            request: new DebugFileGetRequest(
                folder: $folder,
                file: $file,
            ),
        );
    }
}
