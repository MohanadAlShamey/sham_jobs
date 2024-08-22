<?php

namespace App\Enums;
enum AskTypeEnum: string
{
    case TEXT = 'text';
    case EMAIL = 'email';
    case DATE = 'date';
    case NUMBER = 'number';
    case RADIO = 'radio';
    case CHECKBOX = 'checkbox';
    case FILE = 'file';

    public function getLabel()
    {
        return match ($this) {
            self::TEXT => 'نص',
            self::EMAIL=> 'بريد إلكتروني',
            self::DATE => 'تاريخ',
            self::NUMBER => 'رقم',
            self::RADIO => 'واحد من متعدد',
            self::CHECKBOX=> 'متعدد من متعدد',
            self::FILE => 'ملف',

        };
    }
}
