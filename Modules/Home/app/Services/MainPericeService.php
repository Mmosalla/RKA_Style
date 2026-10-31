<?php

namespace Modules\Home\Services;

class MainPericeService
{
    public function getPrice($price, $discount)
    {
        $finalPrice = $price - ($price * $discount / 100);

        return $finalPrice;
    }
}
