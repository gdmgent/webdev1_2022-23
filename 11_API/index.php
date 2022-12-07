<?php

$data = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/random.php');
$data = json_decode($data);

foreach($data->drinks as $drink) {
    echo 'Tip of the day: Drink a ' . $drink->strDrink;
}

//print_r($data);