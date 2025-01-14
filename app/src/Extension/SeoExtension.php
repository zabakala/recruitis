<?php
declare(strict_types=1);

namespace App\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class SeoExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('seo', [$this, 'seo']),
        ];
    }

    public function seo(string $val): string
    {
        return strtolower(preg_replace(['/ /', '/\//', '/,/'], '-', $val));
    }
}
