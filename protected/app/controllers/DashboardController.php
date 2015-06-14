<?php

class DashboardController extends BaseController  {

	protected $layout = "layouts.main";
	
	public function __construct() {
		parent::__construct();
		$this->model = new Dashboard();
	}
	
	public function getIndex()
	{

		$data = array(
			'sites' => DB::select('SELECT distinct s.id, s.name, s.address_city FROM sites as s JOIN assigned_to as a ON a.site_id = s.id WHERE a.user_id = '.Session::get('uid').''),
			'departments' => DB::select('SELECT d.id, d.name FROM departments as d JOIN assigned_to as a ON a.department_id = d.id WHERE a.user_id = '.Session::get('uid').' AND a.site_id = '.Session::get('sid').'')
		);

		if(Session::get('lvl') > '3')
		{
			// Page for User Group
			$this->layout->nest('content','dashboard.index', $data);


		} else if( Session::get('lvl') > '1' ) {
			// Page for Administrator Group
			$this->layout->nest('content','dashboard.index_admin', $data);

		} else {

			// For Superadmin Group
			$this->layout->nest('content','dashboard.index_super', $data);

		}
	}
	public function postChangeSite(){
		Session::put('sid', Input::get('sid'));
		$did = DB::select("SELECT a.department_id FROM assigned_to as a WHERE a.user_id = ".Session::get('uid')." AND a.site_id = ".Session::get('sid')." limit 1");
		Session::put('did', $did[0]->department_id);
		Session::flash('message', SiteHelpers::alert('success', "success"));
		return json_encode(Redirect::back()->with('message', 'Site changed - Department defaulted'));
	}
	public function postChangeDep(){
		Session::put('did', Input::get('did'));
		Session::flash('message', SiteHelpers::alert('success', "success"));
		Session::flash('message', SiteHelpers::alert('success', "success"));
		return json_encode(Redirect::back()->with('message', 'Department changed'));
	}
	
}	