<?php
class Usevoucher extends BaseModel  {
	
	protected $table = 'vouchers';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT vouchers.* FROM vouchers  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE vouchers.id IS NOT NULL and sale_id IS NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	public static function useVoucher($data){
		$data['date_used'] = date("Y-m-d H:i:s");
		$data['confirmed_used_by'] = Auth::id();
		return $data;
	}
	

}
