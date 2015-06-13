<?php
class Procedures extends BaseModel  {
	
	protected $table = 'shifts';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT shifts.* FROM shifts  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE shifts.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
