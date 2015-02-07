<?php
class Supplieraccounts extends BaseModel  {
	
	protected $table = 'supplier_accounts';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT supplier_accounts.* FROM supplier_accounts  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE supplier_accounts.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
