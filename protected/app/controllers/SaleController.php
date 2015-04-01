<?php
class SaleController extends BaseController {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'sale';
	static $per_page	= '10';

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Sale();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'sale',
			'trackUri' 	=> $this->trackUriSegmented()
		);


	}


	public function getIndex()
	{
		if($this->access['is_view'] ==0)
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));

		// Filter sort and order for query 
		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'sale_date');
		$order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null(Input::get('search')) ? $this->buildSearch() : '');
		// End Filter Search for query 

		// Take param master detail if any
		$master  = $this->buildMasterDetail();
		// append to current $filter
		$filter .=  $master['masterFilter'];

		//TODO: get list of sites
		$data['sites'] = DB::table('sites')->get();


		$page = Input::get('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query 
		$results = $this->model->getRows( $params );

		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
		$pagination = Paginator::make($results['rows'], $results['total'],$params['limit']);


		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit'];
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= SiteHelpers::viewColSpan($this->info['config']['grid']);
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		$this->data['masterdetail']  = $this->masterDetailParam();
		$this->data['details']		= $master['masterView'];
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());
		// Render into template
		$this->layout->nest('content','sale.index',$this->data)
			->with('menus', SiteHelpers::menus());

	}


	function getAdd( $id = null)
	{

		if($id =='')
		{
			if($this->access['is_add'] ==0 )
				return Redirect::to('')->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		}

		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
				return Redirect::to('')->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		}

		$id = ($id == null ? '' : SiteHelpers::encryptID($id,true)) ;

		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('sales');
		}
		/* Master detail lock key and value */
		if(!is_null(Input::get('md')) && Input::get('md') !='')
		{
			$filters = explode(" ", Input::get('md') );
			$this->data['row'][$filters[3]] = SiteHelpers::encryptID($filters[4],true);
		}
		/* End Master detail lock key and value */
		$this->data['masterdetail']  = $this->masterDetailParam();
		$this->data['filtermd'] = str_replace(" ","+",Input::get('md'));
		$this->data['id'] = $id;

		//add code for sites here
		$this->data['invoices'] = DB::select('SELECT SUM(amount) AS amt FROM company_invoices WHERE cash_taken = 1 and cash_taken_sale_id IS NULL and site_id = '.Session::get("sid").'');
		$this->data['voucher_sale'] = DB::select('SELECT SUM(amount) AS amt FROM vouchers WHERE used = 1 and sale_id IS NULL and site_used = '.Session::get("sid").'');
		$this->data['voucher_count'] = DB::select('SELECT COUNT(amount) AS amt FROM vouchers WHERE used = 1 and sale_id IS NULL and site_used = '.Session::get("sid").'');
		$this->data['deposit_sale'] = DB::select('SELECT SUM(deposit_amount) AS amt FROM deposits WHERE used = 1 and used_sale_id IS NULL and site_id = '.Session::get("sid").'');
		$this->data['deposit_count'] = DB::select('SELECT COUNT(deposit_amount) AS amt FROM deposits WHERE used = 1 and used_sale_id IS NULL and site_id = '.Session::get("sid").'');
		$this->data['used_invoices'] = DB::select('SELECT id, invoice_date, amount FROM company_invoices WHERE cash_taken = 1 and cash_taken_sale_id IS NULL and site_id = '.Session::get("sid").'');
		$this->data['used_vouchers'] = DB::select('SELECT voucher_ref, date, amount FROM vouchers WHERE used = 1 and sale_id IS NULL and site_used = '.Session::get("sid").'');
		$this->data['used_deposits'] = DB::select('SELECT booking_date_time, booking_name, booking_phone, booking_covers, deposit_amount FROM deposits WHERE used = 1 and used_sale_id IS NULL and site_id = '.Session::get("sid").'');
		$this->data['unused_due_deposits'] = DB::select('SELECT booking_date_time, booking_name, booking_phone, booking_covers, deposit_amount FROM deposits WHERE used = 0 and no_show_flag = 0 and DATE(booking_date_time) < CURDATE() and site_id = '.Session::get("sid").' ORDER BY booking_date_time');
		$this->data['yesterdays_float'] = DB::select('SELECT float_total_amount FROM sales WHERE site_id = '.Session::get("sid").' ORDER BY sale_date DESC LIMIT 1');
		$this->data['sites'] = DB::select('SELECT id, name, address_city FROM sites');

		$this->layout->nest('content','sale.form',$this->data)->with('menus', $this->menus );
	}

	function getShow( $id = null)
	{

		if($this->access['is_detail'] ==0)
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));

		$ids = (is_numeric($id) ? $id : SiteHelpers::encryptID($id,true)  );
		$row = $this->model->getRow($ids);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('sales');
		}

		$this->data['masterdetail']  = $this->masterDetailParam();
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->layout->nest('content','sale.view',$this->data)->with('menus', $this->menus );
	}

	function postSave( $id =0)
	{
		$data['site_id'] = Session::get('sid');
		$trackUri = $this->data['trackUri'];
		$rules = $this->validateForm();
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {
			$data = $this->validatePost('sales');

			$data = $this->model->addTimestamps($data,Input::get('id'));
			$ID = $this->model->insertRow($data , Input::get('id'));

			// assign vouchers to sale here
			DB::update('UPDATE vouchers SET sale_id = '.$ID.' WHERE used = 1 and sale_id IS NULL and site_used = '.Session::get("sid").'');
			// assign deposits to sale here
			DB::update('UPDATE deposits SET used_sale_id = '.$ID.' WHERE used = 1 and used_sale_id IS NULL and site_id = '.Session::get("sid").'');
			// assign cash invoices to sale here
			DB::update('UPDATE company_invoices SET cash_taken_sale_id = '.$ID.' WHERE cash_taken = 1 and cash_taken_sale_id IS NULL and site_id = '.Session::get("sid").'');

			// Input logs
			if( Input::get('id') =='')
			{
				$this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfully");

				$id = SiteHelpers::encryptID($ID);
			} else {
				$this->inputLogs(" ID : $ID  , Has Been Changed Successfully");
			}
			// Redirect after save	
			$md = str_replace(" ","+",Input::get('md'));
			$redirect = (!is_null(Input::get('apply')) ? 'sale/add/'.$id.'?md='.$md.$trackUri :  'sale?md='.$md.$trackUri );
			return Redirect::to($redirect)->with('message', SiteHelpers::alert('success',Lang::get('core.note_success')));
		} else {
			$md = str_replace(" ","+",Input::get('md'));
			return Redirect::to('sale/add/'.$id.'?md='.$md)->with('message', SiteHelpers::alert('error',Lang::get('core.note_error')))
				->withErrors($validator)->withInput();
		}

	}

	public function postDestroy()
	{

		if($this->access['is_remove'] ==0)
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		// delete multipe rows 
		$this->model->destroy(Input::get('id'));
		$this->inputLogs("ID : ".implode(",",Input::get('id'))."  , Has Been Removed Successfully");
		// redirect
		Session::flash('message', SiteHelpers::alert('success',Lang::get('core.note_success_delete')));
		return Redirect::to('sale?md='.Input::get('md'));
	}

}