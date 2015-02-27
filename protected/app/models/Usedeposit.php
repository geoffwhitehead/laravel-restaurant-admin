<?php
class Usedeposit extends BaseModel  {
	
	protected $table = 'deposits';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT deposits.* FROM deposits  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE deposits.id IS NOT NULL AND used_sale_id IS NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	public static function useDeposit($data){
		$data['confirmed_used_by'] = Auth::id();
		$data['confirmed_used_on'] = date("Y-m-d H:i:s");
		return $data;
	}


}
