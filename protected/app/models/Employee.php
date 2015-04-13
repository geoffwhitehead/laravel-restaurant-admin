<?php

class Employee extends BaseModel
{

    protected $table = 'employee_records';
    protected $primaryKey = 'employee_id';

    public function __construct()
    {
        parent::__construct();

    }

    public static function querySelect()
    {

        return "  SELECT employee_records.* FROM employee_records  ";
    }

    public static function queryWhere()
    {
        if (Session::get('gid') == 5) {
            return " WHERE employee_records.employee_id IS NOT NULL and employee_records.default_site = " . Session::get('sid') . "";
        } elseif (Session::get('gid') > 4) {
            return " WHERE employee_records.employee_id =" . Session::get('uid') . "";
        } else {
            return " WHERE employee_records.employee_id IS NOT NULL   ";
        }

    }

    public static function queryGroup()
    {
        return "  ";
    }


}
