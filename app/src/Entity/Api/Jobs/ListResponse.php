<?php
declare(strict_types=1);

namespace App\Entity\Api\Jobs;

use App\Entity\Job;

class ListResponse extends MetaData
{
    /** @var Job[] */
    public array $payload;
}
