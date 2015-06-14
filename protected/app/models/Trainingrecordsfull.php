<?php
class Trainingrecordsfull extends BaseModel  {
	
	protected $table = 'training_records';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return " SELECT training_records.*, training_tasks.department_id, training_tasks.site_id, training_tasks.task_description FROM training_records JOIN training_tasks ON training_tasks.id = training_records.training_task_id ";
	}
	public static function queryWhere(  ){
		if (Session::get('did') == 1){
            return " WHERE training_tasks.site_id = ".Session::get('sid')."";
        } else {
            return " WHERE training_tasks.site_id = ".Session::get('sid')." AND training_tasks.department_id = ".Session::get('did')."";
        }

	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
