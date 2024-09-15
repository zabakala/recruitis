<?php
declare(strict_types=1);

namespace App\Entity\Api\Jobs;

use App\Entity\Job;

class DetailResponse extends MetaData
{
    public Job $payload;
}
