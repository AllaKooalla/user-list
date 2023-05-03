<?php

namespace app\controllers\admin;

use RedBeanPHP\R;


class TaskController extends AppController
{

    public function indexAction()
    {
        $title = 'Список пользователей';
        $tasks = R::findAll('tasks');

        $this->setMeta("Admin :: {$title}");
        $this->set(compact('title', 'tasks'));
    }

    public function addAction()
    {
        if (!empty($_POST)) 
        {
            $one_task = trim($_POST['task']);
            $this->model->add_task($one_task);
            $_SESSION['success'] = 'Запись добавлена';
            redirect();
        }

        $title = 'Новый пользователь';
        $this->setMeta("Admin :: {$title}");
        $this->set(compact('title'));
    }

    public function deleteAction()
    {
        $id = get('id');
        $this->model->delete_task($id);
        redirect();
    }
}


?>