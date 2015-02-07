<?php
class Shiftslog extends BaseModel  {
	
	protected $table = 'shifts_log';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT shifts_log.* FROM shifts_log  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE shifts_log.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
