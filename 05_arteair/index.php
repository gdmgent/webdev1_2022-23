<?php
include 'includes/db.php';
include 'model/Flight.php';

//$flight = new Flight();
//$flights = $flight->getAll();

$flights = Flight::getAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArteAir</title>
    
    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<header>
    <a class="brand" href="index.php">ARTE <small>air</small></a>
</header>
<section>
<div class="flights">
    <?php foreach($flights as $flight) {
        include 'view/flight_item.php';
     } ?>
</div>
</section>
</body>
</html>