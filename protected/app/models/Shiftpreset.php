<?php
class Shiftpreset extends BaseModel  {
	
	protected $table = 'shifts_presets';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT shifts_presets.* FROM shifts_presets  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE shifts_presets.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
