<?php

namespace App\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class NoAccentsExtension extends AbstractExtension
{
    private const ASCII_TRANSLIT = 'ASCII//TRANSLIT';

    public function getFilters(): array
    {
        return [
            new TwigFilter('no_accents', [$this, 'noAccents']),
        ];
    }

    public function noAccents(string $val): string
    {
        return iconv('UTF-8', self::ASCII_TRANSLIT, $val);
    }
}
