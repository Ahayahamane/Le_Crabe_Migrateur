<?php


use Dotenv\Dotenv;
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

use app\router\Router;
use app\config\Session;

define("ROOT", __DIR__);
define("VUE",__DIR__."/app/vue");
define("MEDIAS",__DIR__."/public/medias");

new Session();

$router = new Router();