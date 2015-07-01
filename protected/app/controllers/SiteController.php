<?php

class SiteController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'site';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Site();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'site',
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
        $this->layout->nest('content', 'site.index', $this->data)
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
            $this->data['row'] = $this->model->getColumnTable('sites');
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
        $this->layout->nest('content', 'site.form', $this->data)->with('menus', $this->menus);
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
            $this->data['row'] = $this->model->getColumnTable('sites');
        }
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'site.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {
        $trackUri = $this->data['trackUri'];
        $rules = $this->validateForm();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            try {
                db::beginTransaction();

                $data = $this->validatePost('sites');
                //set the timestamps here
                $inputID = Input::get('id');
                if ($inputID == '') {
                    $data = $this->model->createStamps($data, $inputID);
                } else {
                    $data = $this->model->updateStamps($data, $inputID);
                }
                //insert the row
                $ID = $this->model->insertRow($data, $inputID);
                // Input logs

                //create the intial checks for sfbb for the new site
                DB::insert("insert into checks(check_name, description, check_category, check_frequency, site_id, department_id, monitor_in_checks, created_on, created_by) values ('".SFBB_OPENING_CHECK."', 'Encompasses all SFBB opening checks', 1, 1, " . $ID . ", 4, 0, CURRENT_TIMESTAMP, " . Auth::id() . ")");

                DB::insert("insert into checks(check_name, description, check_category, check_frequency, site_id, department_id, monitor_in_checks, created_on, created_by) values ('".SFBB_CLOSING_CHECK."', 'Encompasses all SFBB closing checks', 1, 1, " . $ID . ", 4, 0, CURRENT_TIMESTAMP, " . Auth::id() . ")");

                //find all the site_global training records and create
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
                return Redirect::to('site/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', "Error caught"));
            }
            // Redirect after save
            $md = str_replace(" ", "+", Input::get('md'));
            $redirect = (!is_null(Input::get('apply')) ? 'site/add/' . $id . '?md=' . $md . $trackUri : 'site?md=' . $md . $trackUri);
            return Redirect::to($redirect)->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));

        } else {
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('site/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')))
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
        return Redirect::to('site?md=' . Input::get('md'));
    }

}