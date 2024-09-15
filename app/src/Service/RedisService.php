<?php
declare(strict_types=1);

namespace App\Service;

use Predis\ClientInterface;
use RedisException;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class RedisService implements IRedisService
{
    private ClientInterface $store;

    public function __construct(
        private readonly string $dsn,
        private readonly int $ttl,
    ) {
        $this->store = RedisAdapter::createConnection($this->dsn);
    }

    public function set(string $key, mixed $value): void
    {
        try {
            $this->store->set($key, $value, 'EX', $this->ttl);
        } catch (RedisException) {
            // handle exception
        }
    }

    public function get(string $key): mixed
    {
        try {
            return $this->store->get($key);
        } catch (RedisException) {
            return null;
        }
    }
}
