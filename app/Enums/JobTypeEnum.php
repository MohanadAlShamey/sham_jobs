<?php

namespace App\Enums;
enum JobTypeEnum: string
{
    case BOTH = 'text';
    case MANAGER = 'manager';
    case SERVICE = 'service';


    public function getLabel()
    {
        return match ($this) {
            self::BOTH => 'للكل',
            self::MANAGER=> 'إداري',
            self::SERVICE => 'خدمي',


        };
    }
}
