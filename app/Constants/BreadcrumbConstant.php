<?php

namespace App\Constants;

class BreadcrumbConstant
{
    // ADMIN 
    public const ADMINHOME = 'adminhome';
    public const PHONGBAN = 'phongban';
    public const CHUCVU = 'chucvu';
    public const NHANVIEN = 'nhanvien';
    public const THUONGPHAT = 'thuongphat';

    // WAREHOUSE 
    public const NHACUNGCAP = 'nhacungcap';
    public const DANHMUC = 'danhmuc';
    public const SANPHAM = 'sanpham';
    public const NHAPXUAT = 'nhapxuat';
    public const KHO = 'kho';

    public const BREADCRUMB = [
        'adminhome' => self::ADMINHOME,
        'phongban' => self::PHONGBAN,
        'chucvu' => self::CHUCVU,
        'nhanvien' => self::NHANVIEN,
        'thuongphat' => self::THUONGPHAT,
        'nhacungcap' => self::NHACUNGCAP,
        'danhmuc' => self::DANHMUC,
        'sanpham' => self::SANPHAM,
        'nhapxuat' => self::NHAPXUAT,
        'kho' => self::KHO,
    ];
}
