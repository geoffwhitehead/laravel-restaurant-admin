<?php
class Docs extends BaseModel  {
	
	protected $table = 'doc_repo';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT doc_repo.* FROM doc_repo  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE doc_repo.site_id = ".Session::get('sid')." or doc_repo.global = 1";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
