<?php
declare(strict_types=1);

namespace App\Enum;

enum ApiStatus: string
{
    case CREATED = 'api.created';

    case EMPTY = 'api.response.null';

    case FOUND = 'api.found';

    case NOT_FOUND = 'api.error.not_found';
}
