<?php

namespace App\Tests\Controller;

use App\Service\RedisService;
use App\Tests\TestData\RecruitisApi;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Container;

class DetailControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    private Container $container;

    private RedisService & MockObject $redisService;

    function setUp(): void
    {
        $this->client = static::createClient();
        $this->container = static::getContainer();
        $this->redisService = $this->createMock(RedisService::class);
    }

    public function testOkState(): void
    {
        $this->redisService->expects(self::once())
            ->method('get')
            ->willReturn(RecruitisApi::mockOkJob());

        $this->container->set(RedisService::class, $this->redisService);
        $crawler = $this->client->request('GET', '/job/1/job-offer');

        self::assertResponseIsSuccessful();
        self::assertCount(1, $crawler->filter('#job-detail'));
        self::assertStringContainsString('T-Mobile a Slovak Telekom', $crawler->filter('#job-detail')->attr('data-job'));
    }

    public function testNokState(): void
    {
        $this->redisService->expects(self::once())
            ->method('get')
            ->willThrowException(new Exception);

        $this->container->set(RedisService::class, $this->redisService);
        $crawler = $this->client->request('GET', '/job/1/job-offer');

        self::assertSelectorTextContains('H1', 'Page not found');
        self::assertSelectorTextContains('p a', 'return to the homepage');
        self::assertCount(1, $crawler->filter('#page-not-found'));
    }
}
