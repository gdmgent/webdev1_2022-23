<?php

include '../../includes/db.php';

$flight_id = $_GET['flight_id'];

$sql = 'SELECT * FROM flight WHERE flight_id = :flight_id';
$stmnt = $db->prepare($sql);
$stmnt->execute([
    ':flight_id' => $flight_id
]);
$flight = $stmnt->fetch();

var_dump($flight);

//TODO: html met form maken