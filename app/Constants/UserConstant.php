<?php

namespace App\Constants;

class UserConstant
{
    public const ADMIN_VALUE = 0;
    public const MANAGER_VALUE = 1;
    public const EMPLOYEE_VALUE = 2;
    public const WAREHOUSESTAFF_VALUE = 3;
    public const USER_VALUE = 4;

    public const USER_ROLE_VALUE = [
        'admin' => self::ADMIN_VALUE,
        'manager' => self::MANAGER_VALUE,
        'employee' => self::EMPLOYEE_VALUE,
        'warehousestaff' => self::WAREHOUSESTAFF_VALUE,
        'user' => self::USER_VALUE 
    ];
}
