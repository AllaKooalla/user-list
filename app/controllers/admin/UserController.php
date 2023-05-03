<?php


namespace app\controllers\admin;

use app\models\admin\User;

/** @property User $model */
class UserController extends AppController
{

    public function loginAction()
    {
        if ($this->model::isAdmin()) {
            redirect(ADMIN);
        }
    }


}