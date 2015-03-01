<?php

use Illuminate\Http\Response;

class EventController extends BaseController {
    public function postEdit() {
        $data = Input::all();
        $return = DB::table('shifts')->where('id', $data['id'])->update(array('shift_start'=>$data['start'], 'shift_end'=>$data['end']));
        return $return;//response("Error", 401);
    }

    public function getUsers() {
        return json_encode(DB::table('tb_users')->select('id', 'first_name', 'last_name')->where('active','=','1')->get());
    }

    public function postCreate() {
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
                    'shift_start'   => $data['start'],
                    'shift_end'     => $data['end'],
                    'employee_id'   => $data['id'],
                    'site_id'       => 1, //TODO: Swap with geoffs session variable with he finally commits ;)
                    'created_by'    => Auth::id(),
                    'created_on'    => date('Y-m-d h:i:s')
                ]);
            return $return;
        } catch (Exception $e) {
            return (new Response("Exception caught: ", 402));
        }

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