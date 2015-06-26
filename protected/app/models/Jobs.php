<?php
class Jobs extends BaseModel  {
	
	protected $table = 'checks';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return " SELECT checks.*, check_time_periods.id as tpid, check_time_periods.name, check_time_periods.period_in_days as freq, lu.last_completed_on, lu.last_completed_by, lu.datediff FROM checks JOIN check_time_periods ON check_time_periods.id = checks.check_frequency JOIN checks_lastupdate as lu ON lu.id = checks.id ";
	}
	public static function queryWhere(  ){
		if (Session::get('did') == GLOBAL_DEP){
            return "WHERE checks.site_id = ".Session::get('sid')."";
        } else {
            return "WHERE checks.site_id = ".Session::get('sid')." and checks.department_id = ".Session::get('did')."";
        }

	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
