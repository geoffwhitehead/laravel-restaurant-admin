<?php
class Checktimeperiods extends BaseModel  {
	
	protected $table = 'check_time_periods';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT check_time_periods.* FROM check_time_periods  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE check_time_periods.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
