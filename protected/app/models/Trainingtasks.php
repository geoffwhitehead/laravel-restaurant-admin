<?php
class Trainingtasks extends BaseModel  {
	
	protected $table = 'training_tasks';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT training_tasks.* FROM training_tasks  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE (training_tasks.site_id = ".Session::get('sid')." or training_tasks.global_site_flag = 1)";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
