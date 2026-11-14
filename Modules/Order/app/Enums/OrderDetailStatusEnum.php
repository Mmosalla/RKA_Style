<?php

namespace Modules\Order\Enums;
enum OrderDetailStatusEnum:string
{
    case Send = 'send';
    case Received = 'received';
    case Rejected = 'rejected';
    case InProgress = 'in_progress';
}
