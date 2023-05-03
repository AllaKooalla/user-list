<?php

// контроллер для регистрации/авторизации/личного кабинета пользователя
namespace app\controllers;
use app\models\User;
use shop\App;

/** @property User $model */
class UserController extends AppController
{

    // метод для входа пользователей
    public function loginAction()
    {
        if (User::checkAuth())
        {
            redirect('/');
        }

        if (!empty($_POST))
        {
            if ($this->model->login())
            {
                $_SESSION['success'] = 'Вы успешно авторизованы';
                redirect(ADMIN);
            } else
            {
                $_SESSION['errors'] = 'Логин/пароль введены неверно';
                redirect();     
            }
        }

        $this->setMeta('Авторизация');
    }
    
    // метод выхода из аккаунта
    public function logoutAction()
    {
        if (User::checkAuth())
        {
            unset($_SESSION['user']);
        }
        redirect('/' . 'user/login');
    }
    
}

?>