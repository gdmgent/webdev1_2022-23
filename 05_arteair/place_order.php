<?php

//Connectie DB
include 'includes/db.php';

//SQL
$sql = "INSERT INTO `order` 
            (`firstname`, `lastname`, `email`, `date`)
            VALUES (:firstname, :lastname, :email, NOW() )";

//prepare
$stmnt = $db->prepare($sql);

//Execute opletten met SQLInjection
$stmnt->execute([
    ':firstname' => $_POST['firstname'],
    ':lastname' => $_POST['lastname'],
    ':email' => $_POST['email'],
]);

//Geen fetch nodig. Wat is de laatst toegevoegde order_id ?

$order_id = $db->lastInsertId();

//Id toevoegen aan sessie var (dit is veiliger dan GET of COOKIE)
session_start();
$_SESSION['order_id'] = $order_id;

//redirect naar bevestigingspagina
header('location: order_done.php');
