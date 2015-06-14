<?php
/**
 * Created by PhpStorm.
 * User: geoff_000
 * Date: 13/06/2015
 * Time: 17:18
 */

class Dashboard extends BaseModel  {

    protected $table = 'assigned_to';
    protected $primaryKey = 'id';

    public function __construct() {
        parent::__construct();
    }

    public static function querySelect(  ){

        return "  SELECT assigned_to.* FROM assigned_to ";
    }
    public static function queryWhere(  ){
        return " WHERE assigned_to.user_id = ".Session::get('uid')."";
    }

    public static function queryGroup(){
        return "  ";
    }


}