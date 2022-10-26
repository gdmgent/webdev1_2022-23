<?php
session_start(); //of gewoon verderzetten
$order_id = $_SESSION['order_id'];
//echo 'Bedankt voor bestelling met id: ' . $order_id;

//DB Connectie
include 'includes/db.php';

//SQL + prepare
$sql = "SELECT * FROM `order` WHERE order_id = :order_id";
$stmnt = $db->prepare($sql);

//execute
$stmnt->execute([
    ':order_id' => $order_id
]);

//fetchObject is vergelijkbaar met fetch maar maakt een object ipv een array
$order = $stmnt->fetchObject();

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

<p>Hallo <?= $order->firstname; ?>,</p>
<p>Bedankt voor je bestelling. Hieronder de tickets. 
    Je ontvangt ook nog een mail (<?= $order->email; ?>) met de details.</p>

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
       