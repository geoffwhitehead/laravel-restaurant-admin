<?php

class Deposit extends BaseModel
{

    protected $table = 'deposits';
    protected $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();

    }

    public static function querySelect()
    {


        return "  SELECT deposits.* FROM deposits  ";
    }

    public static function queryWhere()
    {
        if (Session::get('lvl') <= GLOBAL_USER) {
            return " WHERE deposits.site_id = " . Session::get('sid') . "" ;
           // return " WHERE deposits.id IS NOT NULL   ";
        } else {
            return " WHERE deposits.active = 1 AND deposits.site_id = " . Session::get('sid') . "  and deposits.no_show_flag = 0 and used_sale_id is null";
        }
    }

    public
    static function queryGroup()
    {
        return "  ";
    }


}
