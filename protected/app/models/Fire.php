<?php
class Fire extends BaseModel  {
	
	protected $table = 'checks_log';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT checks_log.* FROM checks_log  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE checks_log.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
