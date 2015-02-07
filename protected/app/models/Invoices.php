<?php
class Invoices extends BaseModel  {
	
	protected $table = 'invoices';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT invoices.* FROM invoices  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE invoices.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
