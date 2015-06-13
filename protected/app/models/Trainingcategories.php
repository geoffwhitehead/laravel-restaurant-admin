<?php
class Trainingcategories extends BaseModel  {
	
	protected $table = 'training_categories';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT training_categories.* FROM training_categories  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE training_categories.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
