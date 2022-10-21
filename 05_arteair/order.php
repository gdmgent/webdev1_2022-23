<?php
include 'includes/db.php';
$flight_id = $_GET['flight_id'];

$sql = "SELECT flight.*, af.name as from_name, at.name as to_name, aircraft.*
        FROM flight
        INNER join aircraft on flight.aircraft_id = aircraft.aircraft_id
        INNER JOIN airport af ON flight.from = af.airport_id
        INNER JOIN airport at ON flight.to = at.airport_id
        WHERE flight_id = :flight_placeholder";

//prepare
$statement = $db->prepare($sql);
//execute
$statement->execute([
    ':flight_placeholder' => $flight_id
]);
//fetch
$flight = $statement->fetch();



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArteAir -> Order</title>

    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<header>
    <a class="brand" href="index.php">ARTE <small>air</small></a>
</header>

<section>
<h1><?= $flight['from_name']; ?> -> <?= $flight['to_name']; ?></h1>
<h2><?= $flight['date']; ?></h2>
€ <?= $flight['ticket_price']; ?> &bull; <?= $flight['aircraft_code']; ?> &bull; <?= $flight['model']; ?>

    <form method="POST" action="./place_order.php">
<div class="order_form">
    <div class="seats">
        <div class="row">
            <span>1</span>
            <div class="seat seat-ordered">A</div>
            <div class="spacer"></div>
            <div class="seat">B<input type="checkbox" name="TODO" value="TODO"></div>      
        </div>
    </div>
    <div class="form">
        Uw voornaam:   <input type="text" name="firstname" >  <br>
        Uw naam:   <input type="text" name="lastname">  <br>
        Uw e-mail:   <input type="text" name="email" >  <br>
        <input type="hidden" name="flight_id" value="TODO">
        <button type="submit">Bestelling afwerken</button>
    </div>                        
    </div>  
</form>
</section>
</body>
</html>