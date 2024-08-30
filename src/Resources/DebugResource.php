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
 * @version Relevant for 2024-08-28, API v1.27.10
 */
final class DebugResource extends BaseResource
{
    /**
     * Summarizes the completion percentage for each remote device.
     *
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-peercompletion  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Returns statistics about each served REST API endpoint, to diagnose how much time was spent generating
     * the responses.
     *
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-httpmetrics  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Used to capture a profile of what Syncthing is doing on the CPU.
     *
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-cpuprof  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Used to capture a profile of what Syncthing is doing with the heap memory.
     *
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-heapprof  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Collects information about the running instance for troubleshooting purposes.
     *
     * Returns a “support bundle” as a zipped archive, which should be sent to the developers after verifying
     * it contains no sensitive personal information.
     *
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-support  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
     * Shows diagnostics about a certain file in a shared folder.
     *
     * @see https://docs.syncthing.net/rest/debug.html#get-rest-debug-file  Documentation
     * @version Relevant for 2024-08-28, API v1.27.10
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
