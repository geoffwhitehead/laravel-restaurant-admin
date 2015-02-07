<?php
class Voucher extends BaseModel  {
	
	protected $table = 'vouchers';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT vouchers.* FROM vouchers  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE vouchers.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
