<?php
require 'autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'config.php';

session_start();

//connectie maken met DB
$db = new PDO($config['db_connection'] . ':dbname=' . $config['db_database'] . ';host=' . $config['db_host'] . ';port=' . $config['db_port'], $config['db_username'], $config['db_password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//router aanmaken
$router = new \Bramus\Router\Router();

$router->get('/', function() { echo 'Index'; });
$router->get('/cocktails', 'App\Controllers\CocktailController@index');
$router->get('/cocktail/(\d+)', 'App\Controllers\CocktailController@detail');

$router->run();