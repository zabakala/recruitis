<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Api\Jobs\AnswerResponse;
use App\Entity\Api\Jobs\DetailResponse;
use App\Entity\Api\Jobs\ListResponse;

interface IJobRepository
{
    public function getJobs(int $page, int $pageLimit): ListResponse;

    public function getJob(int $id): DetailResponse;

    public function createJobAnswer(string $payload): AnswerResponse;
}
