<?php
session_start();

$name = $_COOKIE['your_name'] ?? 'unknown';
$pwd = $_SESSION['password'] ?? 'no pass';

if(isset($_GET['name'])) {
    $name = $_GET['name'];
    //cookie voor 30 dagen
    setcookie('your_name', $name, time()+(60*60*24*30));
}

if(isset($_GET['password'])) {
    $pwd = $_GET['password'];
    $_SESSION['password'] = $pwd;
}

//echo $name;
echo $pwd;

