<?php

class TrainingtasksController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'trainingtasks';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Trainingtasks();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'trainingtasks',
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
        $this->layout->nest('content', 'trainingtasks.index', $this->data)
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
            $this->data['row'] = $this->model->getColumnTable('training_tasks');
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
        $this->layout->nest('content', 'trainingtasks.form', $this->data)->with('menus', $this->menus);
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
            $this->data['row'] = $this->model->getColumnTable('training_tasks');
        }
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'trainingtasks.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {
        $trackUri = $this->data['trackUri'];
        $rules = $this->validateForm();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            DB::beginTransaction();
            $data = $this->validatePost('training_tasks');
            //set the timestamps here
            $inputID = Input::get('id');
            // add the site flag separately here
            $data['global_site_flag'] = Input::get('global_site_flag');
            if ($inputID == '') {
                $data = $this->model->createStamps($data, $inputID) ;
            } else {
                $data = $this->model->updateStamps($data, $inputID) ;
            }
            //insert the row
            $ID = $this->model->insertRow($data , $inputID);
            // Input logs
            if (Input::get('id') == '') {

                // CREATING NEW TRAINING RECORD ASSOCIATED RECORDS HERE

                //find all the users that would have to complete this task

                // if the task is flagged as global (for all sites)
                if(Input::get('global_site_flag') == 1){
                    //the training record is global
                    if (Input::get('department_id') == GLOBAL_DEP) {
                        $users = DB::select("SELECT distinct a.user_id FROM assigned_to as a WHERE a.active = ".ACTIVE."");
                    } else {
                        //the assignment is specific - selects all tasks with matching department, and the global departments.
                        $users = DB::select("SELECT distinct a.user_id FROM assigned_to as a WHERE (a.department_id = ? or a.department_id = ?) AND a.active = ?", array(Input::get('department_id'), GLOBAL_DEP, ACTIVE));
                    }
                } else {
                    //the training record is global
                    if (Input::get('department_id') == GLOBAL_DEP) {
                        $users = DB::select("SELECT distinct a.user_id FROM assigned_to as a WHERE a.site_id = ? and a.active = ?", array(Input::get('site_id'), ACTIVE));
                    } else {
                        //the assignment is specific - selects all tasks with matching department, and the global departments.
                        $users = DB::select("SELECT distinct a.user_id FROM assigned_to as a WHERE a.site_id = ? AND (a.department_id = ? or a.department_id = ?) AND a.active = ?", array(Input::get('site_id'), Input::get('department_id'), GLOBAL_DEP, ACTIVE));
                    }
                }


                //loop through and create training records for these tasks
                foreach ($users as $user) {
                    //create the training record
                    DB::table('training_records')->insert(array('user_id' => $user->user_id, 'training_task_id' => $ID, 'created_by' => Auth::id(), 'created_on' => date("Y-m-d H:i:s")));
                }


                $this->inputLogs("New Entry row with ID : $ID  , Has Been Saved Successfully");
                $id = SiteHelpers::encryptID($ID);
            } else {
                $this->inputLogs(" ID : $ID  , Has Been Changed Successfully");
            }
            // Redirect after save
            DB::commit();
            $md = str_replace(" ", "+", Input::get('md'));
            $redirect = (!is_null(Input::get('apply')) ? 'trainingtasks/add/' . $id . '?md=' . $md . $trackUri : 'trainingtasks?md=' . $md . $trackUri);
            return Redirect::to($redirect)->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));
        } else {
            DB::rollBack();
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('trainingtasks/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')))
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
        return Redirect::to('trainingtasks?md=' . Input::get('md'));
    }


}