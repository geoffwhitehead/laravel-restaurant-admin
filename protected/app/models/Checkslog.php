<?php

class Checkslog extends BaseModel
{

    protected $table = 'checks_log';
    protected $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();

    }

    public static function querySelect()
    {


        return "  SELECT checks_log.* FROM checks_log  ";
    }

    public static function queryWhere()
    {
        if (Session::get('lvl') > 3) {
            return "where check_log.site_id = " . Session::get('sid') . "";
        } else {
            return " WHERE checks_log.id IS NOT NULL   ";
        }
    }

    public static function queryGroup()
    {
        return "  ";
    }


}
