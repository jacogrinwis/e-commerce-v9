<?php

namespace App\Enums;

enum StockStatus: int
{
    case InStock = 1;
    case OnOrder = 2;
    case OutOfStock = 3;

    public function label(): string
    {
        return match ($this) {
            self::InStock => 'Op voorraad',
            self::OnOrder => 'Op bestelling',
            self::OutOfStock => 'Tijdelijk uitverkocht',
        };
    }
}
