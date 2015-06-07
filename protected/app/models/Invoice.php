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

		if (Session::get('gid') <= 3) {
			return " WHERE company_invoices.id IS NOT NULL   ";
		} else{
			return " WHERE company_invoices.id IS NOT NULL AND company_invoices.site_id = ".Session::get('sid')." AND DATEDIFF(NOW(), created_on) <= 2";
		}

	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
