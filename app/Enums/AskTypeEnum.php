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

}
