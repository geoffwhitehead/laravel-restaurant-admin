<?php
class Paymentmethods extends BaseModel  {
	
	protected $table = 'payment_methods';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT payment_methods.* FROM payment_methods  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE payment_methods.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
