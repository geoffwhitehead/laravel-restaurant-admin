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
        if (Session::get('lvl') <= GLOBAL_USER){
            return "WHERE invoices.id IS NOT NULL";
        }else{
            return "where datediff(curdate(), invoices.created_on) < 2 and invoices.site_id = ".Session::get('sid')." ";
        }


	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
