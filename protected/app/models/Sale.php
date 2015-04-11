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
        if (Session::get('gid') > 2) {
            return "WHERE id = (select max(id) from sales where site_id = ".Session::get("sid").")";
        } else {
            return " WHERE sales.id IS NOT NULL   ";
        }
    }

    public static function queryGroup()
    {
        return "  ";
    }
}