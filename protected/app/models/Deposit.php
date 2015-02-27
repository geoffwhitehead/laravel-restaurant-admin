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
		
		return " WHERE deposits.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
