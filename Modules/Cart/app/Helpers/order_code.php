<?php

use Modules\Order\Models\Order;

function generateRandomInteger($length): string
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomInteger = '';
    for ($i = 0; $i < $length; $i++) {
        $randomInteger .= $characters[rand(0, $charactersLength - 1)];
    }
    $codeExist = Order::query()->where('order_code', $randomInteger)->first();
    if ($codeExist) {
        return generateRandomInteger(6);
    }

    return $randomInteger;
}
