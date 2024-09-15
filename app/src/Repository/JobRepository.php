<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Api\Jobs\AnswerResponse;
use App\Entity\Api\Jobs\DetailResponse;
use App\Entity\Api\Jobs\ListResponse;
use App\Enum\HttpMethod;
use App\Service\IRedisService;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly class JobRepository implements IJobRepository
{
    public function __construct(
        private HttpClientInterface $recruitisApiClient,
        private SerializerInterface $serializer,
        private IRedisService $redisService,
    ) {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getJobs(int $page, int $pageLimit): ListResponse
    {
        return $this->loadJobs($page, $pageLimit);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function getJob(int $id): DetailResponse
    {
        return $this->loadJob($id);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function createJobAnswer(string $payload): AnswerResponse
    {
        return $this->saveJobAnswer($payload);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    private function loadJobs(int $page, int $pageLimit): ListResponse
    {
        $storageKey = sprintf('jobs_%s_%s', $page, $pageLimit);
        $content = $this->redisService->get($storageKey);

        if (!$content) {
            $content = $this->recruitisApiClient
                ->request(HttpMethod::GET->name, '/api2/jobs' .'?'. http_build_query(['page' => $page, 'limit' => $pageLimit]))
                ->getContent();

            $this->redisService->set($storageKey, $content);
        }

        return $this->serializer->deserialize($content, ListResponse::class, 'json');
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    private function loadJob(int $id): DetailResponse
    {
        $storageKey = sprintf('job_%s', $id);
        $content = $this->redisService->get($storageKey);

        if (!$content) {
            $content = $this->recruitisApiClient
                ->request(HttpMethod::GET->name, sprintf('/api2/jobs/%s', $id))
                ->getContent();

            $this->redisService->set($storageKey, $content);
        }

        return $this->serializer->deserialize($content, DetailResponse::class, 'json');
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    private function saveJobAnswer(string $payload): AnswerResponse
    {
        $content = $this->recruitisApiClient
            ->request(HttpMethod::POST->name, '/api2/answers', ['body' => $payload])
            ->getContent();

        return $this->serializer->deserialize($content, AnswerResponse::class, 'json');
    }
}
