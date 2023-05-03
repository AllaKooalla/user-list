<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Task extends AppModel
{
    public function add_task($one_task)
    {
        return R::exec("INSERT INTO tasks(task) VALUES( ? )", [$one_task]);
    }

    public function delete_task($id)
    {
        return R::exec("DELETE FROM `tasks` WHERE `id` = ?", [$id]);
    }


}

?>