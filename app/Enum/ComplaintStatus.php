<?php

namespace App\Enums;

enum ComplaintStatus
{
    case Posted;
    case Validated;
    case Notified;

    public function label(): string
    {
        return match($this) {
            static::Posted => 'Postado',
            static::Validated => 'Validado',
            static::Notified => 'Notified',
        };
    }
}
