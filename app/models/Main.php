<?php

// модель для главной страницы сайта
namespace app\models;
use RedBeanPHP\R;

class Main extends AppModel
{
 
    public function get_task(): array
    {
        // return R::findAll('tasks');
        return R::getAll('SELECT `tasks`.* FROM `tasks`');
    }
}

?>