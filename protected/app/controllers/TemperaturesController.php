<?php

class TemperaturesController extends BaseController
{

    protected $layout = "layouts.main";

    public function __construct()
    {
        parent::__construct();
        $data = array();
    }

    public function getIndex()
    {
// this will get a list of all the fridges and freezers for a site
        $data['equipment'] = DB::select("select id, name from equipment where (appliance_type = " . FRIDGE . " or appliance_type = " . FREEZER . ") and site_id = " . Session::get('sid') . " and active = 1 order by id asc");
        $array = array();
        // this will return all the logs for checks containing the above pieces of equipment. limit 100 with the newest logs first
        foreach ($data['equipment'] as $e) {
            // push new key/value into the array
            $array[$e->id] = DB::select("select log.value, log.completed_on, log.completed_by from checks_log log join checks c on c.id = log.check_id where c.equipment_id = " . $e->id . " order by log.id desc");
        }
        $data['logs'] = $array;

        $data['recent_log'] = DB::select("select TIMEDIFF(NOW(), log.completed_on) as timediff, log.completed_by from checks_log log join checks c on c.id = log.check_id where c.equipment_id = ".$data['equipment'][0]->id." order by log.id desc limit 1");
        $this->layout->nest('content', 'temperatures.index', $data);


    }

    public function postStore()
    {

        // get the list of appliances
        $data['equipment'] = DB::select("select id, name from equipment where (appliance_type = " . FRIDGE . " or appliance_type = " . FREEZER . ") and site_id = " . Session::get('sid') . " and active = 1 order by id asc");

        //for all equipment, get the value from the input and insert a new log entry in the corresponding check

        foreach ($data['equipment'] as $eq) {
            $input_value = Input::get($eq->id);
            $date = date("Y-m-d H:i:s");
            $user = Auth::id();
            $check_id = DB::select("select id from checks where check_category = " . CAT_TEMP . " and site_id = " . Session::get('sid') . " and equipment_id = " . $eq->id . "");
            DB::insert("insert into checks_log (check_id, equipment_id,value,completed_by) values (".$check_id[0]->id.", ".$eq->id.", ".$input_value.", ".$user.")");
            // cant get this shit to work
            //DB::table('checks_log')->insert(array("check_id" => $check_id[0]->id, "equipment_id" => $eq->id, "value" => $input_value, "completed_by" => Auth::get('id')));
        }
        return Redirect::to('temperatures/index')->with('message', Input::get($data['equipment'][5]->id));
    }

}



