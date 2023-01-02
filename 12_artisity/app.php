<?php
//inladen van models, helpers, controllers
require 'autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'config.php';

session_start();

function getCurrentUser() {
    $current_user = 1;
    $user = App\Models\User::find($current_user);
    return $user;
}

//connectie maken met DB
$db = new PDO($config['db_connection'] . ':dbname=' . $config['db_database'] . ';host=' . $config['db_host'] . ';port=' . $config['db_port'], $config['db_username'], $config['db_password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//routes aanmaken
$router = new \Bramus\Router\Router();
//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->get('/', 'App\Controllers\AlbumController@index');
$router->get('/genre/(.+)', 'App\Controllers\AlbumController@index');
$router->get('/album/(\d+)', 'App\Controllers\AlbumController@detail');
$router->get('/album/(\d+)/like', function($album_id) { 
    $success = App\Models\Album::like($album_id, getCurrentUser()->id);
    header('Location: /album/' . $album_id);
 });
 $router->get('/album/(\d+)/dislike', function($album_id) { 
    $success = App\Models\Album::dislike($album_id, getCurrentUser()->id);
    header('Location: /album/' . $album_id);
 });
 $router->get('/favorites', 'App\Controllers\UserController@favorites');

//Run
$router->run();