<?php

namespace app\controllers;
use shop\Controller;

class MainController extends AppController
{

    public function indexAction()
    {

        $tasks = $this->model->get_task();

        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('tasks'));
    }
}

?>