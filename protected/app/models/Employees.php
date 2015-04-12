<?php

class Employees extends BaseModel
{

    protected $table = 'tb_users';
    protected $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();

    }

    public static function querySelect()
    {


        return "  SELECT tb_users.* FROM tb_users  ";
    }

    public static function queryWhere()
    {

        if (Session::get('gid') > 4) {
			return "WHERE tb_users.id = ".Session::get('uid')."";
        } else {
            return " WHERE tb_users.id IS NOT NULL   ";
        }

    }

    public static function queryGroup()
    {
        return "  ";
    }


}
