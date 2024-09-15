<?php
declare(strict_types=1);

namespace App\Entity\Api\Jobs;

class Answer
{
    public int $id;

    public int $user_id;

    public bool $user_email;
}
