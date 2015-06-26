<?php
class Equipment extends BaseModel  {
	
	protected $table = 'equipment';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT equipment.* FROM equipment  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE equipment.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
