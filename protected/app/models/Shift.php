<?php
class Shift extends BaseModel  {
	
	protected $table = 'shifts';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT shifts.* FROM shifts  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE shifts.site_id = ".Session::get('sid')." and shifts.department_id = ".Session::get('did')." and shifts.active = 1";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
