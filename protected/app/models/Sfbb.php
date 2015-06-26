<?php
class Sfbb extends BaseModel  {
	
	protected $table = 'sfbb_log';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}
	public static function querySelect(  ){
		return "  SELECT sfbb_log.*, opening.comments as opening_comments, closing.comments as closing_comments FROM sfbb_log join checks_log opening on sfbb_log.opening_log = opening.id join checks_log closing on sfbb_log.closing_log = closing.id";
	}
	public static function queryWhere(){
		return " WHERE sfbb_log.site_id = ".Session::get('sid')."";
	}
	public static function queryGroup(){
		return "  ";
	}
	

}
