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

        if(Session::get('lvl')>GLOBAL_USER){
            return "where vouchers.used_sale_id is null and vouchers.active = 1";
        }

		return " WHERE vouchers.active = 1";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
