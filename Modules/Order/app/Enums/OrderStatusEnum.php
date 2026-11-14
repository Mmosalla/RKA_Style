<?php

namespace Modules\Order\Enums;
enum OrderStatusEnum : string
{
    case Successful = 'successful';
    case Canceled = 'canceled';
    case Draft = 'draft';
}
