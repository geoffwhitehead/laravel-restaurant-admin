<?php
class Maintenancelog extends BaseModel  {
	
	protected $table = 'checks_log';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT checks_log.* FROM checks_log join checks on checks.id = checks_log.check_id ";
	}
	public static function queryWhere(  ){
		
		return " WHERE checks.check_category = ".SERVICE." and checks.site_id = ".Session::get('sid')." and checks.active = 1";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
