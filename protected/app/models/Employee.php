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


        return "  SELECT employee_records.*, usr.active FROM employee_records join tb_users usr on usr.id = employee_records.employee_id ";
    }

    public static function queryWhere()
    {

        if (Session::get('lvl') <= GLOBAL_USER) {
            return " WHERE employee_records.employee_id IS NOT NULL";
        } elseif (Session::get('lvl') == MANAGER) {
            return " WHERE employee_records.default_site = " . Session::get('d_sid') . " and usr.active = 1";
        } else {
            return " WHERE employee_records.employee_id =" . Session::get('uid') . "";
        }
    }

    public static function queryGroup()
    {
        return "  ";
    }


}
