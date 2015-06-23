<?php
class Sfbb extends BaseModel  {
	
	protected $table = 'sfbb_log';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT sfbb_log.* FROM sfbb_log  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE sfbb_log.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
