<?php

namespace App\Constants;

class AdminConstant
{
    public const TABLE_NAME = 'admin_companies';

    public const COLUMN_COMPANY_NAME = 'company_name';
    public const COLUMN_ADMIN_CHIEF_NAME = 'admin_chief_name';
    public const COLUMN_ADMIN_EMAIL = 'admin_email';
    public const COLUMN_ADMIN_PHONE = 'admin_phone';
    public const COLUMN_MEMO = 'memo';
    public const COLUMN_CONTRACT_START_AT = 'contract_start_at';
    public const COLUMN_CONTRACT_END_AT = 'contract_end_at';
    public const COLUMN_EVENT_LIMIT = 'event_limit';
    public const COLUMN_ENTRY_LIMIT = 'entry_limit';
    public const COLUMN_MAIL_LIMIT = 'mail_limit';

    public const COLUMN_SUBDOMAIN = 'subdomain';
    public const COLUMN_FREE_PLAN_USED_FLAG = 'free_plan_used_flag';
    public const COLUMN_REGISTRATION_LIMIT = 'registration_limit';
    public const COLUMN_BROADCAST_TIME_LIMIT = 'broadcast_time_limit';


    public const SELECT_COLUMNS = [
        self::COLUMN_COMPANY_NAME,
        self::COLUMN_ADMIN_EMAIL,
        self::COLUMN_ADMIN_PHONE,
        self::COLUMN_MEMO,
        self::COLUMN_CONTRACT_START_AT,
        self::COLUMN_CONTRACT_END_AT,
        self::COLUMN_EVENT_LIMIT,
        self::COLUMN_ENTRY_LIMIT,
        self::COLUMN_MAIL_LIMIT
    ];

    public const SELECT_COLUMNS_LIST = [
        COLUMN_ID,
        self::COLUMN_COMPANY_NAME,
        self::COLUMN_ADMIN_EMAIL,
        self::COLUMN_ADMIN_PHONE,
        self::COLUMN_MEMO,
        self::COLUMN_CONTRACT_START_AT,
        self::COLUMN_CONTRACT_END_AT,
        self::COLUMN_EVENT_LIMIT,
        self::COLUMN_ENTRY_LIMIT,
        self::COLUMN_MAIL_LIMIT

    ];

    public const SELECT_COLUMNS_DETAIL = [
        COLUMN_ID,
        self::COLUMN_COMPANY_NAME,
        self::COLUMN_ADMIN_EMAIL,
        self::COLUMN_ADMIN_PHONE,
        self::COLUMN_MEMO,
        self::COLUMN_CONTRACT_START_AT,
        self::COLUMN_CONTRACT_END_AT,
        self::COLUMN_EVENT_LIMIT,
        self::COLUMN_ENTRY_LIMIT,
        self::COLUMN_MAIL_LIMIT
    ];

    public const DATE_TIME_COLUMNS = [
        self::COLUMN_CONTRACT_START_AT,
        self::COLUMN_CONTRACT_END_AT,
    ];

    public const INPUT_ADMIN_COMPANY = 'input_admin_company';

    public const KEY_ADMIN_COMPANY = 'admin_company';
    public const KEY_ADMIN_COMPANIES = 'admin_companies';
    public const KEY_COMPANY_NAME = 'company_name';
    public const KEY_ADMIN_CHIEF_NAME = 'admin_chief_name';
    public const KEY_ADMIN_EMAIL = 'admin_email';
    public const KEY_ADMIN_PHONE = 'admin_phone';
    public const KEY_MEMO = 'memo';
    public const KEY_RETURN_COMPANIES = 'adminCompanies';
    public const KEY_EVENT_LIMIT = 'event_limit';
    public const KEY_ENTRY_LIMIT = 'entry_limit';
    public const KEY_MAIL_LIMIT = 'mail_limit';
    public const KEY_CONTRACT_START_AT = 'contract_start_at';
    public const KEY_CONTRACT_END_AT = 'contract_end_at';
    public const KEY_REGISTERS = 'registers';
    public const KEY_EVENTS = 'events';
    public const KEY_MAIL_SEND = 'mail_send';

    public const KEY_ADMIN_PHONE_A = 'admin_phone_a';
    public const KEY_ADMIN_PHONE_E = 'admin_phone_e';
    public const KEY_ADMIN_PHONE_N = 'admin_phone_n';
    public const NUMBER_OF_ADMIN_PHONE_A = 3;
    public const NUMBER_OF_ADMIN_PHONE_E = 4;
    public const NUMBER_OF_ADMIN_PHONE_N = 4;

    public const ROUTE_LIST = self::KEY_ADMIN_COMPANY . '.list';
    public const ROUTE_DETAIL = self::KEY_ADMIN_COMPANY . '.detail';
    public const ROUTE_VIEW_CREATE = self::KEY_ADMIN_COMPANY . '.view_create';
    public const ROUTE_CREATE_CONFIRM = self::KEY_ADMIN_COMPANY . '.create_confirm';
    public const ROUTE_CREATE = self::KEY_ADMIN_COMPANY . '.create';
    public const ROUTE_VIEW_EDIT = self::KEY_ADMIN_COMPANY . '.view_edit';
    public const ROUTE_EDIT_CONFIRM = self::KEY_ADMIN_COMPANY . '.edit_confirm';
    public const ROUTE_EDIT = self::KEY_ADMIN_COMPANY . '.edit';
    public const ROUTE_EXECUTE_SUCCESS = self::KEY_ADMIN_COMPANY . '.execute_success';
    public const ROUTE_COMPANY_MANAGEMENT = [
        self::ROUTE_LIST,
        self::ROUTE_DETAIL,
        self::ROUTE_VIEW_CREATE,
        self::ROUTE_CREATE_CONFIRM,
        self::ROUTE_CREATE,
        self::ROUTE_VIEW_EDIT,
        self::ROUTE_EDIT_CONFIRM,
        self::ROUTE_EDIT,
        self::ROUTE_EXECUTE_SUCCESS
    ];

    public const ROUTE_CREATE_LIST = [
        self::ROUTE_VIEW_CREATE,
        self::ROUTE_CREATE_CONFIRM,
        self::ROUTE_CREATE
    ];

    public const ROUTE_EDIT_LIST = [
        self::ROUTE_VIEW_EDIT,
        self::ROUTE_EDIT_CONFIRM,
        self::ROUTE_EDIT
    ];
}
