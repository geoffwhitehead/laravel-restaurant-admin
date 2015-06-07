<?php
class Deposit extends BaseModel  {
	
	protected $table = 'deposits';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT deposits.* FROM deposits  ";
	}
	public static function queryWhere(  ){
		if (Session::get('gid') <= 3) {
			return " WHERE deposits.id IS NOT NULL   ";
		} else{
			return " WHERE deposits.id IS NOT NULL AND deposits.site_id = ".Session::get('sid')."  ";
		}

	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
