<?php
class Site extends BaseModel  {
	
	protected $table = 'sites';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT sites.* FROM sites  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE sites.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
