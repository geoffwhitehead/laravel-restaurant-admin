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

		if(Session::get('lvl') > GLOBAL_USER)
		{
			// Page for User Group
			$this->layout->nest('content','dashboard.index', $data);


		} else if( Session::get('lvl') > '1' ) {
			// Page for Administrator Group
        $data['dep_balance'] = DB::select("select sum(deposit_amount) from deposits where site_id = ".Session::get('sid')." and confirmed_used_by is null and active = 1 and no_show_flag = 0");
        $data['last_sale_dep_balance'] = DB::select("select deposit_balance from sales where site_id = ".Session::get('sid')." order by id desc limit 1");



			$this->layout->nest('content','dashboard.index_admin', $data);


		} else {

			// For Superadmin Group
			$this->layout->nest('content','dashboard.index_super', $data);

		}
	}
	public function postChangeSite(){

		Session::put('sid', Input::get('sid'));
		$result = DB::select("select a.department_id,s.address_city, d.name FROM assigned_to a join sites s on s.id = a.site_id join departments d on d.id = a.department_id WHERE a.user_id = ".Session::get('uid')." AND a.site_id = ".Session::get('sid')." limit 1" );
		if($result)
		//$did = DB::select("SELECT a.department_id FROM assigned_to as a WHERE a.user_id = ".Session::get('uid')." AND a.site_id = ".Session::get('sid')." limit 1");
		Session::put('did', $result[0]->department_id);
		Session::put('site', $result[0]->address_city);
		Session::put('dep', $result[0]->name);
        Session::flash('message', SiteHelpers::alert('success', 'Successfully changed site - Department has been defaulted'));
        return json_encode("success");
	}
	public function postChangeDep(){
        $result = DB::select("select d.name FROM departments d WHERE d.id = ".Input::get('did')."");

        Session::put('did', Input::get('did'));
        Session::put('dep', $result[0]->name);

        // redirect
       Session::flash('message', SiteHelpers::alert('success', 'Success'));
        return json_encode("success");
	}
	
}	