<?php
class Companies extends BaseModel  {
	
	protected $table = 'companies';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT companies.* FROM companies  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE companies.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
