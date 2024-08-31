<?php

namespace App\Http\Enums;

enum OrderStatus : string
{
    use Enumable;
    case UPCOMING = 'upcoming';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

    public function validationRules()
    {
        $rules = [];
    }

    public function t()
    {
        return match ($this) {
            self::COMING => __('general.coming'),
            self::COMPLETED => __('general.completed'),
            self::CANCELED => __('general.canceled'),
        };
    }
}
