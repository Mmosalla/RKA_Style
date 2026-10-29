<?php

namespace Modules\Product\Services;

class mainPriceService
{
    public function getPrice($price, $discount)
    {
        $finalPrice = $price - ($price * $discount / 100);

        return $finalPrice;
    }
}
