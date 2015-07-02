<?php

class SfbbController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'sfbb';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Sfbb();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'sfbb',
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

        // query the database to find out if a SFBB record has already been submitted

       $this->data['count_recent'] = DB::select("select count(created_on) as cnt , created_by from sfbb_log where site_id = ".Session::get('sid')." and created_on >= DATE_SUB(NOW(),INTERVAL 16 HOUR)");

        $this->layout->nest('content', 'sfbb.index', $this->data)
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
            $this->data['row'] = $this->model->getColumnTable('sfbb_log');
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
        $this->layout->nest('content', 'sfbb.index', $this->data)->with('menus', $this->menus);
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
            $this->data['row'] = $this->model->getColumnTable('sfbb_log');
        }
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'sfbb.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {
        $trackUri = $this->data['trackUri'];
        $rules = $this->validateForm();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $data = $this->validatePost('sfbb_log');


            DB::beginTransaction();
            try {


                //create opening log entry
                $opening_check_id = DB::select("select checks.id from checks where check_name = '".SFBB_OPENING_CHECK."' and site_id = " . Session::get('sid') . "");
                $opening_id = DB::table('checks_log')->insertGetId(array('check_id' => $opening_check_id[0]->id, 'comments' => Input::get('opening_comments'), 'completed_on' => date("Y-m-d H:i:s"), 'completed_by' => Auth::id()));

                //create closing log entry
                $closing_check_id = DB::select("select checks.id from checks where check_name = '".SFBB_CLOSING_CHECK."' and site_id = " . Session::get('sid') . "");
                $closing_id = DB::table('checks_log')->insertGetId(array('check_id' => $closing_check_id[0]->id, 'comments' => Input::get('closing_comments'), 'completed_on' => date("Y-m-d H:i:s"), 'completed_by' => Auth::id()));

                //created timestamps
                $data = $this->model->createStamps($data, Input::get('id'));
                $data['date'] = date("Y/m/d");
                $data['opening_log'] = $opening_id;
                $data['closing_log'] = $closing_id;
                $data['site_id'] = Session::get('sid');

                $ID = $this->model->insertRow($data, Input::get('id'));
                // Input logs
                if (Input::get('id') == '') {
                    $this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfully");
                    $id = SiteHelpers::encryptID($ID);
                } else {
                    $this->inputLogs(" ID : $ID  , Has Been Changed Successfully");
                }
                DB::commit();

            } catch (Exception $e) {
                DB::rollBack();
                $md = str_replace(" ", "+", Input::get('md'));
                return Redirect::to('sfbb/index/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', "An error occurred, no changes have been made  ".var_dump($e)));
            }
            // Redirect after save
            $md = str_replace(" ", "+", Input::get('md'));
            $redirect = (!is_null(Input::get('apply')) ? 'sfbb/add/' . $id . '?md=' . $md . $trackUri : 'sfbb?md=' . $md . $trackUri);
            return Redirect::to($redirect)->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));
        } else {
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('sfbb/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')))
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
        return Redirect::to('sfbb?md=' . Input::get('md'));
    }

    public function postSubmit()
    {


    }
}