<?php
class Jobs extends BaseModel  {
	
	protected $table = 'checks';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return " SELECT checks.*, check_time_periods.id as tpid, check_time_periods.name, check_time_periods.period_in_days, lu.last_completed_on, lu.last_completed_by FROM checks JOIN check_time_periods ON check_time_periods.id = checks.check_frequency JOIN checks_lastupdate as lu ON lu.id = checks.id ";
	}
	public static function queryWhere(  ){
		
		return "WHERE checks.id is not null   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
