<?php

class UsersController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'users';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Users();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'users'
        );


    }

    public function getIndex()
    {
        if ($this->access['is_view'] == 0)
            return Redirect::to('')
                ->with('message', SiteHelpers::alert('error', ' Your are not allowed to access the page '));

        // Filter sort and order for query
        $sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'id');
        $order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
        // End Filter sort and order for query
        // Filter Search for query
        $filter = (!is_null(Input::get('search')) ? $this->buildSearch() : '');
        // End Filter Search for query
        $filter .= " AND id !='1' AND tb_groups.level >= " . Session::get('gid') . "";

        $page = Input::get('page', 1);
        $params = array(
            'page' => $page,
            'limit' => (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'), FILTER_VALIDATE_INT) : static::$per_page),
            'sort' => $sort,
            'order' => $order,
            'params' => $filter
        );
        // Get Query
        $results = $this->model->getRows($params);


        $page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
        $pagination = Paginator::make($results['rows'], $results['total'], $params['limit']);


        $this->data['rowData'] = $results['rows'];
        $this->data['pagination'] = $pagination;
        $this->data['pager'] = $this->injectPaginate();
        $this->data['i'] = ($page * $params['limit']) - $params['limit'];
        $this->data['tableGrid'] = $this->info['config']['grid'];
        $this->data['tableForm'] = $this->info['config']['forms'];
        $this->data['colspan'] = SiteHelpers::viewColSpan($this->info['config']['grid']);
        $this->data['access'] = $this->access;

        $this->layout->nest('content', 'users.index', $this->data)
            ->with('menus', SiteHelpers::menus());
    }

    function getAdd($id = null)
    {

        if ($this->access['is_view'] == 0)
            return Redirect::to('')
                ->with('message', SiteHelpers::alert('error', ' Your are not allowed to access the page '));

        $id = ($id == null ? '' : SiteHelpers::encryptID($id, true));
        $row = $this->model->find($id);
        if ($row) {
            $this->data['row'] = $row;
        } else {
            $this->data['row'] = $this->model->getColumnTable('tb_users');
        }
        $res = DB::table('tb_groups')->where('group_id', Session::get('gid'))->get();
        $res = $res[0];
        $this->data['level'] = $res->level;
        $this->data['id'] = $id;
        $this->data['employment_start'] = DB::select('SELECT employment_start FROM employee_records WHERE employee_id = ' . Session::get('uid' . ''));
        $this->data['companies'] = DB::select('SELECT id, company_name FROM companies WHERE id IS NOT NULL');
        $this->data['sites'] = DB::select('SELECT id, name, address_city FROM sites WHERE id IS NOT NULL');
        $this->data['departments'] = DB::select('SELECT id, name FROM departments WHERE id IS NOT NULL');
        $this->layout->nest('content', 'users.form', $this->data)->with('menus', $this->menus);
    }

    function getShow($id = null)
    {

        if ($this->access['is_detail'] == 0)
            return Redirect::to('')
                ->with('message', SiteHelpers::alert('error', ' Your are not allowed to access the page '));

        $ids = ($id == null ? '' : SiteHelpers::encryptID($id, true));
        $row = $this->model->getRow($ids);
        if ($row) {
            $this->data['row'] = $row;
        } else {
            $this->data['row'] = $this->model->getColumnTable('tb_users');
        }
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'users.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {


        $rules = array(
            'active' => 'required',
            'first_name' => 'required|alpha',
            'first_name' => 'required|alpha',
        );
        if (Input::get('id') == '') {
            $rules['password'] = 'required|alpha_num|between:6,12';
            $rules['password_confirmation'] = 'required|alpha_num|between:6,12';
            $rules['email'] = 'required|email|unique:tb_users';
            $rules['username'] = 'required|alpha_num||min:2|unique:tb_users';
        } else {
            if (Input::get('password') != '') {
                $rules['password'] = 'required|alpha_num|between:6,12';
                $rules['password_confirmation'] = 'required|alpha_num|between:6,12';
            }
        }

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $new_entry = 0;
            DB::beginTransaction();
            $data = $this->validatePost('tb_users');
            if (Input::get('id') == '') {
                $data['password'] = Hash::make(Input::get('password'));
                $new_entry = 1;
            } else {
                if (Input::get('password') != '') {
                    $data['password'] = Hash::make(Input::get('password'));
                }
            }

            $ID = $this->model->insertRow($data, Input::get('id'));
            //if this is a new entry insert then create the appropriate associations
            if ($new_entry == 1) {


                // INSERTING INTO EMPLOYEE RECORDS TABLE HERE
                DB::table('employee_records')->insert(
                    array('employee_id' => $ID, 'first_name' => Input::get('first_name'), 'last_name' => Input::get('last_name'), 'email_address' => Input::get('email'), 'company_id' => Input::get('company_id'), 'default_site' => Input::get('site_id'), 'employment_start' => Input::get('employment_start'), 'default_department' => Input::get('department_id'))
                );

                // INSERTING INITIAL ASSIGNMENT FOR EMPLOYEE HERE
                DB::table('assigned_to')->insert(
                    array('user_id' => $ID, 'site_id' => Input::get('site_id'), 'department_id' => Input::get('department_id'), 'created_by' => Session::get('uid'),)
                );

                // CREATING INITIAL TRAINING RECORDS HERE - INSERTS IF DEPARTMENT ID IS THE SAME OR GLOBAL (IE "1") ALSO CHECK FOR GLOBAL SITE FLAG AND ADD THESE RECORDS IF THE DEP MATCHES.
                if (Input::get('department_id') == 1) {
                    //if the assignment is global
                    $tasks = DB::select("SELECT training_tasks.id FROM training_tasks WHERE (training_tasks.site_id = ? or training_tasks.global_site_flag = ?) AND training_tasks.active = ?", array(Input::get('site_id'), ACTIVE, ACTIVE));
                } else {
                    //if specific, select all with global or matching id
                    $tasks = DB::select("SELECT training_tasks.id FROM training_tasks WHERE (training_tasks.site_id = ? or training_tasks.global_site_flag = ?) AND (training_tasks.department_id = ? OR training_tasks.department_id = ?) AND training_tasks.active = ?", array(Input::get('site_id'), ACTIVE, Input::get('department_id'), GLOBAL_DEP, ACTIVE));
                }
                //now loop through all task id's and create training records
                foreach ($tasks as $task) {
                    DB::table('training_records')->insert(array('user_id' => $ID, 'training_task_id' => $task->id, 'created_by' => Auth::id(), 'created_on' => date("Y-m-d H:i:s")));
                }
            }

            //TODO need to add some code so that a default site and department can be changed.

            DB::commit();
            return Redirect::to('users')->with('message', SiteHelpers::alert('success', 'Data Has Been Saved Successfully'));
        } else {
            DB::rollBack();
            return Redirect::to('users/add/' . $id)->with('message', SiteHelpers::alert('error', 'The following errors occurred'))
                ->withErrors($validator)->withInput();
        }

    }

    public function postDestroy()
    {
        // delete multipe rows
        $data = $this->model->destroy(Input::get('id'));
        // redirect
        Session::flash('message', SiteHelpers::alert('success', 'Successfully deleted row!'));
        return Redirect::to('users');
    }

    public function layout()
    {
        $sites = User::find($id);

        return View::make('user.profile', array('user' => $user));
    }

}