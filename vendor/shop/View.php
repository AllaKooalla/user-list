<?php

// основной класс вида, то есть html шаблонов
namespace shop;

use Exception;
use RedBeanPHP\R;

class View
{
    // в фреймворках разделяются понятия шаблон и вид
    // шаблон - рамка, в которую можно поместить какую-то часть, а часть неизменна
    // именно контент будет подключаться в шаблон
    public string $content = '';

    public function __construct(
        public $route,
        public $layout = '',
        public $view = '',
        public $meta = [],
    )
    {
        if (false !== $this->layout)
        {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    // рендерит страничку, подключает шаблон, вставляет в него вид
    public function render($data)
    {
        if (is_array($data))
        {
            extract($data);
        }
        $prefix = str_replace('\\' , '/', $this->route['admin_prefix']);
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        // var_dump($view_file);
        if (is_file($view_file))
        {
            // включаем буферизацию вывода
            ob_start();
            require_once $view_file;
            // сохранили в свойство content даные из буфера
            $this->content = ob_get_clean();
        } else
        {
            throw new \Exception("Не найден вид {$view_file}", 500);
        }

        if (false !== $this->layout)
        {
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layout_file))
            {
                require_once $layout_file;
            } else
            {
                throw new \Exception("Не найден шаблон {$layout_file}", 500);
            }
        }
    }

    // формирует метаданные
    public function getMeta()
    {
        $out = '<title>' . App::$app->getProrerty('site_name') . ' :: ' . h($this->meta['title']) .'</title>' . PHP_EOL;
        $out .= '<meta name="description" content="' .h($this->meta['description']) . '">' . PHP_EOL;
        $out .= '<meta name="keywords" content="' . h($this->meta['keywords']) . '">' . PHP_EOL;
        return $out;
    }

    // выводит sql запросы, работает только в режиме отладки
    public function getDbLogs()
    {
        if (DEBUG)
        {
            $logs = R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();
            $logs = array_merge($logs->grep( 'SELECT' ), $logs->grep( 'select' ), $logs->grep( 'INSERT' ), 
            $logs->grep( 'UPDATE' ), $logs->grep( 'DELETE' ));
            debug($logs);
        }
    }

    // подключает части шаблонов, принимает файл шаблон и массив данных
    public function getPart($file, $data = null)
    {
        if (is_array($data))
        {
            extract($data);
        }
        $file = APP . "/views/{$file}.php";
        if (is_file($file))
        {
            require $file;
        } else
        {
            echo "File {$file} not found...";
        }
    }
}

?>