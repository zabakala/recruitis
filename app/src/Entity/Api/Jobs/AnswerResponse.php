<?php
declare(strict_types=1);

namespace App\Entity\Api\Jobs;

class AnswerResponse extends MetaData
{
    public Answer $payload;
}
