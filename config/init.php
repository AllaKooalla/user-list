<?php
// это файл конфигураций


// 1 - режим разработки, 0 - когда переносим на хостинг, там ошибки не показываются
define("DEBUG", 1);
// указывает на корневую папку
define("ROOT", dirname(__DIR__));
// константа хранит путь к публичной папке
define("WWW", ROOT . '/public');
// путь к папке приложения
define("APP", ROOT . '/app');
// путь к папке кэша
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
// путь к ядру
define("CORE", ROOT . '/vendor/shop');
define("HELPERS", ROOT . '/vendor/shop/helpers');
define("CONFIG", ROOT . '/config');
// шаблон сайта по умолчанию
define("LAYOUT", 'task');
// адрес сайта
define("PATH", 'http://user-list');
// путь к админке
define("ADMIN", 'http://user-list/admin');

// подключить автозагрузчик
require_once ROOT . '/vendor/autoload.php';

?>