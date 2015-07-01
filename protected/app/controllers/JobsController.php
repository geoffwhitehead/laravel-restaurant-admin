<?php

class JobsController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'jobs';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Jobs();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'jobs',
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
           // 'limit' => (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'), FILTER_VALIDATE_INT) : static::$per_page),
            'limit' => (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'), FILTER_VALIDATE_INT) : 50),
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
        $this->layout->nest('content', 'jobs.index', $this->data)
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
            $this->data['row'] = $this->model->getColumnTable('checks');
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
        $this->layout->nest('content', 'jobs.form', $this->data)->with('menus', $this->menus);
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
            $this->data['row'] = $this->model->getColumnTable('checks');
        }
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'jobs.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {
        $trackUri = $this->data['trackUri'];
        $rules = $this->validateForm();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            try {
                DB::beginTransaction();

                $data = $this->validatePost('checks');
                //set the timestamps here
                $inputID = Input::get('id');
                if ($inputID == '') {
                    $data = $this->model->createStamps($data, $inputID);
                } else {
                    $data = $this->model->updateStamps($data, $inputID);
                }

                $ID = $this->model->insertRow($data, Input::get('id'));
                //create initial placeholder log


                // Input logs
                if (Input::get('id') == '') {
                    DB::insert("insert into checks_log (check_id, comments, completed_on, completed_by) values (" . $ID . ", 'IGNORE - initial placeholder log',STR_TO_DATE('00-00-0000', '%Y-%m-%d'), " . Auth::id() . ")");
                    //create log entry for this task - this is necessary due to the sql query in place, otherwise it wont show in the query results index table for this module.
                    //DB::table('checks_log')
                    //	->insert(array('check_id' => $ID, 'comments' => Input::get('Initial log entry on creation'),'completed_on' => date("Y-m-d H:i:s"), 'completed_by' => Auth::id()));

                    $this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfully");
                    $id = SiteHelpers::encryptID($ID);
                } else {
                    $this->inputLogs(" ID : $ID  , Has Been Changed Successfully");
                }
                DB::commit();
                // Redirect after save
                $md = str_replace(" ", "+", Input::get('md'));
                $redirect = (!is_null(Input::get('apply')) ? 'jobs/add/' . $id . '?md=' . $md . $trackUri : 'jobs?md=' . $md . $trackUri);
                return Redirect::to($redirect)->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));
            } catch (Exception $e) {
                DB::rollBack();
                $md = str_replace(" ", "+", Input::get('md'));
                return Redirect::to('jobs/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', "A database error has occurred, no changes were made"))
                    ->withErrors($validator)->withInput();
            }
        } else {
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('jobs/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')))
                ->withErrors($validator)->withInput();
        }

    }

    public function postCompleted()
    {
        date_default_timezone_set('UTC');
        DB::beginTransaction();
        try {
            $ids = Input::get('id');
            foreach ($ids as $id) {
                DB::table('checks_log')
                    ->insert(array('check_id' => $id, 'comments' => Input::get('comments_' . +$id . ''), 'completed_on' => date("Y-m-d H:i:s"), 'completed_by' => Auth::id()));
            }

            //insert the log
            $serialise = implode(",", $ids);
            $this->inputLogs("User: " . Auth::id() . " has marked jobs with ID's of " . $serialise . " as completed");

            DB::commit();
            Session::flash('message', SiteHelpers::alert('success', 'Successfully marked the selected jobs as completed'));
            return Redirect::to('jobs?md=' . Input::get('md'))->with('message', SiteHelpers::alert('success', "Jobs with ID/s [" . $serialise . "] marked as completed"));
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::to('jobs?md=' . Input::get('md'))->with('message', "Failed marking the selected jobs as completed");
        }
    }

}