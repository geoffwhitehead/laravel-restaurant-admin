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
        return json_encode(DB::table('tb_users')->select('id', 'first_name', 'last_name')->where('active','=','1')->get());



       //return json_encode(DB::table('tb_users')
           // ->join('assigned_to', function ($join) {
           //     $join->on('tb_users.id', '=', 'assigned_to.user_id')
          //          ->where('assigned_to.site_id', '=', Session::get('sid'))
            //        ->where('assigned_to.department_id', '=', 2);
          //  })

    }


    public function postCreate()
    {
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
        $sid = Session::get('sid');
        $data = DB::select('SELECT shifts.id, shift_start as start, shift_end as end, manager_conf_flag, admin_conf_flag, paid, tb_users.first_name as title, tb_users.last_name from shifts left outer join tb_users on shifts.employee_id=tb_users.id WHERE shifts.site_id = "' . $sid . '"');
        return json_encode($data);
    }
}