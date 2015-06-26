<?php
class Equipmenttypes extends BaseModel  {
	
	protected $table = 'equipment_types';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT equipment_types.* FROM equipment_types  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE equipment_types.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
