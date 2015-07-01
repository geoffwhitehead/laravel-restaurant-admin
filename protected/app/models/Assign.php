<?php
class Assign extends BaseModel  {
	
	protected $table = 'assigned_to';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT assigned_to.* FROM assigned_to join tb_users u on u.id = assigned_to.user_id ";
	}
	public static function queryWhere(  ){
		if (Session::get('lvl') > 5){
			return " WHERE assigned_to.user_id =".Session::get('uid')." and u.active = 1 and assigned_to.active = 1";
		} elseif(Session::get('lvl') > GLOBAL_USER){
			return " WHERE assigned_to.site_id =".Session::get('sid')." and u.active = 1 and assigned_to.active = 1";
		} else {
			return " WHERE u.active = 1 and assigned_to.active = 1";
		}

	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
