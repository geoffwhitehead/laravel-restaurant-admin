<?php
class Servicecontacts extends BaseModel  {
	
	protected $table = 'service_contacts';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT service_contacts.* FROM service_contacts  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE service_contacts.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
