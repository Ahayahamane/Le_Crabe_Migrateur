<?php


use Dotenv\Dotenv;
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

use App\router\Router;
use App\config\Session;

define("ROOT", __DIR__);
define("VUE",__DIR__."/App/vue");
define("MEDIAS",__DIR__."/public/medias");

new Session();

$router = new Router();
// echo '<br><pre>';
// var_dump($all_others);