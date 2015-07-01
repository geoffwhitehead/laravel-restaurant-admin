<?php
class Sfbbmonthly extends BaseModel  {
	
	protected $table = 'sfbb_monthly_log';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT sfbb_monthly_log.* FROM sfbb_monthly_log  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE sfbb_monthly_log.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
