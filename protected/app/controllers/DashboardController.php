<?php

class DashboardController extends BaseController  {

	protected $layout = "layouts.main";
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getIndex()
	{
		if(Session::get('gid') > '3')
		{
			// Page for User Group
			$this->layout->nest('content','dashboard.index');


		} else if( Session::get('gid') > '1' ) {
			// Page for Administrator Group
			$this->layout->nest('content','dashboard.index_admin');

		} else {

			// For Superadmin Group
			$this->layout->nest('content','dashboard.index_super');

		}
	}		
	
}	