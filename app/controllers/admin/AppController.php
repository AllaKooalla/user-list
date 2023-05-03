<?php


namespace app\controllers\admin;

use app\models\User;
use shop\Controller;

use app\models\AppModel;

class AppController extends Controller
{

    public false|string $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);

        if (!User::isAdmin()) {
            redirect('/');
        }
        
        new AppModel();
    }

}