<?php

namespace App\Constants;

class Constant
{
    public const ROLE_ADMIN = 'ADMIN';
    public const ROLE_USER = 'USER';
    public const ROLE_MANAGER = 'MANAGER';
    public const ROLE_EMPLOYEE = 'EMPLOYEE';
    public const ROLE_WAREHOUSESTAFF = 'WAREHOUSESTAFF';

    public const ROLE = [
        self::ROLE_ADMIN,
        self::ROLE_USER,
        self::ROLE_MANAGER,
        self::ROLE_EMPLOYEE,
        self::ROLE_WAREHOUSESTAFF
    ];
}
