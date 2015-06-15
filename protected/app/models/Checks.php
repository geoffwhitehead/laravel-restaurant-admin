<?php
class Checks extends BaseModel  {
	
	protected $table = 'checks';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT checks.* FROM checks  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE checks.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
