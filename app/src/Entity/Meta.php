<?php
declare(strict_types=1);

namespace App\Entity;

use App\Enum\ApiStatus;

class Meta
{
    public ApiStatus $code;

    public int $entriesTotal;
}
