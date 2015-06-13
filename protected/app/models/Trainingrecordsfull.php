<?php

class Trainingrecordsfull extends BaseModel
{

    protected $table = 'training_records';
    protected $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();

    }

    public static function querySelect()
    {


        return "  SELECT t.*, a.department_id, a.site_id FROM training_records AS t
  JOIN tb_users as u ON u.id = t.user_id
  JOIN assigned_to as a ON a.user_id = u.id
  JOIN training_tasks as tr ON tr.id = t.training_task_id";
    }

    public static function queryWhere()
    {
        if (Session::get('lvl') <= 3) {
            return " WHERE t.id IS NOT NULL";
        } elseif (Session::get('lvl') <= 5) {
            return " WHERE a.sid = ".Session::get('sid')." AND a.department.id";
        }

    }

    public static function queryGroup()
    {
        return "  ";
    }


}
