<?php
class Assign extends BaseModel  {
	
	protected $table = 'assigned_to';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT assigned_to.* FROM assigned_to  ";
	}
	public static function queryWhere(  ){
		if (Session::get('gid') > 4){
			return " WHERE assigned_to.id =".Session::get('uid')."";
		} else {
			return " WHERE assigned_to.id IS NOT NULL   ";
		}

	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
