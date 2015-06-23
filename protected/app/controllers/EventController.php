<?php
use Illuminate\Http\Response;

class EventController extends BaseController
{
    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'event';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        //$this->beforeFilter('csrf', array('on'=>'post'));
        $this->model = new Shift();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);
        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'event',
            'trackUri' => $this->trackUriSegmented()
        );
    }

    public function getIndex()
    {
        if ($this->access['is_view'] == 0)
            return Redirect::to('')
                ->with('message', SiteHelpers::alert('error', Lang::get('core.note_restric')));

        // Filter sort and order for query
        $sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'id');
        $order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
        // End Filter sort and order for query
        // Filter Search for query
        $filter = (!is_null(Input::get('search')) ? $this->buildSearch() : '');
        // End Filter Search for query

        // Take param master detail if any
        $master = $this->buildMasterDetail();
        // append to current $filter
        $filter .= $master['masterFilter'];


        $page = Input::get('page', 1);
        $params = array(
            'page' => $page,
            'limit' => (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'), FILTER_VALIDATE_INT) : static::$per_page),
            'sort' => $sort,
            'order' => $order,
            'params' => $filter,
            'global' => (isset($this->access['is_global']) ? $this->access['is_global'] : 0)
        );

        // Fetch the site name to display on the page
        $this->data['site'] = DB::table('sites')->where('id', '=', Session::get('sid'))->pluck('address_city');

        // Build pager number and append current param GET
        $this->data['pager'] = $this->injectPaginate();
        // Row grid Number
        $this->data['i'] = ($page * $params['limit']) - $params['limit'];
        // Grid Configuration
        $this->data['tableGrid'] = $this->info['config']['grid'];
        $this->data['tableForm'] = $this->info['config']['forms'];
        $this->data['colspan'] = SiteHelpers::viewColSpan($this->info['config']['grid']);
        // Group users permission
        $this->data['access'] = $this->access;
        // Detail from master if any
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['details'] = $master['masterView'];
        // Master detail link if any
        $this->data['subgrid'] = (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());
        // Render into template
        //add the departments for the selection box

        //check to see if the user has global access to this site
        $global_check = DB::select('SELECT COUNT(department_id) as cnt FROM assigned_to as a WHERE a.user_id = '.Session::get('uid').' and a.site_id = '.Session::get('sid').' AND a.department_id = '.GLOBAL_DEP.'');
        //if the user has global access return all departments
        if($global_check[0]->cnt == 1){
            $this->data['departments'] = DB::select('SELECT d.id, d.name FROM departments as d');
        } else {
            $this->data['departments'] = DB::select('SELECT d.id, d.name FROM departments as d JOIN assigned_to as a ON a.department_id = d.id WHERE a.user_id = '.Session::get('uid').' AND a.site_id = '.Session::get('sid').'');
        }
         $this->layout->nest('content', 'event.index', $this->data)
            ->with('menus', SiteHelpers::menus());
    }

    public function postEdit()
    {
        $data = Input::all();
        if (!isset($data['start']))
            return (new Response("No 'start' parameter defined", 400));
        if (!isset($data['end']))
            return (new Response("No 'end' parameter defined", 400));
        if (!isset($data['id']))
            return (new Response("No 'id' parameter defined (employee id!)", 400));
        try {
            $return = DB::table('shifts')->where('id', $data['id'])
                ->update(array('shift_start' => $data['start'], 'shift_end' => $data['end']));
            return $return;
        } catch (Exception $e) {
            return (new Response("Exception caught: ", 402));
        }
    }

    public function getUsers()
    {
        $result = DB::select("select u.id, u.first_name, u.last_name from tb_users u join assigned_to a on a.user_id = u.id where a.site_id = ".Session::get('sid')." and a.department_id = ".Session::get('did')." and a.active = 1");



 // couldn't get the query builder to work.
        //$result = DB::table('tb_users')
          //  ->select('tb_users.id', 'tb.users.first_name', 'tb_users.last_name')
            //->join('assigned_to', 'tb_users.id',  '=', 'assigned_to.user_id')
         //   ->where('assigned_to.active','=', 1)
         //   ->where('assigned_to.site_id', '=', 1)
          //  ->where('assigned_to.department_id','=',2)
          //  ->get();
        return json_encode($result);



       //return json_encode(DB::table('tb_users')
           // ->join('assigned_to', function ($join) {
           //     $join->on('tb_users.id', '=', 'assigned_to.user_id')
          //          ->where('assigned_to.site_id', '=', Session::get('sid'))
            //        ->where('assigned_to.department_id', '=', 2);
          //  })

    }


    public function postCreate()
    {
        //check to make sure user isnt trying to create shifts with a global selection. Must select a department
        if (Session::get('did') == 1){
            return (new Response("You cannot create shifts with a global department", 402));
        }
        $data = Input::all();
        if (!isset($data['start']))
            return (new Response("No 'start' parameter defined", 400));
        if (!isset($data['end']))
            return (new Response("No 'end' parameter defined", 400));
        if (!isset($data['id']))
            return (new Response("No 'id' parameter defined (employee id!)", 400));
        try {
            $return = DB::table('shifts')->insertGetId(
                [
                    'shift_start' => $data['start'],
                    'shift_end' => $data['end'],
                    'employee_id' => $data['id'],
                    'site_id' => Session::get('sid'),
                    'department_id' => Session::get('did'),
                    'created_by' => Auth::id(),
                    'created_on' => date('Y-m-d h:i:s')
                ]);
            return $return;
        } catch (Exception $e) {
            return (new Response("Exception caught: ", 402));
        }
    }

    public
    function postClock()
    {
        //TODO: finish this JSON method
        $data = Input::all();
    }

    public
    function getList()
    {
        $data = DB::select('SELECT shifts.id, shift_start as start, shift_end as end, manager_conf_flag, admin_conf_flag, paid, tb_users.first_name as title, tb_users.last_name from shifts join tb_users on shifts.employee_id=tb_users.id WHERE shifts.site_id = '.Session::get('sid').' and shifts.department_id = '.Session::get('did').'');

        return json_encode($data);
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