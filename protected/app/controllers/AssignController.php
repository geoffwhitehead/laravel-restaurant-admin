<?php

class AssignController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'assign';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Assign();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'assign',
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
        // Get Query
        $results = $this->model->getRows($params);

        // Build pagination setting
        $page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
        $pagination = Paginator::make($results['rows'], $results['total'], $params['limit']);


        $this->data['rowData'] = $results['rows'];
        // Build Pagination
        $this->data['pagination'] = $pagination;
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
        $this->layout->nest('content', 'assign.index', $this->data)
            ->with('menus', SiteHelpers::menus());
    }


    function getAdd($id = null)
    {

        if ($id == '') {
            if ($this->access['is_add'] == 0)
                return Redirect::to('')->with('message', SiteHelpers::alert('error', Lang::get('core.note_restric')));
        }

        if ($id != '') {
            if ($this->access['is_edit'] == 0)
                return Redirect::to('')->with('message', SiteHelpers::alert('error', Lang::get('core.note_restric')));
        }

        $id = ($id == null ? '' : SiteHelpers::encryptID($id, true));

        $row = $this->model->find($id);
        if ($row) {
            $this->data['row'] = $row;
        } else {
            $this->data['row'] = $this->model->getColumnTable('assigned_to');
        }
        /* Master detail lock key and value */
        if (!is_null(Input::get('md')) && Input::get('md') != '') {
            $filters = explode(" ", Input::get('md'));
            $this->data['row'][$filters[3]] = SiteHelpers::encryptID($filters[4], true);
        }
        /* End Master detail lock key and value */
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['filtermd'] = str_replace(" ", "+", Input::get('md'));
        $this->data['id'] = $id;
        $this->layout->nest('content', 'assign.form', $this->data)->with('menus', $this->menus);
    }

    function getShow($id = null)
    {

        if ($this->access['is_detail'] == 0)
            return Redirect::to('')
                ->with('message', SiteHelpers::alert('error', Lang::get('core.note_restric')));

        $ids = (is_numeric($id) ? $id : SiteHelpers::encryptID($id, true));
        $row = $this->model->getRow($ids);
        if ($row) {
            $this->data['row'] = $row;
        } else {
            $this->data['row'] = $this->model->getColumnTable('assigned_to');
        }
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'assign.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {
        //these tests will check that this is a valid assignment
        $test1 = DB::select("select count(a.id) as ids from assigned_to as a where a.department_id = ? and a.site_id = ? and a.user_id = ? ", array(Input::get('department_id'), Input::get('site_id'), Input::get('user_id')));
        $test2 = DB::select("select count(a.id) as ids from assigned_to as a where a.department_id = ? and a.site_id = ? and a.user_id = ? ", array(1, Input::get('site_id'), Input::get('user_id')));

        //added section here to check that the person hasn't already got this assignment
        if ($test1[0]->ids > 0) {
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('assign/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', "This user already has this assignment"));
        }
        //added section here to check that the person hasn't already got global access to that site.(1 is global access)
        if ($test2[0]->ids > 0) {
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('assign/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', "This user already has global access to this site"));
        }

        // CONTINUE IF THE ABOVE CHECKS PASS AND THE ASSIGNMENT IS VALID ->
        DB::beginTransaction();


        $trackUri = $this->data['trackUri'];
        $rules = $this->validateForm();
        $validator = Validator::make(Input::all(), $rules);


        if ($validator->passes()) {
            $data = $this->validatePost('assigned_to');
            $inputID = Input::get('id');
            if ($inputID == '') {
                $data = $this->model->createStamps($data, $inputID) ;
            }
            $ID = $this->model->insertRow($data, $inputID);

            // Input logs
            if (Input::get('id') == '') {
                $this->inputLogs("New Entry row with ID : $ID  , Has Been Saved Successfully");
                $id = SiteHelpers::encryptID($ID);
            } else {
                $this->inputLogs(" ID : $ID  , Has Been Changed Successfully");
            }

            // CREATING INITIAL TRAINING RECORDS HERE - INSERTS IF DEPARTMENT ID IS THE SAME OR GLOBAL (IE "1")

            //find all the training task id's for this assignment

            //the assignment is global
            if (Input::get('department_id') == 1) {
                $tasks = DB::select("SELECT training_tasks.id FROM training_tasks WHERE training_tasks.site_id = ? AND training_tasks.active = ?", array(Input::get('site_id'), 1));
            } else {
                //the assignment is specific - selects all tasks with matching department, and the global departments.
                $tasks = DB::select("SELECT training_tasks.id FROM training_tasks WHERE training_tasks.site_id = ? AND (training_tasks.department_id = ? OR training_tasks.department_id = ?) AND training_tasks.active = ?", array(Input::get('site_id'), Input::get('department_id'), 1, 1));
            }

            // get a list of my task id's. Use this to chekc against to make sure not to create duplicate tasks.
            $myTasks = DB::select("select t.training_task_id from training_records as t where t.user_id = ?", array(Input::get('user_id')));
            //counter used to monitor duplicate rows

            //loop through and create training records for these tasks
            foreach ($tasks as $task) {
                $i = 0;
                foreach ($myTasks as $myTask) { // for all my tasks check that i dont already have this training task id
                    if ($task->id == $myTask->training_task_id) {
                        $i = 1;
                        break;
                    }
                }
                if ($i == 0) { // no duplicate found
                    //create the training record
                    DB::table('training_records')->insert(array('user_id' => Input::get('user_id'), 'training_task_id' => $task->id, 'created_by' => Auth::id(), 'created_on' => date("Y-m-d H:i:s")));
                }

            }

            //now loop through all task id's and create training records


            DB::commit();
            // Redirect after save
            $md = str_replace(" ", "+", Input::get('md'));
            $redirect = (!is_null(Input::get('apply')) ? 'assign/add/' . $id . '?md=' . $md . $trackUri : 'assign?md=' . $md . $trackUri);
            return Redirect::to($redirect)->with('message', SiteHelpers::alert('success', "Assignment created successfully. This user has been assigned training records for this department"));
        } else {
            DB::rollBack();
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('assign/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')))
                ->withErrors($validator)->withInput();
        }
    }

    public function postDestroy()
    {

        if ($this->access['is_remove'] == 0)
            return Redirect::to('')
                ->with('message', SiteHelpers::alert('error', Lang::get('core.note_restric')));
        // delete multipe rows
        $this->model->destroy(Input::get('id'));
        $this->inputLogs("ID : " . implode(",", Input::get('id')) . "  , Has Been Removed Successfully");
        // redirect
        Session::flash('message', SiteHelpers::alert('success', Lang::get('core.note_success_delete')));
        return Redirect::to('assign?md=' . Input::get('md'));
    }

}