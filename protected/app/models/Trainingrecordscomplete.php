<?php
class Trainingrecordscomplete extends BaseModel  {
	
	protected $table = 'training_records_full';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT training_records_full.* FROM training_records_full  ";
	}
	public static function queryWhere(  ){
		
		return "   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
