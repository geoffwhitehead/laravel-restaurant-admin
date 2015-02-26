<?php
class Invoice extends BaseModel  {
	
	protected $table = 'company_invoices';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT company_invoices.* FROM company_invoices  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE company_invoices.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
