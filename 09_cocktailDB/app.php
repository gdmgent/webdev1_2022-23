<?php
//inladen van models, helpers, controllers

use App\Models\User;

require 'autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'config.php';

//connectie maken met DB
$db = new PDO($config['db_connection'] . ':dbname=' . $config['db_database'] . ';host=' . $config['db_host'] . ';port=' . $config['db_port'], $config['db_username'], $config['db_password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

session_start();

//check for user in session
$user_id = $_SESSION['user_id'] ?? 0;
if($user_id) {
    $current_user = User::find($user_id);
    //echo 'Ingelogde gebruiker is: ' . $current_user->email;
}


//routes aanmaken
$router = new \Bramus\Router\Router();
//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->get('/', 'App\Controllers\CocktailController@index');
$router->get('/cocktail/(\d+)', 'App\Controllers\CocktailController@detail');
$router->get('/ingredients', 'App\Controllers\IngredientController@index');
$router->get('/register', 'App\Controllers\UserController@register');
$router->post('/register', 'App\Controllers\UserController@register');
$router->get('/users', 'App\Controllers\UserController@all');
$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@login');
$router->get('/cocktail/create', 'App\Controllers\CocktailController@create');
$router->post('/cocktail/create', 'App\Controllers\CocktailController@create');
$router->get('/cocktail/api_get_cocktails/(\d+)', 'App\Controllers\CocktailController@apiGetCocktails');

//Run
$router->run();