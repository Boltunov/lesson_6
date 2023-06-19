<?php

declare(strict_types=1);

namespace App\Enums;

enum NewsSources :string
{
    case SITE = 'site';
    case NEWSPAPER = 'newspaper';
    public static function allSources (): array
    {

        return [
            self::SITE->value,
            self::NEWSPAPER->value
        ];
    }
}
