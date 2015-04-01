<?php
class Assign extends BaseModel  {
	
	protected $table = 'assigned_to';
	protected $primaryKey = '';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT assigned_to.* FROM assigned_to  ";
	}
	public static function queryWhere(  ){
		
		return "   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
