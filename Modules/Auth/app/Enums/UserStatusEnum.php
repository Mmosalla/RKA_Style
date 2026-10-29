<?php

namespace Modules\Auth\Enums;

enum UserStatusEnum : string
{
case ACTIVE = 'active';
case INACTIVE = 'inactive';
case Banned = 'banned';
}
