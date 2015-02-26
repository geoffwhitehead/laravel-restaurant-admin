<?php
class Supplier extends BaseModel  {
	
	protected $table = 'suppliers';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT suppliers.* FROM suppliers  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE suppliers.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
