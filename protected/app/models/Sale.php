<?php

class Sale extends BaseModel
{

    protected $table = 'sales';
    protected $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();

    }

    public static function querySelect()
    {

        return "  SELECT sales.* FROM sales  ";
    }

    public static function queryWhere()
    {
        if (Session::get('lvl') > GLOBAL_USER) {

            return "where datediff(curdate(), sales.sale_date) < 3 and sales.site_id = ".Session::get('sid')."";
        } else {
            //return " WHERE sales.id IS NOT NULL";
            return "where sales.site_id = ".Session::get('sid')."";
        }
    }

    public static function queryGroup()
    {
        return "  ";
    }
}