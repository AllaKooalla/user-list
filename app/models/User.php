<?php

// модель для регистрации/авторизации/личного кабинета пользователя
namespace app\models;

use RedBeanPHP\R;

class User extends AppModel
{
    // безопасные данные, то есть получим только те данные, которые ожидали
    public array $attributes = [
        'name' => '',
        'password' => '',
    ];

    // массив для правил валидации, required - обязательные поля
    public array $rules = [
        'required' => ['name', 'password', ],
    ];

    public array $labels = [
        'name' => 'Имя',
        'password' => 'Пароль',
    ];

    // проверка аутенфикации
    public static function checkAuth(): bool
    {
        return isset($_SESSION['user']);
    }


    // метод для авторизации пользователей и админа
    public function login(): bool
    {
        $name = post('name');
        $password = post('password');
        if ($name && $password)
        {
            $user = R::findOne('user', "name = ? AND role = 'admin'", [$name]);

            // если получили пользователя, надо проверить пароль
            if ($user)
            {
                if (password_verify($password, $user->password))
                {
                    foreach ($user as $k => $v)
                    {
                        if (!$k != 'password')
                        {
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function isAdmin(): bool
    {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }
}

?>