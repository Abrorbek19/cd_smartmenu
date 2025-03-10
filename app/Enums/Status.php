<?php

namespace App\Enums;

enum Status: int
{

    case  ACTIVE = 100;
    case INACTIVE = 200;


    public static function getList(): array
    {
        return [
            self::ACTIVE->value => "Faol",
            self::INACTIVE->value => "Faol emas",
        ];
    }

    public static function name($result)
    {
        return self::getList()[$result];
    }

}
