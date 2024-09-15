<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Job;
use App\Entity\Meta;

interface IPaginatorService
{
    public const PAGE_LIMIT = 24;

    /**
     * @param array<Job> $items
     * @param Meta $meta
     * @param int $limit
     * @return $this
     */
    public function paginate(array $items, Meta $meta, int $limit = self::PAGE_LIMIT): static;
}
