<?php

declare(strict_types=1);

namespace PhpClient\Syncthing\Resources;

use PhpClient\Syncthing\Requests\Debug\CollectDebugInfoRequest;
use PhpClient\Syncthing\Requests\Debug\GetCompletionSummaryRequest;
use PhpClient\Syncthing\Requests\Debug\GetCpuProfileRequest;
use PhpClient\Syncthing\Requests\Debug\GetDebugInfoAboutFileRequest;
use PhpClient\Syncthing\Requests\Debug\GetHeapMemoryProfileRequest;
use PhpClient\Syncthing\Requests\Debug\GetHttpMetricsRequest;
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
    public function getCompletionSummary(): Response
    {
        return $this->connector->send(
            request: new GetCompletionSummaryRequest(),
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
    public function getHttpMetrics(): Response
    {
        return $this->connector->send(
            request: new GetHttpMetricsRequest(),
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
    public function getCpuProfile(): Response
    {
        return $this->connector->send(
            request: new GetCpuProfileRequest(),
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
    public function getHeapMemoryProfile(): Response
    {
        return $this->connector->send(
            request: new GetHeapMemoryProfileRequest(),
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
    public function collectDebugInfo(): Response
    {
        return $this->connector->send(
            request: new CollectDebugInfoRequest(),
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
    public function getDebugInfoAboutFile(string $folder, string $file): Response
    {
        return $this->connector->send(
            request: new GetDebugInfoAboutFileRequest(
                folder: $folder,
                file: $file,
            ),
        );
    }
}
