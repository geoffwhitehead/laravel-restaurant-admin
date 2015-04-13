<?php
class Employee extends BaseModel  {
	
	protected $table = 'employee_records';
	protected $primaryKey = 'employee_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT employee_records.* FROM employee_records  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE employee_records.employee_id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
