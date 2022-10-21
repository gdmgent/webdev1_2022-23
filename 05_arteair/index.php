<?php
include 'includes/db.php';

$sql = "SELECT flight.*, af.name as from_name, at.name as to_name, aircraft.*
        FROM flight
        INNER join aircraft on flight.aircraft_id = aircraft.aircraft_id
        INNER JOIN airport af ON flight.from = af.airport_id
        INNER JOIN airport at ON flight.to = at.airport_id";

//prepare
$statement = $db->prepare($sql);
//execute
$statement->execute();
//fetch
$flights = $statement->fetchAll();

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