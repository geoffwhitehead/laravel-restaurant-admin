<?php
class Trainingrecords extends BaseModel  {
	
	protected $table = 'training_records';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return " SELECT training_records.*, training_tasks.department_id, training_tasks.site_id, training_tasks.task_description FROM training_records JOIN training_tasks ON training_tasks.id = training_records.training_task_id ";
	}
	public static function queryWhere(  ){
		
		return " WHERE training_records.user_id = " . Session::get('uid') . "";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
