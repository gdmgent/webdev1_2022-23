<?php
session_start(); //of gewoon verderzetten
$order_id = $_SESSION['order_id'];
echo 'Bedankt voor bestelling met id: ' . $order_id;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<header>
    <a class="brand" href="index.php">ARTE <small>air</small></a>
</header>

<section>
<div class="ticket">
    <div class="info"><h2>FROM -> TO</h2>
    Datum &bull; € 199,99
    <br>01A
    <br>Voornaam Naam</div>
    <div class="code"><img src="TODO"></div>
</div>

    <a href="./index.php">Startpagina</a>
</section>
</body>
</html>
       