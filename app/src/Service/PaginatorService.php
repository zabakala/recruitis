<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Meta;

final class PaginatorService implements IPaginatorService
{
    public int $total;

    public mixed $items;

    public int $lastPage;

    public function paginate(array $items, Meta $meta, int $limit = self::PAGE_LIMIT): static
    {
        $this->total = $meta->entriesTotal;
        $this->lastPage = (int) ceil($meta->entriesTotal / $limit);
        $this->items = $items;

        return $this;
    }
}
