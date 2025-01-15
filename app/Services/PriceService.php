<?php

namespace App\Services;

class PriceService
{
    public function format($price)
    {
        return '€ ' . number_format($price / 100, 2, ',', '.');
    }
}
