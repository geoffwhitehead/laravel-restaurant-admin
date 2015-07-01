<?php

class EquipmentController extends BaseController
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'equipment';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->model = new Equipment();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = $this->model->validAccess($this->info['id']);

        $this->data = array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'equipment',
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
        $order = (!is_null(Input::get('order')) ? Input::get('order') : 'asc');
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
        $this->layout->nest('content', 'equipment.index', $this->data)
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
            $this->data['row'] = $this->model->getColumnTable('equipment');
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
        $this->layout->nest('content', 'equipment.form', $this->data)->with('menus', $this->menus);
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
            $this->data['row'] = $this->model->getColumnTable('equipment');
        }
        $this->data['masterdetail'] = $this->masterDetailParam();
        $this->data['id'] = $id;
        $this->data['access'] = $this->access;
        $this->layout->nest('content', 'equipment.view', $this->data)->with('menus', $this->menus);
    }

    function postSave($id = 0)
    {
        $trackUri = $this->data['trackUri'];
        $rules = $this->validateForm();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $data = $this->validatePost('equipment');

            try{
                DB::beginTransaction();

                //set the timestamps here
                $inputID = Input::get('id');
                $data = $this->model->createStamps($data, $inputID);
                $data = $this->model->updateStamps($data, $inputID);


                $ID = $this->model->insertRow($data, $inputID);


                //if the item category was a monitored fridge or freezer, need to automatically create a check for this item

                $type = Input::get('appliance_type');
                if ($type == FRIDGE or $type == FREEZER) {

                    $name = "Temp Check";

                    $check_id = DB::table('checks')->insertGetId(
                        ['check_name' => $name, 'description' => 'Logged temperature check for ' . Input::get('name'), 'check_category' => TEMP_CHECK, 'check_frequency' => 1, 'site_id' => Input::get('site_id'), 'department_id' => Input::get('department_id'), 'equipment_id' => $ID, 'monitor_in_checks' => 1, 'created_on' => date("Y-m-d H:i:s"), 'created_by' => Auth::id()]
                    );

                    //create the placeholder logs for this item.
                    $log_id = DB::table('checks_log')->insertGetId(
                        ['check_id' => $check_id, 'comments' => 'IGNORE - initial placeholder log', 'completed_on' => date("Y-m-d H:i:s"), 'completed_by' => Auth::id()]
                    );
                }
                // Input logs todo expand on these input logs
                if (Input::get('id') == '') {
                    $this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfully");
                    $id = SiteHelpers::encryptID($ID);
                } else {
                    $this->inputLogs(" ID : $ID  , Has Been Changed Successfully");
                }

                DB::commit();

                // Redirect after save
                $md = str_replace(" ", "+", Input::get('md'));
                $redirect = (!is_null(Input::get('apply')) ? 'equipment/add/' . $id . '?md=' . $md . $trackUri : 'equipment?md=' . $md . $trackUri);
                return Redirect::to($redirect)->with('message', SiteHelpers::alert('success', Lang::get('core.note_success')));

            } catch (Exception $ex) {
                DB::rollBack();
                $md = str_replace(" ", "+", Input::get('md'));
                return Redirect::to('equipment/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')));
            }

        } else {
            $md = str_replace(" ", "+", Input::get('md'));
            return Redirect::to('equipment/add/' . $id . '?md=' . $md)->with('message', SiteHelpers::alert('error', Lang::get('core.note_error')))
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
        return Redirect::to('equipment?md=' . Input::get('md'));
    }

}