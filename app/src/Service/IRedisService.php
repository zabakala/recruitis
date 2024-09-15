<?php
declare(strict_types=1);

namespace App\Service;

interface IRedisService
{
    public function set(string $key, mixed $value): void;

    public function get(string $key): mixed;
}
