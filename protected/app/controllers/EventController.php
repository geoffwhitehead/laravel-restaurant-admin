<?php
class EventController extends BaseController {
    public function postEdit() {
        $data = Input::all();
        $return = DB::table('shifts')->where('id', $data['id'])->update(array('shift_start'=>$data['start'], 'shift_end'=>$data['end']));
        return $return;//response("Error", 401);
    }

    public function postClock() {
        //TODO: finish this JSON method
        $data = Input::all();

    }

    public function getList() {
        $data = DB::select('SELECT shifts.id, shift_start as start, shift_end as end, manager_conf_flag, admin_conf_flag, paid, tb_users.first_name as title, tb_users.last_name from shifts left outer join tb_users on shifts.employee_id=tb_users.id');
        return json_encode($data);
    }
}