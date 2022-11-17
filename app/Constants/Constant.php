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
        'admin' => self::ROLE_ADMIN,
        'user' => self::ROLE_USER,
        'manager' => self::ROLE_MANAGER,
        'employee' => self::ROLE_EMPLOYEE,
        'warehousestaff' => self::ROLE_WAREHOUSESTAFF
    ];

    public const MSG_CREATED = 'Tạo mới thành công';
    public const MSG_ERROR = 'Đã có lỗi xảy ra. Vui lòng thử lại';
    public const MSG_OK = 'OK';
    public const MSG_UPDATED = 'Cập nhật thành công';

    public const MSG = [
        'ok' => self::MSG_OK,
        'created' => self::MSG_CREATED,
        'error' => self::MSG_ERROR,
        'updated' => self::MSG_UPDATED
    ];

    public const ERR_CODE_CREATED = 'created';
    public const ERR_CODE_NOT_FOUND = 'notfound';
    public const ERR_CODE_FAILED = 'failed';
    public const ERR_CODE_UPDATED = 'updated';

    public const ERR_CODE = [
        'created' => self::ERR_CODE_CREATED,
        'notfound' => self::ERR_CODE_NOT_FOUND,
        'failed' => self::ERR_CODE_FAILED,
        'updated' => self::ERR_CODE_UPDATED
    ];
}
