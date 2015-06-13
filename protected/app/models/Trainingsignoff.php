<?php
class Trainingsignoff extends BaseModel  {
	
	protected $table = 'training_records';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT training_records.* FROM training_records  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE training_records.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
