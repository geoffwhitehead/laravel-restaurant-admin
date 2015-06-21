<?php
class Saleedit extends BaseModel  {

	protected $table = 'sales';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){


		return "  SELECT sales.* FROM sales  ";
	}
	public static function queryWhere(  ){

		return " WHERE sale_checked_by is NULL";
	}

	public static function queryGroup(){
		return "  ";
	}


}
