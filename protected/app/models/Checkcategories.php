<?php
class Checkcategories extends BaseModel  {
	
	protected $table = 'check_categories';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT check_categories.* FROM check_categories  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE check_categories.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
