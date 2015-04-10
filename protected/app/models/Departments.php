<?php
class Departments extends BaseModel  {
	
	protected $table = 'departments';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT departments.* FROM departments  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE departments.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
