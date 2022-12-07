<?php
$key = '41652073edefc6274b1960336fee5cfe';
$lat = 50.9195;
$lng = 3.4486;
$result = file_get_contents("https://api.openweathermap.org/data/3.0/onecall?lat=$lat&lon=$lng&appid=$key");
var_dump($result);