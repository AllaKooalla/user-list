<?php

namespace app\controllers\admin;
use RedBeanPHP\R;
use shop\Controller;

class MainController extends AppController
{

    public false|string $layout = 'admin';


    public function indexAction()
    {
        $tasks_count = R::count('tasks');
        // debug($tasks);
        $title = 'Главная страница';
        $this->setMeta('Admin :: Главная страница');
        $this->set(compact('title', 'tasks_count'));
    }
}

?>